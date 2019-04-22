<?php
  require_once('include/config.php');
  if($_SESSION['user_id']){
  	$delId = mysqli_real_escape_string($con, $_REQUEST['del']);
  	if(!empty($delId)){
  		mysqli_query($con, "DELETE FROM `master_chapter` WHERE `chapter_id` = '$delId'");
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
    <title>New Chapter</title>
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <?php require_once('include/css.php');?>
  </head>
  <body>
    <div id="wrapper">
      <?php require_once('include/topbar.php');?>
      <?php require_once('include/sidebar.php');?>
      <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="page-title-box">
                  <div class="card m-b-20">
                    <div class="card-body">
                      <h4 class="mt-0 header-title">Create New Chapter</h4>
                      <form>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="form-group">
                              <select class="form-control select2" id="course" name="course">
                                <option value="0">SELECT COURSE</option>
                                <optgroup label="Type course title">
                                </optgroup>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <select class="form-control select2" id="subcourse" name="subcourse">
                                <option value="0">SELECT SUB COURSE</option>
                                <optgroup label="Type sub course title">
                                </optgroup>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
                              <select class="form-control select2" id="subject" name="subject">
                                <option value="0">SELECT SUBJECT</option>
                                <optgroup label="Type subject title">
                                </optgroup>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Enter chapter title" id="chapter" name="chapter" value="<?php echo $_POST['chapter'];?>" autocomplete="off">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <div align="center">
                                <i class="fa fa-spinner fa-spin" id="loader"></i>
                                <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fa fa-check"></i> SAVE CHAPTER</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="invcourse"><strong>Error!</strong> select course</div>
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="invsubcourse"><strong>Error!</strong> select sub course</div>
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="invsubject"><strong>Error!</strong> select subject</div>
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="empty"><strong>Error!</strong> field should not be empty</div>
                            <div class="alert alert-danger bg-danger text-white" role="alert" id="fail"><strong>Error!</strong> unable to proceed your request</div>
                            <div class="alert alert-success bg-success text-white" role="alert" id="success"><strong>Success!</strong> record saved successfully</div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="card-body">
                      <h4 class="mt-0 header-title">Chapter List</h4>
                      <table class="table table-bordered mb-0 text-center">
                        <thead>
                          <tr>
                            <th>Chapter ID</th>
                            <th>Subject Title</th>
                            <th>Chapter Title</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $chapterList = mysqli_query($con,"SELECT master_chapter.chapter_id,master_chapter.chapter_title, master_subject.subject FROM master_chapter LEFT JOIN master_subject ON master_subject.sub_id = master_chapter.subjectid");
                            $x = 1;
                            while($chapterRow = mysqli_fetch_array($chapterList)){
                            ?>
                          <tr>
                            <td><?php echo $x++;?></td>
                            <td><?php echo strtoupper($chapterRow['subject']);?></td>
                            <td><?php echo strtoupper($chapterRow['chapter_title']);?></td>
                            <td>
                              <a href="#" class="btn btn-primary btn-sm" title="EDIT RECORD"><i class="fa fa-edit"></i> EDIT</a>
                              <a href="newChapter?del=<?php echo $chapterRow['chapter_id'];?>" class="btn btn-danger btn-sm" title="DELETE RECORD"><i class="fa fa-trash"></i> DELETE</a>
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
    <!-- Plugins js -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="plugins/select2/js/select2.min.js"></script>
    <script src="plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
    <script src="plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
    <script src="plugins/assets/pages/form-advanced.js"></script>
    <script src="plugins/custom-js/saveChapter.js"></script>
  </body>
</html>