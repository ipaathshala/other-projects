<?php
	require_once('include/config.php');
	if($_SESSION['user_id']){
		$studentId = mysqli_real_escape_string($con,$_REQUEST['stdid']);
		$sql = mysqli_query($con,"SELECT `student_id`  FROM `master_student` WHERE `student_id` = '$studentId'");
		$count = mysqli_num_rows($sql);
		if($count>0){
			while($row = mysqli_fetch_array($sql)){
				$sid = $row['student_id'];
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Change Password</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="" name="author">
    <link rel="shortcut icon" href="plugins/assets/images/favicon.ico">
    <link href="plugins/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="plugins/assets/css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="wrapper">
      <?php require_once('include/topbar.php');?>
      <?php require_once('include/sidebar.php');?>
      <div class="content-page">
        <div class="content">
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="page-title-box">
                <div class="card m-b-20">
                  <div class="card-body">
                    <h4 class="mt-0 header-title text-center">Change Password</h4>
                    <form>
                      <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <input type="password" class="form-control" placeholder="New Password" id="newpw" name="newpw" value="<?php echo $_POST['newpw'];?>">
                                <input type="hidden" class="form-control" id="sid" name="sid" value="<?php echo $sid;?>">
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password" id="cpw" name="cpw" value="<?php echo $_POST['cpw'];?>">
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group">
                                <div align="center">
                                  <i class="fa fa-spinner fa-spin" id="loader"></i>
                                  <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-lock"></i> CHANGE PASSWORD</button> 
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group">
                                <div class="alert alert-danger bg-danger text-white" id="empty">field should not be empty</div>
                                <div class="alert alert-danger bg-danger text-white" id="invpw">confirm password does not match</div>
                                <div class="alert alert-danger bg-danger text-white" id="fail">unable to process your request</div>
                                <div class="alert alert-danger bg-success text-white" id="success">password updated successfully</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-1"></div>
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
    <script src="plugins/assets/js/jquery.min.js"></script>
    <script src="plugins/assets/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/assets/js/metisMenu.min.js"></script>
    <script src="plugins/assets/js/jquery.slimscroll.js"></script>
    <script src="plugins/assets/js/waves.min.js"></script>
    <script src="plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- App js -->
    <script src="plugins/assets/js/app.js"></script>
    <script src="plugins/custom-js/stdpwChange.js"></script>
  </body>
</html>