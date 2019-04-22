$("#invnm, #invmb, #wrong, #done, #spinner").hide();
	$("#enrollForm").submit(function(){
		var name = $('#name').val();
		var mobile = $('#mobile').val();
		var school = $('#school').val();
		var standard = $('#standard').val();
		var regex = /^[a-zA-Z ]*$/;
		var num = /^[0-9\s]*$/;

		if(name==='' || !regex.test(name)){
			$("#invnm").delay(2000).show().slideUp('slow');
			return false;
		}
		if(mobile==='' || !num.test(mobile) || mobile.length!==10){
			$("#invmb").delay(2000).show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'assets/php/enroll.php',
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
						$("#done").delay(2000).show().slideUp('slow');
						$("#enrollForm").trigger("reset");
					}
				},
				error:function(error) {
					$("button").show();
					$("#loader").hide();
					$("#wrong").delay(2000).show().slideUp('slow');
					return false;
				},
				complete:function(result){
					$("button").show();
					$("#spinner").hide();
				}
			});
			return false;
		}
	});