<?php
	
	require_once('../../admin/include/config.php');
	$loadCategory = mysqli_query($con, "SELECT `cat_id`, `category` FROM `category_type`");
?>
	<option value="0">Select Type</option>
<?php	
	while($CategoryRow = mysqli_fetch_array($loadCategory)){
?>
	<option value="<?php echo $CategoryRow['cat_id'];?>"><?php echo strtoupper($CategoryRow['category']);?></option>
<?php		
	}
?>