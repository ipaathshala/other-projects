<?php 
	require_once('include/config.php');
	if(!isset($_SESSION['user_id'])){
		require_once('logout.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Create Student Profile</title>
    <?php require_once('include/css.php');?>
  </head>
  <body>
    <!-- Begin page -->
    <div id="wrapper">
      <!-- Top Bar Start -->
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
                      <h4 class="mt-0 header-title">Student Result</h4>
                      <form>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="First Name" name="fn" id="fn" value="<?php echo $_POST['fn'];?>" autocomplete="off">
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Last Name" name="ln" id="ln" value="<?php echo $_POST['ln'];?>" autocomplete="off">
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="form-group">
                              <input type="file" id="file" name="file" class="filestyle" data-buttonname="btn-secondary">
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="form-group">
                              <button type="button" class="btn btn-dark addRow">ADD EXAM DETAILS</button>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="form-group">
                              <table class="table mb-0">
                                <thead class="thead-default">
                                  <tr>
                                    <th colspan="3">Exam Details</th>
                                  </tr>
                                </thead>
                                <tbody id="examDetails">
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <div align="center">
								<button type="submit" class="btn btn-success" name="submit">SAVE PROFILE</button>
								<i class="fa fa-spinner fa-spin" id="loader"></i>
							  </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="invname"><strong>Error!</strong> invalid name format</div>
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="invfile"><strong>Error!</strong> invalid file format</div>
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
	<script src="plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
    <script src="plugins/custom-js/studentExam.js"></script>
  </body>
</html>