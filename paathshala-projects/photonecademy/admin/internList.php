<?php 
  require_once('include/config.php');
  if($_SESSION['user_id']){
  	$delId = mysqli_real_escape_string($con,$_REQUEST['del']);
	if(!empty($delId)){
		mysqli_query($con,"DELETE FROM `master_interns` WHERE `intern_id` = '$delId'");
	}
	$inactId = mysqli_real_escape_string($con,$_REQUEST['inactive']);
	if(!empty($inactId)){
		mysqli_query($con,"UPDATE `master_interns` SET `intern_status`= 0 WHERE `intern_id` = '$inactId'");
	}
	$actId = mysqli_real_escape_string($con,$_REQUEST['active']);
	if(!empty($actId)){
		mysqli_query($con,"UPDATE `master_interns` SET `intern_status`= 1 WHERE `intern_id` = '$actId'");
	}
  }
  else{
	  require_once('logout.php');
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Intern List</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <link rel="shortcut icon" href="plugins/assets/images/favicon.ico">
    <!-- DataTables -->
    <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Responsive datatable examples -->
    <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
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
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="page-title-box">
                  <div class="card m-b-20">
                    <div class="card-body">
                      <h4 class="mt-0 header-title text-center">Intern List</h4>
                      <div class="alert alert-success bg-success text-white" role="alert" id="success">Success! result fetched successfully</div>
                      <div class="alert alert-danger bg-danger text-white" role="alert" id="empty">no result found</div>
                      <div class="alert alert-danger bg-danger text-white" role="alert" id="fail">Error! unable to proceed your request</div>
                      <div align="center" id="loader"><i class="fa fa-spinner fa-spin"></i></div>
                      <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody id="internList">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
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
    <!-- Required datatable js -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Responsive examples -->
    <script src="plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables/responsive.bootstrap4.min.js"></script>
    <!-- Datatable init js -->
    <script src="plugins/assets/pages/datatables.init.js"></script>
    <!-- App js -->
    <script src="plugins/assets/js/app.js"></script>
    <script src="plugins/custom-js/internList.js"></script>
  </body>
</html>