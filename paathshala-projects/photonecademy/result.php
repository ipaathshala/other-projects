<?php require_once('admin/include/config.php');?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Result</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once('include/css.php');?>
  </head>
  <body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
    <!-- Add your site or application content here -->
    <!-- header start -->
    <?php require_once('include/header.php');?>
    <!-- header end -->
    <main>
      <section class="news-area">
        <div class="container">
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="category-title-area pt-30 pb-30">
                <div class="category-list-view pt-30" id="postResult">
                  <?php
                    $courseId = mysqli_real_escape_string($con,$_POST['course']);
                    $subcourseId = mysqli_real_escape_string($con,$_POST['subcourse']);
                    $subjectId = mysqli_real_escape_string($con,$_POST['subject']);
                    $chapterId = mysqli_real_escape_string($con,$_POST['chapter']);
                    $topicId = mysqli_real_escape_string($con,$_POST['topic']);
                    $categoryId = mysqli_real_escape_string($con,$_POST['category']);
                    $levelId = mysqli_real_escape_string($con,$_POST['level']);
                    $versionId = mysqli_real_escape_string($con,$_POST['version']);
                    
                    if(!empty($courseId)&&!empty($subcourseId)&&!empty($subjectId)&&!empty($chapterId)&&!empty($topicId)&&!empty($categoryId)&&!empty($levelId)
                    &&!empty($versionId)){
						$videoPostList = mysqli_query($con,"SELECT * FROM `video_post` WHERE `catid`='$categoryId'");
						$videoPostCount = mysqli_num_rows($videoPostList);
						if($videoPostCount>0){
							$sql = mysqli_query($con,"SELECT video_post.post_id, video_post.video_title, video_post.video_url, video_post.description FROM video_post LEFT JOIN master_course ON master_course.course_id = video_post.courseid LEFT JOIN sub_course ON sub_course.subcourse_id = video_post.subcourseid LEFT JOIN master_subject ON master_subject.sub_id = video_post.subjectid LEFT JOIN master_chapter ON master_chapter.chapter_id = video_post.chapterid LEFT JOIN master_topics ON master_topics.topic_id = video_post.topicid LEFT JOIN category_type ON category_type.cat_id =
							video_post.catid LEFT JOIN level_type ON level_type.level_id = video_post.levelid LEFT JOIN version_type ON version_type.version_id = video_post.versionid WHERE video_post.courseid = '$courseId' AND video_post.subcourseid = '$subcourseId' AND video_post.subjectid = '$subjectId' 
							AND video_post.chapterid = '$chapterId' AND video_post.topicid = '$topicId' AND video_post.catid = '$categoryId' AND video_post.levelid = '$levelId' AND video_post.versionid = '$versionId'");
							while($result1 = mysqli_fetch_array($sql)){
                    ?>
                  <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                      <div class="postbox mb-30">
                        <div class="postbox__thumb">
                          <iframe width="560" height="315" src="<?php echo $result1['video_url'];?>" frameborder="0" allow="accelerometer;autoplay;encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                      <div class="postbox__text mb-30">
                        <h4 class="title-16 pr-0"><?php echo ucfirst($result1['video_title']);?></h4>
                        <div class="desc-text mb-20">
                          <p class="text-justify"><?php echo ucfirst($result1['description']);?></p>
                          <span class="post-cat"><a href="detail?reqId=<?php echo $result1['post_id'];?>" tabindex="0">Read More</a></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <?php
							}
						}
						$pdfPostList = mysqli_query($con,"SELECT * FROM `pdf_post` WHERE `catid`='$categoryId'");
						$pdfPostCount = mysqli_num_rows($pdfPostList);
						if($pdfPostCount>0){
							$sql2 = mysqli_query($con,"SELECT pdf_post.pdfpost_id, pdf_post.pdf_title, pdf_post.pdf_attachment, pdf_post.description FROM pdf_post LEFT JOIN master_course ON master_course.course_id = pdf_post.courseid LEFT JOIN sub_course ON sub_course.subcourse_id = pdf_post.subcourseid LEFT JOIN master_subject ON master_subject.sub_id = pdf_post.subjectid LEFT JOIN master_chapter ON master_chapter.chapter_id = pdf_post.chapterid LEFT JOIN master_topics ON master_topics.topic_id = pdf_post.topicid LEFT JOIN category_type ON category_type.cat_id = pdf_post.catid LEFT JOIN level_type ON level_type.level_id = pdf_post.levelid LEFT JOIN version_type ON version_type.version_id = pdf_post.versionid WHERE pdf_post.courseid = '$courseId' AND pdf_post.subcourseid = '$subcourseId' AND pdf_post.subjectid = '$subjectId' AND pdf_post.chapterid = '$chapterId' AND pdf_post.topicid = '$topicId' AND pdf_post.catid = '$categoryId' AND pdf_post.levelid = '$levelId' AND pdf_post.versionid = '$versionId'");
							while($result2 = mysqli_fetch_array($sql2)){
                    ?>
                  <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4">
                      <div class="postbox mb-30">
                        <div class="postbox__thumb">
                          <a href="#"><img src="uploads/pdf-post/pdf.png" class="img img-responsive" style="width:25%;"></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8">
                      <div class="postbox__text mb-30">
                        <h4 class="title-16 pr-0"><?php echo ucfirst($result2['pdf_title']);?></h4>
                        <div class="desc-text mb-20">
                          <p class="text-justify"><?php echo ucfirst($result2['description']);?></p>
                          <span class="post-cat"><a href="detail?reqId=<?php echo $result2['pdfpost_id'];?>" tabindex="0">Read More</a></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <?php
							}
						}
                    }
                    ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- footer -->
    <?php require_once('include/footer.php');?>
    <!-- footer end -->
    <!-- JS here -->
    <?php require_once('include/js.php');?>
    <script src="assets/custom-js/loader.js"></script>
  </body>
</html>