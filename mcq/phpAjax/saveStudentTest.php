<?php
	include_once('../includes/dbFunction.php');

	$funObj = new dbFunction();

	$batchName = mysql_real_escape_string($_POST['batch']);
	$studentName = mysql_real_escape_string($_POST['student']);
	$examName = mysql_real_escape_string($_POST['exam']);
	$array1 = $_POST['startdate'];
	$array2 = $_POST['enddate'];
	$array3 = $_POST['starttime'];
	$array4 = $_POST['endtime'];

	if(!empty($batchName)&&!empty($examName)&&!empty($array1)&&!empty($array2)&&!empty($array3)&&!empty($array4)){
		for ($i = 0; $i < count($array1); $i++) {
			$date1 = mysql_real_escape_string($array1[$i]);
			$date2 = mysql_real_escape_string($array2[$i]);
			$time1 = mysql_real_escape_string($array3[$i]);
			$time2 = mysql_real_escape_string($array4[$i]);

			$newTest = $funObj->SetAllBatchTest($batchName,$examName,$date1,$date2,$time1,$time2);
		}
		if($newTest){
			echo true;
		}
		else{
			echo false;
		}
	}
?>