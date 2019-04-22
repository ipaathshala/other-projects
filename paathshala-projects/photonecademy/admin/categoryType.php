<?php
	require_once('include/config.php');
	if($_SESSION['user_id']){
		$delId = mysqli_query($con,"DELETE FROM `category_type` WHERE `cat_id` = '$delId'");
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
    <title>New Category</title>
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
                      <h4 class="mt-0 header-title">Create Category</h4>
                      <form>
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="form-group">
                              <input type="text" class="form-control" id="category" name="category" value="<?php echo $_POST['category'];?>" autocomplete="off" placeholder="Enter Category Title">
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-check"></i> SAVE CATEGORY</button>
                            <i class="fa fa-spinner fa-spin" id="loader"></i>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="form-group">
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="empty"><strong>Error!</strong> field should not be empty</div>
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="fail"><strong>Error</strong> unable to proceed your request</div>
                              <div class="alert alert-success bg-success text-white" role="alert" id="success"><strong>Success!</strong> record saved successfully</div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="card-body">
                      <h4 class="mt-0 header-title">Category List</h4>
                      <table class="table table-bordered mb-0 text-center">
                        <thead>
                          <tr>
                            <th>Category ID</th>
                            <th>Category Title</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $typeList = mysqli_query($con,"SELECT `cat_id`, `category` FROM `category_type`");
                            $x = 1;
                            while($typeRow = mysqli_fetch_array($typeList)){
                            ?>
                          <tr>
                            <td><?php echo $x++;?></td>
                            <td><?php echo strtoupper($typeRow['category']);?></td>
                            <td>
                              <a href="#" class="btn btn-primary btn-sm" title="EDIT RECORD"><i class="fa fa-edit"></i> EDIT</a>
                              <a href="categoryType?del=<?php echo $typeRow['cat_id'];?>" class="btn btn-danger btn-sm" title="DELETE RECORD"><i class="fa fa-trash"></i> DETETE</a>
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
    <script src="plugins/custom-js/saveCategory.js"></script>
  </body>
</html>