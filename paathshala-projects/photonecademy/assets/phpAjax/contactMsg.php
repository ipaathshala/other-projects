<?php
	require_once('../../admin/include/config.php');
	
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$mob = mysqli_real_escape_string($con, $_POST['mob']);
	$sub = mysqli_real_escape_string($con, $_POST['sub']);
	$msg = mysqli_real_escape_string($con, $_POST['msg']);
	
	if(!empty($name)&&!empty($email)&&!empty($mob)&&!empty($sub)&&!empty($msg)){
		$to = 'phpwebpathshalaeducation@gmail.com';
		$subject = 'Website Contact Form';
		$message = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName : $name\n\nEmail : $email\n\nPhone : $mob\n\nSubjetct : $sub\n\nMessage: $msg";
		$headers = "From: noreply@photoeacademy.com" . "\r\n" .
		$result = mail($to,$subject,$message,$headers);
		if($result)
		{
			echo true;
		}
	}
	else
	{
		echo false;
	}
?>