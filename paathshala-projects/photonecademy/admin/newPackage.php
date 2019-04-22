<?php
	require_once('include/config.php');
	
	if(isset($_SESSION['user_id'])){
		$hideId = mysqli_real_escape_string($con, $_REQUEST['hide']);
		$activeId = mysqli_real_escape_string($con, $_REQUEST['active']);
		$delId = mysqli_real_escape_string($con, $_REQUEST['del']);
		
		if(!empty($hideId)){
			mysqli_query($con,"UPDATE `master_package` SET `pkg_status` = '0' WHERE `pkg_id` = '$hideId'");
		}
		if(!empty($activeId)){
			mysqli_query($con,"UPDATE `master_package` SET `pkg_status` = '1' WHERE `pkg_id` = '$activeId'");
		}
		if(!empty($delId)){
			mysqli_query($con,"DELETE FROM `master_package` WHERE `pkg_id` = '$delId'");
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
    <title>New Package</title>
    <!-- DataTables -->
    <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Responsive datatable examples -->
    <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <?php require_once('include/css.php');?>
  </head>
  <body>
    <div id="wrapper">
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
                      <h4 class="mt-0 header-title">Create New Package</h4>
                      <form enctype= multipart/form-data>
                        <div class="row">
                          <div class="col-lg-8">
                            <div class="form-group"> 
                              <input type="text" class="form-control" placeholder="Enter Package Title" id="pkg" name="pkg" value="<?php echo $_POST['pkg'];?>" autocomplete="off">
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="form-group">
                              <div class="form-group">
                                <input type="file" name="file" id="file" class="filestyle" data-buttonname="btn-secondary">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="form-group">
                              <div align="center">
                                <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-check"></i> SAVE PACKAGE</button>
                                <i class="fa fa-spinner fa-spin" id="loader"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="form-group">
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="empty"><strong>Error!</strong> field should not be empty</div>
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="invfile"><strong>Error!</strong> invalid file format</div>
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="fail"><strong>Error!</strong> unable to proceed your request</div>
                              <div class="alert alert-success bg-success text-white" role="alert" id="success"><strong>Success!</strong> record saved successfully</div>
                            </div>
                          </div>
                        </div>
                      </form>
                      <h4 class="mt-0 header-title">Package List</h4>
                      <div class="alert alert-success bg-success text-white" role="alert" id="listsuccess"><strong>Success!</strong> result fetched successfully</div>
                      <div class="alert alert-danger bg-danger text-white" role="alert" id="emptyresult"><strong>Error!</strong> no result to show</div>
                      <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody id="pkglist">
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
    <!-- jQuery  -->
    <?php require_once('include/jquery.php');?>
    <!-- Required datatable js -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Responsive examples -->
    <script src="plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables/responsive.bootstrap4.min.js"></script>
    <!-- Datatable init js -->
    <script src="plugins/assets/pages/datatables.init.js"></script>
    <!-- Plugins js -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="plugins/select2/js/select2.min.js"></script>
    <script src="plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
    <script src="plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
    <script src="plugins/custom-js/savePackage.js"></script>
  </body>
</html>