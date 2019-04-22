<?php
	require_once('include/DbOperations.php');
	$response = array();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$studentid = htmlentities(trim($_REQUEST['stdid']));
		if(!empty($studentid)){
			$db = new DbOperations();
			$response = $db->callCount($studentid);
			if(empty($response)){
				$response['error'] = TRUE;
				$response['message'] = "No records to show!";
			}
		}
		else{
			$response['error'] = TRUE;
			$response['message'] = "Invalid user id!";
		}
	}
	else{
		$response['error'] = TRUE;
		$response['message'] = "Something goes wrong unable to proceed your request kindly contact to the administrator!";
	}
	echo json_encode($response);
?>