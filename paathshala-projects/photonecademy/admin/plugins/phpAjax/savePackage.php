<?php
	require_once('../../include/config.php');

	$pkg = mysqli_real_escape_string($con, strtolower($_POST['pkg']));
	$status = 1;
	
	if(!empty($pkg) && !empty($_FILES["file"]["type"])){
		$fileName = time().'_'.$_FILES['file']['name'];
		$temporary = explode(".", $_FILES["file"]["name"]);
		$file_extension = end($temporary);
		$sourcePath = $_FILES['file']['tmp_name'];
		$targetPath = "../../../uploads/pkg-img/".$fileName;
		if(move_uploaded_file($sourcePath,$targetPath)){
			$file = $fileName;
		}
		mysqli_query($con,"INSERT INTO `master_package`(`pkg_name`, `pkg_img`, `pkg_status`) VALUES ('$pkg','$file','$status')");
		echo true;
	}
	else{
		echo false;
	}
?>