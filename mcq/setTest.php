  <?php   
  include_once('includes/DB_Functions.php');
  $db = new DB_Functions();
  error_reporting(0);
  if(!($_SESSION["user_id"])){
  header("Location:logout");
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Set Test</title>
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
                  <h4 class="page-title">Set Test</h4>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card m-b-20">
                  <div class="card-body">
                    <form class="m-t-10">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="control-label">Select Test</label> 
                            <select class="form-control select2" id="exam" name="exam">
                              <option value="0">Select</option>
                              <optgroup label="Type exam title"></optgroup>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label>Upload question</label>
                            <input type="file" class="filestyle" data-buttonname="btn-secondary" id="file" name="file" value="<?php echo $_POST['file'];?>">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="control-label">Answer</label> 
                            <select class="form-control select2" id="ans" name="ans">
                              <option value="0">Select Option</option>
                              <optgroup label="Select Answer">
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                              </optgroup>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="control-label">Correct Answer Marks</label> 
                            <select class="form-control select2" id="positive" name="positive">
                              <option value="0">Select Marks</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="control-label">Wrong Answer Marks</label> 
                            <select class="form-control select2" id="negative" name="negative">
                              <option value="0">0</option>
                              <option value="-1">-1</option>
                              <option value="-2">-2</option>
                              <option value="-3">-3</option>
                              <option value="-4">-4</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <i class="fa fa-spinner fa-spin" id="loader"></i>
                          <button type="submit" name="submit" class="btn btn-dark waves-effect waves-light">SAVE RECORD</button>
                        </div>
                        <div class="col-lg-12">
                          <br>
                          <div class="form-group">
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="invexam">Select exam</div>
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="invans">Select answer</div>
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="invfile">Invalid file format</div>
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="invmarks">Select marks</div>
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="fail">Something goes wrong unable to proceed request</div>
                            <div class="alert alert-success bg-success text-white" role="alert" id="success">Record saved successfully</div>
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
    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.min.js"></script>
    <script src="plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="plugins/select2/js/select2.min.js"></script>
    <script src="plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
    <script src="plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
    <script src="assets/pages/form-advanced.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="js/saveTest.js"></script>
  </body>
</html>