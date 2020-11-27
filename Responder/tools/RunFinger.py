#!/usr/bin/env python
# This file is part of Responder, a network take-over set of tools
# created and maintained by Laurent Gaffie.
# email: laurent.gaffie@gmail.com
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.
import re,sys,struct
import datetime
import multiprocessing
from socket import *
from odict import OrderedDict
import optparse
from RunFingerPackets import *
__version__ = "1.0"

parser = optparse.OptionParser(usage='python %prog -i 10.10.10.224\nor:\npython %prog -i 10.10.10.0/24', version=__version__, prog=sys.argv[0])

parser.add_option('-i','--ip', action="store", help="Target IP address or class C", dest="TARGET", metavar="10.10.10.224", default=None)
parser.add_option('-g','--grep', action="store_true", dest="grep_output", default=False, help="Output in grepable format")
options, args = parser.parse_args()

if options.TARGET is None:
    print("\n-i Mandatory option is missing, please provide a target or target range.\n")
    parser.print_help()
    exit(-1)

Timeout = 2
Host = options.TARGET

class Packet():
    fields = OrderedDict([
    ])
    def __init__(self, **kw):
        self.fields = OrderedDict(self.__class__.fields)
        for k,v in list(kw.items()):
            if callable(v):
                self.fields[k] = v(self.fields[k])
            else:
                self.fields[k] = v
    def __str__(self):
        return "".join(map(str, list(self.fields.values())))

#Python version
if (sys.version_info > (3, 0)):
    PY2OR3     = "PY3"
else:
    PY2OR3  = "PY2"

def StructWithLenPython2or3(endian,data):
    #Python2...
    if PY2OR3 == "PY2":
        return struct.pack(endian, data)
    #Python3...
    else:
        return struct.pack(endian, data).decode('latin-1')

def NetworkSendBufferPython2or3(data):
    if PY2OR3 == "PY2":
        return str(data)
    else:
        return bytes(str(data), 'latin-1')

def NetworkRecvBufferPython2or3(data):
    if PY2OR3 == "PY2":
        return str(data)
    else:
        return str(data.decode('latin-1'))

def longueur(payload):
    length = StructWithLenPython2or3(">i", len(''.join(payload)))
    return length

def GetBootTime(data):
    try:
        Filetime = int(struct.unpack('<q',data)[0])
        t = divmod(Filetime - 116444736000000000, 10000000)
        time = datetime.datetime.fromtimestamp(t[0])
        return time, time.strftime('%Y-%m-%d %H:%M:%S')
    except:
        pass

#####################

def IsSigningEnabled(data):
    if data[39] == "\x0f":
        return True
    else:
        return False

def atod(a):
    return struct.unpack("!L",inet_aton(a))[0]

def dtoa(d):
    return inet_ntoa(struct.pack("!L", d))

def OsNameClientVersion(data):
    try:
        length = struct.unpack('<H',data[43:45].encode('latin-1'))[0]
        if length > 255:
            OsVersion, ClientVersion = tuple([e.replace("\x00", "") for e in data[47+length:].split('\x00\x00\x00')[:2]])
            return OsVersion, ClientVersion
        if length <= 255:
            OsVersion, ClientVersion = tuple([e.replace("\x00", "") for e in data[46+length:].split('\x00\x00\x00')[:2]])
            return OsVersion, ClientVersion
    except:
        return "Could not fingerprint Os version.", "Could not fingerprint LanManager Client version"

def GetHostnameAndDomainName(data):
    try:
        Time = GetBootTime(data[60:68])
        data = NetworkRecvBufferPython2or3(data)
        DomainJoined, Hostname = tuple([e.replace("\x00", "") for e in data[81:].split('\x00\x00\x00')[:2]])
        #If max length domain name, there won't be a \x00\x00\x00 delineator to split on
        if Hostname == '':
            DomainJoined = data[81:110].decode('latin-1')
            Hostname = data[113:].decode('latin-1')
        return Hostname, DomainJoined, Time
    except:
        return "Could not get Hostname.", "Could not get Domain joined"

def DomainGrab(Host):
    s = socket(AF_INET, SOCK_STREAM)
    try:
        s.settimeout(Timeout)
        s.connect(Host)
    except:
        pass
    try:
        h = SMBHeaderLanMan(cmd="\x72",mid="\x01\x00",flag1="\x00", flag2="\x00\x00")
        n = SMBNegoDataLanMan()
        packet0 = str(h)+str(n)
        buffer0 = longueur(packet0)+packet0
        s.send(NetworkSendBufferPython2or3(buffer0))
        data = s.recv(2048)
        s.close()
        if data[8:10] == b'\x72\x00':
            return GetHostnameAndDomainName(data)
    except:
        pass

