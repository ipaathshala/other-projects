$(document).ready(function(){
	$("#invbatch, #invfile, #invalid, #fail, #success, #loader").hide();
	
	$.ajax({
		type:'POST',
		url:'phpAjax/loadbatchlist',
		success:function(result){
			if(result!=0){
				$('#batch').html(result).show();
			}
		},
		error: function(error){
			$('#fail').delay(2000).show().slideUp('slow');
			return false;
		}
	});
	
	$('form').submit(function(){
		var batchid = $('#batch option:selected').val();
		var fileType = $('#file').val();
		var extensions = [".csv"];
		var check = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + extensions.join('|') + ")$");
		
		if(batchid==0){
			$('#empty').delay('2000').show().slideUp('slow');
			return false;
		}
		if(fileType===''||!check.test(fileType.toLowerCase())){
			$('#invfile').delay('2000').show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'phpAjax/newstudent',
				data:new FormData (this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(result){
					$('button').hide();
					$('#loader').show();
				},
				success:function(result){
					if(result==true){
						$('#loader').hide();
						$('button').show();
						$('#success').delay(2000).show().slideUp('slow');
						$('form').trigger('reset');
					}
				},
				error:function(error){
					$('button').show();
					$('#loader').hide();
					$('#fail').delay(2000).show().slideUp('slow');
					return false;
				}
			});
			return false;
		}
	});
});