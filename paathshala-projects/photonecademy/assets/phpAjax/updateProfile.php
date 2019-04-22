<?php

	require_once('../../admin/include/config.php');
	
	if(isset($_SESSION['user_id'])){

		$id = mysqli_real_escape_string($con,$_SESSION['user_id']);
		$fn = mysqli_real_escape_string($con,$_POST['fn']);
		$ln = mysqli_real_escape_string($con,$_POST['ln']);
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$mob = mysqli_real_escape_string($con,$_POST['mob']);
		$add = mysqli_real_escape_string($con,$_POST['add']);
		$city = mysqli_real_escape_string($con,$_POST['city']);
		$zipcode = mysqli_real_escape_string($con,$_POST['zipcode']);
		
		if(!empty($fn)&&!empty($ln)&&!empty($email)&&!empty($mob)&&!empty($add)&&!empty($city)&&!empty($zipcode)){
			$sql = mysqli_query($con,"SELECT `student_id`, `fn`, `ln`, `username`, `mobile`, `address`, `city`, `zipcode`, `password`, `student_status` FROM `master_student` WHERE `student_id` = '$id'");
			$row = mysqli_fetch_array($sql);
			mysqli_query($con,"UPDATE `master_student` SET `fn`='$fn', `ln`='$ln', `username`='$email', `mobile`='$mob', `address`='$add', `city`='$city', `zipcode`='$zipcode' WHERE  `student_id` = '$id'");
			echo true;
		}
		else{
			echo false;
		}
	}
?>