def SmbFinger(Host):
    s = socket(AF_INET, SOCK_STREAM)
    try:
        s.settimeout(Timeout)
        s.connect(Host)
    except:
        pass
    try:
        h = SMBHeader(cmd="\x72",flag1="\x18",flag2="\x53\xc8")
        n = SMBNego(Data = SMBNegoData())
        n.calculate()
        packet0 = str(h)+str(n)
        buffer0 = longueur(packet0)+packet0
        s.send(NetworkSendBufferPython2or3(buffer0))
        data = s.recv(2048)
        signing = IsSigningEnabled(data)
        if data[8:10] == b'\x72\x00':
            head = SMBHeader(cmd="\x73",flag1="\x18",flag2="\x17\xc8",uid="\x00\x00")
            t = SMBSessionFingerData()
            packet0 = str(head)+str(t)
            buffer1 = longueur(packet0)+packet0
            s.send(NetworkSendBufferPython2or3(buffer1))
            data = s.recv(2048)
        if data[8:10] == b'\x73\x16':
            OsVersion, ClientVersion = OsNameClientVersion(NetworkRecvBufferPython2or3(data))
            return signing, OsVersion, ClientVersion
    except:
        pass

def check_smb_null_session(host):
    s = socket(AF_INET, SOCK_STREAM)
    try:
        s.settimeout(Timeout)
        s.connect(host)
        h = SMBHeader(cmd="\x72",flag1="\x18", flag2="\x53\xc8")
        n = SMBNego(Data = SMBNegoData())
        n.calculate()
        packet0 = str(h)+str(n)
        buffer0 = longueur(packet0)+packet0
        s.send(NetworkSendBufferPython2or3(buffer0))
        data = s.recv(2048)
        if data[8:10] == b'\x72\x00':
            h = SMBHeader(cmd="\x73",flag1="\x18", flag2="\x17\xc8",mid="\x40\x00")
            n = SMBSessionData()
            n.calculate()
            packet0 = str(h)+str(n)
            buffer0 = longueur(packet0)+packet0
            s.send(NetworkSendBufferPython2or3(buffer0))
            data = s.recv(2048)
        if data[8:10] == b'\x73\x16':
            h = SMBHeader(cmd="\x73",flag1="\x18", flag2="\x17\xc8",uid=data[32:34].decode('latin-1'),mid="\x80\x00")
            n = SMBSession2()
            n.calculate()
            packet0 = str(h)+str(n)
            buffer0 = longueur(packet0)+packet0
            s.send(NetworkSendBufferPython2or3(buffer0))
            data = s.recv(2048)
        if data[8:10] == b'\x73\x00':
            h = SMBHeader(cmd="\x75",flag1="\x18", flag2="\x07\xc8",uid=data[32:34].decode('latin-1'),mid="\xc0\x00")
            n = SMBTreeConnectData()
            n.calculate()
            packet0 = str(h)+str(n)
            buffer0 = longueur(packet0)+packet0
            s.send(NetworkSendBufferPython2or3(buffer0))
            data = s.recv(2048)
        if data[8:10] == b'\x75\x00':
            return True
        else:
            return False
    except Exception:
        pass
        return False

##################
#run it
def ShowResults(Host):
    try:
        Hostname, DomainJoined, Time = DomainGrab((Host, 445))
        Signing, OsVer, LanManClient = SmbFinger((Host, 445))
        NullSess = check_smb_null_session((Host, 445))
        print(("Retrieving information for %s..."%(Host)))
        print(("SMB signing: %s"%(Signing)))
        print(("Null Sessions Allowed: %s"%(NullSess)))
        print(("Server Time: %s"%(Time[1])))
        print(("OS version: '%s'\nLanman Client: '%s'"%(OsVer, LanManClient)))
        print(("Machine Hostname: '%s'\nThis machine is part of the '%s' domain"%(Hostname, DomainJoined)))
        print(("RDP port open: '%s'\n"%(IsRDPOn((Host,3389)))))
    except:
        pass

def ShowSmallResults(Host):
    s = socket(AF_INET, SOCK_STREAM)
    try:
        s.settimeout(Timeout)
        s.connect((Host, 445))
    except:
        return False

    try:
        Hostname, DomainJoined, Time = DomainGrab((Host, 445))
        Signing, OsVer, LanManClient = SmbFinger((Host, 445))
        NullSess = check_smb_null_session((Host, 445))
        print(("['{}', Os:'{}', Domain:'{}', Signing:'{}', Time:'{}', Null Session: '{}', RDP:'{}']".format(Host, OsVer, DomainJoined, Signing, Time[1],NullSess,IsRDPOn((Host,3389)))))
    except Exception as err:
        pass

def IsRDPOn(Host):
    s = socket(AF_INET, SOCK_STREAM)
    try:
        s.settimeout(Timeout)
        s.connect(Host)
        if s:
            return True
        else:
            return False

    except Exception as err:
        return False

def RunFinger(Host):
    m = re.search("/", str(Host))
    if m:
        net,_,mask = Host.partition('/')
        mask = int(mask)
        net = atod(net)
        threads = []
        if options.grep_output:
            func = ShowSmallResults
        else:
            func = ShowResults
        for host in (dtoa(net+n) for n in range(0, 1<<32-mask)):
            p = multiprocessing.Process(target=func, args=((host),))
            threads.append(p)
            p.start()
    else:
        if options.grep_output:
            ShowSmallResults(Host)
        else:
            ShowResults(Host)

RunFinger(Host)
