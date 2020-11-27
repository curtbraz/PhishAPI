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
import socket
import struct
import sys

from utils import color, StructPython2or3, NetworkSendBufferPython2or3, NetworkRecvBufferPython2or3
from packets import SMBHeader, SMBNego, SMBNegoFingerData, SMBSessionFingerData

def OsNameClientVersion(data):
	try:
		if (sys.version_info > (3, 0)):
			length = struct.unpack('<H',data[43:45])[0]
			packet = NetworkRecvBufferPython2or3(data[47+length:])
			OsVersion, ClientVersion = tuple([e.replace('\x00','') for e in packet.split('\x00\x00\x00')[:2]])
			return OsVersion, ClientVersion
		else:
			length = struct.unpack('<H',data[43:45])[0]
			OsVersion, ClientVersion = tuple([e.replace('\x00','') for e in data[47+length:].split('\x00\x00\x00')[:2]])
			return OsVersion, ClientVersion
	except:
		return "Could not fingerprint Os version.", "Could not fingerprint LanManager Client version"

def RunSmbFinger(host):
	try:
		s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
		s.connect(host)
		s.settimeout(0.7)

		h = SMBHeader(cmd='\x72',flag1='\x18',flag2='\x53\xc8')
		n = SMBNego(data = str(SMBNegoFingerData()))
		n.calculate()
		Packet = str(h)+str(n)
		Buffer1 = StructPython2or3('>i', str(Packet))+str(Packet)
		s.send(NetworkSendBufferPython2or3(Buffer1))
		data = s.recv(2048)
		
		if data[8:10] == b'\x72\x00':
			Header = SMBHeader(cmd="\x73",flag1="\x18",flag2="\x17\xc8",uid="\x00\x00")
			Body = SMBSessionFingerData()
			Body.calculate()

			Packet = str(Header)+str(Body)
			Buffer1 = StructPython2or3('>i', str(Packet))+str(Packet)
			s.send(NetworkSendBufferPython2or3(Buffer1))
			data = s.recv(2048)

		if data[8:10] == b'\x73\x16':
			return OsNameClientVersion(data)
	except:
		print(color("[!] ", 1, 1) +" Fingerprint failed")
		return None
