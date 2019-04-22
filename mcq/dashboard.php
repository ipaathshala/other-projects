  <?php   
  include_once('includes/DB_Functions.php');
  $db = new DB_Functions();
  if(!($_SESSION["user_id"])){
    header("Location:logout");
  }
  ?>  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Dashboard</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <!-- Begin page -->
    <div id="wrapper">
      <?php require_once('includes/topbar.php');
        require_once('includes/sidebar.php');?>
      <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="page-title-box">
                  <h4 class="page-title">Dashboard</h4>
                </div>
              </div>
            </div>
            <!-- end row -->
            <div class="row">
              <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary">
                  <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon"><i class="mdi mdi-cube-outline float-right"></i></div>
                    <div class="text-white">
                      <h6 class="text-uppercase mb-3">Orders</h6>
                      <h4 class="mb-4">1,587</h4>
                      <span class="badge badge-info">+11% </span><span class="ml-2">From previous period</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary">
                  <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon"><i class="mdi mdi-buffer float-right"></i></div>
                    <div class="text-white">
                      <h6 class="text-uppercase mb-3">Revenue</h6>
                      <h4 class="mb-4">$46,782</h4>
                      <span class="badge badge-danger">-29% </span><span class="ml-2">From previous period</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary">
                  <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon"><i class="mdi mdi-tag-text-outline float-right"></i></div>
                    <div class="text-white">
                      <h6 class="text-uppercase mb-3">Average Price</h6>
                      <h4 class="mb-4">$15.9</h4>
                      <span class="badge badge-warning">0% </span><span class="ml-2">From previous period</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary">
                  <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon"><i class="mdi mdi-briefcase-check float-right"></i></div>
                    <div class="text-white">
                      <h6 class="text-uppercase mb-3">Product Sold</h6>
                      <h4 class="mb-4">1890</h4>
                      <span class="badge badge-info">+89% </span><span class="ml-2">From previous period</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php require_once('includes/footer.php');?>
      </div>
    </div>
    <!-- END wrapper -->
    <!-- jQuery  --><script src="assets/js/jquery.min.js"></script><script src="assets/js/bootstrap.bundle.min.js"></script><script src="assets/js/metisMenu.min.js"></script><script src="assets/js/jquery.slimscroll.js"></script><script src="assets/js/waves.min.js"></script><script src="plugins/jquery-sparkline/jquery.sparkline.min.js"></script><!--Morris Chart--><script src="plugins/morris/morris.min.js"></script><script src="plugins/raphael/raphael-min.js"></script><script src="assets/pages/dashboard.js"></script><!-- App js --><script src="assets/js/app.js"></script>
  </body>
</html>