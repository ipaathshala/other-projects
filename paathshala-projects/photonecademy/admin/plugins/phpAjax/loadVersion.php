<?php
	require_once('../../include/config.php');
	
	$courseId = $_REQUEST['courseid'];
	$subcourseId = $_REQUEST['subcourseid'];
	$subjectId = $_REQUEST['subjectid'];
	$chapterId = $_REQUEST['chapterid'];
	$topicId = $_REQUEST['topicid'];
	$catId = $_REQUEST['catid'];
	$levelId = $_REQUEST['levelid'];
	
	if(!empty($courseId)&&!empty($subcourseId)&&!empty($subjectId)&&!empty($chapterId)&&!empty($topicId)&&!empty($catId)&&!empty($levelId)){
		$versionList = mysqli_query($con,"SELECT `version_id`, `courseid`, `subcourseid`, `subjectid`, `chapterid`, `topicid`, `catid`, `levelid`, `version_title` FROM `version_type` WHERE 
		`courseid` = '$courseId' AND `subcourseid` = '$subcourseId' AND  `subjectid` = '$subjectId' AND `chapterid` = '$chapterId' AND `topicid` = '$topicId' AND `catid` = '$catId' AND 
		`levelid` = '$levelId'");
?>
		<option value="0">SELECT VERSION</option>
<?php	
		while($versionRow = mysqli_fetch_array($versionList)){
?>
	<option value="<?php echo $versionRow['version_id'];?>"><?php echo strtoupper($versionRow['version_title']);?></option>
<?php		
		}
	}
?>	