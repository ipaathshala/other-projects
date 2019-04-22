<?php
	require_once('../../include/config.php');
	
	$courseName = mysqli_real_escape_string($con,$_POST['course']);
	$subCourseName = mysqli_real_escape_string($con,strtolower($_POST['subcourse']));
	
	if(!empty($courseName) && !empty($subCourseName)){
		mysqli_query($con,"INSERT INTO `sub_course`(`mcid`, `subcourse_name`) VALUES ('$courseName','$subCourseName')");
		echo true;	
	}
	else{
		echo false;
	}
?>