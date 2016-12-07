jQuery(function($) {


    //=========================================================================
    var $body=$('body'),
        $optionalDancingGroup=$('.pick-dancing-group-to-use'),
        $totalWrapperForInfo=$('#total-wrapper-for-info');

    $body.off('click', '.pick-dancing-group-to-use');
    $body.on('click', '.pick-dancing-group-to-use', function () {
        var  $chooseCategoriesParameterUl=$('#pick-dancing-group-parameter-to-see'),
             $searchedCategoriesForm=$('#show-searched-dancing-groups'),
             $danceGroupParametersList=$('#dance-group-parameters-list'),
             $categoriesList=$('#categories-list'),
             $checkedItem=$(this);

        $('#total-wrapper-for-info').slideDown(200);

        $checkedItem.parent().children().each(function () {
            $(this).removeClass('picked-dancing-group-to-use');
        });
        $checkedItem.addClass('picked-dancing-group-to-use');

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

                    function addNewInfo(ul, list, parameter, liClass) {
                        var required=list[parameter];
                        for (var i=0; i<required.length; i++) {
                            var name=required[i]['name'];
                            ul.append('<li class="'+liClass+'"><label><input type="checkbox" name="'+name+'">'+name+'</label></li>');
                        }
                    }

                    clearOldInfo($pickDancePrograms);
                    clearOldInfo($pickAgeCategories);
                    clearOldInfo($pickNominations);
                    clearOldInfo($pickLeagues);

                    $pickLeagues.append('<li class="check-all-leagues"><label><input type="checkbox">выбрать всё</label></li>');


                    addNewInfo($pickDancePrograms, checked, 'c_p_programs', 'pick-dance-program-for-category');
                    addNewInfo($pickAgeCategories, checked, 'c_p_age_categories', 'pick-age-category-for-category');
                    addNewInfo($pickNominations, checked, 'c_p_nominations', 'pick-nominations-for-category');
                    addNewInfo($pickLeagues, checked, 'c_p_leagues', 'pick-leagues-for-categories');

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
    $body.off('click', '.dance-group-menu-items');
    $body.on('click', '.dance-group-menu-items', function () {
        var $menuItem=$(this).find('a'),
            $menu=$(this).parents('.dance-group-menu'),
            $parametersList=$('#dance-group-parameters-list'),
            $categoriesList=$('#categories-list'),
            $chooseCategoriesParameterUl=$('#pick-dancing-group-parameter-to-see'),
            $searchedCategoriesForm=$('#show-searched-dancing-groups');

        function clearOldInfo() {
            $chooseCategoriesParameterUl.children().remove();
            $searchedCategoriesForm.children().remove();
        }


        if ($menuItem.hasClass('active')) { // ЯКЩО КЛІКАЄМО ПО ПУНКТУ МЕНЮ, ЯКИЙ ВЖЕ Є АКТИВНИМ

            $menuItem.removeClass('active');
            $parametersList.slideUp(200);
            $categoriesList.slideUp(200);
            console.log('up');

            clearOldInfo();

        } else { // ЯКЩО КЛІКАЄМО ПО ПУНКТУ МЕНЮ, ЯКИЙ ЩЕ НЕ Є АКТИВНИМ
            $parametersList.slideUp(200);
            $categoriesList.slideUp(200);

            $menu.find('.dance-group-menu-items').each(function () {
                $(this).find('a').removeClass('active');
            });

            $menuItem.addClass('active');

            clearOldInfo();

            // $categoriesList.css('display', 'none');
            //AJAX 1
            function ajax_addNewParameters() {
                var $menuParameter=$('.dance-group-menu').find('.dance-group-menu-items').find('a.active'),
                    searchedParameter;

                if ($menuParameter.attr('href')=='#dance-programs') {searchedParameter='c_p_programs';} else
                if ($menuParameter.attr('href')=='#age-categories') {searchedParameter='c_p_age_categories';} else
                if ($menuParameter.attr('href')=='#nominations') {searchedParameter='c_p_nominations';} else
                if ($menuParameter.attr('href')=='#leagues') {searchedParameter='c_p_leagues';}

                $.ajax({
                    type: "POST",
                    url: 'ajax_showAllDanceCategoriesParameters',
                    data: 'parameter=' + searchedParameter,
                    success: function (msg) {
                        var msg = JSON.parse(msg);


                        console.log(msg);
                        function addInfo($chooseCategoriesParameterUl) {

                            for (var i = 0; i<msg.length; i++) {
                                for (var j=0; j<msg[i].length; j++) {
                                    var name = msg[i][j]['name'];
                                    //для кожного елементу отриманного масиву виконати наступну дію МОЖЛИВО ПОТРІБНО ДОДАТИ АЙДІШКУ ДЛЯ КОЖНОГО ПАРАМЕТРА
                                    $chooseCategoriesParameterUl.append('<li class="dancing-group-list-item-to-see" data-name="'+name+'"><span class="numeration"></span>' + name + '</li>')
                                }

                            }
                        }

                            addInfo($chooseCategoriesParameterUl);

                        $parametersList.slideDown(200);

                    },
                    error: function (msg) {
                        console.log(msg);
                    }
                })
            }

            ajax_addNewParameters();

            //$chooseCategoriesParameterUl.append('<li class="dancing-group-list-item"><span class="numeration"></span>'+'HERE_MUST_BE_PARAMETER_NAME'+'</li>');

            //     if ($parametersList.css('display')=='block') { // ЯКЩО КЛІКАЄМО ПО ПУНКТУ МЕНЮ І ВЖЕ Є АКТИВНИМ ОДИН ПУНКТ
            //
            //         //ajax_addNewParameters($menuItem);
            //         //$chooseCategoriesParameterUl.append('<li class="dancing-group-list-item"><span class="numeration"></span>'+'HERE_MUST_BE_PARAMETER_NAME'+'</li>');
            //
            //     } else { //ЯКЩО АКТИВНИХ ПУНКТІВ НЕМАЄ
            //         // ajax_addNewParameters($menuItem);
            //         // $chooseCategoriesParameterUl.append('<li class="dancing-group-list-item"><span class="numeration"></span>'+'HERE_MUST_BE_PARAMETER_NAME'+'</li>');
            //         // $chooseCategoriesParameterUl.append('<li class="dancing-group-list-item"><span class="numeration"></span>'+'HERE_MUST_BE_PARAMETER_NAME'+'</li>');
            //         $parametersList.slideDown(200);
            //     }
            // }
        }});
    //!!!!!!!!!!!!!!!!!!!!!!!</main_menu>!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    //!!!!!!!!!!!!!!!
    $body.off('click', '.dancing-group-list-item-to-see');
    $body.on('click', '.dancing-group-list-item-to-see', function(){
        var $categoriesList=$('#categories-list'),
            $danceGroups=$('#pick-dancing-group-parameter-to-see').children(),
            $searchedCategoriesForm=$('#show-searched-dancing-groups');

        $danceGroups.each(function () {
            $(this).removeClass('picked-dancing-group');
        });

        $(this).addClass('picked-dancing-group');

        $categoriesList.css('display', 'block');

        $searchedCategoriesForm.children().remove();

        // $categoriesList.off('newCategoriesAdded'); ???????????????????????????????? не знаю чи потрібно

        //AJAX 2 function AJAX_THAT_ADDS_CATEGORIES_ACCORDING_TO_PARAMETER!!!!!!!!!!!!!!!!!!!!!!!!!!!
        
        function ajax_THAT_ADDS_CATEGORIES_ACCORDING_TO_PARAMETER($parameter) {
            var $name=$parameter.attr('data-name'),
                $menuParameter=$('.dance-group-menu').find('.dance-group-menu-items').find('a.active'),
                searchedParameter,
                obj={};

            if ($menuParameter.attr('href')=='#dance-programs') {searchedParameter='c_p_programs';} else
            if ($menuParameter.attr('href')=='#age-categories') {searchedParameter='c_p_age_categories';} else
            if ($menuParameter.attr('href')=='#nominations') {searchedParameter='c_p_nominations';} else
            if ($menuParameter.attr('href')=='#leagues') {searchedParameter='c_p_leagues';}

            obj['name']=$name;
            obj['parameter']=searchedParameter;

            $.ajax({
                type:"POST",
                url:'ajax_showCategoriesAccordingToParameter',
                data: obj,
                success: function(msg) {
                    var msg=JSON.parse(msg);
                    console.log(msg);
                    $searchedCategoriesForm.append('<div class="dp-info-wrapper"><div class="btn-group-sm flat" role="group"><button type="button" class="btn btn-success edit-button edit-categories-info btn-flat"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger delete-button delete-categories-info btn-flat"><i class="fa fa-trash"></i></button> </div><p class="dance-category-name">'+NAME+'</p> <label>Код:<input disabled disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code" value="'+CODE+'"></label></div>');


                },
                error: function (msg) {
                    console.log(msg);
                }
            })

        }

        ajax_THAT_ADDS_CATEGORIES_ACCORDING_TO_PARAMETER($(this));

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
        function ajax_FUNCTION_FOR_UPDATING_CATEGORIES_INFO() {

            $.ajax({
                type:"POST",
                url:'ajax_settingUpDancingCategory',
                data: 'id='+$id,
                success: function(msg) {
                    var msg=JSON.parse(msg);
                    console.log(msg);



                },
                error: function (msg) {
                    console.log(msg);
                }
            })
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

        var $inputStatus=$(this).find('input').prop('checked');
        if ($inputStatus==false) {
            $(this).removeAttr('data-checked');
        } else {
            $(this).attr('data-checked','checked');
        }
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

        var $inputStatus=$(this).find('input').prop('checked');
        if ($inputStatus==false) {
            $(this).removeAttr('data-checked');
        } else {
            $(this).attr('data-checked','checked');
        }
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

        var $inputStatus=$(this).find('input').prop('checked');
        if ($inputStatus==false) {
            $(this).removeAttr('data-checked');
        } else {
            $(this).attr('data-checked','checked');
        }
    });

     $body.on('click', '.pick-leagues-for-categories', function () {
        var $inputStatus=$(this).find('input').prop('checked');
        if ($inputStatus==false) {
            $(this).removeAttr('data-checked');
        } else {
            $(this).attr('data-checked','checked');
        }
    });

    //Check all leagues
    $body.on('click', '#create-dance-categories', function () {
       $('#pick-leagues').trigger('controlClick');
    });

    $('#pick-leagues').on('controlClick', function () {
        var $checkAllLi=$('.check-all-leagues'),
            $checkAll=$checkAllLi.find('input'),
            $li=$('.pick-leagues-for-categories');

        $checkAllLi.on('click', function () {
            if ($checkAll.prop('checked')==true) {
                $li.each(function () {
                    $(this).find('[type="checkbox"]').prop('checked', true);
                    $(this).attr('data-checked', 'checked');
                })
            } else {
                $li.each(function () {
                    $(this).find('[type="checkbox"]').prop('checked', false);
                    $(this).removeAttr('data-checked');
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

        if (danceProgram[0]!=undefined&&ageCategory[0]!=undefined&&nomination[0]!=undefined&&(leagues.length>0)) {
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
            $('.pick-dance-program-for-category').each(function(){
                $(this).removeAttr('data-checked');
            });
            $('.pick-age-category-for-category').each(function(){
                $(this).removeAttr('data-checked');
            });
            $('.pick-nominations-for-category').each(function(){
                $(this).removeAttr('data-checked');
            });
            $('.pick-leagues-for-categories').each(function(){
                $(this).removeAttr('data-checked');
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
                category.push($('#pick-dancing-group-to-use-wrapper').find('.picked-dancing-group-to-use').attr('data-id-dancing-group'));

                allCategories.push(category);
            });

            //allCategories=JSON.stringify(allCategories);

            allCategories={'categories':allCategories};

            console.log(allCategories);

            $.ajax({
                type:"POST",
                url:'ajax_sendCreatedCategories',
                data: allCategories,
                success: function(allCategories) {
                    console.log(allCategories);
                    alert('Категории добавлены');
                    $('#show-created-categories').empty();
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        }

        ajax_sendCreatedCategories();

    });

});
