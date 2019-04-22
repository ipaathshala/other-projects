<?php
	
	$hostname = 'localhost';
	$username = 'youcoizd_dev2019';
	$password = 'P^kO$gw})[ED';
	$database = 'youcoizd_telecallapp';
	
	$con = mysqli_connect($hostname, $username, $password);
	if($con){
		mysqli_select_db($con, $database);
	}
	else{
		echo "Failed to connect";
	}

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$image = $_POST['image'];

		$sql ="SELECT feedback_id FROM lead_feedabck ORDER BY feedback_id ASC";
		$res = mysqli_query($con,$sql);
		$id = 0;
		while($row = mysqli_fetch_array($res)){
			$id = $row['feedback_id'];
		}

		$path = "upload/$id.png";

		$insert = "INSERT INTO lead_feedabck (call_file) VALUES ('$path')";

		if(mysqli_query($con,$insert)){
			file_put_contents($path,base64_decode($image));
			echo "Successfully Uploaded";
		}

		mysqli_close($con);
	}
	else{
		echo "Error";
	}
?>