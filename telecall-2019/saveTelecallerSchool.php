<?php
	require_once('include/DbOperations.php');

	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$telecaller = htmlentities(trim($_POST['telecaller']));
		$schoolname = htmlentities(trim($_POST['schoolname']));

		if(!empty($telecaller)&&!empty($schoolname)){
			
			$db = new DbOperations();
			
			$result = $db->telecallerSchool($telecaller, $schoolname);

			if($result){
				$response['error'] = FALSE;
				$response['message'] = "Record updated successfully!";
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
	echo json_encode($response);
?>