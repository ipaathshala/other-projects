<?php 
  require_once('admin/include/config.php');
  ?>
<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>User Account</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
      require_once('include/css.php');
      ?>
  </head>
  <body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
    <!-- Add your site or application content here -->
    <!-- header start -->
    <?php
      require_once('include/header.php');
      ?>
    <!-- header end -->
    <main>
      <div class="contact-area pt-110 pb-90">
        <div class="container">
          <div class="row">
            <div class="col-xl-6 col-lg-6">
              <div class="contact-form mb-30">
                <h3>Already have an account?</h3>
                <form id="signin">
                  <div class="row">
                    <div class="col-xl-12">
                      <input type="text" placeholder="Enter Username" name="un" id="un" value="<?php echo $_POST['un'];?>" autocomplete="off">
                    </div>
                    <div class="col-xl-12">
                      <input type="password" placeholder="Enter Password" name="pw" id="pw" value="<?php echo $_POST['pw'];?>" autocomplete="off">
                    </div>
                    <div class="col-xl-12">
                      <div align="center" id="signinloader"><i class="fa fa-spinner fa-spin fa-2x"></i> </div>
                      <button class="btn brand-btn" type="submit" name="submit"> SIGN IN</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xl-12">
                      <div class="pt-10 pb-10">
                        <div class="alert alert-danger" id="loginempty"><small>Error! fields should not be empty</small></div>
                        <div class="alert alert-danger" id="loginemail"><small>Error! invalid email format</small></div>
                        <div class="alert alert-danger" id="invlogin"><small>Error! invalid login details</small></div>
                        <div class="alert alert-danger" id="loginerror"><small>Error! something goes wrong unable to proceed your request</small></div>
                        <div class="alert alert-success" id="loginsuccess"><small>Success! you will be redircted shortly</small></div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div class="contact-form mb-30">
                <h3>Create new account</h3>
                <form id="signup">
                  <div class="row">
                    <div class="col-xl-12">
                      <input type="text" placeholder="Enter your email" name="newun" id="newun" value="<?php echo $_POST['newun'];?>" autocomplete="off">
                    </div>
                    <div class="col-xl-12">
                      <input type="password" placeholder="Enter Password" name="newpw" id="newpw" value="<?php echo $_POST['newpw'];?>" autocomplete="off">
                    </div>
                    <div class="col-xl-12">
                      <div align="center" id="signuploader"><i class="fa fa-spinner fa-spin fa-2x"></i> </div>
                      <button class="btn brand-btn" type="submit" name="submit"> SIGN UP</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xl-12">
                      <div class="pt-10 pb-10">
                        <div class="alert alert-danger" id="emptysignup"><small>Error! fields should not be empty</small></div>
                        <div class="alert alert-danger" id="signupemail"><small>Error! invalid email format</small></div>
                        <div class="alert alert-danger" id="signupfail"><small>Error! something goes wrong unable to proceed your request</small></div>
                        <div class="alert alert-success" id="signupsuccess"><small>Success! your account created successfully</small></div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- footer -->
    <?php
      require_once('include/footer.php');
      ?>
    <!-- footer end -->
    <!-- JS here -->
    <?php
      require_once('include/js.php');
      ?>
    <script src="assets/custom-js/account.js"></script>
    <script src="assets/custom-js/loader.js"></script>
  </body>
</html>