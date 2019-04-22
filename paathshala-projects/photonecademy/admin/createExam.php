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
    <title>Create New Exam</title>
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
                      <h4 class="mt-0 header-title">Create New Exam</h4>
                      <form>
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Exam Title" id="exam" name="exam" value="<?php echo $_POST['exam']?>" autocomplete="off">
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="form-group">
                              <div align="center">
                                <button type="submit" name="submit" class="btn btn-success btn-lg waves-effect waves-light">SAVE EXAM</button>
                                <i class="fa fa-spinner fa-spin" id="loader"></i>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-10">
                            <div class="form-group">
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="empty"><strong>Error!</strong> field should not be empty</div>
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="fail"><strong>Error!</strong> unable to proceed your request</div>
                              <div class="alert alert-success bg-success text-white" role="alert" id="success"><strong>Success!</strong> record saved successfully</div>
                              <div class="alert alert-success bg-success text-white" role="alert" id="success"><strong>Success!</strong> record saved successfully</div>
                            </div>
                          </div>
                        </div>
                      </form>
                      <h4 class="mt-0 header-title">Exams Details</h4>
                      <table class="table table-bordered mb-0 text-center">
                        <thead>
                          <tr>
                            <th>Exam ID</th>
                            <th>Exam Title</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody id="examList">
                        </tbody>
                      </table>
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
    <!-- END wrapper -->
    <!-- jQuery  -->
    <?php require_once('include/jquery.php');?>
    <script src="plugins/custom-js/saveExam.js"></script>
  </body>
</html>