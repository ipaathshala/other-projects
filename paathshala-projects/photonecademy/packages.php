<?php require_once('admin/include/config.php');?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BunGee - Blog, News & Magazine HTML5 Template</title>
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
    <?php require_once('include/header.php');?>
    <main>
      <div class="page-title-area">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="page-title text-center mt-30 mb-30">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"> <a href="index">Home</a> </li>
                    <li class="breadcrumb-item active" aria-current="page"> Package List</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-6">
            <div class="contact-form mb-30">
              <div class="row">
                <div class="col-xl-4">
                  <select class="form-control" id="pkg_course" name="pkg_course">
                    <option value="0">Select Course</option>
                  </select>
                </div>
                <div class="col-xl-4">
                  <select class="form-control" id="pkg_subcourse" name="pkg_subcourse">
                    <option value="0">Select Sub Course</option>
                  </select>
                </div>
                <div class="col-xl-4">
                  <select class="form-control" id="pkg_subject" name="pkg_subject">
                    <option value="0">Select Subject</option>
                  </select>
                </div>
              </div>
              <div class="row mt-10">
                <div class="col-xl-12">
                  <select class="form-control" id="pkg_chapter" name="pkg_chapter">
                    <option value="0">Select Chapter</option>
                  </select>
                </div>
              </div>
              <div class="row mt-10">
                <div class="col-xl-12">
                  <select class="form-control" id="pkg_topic" name="pkg_topic">
                    <option value="0">Select Topic</option>
                  </select>
                </div>
              </div>
              <div class="row mt-10">
                <div class="col-xl-4">
                  <select class="form-control" id="pkg_type" name="pkg_type">
                    <option value="0">Select Category</option>
                  </select>
                </div>
                <div class="col-xl-4">
                  <select class="form-control" id="pkg_level" name="pkg_level">
                    <option value="0">Select Level</option>
                  </select>
                </div>
                <div class="col-xl-4">
                  <select class="form-control" id="pkg_version" name="pkg_version">
                    <option value="0">Select Version</option>
                  </select>
                </div>
              </div>
              <div class="row mt-10">
                <div class="col-xl-12">
                  <div class="alert alert-danger" id="emptyresult"><strong>Error!</strong> there is no any package available on your selected option</div>
                  <div class="alert alert-danger" id="pkgfail"><strong>Error!</strong> something goes wrong please contact to the administrator</div>
                  <div class="alert alert-success" id="resultsuccess"><strong>Success!</strong> result fetched successfully</div>
                  <div align="center"><i class="fa fa-spinner fa-spin" id="resultloader"></i></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="news-area">
        <div class="container">
          <div class="row" id="pkgDesc">
          </div>
        </div>
      </section>
    </main>
    <!-- footer -->
    <?php require_once('include/footer.php');?>
    <!-- footer end --> 
    <!-- JS here --> 
    <?php require_once('include/js.php');?> 
    <script src="assets/custom-js/loader.js"></script> 
    <script src="assets/custom-js/pkgList.js"></script>
  </body>
</html>