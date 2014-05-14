<?php
if(file_exists("system_config.php")) include("system_config.php"); else exit;

/* Registration Type (Automatic or Manual) 
 1 -> Automatic Registration (Users will receive activation code and they will be automatically approved after clicking activation link)
 0 -> Manual Approval (Users will not receive activation code and you will need to approve every user manually)
*/
$flag = 0;  // set 0 or 1

define("COOKIE_TIME_OUT", 10); //specify cookie timeout in days (default is 10 days)
define('SALT_LENGTH', 9); // salt for password



/**** PAGE PROTECT CODE  ********************************
This code protects pages to only logged in users. If users have not logged in then it will redirect to login page.
If you want to add a new page and want to login protect, COPY this from this to END marker.
Remember this code must be placed on very top of any html or php page.
********************************************************/

function page_protect()
{
	session_start();

	global $mysql_hostname,$mysql_username,$mysql_password,$mysql_dbname; 

	/* Secure against Session Hijacking by checking user agent */
	if (isset($_SESSION['HTTP_USER_AGENT']))
	{
	    if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT']))
	    {
		logout();
		exit;
	    }
	}

	// before we allow sessions, we need to check authentication key - ckey and ctime stored in database

	/* If session not set, check for cookies set by Remember me */
	if (!isset($_SESSION['username'])) 
	{
		if(isset($_COOKIE['username']) && isset($_COOKIE['userkey']))
		{
			/* we double check cookie expiry time against stored in database */
			$conn = mysql_connect($mysql_hostname, $mysql_username, $mysql_password);

			if(! $conn )
			{
			  	die('Could not connect: ' . mysql_error());
			}
			mysql_select_db($mysql_dbname);
			$qry = "SELECT ckey,ctime FROM users where username='$cookie_username'";
			$cookie_username  = filter($_COOKIE['username']);
			$rs_ctime = mysql_query($qry,$conn);
			list($ckey,$ctime) = mysql_fetch_row($rs_ctime);
			mysql_close($conn);

			// coookie expiry
			if( (time() - $ctime) > 60*60*24*COOKIE_TIME_OUT) 
			{
				logout();
			}

			/* Security check with untrusted cookies - dont trust value stored in cookie. 		
			/* We also do authentication check of the `ckey` stored in cookie matches that stored in database during login*/

			 if( !empty($ckey) && isUserID($_COOKIE['username']) && $_COOKIE['userkey'] == sha1($ckey)  ) 
			{
			 	  session_regenerate_id(); //against session fixation attacks.
				  $_SESSION['username'] = $_COOKIE['username'];
				  $_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);				  
			} 
			else
			{
			   logout();
			}

		}
		else 
		{
			header("Location: index.php");
			exit();
		}
	}
}



function filter($data) {
	$data = trim(htmlentities(strip_tags($data)));
	
	if (get_magic_quotes_gpc())
		$data = stripslashes($data);
	
	$data = mysql_real_escape_string($data);
	
	return $data;
}



function EncodeURL($url)
{
	$new = strtolower(ereg_replace(' ','_',$url));
	return($new);
}

function DecodeURL($url)
{
	$new = ucwords(ereg_replace('_',' ',$url));
	return($new);
}

function ChopStr($str, $len) 
{
    if (strlen($str) < $len)
        return $str;

    $str = substr($str,0,$len);
    if ($spc_pos = strrpos($str," "))
            $str = substr($str,0,$spc_pos);

    return $str . "...";
}	

function isEmail($email)
{
  return preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $email) ? TRUE : FALSE;
}

function isUserID($username)
{
	if (preg_match('/^[a-z\d_]{5,20}$/i', $username))
	{
		return true;
	} 
	else
	{
		return false;
	}
}	
 
function isURL($url) 
{
	if (preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url))
	{
		return true;
	} 
	else
	{
		return false;
	}
} 

function checkPwd($x,$y) 
{
	if(empty($x) || empty($y) ) { return false; }
	if (strlen($x) < 4 || strlen($y) < 4) { return false; }

	if (strcmp($x,$y) != 0) 
	{
		return false;
	} 
	return true;
}

function GenPwd($length = 7)
{
  $password = "";
  $possible = "0123456789bcdfghjkmnpqrstvwxyz"; //no vowels
  
  $i = 0; 
    
  while ($i < $length) { 

    
    $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
       
    
    if (!strstr($password, $char)) { 
      $password .= $char;
      $i++;
    }

  }

  return $password;

}

function GenKey($length = 7)
{
  $password = "";
  $possible = "0123456789abcdefghijkmnopqrstuvwxyz"; 
  
  $i = 0; 
    
  while ($i < $length) { 

    
    $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
       
    
    if (!strstr($password, $char)) { 
      $password .= $char;
      $i++;
    }

  }

  return $password;

}


function logout()
{
	global $mysql_hostname,$mysql_username,$mysql_password,$mysql_dbname;
	session_start();

	$sess_username = strip_tags(mysql_real_escape_string($_SESSION['username']));
	$cook_username = strip_tags(mysql_real_escape_string($_COOKIE['username']));

	if(isset($sess_user_id) || isset($cook_user_id)) 
	{
		$conn = mysql_connect($mysql_hostname, $mysql_username, $mysql_password);

		if(! $conn )
		{
		  	die('Could not connect: ' . mysql_error());
		}
		mysql_select_db($mysql_dbname);
		mysql_query("UPDATE users SET ckey='', ctime='' where username='$sess_username' OR  username = '$cook_username'",$conn);
		mysql_close($conn);
	}		

	/************ Delete the sessions****************/
	unset($_SESSION['username']);
	unset($_SESSION['HTTP_USER_AGENT']);
	session_unset();
	session_destroy(); 

	/* Delete the cookies*******************/
	setcookie("username", '', time()-60*60*24*COOKIE_TIME_OUT, "/");
	setcookie("userkey", '', time()-60*60*24*COOKIE_TIME_OUT, "/");

	header("Location: index.php");
}

// Password and salt generation
function PwdHash($pwd, $salt = null)
{
    if ($salt === null)  
    {
        $salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
    }
    else    
    {
        $salt = substr($salt, 0, SALT_LENGTH);
    }
    return $salt . sha1($pwd . $salt);
}

?>
