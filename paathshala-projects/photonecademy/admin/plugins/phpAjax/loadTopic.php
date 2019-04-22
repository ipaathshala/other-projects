<?php
	require_once('../../include/config.php');
	
	$courseId = $_REQUEST['courseid'];
	$subcourseId = $_REQUEST['subcourseid'];
	$subjectId = $_REQUEST['subjectid'];
	$chapterid = $_REQUEST['chapterid'];
	
	if(!empty($courseId) && !empty($subcourseId) && !empty($subjectId) && !empty($chapterid)){
		$topicList = mysqli_query($con,"SELECT `topic_id`, `courseid`, `subcourseid`, `subjectid`, `chapterid`, `topic_title` FROM `master_topics` WHERE `courseid` = '$courseId' AND `subcourseid` = '$subcourseId' AND `subjectid` = '$subjectId' AND `chapterid` = '$chapterid'");
?>
		<option value="0">SELECT TOPIC</option>
<?php	
		while($topicRow = mysqli_fetch_array($topicList)){
?>
	<option value="<?php echo $topicRow['topic_id'];?>"><?php echo strtoupper($topicRow['topic_title']);?></option>
<?php		
		}
	}
?>	