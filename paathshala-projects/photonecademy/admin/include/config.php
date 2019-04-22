<?php
	session_start();

	error_reporting(0);

	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'photonecademy';

	$con = mysqli_connect($hostname, $username, $password);

	if($con){
		mysqli_select_db($con,$database);
	}
	else{
		die("Connection Failed: " . mysqli_connect_error());
	}
?>