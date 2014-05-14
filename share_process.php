<?php
if(file_exists("functions.php")) include("functions.php"); else exit;



public function show($codefilename)
{
	global $mysql_hostname, $mysql_username, $mysql_password,$mysql_dbname;

	$host  = $_SERVER['HTTP_HOST'];
	$spath   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$editor_serverpath = $host.$spath;

	$chroot_env = "/var/www/jstreetest/demo/filebrowser/env";
	$sql = "SELECT count(*) as num FROM submissions WHERE codefilename='".$codefilename."'";
	$sql_fetch = "SELECT * FROM submissions WHERE codefilename='".$codefilename."'";

	$conn = mysql_connect($mysql_hostname, $mysql_username, $mysql_password);
	if(! $conn )
	{
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($mysql_dbname);

	$check = mysql_query( $sql, $conn);
	$row = mysql_fetch_array($check, MYSQL_ASSOC);
					
	if($row['num'] != 0)
	{	
		$result = mysql_query( $sql_fetch, $conn);
		$ret = mysql_fetch_array($result, MYSQL_ASSOC);
		mysql_close($conn);
		$f0 = fopen($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stdin.txt","r");
		$stdin  = fread($f0,filesize($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stdin.txt"));

		$f1 = fopen($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stdout.txt","r");
		$stdout  = fread($f1,filesize($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stdout.txt"));
		$f2 = fopen($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stderr.txt","r");
		$stderr = fread($f2,filesize($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stderr.txt"));
		
		$f3 = fopen($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . $codefilename . "." . $ret['ext'] ,"r");
		$code_data  = fread($f3,filesize($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . $codefilename . "." . $ret['ext']));

		if($stdout == false)
			$stdout = "";
		if($stderr == false)
			$editor_stderr = "";	
		if($stdin == false)
			$stdout = "";

		$response = array('status' => $ret['status'], 'exec_time' => $ret['exec_time'],'code' => $code_data,  'stdin' => $stdin, 'stdout' => $stdout, 'stderr' => $stderr, 'serverpath' => $serverpath, 'codefilename' => $ret['codefilename']);
		return $response;
	
		
	}
	else
	{
		header("Location : http://www.google.com");
	}
	mysql_close($conn);	
}





if(isset($_POST['aqf'])) {

		$codefilename = $_POST['aqf'];
		$rslt = show($codefilename);
		echo json_encode($rslt);

		die();
		
}
