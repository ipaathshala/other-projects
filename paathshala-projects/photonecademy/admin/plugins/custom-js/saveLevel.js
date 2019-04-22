$(document).ready(function(){
	$("#empty, #fail, #success, #loader").hide();
	$("form").submit(function(){
		var levelTitle = $("#level").val();
		if(levelTitle===''){
			$("#empty").delay(2000).show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'plugins/phpAjax/saveLevel',
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
						$("#level").val("");
						$("#success").delay(2000).show().slideUp('slow');
						$("button").show();
					}
				},
				error: function(error){
					$("button").show();
					$("#fail").delay(2000).show().slideUp('slow');
					return false;
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