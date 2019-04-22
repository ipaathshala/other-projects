$(document).ready(function(){
	$('#empty, #invpw, #fail, #success, #loader').hide();
	$('form').submit(function(){
		var sid = $('#sid').val();
		var newpw = $('#newpw').val();
		var cpw = $('#cpw').val();
		
		if(newpw===''||cpw==''){
			$('#empty').show().delay(2000).slideUp('slow');
			return false;
		}
		if(newpw!=cpw){
			$('#invpw').show().delay(2000).slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'plugins/phpAjax/stdpwChange',
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
						$('#success').delay(2000).show().fadeOut('slow');
						$('form').trigger('reset');
					}
				},
				error: function(error){
					$('button').show();
					$('#fail').delay(2000).show().fadeOut('slow');
					return false;
				},
				complete:function(result){
					$('#loader').hide();
					$('button').show();
				}
			});
			return false;
		}
	});
});