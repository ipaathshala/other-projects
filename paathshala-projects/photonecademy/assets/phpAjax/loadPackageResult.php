<?php
	require_once('../../admin/include/config.php');
	
	$pkgId = mysqli_real_escape_string($con, $_REQUEST['pkgid']);
	
	$sql = mysqli_query($con,"SELECT `pkg_id`, `pkg_name`, `pkg_img`, `pkg_status` FROM `master_package` WHERE `pkg_id` = '$pkgId'");
	$array = array();
	$row = mysqli_fetch_array($sql);
	foreach($sql as $row){
		$postArray[] = array('pid'=>$row["pkg_id"], 'pkgname'=>strtoupper($row["pkg_name"]), 'img'=>$row["pkg_img"]);
	}
	echo json_encode($postArray);
?>