<?php

   if(file_exists("functions.php")) include("functions.php"); else exit;
   page_protect();
   // Edit upload location here
   $destination_path = getcwd().DIRECTORY_SEPARATOR."users".DIRECTORY_SEPARATOR.$_SESSION['username'].DIRECTORY_SEPARATOR."Projects".DIRECTORY_SEPARATOR;

   $result = 0;
   
   $target_path = $destination_path . basename( $_FILES['myfile']['name']);

   $allowedExts = array("zip");
	$temp = explode(".", $_FILES["myfile"]["name"]);
	$extension = end($temp);

	if ((($_FILES["myfile"]["type"] == "application/zip")
	|| ($_FILES["myfile"]["type"] == "application/x-zip")
	|| ($_FILES["myfile"]["type"] == "application/x-zip-compressed")
	|| ($_FILES["myfile"]["type"] == "application/octet")
	|| ($_FILES["myfile"]["type"] == "application/octet-stream")
	|| ($_FILES["myfile"]["type"] == "application/x-compress")
	|| ($_FILES["myfile"]["type"] == "multipart/x-zip")
	|| ($_FILES["myfile"]["type"] == "application/x-compressed"))	
	&& ($_FILES["myfile"]["size"] < 300000000) && in_array($extension, $allowedExts)) {
	  if ($_FILES["myfile"]["error"] > 0) {
	    //echo "Return Code: " . $_FILES["myfile"]["error"] . "<br>";
	  } else {
		    //echo "Upload: " . $_FILES["myfile"]["name"] . "<br>";
		    //echo "Type: " . $_FILES["myfile"]["type"] . "<br>";
		    //echo "Size: " . ($_FILES["myfile"]["size"] / 1024) . " kB<br>";
		    //echo "Temp file: " . $_FILES["myfile"]["tmp_name"] . "<br>";
		    if (file_exists($target_path)) {
		      //echo $_FILES["file"]["name"] . " already exists. ";
		    } else {
		      move_uploaded_file($_FILES["myfile"]["tmp_name"],$target_path);
		        $zip = new ZipArchive;
			$res = $zip->open($target_path);
			if ($res === TRUE) {
			  $zip->extractTo($destination_path);
			  $zip->close();
			  unlink($target_path);
			  //echo 'success';
			} else {
			  	//echo 'Error ! cannot open the file';
			}
		      $result = 1;
		      //echo "Stored in: " . $target_path;
	    }
	  }
	} else {
	  //echo "Invalid file";
	}
	sleep(1);
?>
<script language="javascript" type="text/javascript">window.top.window.stopUpload(<?php echo $result; ?>);</script>
