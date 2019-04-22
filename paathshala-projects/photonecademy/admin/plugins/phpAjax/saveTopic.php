<?php
	require_once('../../include/config.php');
	
	$courseId = mysqli_real_escape_string($con, $_POST['course']);
	$subcourseId = mysqli_real_escape_string($con, $_POST['subcourse']);
	$subjectId = mysqli_real_escape_string($con, $_POST['subject']);
	$chanpterId = mysqli_real_escape_string($con, $_POST['chapter']);
	$topicTitle = mysqli_real_escape_string($con, strtolower($_POST['topic']));
	
	if(!empty($courseId) && !empty($subcourseId) && !empty($subjectId) && !empty($chanpterId) && !empty($topicTitle)){
		mysqli_query($con,"INSERT INTO `master_topics`(`courseid`, `subcourseid`, `subjectid`, `chapterid`, `topic_title`) VALUES ('$courseId','$subcourseId','$subjectId','$chanpterId','$topicTitle')");
		echo true;	
	}
	else{
		echo false;
	}
?>