$(document).ready(function(){
	$('#empty, #invun, #fail, #loader, #invlogin').hide();
	$('form').submit(function(){
		var un = $('#un').val();
		var pw = $('#pw').val();
		var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
		
		if(un==='' || pw===''){
			$('#empty').delay('2000').show().slideUp('slow');
			return false;
		}
		if(!pattern.test(un)){
			$('#invun').delay('2000').show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'phpAjax/login',
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
						window.location.href='dashboard';
					}
					else{
						$('button').show();
						$('#loader').hide();
						$('#invlogin').delay(2000).show().slideUp('slow');
						return false;
					}
				},
				error: function(error){
					$('button').show();
					$('#fail').delay(2000).show().slideUp('slow');
					return false;
				}
			});
			return false;
		}
	});	
});