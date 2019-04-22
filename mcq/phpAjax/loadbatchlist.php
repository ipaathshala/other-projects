<?php
	require_once '../includes/DB_Functions.php';

	$db = new DB_Functions();
	$response = array();
	$user = $db->batchList();
?>
	<option value="0">Select Batch</option>
<?php	
	foreach($user as $value){
?>
		<option value="<?php echo $response['batch_id'] = $value['batch_id'];?>"><?php echo $response['batch_title'] = ucfirst($value['batch_title']);?></option>
<?php			
	}

	$user = $db->examList();
?>
	<option value="0">Select Exam</option>
<?php
	foreach($user as $value){
?>

<?php		
	}
?>	