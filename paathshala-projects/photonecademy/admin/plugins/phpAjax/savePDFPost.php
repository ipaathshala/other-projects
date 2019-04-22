<?php
	require_once('../../include/config.php');
	
	$courseId = mysqli_real_escape_string($con, $_POST['course']);
	$subcourseId = mysqli_real_escape_string($con,  $_POST['subcourse']);
	$subjectId = mysqli_real_escape_string($con,  $_POST['subject']);
	$chapterId = mysqli_real_escape_string($con, $_POST['chapter']);
	$topicId = mysqli_real_escape_string($con, $_POST['topic']);
	$categoryId = mysqli_real_escape_string($con, $_POST['category']);
	$levelId = mysqli_real_escape_string($con, $_POST['level']);
	$versionId = mysqli_real_escape_string($con, $_POST['version']);
	$postTitle = mysqli_real_escape_string($con,strtolower($_POST['ptitle']));
	$desc = mysqli_real_escape_string($con, $_POST['desc']);
	$status = 1;
	
	if(!empty($courseId)&&!empty($subcourseId)&&!empty($subjectId)&&!empty($chapterId)&&!empty($topicId)&&!empty($categoryId)&&!empty($levelId) &&!empty($versionId)&&!empty($postTitle)&&!empty($status)){
		if(!empty($_FILES["file"]["type"])){
			$fileName = time().'_'.$_FILES['file']['name'];
			$temporary = explode(".", $_FILES["file"]["name"]);
			$file_extension = end($temporary);
			$sourcePath = $_FILES['file']['tmp_name'];
			$targetPath = "../../../uploads/pdf-post/".$fileName;
			if(move_uploaded_file($sourcePath,$targetPath)){
				mysqli_query($con, "INSERT INTO `pdf_post` (`courseid`, `subcourseid`, `subjectid`, `chapterid`, `topicid`, `catid`, `levelid`,
				`versionid`, `pdf_title`, `pdf_attachment`, `description`, `status`) VALUES ('$courseId', '$subcourseId', '$subjectId',
				'$chapterId', '$topicId' ,'$categoryId', '$levelId', '$versionId', '$postTitle', '$fileName', '$desc', '$status')");
				echo true;
			}
			else{
				echo false;
			}
		}
	}
?>