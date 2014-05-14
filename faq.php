
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FAQ CompileOne</title>

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

<?php
   if(file_exists("functions.php")) include("functions.php"); else exit;
   session_start();

if(isset($_GET['operation'])) {
	try {
		$rslt = null;
		switch($_GET['operation']) {
			case 'logout':
				logout();
				break;
			default:
				throw new Exception('Unsupported operation: ' . $_GET['operation']);
				break;
		}
		header('Content-Type: application/json; charset=utf8');
		echo json_encode($rslt);
	}
	catch (Exception $e) {
		header($_SERVER["SERVER_PROTOCOL"] . ' 500 Server Error');
		header('Status:  500 Server Error');
		echo $e->getMessage();
	}
	die();
}



   	if(isset($_SESSION['username']))
	{	
		include('header-logout.php'); 
	}
	else
	{
		include('header.php'); 
	}
 ?>
<script>
	$('#signout').click(function(){
		 	$.get('?operation=logout',function(dt){window.location = "index.php";});

		});

	$("#drop-sign").click(function(){
				$('#response').text(""); 
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

	<script type="text/javascript" src="assets/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="assets/js/jquery_002.js"></script>
        <script type="text/javascript" src="assets/js/jquery_003.js"></script>
    	<script type="text/javascript" src="assets/js/application.js"></script>
<div class="container">
    <div class="row">
	<div class="span1">
	&nbsp;
	</div>
	<div class=" span9">
	<a href="#a">Q1 > What is CompileOne ?</a>
		<p>
			CompileOne is an online compiler and debugging tool which allows you to compile source code and execute it online in more than 15 programming languages.
		</p>
 	<a href="#">Q2 > I don't know how to write programs on CompileOne. Are there any samples available?</a>
	<p>	
		Yes, your will find many sample programs in our <a href="sample.php">samples section.</a>
               
                </p>  	
	<a href="#">Q3 > Are there any memory or time constraints for the submitted programs?</a>
	<p>
	Yes, they are as follows:<ul><li>
    	compilation time: 10 seconds,</li><li>
    	execution time: 1 or 5 seconds (for not logged in users) or 1 or 5 or 10 or 15 seconds (for registered users),</li><li>
    	memory usage: 256 MB.</li></ul>
	</p>
	<a href="#">Q4 > Can I access the Internet from my program?</a>
	<p>No, access to the network is blocked.</p>
	<a href="#">Q5 > How long my codes will be stored on CompileOne?</a>
	<p>Forever.<br/>
	For registered user we provide cloud storage </br>
	You can manage your code in well organized pattern like file and folder you can access your code anytime in future.
	</p>
	<a href="#">Q6 > What is the size limit for the source code, input and output?</a>
	<p> 256 kB.</p>
	<a href="#">Q7 > What should I do when I get internal error?</a>
	<p>Resubmit your code once or twice. If that doesn't help please contact us.</p>
	<a href=#>Q8 > How can I get in touch with you?</a>
	<p>Write at compileone1@gmail.com .</p>




	</div>
</div>
</div>
<?php include 'footer.php' ?>
</body>

</html>
