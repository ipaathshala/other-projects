<?php
  require_once('include/config.php');
  if(!isset($_SESSION['user_id'])){
  require_once('include/logout.php');
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Update Package</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <link rel="shortcut icon" href="plugins/assets/images/favicon.ico">
    <!-- Plugins css -->
    <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css">
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
    <div id="wrapper">
      <?php require_once('include/topbar.php');?>
      <?php require_once('include/sidebar.php');?>
      <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="page-title-box">
                  <div class="card m-b-20">
                    <div class="card-body">
                      <form>
                        <div class="row">
                          <div class="col-12">
                            <div class="form-group">
                              <select class="form-control select2" id="pkglist" name="pkglist">
                                <option value="0">SELECT PACKAGE</option>
                                <optgroup label="Type package title">
                                </optgroup>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="form-group">
                              <select class="form-control select2" id="course" name="course">
                                <optgroup label="Type course title">
                                  <option value="0">SELECT COURSE</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <select class="form-control select2" id="subcourse" name="subcourse">
                                <optgroup label="Type subcourse title">
                                  <option value="0">SELECT SUB COURSE</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <select class="form-control select2" id="subject" name="subject">
                                <optgroup label="Type subject title">
                                  <option value="0">SELECT SUBJECT</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <select class="form-control select2" id="chapter" name="chapter">
                                <optgroup label="Type chapter title">
                                  <option value="0">SELECT CHAPTER</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <select class="form-control select2" id="topic" name="topic">
                                <optgroup label="Type topic title">
                                  <option value="0">SELECT TOPIC</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="form-group">
                              <select class="form-control select2" id="category" name="category">
                                <optgroup label="Type category title">
                                  <option value="0">SELECT TYPE</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <select class="form-control select2" id="level" name="level">
                                <optgroup label="Type level title">
                                  <option value="0">SELECT LEVEL</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <select class="form-control select2" id="version" name="version">
                                <optgroup label="Type version title">
                                  <option value="0">SELECT VERSION</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                              <thead>
                                <tr>
                                  <th>Sr. No.</th>
                                  <th>POST TITLE</th>
                                  <th>TYPE</th>
                                  <th>LEVEL</th>
                                  <th>VERSION</th>
                                  <th>ACTION</th>
                                  <th>TOPIC</th>
                                  <th>CHAPTER</th>
                                  <th>SUBJECT</th>
                                  <th>SUB COURSE</th>
                                  <th>COURSE</th>
                                </tr>
                              </thead>
                              <tbody id="postList">
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <div class="form-group">
                              <div align="center">
                                <i class="fa fa-spinner fa-spin" id="loader"></i>
                                <button type="submit" name="submit" class="btn btn btn-success">SAVE PACKAGE</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <div class="form-group">
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="empty"><strong>Error!</strong> field should not be empty</div>
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="fail"><strong>Error!</strong> unable to save record</div>
                              <div class="alert alert-success bg-success text-white" role="alert" id="success"><strong>Success</strong> record saved successfully</div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php require_once('include/sidebar.php');?>
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
    <script>
      $('#datatable').dataTable( {
      "ordering": false
      } );
    </script>
    <!-- Plugins js -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="plugins/select2/js/select2.min.js"></script>
    <script src="plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Plugins Init js -->
    <script src="plugins/assets/pages/form-advanced.js"></script>
    <script src="plugins/custom-js/saveSubPackage.js"></script>
  </body>
</html>