<?php
	require_once '../includes/DB_Functions.php';

	if(!empty($_POST['batch'])){

		$batch = htmlentities(trim($_POST['batch']));
		$newbatch = mysql_real_escape_string(strtolower($batch));
		
		$db = new DB_Functions();

		if($db->batchExist($newbatch)){
			echo 2;
		}
		else{
			$user = $db->createBatch($newbatch);
			if($user){
				echo 1;
			}
			else{
				echo 0;
			}
		}
	}
?>