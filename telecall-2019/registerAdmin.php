<?php
	require_once('include/DbOperations.php');

	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$un = htmlentities(trim($_POST['email']));
		$pw = htmlentities(trim($_POST['password']));

		if(!empty($un) and !empty($pw)){
			
			$db = new DbOperations();
			
			$result = $db->createAdminUser($un, $pw);
			
			if($result == 1){
				$response['error'] = false;
				$response['message'] = "Account created successfully!";
			}
			else if($result == 2){
				$response['error'] = true;
				$response['message'] = "Some error occurs please try again!";
			}
			else if($result == 0){
				$response['error'] = true;
				$response['message'] = "Unable to create new account!";
			}
		}
		else{
			$response['error'] = true;
			$response['message'] = "Required fields are missing!";
		}
	}
	else{
		$response['error'] = true;
		$response['message'] = "Something goes wrong unable to proceed your request kindly contact to the administrator!";
	}
	echo json_encode($response);
?>