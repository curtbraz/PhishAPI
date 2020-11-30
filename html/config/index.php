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

if ($APIDomain == ""){$APIDomain = "NULL";}
if ($BeefHookJSURL == ""){$BeefHookJSURL = "NULL";}
if ($BeefToken == ""){$BeefToken = "NULL";}
if ($SlackIncomingWebhookURL == ""){$SlackIncomingWebhookURL = "NULL";}
if ($SlackBotOrLegacyToken == ""){$SlackBotOrLegacyToken = "NULL";}
if ($slackchannel == ""){$slackchannel = "NULL";}
if ($DiscordWebhook == ""){$DiscordWebhook = "NULL";}
if ($DiscordChannel == ""){$DiscordChannel = "NULL";}
if ($IFTTTWebhook == ""){$IFTTTWebhook = "NULL";}

$APIDomain = str_replace(' ', '', $APIDomain); 
$BeefHookJSURL = str_replace(' ', '', $BeefHookJSURL);
$BeefToken = str_replace(' ', '', $BeefToken);
$SlackIncomingWebhookURL = str_replace(' ', '', $SlackIncomingWebhookURL);
$SlackBotOrLegacyToken = str_replace(' ', '', $SlackBotOrLegacyToken);
$slackchannel = str_replace(' ', '', $slackchannel);
$DiscordWebhook = str_replace(' ', '', $DiscordWebhook);
$DiscordChannel = str_replace(' ', '', $DiscordChannel);
$IFTTTWebhook = str_replace(' ', '', $IFTTTWebhook);
    
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
<link rel="stylesheet" href="../main.css">
<link rel="stylesheet" href="../w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

$DiscordWebhook = "Coming Soon!";
$DiscordChannel = "Coming Soon!";
$IFTTTWebhook = "Coming Soon!";

$testmessage = "";

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

if ($APIDomain == "NULL"){$APIDomain = "";}
if ($BeefHookJSURL == "NULL"){$BeefHookJSURL = "";}
if ($BeefToken == "NULL"){$BeefToken = "";}
if ($SlackIncomingWebhookURL == "NULL"){$SlackIncomingWebhookURL = "";}
if ($SlackBotOrLegacyToken == "NULL"){$SlackBotOrLegacyToken = "";}
if ($slackchannel == "NULL"){$slackchannel = "";}
if ($DiscordWebhook == "NULL"){$DiscordWebhook = "";}
if ($DiscordChannel == "NULL"){$DiscordChannel = "";}
if ($IFTTTWebhook == "NULL"){$IFTTTWebhook = "";}

$DiscordWebhook = "Coming Soon!";
$DiscordChannel = "Coming Soon!";
$IFTTTWebhook = "Coming Soon!";

}

?>

<script src="PNClient.js"></script>
    <script>
        function Load() {
            var msg = 'Secure context: ';
            msg += window.isSecureContext ? 'true<br/>' : 'false<br/>'; 
            msg += 'Notification: '; 
            msg += ('Notification' in window) ? 'defined<br/>' : 'not defined<br/>'; 
            msg += 'PushManager: '; 
            msg += ('PushManager' in window) ? 'defined<br/>' : 'not defined<br/>'; 
            msg += 'serviceWorker: '; 
            msg += ('serviceWorker' in navigator) ? 'defined<br/>' : 'not defined<br/>';
            msg += 'Notification.permission: ' + window.Notification.permission + '<br/>';
            
            window.Notification.permission
            
            document.getElementById('msg').innerHTML = msg;
            
            if (window.Notification.permission === "denied") {
                document.getElementById('subscribe').innerHTML = 'Permission was denied in the past...';
            } else {
                var strMsg;
                pnSubscribed()
                    .then(function(subscribed) {
                        if (subscribed) {
                            document.getElementById('msg').innerHTML = 'PUSH Notifications are subscribed<br/><br/>' + msg;
							var btn = document.getElementById("push");
							btn.innerHTML = 'Disable Web Alerts on This Device';
                        } else {
                            document.getElementById('msg').innerHTML = 'PUSH Notifications are NOT subscribed<br/><br/>' + msg;
							var btn = document.getElementById("push");
							btn.innerHTML = 'Enable Web Alerts on This Device';
                        }           
                    });
            }
        }
    </script>
<script>

function change(){
    	Load();
	var btn = document.getElementById("push");
	var msg1 = document.getElementById("msg1")
	if (btn.innerHTML == 'Enable Web Alerts on This Device'){
	msg1.innerHTML = 'Enabled!<br><br>';
	pnSubscribe();
	btn.innerHTML = 'Disable Web Alerts on This Device';}
	else {
	msg1.innerHTML = 'Disabled!<br><br>';
	pnUnsubscribe();
	btn.innerHTML = 'Enable Web Alerts on This Device';}
}
</script>

