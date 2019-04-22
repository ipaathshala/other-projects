<?php
	require_once('include/DbOperations.php');

	$response = array();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$db = new DbOperations();
		$response = $db->getSchoolNames();
		if(empty($response)){
			$response['error'] = TRUE;
			$response['message'] = "No records to show!";
		}
	}
	else{
		$response['error'] = TRUE;
		$response['message'] = "Something goes wrong unable to proceed your request kindly contact to the administrator!";
	}
	echo json_encode($response);
?>
