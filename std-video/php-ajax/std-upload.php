<?php
	require_once '../includes/DB_Functions.php';

	if(!empty($_POST['board']) && !empty($_POST['standard'])){

		$temp_board = htmlentities(trim($_POST['board']));
		$temp_class = htmlentities(trim($_POST['standard']));
		$new_board = mysql_real_escape_string($temp_board);
		$new_standard = mysql_real_escape_string($temp_class);
		$filename = $_FILES["file"]["tmp_name"];
		$status = 1;

		$db = new DB_Functions();

		if($_FILES["file"]["size"] > 0){
			$file = fopen($filename, "r");
			while(($getData = fgetcsv($file, 10000, ",")) !== FALSE){
				$sql = $db->bulkStudentUpload($new_board, $new_standard, $getData[0], $getData[1], $getData[2], $getData[3], $status);
			}
			fclose($file);
			echo 1; 
		}
	}
	else{
		echo 0;
	}
?>