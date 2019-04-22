<?php
	include_once('../../includes/dbFunction.php');
	
	$funObj = new dbFunction();
	
	$un = mysql_real_escape_string(htmlentities(strtolower($_POST['un'])));
	$pw = mysql_real_escape_string(htmlentities($_POST['pw']));
	
	if(!empty($un)&&!empty($pw)){
		$check = $funObj->NewStudent($un, $pw);
		if($check == false){
			echo false;
		}
		else{
			echo true;
		}
	}
?>