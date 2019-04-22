<?php require_once('include/config.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Admin Login</title>
    <?php require_once('include/css.php');?>
  </head>
  <body>
    <div class="wrapper-page">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center m-0"><a href="index" class="logo logo-admin"><img src="plugins/assets/images/logo.png" alt="logo"></a></h3>
          <div class="p-3">
            <h4 class="text-muted font-18 m-b-5 text-center">Login to Admin Area</h4>
            <form class="form-horizontal m-t-30">
              <div class="form-group">
                <input type="text" class="form-control" id="un" name="un" value="<?php echo $_POST['un'];?>" placeholder="Enter email" autocomplete="off">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="pw" name="pw" value="<?php echo $_POST['pw'];?>" placeholder="Enter password" autocomplete="off">
              </div>
              <div class="form-group row m-t-20">
                <div class="col-12 text-right">
                  <i class="fa fa-spinner fa-spin" id="loader"></i>
                  <button class="btn btn-primary btn-lg" type="submit" name="submit">Login</button>
                </div>
              </div>
              <div class="form-group m-t-10 mb-0 row">
                <div class="col-12 m-t-20">
                  <div class="alert alert-danger bg-danger text-white" role="alert" id="empty"><strong>Error!</strong> field should not be empty</div>
                  <div class="alert alert-danger bg-danger text-white" role="alert" id="invun"><strong>Error!</strong> invalid email format</div>
                  <div class="alert alert-danger bg-danger text-white" role="alert" id="invlogin"><strong>Error!</strong> invalid login details</div>
                  <div class="alert alert-danger bg-danger text-white" role="alert" id="fail"><strong>Error!</strong> unable to process your request</div>
                </div>
              </div>
              <div class="form-group m-t-10 mb-0 row">
                <div class="col-12 m-t-20">
                  <p class="font-14 text-muted mb-0">I don't have account - <a href="signup" class="text-primary">Create New Account</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="m-t-40 text-center">
        <p>Copyright &copy; 2018 All rights reserved Paathshala Education </p>
      </div>
    </div>
    <!-- jQuery  -->
    <?php require_once('include/jquery.php');?>
    <script src="plugins/custom-js/login.js"></script>
  </body>
</html>