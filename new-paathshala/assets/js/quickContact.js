$(document).ready(function(){
	$("#invname, #invrelation, #invmobile, #invemail, #invstandard, #fail, #success, #loader").hide();
	$("#getinTouchForm").submit(function(){
		var name = $('#name').val();
		var relation = $('#relation').val();
		var mobile = $('#mobile').val();
		var email = $('#email').val();
		var standard = $('#standard').val();
		var regex = /^[a-zA-Z ]*$/;
		var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
		var num = /^[0-9\s]*$/;

		if(name==='' || !regex.test(name)){
			$("#invname").delay(2000).show().slideUp('slow');
			return false;
		}
		if(relation==0){
			$('#invrelation').delay(2000).show().slideUp('slow');
			return false;
		}
		if(mobile==='' || !num.test(mobile) || mobile.length!==10){
			$("#invmobile").delay(2000).show().slideUp('slow');
			return false;
		}
		if(email==='' || !pattern.test(email)){
			$("#invemail").delay(2000).show().slideUp('slow');
			return false;
		}
		if(standard==0){
			$('#invstandard').delay(2000).show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'assets/php/quick-enquiry.php',
				data: new FormData (this),
				contentType: false,
				cache: false,
				processData:false,
				beforeSend:function(result){
					$("button").hide();
					$("#loader").show();
				},
				success:function(result){
					if(result == true){
						$("#loader").hide();
						$("button").show();
						$("#success").delay(2000).show().slideUp('slow');
						$("#getinTouchForm").trigger("reset");
					}
				},
				error:function(error) {
					$("button").show();
					$("#loader").hide();
					$("#fail").delay(2000).show().slideUp('slow');
					return false;
				},
				complete:function(result){
					$("button").show();
					$("#loader").hide();
				}
			});
			return false;
		}
	});
});