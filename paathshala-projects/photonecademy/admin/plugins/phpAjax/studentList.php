<?php
	
	require_once('../../include/config.php');
	
	$studentList = mysqli_query($con,"SELECT `student_id`, `username`, `password`, `student_status` FROM `master_student`");
	$x = 1;
	while($stdRow = mysqli_fetch_array($studentList)){
  ?>
	<tr>
	  <td><?php echo $x++; ?></td>
	  <td><?php echo $stdRow['username'];?></td>
	  <td>
		<?php 
		  if($stdRow['student_status']==1){
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
		<?php
		  if($stdRow['student_status']==1){
		  ?>
		<a href="studentList?inactive=<?php echo $stdRow['student_id'];?>" class="btn btn-warning" title="MAKE INACTIVE"><i class="fa fa-eye-slash"></i></a>
		<?php	
		  }
		  else{
		  ?>
		<a href="studentList?active=<?php echo $stdRow['student_id'];?>" class="btn btn-success" title="ACTIVATE"><i class="fa fa-eye"></i></a>
		<?php			
		  }
		  ?>
		
		<a href="studentList?del=<?php echo $stdRow['student_id'];?>" class="btn btn-primary" title="VIEW PROFILE"><i class="fa fa-user"></i></a>
		<a href="stdpwChange?stdid=<?php echo $stdRow['student_id'];?>" class="btn btn-secondary" title="CHANGE PASSWORD"><i class="fa fa-lock"></i></a>
		<a href="studentList?del=<?php echo $stdRow['student_id'];?>" class="btn btn-danger" title="DELETE"><i class="fa fa-trash"></i></a>
		
	  </td>
	</tr>
<?php		
  }
?>