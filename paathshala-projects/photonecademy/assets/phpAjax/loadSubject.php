<?php
	require_once('../../admin/include/config.php');
	
	$courseId = mysqli_real_escape_string($con, $_REQUEST['courseid']);
	$subcourseId = mysqli_real_escape_string($con, $_REQUEST['subcourseid']);
	
	if(!empty($courseId) && !empty($subcourseId)){
		$loadSubject = mysqli_query($con, "SELECT `sub_id`, `courseid`, `subcourseid`, `subject` FROM `master_subject` WHERE `courseid` = '$courseId' AND `subcourseid` = '$subcourseId'");	
?>
		<option value="0">Select Subject</option>
	<?php	
		while($subjectRow = mysqli_fetch_array($loadSubject)){
	?>
		<option value="<?php echo $subjectRow['sub_id'];?>"><?php echo strtoupper($subjectRow['subject']);?></option>
	<?php		
		}
	}
	?>