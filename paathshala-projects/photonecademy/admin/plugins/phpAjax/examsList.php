<?php
	require_once('../../include/config.php');
	
	$list = mysqli_query($con,"SELECT `exam_id`, `exam_name` FROM `master_exams`");
	$x = 1;
	while($row = mysqli_fetch_array($list)){
?>
	<tr>
		<td><?php echo $x++;?></td>
		<td><?php echo strtoupper($row['exam_name']);?></td>
		<td>
			<a href="#" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
			<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
<?php		
	}
?>