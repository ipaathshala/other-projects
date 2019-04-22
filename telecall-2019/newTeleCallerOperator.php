<?php
	require_once('include/DbOperations.php');

	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$fn = htmlentities(trim(strtolower($_POST['fn'])));
		$ln = htmlentities(trim(strtolower($_POST['ln'])));
		$un = htmlentities(trim($_POST['un']));
		$pw = htmlentities(trim($_POST['pw']));

		if(!empty($fn) && !empty($ln) && !empty($un) && !empty($pw)){
			$db = new DbOperations();
			$result = $db->createTeleCaller($fn, $ln, $un, $pw);
			if($result==1){
				$response['error'] = false;
				$response['message'] = "User created successfully!";
			}
			else if($result==2){
				$response['error'] = true;
				$response['message'] = "Some error occurs please try again!";
			}
			else if($result==0){
				$response['error'] = true;
				$response['message'] = "Username already in use!";
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
