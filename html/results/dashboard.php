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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 
</HEAD>
<script>

Notification.requestPermission().then(function(result) {
  console.log(result);
});

function NewNotification(username,project) {
		var img = '../../images/favicon/android-icon-192x192.png';
		var text = 'Caught Another Phish at '+ project + '! (' + username + ')';
		var notification = new Notification('PhishBot', { body: text, icon: img });
}


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
	  <a href="https://curtbraz.blogspot.com/2018/10/phishapi-tool-rapid-deployment-of-fake.html" class="w3-bar-item w3-button"><i class="fa fa-question-circle fa-1x" aria-hidden="true" style="color: black;"></i> Help / About</a>
	  <a href="../config/" class="w3-bar-item w3-button"><i class="fa fa-gear fa-1x" aria-hidden="true" style="color: black;"></i> Settings</a>
    </div>
  </div></FORM><br><br>
<CENTER>
<?php

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




// Show Credentails for the Selected Project
$sql = "SELECT * FROM targets;";
$result = $conn->query($sql);

?>
    <h2><FONT COLOR="#FFFFFF">Targets</FONT></h2>


<!-- <TABLE class="blank">
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
</TABLE> -->

<br>

<TABLE id="StolenCreds" BORDER=1><TR><TH>ID</TH><TH>Client</TH><TH>Email</TH><TH>Name</TH><TH>Title</TH><TH>Department</TH><TH style="word-wrap: break-word;
max-width: 150px;">Division</TH><TH>Email Opens</TH><TH>Link Clicks</TH><TH>Credentials</TH></TR>
<tbody id="table_data">


<?php

$i = 1;

    // output data of each row
    while($row = $result->fetch_assoc()) {
//$pw = $row["pass"];
echo "<tr><td>".$row["ID"]."</td><td>".$row["Client"]."</td><td>".$row["Email"]."</td><td>".$row["Name"]."</td><td>".$row["Title"]."</td><td>".$row["Department"]."</td><td>".$row["Division"]."</td><td>".$row["EmailOpens"]."</td><td>".$row["LinkClicks"]."</td><td>".$row["Creds"]."</td></tr>";

$i = $i + 1;
    }

printf($conn->error);



$conn->close();
?></tbody></TABLE>

<script>




function fetchdata(){
	
var table = document.getElementById('StolenCreds');
lastseenval = table.rows[1].cells[2].innerHTML;
uid = Math.floor(Math.random() * 1000000);
	
  $.ajax({
   url:"callrecordstargets.php",
   method:"POST",
   data: {project: '<?php echo $project; ?>', lastseen: lastseenval},
   dataType:"json",
   beforeSend:function(){
    $('#add').attr('disabled', 'disabled');
   },
   success:function(data){
    $('#add').attr('disabled', false);
    if(data.username)
    {
		
	 NewNotification(data.username,'Test');
		
     var html = '<tr>';
     html += '<td style="text-align:right" id="user'+uid+'">'+data.username+'<button id="btn" onclick="copyuser(\'user'+uid+'\');"><img src="../images/clipboard-outline.svg" height="20px"/></button></td>';
	 html += '<td style="text-align:right" id="pass'+uid+'">'+atob(data.password)+'<button id="btn" onclick="copyuser(\'pass'+uid+'\');"><img src="../images/clipboard-outline.svg" height="20px"/></button></td>';
	 html += '<td>'+data.entered+'</td>';
	 html += '<td>'+data.ip+'</td>';
	 html += '<td><?php echo $project; ?></td>';
	 html += '<td>'+data.Token+'</td>';
	 if(data.Hash == null)
	 { data.Hash = ''; }
	 html += '<td>'+data.LinkClicks+'</td>';
     html += '<td>'+data.extra+'</td>';
	 html += '<?php echo "<td><form method=\"post\" action=\"".$_SERVER['PHP_SELF']."\"><input type=\"submit\" value=\"Delete\" name=\"DELETE\">".$inputfields."</td></form></tr>"; ?>';
     $('#table_data').prepend(html);
     $('#add_details')[0].reset();
    }
   }
});
 
}

$(document).ready(function(){
 setInterval(fetchdata,2500);
});
</script>

<!--<script>
$(document).ready(function(){
 
 $('#add_details').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"callrecords.php",
   method:"POST",
   data: {project: 'Test'},
   dataType:"json",
   beforeSend:function(){
    $('#add').attr('disabled', 'disabled');
   },
   success:function(data){
    $('#add').attr('disabled', false);
    if(data.username)
    {
     var html = '<tr>';
     html += '<td>'+data.username+'</td>';
     html += '<td>'+data.password+'</td></tr>';
     $('#table_data').prepend(html);
     $('#add_details')[0].reset();
    }
   }
  })
 });
 
});
</script>-->

</CENTER>
</BODY>
</HTML>
