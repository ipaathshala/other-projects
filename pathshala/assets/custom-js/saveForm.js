$(document).ready(function(){
	$("#catempty, #catsuccess, #catfail, .catloader").hide();
	$("#category").submit(function(){
		var cat = $("#catname").val();
		if(cat === ''){
			$("#catempty").delay(2000).show().fadeOut('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'assets/phpAjax/saveForm',
				data:new FormData (this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function( result ){
					$(".catloader").show();
					$("#catbtn").hide();
				},
				success:function(result){
					if(result == true){
						$("#catsuccess").delay(2000).show().fadeOut('slow');
						$("#category").trigger("reset");
						$("#catbtn").show();
					}
				},
				error:function(error){
					$("#catbtn").show();
					$("#catfail").delay(2000).show().fadeOut('slow');
					return false;
				},
				complete:function( result ) {
					$(".catloader").hide();
					$("#catbtn").show();
				}
			});
			return false;
		}
	});
	
	$("#batchmpty, #batchfail, #batchsuccess, .batchloader").hide();
	$("#batch").submit(function(){
		var batchname = $("#batchname").val();
		if(batchname === ''){
			$("#batchmpty").delay(2000).show().fadeOut('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'assets/phpAjax/saveForm',
				data:new FormData (this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function( result ){
					$(".batchloader").show();
					$("#batchbtn").hide();
				},
				success:function(result){
					if(result == true){
						$("#batchsuccess").delay(2000).show().fadeOut('slow');
						$("#batch").trigger("reset");
						$("#batchbtn").show();
					}
				},
				error:function(error){
					$("#batchbtn").show();
					$("#batchfail").delay(2000).show().fadeOut('slow');
					return false;
				},
				complete:function( result ){
					$(".batchloader").hide();
					$("#batchbtn").show();
				}
			});
			return false;
		}
	});
	
	$("#subempty, #subfail, #subsuccess, .subloader").hide();
	$("#submission").submit(function(){
		var subname = $("#subname").val();
		if(subname === ''){
			$("#subempty").delay(2000).show().fadeOut('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'assets/phpAjax/saveForm',
				data:new FormData (this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function( result ){
					$(".subloader").show();
					$("#subbtn").hide();
				},
				success:function(result){
					if(result == true){
						$("#subsuccess").delay(2000).show().fadeOut('slow');
						$("#submission").trigger("reset");
						$("#subbtn").show();
					}
				},
				error:function(error){
					$("#subbtn").show();
					$("#batchfail").delay(2000).show().fadeOut('slow');
					return false;
				},
				complete:function( result ) {
					$(".subloader").hide();
					$("#subbtn").show();
				}
			});
			return false;
		}
	});
});