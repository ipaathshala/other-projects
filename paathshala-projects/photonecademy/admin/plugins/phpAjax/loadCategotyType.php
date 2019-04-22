<?php
	require_once('../../include/config.php');
	
	$courseId = $_REQUEST['courseid'];
	$subcourseId = $_REQUEST['subcourseid'];
	$subjectId = $_REQUEST['subjectid'];
	$chapterId = $_REQUEST['chapterid'];
	$topicId = $_REQUEST['topicid'];
	
	$typeList = mysqli_query($con,"SELECT `cat_id`, `courseid`, `subcourseid`, `subjectid`, `chapterid`, `topicid`, `category` FROM `category_type` WHERE `courseid` = '$courseId' AND `subcourseid` = '$subcourseId' AND `subjectid` = '$subjectId' AND `chapterid` = '$chapterId' AND `topicid` = '$topicId'");
?>
	<option value="0">Select Type</option>
<?php	
	while($typeRow = mysqli_fetch_array($typeList)){
?>
	<option value="<?php echo $typeRow['cat_id'];?>"><?php echo strtoupper($typeRow['category']);?></option>
<?php		
	}
?>	