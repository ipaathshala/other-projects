  <!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Login</title>
    <meta name="author" content="">
    <meta name="robots" content="index follow">
    <meta name="googlebot" content="index follow">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('include/header-css.php');?>
  </head>
  <body class="background-white">
    <?php require_once('include/header.php'); ?>
    <section class="background-grey-1 padding-tb-35px text-grey-4">
      <div class="container">
        <ol class="breadcrumb z-index-2 position-relative no-background padding-tb-10px padding-lr-0px  margin-0px float-md-right">
          <li><a href="index" class="text-grey-4">Home</a></li>
          <li><strong>You are here</strong></li>
          <li class="active"><strong>Login</strong></li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </section>
    <section class="padding-tb-200px text-center text-lg-left" style="background-image: url('assets/img/login-bg.png');">
      <div class="container">
        <div class="row justify-content-md-center">
          <!--<div class="col-lg-12"><h1 class="margin-bottom-10px text-center text-white">EXPLORE's</h1></div>-->
          <div class="col-lg-7"></div>
          <div class="col-lg-5">
            <div class="padding-30px background-white border-1 border-grey-1">
              <form>
                <div class="form-group">
                  <label for="inputEmail3" class="col-form-label"><strong>Username or Email</strong></label>
                  <input type="email" class="form-control rounded-0" id="inputEmail3" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-form-label"><strong>Password</strong></label>
                  <input type="password" class="form-control rounded-0" id="inputPassword3" placeholder="Password">
                </div>
                <div class="form-group">
                  <a href="#" class="btn btn-primary btn-block rounded-0 background-main-color">Sign in</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer -->
    <?php
      require_once('include/footer.php');
      require_once('include/footer-js.php');
      ?>
  </body>
</html>