<?php

$servername = "mysql-server"; 
$username = "root";
$password = "PhishAPIDef@ulT";  
$dbname = "fakesite";

if(isset($_REQUEST['APIDomain'])){

$APIDomain = $_REQUEST['APIDomain'];
$BeefHookJSURL = $_REQUEST['BeefHookJSURL'];
$BeefToken = $_REQUEST['BeefToken'];
$SlackIncomingWebhookURL = $_REQUEST['SlackIncomingWebhookURL'];
$SlackBotOrLegacyToken = $_REQUEST['SlackBotOrLegacyToken'];
$slackchannel = $_REQUEST['slackchannel'];
$DiscordWebhook = $_REQUEST['DiscordWebhook'];
$DiscordChannel = $_REQUEST['DiscordChannel'];
$IFTTTWebhook = $_REQUEST['IFTTTWebhook'];

// Create connection
$conn2 = mysqli_connect($servername, $username, $password, 'Config');
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}

// Show Credentails for the Selected Project
$sql = "CALL UpdateSettings('$APIDomain','$BeefHookJSURL','$BeefToken','$SlackIncomingWebhookURL','$SlackBotOrLegacyToken','$slackchannel','$DiscordWebhook','$DiscordChannel','$IFTTTWebhook');";
$result = $conn2->query($sql);

$conn2->close();
	
}	

?>

<HTML>
<HEAD>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<TITLE>PhishAPI</TITLE>
<link rel="apple-touch-icon" sizes="57x57" href="/images/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/images/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/images/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/images/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/images/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/images/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/images/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/images/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
<link rel="manifest" href="/images/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/images/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<style>
table.blank th {

}
table.blank td {

}
</style>
<?php 

// Create connection
$conn = mysqli_connect($servername, $username, $password, 'Config');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Show Credentails for the Selected Project
$sql = "CALL GetSettings();";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

if($row == null){

$APIDomain = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";



} else {

$APIDomain = $row['Domain'];
$BeefHookJSURL = $row['BeefHookURL'];
$BeefToken = $row['BeefToken'];
$SlackIncomingWebhookURL = $row['SlackWebHook'];
$SlackBotOrLegacyToken = $row['SlackBotToken'];
$slackchannel = $row['SlackChannel'];
$DiscordWebhook = $row['DiscordWebhook'];
$DiscordChannel = $row['DiscordChannel'];
$IFTTTWebhook = $row['IFTTTWebhook'];

}
	
?>

</HEAD>
<BODY>
<CENTER>
    <h2><FONT COLOR="#FFFFFF">API Settings</FONT></h2>


<FORM METHOD="POST" ACTION="<?php $_SERVER["PHP_SELF"]; ?>">

<TABLE BORDER=1><TR><TH>PhishAPI Address</TH><TH>Beef Hook Address</TH><TH>Beef API Token</TH></TR>
<TR><TD><input type="text" value="<?php echo $APIDomain; ?>" name="APIDomain" placeholder="https://phishapi.com"></TD><TD><input type="text" value="<?php echo $BeefHookJSURL; ?>" name="BeefHookJSURL" placeholder="Use PhishAPI Address if Same"></TD><TD><INPUT TYPE="text" value="<?php echo $BeefToken; ?>" name="BeefToken"></TD></TR>
</TABLE><br>

    <h2><FONT COLOR="#FFFFFF">Notification Settings (Optional)</FONT></h2>


<TABLE BORDER=1><TR><TH COLSPAN="3">Slack</TH></TR><TR><TH>Webhook URL</TH><TH>Bot Token</TH><TH>Channel</TH></TR>
<TR><TD><INPUT TYPE="text" VALUE="<?php echo $SlackIncomingWebhookURL; ?>" NAME="SlackIncomingWebhookURL" placeholder="https://hooks.slack.com/services/T20G2WG7/..."></TD><TD><INPUT TYPE="text" VALUE="<?php echo $SlackBotOrLegacyToken; ?>" NAME="SlackBotOrLegacyToken" placeholder="xoxb-..."></TD><TD><INPUT TYPE="text" VALUE="<?php echo $slackchannel; ?>" NAME="slackchannel" placeholder="#phishing"></TD></TR>
</TABLE><BR>

<TABLE BORDER=1><TR><TH COLSPAN="2">Discord</TH></TR><TR><TH>Webook URL</TH><TH>Channel</TH></TR>
<TR><TD><INPUT TYPE="text" VALUE="<?php echo $DiscordWebhook; ?>" NAME="DiscordWebhook"></TD><TD><INPUT TYPE="text" VALUE="<?php echo $DiscordChannel; ?>" NAME="DiscordChannel"></TD></TR>
</TABLE><BR>

<TABLE BORDER=1><TR><TH>IFTTT</TH></TR><TR><TH>Webook URL</TH></TR>
<TR><TD><INPUT TYPE="text" VALUE="<?php echo $IFTTTWebhook; ?>" NAME="IFTTTWebhook"></TD></TR>
</TABLE><BR>

<TABLE BORDER=1><TR><TH>Desktop Notifications</TH></TR><TR><TD><BUTTON>Enable Web Alerts</BUTTON></TD></TR>
</TABLE><BR>

<br>

<INPUT TYPE="submit" VALUE="Save Settings!">

</FORM>



<?php

$conn->close();

?>

</CENTER>
</BODY>
</HTML>
