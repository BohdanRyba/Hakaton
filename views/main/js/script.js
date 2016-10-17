$(function(){
    var $slider=$('.slider').children('div');
    var $next=$(".next");
    var $prev=$('.prev');

    $slider.each(function () {
        $(this).children().not(':first').hide();
        $(this).children().filter(':first').show().addClass('active');
    });
    function goSlide() {
        var currentSlide = $slider.children('.active');
        var nextSlide = currentSlide.next();
        if(nextSlide.length === 0) {
            nextSlide = $('#circle').children('.go').first();
        }
        currentSlide.toggle("slide").removeClass('active');
        nextSlide.toggle("slide").addClass('active');
    }

    function backSlide() {
        var currentSlide = $slider.children('.active');
        var prevSlide = currentSlide.prev();
        if(prevSlide.length === 0) {
            prevSlide = $('#circle').children('.go').last();
        }
        currentSlide.toggle("slide").removeClass('active');
        prevSlide.toggle("slide").addClass('active');
    }
    $next.on('click',goSlide);
    $prev.on('click',backSlide);

    //function2
    $('.nav li').hover(function(){
        $(this).css('background', 'rgba(0,0,0,0.1)')
        $(this).css('transition','background 0.6s');
    },function(){
        $(this).css('background', '#3c8dbc');
        $(this).css('transition','background 0.6s');
    });

    $('.log_in_form').click(function(){
        $('.form_log').show(1000);
        $('#overlay_log').show(400);
    });
    $('#overlay_log').click(function(){
        $(this).hide(400);
        $('.form_log').hide(400);
    });
    $('.contact_us').click(function(){
        $('#overlay_log').show(600);
        $('.us_info').show(1000);
    });
    $('#overlay_log').click(function(){
        $(this).hide(400);
        $('.us_info').hide(400);
    });
    $('.btn-default').click(function(){
      $('#overlay_log').hide(400);
      $('.form_log').hide(400);
    })

    var numberArray=[],
        emailRegular=/^[A-Za-z0-9]\.?([`\w-]\.?)+@[a-z]+(\.[a-z]+)+$/g,
        $userName=$('[name="user_name"]'),
        $userPhone=$('[name="user_phone"]'),
        $userCountry=$('[name="user_country"]'),
        $userEmail=$('[name="user_email"]'),
        $userPassword1=$('[name="password_1"]'),
        $userPassword2=$('[name="password_2"]'),
        $registrationSubmit=$('[name="registration_submit"]');

    for (var i=0; i<10; i++) {numberArray[i]=i;}

    $userName.keypress(function(e) {
        if (e.key.search(/[`'A-zА-я\sіїЇІёЁ-]/g)==-1){return false;}
    });
    $userPhone.keypress(function(e) {
        if (e.key.search(/[\s()0-9+-]/g)==-1){return false;}
    });
    $userCountry.keypress(function(e) {
        if (e.key.search(/[`'A-zА-я\sіїЇІёЁ]/g)==-1){return false;}
    });
    $userEmail.blur(function () {
        if ($userEmail[0].value.search(emailRegular)==-1) {
            $userEmail.addClass('registration_form_error');
        }
        else {
            $userEmail.removeClass('registration_form_error');
        }
    });
    $userPassword2.blur(function () {
        if ($userPassword1[0].value!=$userPassword2[0].value) {
            $userPassword1.addClass('registration_form_error');
            $userPassword2.addClass('registration_form_error');
        }
        else {
            $userPassword1.removeClass('registration_form_error');
            $userPassword2.removeClass('registration_form_error');
        }
    });

    /*var $cont=$('.info_container');
    // var $h=$infoContainer.offset();
    $('html, body').add(window).add(document).scroll(function (e) {
        var $s = $('html body').scrollTop()+ $(window).height() + 4*$('#ppp').height();
        console.log($cont.offset().top);
        if ($s > $cont.offset().top) {
            $cont.animate({marginTop:"50px"},700)
        }
    })*/

	$('#jereb_run').on('click',function(){
		var kilcPar=$('.one_team li');
		var numReserve = [];
		while (numReserve.length < kilcPar.length) {
  			var randomNumber = Math.ceil(Math.random() * kilcPar.length);
  			var found = false;
  			for (var i = 0; i < numReserve.length; i++) {
  				if (numReserve[i] === randomNumber){
   				found = true;
   				break;
  				}
  			}
  			if (!found) { numReserve[numReserve.length]=randomNumber; }
		}
		console.table(numReserve);
		var masTwo=[0];
		$('.two_team li').each(function(i){
			masTwo[i+1]= $(this).html();
		});
		console.table(masTwo);

 		var masRand=[];
 		for(i=0;i<kilcPar.length;i++){
 			let a=numReserve[i];
			masRand[i]=masTwo[a];
		}
		console.table(masRand);
		kilcPar.each(function(i){
			$(this).append(' - '+masRand[i])
		});
		$('.two_team').empty();

		$(this).text('Показать результаты');
		$('.cenu ul').css('display','inline-block');
		$('#jereb_run').off('click');

			//final 10 6
		$('#jereb_run').click(function () {
			var participantsInfo={},
			participantsPoints=[],
			participantsWinnersNames=[],
			$participants=$('div.participants'),
			$points=$('ul.participants_points'),
			$winnersList=$('div.the_final_6');

			for (var i=0; i<$participants.children().length; i++) {
				participantsInfo[$participants.children().eq(i).children().eq(0).html()]=$points.children().eq(i).children()[0].value;
			}

			for (var key in participantsInfo) {
				participantsPoints.push(+participantsInfo[key])
			}

			participantsPoints.sort(function(a,b){return a-b;}).reverse()
			console.log(participantsPoints)

			addingWinnersProcess:
			for (var i=0; i<6; i++) {
				for (var key in participantsInfo) {
					if (participantsPoints[i]==participantsInfo[key]) {
						participantsWinnersNames.push(key);
						delete participantsInfo[key];
						if (participantsWinnersNames.length==6) {
							break addingWinnersProcess;
						}
					}
				}
			}

			console.log(participantsWinnersNames)

			for (var i=0; i<$winnersList.children(0).eq(0).children().length-1; i++) {
				$winnersList.children().eq(0).children().eq(i).html(participantsWinnersNames[i]+'. Пара набрала: '+participantsPoints[i]+' балов')
			}

			$winnersList.css("display", "block")

			$('#the_final_6_close').click(function () {
				$winnersList.css("display", "none")
			})
		})
	});


	// add participats for reg crew


		$('.part').nextAll('.part').hide();
    window.a=1;
	$('#add_part').on('click',function(){
		$('.part'+window.a).slideDown(400);
		var dist= $(this).offset().top;
		$('body,html').animate({scrollTop: dist}, 300);
    window.a++;
	});
  $('a.remove-part').click(function(){
    $(this).parents('.part').slideUp(300);
  });
// DATAPICKER
	$.datepicker.setDefaults( $.datepicker.regional[ "" ] );
	$.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
	$( function() {
		$( "#event_begin").datepicker();
		$( "#event_end").datepicker();
	});
    // button on page: organization for create eveny, reg club, dance 
    
    $('.button-list').each(function(){
        $(this).on('click', function(){
            $('.search-wrapp').hide(300);
            $('.list-information').slideUp(400);
            $(this).parent('.button-org-add').nextAll('.search-wrapp').show(400);
            $('.button-list').removeClass('btn-list-focus');
            $(this).addClass('btn-list-focus');
        });
    });


    $('.btn-search').on('click', function(){
        $('.list-information').slideToggle(400);
    });
    $('.btn-plus').on('click', function(){
        $('.btn-plus').removeClass('btn-plus-focus');
        $(this).addClass('btn-plus-focus');
    });






});
