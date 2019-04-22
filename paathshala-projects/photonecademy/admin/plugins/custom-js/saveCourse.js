$(document).ready(function(){
	$("#invcourse, #savecourse, #fail, #loader").hide();
	$("form").submit(function(){
		var courseTitle = $("#course").val();
		if(courseTitle===''){
			$("#invcourse").delay(2000).show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'plugins/phpAjax/saveCourse',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(result){
					$("#button").hide();
					$("#loader").show();
				},
				success:function(result){
					if(result == true){
						$("#savecourse").delay(2000).show().slideUp('slow');
						$('form').trigger('reset');
					}
				},
				error: function(error){
					$("#fail").delay(2000).show().slideUp('slow');
					return false;
				},
				complete:function(result){
					$("#loader").hide();
					$("#button").show();
				}
			});
			return false;
		}
	});
});