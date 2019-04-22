$(document).ready(function(){
	
	$("#invbatch, #invexam, #invdate, #invtime, #invalid, #fail, #success, #loader").hide();

	/*Load batch list*/
	$.ajax({
		type:'POST',
		url:'phpAjax/loadbatchlist',
		success:function(result){
			if(result!=0){
				$('#batch').html(result).show();
				$('#exam').html(result).show();
			}
		},
		error: function(error){
			$('#fail').delay('2000').show().slideUp('slow');
			return false;
		}
	});

});