$(document).ready(function(){
	
	$('#invexam, #invans, #invfile, #invmarks, #fail, #success, #loader').hide();

	/*Load exam list on page refresh*/
	$.ajax({
		type:'POST',
		url:'phpAjax/examList',
		success:function(result){
			if(result!=0){
				$('#exam').html(result).show();
			}
		},
		error: function(error){
			$('#fail').delay('2000').show().slideUp('slow');
			return false;
		}
	});

	/*Save test details*/

	$('form').submit(function(){
		var examid = $("#exam option:selected").val();
		var fileType = $("#file").val();
		var answer = $("#ans option:selected").val();
		var extensions = [".jpg", ".jpeg", ".png"];
		var check = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + extensions.join('|') + ")$");
		
		var plusmarks = $('#positive').val();
		var minusmarks = $('#negative').val();

		if(examid=='0'){
			$('#invexam').delay(2000).show().slideUp('slow');
			return false;
		}
		if(fileType==='' || !check.test(fileType.toLowerCase())) {
            $('#invfile').delay(2000).show().slideUp('slow');
            return false;
        }
		if(answer=='0'){
			$('#invans').delay(2000).show().slideUp('slow');
			return false;
		}
		if(plusmarks=='0'){
			$('#invmarks').delay(2000).show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'phpAjax/saveTest',
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