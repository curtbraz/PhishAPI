<?php

$project = $_REQUEST['project'];
$lastseen = $_REQUEST['lastseen'];

// Read Database Connection Variables
ob_start();
require '../config/index.php';
ob_end_clean();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CALL GetAjaxRecords('$project','$lastseen');";
$result = $conn->query($sql);

//echo $sql;

    // output data of each row
    while($row = $result->fetch_assoc()) {
//$pw = $row["pass"];
//echo $row["username"]."\r\n".$row["password"]."\r\n";
if($row != null){
echo json_encode($row);
}
	}


	
//printf($conn->error);

$conn->close();	

?>
