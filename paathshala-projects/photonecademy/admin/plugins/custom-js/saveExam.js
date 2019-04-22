$(document).ready(function(){
	$('#empty, #fail, #success, #loader').hide();
	$('form').submit(function(){
		var examName = $('#exam').val();
		if(examName===''){
			$('#empty').show().delay(2000).slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'plugins/phpAjax/saveExam',
				data:new FormData (this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(result){
					$('button').hide();
					$('#loader').show();
				},
				success:function(result){
					if(result == true){
						$('#success').show().delay(2000).slideUp();
						$('form').trigger('reset');
					}
				},
				error: function(error){
					$('button').show();
					$('#fail').show().delay(2000).slideUp();
					return false;
				},
				complete:function(result){
					$('#loader').hide();
					$('button').show();
				}
			});
			return false;
		}
	});
	
	$.ajax({
		url:'plugins/phpAjax/examsList',
		success:function(result){
			if(result!=0){
				$('#examList').html(result).show();
			}
		},
		error: function(error){
			$('#fail').show().delay(2000).slideUp();
			return false;
		}
	});
	return false;
});