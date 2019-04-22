$(document).ready(function(){
	
	$("#invun, #invpw, #duplicate, #fail, #success, #invalid, #loader").hide();
	
	$('form').submit(function(){
		var un = $("#un").val();
		var pw = $("#pw").val();
		var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

		if(un==='' || !pattern.test(un)){
			$('#invun').delay(2000).show().slideUp('fast');
			return false;
		}
		if(pw===''){
			$('#invpw').delay(2000).show().slideUp('fast');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'php-ajax/sign-up',
				data:new FormData (this),
				contentType:false,
				cache:false,
				processData:false,
				success:function(result){
					if(result == 1){
						$('#success').delay(2000).show().slideUp('fast');
						$('form').trigger("reset");
						$('#loader').hide();
						$('button').show();
					}
				},
				error:function(error){
					$('#loader').hide();
					$('button').show();
					$('#fail').delay(2000).show().slideUp('fast');
					return false;	
				}
			});
			return false;
		}
	});
});