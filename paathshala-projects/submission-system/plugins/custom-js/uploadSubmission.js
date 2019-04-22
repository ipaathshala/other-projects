$(document).ready(function(){
	$("#invbatch, #invstud, #invfile, #success, #fail, #loader").hide()
	
	$("form").submit(function(){

		var batchName = $("#batch").val();
		var studentName = $("#student").val();
		var attachment = $("#images").val();

		var allowedFiles = [".jpeg", ".jpg", ".png"];
		var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");

		if(batchName=='0'){
			$("#invbatch").delay(2000).show().fadeOut('slow');
			return false;
		}

		else if(studentName=='0'){
			$("#invstud").delay(2000).show().fadeOut('slow');
			return false;
		}

		/*else if(attachment!==''){
			if(!regex.test(attachment)){
				$("#invfile").delay(2000).show().fadeOut('slow');
				return false;
			}
		}
		else{
			alert('hi');
		}*/

		else{
			$.ajax({
				type:'POST',
				url:'plugins/phpAjax/saveSubmission',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(result){
					$("#loader").show();
				},
				success:function(result){
					if(result == true){
						$("form").trigger("reset");
						$("#success").delay(2000).show().fadeOut('slow');
					}
				},
				error: function(error){
					$("#fail").delay(2000).show().fadeOut('slow');
					return false;
				},
				complete:function(result){
					$("#loader").hide();
				}
			});
			return false;	
		}
	});
})