$(document).ready(function(){

	$("#loader, #invemail, #norecord, #invalid, #fail, #success").hide();

	$("form").submit(function(){
		var email = $("#email").val();
		var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

		if(email==="" || !pattern.test(email)){
			$("#invemail").show().delay(2000).slideUp("fast");
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'php-ajax/forgot-password',
				data:new FormData (this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(result){
					$('button').hide();
					$('#loader').show();
				},
				success:function(result){
					if(result == true){
						$('#success').delay(2000).show().slideUp('fast');
						$('form').trigger('reset');
						$('#loader').hide();
						$('button').show();	
					}
					if(result == 0){
						$('#norecord').delay(2000).show().slideUp('fast');
						return false;
						$('#loader').hide();
						$('button').show();	
					}
				},
				error:function(error){
					$('#loader').hide();
					$('button').show();
					$('#fail').delay(2000).show().slideUp('fast');
					return false;	
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