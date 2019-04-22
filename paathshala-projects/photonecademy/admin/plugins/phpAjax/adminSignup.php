<?php
	require_once('../../include/config.php');
	
	$un = mysqli_real_escape_string($con,strtolower($_POST['un']));
	$pw = md5($_POST['pw']);
	
	if(!empty($un) && !empty($pw)){
		mysqli_query($con,"INSERT INTO `master_admin`(`username`, `password`) VALUES ('$un', '$pw')");
		echo true;
	}
	else{
		echo false;
	}
?>