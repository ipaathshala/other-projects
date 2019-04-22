$(document).ready(function(){
	$("#invcourse, #invsubcourse, #empty, #fail, #success, #loader").hide();
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
			$("#subcourse").val('0');
		}
		else{
			$.ajax({
				type:'GET',
				url:'plugins/phpAjax/loadSubCourse',
				data:{courseid: courseid},
				success:function(result){
					if(result != 0){
						$("#subcourse, #sub").prop("disabled", false);
						$("#subcourse").html(result).show();
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
		var subcourseId = $("#subcourse option:selected").val();
		var subjectTitle = $("#sub").val();

		if(courseId=='0'){
			$("#invcourse").delay(2000).show().slideUp('slow');
			return false;
		}
		if(subcourseId=='0'){
			$("#invsubcourse").delay(2000).show().slideUp('slow');
			return false;
		}
		if(subjectTitle===''){
			$("#empty").delay(2000).show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'plugins/phpAjax/saveSubject',
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
						$('#sub').val('');
						$("#success").delay(2000).show().slideUp('slow');
						$("button").show();
					}
				},
				error: function(error){
					$("#fail").delay(2000).show().slideUp('slow');
					return false;
					$("button").show();
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