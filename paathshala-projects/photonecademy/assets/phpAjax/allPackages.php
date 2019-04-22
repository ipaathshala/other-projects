<?php
	require_once('../../admin/include/config.php');

	$course		=	$_REQUEST['courseid'];
	$subcourse	=	$_REQUEST['subcourseid'];
	$subject	=	$_REQUEST['subjectid'];
	$chapter	=	$_REQUEST['chapterid'];
	$topic		=	$_REQUEST['topicid'];
	$type		=	$_REQUEST['typeid'];
	$level		=	$_REQUEST['levelid'];
	$version	=	$_REQUEST['versionid'];
	
	if(isset($course)||isset($subcourse)||isset($subject)||isset($chapter)||isset($topic)||isset($type)||isset($level)||isset($version)){
		$sql = mysqli_query($con,"SELECT sub_package.*, master_package.* FROM sub_package
		LEFT JOIN master_package ON master_package.pkg_id = sub_package.masterpkgid
		LEFT JOIN master_course ON master_course.course_id = sub_package.courseid
		LEFT JOIN sub_course ON sub_course.subcourse_id = sub_package.subcourseid
		LEFT JOIN master_subject ON master_subject.sub_id = sub_package.subjectid
		LEFT JOIN master_chapter ON master_chapter.chapter_id = sub_package.chapterid
		LEFT JOIN master_topics ON master_topics.topic_id = sub_package.topicid
		LEFT JOIN category_type ON category_type.cat_id = sub_package.categoryid
		LEFT JOIN level_type ON level_type.level_id = sub_package.levelid
		LEFT JOIN version_type ON version_type.version_id = sub_package.versionid
		WHERE
		sub_package.courseid = '$course' AND
		sub_package.subcourseid = '$subcourse' AND
		sub_package.subjectid = '$subject' AND
		sub_package.chapterid = '$chapter' AND
		sub_package.topicid = '$topic' AND
		sub_package.categoryid = '$type' AND
		sub_package.levelid = '$level' AND
		sub_package.versionid = '$version' AND
		master_package.pkg_status = '1'");
	}
	else{
		$sql = mysqli_query($con,"SELECT sub_package.masterpkgid, sub_package.categoryid, master_package.pkg_name, master_package.pkg_img FROM sub_package LEFT JOIN master_package ON master_package.pkg_id = sub_package.masterpkgid WHERE master_package.pkg_status = '1' ORDER BY `pkg_id` DESC");
	}
	while($row = mysqli_fetch_array($sql)){
?>
<div class="col-xl-3 col-lg-6 col-md-6">
  <div class="postbox mb-30">
    <div class="postbox__text pt-10 pb-20 text-center">
      <b class="pr-0"><?php echo strtoupper($row['pkg_name']);?></b>
    </div>
    <div class="postbox__thumb">
      <a href="package_detail?pkg=<?php echo $row['masterpkgid'];?>"><img src="uploads/pkg-img/<?php echo $row['pkg_img'];?>" alt="<?php echo $row1['pkg_img'];?>"></a>
    </div>
    <div class="postbox__text pt-20 pb-20">
      <div align="center">
        <a href="package_detail?pkg=<?php echo $row['masterpkgid'];?>" class="btn-sm btn-dark"><i class="fa fa-eye"></i> View</a> &nbsp;
        <a href="#" class="btn-sm btn-dark"><i class="fa fa-shopping-cart"></i> ADD TO CART</a>
      </div>
    </div>
  </div>
</div>
<?php		
	}
?>