$(document).ready(function(){

	$("#invboard, #invfile, #invalid, #fail, #success, #loader").hide();

	$.ajax({
		type:'POST',
		url:'php-ajax/board-dropdown',
		success:function(result){
			if(result!=0){
				$('#board').html(result).show();
			}
		},
		error: function(error){
			$('#fail').delay(2000).show().slideUp('fast');
			return false;
		}
	});

	$("#board").change(function(){
		var boardid = $("#board option:selected").val();
		$.ajax({
			type:'GET',
			url:'php-ajax/chapter-list',
			data:{boardid: boardid},
			success:function(result){
				if(result != 0){
					$("#videolist").html(result);
				}
				else{
					$("#videolist").trigger(0);
				}
			},
			error: function (error){
				$("#fail").delay(2000).show().slideUp('fast');
				return false;
			}
		});
	});

	$('form').submit(function(){
		var board_id = $("#board option:selected").val();
		var chapter_id = $("#chapters").val();
		var fileType = $(".lect").val();
		var extensions = ['.mp4'];
		var check = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + extensions.join('|') + ")$");
		
		if(board_id==0){
			$("#invboard").delay(2000).show().slideUp('fast');
			return false;
		}
		if(fileType===''||!check.test(fileType.toLowerCase())){
			$('#invfile').delay(2000).show().slideUp('fast');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'php-ajax/upload-video',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(result){
					$('button').hide();
					$('#loader').show();
				},
				success:function(result){
					if(result == true){
						$('#success').delay(2000).show().slideUp('fast');
						$('form').trigger('reset');
						$('#loader').hide();
						$('button').show();	
					}
					/*if(result == 2){
						$('#loader').hide();
						$('button').show();	
						$('#duplicate').delay(2000).show().slideUp('fast');
						return false;
					}*/
					/*if(result == 0){
						$('#invalid').delay(2000).show().slideUp('fast');
						return false;
					}*/
				},
				error:function(error){
					$('#loader').hide();
					$('button').show();
					$('#fail').delay(2000).show().slideUp('fast');
					return false;	
				},
				complete:function(result){
					$("#loader").hide();
					$('button').show();
				}
			});
			return false;
		}
	});
});