$(document).ready(function(){
	$("#invcourse, #empty, #fail, #success, #loader").hide();
	$.ajax({
		url:'plugins/phpAjax/loadCourse',
		success:function(courselist){
			if(courselist!=0){
				$('#course').html(courselist).show();
			}
		}
	});

	$('form').submit(function(){
		var courseTitle = $("#course option:selected").val();
		var subCourseTitle = $("#subcourse").val();
		if(courseTitle=='0'){
			$("#invcourse").delay(2000).show().slideUp('slow');
			return false;
		}
		if(subCourseTitle===''){
			$("#empty").delay(2000).show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'plugins/phpAjax/saveSubCourse',
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
						$('#subcourse').val('');
						$("#success").delay(2000).show().fadeOut('slow');
					}
				},
				error: function(error){
					$("#fail").delay(2000).show().fadeOut('slow');
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