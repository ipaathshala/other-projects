<?php
	require_once('../../include/config.php');
	
	$course = htmlentities($_REQUEST['course']);
	$subcourse = htmlentities($_REQUEST['subcourse']);
	$subject = htmlentities($_REQUEST['subject']);
	$chapter = htmlentities($_REQUEST['chapter']);
	$topic = htmlentities($_REQUEST['topic']);
	$category = htmlentities($_REQUEST['category']);
	$level = htmlentities($_REQUEST['level']);
	$version = htmlentities($_REQUEST['version']);
	
	if(!empty($course) && !empty($subcourse) && !empty($subject) && !empty($chapter) && !empty($topic) && !empty($category) && !empty($level) && !empty($version)){
		$sql = mysqli_query($con,"SELECT `post_id`, `courseid`, `subcourseid`, `subjectid`, `chapterid`, `topicid`, `catid`, `levelid`, `versionid`, `video_url`, `description` FROM `post` WHERE
		`courseid` = '$course' AND `subcourseid` = '$subcourse' AND `subjectid` = '$subject' AND `chapterid` = '$chapter' AND `topicid` = '$topic' AND `catid` = '$category' AND 
		`levelid` = '$level' AND `versionid` = '$version'");
		while($row = mysqli_fetch_array($sql)){
?>
			<tr>
				<td><?php echo $row['post_id'];?></td>
				<td><?php echo $row['video_url'];?></td>
				<td><a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> EDIT</a></td>
				<td><a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> DELETE</a></td>
			</tr>
<?php			
		}
	}
?>