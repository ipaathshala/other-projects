$(document).ready(function(){
	$('#invname, #invfile, #success, #loader').hide();
	$(document).on('click','.addRow',function(){
		$.ajax({
			url:'plugins/phpAjax/loadExamList',
			success:function(result){
				var result = JSON.parse(result);
				if(result != 0){
					var html1 = '';
					html1 +='<tr>'; 
					html1 +='<td>'; 
					html1 +='<select class="form-control" name="examname[]">'; 
					html1 +='<option value="0">SELECT EXAM</option>'; 
					$.each(result, function(i, value){
						html1 +='<option value='+value.examid+'>'+value.exam_name+'</option>'; 
					});
					html1 +='</select>';
					html1 +='<td><input type="text" class="form-control" placeholder="Enter Marks" name="exam_marks[]" autocomplete="off"></td>'; 
					html1 +='<td><button class="btn btn-danger btn-sm removeRow"><i class="ion-close"></i> REMOVE</button></td>'; 
					html1 +='</td>';
					html1 +='</tr>';
					$('#examDetails').append(html1);
				}
			}
		});
	});
	$(document).on('click','.removeRow',function(){
		$(this).closest('tr').remove();
	});
	$('form').submit(function(event){
		event.preventDefault();
		var fName = $('#fn').val();
		var lName = $('#ln').val();
		var regex = /^[a-zA-Z ]*$/;
		var fileType = $("#file").val();
		var extensions = [".png", ".jpg", ".jpeg"];
		var check = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + extensions.join('|') + ")$");

		if(fName===''||lName===''||!regex.test(fName)||!regex.test(lName)){
			$('#invname').delay(2000).show().slideUp('slow');
			return false;
		}
		if (!check.test(fileType.toLowerCase())) {
			$('#invfile').delay(2000).show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'plugins/phpAjax/saveStudentResult',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(result){
					$('#loader').show();
				},
				success:function(result){
					if(result == true){
						$('#success').delay(2000).show().slideUp('slow');
						$('form').trigger('reset');
					}
				},
				error: function(error){
					$('#fail').delay(2000).show().slideUp('slow');
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