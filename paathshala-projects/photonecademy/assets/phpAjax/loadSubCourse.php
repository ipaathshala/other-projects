<?php
	require_once('../../admin/include/config.php');
	
	$courseId = mysqli_real_escape_string($con,$_REQUEST['courseid']);
	if(!empty($courseId)){
		$loadsubCourse = mysqli_query($con, "SELECT `subcourse_id`, `mcid`, `subcourse_name` FROM `sub_course` WHERE `mcid` = '$courseId'");
?>
		<option value="0">SELECT SUB COURSE</option>
		<?php
			while($subcourseRow = mysqli_fetch_array($loadsubCourse)){
		?>
			<option value="<?php echo $subcourseRow['subcourse_id'];?>"><?php echo strtoupper($subcourseRow['subcourse_name']);?></option>
		<?php		
			}
	}
?>