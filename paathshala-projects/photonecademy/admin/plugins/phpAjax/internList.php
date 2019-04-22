<?php
	require_once('../../include/config.php');
	
	$sql = mysqli_query($con,"SELECT `intern_id`, `email`, `password`, `intern_status` FROM `master_interns`");
	$x = 1;
	while($row = mysqli_fetch_array($sql)){
?>
		<tr>
			<td><?php echo $x++;?></td>
			<td><?php echo $row['email']?></td>
			<td><?php if($row['intern_status']==1){ ?> <span class="badge badge-success">Active</span> <?php } else{ ?> <span class="badge badge-danger">Inactive</span> <?php } ?></td>
			<td>
				<a href="editIntern?edit=<?php echo $row['intern_id'];?>" class="btn btn-primary" title="EDIT RECORD"><i class="fa fa-edit"></i></a>
				<?php 
					if($row['intern_status']==1){
				?>
					<a href="internList?inactive=<?php echo $row['intern_id'];?>" class="btn btn-dark" title="MAKE INACTIVE"><i class="fa fa-eye-slash"></i></a>
				<?php }
					else{
				?>
					<a href="internList?active=<?php echo $row['intern_id'];?>" class="btn btn-success" title="MAKE ACTIVE"><i class="fa fa-eye"></i></a>
				<?php 
					}
				?>
				<a href="internList?del=<?php echo $row['intern_id'];?>" class="btn btn-danger" title="DELETE RECORD"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
<?php		
	}
?>