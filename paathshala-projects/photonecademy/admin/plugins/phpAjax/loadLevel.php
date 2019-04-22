<?php
	require_once('../../include/config.php');

	$courseId = $_REQUEST['courseid'];
	$subcourseId = $_REQUEST['subcourseid'];
	$subjectId = $_REQUEST['subjectid'];
	$chapterId = $_REQUEST['chapterid'];
	$topicId = $_REQUEST['topicid'];
	$catId = $_REQUEST['catid'];
	
	if(!empty($courseId)&&!empty($subcourseId)&&!empty($subjectId)&&!empty($chapterId)&&!empty($topicId)&&!empty($catId)){
		$levelList = mysqli_query($con,"SELECT `level_id`, `courseid`, `subcourseid`, `subjectid`, `chapterid`, `topicid`, `typeid`, `level_title` FROM `level_type` WHERE 
		`courseid` = '$courseId' AND `subcourseid` = '$subcourseId' AND `subjectid` = '$subjectId' AND `chapterid` = '$chapterId' AND `topicid` = '$topicId' AND `typeid` = '$catId'");	
?>
		<option value="0">SELECT LEVEL</option>
<?php	
		while($levelRow = mysqli_fetch_array($levelList)){
?>
			<option value="<?php echo $levelRow['level_id'];?>"><?php echo strtoupper($levelRow['level_title']);?></option>
<?php		
		}
	}
?>	