$(document).ready(function(){
	$('#empty, #fail, #success, #loader').hide();
	
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
	
	/*Load Post List*/
	$('#version').on('change', function(){
		var courseid = $('#course option:selected').val();
		var subcourseid = $('#subcourse option:selected').val();
		var subjectid = $('#subject option:selected').val();
		var chapterid = $('#chapter option:selected').val();
		var topicid = $('#topic option:selected').val();
		var typeid = $('#category option:selected').val();
		var levelid = $('#level option:selected').val();
		var versionid = $('#version option:selected').val();

		if(courseid == '0'|| subcourseid == '0' || subjectid == '0' || chapterid == '0' || topicid == '0' || typeid == '0' || levelid == '0' || versionid == '0'){
			$('#empty').delay(2000).show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'GET',
				url:'plugins/phpAjax/postListResult',
				data:{courseid: courseid, subcourseid: subcourseid, subjectid: subjectid, chapterid: chapterid, topicid: topicid, typeid: typeid, levelid: levelid, versionid: versionid},
				beforeSend:function(result){
					$('#loader').show();
				},
				success:function(postresult){
					if(postresult != 0){
						$('#postResult').html(postresult).show();
						$('#success').delay(2000).show().slideUp('slow');
					}
					else{
						$('#empty').delay(2000).show().slideUp('slow');
						return false;
						$('#postResult').html(postresult).hide();
					}
				},
				error: function(error){
					$('#fail').delay(2000).show().slideUp('slow');
					return false;
				},
				complete:function(result){
					$("#loader").hide();
				}
			});
			return false;
		}
	});
});