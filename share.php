<?php
session_start();

if(file_exists("functions.php")) include("functions.php"); else exit;
$filepath = dirname(__FILE__);
//ini_set — Sets the value of a configuration option
ini_set('open_basedir', dirname(__FILE__) . DIRECTORY_SEPARATOR);//Limit the files that can be accessed by PHP to the specified directory-tree, including the file itself. 		
	
	$template = array(
		    "cpp" => "cpp.cpp",
		    "java" => "java.java",
		     "sh" => "bash.sh",
		      "bf"   => "brainfuck.bf",
                       "c"   => "c.c",
			"cs" => "csharp.cs",
			"hs" => "haskell.hs",
			"js" => "javascript.js",
			"pas" => "pascal.pas",
			"pl"  => "perl.pl",
			"php" => "php.php",
			"pike" => "pike.pike",
			"txt" => "plaintext.txt",
			"py" => "python.py",
			"rb" => "ruby.rb"
		);

class fs
{
	protected $base = null;



	protected function real($path) {
		$temp = realpath($path);  //The realpath() function returns the absolute pathname.
		return $temp;
		if(!$temp) { throw new Exception('Path does not exist: ' . $path); }
		if($this->base && strlen($this->base)) {
                        //strpos(haystack,needle) — Find the position of the first occurrence of a substring in a string   
			//$x !== $y 	True if $x is not equal to $y, or they are not of the same type
			if(strpos($temp, $this->base) !== 0) { throw new Exception('Path is not inside base ('.$this->base.'): ' . $temp); }
		}
		return $temp;
	}

	protected function path($id) {
	
		//str_replace (search , replace , $subject )
 		//This function returns a string or an array with all occurrences of (search) in (subject) replaced with the given (replace) value. 
		$id = str_replace('/', DIRECTORY_SEPARATOR, $id);
		//trim(str,"/")
		//trim "/" from begin and end of str	
		$id = trim($id, DIRECTORY_SEPARATOR);
		$id = $this->real($this->base . DIRECTORY_SEPARATOR . $id);
		return $id;
	}
	protected function id($path) {
		$path = $this->real($path);
		//substr(string,start)
		//Returns the portion of (string) specified by the (start)
		$path = substr($path, strlen($this->base));
		$path = str_replace(DIRECTORY_SEPARATOR, '/', $path);
		$path = trim($path, '/');
		return strlen($path) ? $path : '/';
	}

	public function __construct($base) {
		$this->base = $this->real($base);
		if(!$this->base) { throw new Exception('Base directory does not exist'); }
	}
	public function lst($id, $with_root = false) {
		$dir = $this->path($id);
		//scandir — List files and directories inside the specified path
		//@ suppresses error messages
		$lst = @scandir($dir);
		if(!$lst) { throw new Exception('Could not list path: ' . $dir); }
		$res = array();
		foreach($lst as $item) {

			if($item == '.' || $item == '..' || $item === null) { continue; }
			//preg_match(pattern,string)
			//preg_match() function searches string for pattern, returning true if pattern exists, and false otherwise. 
			$tmp = preg_match('([^ a-zа-я-_0-9.]+)ui', $item);
			if($tmp === false || $tmp === 1) { continue; }
			//is_dir — Tells whether the filename is a directory
			if(is_dir($dir . DIRECTORY_SEPARATOR . $item)) {
				$res[] = array('text' => $item, 'children' => true,  'id' => $this->id($dir . DIRECTORY_SEPARATOR . $item), 'icon' => 'folder');
			}
			else {
				$res[] = array('text' => $item, 'children' => false, 'id' => $this->id($dir . DIRECTORY_SEPARATOR . $item), 'type' => 'file', 'icon' => 'file file-'.substr($item, strrpos($item,'.') + 1));
			}
		}
		
		if($with_root && $this->id($dir) === '/') {
			//basename — Returns trailing name component of path
			$res = array(array('text' => basename($this->base), 'children' => $res, 'id' => '/', 'icon'=>'folder', 'state' => array('opened' => true, 'disabled' => true)));
		}
		return $res;
	}
	public function data($id) {
		if(strpos($id, ":")) {
			//array_map(callback,arr)
			//array_map() returns an array containing all the elements of arr after applying the callback function to each one
			//explode(delimiter,string)
			//Returns an array of strings, each of which is a substring of string formed by splitting it on boundaries formed by the string delimiter.
			$id = array_map(array($this, 'id'), explode(':', $id));
			return array('type'=>'multiple', 'content'=> 'Multiple selected: ' . implode(' ', $id));
		}
		$dir = $this->path($id);
		if(is_dir($dir)) {
			return array('type'=>'folder', 'content'=> $id);
		}
		if(is_file($dir)) {
			$ext = strpos($dir, '.') !== FALSE ? substr($dir, strrpos($dir, '.') + 1) : '';
			$dat = array('type' => $ext, 'content' => '');
			switch($ext) {
				case 'cpp':
				case 'java':
				case 'sh':
				case 'rb':
				case 'cs':
				case 'pl':
				case 'pike':
				case 'pas':
				case 'bf':
				case 'c':
				case 'py':
				case 'hs':
				case 'cpp':
				case 'txt':
				case 'md':
				case 'htaccess':
				case 'log':
				case 'sql':
				case 'php':
				case 'js':
				case 'json':
				case 'css':
				case 'html':
					//file_get_contents — Reads entire file into a string	
					$dat['content'] = file_get_contents($dir);
					break;
				case 'jpg':
				case 'jpeg':
				case 'gif':
				case 'png':
				case 'bmp':
					//finfo_open : Create a new fileinfo resource
					//finto_file : Return information about a file
					$dat['content'] = 'data:'.finfo_file(finfo_open(FILEINFO_MIME_TYPE), $dir).';base64,'.base64_encode(file_get_contents($dir));
					break;
				default:
					$dat['content'] = 'File extension not recognized: '.$this->id($dir);
					break;
			}
			return $dat;
		}
		throw new Exception('Not a valid selection: ' . $dir);
	}

