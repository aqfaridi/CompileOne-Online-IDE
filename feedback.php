<?php

if(file_exists("functions.php")) include("functions.php"); else exit;

	function spamcheck($field) {
	  // Sanitize e-mail address
	  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
	  // Validate e-mail address
	  if(filter_var($field, FILTER_VALIDATE_EMAIL)) {
	    return TRUE;
	  } else {
	    return FALSE;
	  }
	}

	  if (isset($_POST["email"])) {
	    // Check if "from" email address is valid
	    $mailcheck = spamcheck($_POST["email"]);
	    if ($mailcheck==FALSE) {
	      //echo "Invalid input";
	    } else {
	      $email = $_POST["email"]; // sender
	      $name = $_POST["fname"];
	      $number = $_POST["number"];
	      $message = $_POST["comment"];
	      // message lines should not exceed 70 characters (PHP rule), so wrap it
	      $message = wordwrap($message, 3000);
	      


		// Email
		if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) 
		{
			$err_email = 'Please enter valid Email.';
			echo $err_email;
		}
		else if(!preg_match('/^[0-9]{10,10}$/', $number))
		{
			$err_mobile = 'Please enter valid Mobile Number.';
			echo $err_mobile;
		}
		else if(strlen($message) < 5)
		{
			$err_message = 'Please write valid text in Comment';
			echo $err_message;
		}
		else
		{

		      	global $mysql_hostname,$mysql_username,$mysql_password,$mysql_dbname;
			$conn = mysql_connect($mysql_hostname, $mysql_username, $mysql_password);
			if(! $conn )
			{
			  	die('Could not connect: ' . mysql_error());
			}
			mysql_select_db($mysql_dbname);
			$query = "INSERT INTO feedback(name,email,mobile,comment) VALUES('$name','$email', '$number', '$message')";
			$retval = mysql_query( $query, $conn);
			if(! $retval )
			{
			  die('Could not enter data: ' . mysql_error());
		          echo "Error Occured !!";
			}
			else
			{
				echo "Thanks for your feedback !!";
			}
			mysql_close($conn);

		      // send mail
		      mail("pankaj9310@gmail.com",$name."  ".$number,$message,"From: $email\n");
		      //echo "Thank you for sending us feedback";
		}
	    }
	  }

?>
