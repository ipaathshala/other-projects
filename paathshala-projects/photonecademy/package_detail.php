<?php require_once('admin/include/config.php');?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BunGee - Blog, News & Magazine HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]--> 
    <!-- Add your site or application content here --> 
    <!-- header start -->
    <?php require_once('include/header.php');?>
    <!-- header end -->
    <main>
      <!-- page-title-area start -->
      <div class="page-title-area">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="page-title text-center pt-30">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"> <a href="index">Home</a> </li>
                    <li class="breadcrumb-item active" aria-current="page"> About us</li>
                    <input type="hidden" class="form-control" value="<?php echo $reqId = $_REQUEST['pkg'];?>" id="req_id">
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- page-title-area end -->
      <section class="post-details-area pt-60 pb-30">
        <div class="container">
          <?php
            if(isset($_SESSION['user_id'])){
            ?>
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="col-xl-12 col-lg-12">
                <div class="post-btn mb-15" align="right">
                  <a href="#" class="btn btn-border btn-success"><i class="fa fa-shopping-cart"></i> BUY PACKAGE</a>
                </div>
              </div>
              <div class="row" id="pkgResult"></div>
            </div>
            <div class="col-xl-12 col-lg-12">
              <div class="post-comments-form mt-40 mb-40">
                <div class="section-title mb-30">
                  <h2>Rate this package</h2>
                </div>
                <form action="#">
                  <div class="row">
                    <div class="col-xl-4">
                      <input type="text" placeholder="Your Name">
                    </div>
                    <div class="col-xl-4">
                      <input type="text" placeholder="Your Email">
                    </div>
                    <div class="col-xl-4">
                      <i class="fa fa-star fa-2x"></i>
                      <i class="fa fa-star fa-2x"></i>
                      <i class="fa fa-star fa-2x"></i>
                      <i class="fa fa-star fa-2x"></i>
                      <i class="fa fa-star fa-2x"></i>
                    </div>
                    <div class="col-xl-12">
                      <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Write your review"></textarea>
                    </div>
                    <div class="col-xl-12"> <i class="fa fa-star-o fa-2x"></i> <i class="fa fa-star-o fa-2x"></i> <i class="fa fa-star-o fa-2x"></i> <i class="fa fa-star-o fa-2x"></i> <i class="fa fa-star-o fa-2x"></i> </div>
                    <div class="col-xl-12 mt-1">
                      <button class="btn brand-btn" type="submit">SUBMIT REVIEW</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <?php
            }
            else{
            ?>
          <div class="alert alert-danger"><strong>Oops...!</strong> It looks like you don't have an account with us <a href="#"><b class="text-right">Click here to register</b></a></div>
          <?php
            }
            ?> 
        </div>
      </section>
    </main>
    <!-- footer -->
    <?php require_once('include/footer.php');?>
    <!-- footer end --> 
    <!-- JS here --> 
    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script> 
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script> 
    <script src="assets/js/popper.min.js"></script> 
    <script src="assets/js/bootstrap.min.js"></script> 
    <script src="assets/js/owl.carousel.min.js"></script> 
    <script src="assets/js/isotope.pkgd.min.js"></script> 
    <script src="assets/js/one-page-nav-min.js"></script> 
    <script src="assets/js/slick.min.js"></script> 
    <script src="assets/js/jquery.meanmenu.min.js"></script> 
    <script src="assets/js/ajax-form.js"></script> 
    <script src="assets/js/wow.min.js"></script> 
    <script src="assets/js/jquery.scrollUp.min.js"></script> 
    <script src="assets/js/imagesloaded.pkgd.min.js"></script> 
    <script src="assets/js/jquery.magnific-popup.min.js"></script> 
    <script src="assets/js/plugins.js"></script> 
    <script src="assets/js/main.js"></script> 
    <script src="assets/custom-js/loader.js"></script> 
    <script src="assets/custom-js/pkgDetail.js"></script>
  </body>
</html>