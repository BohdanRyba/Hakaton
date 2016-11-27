jQuery(function($) {

    var $body=$('body'),
        $danceGroupInfoWrapper=$('#dance-group-info-wrapper');



    $body.on('click', '#menu-dance-programs', function (e) {e.preventDefault();});
    $body.on('click', '#menu-age-categories', function (e) {e.preventDefault();});
    $body.on('click', '#menu-nominations', function (e) {e.preventDefault();});
    $body.on('click', '#menu-leagues', function (e) {e.preventDefault();});

    //!!!!!!!!!!!!!!!!!!!!!!!<main_menu>!!!!!!!!!!!!!!!!!!!!!
    $body.on('click', '.dance-group-menu-items', function () {
        var $menuItem=$(this).find('a'),
            $menu=$(this).parents('.dance-group-menu'),
            $parametersList=$('#dance-group-parameters-list'),
            $categoriesList=$('#categories-list'),
            $chooseCategoriesParameterUl=$('#pick-dancing-group-parameter'),
            $searchedCategoriesForm=$('#show-searched-dancing-groups');

        function clearOldInfo() {
            $chooseCategoriesParameterUl.children().remove();
            $searchedCategoriesForm.children().remove();
        }


        if ($menuItem.hasClass('active')) { // ЯКЩО КЛІКАЄМО ПО ПУНКТУ МЕНЮ, ЯКИЙ ВЖЕ Є АКТИВНИМ

            $menuItem.removeClass('active');
            $parametersList.slideUp(200);
            $categoriesList.slideUp(200);

            clearOldInfo();

        } else { // ЯКЩО КЛІКАЄМО ПО ПУНКТУ МЕНЮ, ЯКИЙ ЩЕ НЕ Є АКТИВНИМ

            $menu.find('.dance-group-menu-items').each(function () {
                $(this).find('a').removeClass('active');
            });

            $menuItem.addClass('active');

            clearOldInfo();

            $categoriesList.css('display', 'none');

            function ajax_addNewParameters($menuItem) {

                var $parameterSearchedFor=$menuItem.attr('id'); //TO REWORK!!!!!!!!!!!!!!!!!!!!!!!!!

                $.ajax({
                    type:"POST",
                    url:'ajax_settingUpDancingCategory',
                    data: $parameterSearchedFor, //TO REWORK!!!!!!!!!!!!!!!!!!!!!!!!!!!
                    success: function(msg) {
                        var $chooseCategoriesParameterUl=$('#pick-dancing-group-parameter');

                        //для кожного елементу отриманного масиву виконати наступну дію МОЖЛИВО ПОТРІБНО ДОДАТИ АЙДІШКУ ДЛЯ КОЖНОГО ПАРАМЕТРА
                        $chooseCategoriesParameterUl.append('<li class="dancing-group-list-item"><span class="numeration"></span>'+HERE_MUST_BE_PARAMETER_NAME+'</li>')
                    },
                    error: function (msg) {
                    console.log(msg);
                }
            })}

            if ($parametersList.css('display')=='block') { // ЯКЩО КЛІКАЄМО ПО ПУНКТУ МЕНЮ І ВЖЕ Є АКТИВНИМ ОДИН ПУНКТ

                ajax_addNewParameters($menuItem);
                $chooseCategoriesParameterUl.append('<li class="dancing-group-list-item"><span class="numeration"></span>'+'HERE_MUST_BE_PARAMETER_NAME'+'</li>');

            } else { //ЯКЩО АКТИВНИХ ПУНКТІВ НЕМАЄ
                ajax_addNewParameters($menuItem);
                $chooseCategoriesParameterUl.append('<li class="dancing-group-list-item"><span class="numeration"></span>'+'HERE_MUST_BE_PARAMETER_NAME'+'</li>');
                $chooseCategoriesParameterUl.append('<li class="dancing-group-list-item"><span class="numeration"></span>'+'HERE_MUST_BE_PARAMETER_NAME'+'</li>');
                $parametersList.slideDown(200);
            }
        }
    });
    //!!!!!!!!!!!!!!!!!!!!!!!</main_menu>!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    //!!!!!!!!!!!!!!!
    $body.on('click', '.dancing-group-list-item', function(){
        var $categoriesList=$('#categories-list'),
            $danceGroups=$('#pick-dancing-group-parameter').children(),
            $searchedCategoriesForm=$('#show-searched-dancing-groups');

        $danceGroups.each(function () {
            $(this).removeClass('picked-dancing-group');
        });

        $(this).addClass('picked-dancing-group');

        $categoriesList.css('display', 'block');

        $searchedCategoriesForm.children().remove();

        // $categoriesList.off('newCategoriesAdded'); ???????????????????????????????? не знаю чи потрібно

        // function AJAX_THAT_ADDS_CATEGORIES_ACCORDING_TO_PARAMETER!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $searchedCategoriesForm.append('<div class="dp-info-wrapper"><div class="btn-group-sm flat" role="group"> <button type="button" class="btn btn-success edit-button edit-categories-info btn-flat"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger delete-button delete-categories-info btn-flat"><i class="fa fa-trash"></i></button> </div><p class="dance-category-name">Название танц категории</p> <label>Код:<input disabled disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label> </div><div class="dp-info-wrapper"><div class="btn-group-sm flat" role="group"> <button type="button" class="btn btn-success edit-button edit-categories-info btn-flat"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger delete-button delete-categories-info btn-flat"><i class="fa fa-trash"></i></button> </div><p class="dance-category-name">Название танц категории</p> <label>Код:<input disabled disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label> </div><div class="dp-info-wrapper"><div class="btn-group-sm flat" role="group"> <button type="button" class="btn btn-success edit-button edit-categories-info btn-flat"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger delete-button delete-categories-info btn-flat"><i class="fa fa-trash"></i></button> </div><p class="dance-category-name">Название танц категории</p> <label>Код:<input disabled disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label> </div>')

        $categoriesList.trigger('newCategoriesAdded');
    });

    $body.on('click', '.edit-categories-info', function () {
       var $editBtn=$(this),
           $wrapper=$('#dance-group-info-wrapper'),
           $categoryCode=$editBtn.parents('.dp-info-wrapper').find('.dancing-group-info-code');

        $editBtn.toggleClass('active');

        if ($editBtn.hasClass('active')) {
            $categoryCode.prop('disabled',false).trigger('focus');
        } else {
            $categoryCode.prop('disabled',true);
        }
    });

    // ВИДАЛЕННЯ КАТЕГОРІЇ, ЯКУ ШУКАЛИ
    $body.on('click', '.delete-categories-info', function () {
        var $wrapper=$(this).parents('.dp-info-wrapper');
        $wrapper.remove();
    });

    // ЗБЕРЕГТИ РЕДАГОВАНИЙ СПИСОК КАТЕГОРІЙ, ЗНАЙДЕНИХ ПО ПЕВНОМУ ПАРАМЕТРУ
    $body.on('click', '#update-dancing-categories-info', function (e) {
        e.preventDefault();
        function AJAX_FUNCTION_FOR_UPDATING_CATEGORIES_INFO() { //!!!!!!!!!!!!!!!!!!TO REWORK

        }
        // $searchedCategoriesForm.children().each(function () {
        //     $(this).
        // })
    });

    $('#categories-list').on('newCategoriesAdded', function () {
        var $categoryCode=$('.dancing-group-info-code');

        $categoryCode.on('blur', function(){
            var $editBtn=$(this).parents('.dp-info-wrapper').find('.edit-categories-info');
            $editBtn.removeClass('active');

            $(this).prop('disabled',true);
        });
    });

    $body.on('click', '.pick-dance-program-for-category', function () {
        var $li=$(this),
            $ul=$li.parent();
        $ul.find('.pick-dance-program-for-category').each(function () {
           $(this).removeAttr('data-checked');
        });
        $li.attr('data-checked','checked');
        $ul.find('.pick-dance-program-for-category').not('[data-checked="checked"]').each(function () {
            $(this).find('[type="checkbox"]').prop('checked',false);
        });
    });

    $body.on('click', '.pick-age-category-for-category', function () {
        var $li=$(this),
            $ul=$li.parent();
        $ul.find('.pick-age-category-for-category').each(function () {
            $(this).removeAttr('data-checked');
        });
        $li.attr('data-checked','checked');
        $ul.find('.pick-age-category-for-category').not('[data-checked="checked"]').each(function () {
            $(this).find('[type="checkbox"]').prop('checked',false);
        });
    });

    $body.on('click', '.pick-nominations-for-category', function () {
        var $li=$(this),
            $ul=$li.parent();
        $ul.find('.pick-nominations-for-category').each(function () {
            $(this).removeAttr('data-checked');
        });
        $li.attr('data-checked','checked');
        $ul.find('.pick-nominations-for-category').not('[data-checked="checked"]').each(function () {
            $(this).find('[type="checkbox"]').prop('checked',false);
        });
    });

    //Check all leagues
    $body.on('click', '#create-dance-categories', function () {
       $('#pick-leagues').trigger('controlClick')
    });

    $('#pick-leagues').on('controlClick', function () {
        var $checkAllLi=$('.check-all-leagues'),
            $checkAll=$checkAllLi.find('input'),
            $li=$('.pick-leagues-for-categories');

        $checkAllLi.on('click', function () {
            if ($checkAll.prop('checked')==true) {
                $li.each(function () {
                    $(this).find('[type="checkbox"]').prop('checked', true);
                })
            } else {
                $li.each(function () {
                    $(this).find('[type="checkbox"]').prop('checked', false);
                })
            }
        });
    });
    //Check all leagues END!!!!!!!

    $body.on('click', '#btn-create-dance-categories', function (e) {
        e.preventDefault();
        var danceProgram=[],
            ageCategory=[],
            nomination=[],
            leagues=[],
            $dancePrograms=$('#pick-dance-programs'),
            $ageCategories=$('#pick-age-categories'),
            $nominations=$('#pick-nominations'),
            $leagues=$('#pick-leagues');

        danceProgram.push($dancePrograms.find('li[data-checked="checked"] input').attr('name'));
        ageCategory.push($ageCategories.find('li[data-checked="checked"] input').attr('name'));
        nomination.push($nominations.find('li[data-checked="checked"] input').attr('name'));

        $leagues.find('.pick-leagues-for-categories').each(function () {
           var $input=$(this).find('[type="checkbox"]'),
               $status=$input.prop('checked');

            if ($status==true) {
                leagues.push($input.attr('name'));
            }
        });


        console.log(danceProgram, ageCategory, nomination, leagues);

    });














    // $('#categories-list').on('newCategoriesAdded', function () {
    //     var $wrapper=$('#dance-group-info-wrapper'),
    //         $categoryCode=$('.dancing-group-info-code'),
    //         $editBtn=$('.edit-categories-info');
    //
    //     console.log('newCategoriesAdded');
    //
    //     $categoryCode.on('focus', function () {
    //         console.log('focus');
    //     });
    //
    //     $categoryCode.on('blur', function () {
    //         console.log('left');
    //         $wrapper.trigger('left');
    //         $editBtn.removeClass('active');
    //         $categoryCode.prop('disabled',true);
    //     });
    //
    // });
    // $danceGroupInfoWrapper.on('entered', function () {console.log('entered')});
    // $danceGroupInfoWrapper.on('left', function () {console.log('left')});


});































