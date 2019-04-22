<?php
	require_once '../includes/DB_Functions.php';

	if(!empty($_POST['subject'])){
		$subject = htmlentities(trim($_POST['subject']));
		$newsubject = mysql_real_escape_string(strtolower($subject));
		$db = new DB_Functions();
		
		if($db->ifSubjectExist($newsubject)){
			echo 2;
		}
		else{
			$user = $db->saveNewSubject($newsubject);
			if($user){
				echo 1;
			}
			else{
				echo 0;
			}
		}
	}
?>