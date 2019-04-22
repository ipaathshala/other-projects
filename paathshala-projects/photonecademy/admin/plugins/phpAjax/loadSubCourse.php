<?php

	require_once('../../include/config.php');
	
	$courseId = $_REQUEST['courseid'];
	$subCourse = mysqli_query($con,"SELECT `subcourse_id`, `mcid`, `subcourse_name` FROM `sub_course` WHERE `mcid` = '$courseId'");
?>
	<option value="0">SELECT SUB COURSE</option>
<?php	
	while($subCourseRow = mysqli_fetch_array($subCourse)){
?>
	<option value="<?php echo $subCourseRow['subcourse_id'];?>"><?php echo strtoupper($subCourseRow['subcourse_name']);?></option>
<?php		
	}
?>