  <?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Resources</title>
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
    <?php require_once('include/header.php'); ?>
    <section class="background-grey-1 padding-tb-25px text-grey-4">
      <div class="container">
        <ol class="breadcrumb z-index-2 position-relative no-background padding-tb-10px padding-lr-0px  margin-0px float-md-right">
          <li><a href="index" class="text-grey-4">Home</a></li>
          <li><strong>You are here</strong></li>
          <li class="active"><strong>Resources</strong></li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </section>
    <div style="background-image: url('assets/img/resources-bg.png');" class="padding-tb-50px">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div id="accordion" role="tablist" aria-multiselectable="true" class="margin-bottom-100px padding-tb-100px">
              <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true" aria-controls="collapseOne" class="d-block text-dark text-capitalize text-up-small font-weight-700">Paathshala JEE [Main] Practice Papers</a>
                  </h5>
                </div>
                <div id="collapse-1" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="card-block padding-30px">
                    <form class="padding-top-30px margin-top-10px">
                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $_POST['name'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $_POST['email'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Mobile" name="mobile" value="<?php echo $_POST['mobile'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <button type="submit" name="submit" class="btn-sm btn-lg btn-block btn-info text-black text-center text-uppercase rounded-0 padding-8px border-0">DOWNLOAD</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-2" aria-expanded="true" aria-controls="collapseOne" class="d-block text-dark text-capitalize text-up-small font-weight-700">Paathshala JEE [Advanced] Practice Papers</a>
                  </h5>
                </div>
                <div id="collapse-2" class="collapse hide" role="tabpanel" aria-labelledby="headingOne">
                  <div class="card-block padding-30px">
                    <form class="padding-top-30px margin-top-10px">
                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $_POST['name'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $_POST['email'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Mobile" name="mobile" value="<?php echo $_POST['mobile'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <button type="submit" name="submit" class="btn-sm btn-lg btn-block btn-info text-black text-center text-uppercase rounded-0 padding-8px border-0">DOWNLOAD</button>
                        </div>
                        
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-3" aria-expanded="true" aria-controls="collapseOne" class="d-block text-dark text-capitalize text-up-small font-weight-700">Paathshala NEET Practice Papers</a>
                  </h5>
                </div>
                <div id="collapse-3" class="collapse hide" role="tabpanel" aria-labelledby="headingOne">
                  <div class="card-block padding-30px">
                    <form class="padding-top-30px margin-top-10px">
                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $_POST['name'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $_POST['email'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Mobile" name="mobile" value="<?php echo $_POST['mobile'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <button type="submit" name="submit" class="btn-sm btn-lg btn-block btn-info text-black text-center text-uppercase rounded-0 padding-8px border-0">DOWNLOAD</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-4" aria-expanded="true" aria-controls="collapseOne" class="d-block text-dark text-capitalize text-up-small font-weight-700">Paathshala BITSAT Practice Papers</a>
                  </h5>
                </div>
                <div id="collapse-4" class="collapse hide" role="tabpanel" aria-labelledby="headingOne">
                  <div class="card-block padding-30px">
                    <form class="padding-top-30px margin-top-10px">
                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $_POST['name'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $_POST['email'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Mobile" name="mobile" value="<?php echo $_POST['mobile'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <button type="submit" name="submit" class="btn-sm btn-lg btn-block btn-info text-black text-center text-uppercase rounded-0 padding-8px border-0">DOWNLOAD</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-5" aria-expanded="true" aria-controls="collapseOne" class="d-block text-dark text-capitalize text-up-small font-weight-700">Paathshala MHT CET Practice Papers</a>
                  </h5>
                </div>
                <div id="collapse-5" class="collapse hide" role="tabpanel" aria-labelledby="headingOne">
                  <div class="card-block padding-30px">
                    <form class="padding-top-30px margin-top-10px">
                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $_POST['name'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $_POST['email'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Mobile" name="mobile" value="<?php echo $_POST['mobile'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <button type="submit" name="submit" class="btn-sm btn-lg btn-block btn-info text-black text-center text-uppercase rounded-0 padding-8px border-0">DOWNLOAD</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-6" aria-expanded="true" aria-controls="collapseOne" class="d-block text-dark text-capitalize text-up-small font-weight-700">Paathshala KVPY Practice Papers</a>
                  </h5>
                </div>
                <div id="collapse-6" class="collapse hide" role="tabpanel" aria-labelledby="headingOne">
                  <div class="card-block padding-30px">
                    <form class="padding-top-30px margin-top-10px">
                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $_POST['name'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $_POST['email'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <input type="text" class="form-control" placeholder="Mobile" name="mobile" value="<?php echo $_POST['mobile'];?>" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                          <button type="submit" name="submit" class="btn-sm btn-lg btn-block btn-info text-black text-center text-uppercase rounded-0 padding-8px border-0">DOWNLOAD</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
      require_once('include/footer.php');
      require_once('include/footer-js.php');
      ?>
  </body>
</html>