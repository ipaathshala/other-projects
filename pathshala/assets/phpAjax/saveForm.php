<?php
	
	require_once('../../include/connection.php');
	
	$catname	=	htmlentities(strtolower($_POST['catname']));
	if(!empty($catname)){
		mysqli_query($con, "INSERT INTO category (cat_title) VALUES ('$catname')");
		echo true;	
	}
	
	$batchname	=	htmlentities(strtolower($_POST['batchname']));
	if(!empty($batchname)){
		mysqli_query($con, "INSERT INTO batch (batch_title) VALUES ('$batchname')");
		echo true;	
	}
	
	$subname	=	htmlentities(strtolower($_POST['subname']));
	if(!empty($subname)){
		mysqli_query($con, "INSERT INTO submission (submission_title) VALUES ('$subname')");
		echo true;	
	}
?>