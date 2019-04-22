<?php
	require_once('include/DbOperations.php');

	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$school = htmlentities(trim($_POST['schoolid']));
		$sname = htmlentities(trim(strtolower($_POST['stdname'])));
		$fname = htmlentities(trim(strtolower($_POST['fname'])));
		$mname = htmlentities(trim(strtolower($_POST['mname'])));
		$lname = htmlentities(trim(strtolower($_POST['lname'])));
		$area = htmlentities(trim(strtolower($_POST['area'])));
		$mob_one = htmlentities(trim($_POST['mob_one']));
		$mob_two = htmlentities(trim($_POST['mob_two']));
		$mob_three = htmlentities(trim($_POST['mob_three']));

		if(!empty($school)&&!empty($sname)&&!empty($fname)&&!empty($mname)&&!empty($lname)&&!empty($area)&&!empty($mob_one)){
			$db = new DbOperations();
			$result = $db->createNewStudent($school, $sname, $fname, $mname, $lname, $area, $mob_one, $mob_two, $mob_three);
			if($result == 1){
				$response['error'] = FALSE;
				$response['message'] = "Record saved successfully!";
			}
			else if($result == 2){
				$response['error'] = TRUE;
				$response['message'] = "Some error occurs please try again!";
			}
			else if($result == 0){
				$response['error'] = TRUE;
				$response['message'] = "Student record already exist in system!";
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