$(document).ready(function(){
	$('#cntloader, #cntempt, #cntname, #cntemail, #cntmob, #cntfail, #cntsuccess').hide();
	$('form').submit(function(){
		var name = $('#name').val();
		var email = $('#email').val();
		var mob = $('#mob').val();
		var sub = $('#sub').val();
		var msg = $('#msg').val();
		var regex = /^[a-zA-Z ]*$/;
		var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
		var num = /^[0-9\s]*$/;
		
		if(name===''||email===''||mob===''||sub===''||msg===''){
			$('#cntempt').delay(2000).show().fadeOut('slow');
			return false;
		}
		if(!regex.test(name)){
			$('#cntname').delay(2000).show().fadeOut('slow');
			return false;
		}
		if(!pattern.test(email)){
			$('#cntemail').delay(2000).show().fadeOut('slow');
			return false;
		}
		if(!num.test(mob) || mob.length!==10){
			$('#cntmob').delay(2000).show().fadeOut('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'assets/phpAjax/contactMsg',
				data: new FormData (this),
				contentType: false,
				cache: false,
				processData:false,
				beforeSend : function( result ){
					$("#cntloader").show();
					$('button').hide();
				},
				success:function(result){
					if(result == true){
						$('#cntsuccess').delay(2000).show().fadeOut('slow');
						$('form').trigger("reset");
						$('button').show();
					}
				},
				error: function (error) {
					$('#cntfail').delay(2000).show().fadeOut('slow');
					return false;
					$('button').show();
				},
				complete : function( result ) {
					$('#cntloader').hide();
					$('button').show();
				}
			});
			return false;
		}
	});
});