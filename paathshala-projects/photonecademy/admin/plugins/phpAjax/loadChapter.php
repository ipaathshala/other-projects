<?php
	require_once('../../include/config.php');
	
	$courseId = $_REQUEST['courseid'];
	$subcourseId = $_REQUEST['subcourseid'];
	$subjectId = $_REQUEST['subjectid'];
	
	if(!empty($courseId) && !empty($subcourseId) && !empty($subjectId)){
		$chapterList = mysqli_query($con,"SELECT `chapter_id`, `courseid`, `subcourseid`, `subjectid`, `chapter_title` FROM `master_chapter` WHERE `courseid` = '$courseId' AND `subcourseid` = '$subcourseId' AND `subjectid` = '$subjectId'");
?>
	<option value="0">SELECT CHAPTER</option>
<?php	
	while($chapterRow = mysqli_fetch_array($chapterList)){
?>
		<option value="<?php echo $chapterRow['chapter_id'];?>"><?php echo strtoupper($chapterRow['chapter_title']);?></option>
<?php		
		}
	}
?>	