<?php
  $courseId = mysqli_real_escape_string($con,$_POST['course']);
  $subcourseId = mysqli_real_escape_string($con,$_POST['subcourse']);
  $subjectId = mysqli_real_escape_string($con,$_POST['subject']);
  $chapterId = mysqli_real_escape_string($con,$_POST['chapter']);
  $topicId = mysqli_real_escape_string($con,$_POST['topic']);
  $categoryId = mysqli_real_escape_string($con,$_POST['category']);
  $levelId = mysqli_real_escape_string($con,$_POST['level']);
  $versionId = mysqli_real_escape_string($con,$_POST['version']);
  
  if(!empty($courseId)&&!empty($subcourseId)&&!empty($subjectId)&&!empty($chapterId)&&!empty($topicId)&&!empty($categoryId)&&!empty($levelId)&&!empty($versionId)){
  
  ?>
<div class="row">
  <div class="col-xl-6 col-lg-6 col-md-6">
    <div class="postbox mb-30">
      <div class="postbox__thumb">
        <iframe width="560" height="315" src="<?php echo $postRow['video_url'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-lg-6 col-md-6">
    <div class="postbox__text mb-30">
      <h4 class="title-16 pr-0">
        <?php echo ucfirst($postRow['video_title']);?>
      </h4>
      <div class="desc-text mb-20">
        <p class="text-justify"><?php echo ucfirst($postRow['description']);?></p>
      </div>
    </div>
  </div>
</div>
<hr>
<?php
  }
                }
                ?>