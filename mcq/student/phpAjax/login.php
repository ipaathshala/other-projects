<?php
	include_once('../../includes/dbFunction.php');
	$funObj = new dbFunction();
	
	$un = mysql_real_escape_string(htmlentities(strtolower($_POST['un'])));
	$pw = mysql_real_escape_string(htmlentities($_POST['pw']));
	if(!empty($un)&&!empty($pw)){
		$student = $funObj->StudentLogin($un, $pw);
		if($student){
			echo true;
		}
		else{
			echo false;
		}	
	}
?>