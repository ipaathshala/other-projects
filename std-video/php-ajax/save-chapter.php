<?php
	require_once '../includes/DB_Functions.php';

	if(!empty($_POST['board']) && !empty($_POST['standard']) && !empty($_POST['subject'])){
		$temp_board = htmlentities(trim($_POST['board']));
		$temp_class = htmlentities(trim($_POST['standard']));
		$temp_subject = htmlentities(trim($_POST['subject']));

		$new_board = mysql_real_escape_string($temp_board);
		$new_class = mysql_real_escape_string($temp_class);
		$new_subject = mysql_real_escape_string($temp_subject);
		$filename = $_FILES["file"]["tmp_name"];

		$db = new DB_Functions();

		if($_FILES["file"]["size"] > 0){
			$file = fopen($filename, "r");
			while(($getData = fgetcsv($file, 10000, ",")) !== FALSE){
				$sql = $db->newChapters($new_board, $new_class, $new_subject, mysql_real_escape_string($getData[0]));
			}
			fclose($file);
			echo 1; 
		}
	}
	else{
		echo 0;
	}
?>