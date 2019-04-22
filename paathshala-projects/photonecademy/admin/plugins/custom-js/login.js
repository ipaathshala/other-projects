$(document).ready(function(){
	$("#empty, #invun, #invlogin, #loader, #fail").hide();
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
				url:'plugins/phpAjax/loginAuth',
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
						$('#loader').show().slideUp(5000);
						window.location.href='dashboard';
					}
					else{
						$('#invlogin').delay(2000).show().slideUp('slow');
						return false;
					}
				},
				error: function(error){
					$('button').show();
					$('#fail').delay(2000).show().slideUp('slow');
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