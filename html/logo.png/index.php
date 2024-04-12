<?php
// open the file in a binary mode
$name = 'signature.png';
$fp = fopen($name, 'rb');

// send the right headers
header("Content-Type: image/png");
header("Content-Length: " . filesize($name));
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Pulls in Required Connection Variables
ob_start();
require '../config/index.php';
ob_end_clean();

$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$Org = $details->org;
if(isset($_REQUEST['imageid'])){$ExtraID = $_REQUEST['imageid'];}else{$ExtraID = "";}
$time = date('Y-m-d h:m:s', time()); 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Inserts Received Visits
$queryvisits = "CALL InsertEmailOpens('$ip','$Org','$ExtraID','$time');";
//echo $queryvisits;
$result = $conn->query($queryvisits);

printf($conn->error);
$conn->close();

$message = "Email opened by ".$ip." (".$Org.")!";

// Set Slack Information Here       ************** MAKE SURE YOU SET THIS ****************
$cmd = 'curl -s -X POST --data-urlencode \'payload={"channel": "#phishing", "username": "PhishBot", "text": "'.$message.'", "icon_emoji": ":email:"}\' https://hooks.slack.com/services/SLACK_WEBHOOK_HERE';
//echo $cmd;
exec($cmd);

// dump the picture and stop the script
fpassthru($fp);
exit;
?>
