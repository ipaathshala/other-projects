$(document).ready(function(){
	$.ajax({
		url:'assets/phpAjax/loadPackageList',
		success:function(pkglistresult){
			if(pkglistresult!=0){
				$('#pkglist').html(pkglistresult).show();
			}
		}
	});

	$('#pkglist').on('change', function(){
		var pkgid = $('#pkglist option:selected').val();
		$.ajax({
			type:'GET',
			url:'assets/phpAjax/loadPackageResult',
			data:{pkgid: pkgid},
			success:function(result){
				var result = JSON.parse(result);	
				if(result != 0){
					var html1 = '';	
					$.each(result, function(i, value){
						html1 +='<div class="col-xl-3 col-lg-3 col-md-3"><div class="postbox mb-40"><div class="postbox__thumb mb-25"><img src="uploads/pkg-img/'+value.img+'" alt="hero image"></div><div class="postbox__text"><h4 class="title-18 font-600 pr-0"><a href="package_detail?pkgId='+value.pid+'">'+value.pkgname+'</a></h4><div class="desc-text mb-20"><p class="text-justify">But I must explain to you how all this mistaken idea of denouncing sure and praising pain was born and I will give you a complete account.</p></div><a href="package_detail?pkgId='+value.pid+'" class="read-more" target="_blank">read more</a></div></div></div>';
					});
					$(".gridResult").html(html1);
				}
			}
		});
	});
});
