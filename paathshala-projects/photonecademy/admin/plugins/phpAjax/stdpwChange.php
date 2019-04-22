<?php
	require_once('../../include/config.php');
	
	$sid = mysqli_real_escape_string($con,$_POST['sid']);
	$newpw = mysqli_real_escape_string($con,md5($_POST['newpw']));
	$cpw = mysqli_real_escape_string($con,md5($_POST['cpw']));

	if(!empty($sid)&&!empty($newpw)&&!empty($cpw)){
		if($newpw == $cpw){
			mysqli_query($con,"UPDATE `master_student` SET `password`='$cpw' WHERE `student_id` = '$sid'");
			echo true;		
		}
	}
	else{
		echo false;
	}
?>