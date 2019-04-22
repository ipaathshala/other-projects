  <?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Forgot Password</title>
    <?php require_once('require/header-css.php');?>
  </head>
  <body>
    <div class="wrapper-page">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center m-0"><a href="index" class="logo logo-admin"><img src="assets/images/logo.png" height="150" alt="logo"></a></h3>
          <div class="p-3">
            <h4 class="text-muted font-18 mb-3 text-center">Reset Password</h4>
            <div class="alert alert-info bg-info text-white" role="alert"><strong>Enter your email and instructions will be sent to you !</strong></div>
            <form class="form-horizontal m-t-30">
              <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $_POST['email'];?>" placeholder="Enter email" autocomplete="off">
              </div>
              <div class="form-group row m-t-20">
                <div class="col-12 text-right">
                  <i class="fas fa-spinner fa-spin" id="loader"></i>
                  <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="submit">Reset</button>
                </div>
                <div class="col-12 m-t-10">
                  <div class="alert alert-danger bg-danger text-white" role="alert" id="invemail"><strong>Error!</strong> Invalid email format</div>
                  <div class="alert alert-danger bg-danger text-white" role="alert" id="norecord"><strong>Error!</strong> No record found in system</div>
                  <div class="alert alert-danger bg-danger text-white" role="alert" id="invalid"><strong>Error!</strong> Some error occurs unable to send email</div>
                  <div class="alert alert-danger bg-danger text-white" role="alert" id="fail"><strong>Error!</strong> Unable to proceed your request</div>
                  <div class="alert alert-success bg-success text-white" role="alert" id="success"><strong>Success!</strong> New password has been sent on your email</div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery  -->
    <?php require_once('require/footer-js.php');?>
    <script src="custom-js/forgot-password.js"></script>
  </body>
</html>