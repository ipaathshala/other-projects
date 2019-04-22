<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Sign In</title>
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <!-- Begin page -->
    <div class="wrapper-page">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center m-0"><a href="index" class="logo logo-admin"><img src="assets/images/logo.png" height="30" alt="logo"></a></h3>
          <div class="p-3">
            <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4>
            <form class="form-horizontal m-t-30">
              <div class="form-group">
                <input type="text" class="form-control" id="un" name="un" value="<?php echo $_POST['un'];?>" placeholder="Email" autocomplete="off">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="pw" name="pw" value="<?php echo $_POST['pw'];?>" placeholder="Password">
              </div>
              <div class="form-group row m-t-20">
                <div class="col-12 text-right">
                  <button class="btn btn-dark w-md waves-effect waves-light" type="submit" name="submit">Sign In</button>
                  <i class="fa fa-spinner fa-spin" id="loader"></i>
                </div>
                <div class="col-12 text-center">
                  <br>
                  <p>Don't have an account ? <a href="register" class="text-primary">Sign Up</a></p>
                  <p>Forgot password ? <a href="forgot" class="text-primary">Click here</a></p>
                </div>
              </div>
              <div class="form-group row m-t-20">
                <div class="col-12">
                  <div class="alert alert-danger bg-danger text-white" role="alert" id="invun">Invalid email format</div>
                  <div class="alert alert-danger bg-danger text-white" role="alert" id="invpw">Invalid password format</div>
                  <div class="alert alert-danger bg-danger text-white" role="alert" id="invalid">Invalid login credentials</div>
                  <div class="alert alert-danger bg-danger text-white" role="alert" id="fail">Something goes wrong unable to proceed request</div>
                  <div class="alert alert-success bg-success text-white" role="alert" id="success">Logged in successfully</div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="m-t-40 text-center">
        <div class="row">
          <div class="col-12">
            <p>Copyright &copy; 2019 All right reserved.</p>
            <b>Design &amp; Developed By - <a href="#">Paathshala Education</a></b>
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.min.js"></script>
    <script src="plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>