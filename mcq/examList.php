<?php   
  include_once('includes/DB_Functions.php');
  $db = new DB_Functions();
  if(!($_SESSION["user_id"])){
    header("Location:logout");
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Exam List</title>
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- DataTables -->
    <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Responsive datatable examples -->
    <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="wrapper">
      <?php
        require_once('includes/topbar.php');
        require_once('includes/sidebar.php');
        ?>
      <div class="content-page">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="page-title-box">
                  <h4 class="page-title">Data Table</h4>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card m-b-20">
                  <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                      <thead>
                        <tr>
                          <th>Exam No.</th>
                          <th>Exam Date</th>
                          <th>Title</th>
                          <th>Exam time (in hours)</th>
                          <th>Total Marks</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          //$funObj = new dbFunction();
                          $sql = mysql_query("SELECT DISTINCT exams.eid, exams.startdate, exams.examtime, exams.etitle, SUM(qusans.plusmarks) marks FROM exams LEFT JOIN qusans ON qusans.ex_id = exams.eid GROUP BY exams.eid");
                          $x = 1;
                          $date = date('d-m-Y', time());
                          while($row = mysql_fetch_array($sql)){
                          ?>	
                        <tr>
                          <td><?php echo $x++;?></td>
                          <td><?php echo $row['startdate'];?></td>
                          <td><?php echo strtoupper($row['etitle']);?></td>
                          <td><?php echo $row['examtime'];?></td>
                          <td><?php echo $row['marks'];?></td>
                          <td>
                            <?php
                              if($date==$row['startdate']){
                              ?>
                            <span class="badge badge-success">Active</span>
                            <?php		
                              }
                              else{
                              ?>
                            <span class="badge badge-danger">Inactive</span>
                            <?php
                              }
                              ?>
                          </td>
                          <td>
                            <a href="testDetail?test=<?php echo $row['eid'];?>" class="btn btn-dark btn-sm"><i class="fa fa-eye"></i> VIEW</a>
                            <a href="#" class="btn btn-dark btn-sm"><i class="fa fa-edit"></i> EDIT</a>
                            <a href="#" class="btn btn-dark btn-sm"><i class="fa fa-trash"></i> DELETE</a>
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
        <?php require_once('includes/footer.php');?>
      </div>
    </div>
    <!-- END wrapper -->
    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.min.js"></script>
    <script src="plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Required datatable js -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Responsive examples -->
    <script src="plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables/responsive.bootstrap4.min.js"></script>
    <!-- Datatable init js -->
    <script src="assets/pages/datatables.init.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
  </body>
</html>