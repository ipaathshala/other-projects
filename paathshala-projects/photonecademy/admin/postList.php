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
    <title>Post List</title>
    <!-- DataTables -->
    <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Plugins css -->
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <!-- Responsive datatable examples -->
    <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <?php require_once('include/css.php');?>
  </head>
  <body>
    <div id="wrapper">
      <!-- Top Bar Start -->
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
                      <h4 class="mt-0 header-title">Post List</h4>
                      <form>
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
                            <div class="form-group">
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="empty"><strong>Error!</strong> field should not be empty</div>
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="fail"><strong>Error!</strong> unable to proceed your request</div>
                              <div class="alert alert-success bg-success text-white" role="alert" id="success"><strong>Success!</strong> result fetched successfully</div>
                              <div id="loader" align="center"><i class="fa fa-spinner fa-spin"></i></div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <div class="form-group">
                              <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                  <tr>
                                    <th>Sr.No.</th>
                                    <th>Course</th>
                                    <th>Sub Course</th>
                                    <th>Subject</th>
                                    <th>Topic</th>
                                    <th>Chapter</th>
                                    <th>Post Title</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody id="postResult">
                                </tbody>
                              </table>
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
        <?php require_once('include/footer.php');?>
      </div>
    </div>
    <!-- END wrapper -->
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
    <!-- App js -->
    <script src="plugins/assets/js/app.js"></script>
    <!-- Plugins js -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="plugins/select2/js/select2.min.js"></script>
    <script src="plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
    <script src="plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Plugins Init js -->
    <script src="plugins/assets/pages/form-advanced.js"></script>
    <script src="plugins/custom-js/loadPostList.js"></script>
  </body>
</html>