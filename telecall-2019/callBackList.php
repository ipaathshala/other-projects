<?php
	require_once('include/DbOperations.php');
	$response = array();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$teleid = htmlentities(trim($_POST['telecaller_id']));
		$status = 'callback';
		if(!empty($teleid)){
			$db = new DbOperations();
			$response = $db->callBackList($teleid, $status);
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