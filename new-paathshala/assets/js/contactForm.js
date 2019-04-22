$(document).ready(function(){
	$('#cntname, #cntemail, #cntmobile, #cntfail, #cntsuccess, #cntloader').hide();
	$('form').submit(function(){
		var name = $('#name').val();
		var email = $('#email').val();
		var mobile = $('#mobile').val();
		var message = $('#message').val();
		var regex = /^[a-zA-Z ]*$/;
		var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
		var num = /^[0-9\s]*$/;

		if(name===''||!regex.test(name)){
			$('#cntname').show().delay(2000).slideUp('slow');
			return false;
		}
		if(email===''||!pattern.test(email)){
			$('#cntemail').show().delay(2000).slideUp('slow');
			return false;
		}
		if(mobile==='' || !num.test(mobile) || mobile.length!==10){
			$('#cntmobile').show().delay(2000).slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'assets/php/contactEmail',
				data: new FormData (this),
				contentType: false,
				cache: false,
				processData:false,
				beforeSend:function(result){
					$("button").hide();
					$("#cntloader").show();
				},
				success:function(result){
					if(result == true){
						$("#cntloader").hide();
						$("button").show();
						$("#cntsuccess").delay(2000).show().slideUp('slow');
						$("form").trigger("reset");
					}
				},
				error:function(error) {
					$("button").show();
					$("#cntloader").hide();
					$("#cntfail").delay(2000).show().slideUp('slow');
					return false;
				},
				complete:function(result){
					$("button").show();
					$("#cntloader").hide();
				}
			});
			return false;
		}
	});
});