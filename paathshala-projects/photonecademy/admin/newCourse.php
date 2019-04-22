<?php
	require_once('include/config.php');
	if($_SESSION['user_id']){
		$deleteId = mysqli_real_escape_string($con,$_REQUEST['del']);
		mysqli_query($con,"DELETE FROM `master_course` WHERE `course_id` = '$deleteId'");  
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
    <title>New Course</title>
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
                      <h4 class="mt-0 header-title">Create New Course</h4>
                      <form method="post">
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="form-group">
                              <input type="text" class="form-control" id="course" name="course" value="<?php echo $_POST['course'];?>" autocomplete="off" placeholder="Enter Course Title">
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-check"></i> SAVE COURSE</button>
                            <b id="loader"><i class="fa fa-spinner fa-spin"></i></b>	
                          </div>
                          <div class="col-lg-10">
                            <div class="form-group">
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="invcourse"><strong>Error !</strong> field should not be empty</div>
                              <div class="alert alert-danger bg-danger text-white" role="alert" id="fail"><strong>Error !</strong> unable to proceed your request</div>
                              <div class="alert alert-success bg-success text-white" role="alert" id="savecourse"><strong>Success!</strong> record saved successfully</div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-10">
                          <h4 class="mt-0 header-title">Course List</h4>
                        </div>
                      </div>
                      <br>
                      <table class="table table-bordered mb-0 text-center">
                        <thead>
                          <tr>
                            <th>Course ID</th>
							<th>Course Title</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $courseList = mysqli_query($con,"SELECT `course_id`, `course_name` FROM `master_course`");
							$x = 1;
                            while($row = mysqli_fetch_array($courseList)){
                            ?>
                          <tr>
                            <td><?php echo $x++;?></td>
                            <td><?php echo strtoupper($row['course_name']);?></td>
                            <td>
                              <a href="#" class="btn btn-primary" title="EDIT RECORD"><i class="fa fa-edit"></i></a>
                              <a href="newCourse?del=<?php echo $row['course_id'];?>" class="btn btn-danger" title="DELETE RECORD"><i class="fa fa-trash"></i></a>
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
    <script src="plugins/custom-js/saveCourse.js"></script>
  </body>
</html>