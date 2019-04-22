<?php
	require_once('../../include/config.php');
	
	$versionTitle = mysqli_real_escape_string($con,strtolower($_POST['version']));
	if(!empty($versionTitle)){
		mysqli_query($con,"INSERT INTO `version_type`(`version_title`) VALUES ('$versionTitle')");
		echo true;	
	}
	else{
		echo false;
	}
?>