<?php
if(file_exists("functions.php")) include("functions.php"); else exit;
class aqf
{
	public function register($firstname,$lastname,$email,$username,$password)
	{
		global $mysql_hostname,$mysql_username,$mysql_password,$mysql_dbname;
		$string = "abcdefghijklmnopqrstuvwxyz0123456789";
		for($i=0;$i<25;$i++)
		{
			$pos = rand(0,36);
			$str .= $string{$pos};
		}
	
		//return $str;

	        $flag=1;
		$authcode=$str;
		
		// First Name
		if (!preg_match("/^[a-z ,.'-]+$/i",$firstname))
		{
			$err_name='Please enter valid Firstname.';
			return $err_name;
		}
		
		// Last Name
		if (!preg_match("/^[a-z ,.'-]+$/i",$lastname))
		{		
			$err_name='Please enter valid Lastname.';
			return $err_name;
		}
		 
		// Email
		if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) 
		{
			$err_email = 'Please enter valid Email.';
			return $err_email;
		}
		 
		// Usename min 6 char max 20 char
		if (!preg_match('/^[a-z\d_]{6,20}$/i', $username))
		{
			$err_username = 'Please enter valid Username (minimum 6 characters)';
			return $err_username;
		}
		 
		// Password min 6 char max 20 char
		if (!preg_match("/^[a-z0-9_-~!@#$%^&*()]{6,20}$/i", $password))
		{
			$err_password = 'Please enter valid Password (minimum 6 char)[a-z0-9_-~!@#$%^&*()]';
			return $err_password;
		}

		


		//Filter out html entities to prevent XSS attacks
		$firstname = htmlentities($firstname);
		$lastname = htmlentities($lastname);
		$email = htmlentities($email);
		$username = htmlentities($username);
		$password = htmlentities($password);
		$authcode = htmlentities($authcode);
		$conn = mysql_connect($mysql_hostname, $mysql_username, $mysql_password);
	




		if(! $conn )
		{
		  	die('Could not connect: ' . mysql_error());
		}
		mysql_select_db($mysql_dbname);
	

		if(strlen($username) > 1)

			// stores sha1 of password
			$sha1pass = PwdHash($password);
			$query = "INSERT INTO users(username,firstname,lastname,email,password,authcode,flag) VALUES('$username','$firstname', '$lastname', '$email', '$sha1pass', '$authcode', '$flag')";
			

		if(!mysql_query($query,$conn))
		{
			//return mysql_errno();
			if(mysql_errno() == 1062)
			{
				return "Username or Email already registered";

			}
			else
			{
				return "Error creating account";

			}				
		}
		else
		{
						
			$path = dirname(__FILE__)."/users/";
			mkdir($path.$username);
			chmod($path.$username,0777);
			mkdir($path.$username."/Projects");
			chmod($path.$username."/Projects",0777);
			$dst = $path.$username;
			$src = $path."templates";
			$command = 'cp -a ' . $src . ' ' .$dst;
			$shell_result_output = shell_exec(escapeshellcmd($command));




			/***************************Verification Mail **************************/
			
			// Automatically collects the hostname or domain  like example.com) 
			$host  = $_SERVER['HTTP_HOST'];
			$host_upper = strtoupper($host);
			$path   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

			$a_link = "
				***** VERIFICATION LINK FOR COMPILEONE.COM *****\n
				http://$host$path/activate.php?user=$username&code=$authcode
				"; 

			$message = 
				"Hello,\n
				Thank you for registering with us. Here are your login details...\n

				User ID: $username
				Email: $email \n 
				Passwd: $password \n

				$a_link

				Thank You

				Administrator
				$host_upper
				______________________________________________________
				THIS IS AN AUTOMATED RESPONSE. 
				***DO NOT RESPOND TO THIS EMAIL****
				";

			mail($email, "Login Details", $message,"From: \"Compileone Member Registration\" <auto-reply@compileone.com>\r\n" ."X-Mailer: PHP/" . phpversion());

			return "Account created Successfully";

		}

		mysql_close($conn);
		

	}
}

