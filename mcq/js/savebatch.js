$(document).ready(function(){

	$('#invbatch, #duplicate, #invalid, #fail, #success, #successlist, #norecords, #loader').hide();

	$.ajax({
		type:'POST',
		url:'phpAjax/batchlist',
		success:function(result){
			if(result!=0){
				$('#batchlist').html(result).show();
				$('#successlist').delay(2000).show().slideUp('slow');
			}
			else{
				$('#norecords').delay(2000).show().slideUp('slow');
				return false;
			}
		},
		error: function(error){
			$('#fail').delay(2000).show().slideUp('slow');
			return false;
		}
	});

	$('form').submit(function(){
		
		var batchTitle = $('#batch').val();
		
		if(batchTitle===''){
			$('#invbatch').delay('2000').show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'phpAjax/newBatch',
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
						$('#success').delay('2000').show().slideUp('slow');
						$('form').trigger('reset');
						$('#loader').hide();
						$('button').show();	
					}
					else if(result == 2){
						$('#loader').hide();
						$('button').show();	
						$('#duplicate').delay('2000').show().slideUp('slow');
						return false;
					}
					else if(result == 0){
						$('#invalid').delay('2000').show().slideUp('slow');
						return false;
					}
				},
				error:function(error){
					$('#loader').hide();
					$('button').show();
					$('#fail').delay('2000').show().slideUp('slow');
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