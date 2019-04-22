<?php
  include_once('../includes/dbFunction.php');
  if(!isset($_SESSION['sid'])){
  header("Location:login");
  }
  error_reporting(0);
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Profile</title>
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="wrapper">
      <?php
        require_once('include/topbar.php');
        require_once('include/sidebar.php');
        ?>
      <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="page-title-box">
                  <h4 class="page-title">Profile</h4>
                </div>
              </div>
            </div>
            <!-- end row -->
            <div class="row">
              <div class="col-lg-12">
                <div class="card m-b-20">
                  <div class="card-body">
                    <form>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" id="fn" name="fn" value="<?php echo $_POST['fn'];?>" placeholder="Enter First Name" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" id="ln" name="ln" value="<?php echo $_POST['ln'];?>" placeholder="Enter Last Name" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Email Id</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION['username'];?>" placeholder="Enter Email" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Password</label>
                            <input type="passWord" class="form-control" id="pw" name="pw" value="<?php echo $_POST['pw'];?>" placeholder="Enter Password" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <i class="fa fa-spinner fa-spin" id="loader"></i>
                            <button type="submit" name="submit" class="btn btn-dark waves-effect waves-light">SAVE RECORD</button>
							<input type="hidden" class="form-control" id="session" name="session" value="<?php echo $_SESSION['sid'];?>">
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="empty">Field should not be empty</div>
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="invname">Invalid name format</div>
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="invemail">Invalid email format</div>
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="fail">Something goes wrong unable to process request</div>
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
        <?php require_once('include/footer.php');?>
      </div>
    </div>
    <!-- jQuery  -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.js"></script>
    <script src="../assets/js/waves.min.js"></script>
    <script src="../plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- App js -->
    <script src="../assets/js/app.js"></script>
    <script src="js/saveprofile.js"></script>
  </body>
</html>