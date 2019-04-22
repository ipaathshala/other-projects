<?php require_once('include/config.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Forgot Password</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <link rel="shortcut icon" href="plugins/assets/images/favicon.ico">
    <link href="plugins/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="plugins/assets/css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="wrapper-page">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center m-0"><a href="index.html" class="logo logo-admin"><img src="plugins/assets/images/logo.png" height="30" alt="logo"></a></h3>
          <div class="p-3">
            <h4 class="text-muted font-18 mb-3 text-center">Reset Password</h4>
            <form class="form-horizontal m-t-30">
              <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $_POST['email'];?>" placeholder="Enter email" autocomplete="off">
              </div>
              <div class="form-group row m-t-20">
                <div class="col-12 text-right">
                  <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="submit">Reset Password</button>
                </div>
              </div>
            </form>
			<div align="center" id="loader"><i class="fa fa-spinner fa-spin"></i></div>
            <div class="alert alert-danger bg-danger text-white" role="alert" id="invmail">Error! invalid email format</div>
            <div class="alert alert-danger bg-danger text-white" role="alert" id="norecord">Error! no record found</div>
            <div class="alert alert-danger bg-danger text-white" role="alert" id="fail">Error! no records found</div>
            <div class="alert alert-success bg-success text-white" role="alert" id="success">Success! check your email to reset password</div>
          </div>
        </div>
      </div>
      <div class="m-t-40 text-center">
        <p>I've an account <a href="index" class="text-primary">Click here to login </a></p>
        <p>Copyright &copy; 2018 All rights reserved Paathshala Education</p>
      </div>
    </div>
    <!-- jQuery  -->
    <script src="plugins/assets/js/jquery.min.js"></script>
    <script src="plugins/assets/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/assets/js/metisMenu.min.js"></script>
    <script src="plugins/assets/js/jquery.slimscroll.js"></script>
    <script src="plugins/assets/js/waves.min.js"></script>
    <script src="plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- App js -->
    <script src="plugins/assets/js/app.js"></script>
    <script src="plugins/custom-js/forgotPassword.js"></script>
  </body>
</html>