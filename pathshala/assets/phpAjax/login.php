<?php
	
	require_once('../../include/connection.php');
	
	$email	=	htmlentities($_POST['email']);
	$pw		=	htmlentities(md5($_POST['pw']));
	
	$check	=	mysqli_query($con, "SELECT admin_id, email, pw FROM master_admin WHERE email = '$email' AND pw = '$pw'");
	$row	=	mysqli_fetch_array($check);
	if(is_array($row))
	{
		$adminId	=	$_SESSION['userid']		=	$row['admin_id'];
		$userName	=	$_SESSION['username']	=	$row['email'];
		echo true;
	}
	else{
		false;
	}
?>