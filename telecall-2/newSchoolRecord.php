<?php
	require_once('include/DbOperations.php');

	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$school = htmlentities(trim(strtolower($_POST['schoolname'])));
		$address = htmlentities(trim(strtolower($_POST['schooladdress'])));

		if(!empty($school) && !empty($address)){
			$db = new DbOperations();
			$result = $db->createNewSchool($school, $address);
			if($result==1){
				$response['error'] = false;
				$response['message'] = "Record added successfully!";
			}
			else if($result==2){
				$response['error'] = true;
				$response['message'] = "Some error occurs please try again!";
			}
			else if($result==0){
				$response['error'] = true;
				$response['message'] = "School record already exist in the system!";
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
