<?php
	require_once('../../include/config.php');
	
	$pkgid = mysqli_real_escape_string($con,$_REQUEST['pkgid']);
	$courseId = mysqli_real_escape_string($con,$_REQUEST['courseid']);
	$subcourseId = mysqli_real_escape_string($con,$_REQUEST['subcourseid']);
	$subjectId = mysqli_real_escape_string($con,$_REQUEST['subjectid']);
	$chapterId = mysqli_real_escape_string($con,$_REQUEST['chapterid']);
	$topicId = mysqli_real_escape_string($con,$_REQUEST['topicid']);
	$typeId = mysqli_real_escape_string($con,$_REQUEST['typeid']);
	$levelId = mysqli_real_escape_string($con,$_REQUEST['levelid']);
	$versionId = mysqli_real_escape_string($con,$_REQUEST['versionid']);
	$x = 1;
	
	if(!empty($pkgid)&&!empty($courseId)&&!empty($subcourseId)&&!empty($subjectId)&&!empty($chapterId)&&!empty($topicId)&&!empty($typeId)&&!empty($levelId)&&
	!empty($versionId)){
		
		$checkVideoPost = mysqli_query($con,"SELECT `catid` FROM `video_post` WHERE `catid` = '$typeId'");
		$videoPostCount = mysqli_num_rows($checkVideoPost);
		
		$checkPdfPostList = mysqli_query($con,"SELECT `catid` FROM `pdf_post` WHERE `catid`='$typeId'");
		$pdfPostCount = mysqli_num_rows($checkPdfPostList);
		
		if($videoPostCount>0){
			$query1 = mysqli_query($con, "SELECT video_post.video_post_id, video_post.video_title, video_post.video_url, category_type.category, level_type.level_title, version_type.version_title, master_chapter.chapter_title, master_topics.topic_title, master_subject.subject, master_course.course_name, sub_course.subcourse_name FROM video_post LEFT JOIN category_type ON category_type.cat_id = video_post.catid LEFT JOIN level_type ON level_type.level_id = video_post.levelid LEFT JOIN version_type ON version_type.version_id = video_post.versionid LEFT JOIN master_chapter ON master_chapter.chapter_id = video_post.chapterid LEFT JOIN master_topics ON master_topics.topic_id = video_post.topicid  LEFT JOIN master_subject ON master_subject.sub_id = video_post.subjectid LEFT JOIN master_course ON master_course.course_id = video_post.courseid LEFT JOIN sub_course ON sub_course.subcourse_id = video_post.subcourseid WHERE video_post.courseid = '$courseId' AND video_post.subcourseid = '$subcourseId' AND video_post.subjectid = '$subjectId' AND video_post.chapterid = '$chapterId' AND video_post.topicid = '$topicId' AND video_post.catid = '$typeId' AND video_post.levelid = '$levelId' AND video_post.versionid = '$versionId'");
		}
		if($pdfPostCount>0){
			$query2 = mysqli_query($con, "SELECT pdf_post.pdfpost_id, pdf_post.pdf_title, category_type.category, level_type.level_title, version_type.version_title, master_chapter.chapter_title, master_topics.topic_title, master_subject.subject, master_course.course_name, sub_course.subcourse_name FROM pdf_post LEFT JOIN
			master_course ON master_course.course_id = pdf_post.courseid LEFT JOIN sub_course ON sub_course.subcourse_id = pdf_post.subcourseid LEFT JOIN master_subject ON master_subject.sub_id = pdf_post.subjectid LEFT JOIN master_chapter ON master_chapter.chapter_id = pdf_post.chapterid LEFT JOIN master_topics ON master_topics.topic_id = pdf_post.topicid LEFT JOIN category_type ON category_type.cat_id = pdf_post.catid LEFT JOIN level_type ON level_type.level_id = pdf_post.levelid LEFT JOIN version_type ON version_type.version_id = pdf_post.versionid WHERE pdf_post.courseid = '$courseId' AND pdf_post.subcourseid = '$subcourseId' AND pdf_post.subjectid = '$subjectId' AND pdf_post.chapterid = '$chapterId' AND pdf_post.topicid = '$topicId' AND pdf_post.catid = '$typeId' AND pdf_post.levelid = '$levelId' AND pdf_post.versionid = '$versionId'");
		}
		if(!empty($query1)){
			$array = array();
			$row = mysqli_fetch_array($query1);
			foreach($query1 as $row){
				$postArray[] = array('auto'=>$x++, 'pid'=>$row["video_post_id"], 'title'=>strtoupper($row["video_title"]), 'url'=>strtoupper($row["video_url"]), 'type_title'=>strtoupper($row["category"]),'level_title'=>strtoupper($row["level_title"]), 'version_title'=>strtoupper($row["version_title"]),'chapter_name'=>strtoupper($row["chapter_title"]), 'topic_name'=>strtoupper($row["topic_title"]), 'subject_name'=>strtoupper($row["subject"]), 'course_title'=>strtoupper($row["course_name"]), 'subcourse_title'=>strtoupper($row["subcourse_name"]));
			}
			echo json_encode($postArray);
		}
		if(!empty($query2)){
			$array = array();
			$row = mysqli_fetch_array($query2);
			foreach($query2 as $row){
				$postArray[] = array('auto'=>$x++, 'pid'=>$row["pdfpost_id"], 'title'=>strtoupper($row["pdf_title"]), 'type_title'=> strtoupper($row["category"]),
				'level_title'=>strtoupper($row["level_title"]), 'version_title'=>strtoupper($row["version_title"]),'chapter_name'=>strtoupper($row["chapter_title"]), 'topic_name'=>strtoupper($row["topic_title"]), 'subject_name'=>strtoupper($row["subject"]), 'course_title'=>strtoupper($row["course_name"]), 'subcourse_title'=>strtoupper($row["subcourse_name"]));
			}
			echo json_encode($postArray);
		}
	}
?>