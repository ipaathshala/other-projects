<?php
	require_once('../../include/config.php');
	
	$levelList = mysqli_query($con,"SELECT `level_id`, `level_title` FROM `level_type`");
?>
	<option value="0">SELECT LEVEL</option>
<?php	
	while($levelRow = mysqli_fetch_array($levelList)){
?>
	<option value="<?php echo $levelRow['level_id'];?>"><?php echo strtoupper($levelRow['level_title']);?></option>
<?php		
	}
?>	