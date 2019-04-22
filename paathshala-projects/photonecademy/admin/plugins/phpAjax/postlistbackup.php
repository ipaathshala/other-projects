<?php
	require_once('../../include/config.php');
	
	$pkgId = mysqli_real_escape_string($con,$_REQUEST['pkglist']);
	$courseId = mysqli_real_escape_string($con,$_REQUEST['courseid']);
	$subcourseId = mysqli_real_escape_string($con,$_REQUEST['subcourseid']);
	$subjectId = mysqli_real_escape_string($con,$_REQUEST['subjectid']);
	$chapterId = mysqli_real_escape_string($con,$_REQUEST['chapterid']);
	$topicId = mysqli_real_escape_string($con,$_REQUEST['topicid']);
	$typeId = mysqli_real_escape_string($con,$_REQUEST['typeid']);
	$levelId = mysqli_real_escape_string($con,$_REQUEST['levelid']);
	$versionId = mysqli_real_escape_string($con,$_REQUEST['versionid']);
	
	if(!empty($courseId)&&!empty($subcourseId)&&!empty($subjectId)&&!empty($chapterId)&&!empty($topicId)&&!empty($typeId)&&!empty($levelId)&&!empty($versionId)){
		$videoPostList = mysqli_query($con,"SELECT * FROM `video_post` WHERE `catid`='$typeId'");
		$videoPostCount = mysqli_num_rows($videoPostList);
		if($videoPostCount>0){
			$sql = mysqli_query($con,"SELECT
			video_post.post_id, 
			video_post.video_title, 
			master_course.course_name, 
			sub_course.subcourse_name, 
			master_subject.subject, 
			master_chapter.chapter_title, 
			master_topics.topic_title, 
			category_type.category, 
			level_type.level_title, 
			version_type.version_title 
			FROM video_post 
			LEFT JOIN master_course ON master_course.course_id = video_post.courseid 
			LEFT JOIN sub_course ON sub_course.subcourse_id = video_post.subcourseid 
			LEFT JOIN master_subject ON master_subject.sub_id = video_post.subjectid 
			LEFT JOIN master_chapter ON master_chapter.chapter_id = video_post.chapterid
			LEFT JOIN master_topics ON master_topics.topic_id = video_post.topicid 
			LEFT JOIN category_type ON category_type.cat_id = video_post.catid
			LEFT JOIN level_type ON level_type.level_id = video_post.levelid
			LEFT JOIN version_type ON version_type.version_id = video_post.versionid
			WHERE
			video_post.courseid = '$courseId' AND
			video_post.subcourseid = '$subcourseId' AND
			video_post.subjectid = '$subjectId' AND
			video_post.chapterid = '$chapterId' AND
			video_post.topicid = '$topicId' AND
			video_post.catid = '$typeId' AND
			video_post.levelid = '$levelId' AND
			video_post.versionid = '$versionId'");
			
			$i = 1;
			$a = 1;
			$b = 1;
			while($result1 = mysqli_fetch_array($sql)){
		
?>
			<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo strtoupper($result1['video_title']);?></td>
				<td><?php echo strtoupper($result1['category']);?></td>
				<td><?php echo strtoupper($result1['level_title']);?></td>
				<td><?php echo strtoupper($result1['version_title']);?></td>
				<td><?php echo strtoupper($result1['chapter_title']);?></td>
				<td><?php echo strtoupper($result1['topic_title']);?></td>
				<td><?php echo strtoupper($result1['subject']);?></td>
				<td><?php echo strtoupper($result1['course_name']);?></td>
				<td><?php echo strtoupper($result1['subcourse_name']);?></td>
				<td>
				<a href="#" class="btn btn-primary btn-sm" title="ADD TO COURSE" id="vp<?php echo $a++;?>"><i class="fa fa-plus"></i></a>
				<a href="#" class="btn btn-danger btn-sm" title="REMOVE FROM COURSE"><i class="fa fa-minus"></i></a>
				<!--<a href="#" class="btn btn-dark btn-sm" title="VIEW PACKAGE DETAILS" id="b< ?php echo $b++;?>" data-toggle="modal" data-target=".bs-example-modal-lg"></a>-->
				<button type="button" class="btn btn-dark btn-sm" title="VIEW PACKAGE DETAILS" id="b<?php echo $b++;?>" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i></button>
				</td>
			</tr>
<?php			
			}
		}
		
		$pdfPostList = mysqli_query($con,"SELECT * FROM `pdf_post` WHERE `catid`='$typeId'");
		$pdfPostCount = mysqli_num_rows($pdfPostList);
		if($pdfPostCount>0){
			$sql2 = mysqli_query($con,"SELECT 
			pdf_post.pdfpost_id,
			pdf_post.pdf_title,
			master_course.course_name, 
			sub_course.subcourse_name, 
			master_subject.subject, 
			master_chapter.chapter_title, 
			master_topics.topic_title, 
			category_type.category, 
			level_type.level_title, 
			version_type.version_title
			FROM pdf_post
			LEFT JOIN master_course ON master_course.course_id = pdf_post.courseid
			LEFT JOIN sub_course ON sub_course.subcourse_id = pdf_post.subcourseid
			LEFT JOIN master_subject ON master_subject.sub_id = pdf_post.subjectid
			LEFT JOIN master_chapter ON master_chapter.chapter_id = pdf_post.chapterid
			LEFT JOIN master_topics ON master_topics.topic_id = pdf_post.topicid
			LEFT JOIN category_type ON category_type.cat_id = pdf_post.catid
			LEFT JOIN level_type ON level_type.level_id = pdf_post.levelid
			LEFT JOIN version_type ON version_type.version_id = pdf_post.versionid
			WHERE
			pdf_post.courseid = '$courseId' AND
			pdf_post.subcourseid = '$subcourseId' AND
			pdf_post.subjectid = '$subjectId' AND
			pdf_post.chapterid = '$chapterId' AND
			pdf_post.topicid = '$topicId' AND
			pdf_post.catid = '$typeId' AND
			pdf_post.levelid = '$levelId' AND
			pdf_post.versionid = '$versionId'");

			$j = 1;
			while($result2 = mysqli_fetch_array($sql2)){
?>
			<tr>
				<td><?php echo $j++;?></td>
				<td><?php echo strtoupper($result2['pdf_title']);?></td>
				<td><?php echo strtoupper($result2['category']);?></td>
				<td><?php echo strtoupper($result2['level_title']);?></td>
				<td><?php echo strtoupper($result2['version_title']);?></td>
				<td><?php echo strtoupper($result2['chapter_title']);?></td>
				<td><?php echo strtoupper($result2['topic_title']);?></td>
				<td><?php echo strtoupper($result2['subject']);?></td>
				<td><?php echo strtoupper($result2['course_name']);?></td>
				<td><?php echo strtoupper($result2['subcourse_name']);?></td>
				<td>
				<a href="#" class="btn btn-success btn-sm" title="ADD TO COURSE"><i class="fa fa-plus"></i></a>
				<a href="#" class="btn btn-danger btn-sm" title="REMOVE FROM COURSE"><i class="fa fa-minus"></i></a>
				</td>
			</tr>
<?php			
			}
		}
	}
?>