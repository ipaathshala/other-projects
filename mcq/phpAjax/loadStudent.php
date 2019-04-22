<?php
	include_once('../includes/dbFunction.php');

	$funObj = new dbFunction();
	
	$sid = htmlentities($_REQUEST['batch']);

	$sql = mysql_query("SELECT `stdid`, `fn`, `ln` FROM `students` WHERE `batchid` = '$sid'");
?>
	<option value="-1">Select Student</option>
<?php	
	while($row = mysql_fetch_array($sql)){
?>
	<option value="<?php echo $row['stdid'];?>"><?php echo strtoupper($row['fn']." ".$row['ln']);?></option>
<?php 
	}
?>