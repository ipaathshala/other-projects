<?php
  error_reporting(0);
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Student Signup</title>
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <!-- Begin page -->
    <div class="wrapper-page">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center m-0"><a href="index" class="logo logo-admin"><img src="../assets/images/logo.png" height="30" alt="logo"></a></h3>
          <div class="p-3">
            <h4 class="text-muted font-18 m-b-5 text-center">Free Register</h4>
            <form class="form-horizontal m-t-30">
              <div class="form-group">
                <label for="useremail">Email</label>
                <input type="text" class="form-control" id="un" name="un" value="<?php echo $_POST['un'];?>" placeholder="Enter email" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="userpassword">Password</label>
                <input type="password" class="form-control" id="pw" name="pw" value="<?php echo $_POST['pw'];?>" placeholder="Enter password">
              </div>
              <div class="form-group row m-t-20">
                <div class="col-12 text-right">
                  <i class="fa fa-spinner fa-spin" id="loader"></i>
                  <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="submit">Register</button>
                </div>
              </div>
              <div class="form-group row m-t-20">
                <div class="col-12">
					<div class="alert alert-danger bg-danger text-white" role="alert" id="empty">Fields should not be empty</div>
					<div class="alert alert-danger bg-danger text-white" role="alert" id="invun">Invalid email format</div>
					<div class="alert alert-danger bg-danger text-white" role="alert" id="duplicate">Email already exist in system</div>
					<div class="alert alert-danger bg-danger text-white" role="alert" id="fail">Something goes wrong unable to proceed request</div>
					<div class="alert alert-success bg-success text-white" role="alert" id="success">Account has been created successfully</div>
				</div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="m-t-40 text-center">
        <p>Already have an account ? <a href="login" class="text-primary">Login</a></p>
        <p>© 2018 Lexa. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
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
    <script src="js/signup.js"></script>
  </body>
</html>