	public function create_zip($files = array(),$destination = '',$overwrite = false) {
	
		if(file_exists($destination) && !$overwrite) { return false; }
		//vars
		$valid_files = array();
		//if files were passed in...
		if(is_array($files)) {
			//cycle through each file
			foreach($files as $file) {
				//make sure the file exists
				if(file_exists($file)) {
					$valid_files[] = $file;
				}
			}
		}
	
		//if we have good files...
		if(count($valid_files)) {
			//create the archive
			$zip = new ZipArchive();
			if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
				return false;
			}
			//add the files
			foreach($valid_files as $file) {
				$zip->addFile($file,$file);
			}
			//debug
			//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
		
			//close the zip -- done!
			$zip->close();
			//check to make sure the file exists
			return file_exists($destination);
		}
		else
		{
			return false;
		}
	}
	public	function recurse_zip($src,&$zip,$path_length) {
			$dir = opendir($src);
			while(false !== ( $file = readdir($dir)) ) {
			    if (( $file != '.' ) && ( $file != '..' )) {
				if ( is_dir($src . '/' . $file) ) {
				    $this->recurse_zip($src . '/' . $file,$zip,$path_length);
				}
				else {
				    $zip->addFile($src . '/' . $file,substr($src . '/' . $file,$path_length));
				}
			    }
			}
			closedir($dir);
		}
		//Call this function with argument = absolute path of file or directory name.
	public	function compress($src)
		{
			if(substr($src,-1)==='/'){$src=substr($src,0,-1);}
			$arr_src=explode('/',$src);
			$filename=end($src);
			unset($arr_src[count($arr_src)-1]);
			$path_length=strlen(implode('/',$arr_src).'/');
			$f=explode('.',$filename);
			$filename=$f[0];
				$filename=(($filename=='')? 'backup.zip' : $filename.'.zip');
			
			$filename = uniqid("aqf_").".zip";
			$zip = new ZipArchive;
			$res = $zip->open($filename, ZipArchive::CREATE);
			if($res !== TRUE){
				echo 'Error: Unable to create zip file';
				exit;}
			if(is_file($src)){$zip->addFile($src,substr($src,$path_length));}
			else{
				if(!is_dir($src)){
				     $zip->close();
				     @unlink($filename);
				     echo 'Error: File not found';
				     exit;}
			$this->recurse_zip($src,$zip,$path_length);}
			$zip->close();
			return $filename;
			//header("Location: $filename");
			//exit;
		}

	public function download($id) {
	

		$dir = $this->path($id);
		$files = array($dir);
		/*$files_to_zip = array(
			'preload-images/1.jpg',
			'preload-images/2.jpg',
			'preload-images/5.jpg',
			'kwicks/ringo.gif',
			'rod.jpg',
			'reddit.gif'
		);*/
		//if true, good; if false, zip creation failed 
		$file = $this->compress($dir);	
		return $file;
	}
	public function down($fname,$ext) {
		global $filepath;
		$dir = $filepath."/users/guest/Projects/".$fname.".".$ext;
		$file = $this->compress($dir);	
		return $file;
	}
	public function run($timelimit,$lang,$access,$input,$fname,$ext)
	{
		global $mysql_hostname,$mysql_username,$mysql_password,$mysql_dbname,$filepath;
		$host  = $_SERVER['HTTP_HOST'];
		$spath   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$serverpath = $host.$spath;
		$username = 'guest';
		$dir = $filepath."/users/guest/Projects/".$fname.".".$ext;
		$codefilename = uniqid("code_");
		$chroot_env = $filepath."/env";
		$chroot_user = $filepath;
		mkdir($chroot_env . DIRECTORY_SEPARATOR . $codefilename);
		chmod($chroot_env . DIRECTORY_SEPARATOR . $codefilename,0777);
		$cpath = $chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR .$codefilename.".".$ext;		
		//return $cpath;
		copy($dir,$cpath);
		//exec("cp " .$dir." ".$cpath);
		//exec("cp /var/www/jstreetest/demo/filebrowser/env/abc.txt /var/www/jstreetest/demo/filebrowser/env/xyz.txt");
		chmod($cpath,0777);
		//$input = substr($input,2);
		$input = trim($input,"\x01");

		$file = fopen($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stdin.txt","w");
		chmod($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stdin.txt",0777);	
		fwrite($file,$input);

		$fout = fopen($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stdout.txt","w");
		$ferr = fopen($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stderr.txt","w");
		chmod($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stdout.txt",0777);
		chmod($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stderr.txt",0777);
		fwrite($fout,"");
		fwrite($ferr,"");

		$conn = mysql_connect($mysql_hostname, $mysql_username, $mysql_password);
		if(! $conn )
		{
		  die('Could not connect: ' . mysql_error());
		}
		
		$path = $chroot_env . DIRECTORY_SEPARATOR . $codefilename;
		$sql = "INSERT INTO queue".
		       "(codefilename,username,langdB,ext,path,timelimit,access) " .
		       "VALUES ('".$codefilename."','".$username."','".$lang."','".$ext."','".$path."','".$timelimit."','".$access."')";
		
		mysql_select_db($mysql_dbname);
		$retval = mysql_query( $sql, $conn);
		
		if(! $retval )
		{
		  die('Could not enter data: ' . mysql_error());
		}
		//echo "Entered data successfully\n";
			
		
		//copy 
		//copy($dir,);
		//return "python " .$chroot_user. "/judge.py";

		
		exec("python " .$chroot_user. "/judge_53euopmne89bre.py",$out);

		$sql = "SELECT count(*) as num FROM submissions WHERE username='".$username."' AND codefilename='".$codefilename."'";
		$sql_fetch = "SELECT * FROM submissions WHERE username='".$username."' AND codefilename='".$codefilename."'";
		//$sql = "SELECT status,exec_time,stdin,stdout,stderr,error FROM submissions WHERE username='".$username."'";
		while(1)
		{
			sleep(1);
			$check = mysql_query( $sql, $conn);
			$row = mysql_fetch_array($check, MYSQL_ASSOC);
			
			if($row['num'] != 0)
			{	
				$result = mysql_query( $sql_fetch, $conn);
				$ret = mysql_fetch_array($result, MYSQL_ASSOC);
				mysql_close($conn);

				//hiding stderr.txt path shown
				$filepath = $chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stderr.txt";
				$ferr = fopen($filepath,"r");
				$error = fread($ferr,filesize($filepath));
				$rep = str_replace($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR .$codefilename, "main", $error);
				fclose($ferr);

				$ferr = fopen($filepath,"w");
				fwrite($ferr,$rep);
				fclose($ferr);
				/****************************/






				$f1 = fopen($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stdout.txt","r");
				$stdout  = fread($f1,filesize($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stdout.txt"));
				$f2 = fopen($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stderr.txt","r");
				$stderr = fread($f2,filesize($chroot_env . DIRECTORY_SEPARATOR . $codefilename . DIRECTORY_SEPARATOR . "stderr.txt"));
				if($stdout == false)
					$stdout = "";
				if($stderr == false)
					$stderr = "";	
				$response = array('status' => $ret['status'], 'exec_time' => $ret['exec_time'], 'stdout' => $stdout, 'stderr' => $stderr, 'serverpath' => $serverpath, 'codefilename' => $ret['codefilename']);
				return $response;				
				//return json_encode($response);
			}	
		}
		mysql_close($conn);	

	}

	public function create($id, $name, $mkdir = false) {
		$dir = $this->path($id);
		
		if(preg_match('([^ a-zа-я-_0-9.]+)ui', $name) || !strlen($name)) {
			throw new Exception('Invalid name: ' . $name);
		}
		if($mkdir) {
			mkdir($dir . DIRECTORY_SEPARATOR . $name);
			chmod($dir . DIRECTORY_SEPARATOR . $name,0777);
		}
		else {

			//file_put_contents(file,data) — Write a data to a file
			file_put_contents($dir . DIRECTORY_SEPARATOR . $name,"");
			chmod($dir . DIRECTORY_SEPARATOR . $name,0777);
		}
		return array('id' => $this->id($dir . DIRECTORY_SEPARATOR . $name));
	}
	public function template($ext) {

		global $template,$filepath;
			
		$upath = $filepath."/users/guest/templates/";
		$f_name = $upath . "notemplate";

		if (array_key_exists($ext, $template)) {
			$f_name = $upath . $template[$ext];
		}
		
		$buf_data = "";
		if(file_exists($f_name))
			{	$buf_data = file_get_contents($f_name);}
		
		return $buf_data;
		
	}
	public function save($data,$fname,$ext) {
		global $filepath;
		$dir = $filepath."/users/guest/Projects/".$fname.".".$ext;
		fopen($dir, "w");
		//file_put_contents(file,data) — Write a data to a file
		file_put_contents($dir,$data);
		//return $data;
	}
	public function rename($id, $name) {
		$dir = $this->path($id);
		if(preg_match('([^ a-zа-я-_0-9.]+)ui', $name) || !strlen($name)) {
			throw new Exception('Invalid name: ' . $name);
		}
		$new = explode(DIRECTORY_SEPARATOR, $dir);
		//array_pop — Pop the element off the end of array $new
		array_pop($new);
		array_push($new, $name);
		$new = implode(DIRECTORY_SEPARATOR, $new);
		if(is_file($new) || is_dir($new)) { throw new Exception('Path already exists: ' . $new); }
		rename($dir, $new);
		return array('id' => $this->id($new));
	}
	public function remove($id) {
		$dir = $this->path($id);
		if(is_dir($dir)) {
			//array_diff(array1,array2) : Compares array1 against one or more other arrays and returns the values in array1 that are not present in any of the other arrays. 
			foreach(array_diff(scandir($dir), array(".", "..")) as $f) {
				$this->remove($this->id($dir . DIRECTORY_SEPARATOR . $f));  //recursice call
			}
			rmdir($dir);
		}
		if(is_file($dir)) {
			//unlink — Deletes a file
			unlink($dir);
		}
		return array('status' => 'OK');
	}
	public function move($id, $par) {
		$dir = $this->path($id);
		$par = $this->path($par);
		$new = explode(DIRECTORY_SEPARATOR, $dir);
		$new = array_pop($new);
		$new = $par . DIRECTORY_SEPARATOR . $new;
		rename($dir, $new);
		return array('id' => $this->id($new));
	}
	public function copy($id, $par) {
		$dir = $this->path($id);
		$par = $this->path($par);
		$new = explode(DIRECTORY_SEPARATOR, $dir);
		$new = array_pop($new);
		$new = $par . DIRECTORY_SEPARATOR . $new;
		if(is_file($new) || is_dir($new)) { throw new Exception('Path already exists: ' . $new); }

		if(is_dir($dir)) {
			mkdir($new);
			foreach(array_diff(scandir($dir), array(".", "..")) as $f) {
				$this->copy($this->id($dir . DIRECTORY_SEPARATOR . $f), $this->id($new)); //recursive
			}
		}
		if(is_file($dir)) {
			copy($dir, $new);
		}
		return array('id' => $this->id($new));
	}

	public function getname()
	{
		return uniqid("guest_");
	}



	public function show($codefilename)
	{
		
		global $mysql_hostname, $mysql_username, $mysql_password,$mysql_dbname,$filepath;

		$host  = $_SERVER['HTTP_HOST'];
		$spath   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$editor_serverpath = $host.$spath;

		$chroot_env = $filepath."/env";
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
				$stderr = "";	
			if($stdin == false)
				$stdin = "";

			$response = array('code_lang' => $ret['langdB'], 'status' => $ret['status'], 'exec_time' => $ret['exec_time'], 'code_data' => $code_data,  'stdin' => $stdin, 'stdout' => $stdout, 'stderr' => $stderr, 'serverpath' => $serverpath, 'codefilename' => $ret['codefilename']);
			return $response;
		
			
		}
		else
		{
			header("Location : http://www.google.com");
		}
		mysql_close($conn);	
	}
}

//isset($var) :  Determine if a variable is set and is not NULL.If a variable has been unset with unset(), it will no longer be set.
//$_GET : An associative array of variables passed to the current script via the URL parameters. 
if(isset($_GET['operation'])) {
	// $fs /var/www/test/aqfaridi/
	$fs = new fs(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'users' . DIRECTORY_SEPARATOR . 'guest' . DIRECTORY_SEPARATOR);
	try {
		$rslt = null;
		switch($_GET['operation']) {
			case 'getname':
				$rslt = $fs -> getname();
				break;
			case 'get_node':
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
				$rslt = $fs->lst($node, (isset($_GET['id']) && $_GET['id'] === '#'));
				break;
			case "get_content":
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
				$rslt = $fs->data($node);
				break;
			case 'save_node':
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
				$rslt = $fs->save($node, isset($_GET['sdata']) ? $_GET['sdata'] : '');
				break;
			case 'temp_node':
				$ext = $_GET['ext'];
				$rslt = $fs->template($ext);
				break;
			case 'create_node':
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
				$rslt = $fs->create($node, isset($_GET['text']) ? $_GET['text'] : '', (!isset($_GET['type']) || $_GET['type'] !== 'file'));
				break;
			case 'rename_node':
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
				$rslt = $fs->rename($node, isset($_GET['text']) ? $_GET['text'] : '');
				break;
			case 'delete_node':
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
				$rslt = $fs->remove($node);
				break;
			case 'move_node':
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
				$parn = isset($_GET['parent']) && $_GET['parent'] !== '#' ? $_GET['parent'] : '/';
				$rslt = $fs->move($node, $parn);
				break;
			case 'copy_node':
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
				$parn = isset($_GET['parent']) && $_GET['parent'] !== '#' ? $_GET['parent'] : '/';
				$rslt = $fs->copy($node, $parn);
				break;
			case 'code_run':
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
				$timelimit = $_GET['tl'];
				$lang = $_GET['lang'];
				$access = $_GET['access'];
				$input = $_GET['stdin'];
				$rslt = $fs->run($node,$timelimit,$lang,$access,$input);
				break;
			case 'download_node':
				$node = isset($_GET['id']) && $_GET['id'] !== '#' ? $_GET['id'] : '/';
				$rslt = $fs->download($node);
				break;
			case 'down_node':
				$fname = $_GET['fname'];
				$ext = $_GET['ext'];
				$rslt = $fs->down($fname,$ext);
				break;
			default:
				throw new Exception('Unsupported operation: ' . $_GET['operation']);
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
	die();
}



if(isset($_POST['operation'])) {
	// $fs /var/www/test/aqfaridi/
	$fs = new fs(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'users' . DIRECTORY_SEPARATOR . 'guest' . DIRECTORY_SEPARATOR);
	try {
		$rslt = null;
		switch($_POST['operation']) {
			case 'code_run':
				$timelimit = $_POST['tl'];
				$lang = $_POST['lang'];
				$access = $_POST['access'];
				$input = $_POST['stdin'];
				$data = $_POST['sdata'];
				$fname = $_POST['fname'];
				$ext = $_POST['ext'];
				$rslt = $fs->save($data,$fname,$ext);
				$rslt = $fs->run($timelimit,$lang,$access,$input,$fname,$ext);
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


if(isset($_POST['aqf'])) {

	$fs = new fs(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'users' . DIRECTORY_SEPARATOR . 'guest' . DIRECTORY_SEPARATOR);
	try{
		$rslt = null;
		$codefilename = $_POST['aqf'];
		$rslt = $fs -> show($codefilename);
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

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

	<head>
	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width" />
<meta name="Description" content="Share your codes in secret mode on Compileone - You can compile and run, execute your source code in more than 15 programming 
s like Java, C, C++, Pascal,PHP, Perl, Ruby and Python,Haskell,Pike programs online using your browser." />
		<meta name="Keywords" content="Share,Unix, Web, Compile, Run, Java, C, C++, PHP, Perl, Ruby,Haskell,Pike and Python Programs" />
<base href="http://www.compileone.com/" />

		<link rel="stylesheet" href="dist/themes/default/style.min.css" />

		<style>
		html, body { background:#ebebeb; font-size:10px; font-family:Verdana; margin:0; padding:0; }
		#container { min-width:250px; margin:0px auto 0 auto; background:white; border-radius:0px; padding:0px; overflow:hidden; }
		#tree { float:left; min-width:250px; border-right:1px solid silver; overflow:auto; padding:0px 0; }
		#data { margin-left:320px; }
		#data textarea { margin:0; padding:0; height:100%; width:100%; border:0; background:white; display:block; line-height:18px; resize:none; }
		#data, #code { font: normal normal normal 12px/18px 'Consolas', monospace !important; }

		#tree .folder { background:url('./file_sprite.png') right bottom no-repeat; }
		#tree .file { background:url('./file_sprite.png') 0 0 no-repeat; }
		#tree .file-pdf { background-position: -32px 0 }
		#tree .file-as { background-position: -36px 0 }
		#tree .file-c { background-position: -72px -0px }
		#tree .file-iso { background-position: -108px -0px }
		#tree .file-htm, #tree .file-html, #tree .file-xml, #tree .file-xsl { background-position: -126px -0px }
		#tree .file-cf { background-position: -162px -0px }
		#tree .file-cpp { background-position: -216px -0px }
		#tree .file-cs { background-position: -236px -0px }
		#tree .file-sql { background-position: -272px -0px }
		#tree .file-xls, #tree .file-xlsx { background-position: -362px -0px }
		#tree .file-h { background-position: -488px -0px }
		#tree .file-crt, #tree .file-pem, #tree .file-cer { background-position: -452px -18px }
		#tree .file-php { background-position: -108px -18px }
		#tree .file-jpg, #tree .file-jpeg, #tree .file-png, #tree .file-gif, #tree .file-bmp { background-position: -126px -18px }
		#tree .file-ppt, #tree .file-pptx { background-position: -144px -18px }
		#tree .file-rb { background-position: -180px -18px }
		#tree .file-text, #tree .file-txt, #tree .file-md, #tree .file-log, #tree .file-htaccess { background-position: -254px -18px }
		#tree .file-doc, #tree .file-docx { background-position: -362px -18px }
		#tree .file-zip, #tree .file-gz, #tree .file-tar, #tree .file-rar { background-position: -416px -18px }
		#tree .file-js { background-position: -434px -18px }
		#tree .file-css { background-position: -144px -0px }
		#tree .file-fla { background-position: -398px -0px }
		</style>

	    <link href="./doc/site/images/favicon.ico" rel="icon" type="image/x-icon">    


		<style>	
			.fullScreen .fullScreen-editor{ 
				height:100%;
				width: auto!important;
				border: 0;
				margin-left: 0%;
				margin-top:0%;
				position: absolute !important;
				margin-bottom: 0;
				top:100px;
				bottom:0;
				left: 0;
				right: 0;
				
				}
	
			.fullScreen {
				overflow: scroll;
			}


#loader{
   visibility:hidden;
}

#f1_upload_form{
   height:100px;
}

#f1_error{
   font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
   font-weight:bold;
   color:#FF0000;
}

#f1_ok{
   font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
   font-weight:bold;
   color:#00FF00;

}

#f1_upload_form {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: normal;
	color: #666666;
}

#f1_upload_process{
   z-index:100;
   visibility:hidden;
   position:absolute;
   text-align:center;
   width:400px;
}
.aa{color:green;text-decoration:none;}

body .modal {
    /* new custom width */
    width: 760px;
    /* must be half of the width, minus scrollbar on the left (30px) */
    margin-left: -360px;
}

	   	</style>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CompileOne</title>
<link href="assets/css/all.css" rel="stylesheet" type="text/css" />
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
<link href="assets/css/compileone.css" rel="stylesheet" type="text/css" />
<link href="assets/css/bootstrap-with-responsive-1200-only.css" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" type="image/x-icon" href="logo/favicon.ico"/>
<style type="text/css">
         .navbar-inner{
			 background:#F4F4F4;
				font-size:14px;
				height:40px;
				min-width:1160px;
			 }
			 .navbar-inner > a:hover{color:#666;}

	
				.btn-input {
			   display: block;	
			}

			.btn-input .btn.form-control {
			    text-align: left;
			}

			.btn-input .btn.form-control span:first-child {
			   left: 10px;
			   overflow: hidden;
			   position: absolute;
			   right: 25px;
		
			}

			.btn-input .btn.form-control .caret {
			   margin-top: -1px;
			   position: absolute;
			   right: 10px;
			   top: 50%;
			}

			.btn-group  li > a:hover{background-color:#ccc;color:black;}

			.code-panel {
				    border:1px solid #ccc;
				    z-index:1px;
				    background: none repeat scroll 0 0 white;
				    box-shadow: 0 0 10px #CCCCCC;
				    margin-bottom: 10px;
				}

	   
			

		a:hover{
			color:#08c;
			
			}
			option:hover{background-color:#ccc;color:black;}
				/*make not responsive  */
	.btn-toolbar{
				min-width: 1200px;
				margin:0px;
				padding: 0px;				
				padding: 0px;				
				}		
.row{
min-width:1120px;}			
.span3{
min-width:220px;
}
.span5{
min-width:600px;
}

</style>

		</head>

<body>
<?php
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
<!-- tooltip on top javascript function   -->
		       		<script>
				$(document).ready(function(){
    				$("[rel=tooltip]").tooltip({ placement: 'top'});
				});

			
				</script>
<div class="btn-toolbar no-focus code-editor-toolbar">
			<div class="btn-group no-focus">
				<button id="btn-import" class="btn no-focus disabled"  rel="tooltip" data-placement="top" title="Import Your Files">
				<i class="icon-upload"></i>
				<span>Import</span>
				</button>
					<button id="btn-export" class="btn no-focus" rel="tooltip" data-placement="top" title="Export Your Files">
					<i class="icon-download"></i>
					<span>Export</span>
					</button>
					<button id="btn-share" class="btn no-focus" rel="tooltip" data-placement="top" title="Share Your Code">
					<i class="icon-book"></i>
					<span>Share</span>
					</button>
			
					<button  class="btn no-focus disabled">
						
						<span>&nbsp;&nbsp;</span>
					</button>

						<button id="btn-new" class="btn no-focus disabled"  rel="tooltip" data-placement="top" title="Create New File">
						<i class="icon-plus-sign"></i>
						<span>New</span>
						</button>
					<button id="btn-save" class="btn no-focus disabled"  rel="tooltip" data-placement="top" title="Save Your Code">
					<i class="icon-download-alt"></i>
					<span>Save</span>
					</button>
							<button id="btn-del " class="btn no-focus disabled"  rel="tooltip" data-placement="top" title="Delete Selected File">
					<i class="icon-trash"></i>
					<span>Delete</span>
					</button>

					<button id="btn-undo" class="btn no-focus"  rel="tooltip" data-placement="top" title="Undo Your Action">
					<i class="icon-step-backward"></i>
					<span>Undo</span>
					</button>
						<button id="btn-redo" class="btn no-focus"  rel="tooltip" data-placement="top" title="Redo Your Action">
						<i class="icon-step-forward"></i>
						<span>Redo</span>
						</button>
						<button id="btn-scr" class="btn no-focus"  rel="tooltip" data-placement="top" title="Full Screen">
							<i class="icon-zoom-in"></i>
							<span>Zoom</span>
							</button>
					<button id="btn-run" class="btn no-focus"  rel="tooltip" data-placement="top" title="Run Your Code">
							<i class="icon-play"></i>
							<span>Run</span>
					</button>
	
		       
					<button  class="btn no-focus disabled">
						
						<span>&nbsp;&nbsp;</span>
					</button>




               <div class="btn-group" style="margin-top:3px;">
                 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"  rel="tooltip" data-placement="top" title="Select Font Size">
		           <span data-bind="label">Font</span>&nbsp;<span class="caret"></span>
		         </button>
		         <ul id="fontsize" class="dropdown-menu" role=>
				<li><a href="#">10px</a></li>
				<li><a href="#">11px</a></li>
				<li><a href="#">12px</a></li>
				<li><a href="#">13px</a></li>
				<li><a href="#">14px</a></li>
				<li><a href="#">16px</a></li>
				<li><a href="#">18px</a></li>
				<li><a href="#">20px</a></li>
				<li><a href="#">24px</a></li>
		         </ul>
				 
				 
               </div>
             
      

   


    
               <div class="btn-group">
                 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"  rel="tooltip" data-placement="top" title="Select Editor Theme">
               		           <span data-bind="label">Theme</span>&nbsp;<span class="caret"></span>
		         </button>
		         <ul id="theme" class="dropdown-menu">
				<li class="nav-header">Bright</li>
				<li><a href="#">Chrome</a></li>
				<li><a href="#">Clouds</a></li>
				<li><a href="#">Dawn</a></li>
				<li><a href="#">Dreamweaver</a></li>
				<li><a href="#">Eclipse</a></li>
				<li><a href="#">GitHub</a></li>
				<li><a href="#">Solarized_Light</a></li>
				<li><a href="#">TextMate</a></li>
				<li><a href="#">Tomorrow</a></li>
				<li><a href="#">Xcode</a></li>
				<li><a href="#">Kuroir</a></li>
				<li><a href="#">KatzenMilch</a></li>
				<li class="nav-header">Dark</li>
				<li><a href="#">Ambiance</a></li>
				<li><a href="#">Chaos</a></li>
				<li><a href="#">Clouds Midnight</a></li>
				<li><a href="#">Cobalt</a></li>
				<li><a href="#">Merbivore</a></li>
				<li><a href="#">Monokai</a></li>
				<li><a href="#">Terminal</a></li>
				<li><a href="#">Twilight</a></li>

		         </ul>
               </div>
          
               <div class="btn-group">
                 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"  rel="tooltip" data-placement="top" title="Select Key Bin‌ding">
               		           <span data-bind="label">Editor</span>&nbsp;<span class="caret"></span>
		         </button>
		         <ul id="keybinding" class="dropdown-menu">
				<li><a href="#">Custom</a></li>
				<li><a href="#">Vim</a></li>
				<li><a href="#">Emacs</a></li>
			</ul>
		</div>

               <div class="btn-group">
                 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"  rel="tooltip" data-placement="top" title="Select Syntax Highlighter" disabled>
               		           <span data-bind="label">Highlight</span>&nbsp;<span class="caret"></span>
		         </button>
		         <ul id="mode" class="dropdown-menu">
				<li><a href="#">C_Cpp</a></li>
				<li><a href="#">Java</a></li>
				<li><a href="#">Python</a></li>
				<li><a href="#">Csharp</a></li>
				<li><a href="#">Haskell</a></li>
				<li><a href="#">JavaScript</a></li>
				<li><a href="#">ObjectiveC</a></li>
				<li><a href="#">Pascal</a></li>
				<li><a href="#">PHP</a></li>
				<li><a href="#">Ruby</a></li>
				<li><a href="#">Bash</a></li>
			</ul>
		</div>


			</div>
	</div>

<div id="container-fluid">
	<div class="row">
			
			<div class="span3" id="language" style="height:auto;" >
				<h4 style="margin-left:20px; align:center;color:#666">Language:</h4>
				<span id="code_lang" style="font-weight:bold;margin-left:100px;"></span>	
			<br/>
			<br/>
			<span style="margin-left:50px;">Timelimit : </span>
			<input class="form-control" name="tl" type="radio" value="1s" checked />1s     <input class="form-control" name="tl" type="radio" value="5s" />5s
		

				 <div class "span" >
				 <br/>
				 <button id="btn-run2" class="btn no-focus btn-large"  rel="tooltip" data-placement="top" title="Run Your Code" style="margin-left:35px;">
							<i class="icon-play"></i>
							<span>Compile & Run</span>
					</button>
					</div>
			
			
			
</div>
			<div class="span5 code-panel" id="editor"  style="height:1200px;width: 50%;  margin-left:12px;"></div>

			
			<!--    zoom -->
<div class="modal fade" id="pan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
        
      <div class="modal-body" >
        <textarea id="stdin1" style="font-weight:bold; width:700px; resize:none;" rows="15" value= ></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="sync();" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="stdoutshow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
        
      <div class="modal-body">
        <textarea id="stdout1" style="font-weight:bold; width:700px; resize:none;" readonly rows="15" wrap="off" value= ></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="sync1();" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="stderrshow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
        
      <div class="modal-body">
        <textarea id="stderr1" style="font-weight:bold; width:700px; resize:none;" readonly rows="15" value=   ></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="sync2();" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



			<div class="span3 code-panel">
				<i class="icon-chevron-left"></i><span style="font-weight:bold;color:#666;">Enter Input(stdin):</span><button data-toggle="modal"class="pull-right" data-target="#pan" onclick="resync();"><i class="icon-zoom-in" style="float:right; margin-right:5px;"  ></i></button><br/>
				<textarea id="stdin" style="font-weight:bold; width:255px; resize:none;" rows="8" ></textarea>
				<script> 
				function sync() {
						
						var text1 = document.getElementById("stdin1").value;
						document.getElementById("stdin").value = text1;
						
					}
					
				function resync() {
						
						var text1 = document.getElementById("stdin").value;
						document.getElementById("stdin1").value = text1;
						
					}
				
				</script>
				
				<i class="icon-chevron-right"></i><span style="font-weight:bold;color:#666;">Output(stdout):</span>&nbsp;&nbsp;<img id='loading' src="./loading.gif" height=12 width=12/>&nbsp;<span id="status" style="font-weight:bold;"></span><span id="exec_time" style="font-weight:bold;color:#666;"></span></span>
				<button data-toggle="modal"class="pull-right" data-target="#stdoutshow" onclick="resync1();"><i class="icon-zoom-in" style="float:right; margin-right:5px;"  ></i></button><br/>
				<textarea id="stdout" style="font-weight:bold; width:255px; resize:none;" readonly rows="8" wrap="off" ></textarea>
				
					<script> 
				function sync1() {
						
						var text1 = document.getElementById("stdout1").value;
						document.getElementById("stdout").value = text1;
						
					}
					
				function resync1() {
						
						var text1 = document.getElementById("stdout").value;
						document.getElementById("stdout1").value = text1;
						
					}
				
				</script>
				
				<i class="icon-trash"></i><span style="font-weight:bold;color:#666;">Error(stderr):</span></span>
				<button data-toggle="modal"class="pull-right" data-target="#stderrshow" onclick="resynco();"><i class="icon-zoom-in" style="float:right; margin-right:5px;"  ></i></button><br/>
				<textarea id="stderr" style="font-weight:bold; width:255px; resize:none; " rows="7" class="field span3" readonly></textarea>
						<script> 
				
					
				function resynco() {
						
						var text1 = document.getElementById("stderr").value;
						document.getElementById("stderr1").value = text1;
						
					}
				
				</script>
			</div> 

			
			
	</div>
</div>
<div class="span3 code-panel" id="tree" style="height:auto;" ></div> 
	<script type="text/javascript" src="assets/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script src="./src-noconflict/ext-statusbar.js"></script>
	<script src="src/keybinding-vim.js"></script>
	<script src="src/keybinding-emacs.js"></script>
	<script src="src/ext-keybinding_menu.js"></script>
	<script src="./../../dist/libs/jquery.js"></script>
	<script src="./../../dist/jstree.js"></script>		
	<script src="./../../dist/jstree.themes.js"></script>
        <script src="./src/ace.js" type="text/javascript" charset="utf-8"></script>
		
	<script>
	

var mp = {};
     mp['C++'] = 'C_Cpp';
     mp['C'] = 'C_Cpp';
     mp['AWK'] = 'C_Cpp';
     mp['Bash'] = 'Bash';
     mp['Brain'] = 'C_Cpp';
     mp['Java'] = 'Java';
     mp['Pascal'] = 'Pascal';
     mp['PHP'] = 'PHP';
     mp['Pike'] = 'C_Cpp';
     mp['Python2.7'] = 'Python';
     mp['Python3'] = 'Python';
     mp['Ruby'] = 'Ruby';
     mp['C#'] = 'Csharp';
     mp['Perl'] = 'Perl';
     mp['Haskell'] = 'Haskell';
     mp['JavaScript'] = 'JavaScript';

     var ext = {};
     ext['C++'] = 'cpp';
     ext['C'] = 'c';
     ext['AWK'] = 'awk';
     ext['Bash'] = 'sh';
     ext['Brain'] = 'bf';
     ext['Java'] = 'java';
     ext['Pascal'] = 'pas';
     ext['PHP'] = 'php';
     ext['Pike'] = 'pike';
     ext['Python2.7'] = 'py';
     ext['Python3'] = 'py';
     ext['Ruby'] = 'rb';
     ext['C#'] = 'cs';
     ext['Perl'] = 'pl';
     ext['Haskell'] = 'hs';
     ext['JavaScript'] = 'js';

	</script>

	<script>
		    var editor = ace.edit("editor");
			
		    editor.setTheme("ace/theme/chrome");
		    editor.getSession().setMode("ace/mode/c_cpp");
		    editor.getSession().setValue("Error Loading template: No Language Selected , Select Language from left panel");
		    editor.setOption("showPrintMargin", false)
		    editor.setFontSize("16px") 
		    editor.renderer.setVScrollBarAlwaysVisible(true);
		    editor.setKeyboardHandler("ace/keyboard/ace");
		    var pathid = "";
		    var save_data = "";
		    var codefilename = "";
		    var filename = "";
		    var serverpath = "";
		    var extension = "";
		    var lang = "";
	            var dom = require("ace/lib/dom");

	function gup( name )
	{
	  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
	  var regexS = "[\\?&]"+name+"=([^&#]*)";
	  var regex = new RegExp( regexS );
	  var results = regex.exec( window.location.href );
	  if( results == null )
	    return "";
	  else
	    return results[1];
	}
	


$(document).ready(function(){
	var aqf = gup("aqf");
	$('#tree').hide();
	setTimeout(function(){$('#loading').hide();},0);
	$.post('share.php', {'aqf' :aqf},function(dt){
		lang = dt['code_lang'];
		extension = ext[lang];
		if(dt['status'] == 'Success')
		{
			$('#status').css("color","green");
			$('#exec_time').text(" "+dt['exec_time'] + " sec");
		}
		else
			$('#status').css("color","#B22400");
		editor.getSession().setValue(dt['code_data']);
		$('#code_lang').text(dt['code_lang']);
		$('#stdin').text(dt['stdin']);
		$('#status').text(dt['status']);
		$('#stdout').val(dt['stdout']); 
		$('#stderr').val(dt['stderr']); 
		$('#stderr').css("color","#B22400");
	



	});	

});

	  	 function resizeAce() {
		    var h = window.innerHeight;
		    $('#editor').css('height', (h - 5).toString() + 'px');
		};
		$(window).on('resize', function () {
		    resizeAce();
		});
	 resizeAce();


	   $("#fontsize li").click(function( event ) {

		      var $target = $( event.currentTarget );
		      $target.closest( '.btn-group' )
			 .find( '[data-bind="label"]' ).text( $target.text() )
			    .end()
			 .children( '.dropdown-toggle' ).dropdown( 'toggle' );

		      editor.setFontSize($target.text());
		      return false;

  		 });

	   $("#theme li").click(function( event ) {

		      var $target = $( event.currentTarget );
		      $target.closest(  '.btn-group' )
			 .find( '[data-bind="label"]' ).text( $target.text() )
			    .end()
			 .children( '.dropdown-toggle' ).dropdown( 'toggle' );

		      editor.setTheme("ace/theme/"+$target.text().toLowerCase());
		      return false;

  		 });
	   $("#keybinding li").click(function( event ) {

		      var $target = $( event.currentTarget );
		      $target.closest(  '.btn-group' )
			 .find( '[data-bind="label"]' ).text( $target.text() )
			    .end()
			 .children( '.dropdown-toggle' ).dropdown( 'toggle' );
		     
		      editor.setKeyboardHandler("ace/keyboard/"+$target.text().toLowerCase());
		      return false;

  		 });

	   $("#mode li").click(function( event ) {

		      var $target = $( event.currentTarget );
		      $target.closest( '.btn-group' )
			 .find( '[data-bind="label"]' ).text( $target.text() )
			    .end()
			 .children( '.dropdown-toggle' ).dropdown( 'toggle' );
		
		      editor.getSession().setMode("ace/mode/"+$target.text().toLowerCase());
		      return false;

  		 });
	   $("#language li").click(function( event ) {

	      var $target = $( event.currentTarget );
	      $target.closest( '.btn-group' )
		 .find( '[data-bind="label"]' ).text( $target.text() )
		    .end()
		 .children( '.dropdown-toggle' ).dropdown( 'toggle' );

	      return false;

	 });
	   $("#timelimit li").click(function( event ) {

	      var $target = $( event.currentTarget );
	      $target.closest( '.btn-group' )
		 .find( '[data-bind="label"]' ).text( $target.text() )
		    .end()
		 .children( '.dropdown-toggle' ).dropdown( 'toggle' );

	      return false;

	 });

				$("#btn-export").click(function(){
				if(filename == "")
					{bootbox.alert("Code is not Submitted Yet.");}
				else
				{ 
					$.get('?operation=down_node', {'fname' : filename,'ext':extension},function(dt){  window.location = dt;       });
				}	
		
			});


			$("#btn-undo").click(function(){
				setTimeout(function () { editor.undo(); },0);	
		
			});
			$("#btn-redo").click(function(){
				setTimeout(function () { editor.redo(); },0);
		
			});
			$("#btn-scr").click(function(){
				setTimeout(function () { 	dom.toggleCssClass(document.body, "fullScreen");
								dom.toggleCssClass(editor.container, "fullScreen-editor"); 
								editor.resize(); 
							},0);	
		
			});

			$("#btn-share").click(function(){
				if(codefilename == "")
					{bootbox.alert("Code is not Submitted Yet.");}
				else
				{ 
					var codepath = 'share.php?aqf='+codefilename;
					var sharepath = serverpath+"/"+codepath;
					bootbox.alert("<b>URL :</b> <a href="+codepath+" target=_blank><b>"+sharepath+"</b></a>");		
				}
			});

			$("#btn-run").click(function(){
				
					var mradio = $('input[name=tl]');
					var tl = mradio.filter(':checked').val();
					var input = $('#stdin').val();

					if(tl != "Timelimit")
					{	
						
						save_data = editor.getSession().getValue();						
						setTimeout(function(){
  				    			$.get('?operation=getname',{'id' : 'guest'},function(name){filename = name; });  },0);	
						$('#loading').show();
						$('#status').text("Running");	
						$('#status').css("color","#E68A2E");
						$('#exec_time').text("");
						$('#stdout').val(""); 
						$('#stderr').val(""); 	
				
						setTimeout(function () {  $.post('share.php',{'operation' : 'code_run', 'tl':tl, 'lang':lang,'access':'public','stdin':input,'sdata':save_data,'fname':filename,'ext':extension},function(dt){
serverpath = dt['serverpath'];
codefilename = dt['codefilename'];
$('#loading').hide();
if(dt['status'] == 'Success')
{
	$('#status').css("color","green");
	$('#exec_time').text(" "+dt['exec_time'] + " sec");
}
else
	$('#status').css("color","#B22400");
$('#status').text(dt['status']);

$('#stdout').val(dt['stdout']); 
$('#stderr').val(dt['stderr']); 
$('#stderr').css("color","#B22400");
//bootbox.alert(dt['stdout']);


}); },1000);
						//bootbox.alert("Please Wait : Running...");
		
			}
					else
					{
						bootbox.alert("Timelimit is not selected");
					}
					
		
			});

		$("#btn-run2").click(function(){
			
					var mradio = $('input[name=tl]');
					var tl = mradio.filter(':checked').val();
					var input = $('#stdin').val();

					if(tl != "Timelimit")
					{	
						
						save_data = editor.getSession().getValue();
						
						setTimeout(function(){
  				    			$.get('?operation=getname',{'id' : 'guest'},function(name){filename = name; });  },0);	
						$('#loading').show();
						$('#status').text("Running");	
						$('#status').css("color","#E68A2E");
						$('#exec_time').text("");
						$('#stdout').val(""); 
						$('#stderr').val(""); 	
				
						setTimeout(function () {  $.post('share.php',{'operation' : 'code_run', 'tl':tl, 'lang':lang,'access':'public','stdin':input,'sdata':save_data,'fname':filename,'ext':extension},function(dt){
serverpath = dt['serverpath'];
codefilename = dt['codefilename'];
$('#loading').hide();
if(dt['status'] == 'Success')
{
	$('#status').css("color","green");
	$('#exec_time').text(" "+dt['exec_time'] + " sec");
}
else
	$('#status').css("color","#B22400");
$('#status').text(dt['status']);

$('#stdout').val(dt['stdout']); 
$('#stderr').val(dt['stderr']); 
$('#stderr').css("color","#B22400");
//bootbox.alert(dt['stdout']);


}); },1000);
						//bootbox.alert("Please Wait : Running...");
		
			}
					else
					{
						bootbox.alert("Timelimit is not selected");
					}
					
		
			});


$('#langSelect').change(function () {
     var optionSelected = $(this).find("option:selected");
     var textSelected   = optionSelected.text();
     setTimeout(function () { $.get('?operation=temp_node', {'ext' : optionSelected.val()},function(dt){window.editor.getSession().setValue(dt);});},0);				
     var change = mp[textSelected];
     editor.getSession().setMode("ace/mode/"+change.toLowerCase());
 });


			// add command for all new editors
			editor.commands.addCommand({
				name: "Toggle Fullscreen",
				bindKey: "F11",
				exec: function(editor) {
					dom.toggleCssClass(document.body, "fullScreen");
					dom.toggleCssClass(editor.container, "fullScreen-editor");
					editor.resize();
				}
			});


			 editor.commands.addCommand({
			    name: "save",
			    bindKey: {win: "Ctrl-S", mac: "Command-S"},
			    exec: function(arg) {
					setTimeout(function(){
						save_data = editor.getSession().getValue();
						setTimeout(function () {  $.get('?operation=save_node', {'id' : pathid, 'sdata' : save_data}); },0);
						bootbox.alert("save successful");
					},0);
				//editor.cmdLine.setValue("saved "+ name);
			    }
			});

			editor.commands.addCommands([{
			    name: "gotoline",
			    bindKey: {win: "Ctrl-L", mac: "Command-L"},
			    exec: function(editor) {
				var line = prompt("Please enter Line number","1");
				line = parseInt(line, 10);
				if (!isNaN(line))
				    editor.gotoLine(line);
			    },
			    readOnly: true
			}, {
			    name: "increaseFontSize",
			    bindKey: "Ctrl-+",
			    exec: function(editor) {
				var size = parseInt(editor.getFontSize(), 10) || 12;
				editor.setFontSize(size + 1);
			    }
			}, {
			    name: "decreaseFontSize",
			    bindKey: "Ctrl+-",
			    exec: function(editor) {
				var size = parseInt(editor.getFontSize(), 10) || 12;
				editor.setFontSize(Math.max(size - 1 || 1));
			    }
			}, {
			    name: "resetFontSize",
			    bindKey: "Ctrl+0",
			    exec: function(editor) {
				editor.setFontSize(12);
			    }
			}]);

</script>

	<script language="javascript" type="text/javascript">
	<!--
	function startUpload(){
	      document.getElementById('f1_upload_process').style.visibility = 'visible';
	      document.getElementById('f1_upload_form').style.visibility = 'hidden';
	      return true;
	}

	function stopUpload(success){
	      var result = '';
	      if (success == 1){
		 result = '<span class="msg" style="color:green;">The file was uploaded successfully!<\/span><br/><br/>';
	      }
	      else {
		 result = '<span class="emsg" style="color:red;">Error Occured during file upload(Only zip file is allowed)!<\/span><br/><br/>';
	      }
	      document.getElementById('f1_upload_process').style.visibility = 'hidden';
	      document.getElementById('f1_upload_form').innerHTML = result + '<label>File: <input name="myfile" type="file" size="30" /><\/label><label><input type="submit" name="submitBtn" class="sbtn" value="Upload" /><\/label>';
	      document.getElementById('f1_upload_form').style.visibility = 'visible';      
	      return true;   
	}
	//-->
	</script> 

<script>
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
	<div class="span" style="position:fixed;bottom:0px;"><img src="assets/img/keyboard.png" height=15 width=20/><a href="#kbdModal"  data-toggle="modal"  style="color:#666;font-size:14px;"><b>KeyBoard Shortcuts</b></a> </div>
	<?php include 'footer.php';?>
	</body>
</html>
	
