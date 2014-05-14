<?php
if(file_exists("functions.php")) include("functions.php"); else exit;

function check()
{	
	global $mysql_hostname,$mysql_username,$mysql_password,$mysql_dbname;
	// username and password sent from form
	$username=$_POST['username'];
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





	$sql="SELECT * FROM users WHERE username='$username' or email='$username'";
	$result=mysql_query($sql,$conn);

	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);

	// If result matched $username table row must be 1 row
//	echo "count".$count;
	if($count==1)
	{
		$ret = mysql_fetch_array($result, MYSQL_ASSOC);

		//authenticated user
		$email = $ret['email'];
		$username = $ret['username'];
		$authcode = $ret['authcode'];
	//	echo $username."\n";
	//	echo $email;
				/***************************Verification Mail **************************/
			
			// Automatically collects the hostname or domain  like example.com) 
			$host  = $_SERVER['HTTP_HOST'];
			$host_upper = strtoupper($host);
			$path   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

			$a_link = "
				***** PASSWORD RESET LINK FOR WWW.COMPILEONE.COM *****\n
				http://$host$path/recoverpass.php?user=$username&code=$authcode
				"; 

			$message = 
				"Hello,\n
				Here are your login details...\n

				User ID: $username
				Email: $email \n 
				

				$a_link

				Thank You

				Administrator
				$host_upper
				______________________________________________________
				THIS IS AN AUTOMATED RESPONSE. 
				***DO NOT RESPOND TO THIS EMAIL****
				";

			mail($email, "Reset Your Compileone Password", $message,"From: \"Compileone Password Recovery\" <auto-reply@compileone.com>\r\n" ."X-Mailer: PHP/" . phpversion());

		echo "Reset Password Link sent Successfully please check your Email account";

		
	}
	else 
	{
		mysql_close($conn);
		echo "Username does not exists";
	}

}
if(isset($_POST['todo'])) 
{
	if($_POST['todo'] == "login")
	{
		check();
	}
	die();	
}
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
   		<img src="./login.png" alt="CompileOne" height=200 width=200 style="float:left;"/>   
	</div>
	<div class="signup span8">
  
        <h2>Password Reset</h2>
	<form id="signup-form" method="post" novalidate="novalidate">


            <div class="control-group ">
                <div class="controls ">
                    <div class="input-prepend " style="width:400px;">
                        <label class="control-label add-on" for="signup-username">Username</label>
                        <input id="signup-username" name="username" tabindex="1"  type="text" >
                    </div>
                </div>

			
		 <span id="response" style="font-weight:bold"></span>
		
           <div class="control-group">
                <div class="controls">
			
                    <button type="submit" tabindex="3" class="btn btn-large btn-primary transitional">SUBMIT</button>
                    
                    
                </div>
            </div>
            
            <div class="control-group">
                <div class="controls text-center">
                    <div class="span"> New Account? </div><a href="register.php">Register here</a>.
                </div>
            </div>
	</form>
	</div>

    </div><!--/ .signup -->
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
