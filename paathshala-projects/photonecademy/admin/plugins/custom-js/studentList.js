/*load student list on page load*/
$(document).ready(function(){
	$.ajax({
		url:'plugins/phpAjax/studentList',
		success:function(studentresult){
			if(studentresult!=0){
				$('#stdList').html(studentresult).show();
			}
		}
	});
});