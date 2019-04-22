$(document).ready(function(){
	$('#empty, #invurl, #fail, #success, #loader').hide();

	/*Load Course List*/
	$.ajax({
		url:'plugins/phpAjax/loadCourse',
		success:function(courseresult){
			if(courseresult!=0){
				$('#course').html(courseresult).show();
			}
		}
	});

	/*Load Subcourse List*/
	$('#course').on('change', function(){
		var courseid = $('#course option:selected').val();
		$.ajax({
			type:'GET',
			url:'plugins/phpAjax/loadSubCourse',
			data: {courseid: courseid},
			success:function(subcourseresult){
				if(subcourseresult != 0){
					$('#subcourse').html(subcourseresult).show();
				}
				else{
					$('#emptyresult').delay(2000).show().slideUp('slow');
					return false;
				}
			},
			error: function(error){
				$('#fail').delay(2000).show().slideUp('slow');
				return false;
			}
		});
		return false;
	});

	/*Load Subject List*/
	$('#subcourse').on('change', function(){
		var courseid = $('#course option:selected').val();
		var subcourseid = $('#subcourse option:selected').val();
		$.ajax({
			type:'GET',
			url:'plugins/phpAjax/loadSubject',
			data: {courseid: courseid, subcourseid: subcourseid},
			success:function(subjectresult){
				if(subjectresult != 0){
					$("#subject").html(subjectresult).show();
				}
				else{
					$('#emptyresult').delay(2000).show().slideUp('slow');
					return false;
				}
			},
			error: function(error){
				$("#fail").delay(2000).show().slideUp('slow');
				return false;
			}
		});
		return false;
	});

	/*Load Chapter List*/
	$('#subject').on('change', function(){
		var courseid = $('#course option:selected').val();
		var subcourseid = $('#subcourse option:selected').val();
		var subjectid = $('#subject option:selected').val();
		$.ajax({
			type:'GET',
			url:'plugins/phpAjax/loadChapter',
			data: {courseid: courseid, subcourseid: subcourseid, subjectid: subjectid},
			success:function(chapterresult){
				if(chapterresult != 0){
					$("#chapter").html(chapterresult).show();
				}
				else{
					$('#emptyresult').delay(2000).show().slideUp('slow');
					return false;
				}
			},
			error: function(error){
				$("#fail").delay(2000).show().slideUp('slow');
				return false;
			}
		});
		return false;
	});

	/*Load Topic List*/
	$('#chapter').on('change', function(){
		var courseid = $('#course option:selected').val();
		var subcourseid = $('#subcourse option:selected').val();
		var subjectid = $('#subject option:selected').val();
		var chapterid = $('#chapter option:selected').val();
		$.ajax({
			type:'GET',
			url:'plugins/phpAjax/loadTopic',
			data: {courseid: courseid, subcourseid: subcourseid, subjectid: subjectid, chapterid: chapterid},
			success:function(topicresult){
				if(topicresult != 0){
					$("#topic").html(topicresult).show();
				}
				else{
					$('#emptyresult').delay(2000).show().slideUp('slow');
					return false;
				}
			},
			error: function(error){
				$("#fail").delay(2000).show().slideUp('slow');
				return false;
			}
		});
		return false;
	});

	/*Load Type List*/
	$.ajax({
		url:'plugins/phpAjax/loadType',
		success:function(postresult){
			if(postresult != 0){
				$("#category").html(postresult).show();
			}
		},
		error: function(error){
			$("#fail").delay(2000).show().slideUp('slow');
			return false;
		}
	});

	/*Load Level List*/
	$.ajax({
		url:'plugins/phpAjax/levelList',
		success:function(levelresult){
			if(levelresult != 0){
				$("#level").html(levelresult).show();
			}
		},
		error: function(error){
			$("#fail").delay(2000).show().slideUp('slow');
			return false;
		}
	});

	/*Load Version List*/
	$.ajax({
		url:'plugins/phpAjax/versionList',
		success:function(versionresult){
			if(versionresult != 0){
				$("#version").html(versionresult).show();
			}
		},
		error: function(error){
			$("#fail").delay(2000).show().slideUp('slow');
			return false;
		}
	});

	/*Save Post Form*/
	$('form').submit(function(){
		var courseId = $('#course option:selected').val();
		var subcourseId = $('#subcourse option:selected').val();
		var subjectId = $('#subject option:selected').val();
		var chapterId = $('#chapter option:selected').val();
		var topicId = $('#topic option:selected').val();
		var categoryId = $('#category option:selected').val();
		var levelId = $('#level option:selected').val();
		var versionId = $('#version option:selected').val();
		var videoTitle = $('#videotitle').val();
		var videoURL = $('#url').val();
		var videodesc = $('#desc').val();
		var urlpattern = /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;
		
		if(courseId=='0' || subcourseId=='0' || subjectId=='0' || chapterId=='0' || topicId=='0' || levelId=='0' || versionId=='0'){
			$('#empty').delay(2000).show().slideUp('slow');
			return false;
		}
		if(videoTitle==='' || videoURL===''){
			$('#empty').delay(2000).show().slideUp('slow');
			return false;
		}
		if(!urlpattern.test(videoURL)){
			$("#invurl").delay(2000).show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'plugins/phpAjax/savevideoPost',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(result){
					$('#loader').show();
					$('button').show();
				},
				success:function(result){
					if(result == true){
						$('#success').delay(2000).show().slideUp('slow');
						$('#videotitle,#url').val('');
						$('#desc').val(' ');
					}
				},
				error: function(error){
					$('#fail').delay(2000).show().slideUp('slow');
					return false;
					$('button').show();
				},
				complete:function(result){
					$("#loader").hide();
					$('button').show();
				}
			});
			return false;
		}
	});
});