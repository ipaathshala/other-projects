<?php
	require_once('../../include/config.php');
	
	$email = mysqli_real_escape_string($con, $_POST['email']);
	if(!empty($email)){
		$checker = mysqli_query($con,"SELECT `username` FROM `master_admin` WHERE `username` = '$email'");
		while($checkRow = mysqli_fetch_array($checker)){
			$record = $checkRow['username'];
		}
		if($email!=$record){
			echo false;
		}
	}
?>