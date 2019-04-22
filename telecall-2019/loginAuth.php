<?php
	require_once('include/DbOperations.php');

	$response = array();
	
	if($_SERVER['REQUEST_METHOD']=='POST'){

		$un = htmlentities(trim($_POST['email']));
		$pw = htmlentities(trim($_POST['password']));

		if(!empty($un)&&!empty($pw)){

			$db = new DbOperations();

			if($db->userLogin($un, $pw)){
				$user = $db->getUserByUsername($un);
				$response['success'] = FALSE;
				$response['message'] = "Login Successfully";
				foreach($user as $value){
					$response['admin_id'] = $value['admin_id'];
					$response['email'] = $value['email'];
				}
			}
			else{
				$response['error'] = TRUE;
				$response['message'] = "Invalid login credentials please try again!";
			}
		}
		else{
			$response['error'] = TRUE;
			$response['message'] = "Required fields are missing!";
		}
	}
	else{
		$response['error'] = TRUE;
		$response['message'] = "Something goes wrong unable to proceed your request kindly contact to the administrator";
	}
	//echo json_encode(array('adminuser'=>$response));
	echo json_encode($response);
?>