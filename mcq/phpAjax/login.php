<?php
	require_once '../includes/DB_Functions.php';

	if(!empty($_POST['un']) && !empty($_POST['pw'])){

		$username = htmlentities(trim($_POST['un']));
		$password = htmlentities(trim($_POST['pw']));

		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);

		$db = new DB_Functions();
		$user = $db->adminLogin($username, $password);
		if($user != false){
			$userid = $_SESSION["user_id"] = $user["admin_id"];
			$username = $_SESSION["user_name"] = $user["email"];
			echo "1";
		}
		else if($user == false){
			echo "2";
		}
	} 
?>