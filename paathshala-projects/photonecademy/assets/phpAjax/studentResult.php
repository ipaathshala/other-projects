<?php
  require_once('../../admin/include/config.php');
  $sql = mysqli_query($con,"SELECT `student_id`, `std_fname`, `std_lname`, `profile_pic`, `exams`, `marks`, `status` FROM `student_result`");
  while($row = mysqli_fetch_array($sql)){
  ?>
<div class="row">
  <div class="col-xl-12 col-lg-12">
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="col-xl-4 col-lg-4 col-md-6">
          <div class="postbox mb-40">
            <div class="postbox__thumb mb-25">
              <a href="#"><img src="uploads/student-list/<?php echo $row['profile_pic'];?>" alt="hero image"></a>
            </div>
            <div class="postbox__text">
              <h4 class="title-18 font-600 pr-0">
                <a href="#">Democrats all but acknowledge Kavana is headed toward confirmation.</a>
              </h4>
              <a href="#" class="read-more">read more</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php		
  }
  ?>