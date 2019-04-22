<?php
	require_once('include/DbOperations.php');

	$response = array();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$leadId = htmlentities(trim($_POST['lead']));
		$callbackDate = htmlentities(trim($_POST['call_back_date']));
		$callbackTime = htmlentities(trim($_POST['call_back_time']));
		$add_to_list = htmlentities(trim(strtolower($_POST['add_list'])));
		$temp_feedback = htmlentities(trim(strtolower($_POST['temp_feedback'])));
		$call_status = htmlentities(trim(strtolower($_POST['call_status'])));
		$comment = htmlentities(trim(strtolower($_POST['comment'])));
		$last_call_date = htmlentities(trim($_POST['last_call_date']));
		//$un = htmlentities($_POST['username']);

		/*if(!empty($leadId)&&!empty($callbackDate)&&!empty($callbackTime)&&!empty($add_to_list)&&!empty($temp_feedback)&&!empty($call_status)&&!empty($comment)&&!empty($last_call_date)&&!empty($un)){*/
			if(!empty($leadId)&&!empty($callbackDate)&&!empty($callbackTime)&&!empty($add_to_list)&&!empty($temp_feedback)&&!empty($call_status)&&!empty($comment)&&!empty($last_call_date)){
				$db = new DbOperations();
				//$user = $db->getTelecallerUserName($un);
				/*foreach($user as $value){
					$tele_call_id = $response['tc_id'] = $value['tc_id'];
				}*/
				//if($db->saveLeadFeedback($leadId, $callbackDate, $callbackTime, $add_to_list, $temp_feedback, $call_status, $comment, $last_call_date, $tele_call_id)){
				if($db->saveLeadFeedback($leadId, $callbackDate, $callbackTime, $add_to_list, $temp_feedback, $call_status, $comment, $last_call_date)){
					$response['error'] = FALSE;
					$response['message'] = "Record saved successfully";	
				}
				else{
					$response['error'] = TRUE;
					$response['message'] = "Unable to preocess your request!";
				}
			}
			else{
				$response['error'] = TRUE;
				$response['message'] = "Select atleast one option!";
			}
		}
		else{
			$response['error'] = TRUE;
			$response['message'] = "Something goes wrong unable to proceed your request kindly contact to the administrator!";
		}
		echo json_encode($response);
?>