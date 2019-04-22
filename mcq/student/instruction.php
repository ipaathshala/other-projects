<?php   
  include_once('../includes/dbFunction.php');
  if(!isset($_SESSION['sid'])){
  header("Location:login");
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Instruction</title>
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <!-- Begin page -->
    <div id="wrapper">
      <?php
        require_once('include/topbar.php');
        require_once('include/sidebar.php');
        ?>
      <div class="content-page">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="page-title-box">
                  <h4 class="page-title">Instruction</h4>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card m-b-20">
                  <div class="card-body">
                    <p class="text-muted m-b-30"><strong>General Instructions</strong></p>
                    <ul class="list-unstyled">
                      <li>
                        Nulla volutpat aliquam velit
                        <ul>
                          <li>Phasellus iaculis neque</li>
                          <li>Purus sodales ultricies</li>
                          <li>Vestibulum laoreet porttitor sem</li>
                        </ul>
                      </li>
                    </ul>
                    <p class="text-muted m-b-30"><strong>General Instructions</strong></p>
                    <ul class="list-unstyled">
                      <li>
                        Nulla volutpat aliquam velit
                        <ul>
                          <li>Phasellus iaculis neque</li>
                          <li>Purus sodales ultricies</li>
                          <li>Vestibulum laoreet porttitor sem</li>
                        </ul>
                      </li>
                    </ul>
                    <p class="text-muted m-b-30"><strong>General Instructions</strong></p>
                    <ul class="list-unstyled">
                      <li>
                        Nulla volutpat aliquam velit
                        <ul>
                          <li>Phasellus iaculis neque</li>
                          <li>Purus sodales ultricies</li>
                          <li>Vestibulum laoreet porttitor sem</li>
                        </ul>
                      </li>
                    </ul>
                    <p class="text-muted m-b-30">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customControlInline">
                      <label class="custom-control-label text-justify" for="customControlInline">I have read and understood the instructions. All computer hardware allotted to me are in proper working condition. I declare that I am not in possession of / not wearing / not carrying any prohibited gadget like mobile phone, bluetooth devices etc. /any prohibited material with me into the Examination Hall.I agree that in case of not adhering to the instructions, I shall be liable to be debarred from this Test and/or to disciplinary action, which may include ban from future Tests / Examinations</label>
                    </div>
                    </p>
					<div class="text-center">
						<button class="btn btn-dark w-md waves-effect waves-light" type="button" onclick = "Warn();">Proceed to Next</button>
					</div>
					<div class="p-t-10">
						<div class="alert alert-danger bg-danger text-white" role="alert" id="warning">Please accept the terms and conditions before proceeding to next</div>
					</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php require_once('include/footer.php');?>
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
    <script src="js/instruction.js"></script>
  </body>
</html>