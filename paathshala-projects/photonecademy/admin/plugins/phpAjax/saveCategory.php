<?php
	require_once('../../include/config.php');
	
	$categoryTitle = mysqli_real_escape_string($con,strtolower($_POST['category']));
	if(!empty($categoryTitle)){
		mysqli_query($con,"INSERT INTO `category_type`(`category`) VALUES ('$categoryTitle')");
		echo true;
	}
	else{
		echo false;
	}
?>