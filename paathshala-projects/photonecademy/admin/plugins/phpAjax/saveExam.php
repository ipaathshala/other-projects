<?php
	require_once('../../include/config.php');
	
	$examName = mysqli_real_escape_string($con, strtolower($_POST['exam']));
	if(!empty($examName)){
		mysqli_query($con,"INSERT INTO `master_exams`(`exam_name`) VALUES ('$examName')");
		echo true;
	}
	else{
		echo false;
	}
?>