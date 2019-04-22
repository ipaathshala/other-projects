$(document).ready(function(){
	$('#emptyprofile, #invname, #invmail, #invmob, #invzipcode, #profilefail, #profilesuccess, #profileloader').hide();
	$('form').submit(function(){
		var fn = $('#fn').val();
		var ln = $('#ln').val();
		var email = $('#email').val();
		var mob = $('#mob').val();
		var add = $('#add').val();
		var city = $('#city').val();
		var zipcode = $('#zipcode').val();
		var regex = /^[a-zA-Z ]*$/;
		var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
		var num = /^[0-9\s]*$/;
		
		if(fn===''||ln===''||email===''||mob===''||add===''||city===''||zipcode===''){
			$('#emptyprofile').delay(2000).show().fadeOut('slow');
			return false;
		}
		if(!regex.test(fn)||!regex.test(ln)){
			$('#invname').delay(2000).show().fadeOut('slow');
			return false;
		}
		if(!pattern.test(email)){
			$('#invmail').delay(2000).show().fadeOut('slow');
			return false;
		}
		if(!num.test(mob) || mob.length!==10){
			$('#invmob').delay(2000).show().fadeOut('slow');
			return false;
		}
		if(!num.test(zipcode) || zipcode.length!==6){
			$('#invzipcode').delay(2000).show().fadeOut('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'assets/phpAjax/updateProfile',
				data: new FormData (this),
				contentType: false,
				cache: false,
				processData:false,
				beforeSend : function( result ){
					$("#profileloader").show();
					$('#button').show();
				},
				success:function(result){
					if(result == true){
						$('#profilesuccess').delay(2000).show().fadeOut('slow');
					}
				},
				error: function (error) {
					$('#profilefail').delay(2000).show().fadeOut('slow');
					return false;
				},
				complete : function( result ) {
					$('#profileloader').hide();
					$('#button').show();
				}
			});
			return false;
		}
	});
});