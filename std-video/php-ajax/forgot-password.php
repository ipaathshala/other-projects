<?php
	require_once '../includes/DB_Functions.php';

	if(!empty($_POST['email'])){

		$temp = htmlentities(trim($_POST['email']));

		$username = mysql_real_escape_string($temp);

		$db = new DB_Functions();

		if($db->checkAdminExist($username)){
			$response = array();
			$user = $db->checkAdminExist($username);
			
			foreach($user as $value){

				$resetid = $response['admin_id'] = $value['admin_id'];
				$getemail = $response['email'] = $value['email'];
			}

			if(!empty($getemail)){
				echo $password = mt_rand(1000,10000);
				$db->resetAdminPassword($resetid, $password);
			}
		}
		else{
			echo 0;
		}
	}
	/*$to = "phpwebpathshalaeducation@gmail.com";
			$subject = "This is subject";
			$message = "<b>This is HTML message.</b>";
			$message .= "<h1>This is headline.</h1>";
			$header = "From:noreply@paathshalaiit.com \r\n";
			$header .= "MIME-Version: 1.0\r\n";
			$header .= "Content-type: text/html\r\n";
			$retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }*/
?>