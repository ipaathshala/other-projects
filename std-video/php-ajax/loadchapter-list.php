<?php
	require_once '../includes/DB_Functions.php';
	
	error_reporting(0);

	if(!empty($_REQUEST['boardid']) && !empty($_REQUEST['standardid']) && !empty($_REQUEST['subjectid'])){

		$tempboard = htmlentities(trim($_REQUEST['boardid']));
		$tempstd = htmlentities(trim($_REQUEST['standardid']));
		$tempsub = htmlentities(trim($_REQUEST['subjectid']));

		$board = mysql_real_escape_string($tempboard);
		$standard = mysql_real_escape_string($tempstd);
		$subject = mysql_real_escape_string($tempsub);

		$db = new DB_Functions();
		
		$response = array();

		if($db->loadChapterList($board, $standard, $subject)){
			$user = $db->loadChapterList($board, $standard, $subject);
?>
			<option value="0">Select Chapter</option>
<?php			
			foreach($user as $value){
?>
				<option value="<?php echo $response['chapter_id'] = $value['chapter_id'];?>"><?php echo $response['chapter_title'] = strtoupper($value['chapter_title']);?></option>
				<!-- <tr>
					<td>< ?php echo $response['chapter_id'] = $value['chapter_id'];?><input type="hidden" class="form-control chapters" name="chapters[]" value="< ?php echo $response['chapter_id'] = $value['chapter_id'];?>" multiple></td>
					<td>< ?php echo $response['chapter_title'] = ucfirst($value['chapter_title']);?></td>
					<td><a href="add-video?chapter=< ?php echo $response['chapter_id'] = $value['chapter_id']; ?>" class="btn btn-primary">ADD VIDEO</a></td>
				</tr> -->
<?php				
			}
		}
	}
	else{
		echo 0;
	}
?>