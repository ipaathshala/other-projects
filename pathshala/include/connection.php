<?php
	
	session_start();
	$host		=	'localhost';
	$username	=	'root';
	$password	=	'';
	$database	=	'pathshala';
	
	$con	=	mysqli_connect($host, $username, $password);;
	if($con){
		mysqli_select_db($con, $database);
	}
	else{
		die("Connection failed: " . mysqli_connect_error());
	}
?>