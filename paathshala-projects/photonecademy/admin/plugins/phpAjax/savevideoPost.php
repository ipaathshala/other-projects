<?php
	require_once('../../include/config.php');

	$courseId = mysqli_real_escape_string($con, $_POST['course']);
	$subcourseId = mysqli_real_escape_string($con,  $_POST['subcourse']);
	$subjectId = mysqli_real_escape_string($con,  $_POST['subject']);
	$chapterId = mysqli_real_escape_string($con, $_POST['chapter']);
	$topicId = mysqli_real_escape_string($con, $_POST['topic']);
	$categoryId = mysqli_real_escape_string($con, $_POST['category']);
	$levelTitle = mysqli_real_escape_string($con, $_POST['level']);
	$versionTitle = mysqli_real_escape_string($con, $_POST['version']);
	$videoTitle = mysqli_real_escape_string($con,strtolower($_POST['videotitle']));
	$videourl = mysqli_real_escape_string($con, strtolower($_POST['url']));
	$desc = mysqli_real_escape_string($con, $_POST['desc']);
	$status = 1;
	
	if(!empty($courseId)&&!empty($subcourseId)&&!empty($subjectId)&&!empty($chapterId)&&!empty($topicId)&&!empty($categoryId)&&!empty($levelTitle)&&!empty($versionTitle)&&!empty($videoTitle)
	&&!empty($videourl)&&!empty($desc)){
		mysqli_query($con,"INSERT INTO `video_post`(`courseid`, `subcourseid`, `subjectid`, `chapterid`, `topicid`, `catid`, `levelid`, `versionid`, `video_title`, `video_url`, `description`,`status`) VALUES ('$courseId','$subcourseId','$subjectId','$chapterId','$topicId', '$categoryId', '$levelTitle','$versionTitle','$videoTitle','$videourl','$desc','$status')");
		echo true;
	}
	else{
		echo false;
	}
?>