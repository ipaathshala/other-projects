<?php
	require_once('../../include/config.php');

	$pkgName = mysqli_real_escape_string($con,$_POST['pkglist']);
	$course = mysqli_real_escape_string($con,$_POST['course']);
	$subcourse = mysqli_real_escape_string($con,$_POST['subcourse']);
	$subject = mysqli_real_escape_string($con,$_POST['subject']);
	$chapter = mysqli_real_escape_string($con,$_POST['chapter']);
	$topic = mysqli_real_escape_string($con,$_POST['topic']);
	$category = mysqli_real_escape_string($con,$_POST['category']);
	$level = mysqli_real_escape_string($con,$_POST['level']);
	$version = mysqli_real_escape_string($con,$_POST['version']);
	$post = mysqli_real_escape_string($con,$_POST['post']);
	
	if(!empty($pkgName)&&!empty($course)&&!empty($subcourse)&&!empty($subject)&&!empty($chapter)&&!empty($topic)&&!empty($category)&&!empty($level)&&!empty($version)&&!empty($post)){
		mysqli_query($con,"INSERT INTO `sub_package`(`masterpkgid`, `courseid`, `subcourseid`, `subjectid`, `chapterid`, `topicid`, `categoryid`, `levelid`, `versionid`, `postid`) VALUES
		('$pkgName','$course','$subcourse','$subject','$chapter','$topic','$category','$level','$version','$post')");
		echo true;
	}
	else{
		echo false;
	}
?>