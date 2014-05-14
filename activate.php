<?php
if(file_exists("functions.php")) include("functions.php"); else exit;

	// username and password sent from form
	$username=$_GET['user'];
	$code=$_GET['code'];
	//Filter out html entities to prevent XSS attacks
	$username = htmlentities($username);

	// To protect MySQL injection (more detail about MySQL injection)
	$username = stripslashes($username);
	$username = mysql_real_escape_string($username);

	$conn = mysql_connect($mysql_hostname, $mysql_username, $mysql_password);

	if(! $conn )
	{
	  	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($mysql_dbname);

	$sql="UPDATE users SET flag=1 WHERE username='$username' and authcode ='$code'";
	$retval=mysql_query($sql,$conn);
	if(! $retval )
	{
  		die('Could not update data: ' . mysql_error());
	}
		
	mysql_close($conn);
		
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Password Recovery</title>

<link href="assets/css/bootstrap-with-responsive-1200-only.css" rel="stylesheet" type="text/css" />
<link href="assets/css/compileone.css" rel="stylesheet" type="text/css" />
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="logo/favicon.ico"/>
<style type="text/css">
	.navbar-fixed-top,.navbar-fixed-bottom{position:fixed;right:0;left:0;z-index:1030;margin-bottom:0;}
         .navbar-inner{
			 background:#F4F4F4;
				font-size:14px;
				height:40px;
			 }
			 .navbar-inner > a:hover{color:#666;}

	a:hover{
			
			color:#08c;
		}
		
</style>

</head>

<body>

<?php include 'header.php' ?>
	<script type="text/javascript" src="assets/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="assets/js/jquery_002.js"></script>
        <script type="text/javascript" src="assets/js/jquery_003.js"></script>
        <script type="text/javascript" src="assets/js/mailcheck.js"></script>
    	<script type="text/javascript" src="assets/js/application.js"></script>
<div class="container">
    <div class="row">
	<div class="span2" style="margin-top:70px;">
	&nbsp;
	</div>
   		<div class="span8">
  <h3><font color="green">  Your account successfully verified</font></h3>
    </div>
    </div>
<script>
	$("#signup-form").submit(function(){
					$('#response').text(""); 
					var username = $('#signup-username').val();

					$.post('forgetpass.php', {'todo':'login','username':username},function(dt){  
										if(dt == "Reset Password Link sent Successfully please check your Email account")
										{
										        $('#response').css("color","green");
                                                                                        $('#response').text(dt);
 
										}
												

										else
										{
											$('#response').css("color","red");
											$('#response').text(dt);
										} 
										 });
						return false;
		
					});
	$("#drop-sign").click(function(){
				var username = $('#username').val();
				var password = $('#password').val();
				var remember = $('#remember').is(':checked')
				$.post('login.php', {'todo':'login','username':username,'password':password,'remember':remember},function(dt){  
									if(dt == "true")
									{
										window.location = "home.php"; 
									}
									else
									{
										window.location = "login.php"; 
									} 
									 });
					return false;
	
				});
	

</script>

<?php include 'footer.php' ?>
</body>
</html>
