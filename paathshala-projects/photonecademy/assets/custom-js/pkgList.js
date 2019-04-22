$(document).ready(function(){
	$('#emptyresult, #pkgfail, #resultsuccess, #resultloader').hide();
	
	/*Load course start*/
	$.ajax({
		url:'assets/phpAjax/pkgCourse',
		success:function(pkgcourse){
			if(pkgcourse!=0){
				$('#pkg_course').html(pkgcourse).show();
			}
		},
		error: function(error){
			$('#pkgfail').delay(2000).show().slideUp('slow');
			return false;
		}
	});
	/*Load course end*/
	
	/*Load subcourse start*/
	$('#pkg_course').on('change', function(){
		var courseid = $('#pkg_course option:selected').val();
		$.ajax({
			type:'GET',
			url:'assets/phpAjax/pkgsubCourse',
			data: {courseid: courseid},
			success:function(pkgsubcourse){
				if(pkgsubcourse != 0){
					$('#pkg_subcourse').html(pkgsubcourse).show();
				}
			},
			error: function(error){
				$('#pkgfail').delay(2000).show().slideUp('slow');
				return false;
			}
		});
		return false;
	});
	/*Load subcourse end*/
	
	/*Load subject start*/
	$("#pkg_course, #pkg_subcourse").on('change',function(){
		var courseid = $('#pkg_course option:selected').val();
		var subcourseid = $("#pkg_subcourse option:selected").val();
		$.ajax({
			type:'GET',
			url:'assets/phpAjax/pkgSubject',
			data:{courseid: courseid, subcourseid: subcourseid},
			success:function(pkgsubject){
				if(pkgsubject!=0){
					$("#pkg_subject").html(pkgsubject).show();
				}
			},
			error:function(error){
				$("#pkgfail").delay(2000).show().slideUp('slow');
				return false;
			}
		});
		return false;
	});
	/*Load subject end*/
	
	/*Load chapter start*/
	$("#pkg_course, #pkg_subcourse, #pkg_subject").on('change',function(){
		var courseid = $('#pkg_course option:selected').val();
		var subcourseid = $("#pkg_subcourse option:selected").val();	
		var subjectid = $("#pkg_subject option:selected").val();
		$.ajax({
			type:'GET',
			url:'assets/phpAjax/pkgChapter',
			data:{courseid: courseid, subcourseid: subcourseid, subjectid:subjectid},
			success:function(chaptersuccess){
				if(chaptersuccess!=0){
					$("#pkg_chapter").html(chaptersuccess).show();
				}
			},
			error:function(error){
				$("#pkgfail").delay(2000).show().slideUp('slow');
				return false;
			}
		});
		return false;
	});
	/*Load chapter end*/
	
	/*Load topic start*/
	$("#pkg_course, #pkg_subcourse, #pkg_subject, #pkg_chapter").on('change',function(){
		var courseid = $('#pkg_course option:selected').val();
		var subcourseid = $("#pkg_subcourse option:selected").val();	
		var subjectid = $("#pkg_subject option:selected").val();
		var chapterid = $("#pkg_chapter option:selected").val();
		$.ajax({
			type:'GET',
			url:'assets/phpAjax/pkgTopic',
			data:{courseid: courseid, subcourseid: subcourseid, subjectid: subjectid, chapterid: chapterid},
			success:function(topicsuccess){
				if(topicsuccess!=0){
					$("#pkg_topic").html(topicsuccess).show();
				}
			}
		});
		return false;
	});
	/*Load topic end*/
	
	/*Load type level and version start*/
	$.ajax({
		url:'assets/phpAjax/pkgCategory',
		success:function(categorysuccess){
			if(categorysuccess!=0){
				$('#pkg_type').html(categorysuccess).show();
			}
		}
	});
	
	$.ajax({
		url:'assets/phpAjax/pkgLevel',
		success:function(levelsuccess){
			if(levelsuccess!=0){
				$('#pkg_level').html(levelsuccess).show();
			}
		}
	});
	
	$.ajax({
		url:'assets/phpAjax/pkgVersion',
		success:function(versionsuccess){
			if(versionsuccess!=0){
				$('#pkg_version').html(versionsuccess).show();
			}
		}
	});
	/*Load type level and version end*/
	
	/*Load packages on selection start*/
	$("#pkg_course, #pkg_subcourse, #pkg_subject, #pkg_chapter, #pkg_topic, #pkg_type, #pkg_level, #pkg_version").on('change',function(){
		var courseid = $('#pkg_course option:selected').val();
		var subcourseid = $("#pkg_subcourse option:selected").val();	
		var subjectid = $("#pkg_subject option:selected").val();
		var chapterid = $("#pkg_chapter option:selected").val();
		var topicid = $("#pkg_topic option:selected").val();
		var typeid = $("#pkg_type option:selected").val();
		var levelid = $("#pkg_level option:selected").val();
		var versionid = $("#pkg_version option:selected").val();
		$.ajax({
			type:'GET',
			url:'assets/phpAjax/allPackages',
			data:{courseid: courseid, subcourseid: subcourseid, subjectid: subjectid, chapterid: chapterid, topicid: topicid, typeid: typeid, levelid: levelid, versionid: versionid},
			success:function(pkgsuccess){
				if(pkgsuccess!=0){
					$("#pkgDesc").html(pkgsuccess).show();
					$('#resultsuccess').delay(2000).show().slideUp('slow');
				}
				else{
					$('#emptyresult').show().delay(2000).slideUp('slow');
					return false;
				}
			},
			error:function(error){
				$("#pkgfail").delay(2000).show().slideUp('slow');
				return false;
			}
		});
		return false;
	});
	/*Load packages on selection end*/
	
	$.ajax({
		url:'assets/phpAjax/allPackages',
		success:function(success){
			if(success!=0){
				$('#pkgDesc').html(success).show();
			}
		}
	});
});