<?php
	require_once('include/DbOperations.php');
	error_reporting (E_ALL ^ E_NOTICE);
	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$leadId = htmlentities(trim($_POST['lead']));
		$telecallerid = htmlentities(trim($_POST['telecaller_id']));
		$last_call_date = htmlentities(trim($_POST['last_call_date']));
		$call_back_date = htmlentities(trim($_POST['call_back_date']));
		$call_back_time = htmlentities(trim($_POST['call_back_time']));
		$add_to_list = htmlentities(trim(strtolower(str_replace(' ','-',$_POST['add_list']))));
		$temp_feedback = htmlentities(trim(strtolower($_POST['temp_feedback'])));
		$call_status = htmlentities(trim(strtolower($_POST['call_status'])));
		$comment = htmlentities(trim(strtolower($_POST['comment'])));
		
		$db = new DbOperations();

		/*$fileName = $_FILES['Uploaded_File']['name'];
		$temporary = $_FILES["Uploaded_File"]["name"];
		$file_extension = end($temporary);
		$sourcePath = $_FILES['Uploaded_File']['tmp_name'];
		$targetPath = "upload/".$fileName;
		move_uploaded_file($sourcePath,$targetPath);*/

		require_once("uploadfile.php");
		
		

		/*if($db->saveLeadFeedback($leadId, $telecallerid, $last_call_date, $call_back_date, $call_back_time, $add_to_list, $temp_feedback, $call_status, $comment, $fileName)){*/
			if($db->saveLeadFeedback($leadId, $telecallerid, $last_call_date, $call_back_date, $call_back_time, $add_to_list, $temp_feedback, $call_status, $comment)){
			$response['error'] = FALSE;
			$response['message'] = "Success...";
		}
		else{
			$response['error'] = FALSE;
			$response['message'] = "Fail...";
		}
	}
	else{
		$response['error'] = TRUE;
		$response['message'] = "Something goes wrong unable to proceed your request kindly contact to the administrator!";
	}
	echo json_encode($response);
?>