<?php
	$name = htmlspecialchars($_POST['name']);
	$relation = htmlspecialchars($_POST['relation']);
	$mobile = htmlspecialchars($_POST['mobile']);
	$email = htmlspecialchars($_POST['email']);
	$standard = htmlspecialchars($_POST['standard']);
	$exams = implode(',', $_POST['exams']);

	if(!empty($name)&&!empty($mobile)&&!empty($email)){
		$to = 'enquiries@paathshala.world, headOffice@paathshala.world';
		$subject = "Contact Enquiry From Website";
		$message = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: ".ucfirst($name)."\n\nRelation: ".ucfirst($relation)."\n\nMobile: $mobile\n\nEmail: $email\n\nStandard:".strtoupper($standard)."\n\nExams Prepared For:".strtoupper($exams)."";
		$headers = "From:noreply@paathshalaiit.com" . "\r\n" .
		$result = mail($to,$subject,$message,$headers);
		if($result){
			echo true;
		}
		else{
			echo false;
		}
	}
?>