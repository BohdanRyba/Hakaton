$(function () {
	var numberArray = [],
		emailRegular = /^[A-Za-z0-9]\.?([`\w-]\.?)+@[a-z]+(\.[a-z]+)+$/g,
		$userName = $('[name="user_name"]'),
		$userPhone = $('[name="user_phone"]'),
		$userCountry = $('[name="user_country"]'),
		$userEmail = $('[name="user_email"]'),
		$userPassword1 = $('[name="password_1"]'),
		$userPassword2 = $('[name="password_2"]'),
		$registrationSubmit = $('[name="registration_submit"]');
	for (var i = 0; i < 10; i++) {
		numberArray[i] = i;
	}

	$userName.keypress(function (e) {
		if (e.key.search(/[`'A-zА-я\sіїЇІёЁ-]/g) == -1) {
			return false;
		}
	});
	$userPhone.keypress(function (e) {
		if (e.key.search(/[\s()0-9+-]/g) == -1) {
			return false;
		}
	});
	$userCountry.keypress(function (e) {
		if (e.key.search(/[`'A-zА-я\sіїЇІёЁ]/g) == -1) {
			return false;
		}
	});
	$userEmail.blur(function () {
		if ($userEmail[0].value.search(emailRegular) == -1) {
			$userEmail.addClass('registration_form_error');
		}
		else {
			$userEmail.removeClass('registration_form_error');
		}
	});
	$userPassword2.blur(function () {
		if ($userPassword1[0].value != $userPassword2[0].value) {
			$userPassword1.addClass('registration_form_error');
			$userPassword2.addClass('registration_form_error');
		}
		else {
			$userPassword1.removeClass('registration_form_error');
			$userPassword2.removeClass('registration_form_error');
		}
	});

	//function2
	$('.nav li').hover(function () {
		$(this).css('background', 'rgba(0,0,0,0.1)')
		$(this).css('transition', 'background 0.6s');
	}, function () {
		$(this).css('background', '#3c8dbc');
		$(this).css('transition', 'background 0.6s');
	});

	$('.log_animate').click(function () {
		$('.form_log').show(1000);
		$('#overlay_log').show(400);
	});
	$('#overlay_log').click(function () {
		$(this).hide(400);
		$('.form_log').hide(400);
	})

	$('.connect').click(function () {
		$('#overlay_log').show(600);
		$('.us_info').show(1000);

	});
	$('#overlay_log').click(function () {
		$(this).hide(400);
		$('.us_info').hide(400);
	});
	$('.btn-default').click(function () {
		$('#overlay_log').hide(400);
		$('.form_log').hide(400);
	});
	$('body').on('click', '.click-remove', function () {
		$('.click-remove').parents('.resize-remove').remove();
	});

	// add participats for reg crew

	$('.part').nextAll('.part').hide();
	window.a = 1;
	$('#add_part').on('click', function () {
		$('.part' + window.a).slideDown(400);
		var dist = $(this).offset().top;
		$('body,html').animate({scrollTop: dist}, 500);
		window.a++;
	});
	$('a.remove-part').click(function () {
		$(this).parents('.part').slideUp(300);
	});
// DATAPICKER
	//$.datepicker.setDefaults($.datepicker.regional[""]);
	// $.datepicker.setDefaults($.datepicker.regional["ru"]);
	// $(function () {
	// 	$("#event_begin").datepicker();
	// 	$("#event_end").datepicker();
	// });
	// button on page: organization for create event, reg club, dance

	$('.button-list').each(function () {
		$(this).on('click', function () {
			$(this).children('.list-information').slideUp(400);
			$(this).parent('.button-org-add').nextAll('.search-wrapp').toggle(400);
			$('.button-list').removeClass('btn-list-focus');
			$(this).addClass('btn-list-focus');
		});
	});
	$('.btn-search').on('click', function () {
		$(this).parents('.list-search-button').nextAll('.list-information').slideToggle(400);
	});

	$('.btn-plus').on('click', function () {
		$('.btn-plus').removeClass('btn-plus-focus');
		$(this).addClass('btn-plus-focus');
	});

//MENU-EVENT
	$('.tabs').each(function () {
		$(this).children().filter(':first').addClass('active');
	});
	$('.info_event').each(function () {
		$(this).children().not(':first').hide();
	});

	$('.tabs a').click(function () {
		$(this).parents('.tabs').find('li').removeClass('active');
		$(this).parents('li').addClass('active');
		var target = $(this).attr('href');
		$(this).parents('.tabs').find('a').each(function () {
			$($(this).attr('href')).hide();
		});
		$(target).show();
		return false;
	});
	$('.info_event').each(function () {
		$(this).children().children('div').css('padding-top','50px');
	});
});