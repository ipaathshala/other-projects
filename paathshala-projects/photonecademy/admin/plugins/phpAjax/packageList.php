<?php
  require_once('../../include/config.php');
  
  $pkgList = mysqli_query($con, "SELECT `pkg_id`, `pkg_name`, `pkg_status` FROM `master_package`");
  $x = 1;
  while($pkgRow = mysqli_fetch_array($pkgList)){
?>
<tr>
  <td><?php echo $x++;?></td>
  <td><?php echo ucfirst($pkgRow['pkg_name']);?></td>
  <td>
    <?php 
      if($pkgRow['pkg_status'] == '1'){
      ?>
    <span class="badge badge-success">Active</success> 
    <?php
      }
      else{
      ?> 
    <span class="badge badge-danger">Inactive</success>
    <?php
      }
      ?>
  </td>
  <td>
    <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> EDIT</a>
    <a href="newPackage?del=<?php echo $pkgRow['pkg_id'];?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> DELETE</a>
    <?php 
      if($pkgRow['pkg_status'] == '1'){
      ?>
    <a href="newPackage?hide=<?php echo $pkgRow['pkg_id'];?>" class="btn btn-sm btn-warning"><i class="fa fa-eye-slash"></i> Inactive</a>
    <?php
      }
      else{
      ?> 
    <a href="newPackage?active=<?php echo $pkgRow['pkg_id'];?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Active</a>
    <?php
      }
      ?>
  </td>
</tr>
<?php		
  }
  ?>