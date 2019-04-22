<?php
	require_once('include/DbOperations.php');

	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$un = htmlentities(trim($_POST['username']));
		$pw = htmlentities(trim($_POST['password']));

		if(!empty($un) && !empty($pw)){
			$db = new DbOperations();
			if($db->dataEntryOperatorAuth($un, $pw)){
				$user = $db->getDataEntryOperatorUsername($un);
				$response['success'] = FALSE;
				$response['message'] = "Login Successfully!";
				foreach($user as $value){
					$response['de_id'] = $value['de_id'];
					$response['de_fn'] = $value['de_fn'];
					$response['de_ln'] = $value['de_ln'];
					$response['de_un'] = $value['de_un'];
				}
			}
			else{
				$response['error'] = TRUE;
				$response['message'] = "Invalid login details!";
			}
		}
		else{
			$response['error'] = TRUE;
			$response['message'] = "Required fields are missing!";
		}
	}
	else{
		$response['error'] = TRUE;
		$response['message'] = "Something goes wrong unable to proceed your request kindly contact to the administrator!";
	}
	//echo json_encode(array('operatorarray'=>$response));
	echo json_encode($response);
?>