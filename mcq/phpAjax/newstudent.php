<?php
	include_once('../includes/dbFunction.php');
	
	$funObj = new dbFunction();
	$batchId = mysql_real_escape_string(htmlentities($_POST['batch']));
	$filename = $_FILES["file"]["tmp_name"];
	
	if(!empty($batchId)&&!empty($filename)){
		if($_FILES["file"]["size"] > 0){
			$file = fopen($filename, "r");
			while(($getData = fgetcsv($file, 10000, ",")) !== FALSE){
				$sql = mysql_query("INSERT INTO `students` (`stdid`, `batchid`, `fn`, `ln`, `email`, `password`) VALUES (NULL, '$batchId', '".$getData[0]."','".$getData[1]."','".$getData[2]."','".md5($getData[3])."')") or die(mysql_error());
			}
			fclose($file);
			if($sql){
				echo true;
			}
		}
	}
?>