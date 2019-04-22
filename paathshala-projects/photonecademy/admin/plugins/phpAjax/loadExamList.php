<?php
	require_once('../../include/config.php');
	
	$result = mysqli_query($con,"SELECT `exam_id`, `exam_name` FROM `master_exams`");
	$res = array();
	$row = mysqli_fetch_array($result);
	foreach($result as $row){
		$res[] = array('examid'=>$row["exam_id"], 'exam_name'=>strtoupper($row["exam_name"]));
	}
	echo json_encode($res);
?>	