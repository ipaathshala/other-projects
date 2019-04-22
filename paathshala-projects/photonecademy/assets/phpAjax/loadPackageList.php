<?php
	require_once('../../admin/include/config.php');
	
	$sql = mysqli_query($con,"SELECT `pkg_id`, `pkg_name` FROM `master_package`");
?>	
	<option value="0">SELECT PACKAGE</option>
<?php
	while($row = mysqli_fetch_array($sql)){
?>
		<option value="<?php echo $row['pkg_id'];?>"><?php echo strtoupper($row['pkg_name']);?></option>
<?php		
	}
?>