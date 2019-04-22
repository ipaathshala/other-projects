$(document).ready(function(){
	$("#invcourse, #invsubcourse, #invsubject, #empty, #fail, #success, #loader").hide();
	/*Load Packagelist*/
	$.ajax({
		url:'plugins/phpAjax/loadCourse',
		success:function(courselist){
			if(courselist!=0){
				$('#course').html(courselist).show();
			}
		}
	});
	/*Load Subcourse List*/
	$("#course").on('change', function(){
		var courseid = $("#course option:selected").val();
		if(courseid=='0'){
			$('#subcourse, #subject').val(0);
		}
		else{
			$.ajax({
				type:'GET',
				url:'plugins/phpAjax/loadSubCourse',
				data:{courseid: courseid},
				success:function(result){
					if(result != 0){
						$('#subcourse, #sub').prop('disabled', false);
						$('#subcourse').html(result).show();
					}
				},
				error:function(error){
					$('#fail').delay(2000).show().slideUp('slow');
					return false;
				}
			});
			return false;
		}
	});
	
	/*Load Subject List*/
	$("#subcourse").on('change', function(){
		var courseid = $('#course option:selected').val();
		var subcourseid = $('#subcourse option:selected').val();
		if(courseid=='0'|| subcourseid=='0'){
			$("#subject").val(0);
		}
		else{
			$.ajax({
				type:'GET',
				url:'plugins/phpAjax/loadSubject',
				data:{courseid: courseid, subcourseid: subcourseid},
				success:function(result){
					if(result != 0){
						$("#subject").html(result).show();
					}
				},
				error:function(error){
					$("#fail").delay(2000).show().slideUp('slow');
					return false;
				}
			});
			return false;
		}
	});
	
	$("form").submit(function(){
		var courseId = $("#course option:selected").val();
		var subcourseId = $("#subcourse option:selected").val();;
		var subjectId = $("#subject option:selected").val();
		var chapterTitle = $("#chapter").val();
		
		if(courseId=='0'){
			$("#invcourse").delay(2000).show().slideUp('slow');
			return false;	
		}
		if(subcourseId=='0'){
			$("#invsubcourse").delay(2000).show().slideUp('slow');
			return false;	
		}
		if(subjectId=='0'){
			$("#invsubject").delay(2000).show().slideUp('slow');
			return false;
		}
		if(chapterTitle===''){
			$("#empty").delay(2000).show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'plugins/phpAjax/saveChapter',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(result){
					$("button").hide();
					$("#loader").show();
				},
				success:function(result){
					if(result == true){
						$("#chapter").val('');
						$("#success").delay(2000).show().slideUp('slow');
						$("button").show();
					}					
				},
				error: function(error){
					$("button").show();
					$("#fail").delay(2000).show().slideUp('slow');
					return false;
				},
				complete:function(result){
					$("#loader").hide();
					$("button").show();
				}
			});
			return false;
		}
	});
});