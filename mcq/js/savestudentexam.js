$(document).ready(function(){
	$('.invbatch, .invstd, .invexam, .invdate, .invstime, .invetime, .fail, .success, #loader').hide();
	
	$("#batch").change(function(){
		var batch = $("#batch option:selected").val();
		$.ajax({
			type:'GET',
			url:'phpAjax/loadStudent',
			data:{batch:batch},
			success:function(result){
				if(result!=0){
					$("#student").html(result).show();
				}
				else{
					$("#student").trigger('0');
				}
			},
			error: function (error) {
				$(".fail").delay(2000).show().slideUp('slow');
				return false;
			}
		});
	});

	$('.addRow').on('click',function(){
		var html1 = '';
		html1 +='<tr>'; 
		html1 +='<td><input type="date" class="form-control startdate" name="startdate[]"></td>'; 
		html1 +='<td><input type="date" class="form-control enddate" name="enddate[]"></td>'; 
		html1 +='<td><input type="time" class="form-control starttime" name="starttime[]"></td>'; 
		html1 +='<td><input type="time" class="form-control endtime" name="endtime[]"></td>'; 
		html1 +='<td><button class="btn btn-danger btn-sm waves-effect waves-light removeRow"><i class="fa fa-times"></i></button></td>'; 
		html1 +='</td>';
		html1 +='</tr>';
		$('#examDetails').append(html1);
	});
	
	$(document).on('click','.removeRow',function(){
		$(this).closest('tr').remove();
	});

	$('form').submit(function(){
		var batchId = $("#batch option:selected").val();
		var stdId = $("#student option:selected").val();
		var examId = $("#exam option:selected").val();
		var startDate = $('.startdate').val();
		var endDate = $('.enddate').val();
		var startTime = $('.starttime').val();
		var endTime = $('.endtime').val();
		var selectedDate1 = new Date(startDate);
		var selectedDate2 = new Date(endDate);
		var now = new Date();

		if(batchId==0){
			$('.invbatch').delay(2000).show().slideUp('slow');
			return false;
		}
		if(stdId==0){
			$('.invstd').delay(2000).show().slideUp('slow');
			return false;
		}
		if(examId==0){
			$('.invexam').delay(2000).show().slideUp('slow');
			return false;
		}
		if (selectedDate1 < now || selectedDate2 < now) {
			$('.invdate').delay(2000).show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'phpAjax/saveStudentTest',
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