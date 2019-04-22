<?php
	require_once('../../include/config.php');
	
	$fn = mysqli_real_escape_string($con,$_POST['fn']);
	$ln = mysqli_real_escape_string($con,$_POST['ln']);
	$examarray = implode(",",$_POST['examname']);
	$marksarray = implode(",",$_POST['exam_marks']);
	$status = 1;
	if(!empty($_FILES["file"]["type"])){
		$fileName = time().'_'.$_FILES['file']['name'];
		$temporary = explode(".", $_FILES["file"]["name"]);
		$file_extension = end($temporary);
		$sourcePath = $_FILES['file']['tmp_name'];
		$targetPath = "../../../uploads/student-list/".$fileName;
		if(move_uploaded_file($sourcePath,$targetPath)){
			$file = $fileName;
			}
			mysqli_query($con, "INSERT INTO `student_result`(`std_fname`, `std_lname`, `profile_pic`, `exams`, `marks`, `status`) VALUES ('$fn','$ln','$file','$examarray','$marksarray','$status')");
			echo true;
		}
		else{
			echo false;
		}
?>