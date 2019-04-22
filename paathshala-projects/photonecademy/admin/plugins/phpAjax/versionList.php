<?php
	require_once('../../include/config.php');
	
	$versionList = mysqli_query($con,"SELECT `version_id`, `version_title` FROM `version_type`");
?>
	<option value="0">SELECT VERSION</option>
<?php	
	while($versionRow = mysqli_fetch_array($versionList)){
?>
	<option value="<?php echo $versionRow['version_id'];?>"><?php echo strtoupper($versionRow['version_title']);?></option>
<?php		
	}
?>	