<?php
  require_once('include/connection.php');
  if(!$_SESSION['userid']){
  require_once('include/logout.php');
  }
  error_reporting(0);
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Manage Category</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <!-- header start -->
      <?php require_once('include/header.php');?>
      <!-- header end -->
      <!-- sidebar start -->
      <?php require_once('include/sidebar.php');?>
      <!-- sidebar end -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            General UI
            <small>Preview of UI elements</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">UI</a></li>
            <li class="active">General</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Manage Category</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Manage Batch</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Submission Type</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <form role="form" method="post" id="category">
                      <p class="login-box-msg text-danger">
                        <small id="catempty">* Fields should not be empty</small>
                        <small id="catfail">* Oops something goes wrong unable to create category</small>
                        <small id="catsuccess" class="text-success">Category created successfully</small>
                      </p>
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Category Title</label>
                          <input type="text" class="form-control" placeholder="Enter Category Title" id="catname" name="catname" value="<?php echo $_POST['catname'];?>" autofocus autocomplete="off">
                        </div>
                      </div>
                      <div class="box-footer">
                        <i class="fa fa-spinner fa-spin text-success fa-2x catloader"></i>
                        <button type="submit" name="category" class="btn btn-primary" id="catbtn">Create Category</button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="tab_2">
                    <form role="form" method="post" id="batch">
                      <p class="login-box-msg text-danger">
                        <small id="batchmpty">* Fields should not be empty</small>
                        <small id="batchfail">* Oops something goes wrong unable to create batch</small>
                        <small id="batchsuccess" class="text-success">Batch created successfully</small>
                      </p>
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Batch Title</label>
                          <input type="text" class="form-control" placeholder="Enter Batch Title" id="batchname" name="batchname" value="<?php echo $_POST['batchname'];?>" autofocus autocomplete="off">
                        </div>
                      </div>
                      <div class="box-footer">
                        <i class="fa fa-spinner fa-spin text-success fa-2x batchloader"></i>
                        <button type="submit" name="batch" class="btn btn-primary" id="batchbtn">Create Batch</button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="tab_3">
                    <form role="form" method="post" id="submission">
                      <p class="login-box-msg text-danger">
                        <small id="subempty">* Fields should not be empty</small>
                        <small id="subfail">* Oops something goes wrong unable to create batch</small>
                        <small id="subsuccess" class="text-success">Batch created successfully</small>
                      </p>
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Submission Type</label>
                          <input type="text" class="form-control" placeholder="Enter Submission Type" id="subname" name="subname" value="<?php echo $_POST['subname'];?>" autofocus autocomplete="off">
                        </div>
                      </div>
                      <div class="box-footer">
                        <i class="fa fa-spinner fa-spin text-success fa-2x subloader"></i>
                        <button type="submit" name="submission" class="btn btn-primary" id="subbtn">Create Submission Type</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- footer start -->
      <?php require_once('include/footer.php');?>
      <!-- footer end -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
    <script src="assets/custom-js/saveForm.js"></script>
  </body>
</html>