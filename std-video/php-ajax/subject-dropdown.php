<?php
	require_once '../includes/DB_Functions.php';

	$db = new DB_Functions();
	if($db->subjectDropdown()){
		$response = array();
		$user = $db->subjectDropdown();
?>
		<option value="0">Select Subject</option>
		<?php		
			foreach($user as $value){
		?>
				<option value="<?php echo $response['sub_id'] = $value['sub_id'];?>"><?php echo $response['subject_title'] = strtoupper($value['subject_title']);?></option>
		<?php			
		}
	}
?>