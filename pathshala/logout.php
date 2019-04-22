<?php 
	require_once('include/connection.php');
	session_destroy();
	header("Location:login");
?>