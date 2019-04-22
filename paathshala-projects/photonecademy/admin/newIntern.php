<?php 
	require_once('include/config.php');
	if(!$_SESSION['user_id']){
		require_once('logout.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>New Intern</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <link rel="shortcut icon" href="plugins/assets/images/favicon.ico">
    <link href="plugins/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="plugins/assets/css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <!-- Begin page -->
    <div id="wrapper">
      <!-- Top Bar Start -->
      <?php require_once('include/topbar.php');?>
      <?php require_once('include/sidebar.php');?>
      <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-1"></div>
              <div class="col-lg-10">
                <div class="page-title-box">
                  <div class="card m-b-20">
                    <div class="card-body">
                      <h4 class="mt-0 header-title text-center">Create Intern Profile</h4>
                      <form>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Email ID" name="mail" id="mail" value="<?php echo $_POST['mail'];?>" autocomplete="off">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <input type="password" class="form-control" placeholder="Password" name="pw" id="pw" value="<?php echo $_POST['pw'];?>" autocomplete="off">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <div align="center">
								<i class="fa fa-spinner fa-spin" id="loader"></i>
                                <button type="submit" name="submit" class="btn btn-success btn-lg">CREATE PROFILE</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <div class="alert alert-danger bg-danger text-white" id="empty">Error! field should not be empty</div>
                              <div class="alert alert-danger bg-danger text-white" id="invmail">Error! invalid email format</div>
                              <div class="alert alert-danger bg-danger text-white" id="fail">Error! unable to proceed your request</div>
                              <div class="alert alert-success bg-success text-white" id="success">Success! record saved successfully</div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-1"></div>
            </div>
          </div>
        </div>
        <?php require_once('include/footer.php');?>
      </div>
    </div>
    <!-- END wrapper -->
    <!-- jQuery  -->
    <script src="plugins/assets/js/jquery.min.js"></script>
    <script src="plugins/assets/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/assets/js/metisMenu.min.js"></script>
    <script src="plugins/assets/js/jquery.slimscroll.js"></script>
    <script src="plugins/assets/js/waves.min.js"></script>
    <script src="plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Parsley js -->
    <script src="plugins/parsleyjs/parsley.min.js"></script>
    <!-- App js -->
    <script src="plugins/assets/js/app.js"></script>
    <script src="plugins/custom-js/newIntern.js"></script>
  </body>
</html>