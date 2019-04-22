<?php
	require_once '../includes/DB_Functions.php';

	$db = new DB_Functions();
	if($db->standardList()){
		$response = array();
		$user = $db->standardList();
?>
		<option value="0">Select Chapter</option>
		<?php		
			foreach($user as $value){
		?>
				<option value="<?php echo $response['class_id'] = $value['class_id'];?>"><?php echo $response['class_title'] = strtoupper($value['class_title']);?></option>
		<?php			
		}
	}
?>