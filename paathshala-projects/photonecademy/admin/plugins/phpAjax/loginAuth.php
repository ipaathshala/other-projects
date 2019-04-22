<?php
	require_once('../../include/config.php');
	
	$un = mysqli_real_escape_string($con,($_POST['un']));
	$pw = mysqli_real_escape_string($con,(md5($_POST['pw'])));
	
	if(!empty($un) && !empty($pw)){
		$checkUser = mysqli_query($con,"SELECT `admin_id`, `username`, `password` FROM `master_admin` WHERE `username` = '$un' AND `password` = '$pw'");	
		$row = mysqli_fetch_array($checkUser);
		if(is_array($row)){
			$_SESSION['user_id'] = $row['admin_id'];
			$_SESSION['user_name'] = $row['username'];
			echo true;
		}
	}
	else{
		echo false;
	}
?>