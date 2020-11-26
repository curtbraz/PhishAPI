<?php

ob_start();
require 'config/index.php';
ob_end_clean();

$i = 1;

while ($i < 12){

$cmd2 = "curl -s ".$APIDomain.":3000/api/logs?token=".$BeefToken." --insecure";

exec($cmd2,$output2);

$beefarray = array();

$beefarray = json_decode($output2[0], true);

$beefarray = $beefarray["logs"];

foreach($beefarray as $id){
if($id["logtype"] == "Zombie"){

$dateevent = strtotime($id["date"]);
$datenow = strtotime("now");

$datediff = $datenow - $dateevent;

if($datediff <= 5){

$message = ">*BeEF Hook!* ".$id["event"]." [".$APIDomain.":3000/ui/authentication]";

// Execute Slack Incoming Webhook
$cmd = 'curl -s -X POST --data-urlencode \'payload={"channel": "'.$slackchannel.'", "username": "BeEFBot", "text": "'.$message.'", "icon_emoji": ":cow:"}\' '.$SlackIncomingWebhookURL.'';

echo $message;

exec($cmd);

}

}
}

sleep(5);

$i = $i + 1;

unset($cmd2);
unset($output2);
unset($beefarray);
unset($dateevent);
unset($datenow);
unset($datediff);
unset($message);
unset($cmd);

}
?>
