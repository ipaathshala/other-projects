<?php
	require_once('../../include/config.php');

	$pkgid = mysqli_real_escape_string($con, $_POST['pkglist']);
	$courseid = mysqli_real_escape_string($con, $_POST['course']);
	$subcourseid = mysqli_real_escape_string($con, $_POST['subcourse']);
	$subjectid = mysqli_real_escape_string($con, $_POST['subject']);
	$chapterid = mysqli_real_escape_string($con, $_POST['chapter']);
	$topicid = mysqli_real_escape_string($con, $_POST['topic']);
	$categoryid = mysqli_real_escape_string($con, $_POST['category']);
	$levelid = mysqli_real_escape_string($con, $_POST['level']);
	$versionid = mysqli_real_escape_string($con, $_POST['version']);
	$pid = array_filter($_POST['post']);
	$postid = implode(",",$pid);
	
	if(!empty($pkgid)&&!empty($courseid)&&!empty($subcourseid)&&!empty($subjectid)&&!empty($chapterid)&&!empty($topicid)&&!empty($categoryid)&&!empty($levelid)&&!empty($versionid)&&!empty($pid)){
		mysqli_query($con, "INSERT INTO `sub_package`(`masterpkgid`, `courseid`, `subcourseid`, `subjectid`, `chapterid`, `topicid`, `categoryid`, `levelid`, `versionid`, `postid`) VALUES ('$pkgid','$courseid','$subcourseid','$subjectid','$chapterid','$topicid','$categoryid','$levelid','$versionid','$postid')");
		echo true;
	}
	else{
		echo false;
	}
?>