<?php
	require_once '../includes/DB_Functions.php';

	if(!empty($_POST['board'])){

		$board = htmlentities(trim($_POST['board']));
		$newboard = mysql_real_escape_string(strtolower($board));

		$db = new DB_Functions();
		if($db->ifBoardExist($newboard)){
			echo 2;
		}
		else{
			$user = $db->saveNewBoard($newboard);
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