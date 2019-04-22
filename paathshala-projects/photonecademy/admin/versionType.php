<?php
	require_once('include/config.php');
	if($_SESSION['user_id']){
		$delId = mysqli_real_escape_string($con, $_REQUEST['del']);
		if(!empty($delId)){
			mysqli_query($con,"DELETE FROM `version_type` WHERE `version_id` = '$delId'");
		}
	}
	else{
		require_once('logout.php');
	}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>New Version</title>
    <?php require_once('include/css.php');?>
  </head>
  <body>
    <div id="wrapper">
      <?php require_once('include/topbar.php')?>
      <?php require_once('include/sidebar.php');?>
      <div class="content-page">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="page-title-box">
                  <div class="card m-b-20">
                    <div class="card-body">
                      <h4 class="mt-0 header-title">Create Version</h4>
                      <form method="post" id="courseform">
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="form-group">
                              <input type="text" class="form-control" id="version" name="version" value="<?php echo $_POST['version'];?>" autocomplete="off" placeholder="Enter Version Type">
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-check"></i> SAVE VERSION</button>
                            <i class="fa fa-spinner fa-spin" id="loader"></i>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="empty"><strong>Error !</strong> field should not be empty</div>
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="fail"><strong>Error !</strong> unable to process your request</div>
                              <div class="alert alert-success bg-success text-white" role="alert" id="success"><strong>Success!</strong> record saved successfully</div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="card-body">
                      <h4 class="mt-0 header-title">Version List</h4>
                      <table class="table table-bordered mb-0 text-center">
                        <thead>
                          <tr>
                            <th>Version ID</th>
                            <th>Version Title</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $versionList = mysqli_query($con,"SELECT `version_id`, `version_title` FROM `version_type`");
                            $x = 1;
                            while($versionRow = mysqli_fetch_array($versionList)){
                            ?>
                          <tr>
                            <td><?php echo $x++;?></td>
                            <td><?php echo strtoupper($versionRow['version_title'])?></td>
                            <td>
                              <a href="#" class="btn btn-primary btn-sm" title="EDIT RECORD"><i class="fa fa-edit"></i> EDIT</a>
                              <a href="versionType?del=<?php echo $versionRow['version_id'];?>" class="btn btn-danger btn-sm" title="DELETE RECORD"><i class="fa fa-trash"></i> DELETE</a>
                            </td>
                          </tr>
                          <?php		
                            }
                            ?>
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
    <!-- jQuery  -->
    <?php require_once('include/jquery.php');?>
    <script src="plugins/custom-js/saveVersion.js"></script>
  </body>
</html>