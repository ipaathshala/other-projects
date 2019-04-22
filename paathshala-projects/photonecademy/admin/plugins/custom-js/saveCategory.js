$(document).ready(function(){
	$("#empty, #fail, #success, #loader").hide();
	$("form").submit(function(){
		var categoryTitle = $("#category").val();
		
		if(categoryTitle===''){
			$("#empty").delay(2000).show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'plugins/phpAjax/saveCategory',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(result){
					$("button").hide();
					$("#loader").show();
				},
				success:function(result){
					if(result == true){
						$("#category").val('');
						$("#success").delay(2000).show().slideUp('slow');
						$("button").show();
					}
				},
				error: function(error){
					$("#fail").delay(2000).show().slideUp('slow');
					return false;
					$("button").show();
				},
				complete:function(result){
					$("#loader").hide();
					$("button").show();
				}
			});
			return false;
		}
	});
});