</HEAD>
<body onload="Load()">
<FORM ACTION="../index.php" METHOD="GET">
  <div class="w3-dropdown-hover w3-right">
    <button class="w3-button w3-phishapi"><i class="fa fa-home fa-2x" aria-hidden="true" style="color: black;"></i> Home</button>
    <div class="w3-dropdown-content w3-bar-block w3-border" style="right:0">
      <a href="../index.php?fakesite=1" class="w3-bar-item w3-button"><i class="fa fa-user fa-1x" aria-hidden="true" style="color: black;"></i> Fake Portal</a>
      <a href="../phishingdocs/" class="w3-bar-item w3-button"><i class="fa fa-file-text fa-1x" aria-hidden="true" style="color: black;"></i> Weaponized Documents</a>
      <a href="../campaigns" class="w3-bar-item w3-button"><i class="fa fa-envelope fa-1x" aria-hidden="true" style="color: black;"></i> Email Campaigns</a>
          <a href="https://curtbraz.blogspot.com/2018/10/phishapi-tool-rapid-deployment-of-fake.html" class="w3-bar-item w3-button"><i class="fa fa-question-circle fa-1x" aria-hidden="true" style="color: black;"></i> Help / About</a>
          <a href="config/" class="w3-bar-item w3-button"><i class="fa fa-gear fa-1x" aria-hidden="true" style="color: black;"></i> Settings</a>
    </div>
  </div></FORM><br><br>
<CENTER>
<?php 

$apitest = $APIDomain."?project=PhishAPI%20Test%20Project&redirect=&slackbotname=PhishBot&slackemoji=%3Afishing_pole_and_fish%3A&username=TestUser&password=TestPass";

$testmessage = "<h3><FONT COLOR=\"#FFFFFF\">Test your notifications here:</h3><a href=\"".$apitest."\">".$apitest."</a></FONT><BR><BR>";

echo $testmessage; 

?>
    <h2><FONT COLOR="#FFFFFF">API Settings</FONT></h2>



<FORM METHOD="POST" ACTION="<?php $_SERVER["PHP_SELF"]; ?>">

<TABLE BORDER=1><TR><TH>PhishAPI Address</TH><TH>Beef Hook Address</TH><TH>Beef API Token</TH></TR>
<TR><TD><input type="text" value="<?php echo $APIDomain; ?>" name="APIDomain" placeholder="https://phishapi.com"></TD><TD><input type="text" value="<?php echo $BeefHookJSURL; ?>" name="BeefHookJSURL" placeholder="Use PhishAPI Address if Same"></TD><TD><INPUT TYPE="text" value="<?php echo $BeefToken; ?>" name="BeefToken"></TD></TR>
</TABLE><br>

    <h2><FONT COLOR="#FFFFFF">Notification Settings (Optional)</FONT></h2>

<TABLE BORDER=1><TR><TH>Web Push Notifications</TH></TR><TR><TD><div id="msg1"></div><BUTTON TYPE="button" name="push" id="push" onclick="change();">Enable Web Alerts</BUTTON></tr><tr><td>
<div id="msg"></div></TD></TR>
</TABLE><BR>

<TABLE BORDER=1><TR><TH COLSPAN="3">Slack</TH></TR><TR><TH>Webhook URL</TH><TH>Bot Token</TH><TH>Channel</TH></TR>
<TR><TD><INPUT TYPE="text" VALUE="<?php echo $SlackIncomingWebhookURL; ?>" NAME="SlackIncomingWebhookURL" placeholder="https://hooks.slack.com/services/T20G2WG7/..."></TD><TD><INPUT TYPE="text" VALUE="<?php echo $SlackBotOrLegacyToken; ?>" NAME="SlackBotOrLegacyToken" placeholder="xoxb-..."></TD><TD><INPUT TYPE="text" VALUE="<?php echo $slackchannel; ?>" NAME="slackchannel" placeholder="#phishing"></TD></TR>
</TABLE><BR>

<TABLE BORDER=1><TR><TH COLSPAN="2">Discord</TH></TR><TR><TH>Webook URL</TH><TH>Channel</TH></TR>
<TR><TD><INPUT TYPE="text" VALUE="<?php echo $DiscordWebhook; ?>" NAME="DiscordWebhook" disabled></TD><TD><INPUT TYPE="text" VALUE="<?php echo $DiscordChannel; ?>" NAME="DiscordChannel" disabled></TD></TR>
</TABLE><BR>

<TABLE BORDER=1><TR><TH>IFTTT</TH></TR><TR><TH>Webook URL</TH></TR>
<TR><TD><INPUT TYPE="text" VALUE="<?php echo $IFTTTWebhook; ?>" NAME="IFTTTWebhook" disabled></TD></TR>
</TABLE><BR>

<br>

<INPUT TYPE="submit" VALUE="Save Settings!">

</FORM>



<?php

$conn->close();

$APIDomainCmd = str_replace("/", "\/", $APIDomain);

$ReplaceSubscriber = "sed -i 's/\(URL=\"\)[^\"]*/\1URL=\"".trim($APIDomainCmd)."\/config\/PNSubscriber.php/' /var/www/html/config/PNServiceWorker.js";

$ReplaceSubscriber = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $ReplaceSubscriber);

//echo $ReplaceSubscriber;

exec($ReplaceSubscriber,$SubscriberOutput);

//var_dump($SubscriberOutput);

?>

</CENTER>
</BODY>
</HTML>
