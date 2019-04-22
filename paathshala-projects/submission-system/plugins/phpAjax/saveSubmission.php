<?php
require_once('../../include/config.php');

	$batchName = htmlentities($_POST['batch']);
	$studentName = htmlentities($_POST['student']);
	$comment = htmlentities(strtolower($_POST['comment']));
	$files = [];

	foreach($_FILES['images']['name'] as $i => $name){
		$name = $_FILES['images']['name'][$i];
		$tmp = $_FILES['images']['tmp_name'][$i];

		$explode = explode('.', $name);
		$ext = end($explode);

		$updatdName = $explode[0] . time() .'.'. $ext;
		$path = 'submission/';
		$path = $path . basename( $updatdName );

		$files['file_name'][] = $updatdName;

		if(move_uploaded_file($tmp, $path)){
			echo true;	
		}
		else{
			echo false;
		}
	}
?>