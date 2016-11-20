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
    });

    $('.connect').click(function () {
        $('#overlay_log').show(600);
        $('.us_info').show(1000);
    });
    $('#overlay_log').click(function () {
        $(this).hide(400);
        $('.us_info').hide(400);
    });
    $('.btn-default').click(function (e) {
        e.preventDefault();
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
    $('body').on('click', 'a.remove-part', function () {
        $(this).parents('.part').slideUp(300);
    });
// DATAPICKER
    /*$.datepicker.setDefaults( $.datepicker.regional[ "" ] );
     $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
     $( function() {
     $( "#event_begin").datepicker();
     $( "#event_end").datepicker();
     });*/
    // button on page: organization for create eveny, reg club, dance 


    $('.event_data_list').on('click', function () {
        $('.search_wrap').hide(400);
        $('.list_information').slideUp();
        $('.search_wrap_event').toggle(400);
        var typeSearch = $(this).attr('data-type');
    });
    $('.category_data_list').on('click', function () {
        $('.search_wrap').hide(400);
        $('.list_information').slideUp();
        $('.search_wrap_category').toggle(400);
        var typeSearch = $(this).attr('data-type');
    });
    $('.club_data_list').on('click', function () {
        $('.search_wrap').hide(400);
        $('.list_information').slideUp();
        $('.search_wrap_club').toggle(400);
        var typeSearch = $(this).attr('data-type');
    });

    // button add new trainer
    var incr_train = 0;
    $('body').on('click', '#add-trainer', function () {
        console.log('asd');
        incr_train++;

        let trainer_node = '<div class="form-group">'
            + '<label for="inputPassword3" class="col-sm-2 control-label">Тренер</label>'
            + '<div class="col-sm-10">'
            + '<input type="text" class="form-control" name="club_trener_' + incr_train + '" id="inputPassword3" placeholder="ФИО тренера">'
            + '</div>'
            + '</div>';

        $('.add_train_box').after(trainer_node);
    });
    $('.club_data_list').on('click', function () {
        $('.search_wrap').hide(400);
        $('.list_information').slideUp();
        $('.search_wrap_club').toggle(400);
        var typeSearch = $(this).attr('data-type');
    });

    // button add new trainer
    var incr_train = 0;
    $('body').on('сlick', '.add-trainer', function () {
        window.incr_train++;
        console.log('asd')
        let trainer_node = +'<div class="form-group">'
            + '<label for="inputPassword3" class="col-sm-2 control-label">Тренер №1</label>'
            + '<div class="col-sm-10">'
            + '<input type="text" class="form-control" name="club_trener_' + window.incr_train + '" id="inputPassword3" placeholder="Тренер №' + window.incr_train + '">'
            + '</div>'
            + '</div>';

        $('.add_train_box').append(trainer_node);

        window.summ = 0;
        $('tbody>').each(function (i) {
            $(this).children(':first').text(i + 1);
            var price = parseInt($(this).children().eq(1).text());
            window.summ = window.summ + price;
        });
        $('tfoot tr').children().eq(1).text('Сума: ' + window.summ + 'грн');
        $('thead tr').children().eq(1).text('Сума: ' + window.summ + 'грн');



        console.log($('.bg-opacity'));
        $('tbody>tr').each(function () {
            $(this).on('click', function () {
                $('.bg-opacity').show(200);
                $('.list_information').hide();
                $('.popup-control').show(200);
            });
        });
    });
});