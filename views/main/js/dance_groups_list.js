jQuery(function($) {

    var $menuItems = $('.dance-group-menu a'),
        $infoWrapper = $('#dance-group-info-wrapper'),
        $totalInfoWrapper=$('#total-dance-group-info-wrapper'),
        $addInfo=$('.add-info'),
        $showInfoBtn=$('.show-info-about-dance-group'),
        $editInfoBtn=$('.edit-info-about-dance-group'),
        $danceGroupNameInput=$('#dance-group-name'),
        $saveInfoBtns=$('.send-info'),
        //SHOW INFO BLOCKS
        $danceProgramBlock=$('#dance-programs'),
        $ageCategoriesBlock=$('#age-categories'),
        $nominationsBlock=$('#nominations'),
        $leaguesBlock=$('#leagues');

    //=====FUNCTIONS USED WHEN BTNS ARE ON CLICK==========================
    function clearOldInfo() {
        $danceProgramBlock.find('.see-info').children().eq(0).empty();
        $ageCategoriesBlock.find('.see-info').children().eq(0).empty();
        $nominationsBlock.find('.see-info').children().eq(0).empty();
        $leaguesBlock.find('.see-info').children().eq(0).empty();
        $danceGroupNameInput.val('');
    }

    function GetNewInfoAboutDancingGroup($danceGroupId) {

        // $danceProgramBlock.find('.see-info').children().eq(0).append('<div class="dp-info-wrapper">'+
        //     '<span class="text-bold count"></span>'+
        //     '<div class="btn-group-sm flat" role="group">'+
        //     '<button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>'+
        //     '<button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>'+
        //     '</div>'+
        //     '<label>Название:'+
        //     '<input disabled type="text" name="dance-program-name" class="input-standard">'+
        //     '</label>'+
        //     '</div>');
        // $ageCategoriesBlock.find('.see-info').children().eq(0).append('<div class="ag-info-wrapper">'+
        //     '<span class="text-bold count"></span>'+
        //     '<div class="btn-group-sm flat" role="group">'+
        //     '<button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>'+
        //     '<button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>'+
        //     '</div>'+
        //     '<label>Название:'+
        //     '<input disabled type="text" name="age-category-name" class="input-standard">'+
        //     '</label>'+
        //     '<label>От:'+
        //     '<input disabled type="text" name="age-category-rule-age-min" class="input-standard dancing-group-info-code">'+
        //     '</label>'+
        //     '<label>До:'+
        //     '<input disabled type="text" name="age-category-rule-age-max" class="input-standard dancing-group-info-code">'+
        //     '</label>'+
        //     '</div>');
        // $nominationsBlock.find('.see-info').children().eq(0).append('<div class="nm-info-wrapper">'+
        //     '<span class="text-bold count"></span>'+
        //     '<div class="btn-group-sm flat" role="group">'+
        //     '<button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>'+
        //     '<button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>'+
        //     '</div>'+
        //     '<label>Название:'+
        //     '<input disabled type="text" name="nomination-name" class="input-standard" value="sakjdsafahkbjhabfsahb">'+
        //     '</label>'+
        //     '<label>Кол-во учасников:'+
        //     '<input disabled type="text" name="nomination-rule-participants-number-min" class="input-standard dancing-group-info-code" value="sakjdsafahkbjhabfsahb">'+
        //     '</label>'+
        //     '</div>');
        // $leaguesBlock.find('.see-info').children().eq(0).append('<div class="lg-info-wrapper">'+
        //     '<span class="text-bold count"></span>'+
        //     '<div class="btn-group-sm flat" role="group">'+
        //     '<button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button>'+
        //     '<button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>'+
        //     '</div>'+
        //     '<label>Название:'+
        //     '<input disabled type="text" name="league-name" class="input-standard" value="sakjdsafahkbjhabfsahb">'+
        //     '</label>'+
        //     '<label>Лет выступлений:'+
        //     '<input disabled type="text" name="league-rule-participation-years" class="input-standard dancing-group-info-code" value="sakjdsafahkbjhabfsahb">'+
        //     '</label>'+
        //     '</div>');
        //$danceGroupNameInput.val('Танц группа'+$danceGroupId);

        $.ajax({
            type:"POST",
            url:'ajax_GetNewInfoAboutDancingGroup',
            data: 'id='+$danceGroupId,
            success: function(msg) {
                console.log(msg);
                //    Insert the info in respective blocks (in each of the SHOW INFO BLOCKS)
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    }

    function hideBtns() {
        $totalInfoWrapper.find('.btn-group-sm.flat').each(function () {
            $(this).css('display', 'none');
        });
        $saveInfoBtns.each(function () {
            $(this).css('display', 'none');
        });
    }

    function showBtns() {
        $totalInfoWrapper.find('.btn-group-sm.flat').each(function () {
            $(this).css('display', 'table-cell');
        });
        $saveInfoBtns.each(function () {
            $(this).css('display', 'block');
        });
    }

    function hideAddInfoBlock() {
        $addInfo.each(function () {
            $(this).css('display', 'none');
        });
    }

    function showAddInfoBlock() {
        $addInfo.each(function () {
            $(this).css('display', 'block');
        });
    }

    function propNameInput(status) {
        $danceGroupNameInput.prop('disabled', status);
    }

    function totalNumeration() {
        agNumeration();
        dpNumeration();
        lgNumeration();
        nmNumeration();
    }
    //=====FUNCTIONS USED WHEN BTNS ARE ON CLICK==========================

    //IF SHOW BTN IS ON CLICK
    $showInfoBtn.on('click', function () {
        var $btn=$(this),
            $danceGroupId=$btn.parents('li').attr('data-id-dancing-group');

        //Check $totalInfoWrapper visibility
        if ($totalInfoWrapper.attr('data-visibility')=='none') { //    if it`s display:none than the block is shown, new info is loaded, attributes are changed

            $totalInfoWrapper.css('display', 'block').attr('data-visibility', 'block').attr('data-purpose', 'show').attr('data-id', $danceGroupId);// change attr and show block
            GetNewInfoAboutDancingGroup($danceGroupId);// load new info
            hideBtns();
            propNameInput(true);

        } else if ($totalInfoWrapper.attr('data-visibility')=='block') {//    IF it`s DISPLAY:BLOCK than check the purpose

            if ($totalInfoWrapper.attr('data-purpose')=='show') {//    IF it`s SHOW than check data-id

                if ($totalInfoWrapper.attr('data-id')==$danceGroupId) { //   if id has coincided

                    clearOldInfo();// clear old info
                    $totalInfoWrapper.css('display','none').attr('data-visibility', 'none').attr('data-purpose', '').attr('data-id', '');// hide $totalWrapper and remove attr
                    
                } else { //     if id hasn`t coincided

                    clearOldInfo();// clear old info
                    GetNewInfoAboutDancingGroup($danceGroupId);// get new info
                    $totalInfoWrapper.attr('data-id', $danceGroupId);// change attr data-id
                    hideBtns();
                    propNameInput(true);

                }

            } else if ($totalInfoWrapper.attr('data-purpose')=='edit') {//    IF it`s EDIT than check data-id

                $totalInfoWrapper.attr('data-purpose', 'show');

                if ($totalInfoWrapper.attr('data-id')==$danceGroupId) { //   if id has coincided

                    hideBtns();// hide btns groups
                    propNameInput(true);// disable dance group name input
                    hideAddInfoBlock();

                } else { //     if id hasn`t coincided

                    clearOldInfo();
                    GetNewInfoAboutDancingGroup($danceGroupId);
                    propNameInput(true);// disable dance group name input
                    hideBtns();
                    $totalInfoWrapper.attr('data-id', $danceGroupId);
                    hideAddInfoBlock();

                }

            }
        }
    });

    //IF EDIT BTN IS ON CLICK
    $editInfoBtn.on('click', function () {
        var $btn=$(this),
            $danceGroupId=$btn.parents('li').attr('data-id-dancing-group');

        //Check $totalInfoWrapper visibility
        if ($totalInfoWrapper.attr('data-visibility')=='none') { //    if it`s display:none than the block is shown, new info is loaded, attributes are changed

            $totalInfoWrapper.css('display', 'block').attr('data-visibility', 'block').attr('data-purpose', 'edit').attr('data-id', $danceGroupId);// change attr and show block
            GetNewInfoAboutDancingGroup($danceGroupId);// load new info
            showAddInfoBlock();

        } else if ($totalInfoWrapper.attr('data-visibility')=='block') {//    IF it`s DISPLAY:BLOCK than check the purpose

            if ($totalInfoWrapper.attr('data-purpose')=='show') {//    IF it`s SHOW than check data-id

                $totalInfoWrapper.attr('data-purpose', 'edit');

                if ($totalInfoWrapper.attr('data-id')==$danceGroupId) { //   if id has coincided

                    showBtns();
                    propNameInput(false);
                    showAddInfoBlock();

                } else { //     if id hasn`t coincided

                    clearOldInfo();
                    $totalInfoWrapper.attr('data-id', $danceGroupId);
                    GetNewInfoAboutDancingGroup($danceGroupId);
                    showAddInfoBlock();
                    propNameInput(false);
                }

            } else if ($totalInfoWrapper.attr('data-purpose')=='edit') {//    IF it`s EDIT than check data-id

                if ($totalInfoWrapper.attr('data-id')==$danceGroupId) { //   if id has coincided

                    clearOldInfo();
                    $totalInfoWrapper.css('display','none').attr('data-visibility', 'none').attr('data-id', '').attr('data-purpose', '');

                } else { //     if id hasn`t coincided

                    clearOldInfo();
                    GetNewInfoAboutDancingGroup($danceGroupId);
                    $totalInfoWrapper.attr('data-id', $danceGroupId);

                }

            }
        }
    });

    //МЕНЮ
    $menuItems.on('click', function (e) {
        e.preventDefault();
        $infoWrapper.children().each(function () {
            $(this).css('display', 'none');
        });
        $menuItems.each(function () {
            $(this).removeClass('active');
        });
        $(this).addClass('active');
        $($(this).attr('href')).show();
        if ($totalInfoWrapper.attr('data-purpose')=='show') {
            $addInfo.each(function () {
                $(this).css('display', 'none');
            });
        }
        totalNumeration();
    });
//МЕНЮ


    var $sendFormToServer=$('#send-dg-to-server');

    //=============================DANCE_PROGRAM=======================================

    var $dpShowForm=$danceProgramBlock.find('.dance-group-show-info'),
        $dpAddForm=$danceProgramBlock.find('#form-add-dance-program'),
        $dpAddBtn=$danceProgramBlock.find('.add-dance-group-info'),
        $dpSendBtn=$danceProgramBlock.find('.send-info');

    function dpNumeration() {
        for (var i=0; i<$dpShowForm.children().length; i++) {
            var n=i+1;
            $dpShowForm.children().eq(i).find('span.count').text(n+'.');
        }
    }

    $dpAddBtn.on('click', function (e) {
        e.preventDefault();
    });
    //ФУНКЦІЇ
    //редагування інформації
    $danceProgramBlock.on('click', 'button.btn-success.edit-button', function () {
        var $btn=$(this),
            $inputs=$btn.parents('.dp-info-wrapper').find('input');
        $btn.toggleClass('not-disabled');

        if ($btn.hasClass('not-disabled')) {
            $inputs.each(function () {
                $(this).prop('disabled', false);
            });
            $inputs.eq(0).trigger('focus');
        } else {
            $inputs.each(function () {
                $(this).prop('disabled', true);
            })
        }
    });
    //редагування інформації

    //видалення інформації
    $danceProgramBlock.on('click', 'button.btn-danger.delete-button', function () {
        var $btn = $(this);
        $btn.parents('.dp-info-wrapper').remove();
        dpNumeration();
    });
    //видалення інформації
    //ФУНКЦІЇ

    $dpSendBtn.on('click', function (e) {
        var $form1=$danceProgramBlock.find('.dance-group-show-info'),
            $form2=$ageCategoriesBlock.find('.dance-group-show-info-extended'),
            $form3=$nominationsBlock.find('.dance-group-show-info-extended'),
            $form4=$leaguesBlock.find('.dance-group-show-info-extended');

        if ($form1.children().length>0&&$form2.children().length>0&&$form3.children().length>0&&$form4.children().length>0) {
            var a={};
            a['dance-group-name']=$('#dance-group-name').val();
            a['redirect']='admin/dancing_groups/dance_list';
            a['leagues']=createObj ($lgShowForm, '.lg-info-wrapper');
            a['programs']=createObj ($dpShowForm, '.dp-info-wrapper');
            a['age-categories']=createObj ($agShowForm, '.ag-info-wrapper');
            a['nominations']=createObj ($nmShowForm, '.nm-info-wrapper');
            a=JSON.stringify(a);
            $(this).next().val(a);
            $sendFormToServer.val(a);
            console.log(a);
        } else {
            return false;
        }
    });

    //=============================DANCE_PROGRAM=======================================

    //=============================AGE_CATEGORIES=======================================

    var $agShowForm=$ageCategoriesBlock.find('.dance-group-show-info-extended'),
        $agAddForm=$ageCategoriesBlock.find('#form-add-age-categories'),
        $agAddBtn=$ageCategoriesBlock.find('.add-dance-group-info'),
        $agSendBtn=$ageCategoriesBlock.find('.send-info');

    function agNumeration() {
        for (var i=0; i<$agShowForm.children().length; i++) {
            var n=i+1;
            $agShowForm.children().eq(i).find('span.count').text(n+'.');
        }
    }

    $agAddBtn.on('click', function (e) {
        e.preventDefault();
    });
    //ФУНКЦІЇ
    //редагування інформації
    $ageCategoriesBlock.on('click', 'button.btn-success.edit-button', function () {
        var $btn=$(this),
            $inputs=$btn.parents('.ag-info-wrapper').find('input');

        $inputs.each(function () {
            $(this).prop('disabled', false);
        });
        $inputs.eq(0).trigger('focus');


        // $btn.toggleClass('not-disabled');
        //
        // if ($btn.hasClass('not-disabled')) {
        //     $inputs.each(function () {
        //         $(this).prop('disabled', false);
        //     });
        //     $inputs.eq(0).trigger('focus');
        // } else {
        //     $inputs.each(function () {
        //         $(this).prop('disabled', true);
        //     })
        // }
        // function checkFocus(inputs) {
        //     for (var i=0; i<$inputs.length; i++) {
        //         if ($inputs.eq(i).is(':focus')){
        //             console.log($(this)+' is on focus');
        //             // return true;
        //         } else {
        //             // return false;
        //             console.log($(this)+' is NOT on focus');
        //         }
        //     }
        // }
        // checkFocus($inputs);
        // //редагування інформації

    });

    //видалення інформації
    $ageCategoriesBlock.on('click', 'button.btn-danger.delete-button', function () {
        var $btn = $(this);
        $btn.parents('.ag-info-wrapper').remove();
        agNumeration();
    });
    //видалення інформації
    //ФУНКЦІЇ
    $agSendBtn.on('click', function (e) {
        var $form1=$danceProgramBlock.find('.dance-group-show-info'),
            $form2=$ageCategoriesBlock.find('.dance-group-show-info-extended'),
            $form3=$nominationsBlock.find('.dance-group-show-info-extended'),
            $form4=$leaguesBlock.find('.dance-group-show-info-extended');

        if ($form1.children().length>0&&$form2.children().length>0&&$form3.children().length>0&&$form4.children().length>0) {
            var a={};
            a['dance-group-name']=$('#dance-group-name').val();
            a['redirect']='admin/dancing_groups/dance_list';
            a['leagues']=createObj ($lgShowForm, '.lg-info-wrapper');
            a['programs']=createObj ($dpShowForm, '.dp-info-wrapper');
            a['age-categories']=createObj ($agShowForm, '.ag-info-wrapper');
            a['nominations']=createObj ($nmShowForm, '.nm-info-wrapper');
            a=JSON.stringify(a);
            $(this).next().val(a);
            $sendFormToServer.val(a);
        } else {
            return false;
        }
    });
    //=============================AGE_CATEGORIES=======================================

    //=============================NOMINATIONS=======================================

    var $nmShowForm=$nominationsBlock.find('.dance-group-show-info-extended'),
        $nmAddForm=$nominationsBlock.find('#form-add-nominations'),
        $nmAddBtn=$nominationsBlock.find('.add-dance-group-info'),
        $nmSendBtn=$nominationsBlock.find('.send-info');

    function nmNumeration() {
        for (var i=0; i<$nmShowForm.children().length; i++) {
            var n=i+1;
            $nmShowForm.children().eq(i).find('span.count').text(n+'.');
        }
    }

    $nmAddBtn.on('click', function (e) {
        e.preventDefault();
    });
    //ФУНКЦІЇ
    //редагування інформації
    $nominationsBlock.on('click', 'button.btn-success.edit-button', function () {
        var $btn=$(this),
            $inputs=$btn.parents('.nm-info-wrapper').find('input');
        $btn.toggleClass('not-disabled');

        if ($btn.hasClass('not-disabled')) {
            $inputs.each(function () {
                $(this).prop('disabled', false);
            });
            $inputs.eq(0).trigger('focus');
        } else {
            $inputs.each(function () {
                $(this).prop('disabled', true);
            })
        }
    });
    //редагування інформації

    //видалення інформації
    $nominationsBlock.on('click', 'button.btn-danger.delete-button', function () {
        var $btn = $(this);
        $btn.parents('.nm-info-wrapper').remove();
        nmNumeration();
    });
    //видалення інформації
    //ФУНКЦІЇ
    $nmSendBtn.on('click', function (e) {
        var $form1=$danceProgramBlock.find('.dance-group-show-info'),
            $form2=$ageCategoriesBlock.find('.dance-group-show-info-extended'),
            $form3=$nominationsBlock.find('.dance-group-show-info-extended'),
            $form4=$leaguesBlock.find('.dance-group-show-info-extended');

        if ($form1.children().length>0&&$form2.children().length>0&&$form3.children().length>0&&$form4.children().length>0) {
            var a={};
            a['dance-group-name']=$('#dance-group-name').val();
            a['redirect']='admin/dancing_groups/dance_list';
            a['leagues']=createObj ($lgShowForm, '.lg-info-wrapper');
            a['programs']=createObj ($dpShowForm, '.dp-info-wrapper');
            a['age-categories']=createObj ($agShowForm, '.ag-info-wrapper');
            a['nominations']=createObj ($nmShowForm, '.nm-info-wrapper');
            a=JSON.stringify(a);
            $(this).next().val(a);
            $sendFormToServer.val(a);
        } else {
            return false;
        }
    });
    //=============================NOMINATIONS=======================================

    //=============================LEAGUES=======================================
    var $lgShowForm=$leaguesBlock.find('.dance-group-show-info-extended'),
        $lgAddForm=$leaguesBlock.find('#form-add-leagues'),
        $lgAddBtn=$leaguesBlock.find('.add-dance-group-info'),
        $lgSendBtn=$leaguesBlock.find('.send-info');

    function lgNumeration() {
        for (var i=0; i<$lgShowForm.children().length; i++) {
            var n=i+1;
            $lgShowForm.children().eq(i).find('span.count').text(n+'.');
        }
    }

    $lgAddBtn.on('click', function (e) {
        e.preventDefault();
    });
    //ФУНКЦІЇ
    //редагування інформації
    $leaguesBlock.on('click', 'button.btn-success.edit-button', function () {
        var $btn=$(this),
            $inputs=$btn.parents('.lg-info-wrapper').find('input');
        $btn.toggleClass('not-disabled');

        if ($btn.hasClass('not-disabled')) {
            $inputs.each(function () {
                $(this).prop('disabled', false);
            });
            $inputs.eq(0).trigger('focus');
        } else {
            $inputs.each(function () {
                $(this).prop('disabled', true);
            })
        }
    });
    //редагування інформації

    //видалення інформації
    $leaguesBlock.on('click', 'button.btn-danger.delete-button', function () {
        var $btn = $(this);
        $btn.parents('.lg-info-wrapper').remove();
        lgNumeration();
    });
    //видалення інформації
    //ФУНКЦІЇ
    var $form1=$danceProgramBlock.find('.dance-group-show-info'),
        $form2=$ageCategoriesBlock.find('.dance-group-show-info-extended'),
        $form3=$nominationsBlock.find('.dance-group-show-info-extended'),
        $form4=$leaguesBlock.find('.dance-group-show-info-extended');
    
    $lgSendBtn.on('click', function (e) {
        
        if ($form1.children().length>0&&$form2.children().length>0&&$form3.children().length>0&&$form4.children().length>0) {
            var a={};
            a['dance-group-name']=$('#dance-group-name').val();
            a['redirect']='admin/dancing_groups/dance_list';
            a['leagues']=createObj ($lgShowForm, '.lg-info-wrapper');
            a['programs']=createObj ($dpShowForm, '.dp-info-wrapper');
            a['age-categories']=createObj ($agShowForm, '.ag-info-wrapper');
            a['nominations']=createObj ($nmShowForm, '.nm-info-wrapper');
            a=JSON.stringify(a);
            $(this).next().val(a);
            $sendFormToServer.val(a);
        } else {
            return false;
        }
    });
    //=============================LEAGUES=======================================

    function createObj ($form, $wrapperSelector) {
        var obj={};

        $form.find($wrapperSelector).each(function () {
            var additionalObj={},
                $wrapper=$(this),
                $inputs=$wrapper.find('input');

            for (var i=1; i<$inputs.length; i++) {
                additionalObj[$inputs.eq(i).attr('name')]=$inputs.eq(i).val();
            }

            obj[$inputs.eq(0).val()]=additionalObj;
        });
        return obj;
    }



    //=========================<Save new info & Check duplicated info>===============
    var $saveNewInfoBtn=$('.add-dance-group-info'),
        activeItem;

    $saveNewInfoBtn.on('click', function () {
        for (var i=0; i<$menuItems.length; i++) {
            if ($menuItems.eq(i).hasClass('active')) {
                activeItem=$menuItems[i].id;
                console.log(activeItem);
                break;
            }
        }
        if (activeItem=='menu-dance-programs') {
            if (!$dpAddForm.find('input[name=dance-program-name-new]').val()=='') {
                var $dp=$('#form-add-dance-program').serializeArray(),
                    dpName=$dp[0].value,
                    newDanceProgramsInfo={},
                    permission= false,
                    $blocksToCheck=$form1.children(),
                    dpInfo='<div class="dp-info-wrapper"><span class="text-bold count"></span><div class="btn-group-sm flat" role="group"><button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button></div><label>Название:<input disabled type="text" name="dance-program-name" class="input-standard" value="'+dpName+'"></label></div>';

                newDanceProgramsInfo['name']=dpName;

                for (var i=0; i<$blocksToCheck.length; i++) {
                    let $nameToCheck=$blocksToCheck.eq(i).find('[name="dance-program-name"]').val();

                    if (newDanceProgramsInfo['name']==$nameToCheck) {
                        alert('имя уже есть');
                        permission= false;
                        break;
                    } else {
                        permission=true;
                    }
                }

                if (permission) {
                    $dpShowForm.append(dpInfo);
                    dpNumeration();
                    $dpAddForm.find('input').each(function(){
                        $(this).val('');
                    });
                }
            }
        } else
        if (activeItem=='menu-age-categories') {
            if (!$agAddForm.find('input[name=age-category-name-new]').val()=='') {
                let $ac=$agAddForm.serializeArray(),
                    acName=$ac[0].value,
                    acMinAge=$ac[1].value,
                    acMaxAge=$ac[2].value,
                    newAgeCategoryInfo={},
                    permission= false,
                    $blocksToCheck=$form2.children(),
                    acInfo='<div class="ag-info-wrapper"><span class="text-bold count"></span><div class="btn-group-sm flat" role="group"><button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button></div><label>Название:<input disabled type="text" name="age-category-name" class="input-standard" value="'+acName+'"></label><label>От:<input disabled type="text" name="age-category-rule-age-min" class="input-standard dancing-group-info-code" value="'+acMinAge+'"></label><label>До:<input disabled type="text" name="age-category-rule-age-max" class="input-standard dancing-group-info-code" value="'+acMaxAge+'"></label></div>';

                newAgeCategoryInfo['name']=acName;
                newAgeCategoryInfo['minAge']=acMinAge;
                newAgeCategoryInfo['maxAge']=acMaxAge;

                for (var i=0; i<$blocksToCheck.length; i++) {
                    let $nameToCheck=$blocksToCheck.eq(i).find('[name="age-category-name"]').val(),
                        $minToCheck=$blocksToCheck.eq(i).find('[name="age-category-rule-age-min"]').val(),
                        $maxToCheck=$blocksToCheck.eq(i).find('[name="age-category-rule-age-max"]').val();

                    if (newAgeCategoryInfo['minAge']==$minToCheck&&newAgeCategoryInfo['maxAge']==$maxToCheck&&newAgeCategoryInfo['name']==$nameToCheck) {
                        alert('такие параметры уже есть');
                        permission= false;
                        break;
                    } else if (newAgeCategoryInfo['name']==$nameToCheck) {
                        alert('имя уже есть');
                        permission= false;
                        break;
                    } else {
                        permission=true;
                    }
                }

                if (permission) {
                $agShowForm.append(acInfo);
                agNumeration();
                $agAddForm.find('input').each(function(){
                    $(this).val('');
                });
            }}
        } else
        if (activeItem=='menu-nominations') {
            if (!$nmAddForm.find('input[name=nomination-name-new]').val()=='') {
                let $nm=$nmAddForm.serializeArray(),
                    nmName=$nm[0].value,
                    nmNumber=$nm[1].value,
                    newNominationsInfo={},
                    permission= false,
                    $blocksToCheck=$form3.children(),
                    nmInfo='<div class="nm-info-wrapper"><span class="text-bold count"></span><div class="btn-group-sm flat" role="group"><button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button></div><label>Название:<input disabled type="text" name="nomination-name" class="input-standard" value="'+nmName+'"></label><label>Кол-во учасников:<input disabled type="text" name="nomination-rule-participants-number-min" class="input-standard dancing-group-info-code" value="'+nmNumber+'"></label></div>';

                newNominationsInfo['name']=nmName;
                newNominationsInfo['number']=nmNumber;

                for (var i=0; i<$blocksToCheck.length; i++) {
                    let $nameToCheck=$blocksToCheck.eq(i).find('[name="nomination-name"]').val(),
                        $ruleToCheck=$blocksToCheck.eq(i).find('[name="nomination-rule-participants-number-min"]').val();

                    if (newNominationsInfo['number']==$ruleToCheck&&newNominationsInfo['name']==$nameToCheck) {
                        alert('правило и имя уже есть');
                        permission= false;
                        break;
                    }
                    // else if (newNominationsInfo['number']==$ruleToCheck) {
                    //     alert('правило уже есть');
                    //     permission= false;
                    //     break;
                    // }
                    else if (newNominationsInfo['name']==$nameToCheck) {
                        alert('имя уже есть');
                        permission= false;
                        break;
                    } else {
                        permission=true;
                    }
                }
                if (permission) {
                    $nmShowForm.append(nmInfo);
                    nmNumeration();
                    $nmAddForm.find('input').each(function(){
                        $(this).val('');
                    });
                }
            }
        } else
        if (activeItem=='menu-leagues') {
            if (!$lgAddForm.find('input[name=league-name-new]').val()=='') {
                let $lg=$lgAddForm.serializeArray(),
                    lgName=$lg[0].value,
                    lgNumber=$lg[1].value,
                    newLeagueInfo={},
                    permission= false,
                    $blocksToCheck=$form4.children(),
                    lgInfo='<div class="lg-info-wrapper"><span class="text-bold count"></span><div class="btn-group-sm flat" role="group"><button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button></div><label>Название:<input disabled type="text" name="league-name" class="input-standard" value="'+lgName+'"></label><label>Лет выступлений:<input disabled type="text" name="league-rule-participation-years" class="input-standard dancing-group-info-code" value="'+lgNumber+'"></label></div>';

                newLeagueInfo['name']=lgName;
                newLeagueInfo['yearRules']=lgNumber;

                for (var i=0; i<$blocksToCheck.length; i++) {
                    let $nameToCheck=$blocksToCheck.eq(i).find('[name="league-name"]').val(),
                        $ruleToCheck=$blocksToCheck.eq(i).find('[name="league-rule-participation-years"]').val();

                    if (newLeagueInfo['yearRules']==$ruleToCheck&&newLeagueInfo['name']==$nameToCheck) {
                        alert('правило и имя уже есть');
                        permission= false;
                        break;
                    }
                    // else if (newLeagueInfo['yearRules']==$ruleToCheck) {
                    //     alert('правило уже есть');
                    //     permission= false;
                    //     break;
                    // }
                    else if (newLeagueInfo['name']==$nameToCheck) {
                        alert('имя уже есть');
                        permission= false;
                        break;
                    } else {
                        permission=true;
                    }
                }

                if (permission) {
                    $lgShowForm.append(lgInfo);
                    lgNumeration();
                    $lgAddForm.find('input').each(function(){
                        $(this).val('');
                    });
                }
            }
        }
    });
    //=========================</Save new info & Check duplicated info>===============

});