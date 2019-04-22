<?php
	require_once('../../include/config.php');
	
	$levelTitle = mysqli_real_escape_string($con, strtolower($_POST['level']));
	
	if(!empty($levelTitle)){
		mysqli_query($con,"INSERT INTO `level_type`(`level_title`) VALUES ('$levelTitle')");
		echo true;	
	}
	else{
		echo false;
	}
?>