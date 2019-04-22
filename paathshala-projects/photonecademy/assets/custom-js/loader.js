/*This is the main JS file to load the form content. Do not remove this file from the directory*/

$(document).ready(function(){
	$('#success, #fail, #empty, #loader').hide();

	/*Load Course List*/
	$.ajax({
		url:'assets/phpAjax/loadCourse',
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
			url:'assets/phpAjax/loadSubCourse',
			data: {courseid: courseid},
			success:function(subcourseresult){
				if(subcourseresult != 0){
					$('#subcourse').html(subcourseresult).show();
				}
				else{
					$('#empty').delay(2000).show().fadeOut('slow');
					return false;
				}
			},
			error: function(error){
				$('#fail').delay(2000).show().fadeOut('slow');
				return false;
			}
		});
		return false;
	});
	
	/*Load Subject List*/
	$("#subcourse").on('change',function(){
		var courseid = $('#course option:selected').val();
		var subcourseid = $("#subcourse option:selected").val();
		$.ajax({
			type:'GET',
			url:'assets/phpAjax/loadSubject',
			data:{courseid: courseid, subcourseid: subcourseid},
			success:function(subjectresult){
				if(subjectresult!=0){
					$("#subject").html(subjectresult).show();
				}
				else{
					$('#empty').delay(2000).show().fadeOut('slow');
					return false;
				}
			},
			error:function(error){
				$("#fail").delay(2000).show().fadeOut('slow');
				return false;
			}
		});
		return false;
	});
	
	/*Load Chapter List*/
	$("#subject").on('change',function(){
		var courseid = $('#course option:selected').val();
		var subcourseid = $("#subcourse option:selected").val();	
		var subjectid = $("#subject option:selected").val();
		$.ajax({
			type:'GET',
			url:'assets/phpAjax/loadChapter',
			data:{courseid: courseid, subcourseid: subcourseid, subjectid:subjectid},
			success:function(chapterresult){
				if(chapterresult!=0){
					$("#chapter").html(chapterresult).show();
				}
			},
			error:function(error){
				$("#fail").delay(2000).show().fadeOut('slow');
				return false;
			}
		});
		return false;
	});
	
	/*Load Topic List*/
	$("#chapter").on('change',function(){
		var courseid = $('#course option:selected').val();
		var subcourseid = $("#subcourse option:selected").val();	
		var subjectid = $("#subject option:selected").val();	
		var chapterid = $("#chapter option:selected").val();
		$.ajax({
			type:'GET',
			url:'assets/phpAjax/loadTopic',
			data:{courseid: courseid, subcourseid: subcourseid, subjectid: subjectid, chapterid: chapterid},
			success:function(topicresult){
				if(topicresult!=0){
					$("#topic").html(topicresult).show();
				}
			},
			error:function(error){
				$("#fail").delay(2000).show().fadeOut('slow');
				return false;
			}
		});
		return false;
	});
	
	/*Load Type List*/
	$.ajax({
		url:'assets/phpAjax/loadCategory',
		success:function(categoryresult){
			if(categoryresult!=0){
				$('#category').html(categoryresult).show();
			}
		}
	});
	
	/*Load Level List*/
	$.ajax({
		url:'assets/phpAjax/loadLevel',
		success:function(levelresult){
			if(levelresult!=0){
				$('#level').html(levelresult).show();
			}
		}
	});
	
	/*Load Version List*/
	$.ajax({
		url:'assets/phpAjax/loadVersion',
		success:function(versionresult){
			if(versionresult!=0){
				$('#version').html(versionresult).show();
			}
		}
	});
	
	/*Show Result*/
	$("form").submit(function(){
		var course = $("#course option:selected").val();
		var subcourse = $("#subcourse option:selected").val();
		var subject = $("#subject option:selected").val();
		var chapter = $("#chapter option:selected").val();
		var topic = $("#topic option:selected").val();
		var category = $("#category option:selected").val();
		var level = $("#level option:selected").val();
		var version = $("#version option:selected").val();
		
		if(course==0 || subcourse==0 || subject==0 || chapter==0 || topic==0 || category==0 || level==0 || version==0){
			$('#empty').delay(2000).show().slideUp('slow');
			return false;
		}
		/*else{
			$.ajax({
				type:'POST',
				url:'result',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(result){
					$('button').hide();
					$('#loader').show();
				},
				success:function(result){
					if(result == true){
						$('#loader').delay(5000).show().slideUp('slow');
						$('#success').delay(5000).show().slideUp('slow');
						window.location.href='result';
					}
				},
				error: function(error){
					$('button').show();
					$('#fail').delay(2000).show().slideUp('slow');
					return false;
				},
				complete:function(result){
					$('#loader').hide();
					$('button').show();
				}
			});
			return false;
		}*/
	});
	
	$('#logout').click(function(){
		$.ajax({
			url:'assets/phpAjax/logout',
			success:function(sessionresult){
				if(sessionresult == true){
					window.location.href="account";
				}
			}
		});
		return false;
	});
});