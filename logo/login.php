<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="assets/css/bootstrap-with-responsive-1200-only.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/compileone.css" rel="stylesheet" type="text/css" />
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="logo/favicon.ico"/>
<style type="text/css">
         .navbar-inner{
			 background:#F4F4F4;
				font-size:14px;
				height:40px;
			 }
			 .navbar-inner > a:hover{color:#666;}
			

.navbar-inner1 {			 background:#F4F4F4;
				font-size:14px;
				height:40px;
}
a:hover{
	color:#08c;
	font-size:16px;
	}
</style>
</head>

<body>
<?php include 'header.php' ?>

<div class="thebackground2">
	<div class="container">
		<div class="row">
			<div id="signin-box">

		<form method="post" action="login" class="signin-form">		
			<div class="control-group">
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on rel-tooltip" title="Username"><i class="icon-user"></i></span>
						<input class="input" id="username" name="username" value="pankaj9310" placeholder="Username" type="text">
					</div>
				</div>
			</div>
    		
    		<div class="control-group">
    			<div class="controls">
    				<div class="input-prepend">
    					<span class="add-on rel-tooltip" title="Password"><i class="icon-lock"></i></span>
    					<input class="input" id="password" name="password" value="" placeholder="Password" type="password">			
    				</div>
    			</div>
    		</div>
    		
			<label class="nocntent checkbox" for="remember">
				<input name="remember" value="yes" id="remember" checked="checked" type="checkbox"> Stay logged in			</label>
			
			<input name="next" value="L2FjY291bnQvbG9naW4=" type="hidden">
			
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-large"><i class="icon-signin"></i> Sign in</button>
				</div>
			</div>
			
			<div>
				<a href="http://compileone.com/forgot.php">Forgot Password?</a>
			</div>
			<div>
				New user? <a href="register.php">Sign up</a>
			</div>
						
		</form>			</div>
		</div>
	</div>
	<!-- <div style="position: relative; font-size: 40px; top: -20px; margin: 0px auto; width: 100px; z-index: 5;">ideone</div> -->
</div>
<?php include 'footer.php' ?>
</body>
</html>
