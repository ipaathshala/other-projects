$(document).ready(function(){
	$('#empty, #fail, #success, #loader').hide();
	
	/*Load Packagelist*/
	$.ajax({
		url:'plugins/phpAjax/loadPackage',
		success:function(result){
			if(result!=0){
				$('#pkglist').html(result).show();
			}
		}
	});

	/*Load Course*/
	$.ajax({
		url:'plugins/phpAjax/loadCourse',
		success:function(courseresult){
			if(courseresult!=0){
				$('#course').html(courseresult).show();
			}
		}
	});

	/*Load Subcourse*/
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
			}
		});
		return false;
	});

	/*Load Subject*/
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
			}
		});
		return false;
	});

	/*Load Chapter*/
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
			}
		});
		return false;
	});

	/*Load Topic*/
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
			}
		});
		return false;
	});

	/*Load Type*/
	$.ajax({
		type:'GET',
		url:'plugins/phpAjax/loadType',
		success:function(postresult){
			if(postresult != 0){
				$("#category").html(postresult).show();
			}
		}
	});

	/*Load Level*/
	$.ajax({
		type:'GET',
		url:'plugins/phpAjax/levelList',
		success:function(levelresult){
			if(levelresult != 0){
				$("#level").html(levelresult).show();
			}
		}
	});

	/*Load Version*/
	$.ajax({
		type:'GET',
		url:'plugins/phpAjax/versionList',
		success:function(versionresult){
			if(versionresult != 0){
				$("#version").html(versionresult).show();
			}
		}
	});

	/*Load Post List*/
	$('#pkglist, #course, #subcourse, #subject, #chapter, #topic, #category, #level, #version').on('change', function(){
		var pkgid = $('#pkglist option:selected').val();
		var courseid = $('#course option:selected').val();
		var subcourseid = $('#subcourse option:selected').val();
		var subjectid = $('#subject option:selected').val();
		var chapterid = $('#chapter option:selected').val();
		var topicid = $('#topic option:selected').val();
		var typeid = $('#category option:selected').val();
		var levelid = $('#level option:selected').val();
		var versionid = $('#version option:selected').val();
		
		if(pkgid!='' || courseid!='' || subcourseid!='' || subjectid!='' || chapterid!='' || topicid!='' || typeid!='' || levelid!='' || versionid!='')
		{
			$.ajax({
				type:'GET',
				url:'plugins/phpAjax/loadPostList',
				data: {pkgid: pkgid, courseid: courseid, subcourseid: subcourseid, subjectid: subjectid, chapterid: chapterid, topicid: topicid, typeid: typeid,
				levelid:levelid, versionid: versionid},
				success:function(result){
					var result = JSON.parse(result);
					if(result != 0){
						var html1 = '';
						$.each(result, function(i, value){
							html1 +='<tr>';
							html1 +='<td>'+value.auto+'</td>'; 
							html1 +='<td>'+value.title+'</td>'; 
							html1 +='<td>'+value.type_title+'</td>'; 
							html1 +='<td>'+value.level_title+'</td>'; 
							html1 +='<td>'+value.version_title+'</td>'; 
							html1 +='<td>'+'<input type="radio" id="addbtn'+value.auto+'" name="post[]'+value.pid+'" value="'+value.pid+'"> <span class="badge badge-success">ADD</span> <input type="radio" id="removebtn'+value.auto+'" name="post[]'+value.pid+'" value="0"> <span class="badge badge-danger">REMOVE</span> <button type="button" class="btn btn-dark btn-sm" id="btnview'+value.pid+'" title="VIEW PACKAGE"><i class="fa fa-eye"></i></button>'+'</td>';
							html1 +='<td>'+value.topic_name+'</td>'; 
							html1 +='<td>'+value.chapter_name+'</td>'; 
							html1 +='<td>'+value.subject_name+'</td>'; 
							html1 +='<td>'+value.subcourse_title+'</td>'; 
							html1 +='<td>'+value.course_title+'</td>'; 
							html1 +='</tr>';
						});
						$("#postList").html(html1);
					}
				},
				error: function(error){
					$('#fail').delay(2000).show().slideUp('slow');
					return false;
				}
			});
			return false;	
		}
	});
	
	/*Save Package*/
	$('form').submit(function(){
		var pkgId = $('#pkglist').val();
		var courseId = $('#course').val();
		var subcourseId = $('#subcourse').val();
		var subjectId = $('#subject').val();
		var chapterId = $('#chapter').val();
		var topicId = $('#topic').val();
		var catId = $('#category').val();
		var levelId = $('#level').val();
		var versionId = $('#version').val();
		var postId = $("#addbtn").val();

		if(pkgId=='0' || courseId=='0' || subcourseId=='0' || subjectId=='0' || chapterId=='0' || topicId=='0' || catId=='0' || levelId=='0' || versionId=='0' || postId=='0'){
			$('#empty').delay(2000).show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'plugins/phpAjax/updatePackage',
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
						$('#postList').val(0);
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