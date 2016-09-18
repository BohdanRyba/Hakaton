$(function(){
	$('.nav li').hover(function(){
		$(this).css('background', '#1E90FF')
		$(this).css('transition','background 0.6s');
	},function(){
		$(this).css('background', '#000');
		$(this).css('transition','background 0.6s');
	});

	$('.log_animate').click(function(){
		$('.form_log').show(1000);
		$('#overlay_log').show(400);
	});
	$('#overlay_log').click(function(){
		$(this).hide(400);
		$('.form_log').hide(400);
	});

	$('.connect').click(function(){
		$('#overlay').show(600);
		$('#popup').show(1000);
	});
	$('#overlay').click(function(){
		$(this).hide(400);
		$('#popup').hide(400);
	});


	$('.form_log label').hover(function(){
		$(this).css('box-shadow',' 5px 5px 10px rgba(0,0,0,0.7)');
		$(this).css('transition','box-shadow 0.2s');

	}, function(){
		$(this).css('box-shadow',' none');
		$(this).css('transition','box-shadow 0.2s');
	});

	$('.form_in label').hover(function(){
		$(this).css('box-shadow',' 5px 5px 10px rgba(0,0,0,0.7)');
		$(this).css('transition','box-shadow 0.2s');

	}, function(){
		$(this).css('box-shadow',' none');
		$(this).css('transition','box-shadow 0.2s');
	});

	var kilcPar=$('.one_team li');
	function randNum(min, max) {
	   return Math.floor(Math.random() * (kilcPar.length - 2 + 1)) + 2;
	};

	var masTwo;
	masTwo= $('.two_team li');
 var masRand=[];

	$('jereb_run').click(function(){
			for(i=0; i<masTwo.length; i++){
		var a=randNum();
		masRand[i]=masTwo[a];
		masTwo[a].remove();
	};
		var a;
		var masSpuska = [];                                      
		for(i=0; i<masTwo.length; i++) {
			kilcPar[i].append('<li>'+masTwo[i].html()+'</li>');
		};
	});
	



});