<?php
	$name = htmlspecialchars($_POST['name']);
	$mobile = htmlspecialchars($_POST['mobile']);
	$school = htmlspecialchars($_POST['school']);
	$standard = htmlspecialchars($_POST['standard']);
	$exams = implode(',', $_POST['exams']);

	if(!empty($name)&&!empty($mobile)){
		$to = 'enquiries@paathshala.world, headOffice@paathshala.world';
		$subject = "Contact Enquiry From Website";
		$message = "You have received a new message from your website enrollment form.\n\n"."Here are the details:\n\nName: ".ucfirst($name)."\n\nMobile: $mobile\n\nSchool / College: ".strtoupper($school)."\n\nStandard:".strtoupper($standard)."\n\nExams Prepared For:".strtoupper($exams)."";
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