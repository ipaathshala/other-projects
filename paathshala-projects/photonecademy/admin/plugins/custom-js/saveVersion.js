$(document).ready(function(){
	$("#empty, #fail, #success, #loader").hide();
	$("form").submit(function(){
		var versionTitle = $("#version").val();
		if(versionTitle===''){
			$("#empty").delay(2000).show().fadeOut('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'plugins/phpAjax/saveVersion',
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
						$("#version").val('');
						$("#success").delay(2000).show().fadeOut('slow');
						$("button").show();
					}
				},
				error: function(error){
					$("button").show();
					$("#fail").delay(2000).show().fadeOut('slow');
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