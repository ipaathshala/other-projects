<header class="header">
  <div class="header__top-area black-bg">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 col-lg-6 col-md-6">
          <div class="header__social mt-10">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-google-plus-g"></i></a>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="header__top-menu">
            <ul>
              <?php
                if(isset($_SESSION['user_id'])){
                ?>	
              <li><a href="profile"><i class="fa fa-user"></i> <?php echo strtolower($_SESSION['user_name']);?></a></li>
              <li><a href="javascript:void(0)" id="logout"><i class="fas fa-sign-out-alt"></i> Signout</a></li>
              <?php
                }
                else{
                ?>
              <li><a href="account"><i class="fa fa-user"></i> Create Account</a></li>
              <li><a href="account"><i class="fa fa-lock"></i> SignIn</a></li>
              <?php			
                }
                ?>	
				<li><a href="account"><i class="fa fa-shopping-cart"></i> 3</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header__middle pt-20">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-3 d-flex align-items-center justify-content-md-start justify-content-center">
          <div class="header__logo text-center text-md-left mb-20">
            <a href="index"><img src="assets/img/logo/logo.png" alt="Header Logo"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header__menu-area black-bg">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="header__right-icon f-right mt-17">
            <a class="info-bar" href="javascript:void(0)">
            <i class="fas fa-bars"></i>
            </a>
          </div>
          <div class="header__menu f-left">
            <nav id="mobile-menu" style="display: block;">
              <ul>
                <li class="<?php if(basename($_SERVER['PHP_SELF'], '.php') == 'index' ) { ?> active <?php }?>"><a href="index">Home</a></li>
                <li class="<?php if(basename($_SERVER['PHP_SELF'], '.php') == 'about' ) { ?> active <?php }?>"><a href="about">About Us</a></li>
                <li class="<?php if(basename($_SERVER['PHP_SELF'], '.php') == 'packages' ) { ?> active <?php }?>"><a href="packages">Packages</a></li>
				
                <li class="<?php if(basename($_SERVER['PHP_SELF'], '.php') == 'contact' ) { ?> active <?php }?>"><a href="contact">Contact Us</a></li>
              </ul>
            </nav>
          </div>
          <div class="mobile-menu"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="extra-info">
    <div class="close-icon">
      <button>
      <i class="far fa-window-close"></i>
      </button>
    </div>
    <div class="header__logo">
      <a href="index">
      <img src="assets/images/logo.png" alt="Header Logo">
      </a>
    </div>
    <div class="social-icon-right mt-30 mb-50">
      <a href="#">
      <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#">
      <i class="fab fa-twitter"></i>
      </a>
      <a href="#">
      <i class="fab fa-google-plus-g"></i>
      </a>
      <a href="#">
      <i class="fab fa-instagram"></i>
      </a>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <form method="post" action="result">
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-20">
                  <select class="form-control" id="course" name="course">
                    <option value="0">SELECT COURSE</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-20">
                  <select class="form-control" id="subcourse" name="subcourse">
                    <option value="0">SELECT SUB COURSE</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="mb-20">
                  <select class="form-control" id="subject" name="subject">
                    <option value="0">Select Subject</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="mb-20">
                  <select class="form-control" id="chapter" name="chapter">
                    <option value="0">Select Chapter</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="mb-20">
                  <select class="form-control" id="topic" name="topic">
                    <option value="0">Select Topic</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="mb-20">
                  <select class="form-control" id="category" name="category">
                    <option value="0">Select Type</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-20">
                  <select class="form-control" id="level" name="level">
                    <option value="0">Select Level</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-20">
                  <select class="form-control" id="version" name="version">
                    <option>Select Version</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="mb-20">
                  <div id="loader" align="center"><i class="fa fa-spinner fa-spin text-danger"></i></div>
                  <button type="submit" name="submit" class="btn btn-default btn-lg btn-block">SUBMIT</button>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="mb-20">
                  <div align="center">
                    <div class="alert alert-success" id="success"><b>Success!</b> You will be redirected shortly</div>
                    <div class="alert alert-danger" id="fail"><b>Error!</b> Unable to process your request</div>
                    <div class="alert alert-danger" id="empty"><b>Error!</b> field should not be empty</div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</header>