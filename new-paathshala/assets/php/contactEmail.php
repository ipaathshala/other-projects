<?php
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$mobile = htmlspecialchars($_POST['mobile']);
	$comment = htmlspecialchars($_POST['message']);

	if(!empty($name)&&!empty($email)&&!empty($mobile)&&!empty($comment)){
		$to = 'enquiries@paathshala.world, headOffice@paathshala.world';
		//$to = 'phpwebpathshalaeducation@gmail.com';
		$subject = 'Website Contact Form';
		$message = "Contact enquiry from website : \n\n"."Name: ".ucfirst($name)."\n\nEmail: $email\n\nContact Number: $mobile\n\nMessage: ".ucfirst($comment)."";
		$headers = "From: noreply@paathshalaiit.com" . "\r\n" .
		$result = mail($to,$subject,$message,$headers);
		if($result){
			echo true;
		}
		else{
			echo false;
		}
	}
?>