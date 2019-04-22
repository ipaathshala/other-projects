<?php
	require_once('../../admin/include/config.php');
	
	$newUn = mysqli_real_escape_string($con,$_POST['newun']);
	$newPw = mysqli_real_escape_string($con,md5($_POST['newpw']));
	$status = 1;
	if(!empty($newUn)&&!empty($newPw)){
		mysqli_query($con,"INSERT INTO `master_student`(`username`, `password`, `student_status`) VALUES ('$newUn','$newPw','$status')");
		echo true;
	}
	else{
		echo false;
	}
?>