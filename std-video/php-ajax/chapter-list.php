<?php
	require_once '../includes/DB_Functions.php';

	if(!empty($_REQUEST['boardid'])){
		
		$temp_id = htmlentities(trim($_REQUEST['boardid']));
		$board_id = mysql_real_escape_string($temp_id);

		$response = array();
		$db = new DB_Functions();

		if($db->chapterList($board_id)){

			$user = $db->chapterList($board_id);
			foreach($user as $value){
?>
				<tr>
					<td><?php echo $response['chapter_id'] = $value['chapter_id'];?><input type="hidden" class="form-control chapters" name="chapters[]" value="<?php echo $response['chapter_id'] = $value['chapter_id'];?>" multiple></td>
					<td><?php echo $response['chapter_title'] = ucfirst($value['chapter_title']);?></td>
					<td><input type="file" class="filestyle lect" id="file" name="file[]" value="<?php echo $_POST['file'];?>">
					</td>
				</tr>
<?php				
			}
		}
	}
	else{
		echo 0;
	}
?>