if(isset($_POST['todo'])) {
	$aqf = new aqf();
	try {
		$rslt = null;
		switch($_POST['todo']) {
			case 'register':
				$firstname = $_POST['fname'];
				$lastname = $_POST['lname'];
				$email = $_POST['email'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$rslt = $aqf->register($firstname,$lastname,$email,$username,$password);
				break;
			default:
				throw new Exception('Unsupported operation: ' . $_POST['todo']);
				break;
		}
		header('Content-Type: application/json; charset=utf8');
		//json_encode — Returns the JSON representation of a value
		//$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5)
		//echo json_encode($arr);
		//{"a":1,"b":2,"c":3,"d":4,"e":5}

		echo json_encode($rslt);
	}
	catch (Exception $e) {
		header($_SERVER["SERVER_PROTOCOL"] . ' 500 Server Error');
		header('Status:  500 Server Error');
		echo $e->getMessage();
	}
	die();//exit the script
}

	

	
			
			
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Description" content="Register yourself on Compileone for Compile and Execute Programs Online - You can compile and run, execute your source code in more than 15 programming languages like Java, C, C++, Pascal,PHP, Perl, Ruby and Python,Haskell,Pike programs online using your browser." />
<meta name="Keywords" content="Register,Sign Up ,Sign In, Unix, Web, Compile, Run, Java, C, C++, PHP, Perl, Ruby,Haskell,Pike and Python Programs" />
<title>sign up</title>
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
	<div class="span2" style="margin-top:110px;">
   		<img src="./login.png" alt="CompileOne" height=200 width=200 style="float:left;"/>   
	</div>
	<div class="signup span8">
  
        <h2>Sign Up</h2>
	<form id="signup-form" method="post" novalidate="novalidate">
            <div class="control-group">
                <div class="controls controls-row">
                    <input class="span2" id="signup-firstname" name="fname" required="" placeholder="First Name" autofocus="autofocus" tabindex="1" type="text">
                    <input class="span2" id="signup-lastname" name="lname" required="" placeholder="Last Name" tabindex="2" type="text">
                </div>
                <div class="controls">
                    <div class="input-prepend" style="width:400px;">
                        <label class="control-label add-on" for="signup-email">Email</label>
                        <input data-original-title="" id="signup-email" name="email" tabindex="3" required="" type="email">
                    </div>
                </div>
            </div>

            <div class="control-group ">
                <div class="controls ">
                    <div class="input-prepend " style="width:400px;">
                        <label class="control-label add-on" for="signup-username">Username</label>
                        <input id="signup-username" name="username" tabindex="4" required="" type="text" >
                    </div>
                </div>
                   <div class="controls">
                    <div class="input-prepend input-append">
                        <label class="control-label add-on" for="signup-password">Password</label>
                        <input type="password" id="signup-password" name="password" tabindex="5" required pattern="{6,20}" 
                               title="Password must be 6 to 20 charcters long.">
                        <label class="checkbox add-on show-password" for="signup-show-password-checkbox">
                            <input type="checkbox" id="signup-show-password-checkbox" class="show-password-checkbox novalidate" 
                                   data-toggle="showpassword" data-target="#signup-password"> Show
                        </label>
                    </div>
                </div>
            </div>
		

            <div class="control-group text-center">
                <div class="controls">
		   	<span id="response" style="font-weight:bold"></span>
                    <button type="submit" tabindex="6" class="btn btn-block btn-large transitional">Create my account</button>

                </div>
            </div>
            
            <div class="control-group">
                <div class="controls text-center">
                    <div class="span2"> Already have an account? </div><a href="login.php">Log in here</a>.
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
					var fname = $('#signup-firstname').val();
					var lname = $('#signup-lastname').val();
					var email = $('#signup-email').val();
					var username = $('#signup-username').val();
					var password = $('#signup-password').val()
					$.post('register.php', {'todo':'register','fname':fname,'lname':lname,'email':email,'username':username,'password':password},function(dt){  
										var restore = dt; 
										if(dt.replace(/[\s+]/g, '') == "AccountcreatedSuccessfully")
										{
											$('#response').css("color","green");
										}
										else
										{
											$('#response').css("color","red");
										}

										$('#response').text(restore); 


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
