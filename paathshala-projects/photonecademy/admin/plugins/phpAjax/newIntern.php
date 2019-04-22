<?php
	require_once('../../include/config.php');
	
	$mail = mysqli_real_escape_string($con,strtolower($_POST['mail']));
	$pw = mysqli_real_escape_string($con,md5($_POST['pw']));
	$status = 1;
	if(!empty($mail)&&!empty($pw)){
		mysqli_query($con,"INSERT INTO `master_interns`(`email`, `password`, `intern_status`) VALUES ('$mail', '$pw', '$status')");
		echo true;
	}
	else{
		echo false;
	}
?>