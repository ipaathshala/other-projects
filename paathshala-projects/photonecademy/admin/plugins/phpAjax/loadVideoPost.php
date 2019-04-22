<?php
	require_once('../../include/config.php');
	
	$courseId = htmlentities($_REQUEST['courseid']);
	$subcourseId = htmlentities($_REQUEST['subcourseid']);
	$subjectId = htmlentities($_REQUEST['subjectid']);
	$chapterid = htmlentities($_REQUEST['chapterid']);
	$topicId = htmlentities($_REQUEST['topicid']);
	
	if(!empty($courseId) && !empty($subcourseId) && !empty($subjectId) && !empty($chapterid) && !empty($topicId)){
		$postList = mysqli_query($con,"SELECT `post_id`, `courseid`, `subcourseid`, `subjectid`, `chapterid`, `topicid`, `catid`, `levelid`, `versionid`, `video_title`, `video_url`, `description` FROM `post` WHERE `courseid` = '$courseId' AND `subcourseid` = '$subcourseId' AND `subjectid` = '$subjectId' AND `chapterid` = '$chapterid' AND `topicid` = '$topicId'");
?>
		<option value="0">Select Post</option>
<?php	
		while($postRow = mysqli_fetch_array($postList)){
?>
	<option value="<?php echo $postRow['post_id'];?>"><?php echo strtoupper($postRow['video_title']);?></option>
<?php		
		}
	}
?>	