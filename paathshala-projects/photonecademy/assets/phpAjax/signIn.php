<?php
	require_once('../../admin/include/config.php');
	
	$userName = mysqli_real_escape_string($con,$_POST['un']);
	$userPassword = mysqli_real_escape_string($con,md5($_POST['pw']));
	$status = 1;
	if(!empty($userName)&&!empty($userPassword)){
		$checkUser = mysqli_query($con,"SELECT `student_id`, `username`, `password`, `student_status` FROM `master_student` WHERE `username` = '$userName' AND `password` = '$userPassword' AND 
		`student_status` = '$status'");
		$row = mysqli_fetch_array($checkUser);
		if(is_array($row)){
			$_SESSION['user_id'] = $row['student_id'];
			$_SESSION['user_name'] = $row['username'];
			echo true;
		}
		else{
			echo false;
		}
	}
?>