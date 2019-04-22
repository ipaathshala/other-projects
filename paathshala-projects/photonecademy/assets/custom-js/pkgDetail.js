$(document).ready(function(){
	var reqid = $('#req_id').val();
	$.ajax({
		type:'GET',
		url:'assets/phpAjax/pkgDetail',
		data:{reqid: reqid},
		success:function(result){
			if(result != 0){
				$("#pkgResult").html(result).show();
			}
		}
	});
	/*buy now script will be go here*/
});