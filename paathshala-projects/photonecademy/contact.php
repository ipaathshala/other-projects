<?php require_once('admin/include/config.php');?>
<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contact Us</title>
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
      <!-- hero-area start -->
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
                    <li class="breadcrumb-item active" aria-current="page"> Contact</li>
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
            <div class="col-xl-5 col-lg-6">
              <div class="contact-info mb-30">
                <h2>Keep in touch</h2>
                <div class="row">
                  <div class="col-xl-12">
                    <div class="contact-meta mb-30">
                      <div class="contact-meta-info">
                        <h4>Phone</h4>
                        <p>Enquiries : +91 9867998388</p>
                        <p>Admin Office : (022) 49708979</p>
                        <p>Student Welfare : +91 9987457772</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12">
                    <div class="contact-meta mb-30">
                      <div class="contact-meta-info">
                        <h4>E-mail</h4>
                        <p>Academics : academics@paathshala</p>
                        <p>General : headoffice@paathshala.world</p>
                        <p>Enquiries : enquiries@paathshala.world</p>
                        <p>Student Welfare : academicexcellence@paathshala.world</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12">
                    <div class="contact-meta">
                      <div class="contact-meta-info">
                        <h4>Office</h4>
                        <p>201, Dighe House, Opposite Karnavat Classes, Lohar Ali Lane, <br>Behind Jagdish Book Depot, Near Railway Station,<br> Thane West - 400601, Maharashtra, India</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-7 col-lg-6">
              <div class="contact-form mb-30">
                <h3>Do you have any question?</h3>
                <form>
                  <div class="row">
                    <div class="col-xl-6">
                      <input type="text" placeholder="Full Name" name="name" id="name" value="<?php echo $_POST['name'];?>" autocomplete="off">
                    </div>
                    <div class="col-xl-6">
                      <input type="text" placeholder="Email ID" name="email" id="email" value="<?php echo $_POST['email'];?>" autocomplete="off">
                    </div>
                    <div class="col-xl-6">
                      <input type="text" placeholder="Mobile Number" name="mob" id="mob" value="<?php echo $_POST['mob'];?>" autocomplete="off">
                    </div>
                    <div class="col-xl-6">
                      <input type="text" placeholder="Subject" name="sub" id="sub" value="<?php echo $_POST['sub'];?>" autocomplete="off">
                    </div>
                    <div class="col-xl-12">
                      <textarea cols="30" rows="10" placeholder="Write your message or query here" name="msg" id="msg"><?php echo $_POST['msg'];?></textarea>
                    </div>
                    <div class="col-xl-12">
                      <button class="btn brand-btn" type="submit" name="submit">send message</button>
                      <i class="fa fa-spinner fa-spin" id="cntloader"></i>
                    </div>
                  </div>
                </form>
                <p class="ajax-response">
                <div class="alert alert-danger" id="cntempt"><strong>Error!</strong> field should not be empty</div>
                <div class="alert alert-danger" id="cntname"><strong>Error!</strong> invalid name format</div>
                <div class="alert alert-danger" id="cntemail"><strong>Error!</strong> invalid email format</div>
                <div class="alert alert-danger" id="cntmob"><strong>Error!</strong> invalid mobile number format</div>
                <div class="alert alert-danger" id="cntfail"><strong>Error!</strong> unable to proceed your request</div>
                <div class="alert alert-success" id="cntsuccess"><strong>Success!</strong> message sent successfully</div>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- blog-area end -->
      <div id="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3768.1851599662273!2d72.96851511538517!3d19.18711345345528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b9201694f829%3A0x144d25cf68c780c2!2sPAATHSHALA+EDUCATION!5e0!3m2!1sen!2sin!4v1540548915222"  frameborder="0" style="border:0; width:100%; height:600px;" allowfullscreen></iframe>
      </div>
    </main>
    <!-- footer -->
    <?php require_once('include/footer.php');?>
    <!-- footer end -->
    <!-- JS here -->
    <?php require_once('include/js.php');?> 
    <script src="assets/custom-js/loader.js"></script>
    <script src="assets/custom-js/contact.js"></script>
  </body>
</html>