<?php
	require_once('../../admin/include/config.php');
	
	$courseId = mysqli_real_escape_string($con,$_REQUEST['courseid']);
	$subcourseId = mysqli_real_escape_string($con,$_REQUEST['subcourseid']);
	$subjectId = mysqli_real_escape_string($con,$_REQUEST['subjectid']);
	$chapterId = mysqli_real_escape_string($con,$_REQUEST['chapterid']);
	$loadTopic = mysqli_query($con, "SELECT `topic_id`, `courseid`, `subcourseid`, `subjectid`, `chapterid`, `topic_title` FROM `master_topics`
	WHERE `courseid` = '$courseId' AND `subcourseid` = '$subcourseId' AND `subjectid` = '$subjectId' AND `chapterid` = '$chapterId'");
?>
	<option value="0">SELECT TOPIC</option>
<?php	
	while($topicRow = mysqli_fetch_array($loadTopic)){
?>
	<option value="<?php echo $topicRow['topic_id'];?>"><?php echo strtoupper($topicRow['topic_title']);?></option>
<?php		
	}
?>