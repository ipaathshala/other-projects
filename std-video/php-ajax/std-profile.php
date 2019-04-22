<?php
	require_once '../includes/DB_Functions.php';

	if(!empty($_POST['board']) && !empty($_POST['standard']) && !empty($_POST['fn']) && !empty($_POST['ln']) && !empty($_POST['un']) && !empty($_POST['pw'])){

		$temp1 = htmlentities(trim($_POST['board']));
		$temp2 = htmlentities(trim($_POST['standard']));
		$temp3 = htmlentities(trim($_POST['fn']));
		$temp4 = htmlentities(trim($_POST['ln']));
		$temp5 = htmlentities(trim($_POST['un']));
		$temp6 = htmlentities(trim($_POST['pw']));

		$board = mysql_real_escape_string($temp1);
		$standard = mysql_real_escape_string($temp2);
		$firstname = mysql_real_escape_string($temp3);
		$lastname = mysql_real_escape_string($temp4);
		$username = mysql_real_escape_string($temp5);
		$password = mysql_real_escape_string($temp6);
		$status = 1;

		$db = new DB_Functions();
		if($db->singleStudentExist($username)){
			echo 2;
		}
		else{
			$user = $db->singleStudentProfile($board, $standard, $firstname, $lastname, $username, $password, $status);
			if($user){
				echo 1;
			}
			else{
				echo 0;
			}
		}
	}
?>