<?php
	require_once('include/DbOperations.php');

	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$telecallerid = htmlentities(trim($_POST['telecaller_id']));
		
		if(!empty($telecallerid)){

			$db = new DbOperations();
			$response = $db->loadTelecallerSchool($telecallerid);

			if(empty($response)){
				$response['error'] = TRUE;
				$response['message'] = "No records to show!";
			}
		}
		else{
			$response['error'] = TRUE;
			$response['message'] = "Invalid user!";
		}
	}
	else{
		$response['error'] = TRUE;
		$response['message'] = "Something goes wrong unable to proceed your request kindly contact to the administrator!";
	}
	echo json_encode($response);
?>
