<?php
	require_once '../includes/DB_Functions.php';

	$response = array();
	$db = new DB_Functions();
	if($db->subjectDropdown()){
		$user = $db->subjectDropdown();
		foreach($user as $value){
?>
		<tr>
			<td><?php echo $response['sub_id'] = $value['sub_id'];?></td>
			<td><?php echo $response['subject_title'] = ucwords($value['subject_title']);?></td>
			<td>
				<a href="#" class="btn btn-dark waves-effect waves-light btn-sm"><i class="fa fa-edit"></i> EDIT</a>
				<a href="#" class="btn btn-primary waves-effect waves-light btn-sm"><i class="fa fa-trash"></i> DELETE</a>
			</td>
		</tr>
<?php			
		}
	}
?>