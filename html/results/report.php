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
<link rel="manifest" href="../../images/favicon/manifest.json">
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
	  <a href="https://curtbraz.blogspot.com/2018/10/phishapi-tool-rapid-deployment-of-fake.html" class="w3-bar-item w3-button"><i class="fa fa-question-circle fa-1x" aria-hidden="true" style="color: black;"></i> Help / About</a>
	  <a href="../config.php" class="w3-bar-item w3-button"><i class="fa fa-gear fa-1x" aria-hidden="true" style="color: black;"></i> Settings</a>
    </div>
  </div></FORM><br><br>

<CENTER>
<?php

// Read Database Connection Variables
ob_start();
require '../config.php';
ob_end_clean();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_REQUEST['project'])){
	
$project = $_REQUEST['project'];


if(isset($_REQUEST["numemails"])){

$numemails = $_REQUEST["numemails"];

// Create connection
$connupdate = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($connupdate->connect_error) {
    die("Connection failed: " . $connupdate->connect_error);
}

// Update Email Count
$sqlupdate = "CALL UpdateEmailsSent('$project','$numemails');";

$resultupdate = $connupdate->query($sqlupdate);

$connupdate->close();

	
}



// Passwords By Length
$sql1 = "CALL ReportPWsByLength('$project');";

$result1 = $conn->query($sql1);
?>

    <h2><font color="#FFFFFF">Password Audit Report</FONT></h2><br><br>

<?php
// Get/Update Emails Sent for Campaign

// Create connection
$connstats = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($connstats->connect_error) {
    die("Connection failed: " . $connstats->connect_error);
}

$sqlstats = "CALL GetEmailsSent('$project');";

$resultstats = $connstats->query($sqlstats);

    // output data of each row
    while($rowstats = $resultstats->fetch_assoc()) {
$emailssent = $rowstats["numemails"];
    }
	
if(!isset($emailssent)){$emailssent = "0";}

?>
	
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"><font color="#FFFFFF"><b>Total Emails Sent: </b></font><input name="numemails" type="text" value="<?php echo $emailssent; ?>" size="5">&nbsp;<input type="hidden" name="project" value="<?php echo $project; ?>"><input type="submit" value="Update"></form><br>

<?php 
$connstats->close();
?>

	<TABLE BORDER=1><TR><TH COLSPAN=2>Passwords by Length</TH></TR>
	<TR><TH>Length</TH><TH>Number of Passwords</TH></TR>

<?php
    // output data of each row
    while($row1 = $result1->fetch_assoc()) {
//$pw = $row["pass"];
echo "<TR><TD>".$row1["Length"]."</TD><TD>".$row1["Number of Passwords"]."</TD></TR>";
    }
	
$conn->close();

?>	
</TABLE><br><br>
	
	
	
	
	
<?php
// Password Complexity Rank

// Create connection
$conn2 = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}

$sql2 = "CALL ReportPWComplexity('$project');";

$result2 = $conn2->query($sql2);
?>
	
	<TABLE BORDER=1><TR><TH COLSPAN=2>Passwords Complexity Rank</TH></TR>
	<TR><TH>Number of Passwords</TH><TH>Strength Rating</TH></TR>

<?php
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
		$strength = "";
		$color = "";
		if ($row2["Strength Raiting"] == "100"){$strength = "Strong"; $color="Green";}
		if ($row2["Strength Raiting"] == "50"){$strength = "Fair"; $color="Yellow";}
		if ($row2["Strength Raiting"] == "25"){$strength = "Weak"; $color="Red";}
echo "<TR><TD>".$row2["# of Passwords"]."</TD><TD bgcolor=\"".$color."\">".$strength."</TD></TR>";
    }
$conn2->close();
	
?>
</TABLE><br><br>







<?php
// Non-Unique Passwords

// Create connection
$conn3 = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn3->connect_error) {
    die("Connection failed: " . $conn3->connect_error);
}

$sql3 = "CALL ReportNonUniquePWs('$project');";

$result3 = $conn3->query($sql3);
?>
	
	<TABLE BORDER=1><TR><TH COLSPAN=2>Non-Unique Passwords</TH></TR>
	<TR><TH>Password</TH><TH>Occurrences</TH></TR>

<?php
    // output data of each row
    while($row3 = $result3->fetch_assoc()) {
echo "<TR><TD>".$row3["Password"]."</TD><TD>".$row3["Occurrences"]."</TD></TR>";
    }
$conn3->close();
	
?>
</TABLE><br><br>







<?php
// Have I Been Pwned Hit Count

// Create connection
$conn4 = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn4->connect_error) {
    die("Connection failed: " . $conn4->connect_error);
}

$sql4 = "CALL ReportHIBPHitCount('$project');";

$result4 = $conn4->query($sql4);
?>
	
	<TABLE BORDER=1><TR><TH COLSPAN=2>HaveIBeenPwned Hit Count</TH></TR>
	<TR><TH>Password</TH><TH># of Known Reuses</TH></TR>

<?php
    // output data of each row
    while($row4 = $result4->fetch_assoc()) {
echo "<TR><TD>".base64_decode($row4["Password"])."</TD><TD>".number_format($row4["# of Known Reuses"])."</TD></TR>";
    }
$conn4->close();
	
?>
</TABLE><br><br>







<?php
// Number of Compromised Passwords

// Create connection
$conn5 = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn5->connect_error) {
    die("Connection failed: " . $conn5->connect_error);
}

$sql5 = "CALL ReportHIBPNumberReuse('$project');";

$result5 = $conn5->query($sql5);
?>
	
	<TABLE BORDER=1><TR><TH>Compromised Passwords</TH></TR>

<?php
    // output data of each row
    while($row5 = $result5->fetch_assoc()) {
$compromisedpws = $row5["Total"];
$hits = $row5["Hits"];
echo "<TR><TD>".$hits." / ".$compromisedpws."</TD></TR>";
    }
$conn5->close();
	
?>
</TABLE><br><br>








<?php
}
?>


<TABLE BORDER=1><TR><TH>Overall Campaign Success Rate</TH></TR>

<TR><TD><?php $percentagesuccess = ($compromisedpws / $emailssent) * 100; echo round($percentagesuccess, 2)."%"; ?></TD></TR>

</TABLE>
</CENTER>
</BODY>
</HTML>
