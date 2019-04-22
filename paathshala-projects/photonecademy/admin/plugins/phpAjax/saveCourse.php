<?php
	require_once('../../include/config.php');
	
	$courseName = mysqli_real_escape_string($con,strtolower($_POST['course']));
	if(!empty($courseName)){
		mysqli_query($con,"INSERT INTO `master_course`(`course_name`) VALUES ('$courseName')");
		echo true;	
	}
	else{
		echo false;
	}
?>