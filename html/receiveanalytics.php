<?php

// Pulls in Required Connection Variables
ob_start();
require 'config/index.php';
ob_end_clean();

if(isset($_REQUEST['IP'])){$ip = $_REQUEST['IP'];}else{$ip = "";}
if(isset($_REQUEST['URL'])){$URL = $_REQUEST['URL'];}else{$URL = "";}
if(isset($_REQUEST['Org'])){$Org = $_REQUEST['Org'];}else{$Org = "";}
if(isset($_REQUEST['Status'])){$Status = $_REQUEST['Status'];}else{$Status = "";}
if(isset($_REQUEST['ExtraID'])){$ExtraID = $_REQUEST['ExtraID'];}else{$ExtraID = "";}
$time = date('Y-m-d h:m:s', time()); 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Inserts Received Visits
$queryvisits = "CALL InsertPageVisits('$URL','$ip','$Org','$Status','$ExtraID','$time');";
//echo $queryvisits;
$result = $conn->query($queryvisits);

printf($conn->error);
$conn->close();

?>