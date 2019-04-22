<?php
	require_once('../../include/config.php');
	
	$courseId = mysqli_real_escape_string($con, $_POST['course']);
	$subcourseId = mysqli_real_escape_string($con, $_POST['subcourse']);
	$subjectId = mysqli_real_escape_string($con, $_POST['subject']);
	$chanpterTitle = mysqli_real_escape_string($con,strtolower($_POST['chapter']));
	
	if(!empty($courseId) && !empty($subcourseId) && !empty($subjectId) && !empty($chanpterTitle)){
		mysqli_query($con,"INSERT INTO `master_chapter`(`courseid`, `subcourseid`, `subjectid`, `chapter_title`) VALUES ('$courseId','$subcourseId','$subjectId','$chanpterTitle')");
		echo true;	
	}
	else{
		echo false;
	}
?>