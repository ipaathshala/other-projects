<?php
	include_once('../../includes/dbFunction.php');
	
	$funObj = new dbFunction();
	
	$stdid = mysql_real_escape_string(htmlentities(($_POST['session'])));
	$fn = mysql_real_escape_string(htmlentities(strtolower($_POST['fn'])));
	$ln = mysql_real_escape_string(htmlentities(strtolower($_POST['ln'])));
	$email = mysql_real_escape_string(htmlentities(strtolower($_POST['email'])));
	$pw = mysql_real_escape_string(htmlentities(($_POST['pw'])));
	
	if(!empty($stdid)||!empty($fn)||!empty($ln)||!empty($email)||!empty($pw)){
		$update = $funObj->StudentProfileUpdate($stdid, $fn, $ln, $email, $pw);
		if($update){
			echo true;
		}
	}
?>