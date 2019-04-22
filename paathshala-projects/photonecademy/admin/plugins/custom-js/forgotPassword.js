$(document).ready(function(){
	$('#empty,#invmail,#fail,#success,#loader,#norecord').hide();
	$('form').submit(function(){
		var email = $('#email').val();
		var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
		
		if(email==='' || !pattern.test(email)){
			$('#invmail').delay(2000).show().fadeOut('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'plugins/phpAjax/forgotPassword',
				data:new FormData (this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(result){
					$('#loader').show();
				},
				success:function(result){
					if(result == true){
						$('#success').delay(2000).show().fadeOut('slow');
						$('form').trigger('reset');
					}
					else{
						$('#norecord').delay(2000).show().fadeOut('slow');
						return false;
					}
				},
				error: function(error){
					$('#fail').delay(2000).show().fadeOut('slow');
					return false;
				},
				complete:function(result){
					$('#loader').hide();
				}
			});
			return false;
		}
	});
});