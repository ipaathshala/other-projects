<?php
	require_once '../includes/DB_Functions.php';

	$db = new DB_Functions();
	if($db->boardList()){
		$response = array();
		$user = $db->boardList();
?>
		<option value="0">Select Board</option>
		<?php		
			foreach($user as $value){
		?>
				<option value="<?php echo $response['board_id'] = $value['board_id'];?>"><?php echo $response['board_name'] = strtoupper($value['board_name']);?></option>
		<?php			
		}
	}
?>