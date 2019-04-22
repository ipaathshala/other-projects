$(document).ready(function(){
	$('#loginempty, #loginemail, #invlogin, #loginerror, #loginsuccess, #emptysignup, #signupemail, #signupfail, #signupsuccess, #signuploader, #signinloader').hide();
	$('#signup').submit(function(){
		var newun = $('#newun').val();
		var newpw = $('#newpw').val();
		var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
		
		if(newun==='' || newpw===''){
			$('#emptysignup').delay(2000).show().fadeOut('slow');
			return false;
		}
		if(!pattern.test(newun)){
			$("#signupemail").delay(2000).show().fadeOut('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'assets/phpAjax/signUp',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(result){
					$('#loader').show();
				},
				success:function(result){
					if(result == true){
						$('#signupsuccess').delay(2000).show().fadeOut('slow');
						$('#signup').trigger('reset');
					}
				},
				error: function(error){
					$('#signupfail').delay(2000).show().fadeOut('slow');
					return false;
				},
				complete:function(result){
					$("#loader").hide();
				}
			});
			return false;
		}
	});
	
	$('#signin').submit(function(){
		var un = $('#un').val();
		var pw = $('#pw').val();
		var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
		
		if(un==='' || pw===''){
			$('#loginempty').delay(2000).show().fadeOut('slow');
			return false;
		}
		if(!pattern.test(un)){
			$("#loginemail").delay(2000).show().fadeOut('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'assets/phpAjax/signIn',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(result){
					$('#signinloader').show();
				},
				success:function(result){
					if(result == true){
						$('#loginsuccess').delay(2000).show().fadeOut('slow');
						window.location.href = 'index';
					}
					else{
						$('#invlogin').delay(2000).show().fadeOut('slow');
						return false;
					}
				},
				error: function(error){
					$('#loginerror').delay(2000).show().fadeOut('slow');
					return false;
				},
				complete:function(result){
					$("#signinloader").hide();
				}
			});
			return false;
		}
	});
});