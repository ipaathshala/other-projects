$(document).ready(function(){
	$("#empty, #invemail, #invpw, #fail, #success, .loader").hide();
	$("form").submit(function(){
		var email	=	$("#email").val();
		var pw		=	$("#pw").val();
		var cpw		=	$("#cpw").val();
		var pattern	=	/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

		if(email===''||pw===''||cpw===''){
			$("#empty").delay(2000).show().fadeOut('slow');
			return false;	
		}
		else if(!pattern.test(email)){
			$("#invemail").delay(2000).show().fadeOut('slow');
			return false;
		}
		else if(pw!=cpw){
			$("#invpw").delay(2000).show().fadeOut('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'assets/phpAjax/register.php',
				data:new FormData (this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function( result ){
					$(".loader").show();
					$("button").hide();
				},
				success:function(result){
					if(result == true){
						$("#success").delay(2000).show().fadeOut('slow');
						$("form").trigger("reset");
						$("button").show();
					}
				},
				error: function (error) {
					$("#fail").delay(2000).show().fadeOut('slow');
					return false;
				},
				complete : function( result ) {
					$(".loader").hide();
				}
			});
			return false;
		}
	});
});