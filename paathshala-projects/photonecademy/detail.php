<?php require_once('admin/include/config.php');?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BunGee - Blog, News & Magazine HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once('include/css.php');?>
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
              <div class="page-title text-center mt-30">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                      <a href="index">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> You are here</li>
                    <li class="breadcrumb-item active" aria-current="page"> Package Details</li>
                    <input type="hidden" class="form-control" value="<?php echo $_REQUEST['pkgId'];?>" id="reqid">
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="post-details-area pt-60 pb-30">
        <div class="container">
          <div class="row" id="pkgpost">
            
          </div>
        </div>
      </section>
    </main>
    <!-- footer -->
    <?php require_once('include/footer.php');?>
    <!-- footer end -->
    <!-- JS here -->
    <?php require_once('include/js.php');?>
    <script src="assets/custom-js/pkgDetail.js"></script>
  </body>
</html>