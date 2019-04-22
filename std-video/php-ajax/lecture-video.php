<?php
	require_once '../includes/DB_Functions.php';

	if(!empty($_REQUEST['subjectid']) && !empty($_REQUEST['chapterid'])){
		$temp1 = htmlentities(trim($_REQUEST['subjectid']));
		$temp2 = htmlentities(trim($_REQUEST['chapterid']));

		$subjectId = mysql_real_escape_string($temp1);
		$chapterId = mysql_real_escape_string($temp2);

		$db = new DB_Functions();

		if($db->lectureVideo($subjectId, $chapterId)){
			$user = $db->lectureVideo($subjectId, $chapterId);
			foreach($user as $value){
?>				
				<div class="col-lg-4">
					<div class="card m-t-40">
						<div class="card-body">
							<h4 class="mt-0 header-title"><?php echo $response['video_title'] = ucfirst($value['video_title']); ?></h4>
							<div class="embed-responsive embed-responsive-16by9">
								<!-- <video width="400" controls>
									<source src="< ?php echo $response['video_url'] = $value['video_url'] ;?>" type="video/mp4">
									<source src="< ?php echo $response['video_url'] = $value['video_url'] ;?>" type="video/ogg">
										Your browser does not support HTML5 video.
								</video> -->
								<iframe src="<?php echo base64_decode($response['video_url'] = $value['video_url']) ;?>" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>
<?php				
			}
		}
	}
?>