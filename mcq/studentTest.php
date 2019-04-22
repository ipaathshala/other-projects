  <?php   
  /*include_once('includes/dbFunction.php');
  $funObj = new dbFunction();
  if(!($_SESSION['uid'])){
  header("Location:index");
  }*/
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Batch Test</title>
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Plugins css -->
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="wrapper">
      <?php
        require_once('includes/topbar.php');
        require_once('includes/sidebar.php');
        ?>
      <div class="content-page">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="page-title-box">
                  <h4 class="page-title">Student Test</h4>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card m-b-20">
                  <div class="card-body">
                    <form>
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="form-group">
                            <select class="form-control select2" id="batch" name="batch">
                              <option value="0">Select Batch</option>
                              <?php
                                $sql = mysql_query("SELECT `batch_id`, `batch_title` FROM `batch`");
                                while($row = mysql_fetch_array($sql)){
                                ?>
                              <option value="<?php echo $row['batch_id'];?>"><?php echo strtoupper($row['batch_title']);?></option>
                              <?php 
                                }
                                ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <select class="form-control select2" id="student" name="student">
                              <option value="0">Select Student</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <select class="form-control select2" id="exam" name="exam">
                              <option value="0">Select Exam</option>
                              <?php
                                $sql = mysql_query("SELECT `eid`, `etitle` FROM `exams`");
                                while($row = mysql_fetch_array($sql)){
                                ?>
                              <option value="<?php echo $row['eid'];?>"><?php echo strtoupper($row['etitle']);?></option>
                              <?php 
                                }
                                ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group text-center">
                            <button type="button" class="btn btn-dark waves-effect waves-light addRow"><i class="fas fa-plus"></i> ADD EXAM DETAIL</button>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <table class="table table-hover table-bordered mb-10 text-center">
                            <thead>
                              <tr>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody id="examDetails">
                            </tbody>
                          </table>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group text-center">
                            <i class="fa fa-spinner fa-spin" id="loader"></i>
                            <button type="submit" name="submit" class="btn btn-dark waves-effect waves-light">SAVE RECORD</button>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="alert alert-danger bg-danger text-white invbatch" role="alert">Select batch</div>
                            <div class="alert alert-danger bg-danger text-white invstd" role="alert">Select Student</div>
                            <div class="alert alert-danger bg-danger text-white invexam" role="alert">Select exams</div>
                            <div class="alert alert-danger bg-danger text-white invdate" role="alert">Invalid date selection</div>
                            <div class="alert alert-danger bg-danger text-white invstime" role="alert">Invalid start time</div>
                            <div class="alert alert-danger bg-danger text-white invetime" role="alert">Invalid end time</div>
                            <div class="alert alert-danger bg-danger text-white fail" role="alert">Something goes wrong unable to proceed your request</div>
                            <div class="alert alert-success bg-success text-white success" role="alert">Record saved successfully</div>
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
        <?php require_once('includes/footer.php');?>
      </div>
    </div>
    <!-- END wrapper -->
    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.min.js"></script>
    <script src="plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Plugins js -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="plugins/select2/js/select2.min.js"></script>
    <script src="plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
    <script src="plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Plugins Init js -->
    <script src="assets/pages/form-advanced.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="js/savestudentexam.js"></script>
  </body>
</html>