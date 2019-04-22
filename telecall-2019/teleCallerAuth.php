<?php
	require_once('include/DbOperations.php');

	$response = array();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$un = htmlentities(trim($_POST['username']));
		$pw = htmlentities(trim($_POST['password']));

		if(!empty($un) && !empty($pw)){
			$db = new DbOperations();
			if($db->teleCallerOperatorAuth($un, $pw)){
				$user = $db->getTelecallerUserName($un);
				$response['success'] = FALSE;
				$response['message'] = "Login Successfully";
				foreach($user as $value){
					$response['tc_id'] = $value['tc_id'];
					$response['tc_fn'] = $value['tc_fn'];
					$response['tc_ln'] = $value['tc_ln'];
					$response['tc_un'] = $value['tc_un'];
				}
			}
			else{
				$response['error'] = TRUE;
				$response['message'] = "Invalid login credentials please try again!";
			}
		}
		else{
			$response['error'] = TRUE;
			$response['message'] = "Field should not be empty";
		}
	}
	else{
		$response['error'] = TRUE;
		$response['message'] = "Something goes wrong unable to proceed your request kindly contact to the administrator";
	}
	//echo json_encode(array('telecallerarray'=>$response));
	echo json_encode($response);
?>