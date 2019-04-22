$(document).ready(function(){
	$('#success, #empty, #fail, #loader').hide();
	$.ajax({
		url:'plugins/phpAjax/internList',
		beforeSend:function(result){
			$("#loader").show();
		},
		success:function(result){
			if(result!=0){
				$("#success").delay(2000).show().slideUp('slow');
				$('#internList').html(result).show();
			}
			else{
				$("#empty").delay(2000).show().slideUp('slow');
				return false;
			}
		},
		error: function(error){
			$("#fail").delay(2000).show().fadeOut('slow');
			return false;
		},
		complete:function(result){
			$("#loader").hide();
		}
	});
	return false;
});