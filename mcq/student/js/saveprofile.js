$(document).ready(function(){
	$('#loader, #empty, #invname, #invemail, #fail, #success').hide();
	$('form').submit(function(){
		var fn = $('#fn').val();
		var ln = $('#ln').val();
		var email = $('#email').val();
		var pw = $('#pw').val();
		var sessionid = $('#session').val();
		var regex = /^[a-zA-Z ]*$/;
		var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
		
		if(fn===''||ln===''||email===''||pw===''||sessionid===''){
			$('#empty').delay('2000').show().slideUp('slow');
			return false;
		}
		if(!regex.test(fn)||!regex.test(ln)){
			$('#invname').delay('2000').show().slideUp('slow');
			return false;
		}
		if(!pattern.test(email)){
			$('#invemail').delay('2000').show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'phpAjax/saveprofile',
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
						$('#loader').hide();
						$('#success').delay('2000').show().slideUp('slow');
						$('button').show();
					}
				},
				error: function(error){
					$('button').show();
					$('#loader').hide();
					$('#fail').delay(2000).show().slideUp('slow');
					return false;
				}
			});
			return false;
		}
	});
});