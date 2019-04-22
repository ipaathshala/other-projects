<?php
	require_once '../includes/DB_Functions.php';

	if(!empty($_POST['board']) && !empty($_POST['standard']) && !empty($_POST['subject']) && !empty($_POST['chapter'])){
		
		$temp1 = htmlentities(trim($_POST['board']));
		$temp2 = htmlentities(trim($_POST['standard']));
		$temp3 = htmlentities(trim($_POST['subject']));
		$temp4 = htmlentities(trim($_POST['chapter']));

		$board = mysql_real_escape_string($temp1);
		$standard = mysql_real_escape_string($temp2);
		$subject = mysql_real_escape_string($temp3);
		$chapter = mysql_real_escape_string($temp4);
		$status = 1;

		$array1 = $_POST['vtitle'];
		$array2 = $_POST['url'];
		
		$db = new DB_Functions();

		for($i = 0; $i < count($array1); $i++){
			
			$title = mysql_real_escape_string($array1[$i]);
			$vurl = mysql_real_escape_string($array2[$i]);

			$user = $db->ifChapterVideoExist($board, $standard, $subject, $chapter, $title, $vurl);
			if($user){
				echo 2;
				exit();
			}
			else{
				$db->newChapterVideo($board, $standard, $subject, $chapter, $title, base64_encode($vurl), $status);	
			}
		}
		echo 1;
	}
	else{
		echo 0;
	}
?>