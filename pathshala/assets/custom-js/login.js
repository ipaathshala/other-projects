$(document).ready(function(){
	$("#empty, #invemail, #invlogin, #fail, .loader").hide();
	$("form").submit(function(){
		var email	=	$("#email").val();
		var pw		=	$("#pw").val();
		var pattern	=	/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

		if(email===''||pw===''){
			$("#empty").delay(2000).show().fadeOut('slow');
			return false;	
		}
		else if(!pattern.test(email)){
			$("#invemail").delay(2000).show().fadeOut('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'assets/phpAjax/login',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function( result ){
					$(".loader").show();
					$("button").hide();
				},
				success:function(loginresult){
					if(loginresult == true){
						$(".loader").delay(2000).show().fadeOut('slow');
						window.location.href="dashboard";
					}
					else if(loginresult == false){
						$("button").show();
						$("#invlogin").delay(2000).show().fadeOut('slow');
						return false;
					}
				},
				error: function ( error ){
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