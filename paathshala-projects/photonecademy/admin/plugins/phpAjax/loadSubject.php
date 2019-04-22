<?php
	require_once('../../include/config.php');
	
	$courseId = $_REQUEST['courseid'];
	$subcourseId = $_REQUEST['subcourseid'];
	
	if(!empty($courseId) && !empty($subcourseId)){
		$subjectList = mysqli_query($con,"SELECT `sub_id`, `courseid`, `subcourseid`, `subject` FROM `master_subject` WHERE `courseid` = '$courseId' AND `subcourseid` = '$subcourseId'");
?>
		<option value="0">SELECT SUBJECT</option>
<?php	
		while($subjectRow = mysqli_fetch_array($subjectList)){
?>
			<option value="<?php echo $subjectRow['sub_id'];?>"><?php echo strtoupper($subjectRow['subject']);?></option>
<?php		
		}
	}
?>	