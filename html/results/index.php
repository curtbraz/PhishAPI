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
<style>
table.blank th {

}
table.blank td {

}
</style>
</HEAD>
<script>
function copyuser(id) {
    const str = document.getElementById(id).innerText;
    const el = document.createElement('textarea');
    el.value = str;
    el.setAttribute('readonly', '');
    el.style.position = 'absolute';
    el.style.left = '-9999px';
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
}
</script>
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
  </div></FORM><br><br>
<CENTER>
<?php

// Read Database Connection Variables
require_once '../../config.txt';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_REQUEST['deleteproject'])){

// Show Credentails for the Selected Project
$sql = "CALL RemoveProject('".$_REQUEST['deleteproject']."');";
$result = $conn->query($sql);

}

// If the Project is Not Already Selected..
if(!isset($_REQUEST['project'])){

// Show Unique Projects (Not Including Blanks)
$sql1 = "CALL CheckProjects();";
$result1 = $conn->query($sql1);
?>

<?php
// Show Project Drop Down Selection
?>
    <h2><font color="#FFFFFF">Select Project</FONT></h2>
<FORM METHOD="POST" ACTION="<?php echo $_SERVER['PHP_SELF'];?>">
<SELECT NAME="project">

<?php
    // output data of each row
    while($row1 = $result1->fetch_assoc()) {
//$pw = $row["pass"];
echo "<option value=\"".$row1["location"]."\">".$row1["location"]."</option>";
    }

?>
</SELECT>
<INPUT TYPE="submit" value="Go!">
</FORM>
<?php
}



// If a Project is Selected Already After Posting to Self...
if(isset($_REQUEST['project'])){ $project = $_REQUEST['project'];

if(isset($_REQUEST['DELETE'])){
	$timestamp = $_REQUEST['timestamp'];

$sqldelrec = "CALL RemoveRecord('$project','$timestamp');";
$resultdelrec = $conn->query($sqldelrec);

}

if(isset($_REQUEST['deleteproject'])){

$projectdelname = $_REQUEST['deleteproject'];

// Show Credentails for the Selected Project
$sqldel = "CALL RemoveProject('$projectdelname');";
$resultdel = $conn->query($sqldel);
      
}

// Show Credentails for the Selected Project
$sql = "CALL GetRecords('$project');";
$result = $conn->query($sql);

?>
    <h2><FONT COLOR="#FFFFFF">Stolen Credentials</FONT></h2>


<TABLE class="blank">
<TR>
<TD class="blank"><br>
<FORM METHOD="POST" ACTION="<?php echo $_SERVER['PHP_SELF'];?>">
<input type="hidden" name="deleteproject" value="<?php echo $project; ?>">
<input type="submit" value="Delete Project" onclick="return confirm('Are you sure?')" />
</FORM>
</TD>
<TD class="blank"><br>
<FORM METHOD="POST" ACTION="report.php">
<input type="hidden" name="project" value="<?php echo $project; ?>">
<input type="submit" value="Password Audit Report">
</FORM>
</TD>
</TR>
</TABLE>

<br>


<TABLE BORDER=1><TR><TH>Username</TH><TH>Password</TH><TH>Time</TH><TH>IP</TH><TH>Project</TH><TH>Token</TH><TH style="word-wrap: break-word;
max-width: 150px;">Hash</TH><TH>Extra Field</TH><TH>Actions</TH></TR>
<?php

$i = 1;

    // output data of each row
    while($row = $result->fetch_assoc()) {
//$pw = $row["pass"];
$inputfields = "<input type=\"hidden\" name=\"project\" value=\"".$project."\"><input type=\"hidden\" name=\"timestamp\" value=\"".$row['entered']."\">";
echo "<tr><td style=\"text-align:right\" id=\"user".$i."\">".$row["username"]."<button id=\"btn\" onclick=\"copyuser('user".$i."');\"><img src=\"../images/clipboard-outline.svg\" height=\"20px\"/></button></td><td style=\"text-align:right\" id=\"pass".$i."\">".base64_decode($row["password"])."<button id=\"btn\" onclick=\"copyuser('pass".$i."');\"><img src=\"../images/clipboard-outline.svg\" height=\"20px\"/></button></td><td>".$row["entered"]."</td><td>".$row["ip"]."</td><td>".$row["location"]."</td><td>".$row["Token"]."</td><td>".$row["Hash"]."</td><td>".$row["extra"]."</td><td><form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\"><input type=\"submit\" value=\"Delete\" name=\"DELETE\">".$inputfields."</td></form></tr>";

$i = $i + 1;
    }

printf($conn->error);

}

$conn->close();
?></TABLE>
</CENTER>
</BODY>
</HTML>
