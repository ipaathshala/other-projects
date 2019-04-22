  <?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Contact Us</title>
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
    <?php require_once('include/header.php');?>
    <section class="background-grey-1 padding-tb-25px text-grey-4">
      <div class="container">
        <ol class="breadcrumb z-index-2 position-relative no-background padding-tb-10px padding-lr-0px  margin-0px float-md-right">
          <li><a href="index" class="text-grey-4">Home</a></li>
          <li><strong>You are here</strong></li>
          <li class="active"><strong>Contact Us</strong></li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </section>
    <section class="padding-tb-100px" style="background-image: url('assets/img/contact-bg.jpeg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-6 sm-mb-30px text-main-color wow fadeInUp" data-wow-delay="0.2s">
            <div class="text-center hvr-grow background-white padding-10px box-shadow pull-top-32px">
              <img src="assets/img/find-us.png">
              <p class="margin-tb-10px"><b>Head Office:</b> 201, Dighe House, Opp Karnavat Classes, Lohar Ali Lane, Behind Jagdish Book Depot, Near Thane Railway Station, Thane West - 400601, Maharashtra, India</p>
              <p class="margin-tb-10px"><b>Branch Office:</b> 203, Paradise Tower, Adjacent to Mc Donald's, Gokhale Road, Thane West 400602, Maharashtra, India</p>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 sm-mb-30px text-main-color wow fadeInUp" data-wow-delay="0.4s">
            <div class="text-center hvr-grow background-white padding-10px box-shadow pull-top-32px">
              <img src="assets/img/call-us.png">
              <p class="margin-tb-10px">Admissions: +91 9867998388</p>
              <p class="margin-tb-10px">Appointment: 022 4970 8979</p>
              <p class="margin-tb-10px">HR: +91 8657482467</p>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 sm-mb-30px text-main-color wow fadeInUp" data-wow-delay="0.8s">
            <div class="text-center hvr-grow background-white padding-10px box-shadow pull-top-32px">
              <img src="assets/img/write-us.png">
              <p class="margin-tb-10px">Admissions: enquiries@paathshala.world</p>
              <p class="margin-tb-10px">Affiliations: headoffice@paathshala.world</p>
              <p class="margin-tb-10px">HR: academics@paathshala.world</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-6">
            <h2 class="text-extra-large text-white margin-tb-10px">Contact Form</h2>
            <div class="row justify-content-md-center">
              <div class="col-lg-12">
                <div class="padding-30px background-dark" style="opacity: 0.9;">
                  <form action="#">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <div class="alert alert-danger" id="cntname"><strong>Error!</strong> Invalid name format</div>
                          <div class="alert alert-danger" id="cntemail"><strong>Error!</strong> Invalid email format</div>
                          <div class="alert alert-danger" id="cntmobile"><strong>Error!</strong> Invalid mobile number format</div>
                          <div class="alert alert-danger" id="cntfail"><strong>Error!</strong> Something goes wrong unable to proceed your request</div>
                          <div class="alert alert-success" id="cntsuccess"><strong>Success!</strong> Thank you we will get back to you shortly</div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="col-form-label text-white">Full Name</label>
                          <input type="text" class="form-control rounded-0" id="name" name="name" placeholder="Enter Name" value="<?php echo $_POST['name'];?>" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="col-form-label text-white">Email</label>
                          <input type="text" class="form-control rounded-0" id="email" name="email" placeholder="Enter Email" value="<?php echo $_POST['email'];?>" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="col-form-label text-white">Mobile</label>
                          <input type="text" class="form-control rounded-0" id="mobile" name="mobile" placeholder="Enter Mobile" value="<?php echo $_POST['mobile'];?>" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="col-form-label text-white">Write Message</label>
                          <textarea class="form-control rounded-0" id="message" name="message" placeholder="Enter your message or comment here" rows="5"><?php echo $_POST['message'];?></textarea>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <div id="cntloader"><i class="fa fa-spinner fa-spin fa-2x text-white"></i></div>
                          <button type="submit" name="submit" class="btn btn-primary btn-block rounded-0 background-main-color">SEND MESSAGE</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="map-distributors-in">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235.51190654001283!2d72.97089848033083!3d19.18687991734641!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b9201694f829%3A0x144d25cf68c780c2!2sPAATHSHALA+EDUCATION!5e0!3m2!1sen!2sin!4v1549006289715" frameborder="0" style="border:0; width:100%; height:600px;" allowfullscreen></iframe>
    </div>
    <?php
      require_once('include/get-in-touch.php');
      require_once('include/instafeed.php');
      require_once('include/footer.php');
      require_once('include/footer-js.php');
      ?>
    <script src="assets/js/contactForm.js"></script>
  </body>
</html>