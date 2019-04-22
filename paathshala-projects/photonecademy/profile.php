<?php require_once('admin/include/config.php');?>
<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Profile</title>
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
    <?php require_once('include/header.php'); ?>
    <!-- header end -->
    <main>
      <!-- page-title-area start -->
      <div class="page-title-area">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="page-title text-center mt-30">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                      <a href="index">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> Profile</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- hero-area end -->
      <!-- blog-area start -->
      <div class="contact-area pt-30">
        <div class="container">
          <div class="row">
            <div class="col-xl-12 col-lg-6">
              <div class="contact-form mb-30">
                <form>
                  <div class="row">
                    <?php
                      $sid = $_SESSION['user_id'];
                      $profile = mysqli_query($con,"SELECT `student_id`, `fn`, `ln`, `username`, `mobile`, `address`, `city`, `zipcode` FROM `master_student` WHERE `student_id` = '$sid'");
                      while($result = mysqli_fetch_array($profile)){
                      ?>
                    <div class="col-xl-6">
                      <input type="text" name="fn" id="fn" value="<?php echo $result['fn'];?>" placeholder="First Name" autocomplete="off">
                    </div>
                    <div class="col-xl-6">
                      <input type="text" name="ln" id="ln" value="<?php echo $result['ln'];?>" placeholder="Last Name" autocomplete="off">
                    </div>
                    <div class="col-xl-6">
                      <input type="text" name="email" id="email" value="<?php echo $result['username'];?>" placeholder="Email ID" autocomplete="off">
                    </div>
                    <div class="col-xl-6">
                      <input type="text" name="mob" id="mob" value="<?php echo $result['mobile'];?>" placeholder="Mobile Number" autocomplete="off">
                    </div>
                    <div class="col-xl-12">
                      <textarea placeholder="Complete Address" id="add" name="add"><?php echo $result['address'];?></textarea>
                    </div>
                    <div class="col-xl-6">
                      <input type="text" name="city" id="city" value="<?php echo $result['city'];?>" placeholder="City" autocomplete="off">
                    </div>
                    <div class="col-xl-6">
                      <input type="text" name="zipcode" id="zipcode" value="<?php echo $result['zipcode'];?>" placeholder="Zipcode" autocomplete="off">
                    </div>
                    <?php 
                      }
                      ?>
                    <div class="col-xl-12">
                      <button class="btn brand-btn" type="submit" name="submit">update profile</button>
                      <i class="fa fa-spinner fa-spin" id="profileloader"></i>
                    </div>
                  </div>
                </form>
                <p class="ajax-response">
                <div class="alert alert-danger" id="emptyprofile">field should not be empty</div>
                <div class="alert alert-danger" id="invname">invalid name format</div>
                <div class="alert alert-danger" id="invmail">invalid email format</div>
                <div class="alert alert-danger" id="invmob">invalid mobile format</div>
                <div class="alert alert-danger" id="invzipcode">invalid zipcode format</div>
                <div class="alert alert-danger" id="profilefail">unable to proceed your request</div>
                <div class="alert alert-success" id="profilesuccess">profile updated successfully</div>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- footer -->
    <?php require_once('include/footer.php');?>
    <!-- footer end -->
    <!-- JS here -->
    <?php
      require_once('include/js.php');
      ?>
    <script src="assets/custom-js/loader.js"></script>
    <script src="assets/custom-js/updateProfile.js"></script>
  </body>
</html>