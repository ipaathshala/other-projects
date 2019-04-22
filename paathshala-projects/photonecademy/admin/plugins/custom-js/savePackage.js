$(document).ready(function(){
	$('#empty, #invfile, #fail, #success, #loader, #listsuccess, #emptyresult').hide();
	$.ajax({
		url:'plugins/phpAjax/packageList',
		beforeSend:function(result){
			$("#loader").show();
		},
		success:function(result){
			if(result!=0){
				$("#pkglist").html(result).show();
			}
			else{
				$("#emptyresult").delay(2000).show().slideUp('slow');
				return false;
			}
		},
		error: function(error){
			$("#fail").delay(2000).show().slideUp('slow');
			return false;
		},
		complete:function(result){
			$("#loader").hide();
		}
	});
	
	
	$('form').submit(function(){
		var pkgName = $('#pkg').val();
		var fileType = $('#file').val();
		var extensions = [".jpeg", ".jpg", ".png"];
		var check = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + extensions.join('|') + ")$");
		
		if(pkgName===''){
			$('#empty').delay(2000).show().slideUp('slow');
			return false;
		}
		
		if (!check.test(fileType.toLowerCase())){
			$("#invfile").delay(2000).show().slideUp('slow');
			return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'plugins/phpAjax/savePackage',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function(result){
					$("#loader").show();
					$('button').hide();
				},
				success:function(result){
					if(result==true){
						$("#success").delay(2000).show().slideUp('slow');
						$("form").trigger('reset');
					}
				},
				error: function(error){
					$("#fail").delay(2000).show().slideUp('slow');
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