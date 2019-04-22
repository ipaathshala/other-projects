<?php
	/*include_once('../includes/dbFunction.php');
	$funObj = new dbFunction();
	$sql = mysql_query("SELECT `batch_id`, `batch_title` FROM `batch`")or die(mysql_error());
	while($row = mysql_fetch_array($sql)){
	<tr>
		<td><?php echo $row['batch_id']; ?></td>
		<td><?php echo ucfirst($row['batch_title']); ?></td>
	</tr>
	
	/*}*/
?>

<?php
	require_once '../includes/DB_Functions.php';
	$response = array();
	$db = new DB_Functions();

	if($db->examList()){
		$user = $db->batchList();
		foreach($user as $value){
?>
			<tr>
				<td><?php echo $response['batch_id'] = $value['batch_id'];?></td>
				<td><?php echo $response['batch_title'] = ucwords($value['batch_title']);?></td>
				<td>
					<a href="#" class="btn btn-dark waves-effect waves-light btn-sm"><i class="fa fa-edit"></i> EDIT</a>
					<a href="#" class="btn btn-primary waves-effect waves-light btn-sm"><i class="fa fa-trash"></i> DELETE</a>
				</td>
			</tr>
<?php			
		}
	}
?>