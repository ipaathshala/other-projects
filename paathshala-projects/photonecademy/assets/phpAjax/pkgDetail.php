<?php
  require_once('../../admin/include/config.php');
  
  $reqId = $_REQUEST['reqid'];
  
  $sql1 = mysqli_query($con, "SELECT `subpkg_id`, `masterpkgid`, `categoryid`, `postid` FROM `sub_package` WHERE `masterpkgid` = '$reqId'");
  
  while($row1 = mysqli_fetch_array($sql1)){
  $postArray = explode(',', $row1['postid']);
  $cat = $row1['categoryid'];
  }
  
  foreach($postArray as $postId){
  //foreach post go with category in post table using above cat id
  $sql2 = mysqli_query($con,"SELECT 
  sub_package.categoryid, 
  video_post.video_title, 
  video_post.video_url, 
  video_post.description as vdesc, 
  pdf_post.pdf_title, 
  pdf_post.pdf_attachment, 
  pdf_post.description as adesc
  FROM sub_package 
  LEFT JOIN video_post ON video_post.catid = sub_package.categoryid 
  LEFT JOIN pdf_post ON pdf_post.catid = sub_package.categoryid 
  WHERE sub_package.masterpkgid = '$reqId' AND sub_package.categoryid = '$cat'");
  }	
  while($row2 = mysqli_fetch_array($sql2)){
  ?>
<div class="col-xl-6 col-lg-6">
  <div class="post-details">
    <div class="post-thumb mb-25">
      <?php
        if(!empty($row2['pdf_attachment'])){
        ?>
      <iframe src="uploads/pdf-post/<?php echo $row2['pdf_attachment'];?>" style="width:100%; height:500px;" frameborder="0"></iframe>
      <?php	
        }	
        if(!empty($row2['video_url'])){
        ?>
      <iframe src="<?php echo $row2['video_url'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width:100%; height:315px;"></iframe>
      <?php		
        }
        ?>
    </div>
  </div>
</div>
<hr>
<div class="col-xl-6 col-lg-6">
  <div class="post-details">
    <h2 class="details-title mb-15 text-justify">
		<?php 
			if(!empty($row2['video_title'])){
				echo ucfirst($row2['video_title']);
			}
			if(!empty($row2['pdf_title'])){
				echo ucfirst($row2['pdf_title']);
			}
		?>
	</h2>
    <div class="post-content">
      <p class="text-justify">
		<?php 
			if(!empty($row2['vdesc'])){
				echo ucfirst($row2['vdesc']);
			}
			if(!empty($row2['adesc'])){
				echo ucfirst($row2['adesc']);
			}
		?>
	  </p>
    </div>
  </div>
</div>
<?php			
  }
  ?>