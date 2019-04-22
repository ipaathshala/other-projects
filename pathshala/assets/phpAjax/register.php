<?php
	
	require_once('../../include/connection.php');
	
	$email	=	htmlentities($_POST['email']);
	$pw		=	htmlentities(md5($_POST['pw']));
	$cpw	=	htmlentities(md5($_POST['cpw']));
	
	mysqli_query($con, "INSERT INTO master_admin (email, pw, cpw) VALUES ('$email', '$pw', '$cpw')");
	echo true;
?>