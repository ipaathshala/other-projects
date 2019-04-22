<?php
	require_once('include/config.php');
	if(!$_SESSION['user_id']){
		require_once('logout.php');
	}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>New Post</title>
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <?php require_once('include/css.php');?>
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
      tinymce.init({
      selector: '#desc'
      });
    </script>
  </head>
  <body>
    <div id="wrapper">
      <?php require_once('include/topbar.php');?>
      <?php require_once('include/sidebar.php');?>
      <div class="content-page">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="page-title-box">
                  <div class="card m-b-20">
                    <div class="card-body">
                      <h4 class="mt-0 header-title">Create New Video Post</h4>
                      <form>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="form-group">
                              <select class="form-control select2" id="course" name="course">
                                <optgroup label="Type course title">
                                  <option value="0">SELECT COURSE</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <select class="form-control select2" id="subcourse" name="subcourse">
                                <optgroup label="Type subcourse title">
                                  <option value="0">SELECT SUB COURSE</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <select class="form-control select2" id="subject" name="subject">
                                <optgroup label="Type subject title">
                                  <option value="0">SELECT SUBJECT</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <select class="form-control select2" id="chapter" name="chapter">
                                <optgroup label="Type chapter title">
                                  <option value="0">SELECT CHAPTER</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <select class="form-control select2" id="topic" name="topic">
                                <optgroup label="Type topic title">
                                  <option value="0">SELECT TOPIC</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="form-group">
                              <select class="form-control select2" id="category" name="category">
                                <optgroup label="Type level title">
                                  <option value="0">SELECT TYPE</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
						  <div class="col-lg-4">
                            <div class="form-group">
                              <select class="form-control select2" id="level" name="level">
                                <optgroup label="Type level title">
                                  <option value="0">SELECT LEVEL</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <select class="form-control select2" id="version" name="version">
                                <optgroup label="Type version title">
                                  <option value="0">SELECT VERSION</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <input type="text" class="form-control" data-parsley-minlength="6" placeholder="Enter Video Title" id="videotitle" name="videotitle" value="<?php echo $_POST['videotitle'];?>" autocomplete="off">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <input type="text" class="form-control" data-parsley-minlength="6" placeholder="Enter Video URL" id="url" name="url" value="<?php echo $_POST['url'];?>" autocomplete="off">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label class="control-label">Description</label>	
                              <textarea class="form-control" id="desc" name="desc" rows="10"><?php echo $_POST['desc'];?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <div align="center">
                                <div id="loader" align="center"><i class="fa fa-spinner fa-spin"></i></div>
                                <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-check"></i> SAVE POST</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="empty"><strong>Error!</strong> field should not be empty</div>
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="invurl"><strong>Error!</strong> invalid url format</div>
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="fail"><strong>Error!</strong> unable to proceed your request</div>
                              <div class="alert alert-success bg-success text-white" role="alert" id="success"><strong>Success!</strong> record saved successfully</div>
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
        </div>
        <?php require_once('include/footer.php');?>
      </div>
    </div>
    <!-- jQuery  -->
    <?php require_once('include/jquery.php');?>
    <!-- Plugins js -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="plugins/select2/js/select2.min.js"></script>
    <script src="plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
    <script src="plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
    <script src="plugins/assets/pages/form-advanced.js"></script>
    <script src="plugins/custom-js/savevideoPost.js"></script>
  </body>
</html>