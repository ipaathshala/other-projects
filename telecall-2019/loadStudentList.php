<?php
	require_once('include/DbOperations.php');
	
	$response = array();
	
	if($_SERVER['REQUEST_METHOD']=='POST'){

		$schoolid = htmlentities(trim($_POST['schoolid']));

		if(!empty($schoolid)){

			$db = new DbOperations();
			$response = $db->loadStudentList($schoolid);

			if(empty($response)){
				$response['error'] = TRUE;
				$response['message'] = "No records to show!";
			}
		}
		else{
			$response['error'] = TRUE;
			$response['message'] = "Unable to fetch result!";
		}
	}
	else{
		$response['error'] = TRUE;
		$response['message'] = "Something goes wrong unable to proceed your request kindly contact to the administrator!";
	}
	echo json_encode($response);
?>