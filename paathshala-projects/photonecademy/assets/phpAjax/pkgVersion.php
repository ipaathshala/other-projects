<?php
	require_once('../../admin/include/config.php');
	$loadVersion = mysqli_query($con, "SELECT `version_id`, `version_title` FROM `version_type`");
?>
	<option value="0">Select Version</option>
<?php	
	while($versionRow = mysqli_fetch_array($loadVersion)){
?>
	<option value="<?php echo $versionRow['version_id'];?>"><?php echo strtoupper($versionRow['version_title']);?></option>
<?php		
	}
?>