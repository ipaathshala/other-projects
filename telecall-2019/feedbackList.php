<?php
	require_once('include/DbOperations.php');

	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$teleid = htmlentities(trim($_POST['telecaller_id']));
		$status = htmlentities(trim(strtolower(str_replace(' ','-',$_POST['status']))));

		if(!empty($status)&&!empty($teleid)){
			
			$db = new DbOperations();
			$response = $db->leadFeedBackList($teleid, $status);

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