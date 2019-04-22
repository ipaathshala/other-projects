<?php
  require_once('include/config.php');
  error_reporting(0);
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Upload Submission</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <?php require_once('include/css.php');?>
  </head>
  <body>
    <!-- Begin page -->
    <div id="wrapper">
      <!-- Top Bar Start -->
      <?php require_once('include/topbar.php')?>
      <!-- Top Bar End -->
      <?php require_once('include/sidebar.php');?>
      <!-- Left Sidebar End -->
      <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                <div class="page-title-box">
                  <div class="card m-b-20">
                    <div class="card-body">
                      <h4 class="mt-0 header-title text-center">Upload Form</h4>
                      <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label>Select Batch</label> 
                          <b class="text-danger" id="invbatch">* select your batch</b>
                          <select class="form-control" name="batch" id="batch">
                            <option value="0">select</option>
                            <?php
                              $batchList = mysqli_query($con,"select batch_id, batch_title from master_batch");
                              while($row = mysqli_fetch_array($batchList)){
                              ?>
                            <option value="<?php echo $row['batch_id'];?>"><?php echo str_replace('-',' ',strtoupper($row['batch_title']));?></option>
                            <?php
                              }
                              ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Student Name</label> 
                          <b class="text-danger" id="invstud">* select your name</b>
                          <select class="form-control" name="student" id="student">
                            <option value="0">select</option>
                            <?php
                              $studentList = mysqli_query($con,"select std_id, std_name from master_student");
                              while($row1 = mysqli_fetch_array($studentList)){
                              ?>
                            <option value="<?php echo $row1['std_id'];?>"><?php echo str_replace('-',' ',strtoupper($row1['std_name']));?></option>
                            <?php
                              }
                              ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>File style without input</label> 
                          <b class="text-danger" id="invfile">* invalid file format </b>
                          <input type="file" class="filestyle" data-input="false" name="images[]" id="images" value="<?php echo $_POST['images'];?>" data-buttonname="btn-secondary btn-lg" multiple>
                        </div>
                        <div class="form-group">
                          <label>Write your comment</label> 
                          <textarea class="form-control" rows="10" name="comment"><?php echo $_POST['comments'];?></textarea>
                        </div>
                        <div class="form-group">
                          <button type="submit" name="submit" class="btn btn-primary btn-lg waves-effect waves-light">SUBMIT</button>
                          <b id="loader"><i class="fa fa-spinner fa-spin fa-2x text-success"></i></b>	
                          <br>
                          <br>
                          <div class="alert alert-success bg-success text-white" role="alert" id="success"><strong>Thank you!</strong> Your request send successfully</div>
                          <div class="alert alert-danger bg-danger text-white" role="alert" id="fail"><strong>* Oops</strong> Something goes wrong unable to send your request</div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2"></div>
            </div>
          </div>
        </div>
        <?php require_once('include/footer.php');?>
      </div>
    </div>
    <!-- jQuery  -->
    <?php require_once('include/jquery.php');?>
    <script src="plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
    <script src="plugins/custom-js/uploadSubmission.js"></script>
  </body>
</html>