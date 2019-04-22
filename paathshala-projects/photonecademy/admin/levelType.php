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
    <title>New Level</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
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
                      <h4 class="mt-0 header-title">Create Level</h4>
                      <form method="post" id="courseform">
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="form-group">
                              <input type="text" class="form-control" id="level" name="level" value="<?php echo $_POST['level'];?>" autocomplete="off" placeholder="Enter Level Title">
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-check"></i> SAVE LEVEL</button>
                            <i class="fa fa-spinner fa-spin" id="loader"></i>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="form-group">
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="empty"><strong>Error!</strong> field should not be empty</div>
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="fail"><strong>Error!</strong> unable to save record</div>
                              <div class="alert alert-success bg-success text-white" role="alert" id="success"><strong>Success!</strong> record saved successfully</div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="card-body">
                      <h4 class="mt-0 header-title">Level List</h4>
                      <table class="table table-bordered mb-0 text-center">
                        <thead>
                          <tr>
                            <th>Level ID</th>
                            <th>Level Title</th>
                            <th colspan="2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $levelList = mysqli_query($con,"SELECT `level_id`, `level_title` FROM `level_type`");
                            $x = 1;
                            while($levelRow = mysqli_fetch_array($levelList)){
                            ?>
                          <tr>
                            <td><?php echo $x++;?></td>
                            <td><?php echo strtoupper($levelRow['level_title'])?></td>
                            <td>
                              <a href="#" class="btn btn-primary btn-sm" title="EDIT RECORD"><i class="fa fa-edit"></i> EDIT</a>
                              <a href="levelType?del=<?php echo $typeRow['level_id'];?>" class="btn btn-danger btn-sm" title="DELETE RECORD"><i class="fa fa-trash"></i> DELETE</a>
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
    <script src="plugins/custom-js/saveLevel.js"></script>
  </body>
</html>