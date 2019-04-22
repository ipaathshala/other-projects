<?php
	require_once '../includes/DB_Functions.php';
	$db = new DB_Functions();

	$username = $_POST['un'];
	$password = $_POST['pw'];	

	$db->newAdminAcc($username, $password);
	echo true;
	
?>