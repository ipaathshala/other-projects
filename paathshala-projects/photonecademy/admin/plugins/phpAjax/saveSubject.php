<?php
	require_once('../../include/config.php');
	
	$courseId = mysqli_real_escape_string($con, $_POST['course']);
	$subcourseId = mysqli_real_escape_string($con, $_POST['subcourse']);
	$subjectName = mysqli_real_escape_string($con, strtolower($_POST['sub']));
	
	if(!empty($courseId) || !empty($subcourseId) || !empty($subjectName)){
		mysqli_query($con,"INSERT INTO `master_subject`(`courseid`, `subcourseid`, `subject`) VALUES ('$courseId', '$subcourseId', '$subjectName')");
		echo true;	
	}
	else{
		echo false;
	}
?>