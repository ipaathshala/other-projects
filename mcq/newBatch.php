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
    <title>New Batch</title>
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Responsive datatable examples -->
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
                  <h4 class="page-title">Create Batch</h4>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card m-b-20">
                  <div class="card-body">
                    <form class="m-t-10">
                      <div class="row">
                        <div class="col-lg-10">
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter batch name" name="batch" id="batch" value="<?php echo $_POST['batch'];?>" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <i class="fa fa-spinner fa-spin" id="loader"></i>
                            <button type="submit" name="submit" class="btn btn-dark waves-effect waves-light">SAVE RECORD</button>
                            <button type="button" id="refresh" class="btn btn-primary waves-effect waves-light">REFRESH TABLE</button>
                          </div>
                        </div>
                        <div class="col-lg-10">
                          <div class="form-group">
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="invbatch">Field should not be empty</div>
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="duplicate">Exam already exist in the system</div>
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="invalid">Some error occurs unable to create new exam</div>
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="fail">Something goes wrong unable to proceed your request</div>
                            <div class="alert alert-success bg-success text-white" role="alert" id="success">Record saved successfully</div>
                            <div class="alert alert-success bg-success text-white" role="alert" id="successlist">Records fetched successfully</div>
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="norecords">No records to show</div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <table class="table mb-0">
                      <thead>
                        <tr>
                          <th>Sr No.</th>
                          <th>Batch Title</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="batchlist">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php require_once('includes/footer.php'); ?>
      </div>
    </div>
    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.min.js"></script>
    <script src="plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="js/savebatch.js"></script>
  </body>
</html>