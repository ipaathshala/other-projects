$(document).ready(function(){
	$('#empty, #invmail, #fail, #success, #loader').hide();
	$('form').submit(function(){
		var email = $('#mail').val();
		var pw = $('#pw').val();
		var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
		
		if(email===''||pw===''){
			$('#empty').show().delay(2000).slideUp();
			return false;
		}
		if(!pattern.test(email)){
			$("#invmail").show().delay(2000).slideUp();
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'plugins/phpAjax/newIntern',
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
						$('#success').show().delay(2000).slideUp();
						$('form').trigger('reset');
					}
				},
				error: function(error){
					$('button').show();
					$('#fail').show().delay(2000).slideUp();
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