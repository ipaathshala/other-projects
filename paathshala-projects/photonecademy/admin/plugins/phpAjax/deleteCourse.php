<?php 
	require_once('../../include/config.php')
	
	$deleteId = htmlentities($_REQUEST['delete']);
	if(!empty($deleteId)){
		mysqli_query($con,"DELETE FROM `master_course` WHERE `course_id` = '$deleteId'");
		echo true;
	}
	else{
		echo false;
	}
?>