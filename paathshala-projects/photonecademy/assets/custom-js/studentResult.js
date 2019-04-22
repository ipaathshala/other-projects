$(document).ready(function(){
	$.ajax({
		url:'assets/phpAjax/studentResult',
		beforeSend:function(result){
			$('#loader').show();
		},
		success:function(result){
			if(result!=0){
				$('#studentResult').html(result).show();
				$('#myModal').modal('hide');
			}
		},
		error: function (error) {
			$('#cntfail').delay(2000).show().fadeOut('slow');
			return false;
		},
		complete : function( result ) {
			$('#myModal').modal('hide');
		}
	});
});