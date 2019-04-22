<?php
	require_once('../../admin/include/config.php');
	
	$courseId = mysqli_real_escape_string($con,$_REQUEST['courseid']);
	$subcourseId = mysqli_real_escape_string($con,$_REQUEST['subcourseid']);
	$subjectId = mysqli_real_escape_string($con,$_REQUEST['subjectid']);
	$loadChapter = mysqli_query($con, "SELECT `chapter_id`, `courseid`, `subcourseid`, `subjectid`, `chapter_title` FROM `master_chapter` WHERE `courseid` = '$courseId' AND `subcourseid` = '$subcourseId' AND `subjectid` = '$subjectId'");
?>
	<option value="0">Select Chapter</option>
<?php	
	while($chapterRow = mysqli_fetch_array($loadChapter)){
?>
	<option value="<?php echo $chapterRow['chapter_id'];?>"><?php echo strtoupper($chapterRow['chapter_title']);?></option>
<?php		
	}
?>