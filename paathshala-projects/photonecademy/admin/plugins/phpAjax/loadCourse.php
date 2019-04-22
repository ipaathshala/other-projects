<?php
	require_once('../../include/config.php');
	$sql = mysqli_query($con,"SELECT `course_id`, `course_name` FROM `master_course`");
?>
	<option value="0">SELECT COURSE</option>
<?php	
	while($row = mysqli_fetch_array($sql)){
?>
	<option value="<?php echo $row['course_id'];?>"><?php echo strtoupper($row['course_name']);?></option>
<?php		
	}
?>