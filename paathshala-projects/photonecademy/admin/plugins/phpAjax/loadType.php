<?php
	require_once('../../include/config.php');
	
	$typeList = mysqli_query($con,"SELECT `cat_id`, `category` FROM `category_type`");
?>
	<option value="0">SELECT TYPE</option>
<?php	
	while($typeRow = mysqli_fetch_array($typeList)){
?>
	<option value="<?php echo $typeRow['cat_id'];?>"><?php echo strtoupper($typeRow['category']);?></option>
<?php		
	}
?>	