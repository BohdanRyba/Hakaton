jQuery(function($) {

    var $body=$('body'),
        $optionalDancingGroup=$('.pick-dancing-group-to-use'),
        $totalWrapperForInfo=$('#total-wrapper-for-info');

    $optionalDancingGroup.on('click', function () {
        var  $chooseCategoriesParameterUl=$('#pick-dancing-group-parameter'),
             $searchedCategoriesForm=$('#show-searched-dancing-groups'),
             $danceGroupParametersList=$('#dance-group-parameters-list'),
             $categoriesList=$('#categories-list'),
             $checkedItem=$(this);

        $totalWrapperForInfo.css('display', 'block');

        $checkedItem.parent().children().each(function () {
            $(this).removeClass('picked-dancing-group-to-use');
        });
        $checkedItem.addClass('picked-dancing-group-to-use');

        $danceGroupParametersList.css('display', 'none');
        $categoriesList.css('display', 'none');

        function clearOldInfo() {
            $chooseCategoriesParameterUl.children().remove();
            $searchedCategoriesForm.children().remove();
        }
        clearOldInfo();

        $('.dance-group-menu-items').each(function() {
            $(this).find('a').removeClass('active');
        });

        function ajax_LoadRequiredDancingGroupParameters($checkedItem) {
            var id=$checkedItem.attr('data-id-dancing-group');
            $.ajax({
                type:"POST",
                url:'ajax_settingUpDancingCategory',
                data: 'id='+id,
                success: function(msg){
                    console.log(msg);
                    var msg=JSON.parse(msg),
                        checked=msg['category_parameters'],
                        parameters=msg['dance_group'],
                        programs=parameters['d_program'],
                        ageCategories=parameters['d_age_category'],
                        nominations=parameters['d_nomination'],
                        leagues=parameters['d_league'],
                        programsList=[],
                        ageCategoriesList=[],
                        nominationsList=[],
                        leaguesList=[],
                        $pickDancePrograms=$('#pick-dance-programs').find('ul'),
                        $pickAgeCategories=$('#pick-age-categories').find('ul'),
                        $pickNominations=$('#pick-nominations').find('ul'),
                        $pickLeagues=$('#pick-leagues').find('ul');

                    for (var key in programs) {programsList.push(key);}
                    for (var key in ageCategories) {ageCategoriesList.push(key);}
                    for (var key in nominations) {nominationsList.push(key);}
                    for (var key in leagues) {leaguesList.push(key);}

                    function clearOldInfo(ul) {
                        for (var i=ul.children().length-1; i>0; i--) {
                            ul.children().eq(i).remove();
                        }
                    }

                    function addNewInfo(ul, list) {
                        for (var i=0; i<list.length; i++) {
                            ul.append('<li><label><input type="checkbox" name="'+list[i]+'">'+list[i]+'</label></li>');
                        }
                    }

                    clearOldInfo($pickDancePrograms);
                    clearOldInfo($pickAgeCategories);
                    clearOldInfo($pickNominations);
                    clearOldInfo($pickLeagues);

                    addNewInfo($pickDancePrograms, programsList);
                    addNewInfo($pickAgeCategories, ageCategoriesList);
                    addNewInfo($pickNominations, nominationsList);
                    addNewInfo($pickLeagues, leaguesList);



                    var checkedAgeCategories=checked['c_p_age_categories'],
                        checkedLeagues=checked['c_p_leagues'],
                        checkedNominations=checked['c_p_nominations'],
                        checkedPrograms=checked['c_p_programs'];

                    for (let i=0; i<checkedAgeCategories.length; i++) {
                        let name=checkedAgeCategories[i]['name'];
                        $pickAgeCategories.find('[name="'+name+'"]').prop('checked', true);
                    }



                    for (let i=0; i<checkedLeagues.length; i++) {
                        let name=checkedLeagues[i]['name'];
                        $pickLeagues.find('[name="'+name+'"]').prop('checked', true);
                    }

                    for (let i=0; i<checkedNominations.length; i++) {
                        let name=checkedNominations[i]['name'];
                        $pickNominations.find('[name="'+name+'"]').prop('checked', true);
                    }

                    for (let i=0; i<checkedPrograms.length; i++) {
                        let name=checkedPrograms[i]['name'].toString();
                        $pickDancePrograms.find('[name="'+name+'"]').prop('checked', true);
                    }
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        }

        ajax_LoadRequiredDancingGroupParameters($checkedItem);
    });

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
            //AJAX 1
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

        //AJAX 2 function AJAX_THAT_ADDS_CATEGORIES_ACCORDING_TO_PARAMETER!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $searchedCategoriesForm.append('<div class="dp-info-wrapper"><div class="btn-group-sm flat" role="group"> <button type="button" class="btn btn-success edit-button edit-categories-info btn-flat"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger delete-button delete-categories-info btn-flat"><i class="fa fa-trash"></i></button> </div><p class="dance-category-name">Название танц категории</p> <label>Код:<input disabled disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label> </div><div class="dp-info-wrapper"><div class="btn-group-sm flat" role="group"> <button type="button" class="btn btn-success edit-button edit-categories-info btn-flat"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger delete-button delete-categories-info btn-flat"><i class="fa fa-trash"></i></button> </div><p class="dance-category-name">Название танц категории</p> <label>Код:<input disabled disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label> </div><div class="dp-info-wrapper"><div class="btn-group-sm flat" role="group"> <button type="button" class="btn btn-success edit-button edit-categories-info btn-flat"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger delete-button delete-categories-info btn-flat"><i class="fa fa-trash"></i></button> </div><p class="dance-category-name">Название танц категории</p> <label>Код:<input disabled disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code"></label> </div>')

        $categoriesList.trigger('newCategoriesAdded');
    });

    // РЕДАГУВАННЯ КАТЕГОРІЇ, ЯКУ ШУКАЛИ
    $body.on('click', '.edit-categories-info', function () {
       var $editBtn=$(this),
           $categoryCode=$editBtn.parents('.dp-info-wrapper').find('.dancing-group-info-code');

        $categoryCode.prop('disabled',false).trigger('focus');
    });

    // ВИДАЛЕННЯ КАТЕГОРІЇ, ЯКУ ШУКАЛИ
    $body.on('click', '.delete-categories-info', function () {
        var $wrapper=$(this).parents('.dp-info-wrapper');
        $wrapper.remove();
    });

    // ЗБЕРЕГТИ РЕДАГОВАНИЙ СПИСОК КАТЕГОРІЙ, ЗНАЙДЕНИХ ПО ПЕВНОМУ ПАРАМЕТРУ
    $body.on('click', '#update-dancing-categories-info', function (e) {
        e.preventDefault();
        //AJAX 3
        function AJAX_FUNCTION_FOR_UPDATING_CATEGORIES_INFO() { //!!!!!!!!!!!!!!!!!!TO REWORK

        }
        // $searchedCategoriesForm.children().each(function () {
        //     $(this).
        // })
    });

    $('#categories-list').on('newCategoriesAdded', function () {
        var $categoryCode=$('.dancing-group-info-code');

        $categoryCode.on('blur', function(){
            $categoryCode.prop('disabled',true);
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


    //Показ створених категорій і додавання їх в форму по відображенню
    $body.on('click', '#btn-create-dance-categories', function (e) {
        e.preventDefault();
        var danceProgram=[],
            ageCategory=[],
            nomination=[],
            leagues=[],
            $dancePrograms=$('#pick-dance-programs'),
            $ageCategories=$('#pick-age-categories'),
            $nominations=$('#pick-nominations'),
            $leagues=$('#pick-leagues'),
            $showBlock=$('#show-created-categories');

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

        if (danceProgram[0]!='undefined'&&ageCategory[0]!='undefined'&&nomination[0]!='undefined'&&leagues.length>0) {
            for (var i=0; i<leagues.length; i++) {
                var categoryNameForServer=[];

                categoryNameForServer.push(danceProgram[0]);
                categoryNameForServer.push(ageCategory[0]);
                categoryNameForServer.push(nomination[0]);
                categoryNameForServer.push(leagues[i]);

                categoryNameForServer=categoryNameForServer.toString();

                $showBlock.append('<div class="dp-info-wrapper"><div class="btn-group-sm flat" role="group"><button type="button" class="btn btn-success edit-created-category-info edit-button btn-flat"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger delete-created-categories-info delete-button btn-flat"><i class="fa fa-trash"></i></button></div><p class="dance-category-name text-bold">'+danceProgram[0]+'  '+ ageCategory[0] +'  '+ nomination[0] +'  '+ leagues[i]+'</p><label>Код:<input disabled type="text" name="dancing-group-info-code" class="input-standard dancing-group-info-code"></label><input type="hidden" class="category-name-for-sending-to-server" value="'+categoryNameForServer+'"></div>');
            }

            $('#show-created-dance-categories').trigger('newCategoriesAdded');
            $('#create-dance-categories').find('[type="checkbox"]').each(function () {
                $(this).prop('checked', false);
            });
        }
    });

    // РЕДАГУВАННЯ КАТЕГОРІЇ
    $body.on('click', '.edit-created-category-info', function () {
        var $editBtn=$(this),
            $categoryCode=$editBtn.parents('.dp-info-wrapper').find('.dancing-group-info-code');

        $categoryCode.prop('disabled',false).trigger('focus');
    });

    // ВИДАЛЕННЯ КАТЕГОРІЇ
    $body.on('click', '.delete-created-categories-info', function () {
        var $wrapper=$(this).parents('.dp-info-wrapper');
        $wrapper.remove();
    });

    $('#show-created-dance-categories').on('newCategoriesAdded', function () {
        var $categoryCode=$('.dancing-group-info-code');

        $categoryCode.on('blur', function(){
            $categoryCode.prop('disabled',true);
        });
    });

    //Збереження створених нових танцювальних категорій
    $('#save-dance-categories').on('click', function (e) {
        e.preventDefault();

        //AJAX 4
        function ajax_sendCreatedCategories() {
            var allCategories=[];

            $('#show-created-categories').children().each(function () {
                var category=[];

                category.push($(this).find('.category-name-for-sending-to-server').val());
                category.push($(this).find('.dancing-group-info-code').val());

                allCategories.push(category);
            });

            allCategories=JSON.stringify(allCategories);
            $.ajax({
                type:"POST",
                url:'ajax_settingUpDancingCategory',
                data: allCategories,
                success: function(allCategories) {
                    console.log(allCategories);
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        }

        ajax_sendCreatedCategories();

    });

});































