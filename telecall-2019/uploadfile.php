<?php
	/*$fileName = $_FILES['Uploaded_File']['name'];
	$temporary = $_FILES["Uploaded_File"]["name"];
	$file_extension = end($temporary);
	$sourcePath = $_FILES['Uploaded_File']['tmp_name'];
	$targetPath = "upload/".$fileName;
	move_uploaded_file($sourcePath,$targetPath);*/

	/*$fileName = $_FILES['Uploaded_File']['name'];
	$temporary = $_FILES["Uploaded_File"]["name"];
	$file_extension = end($temporary);
	$sourcePath = $_FILES['Uploaded_File']['tmp_name'];
	$targetPath = "upload/".$fileName;*/

	$target_path = "upload/";
	$target_path = $target_path . basename( $_FILES['Uploaded_File']['name']); 
	if(move_uploaded_file($_FILES['Uploaded_File']['tmp_name'], $target_path)) {
		echo "The file ".  basename( $_FILES['Uploaded_File']['name']). " has been uploaded";
	}
	else{
		echo "There was an error uploading the file, please try again!";
	}
?>