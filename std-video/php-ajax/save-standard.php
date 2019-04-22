<?php
	require_once '../includes/DB_Functions.php';

	if(!empty($_POST['standard'])){

		$standard = htmlentities(trim($_POST['standard']));
		$newstandard = mysql_real_escape_string(strtolower($standard));

		$db = new DB_Functions();
		if($db->ifStandardExist($newstandard)){
			echo 2;
		}
		else{
			$user = $db->saveNewStandard($newstandard);
			if($user){
				echo 1;
			}
			else{
				echo 2;
			}
		}
	}
	else{
		echo 0;
	}
?>