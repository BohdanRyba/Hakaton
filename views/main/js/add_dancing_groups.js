<<<<<<< HEAD
jQuery(function($) {

    var $menuItems=$('.dance-group-menu a'),
        $infoWrapper=$('#dance-group-info-wrapper');

    //МЕНЮ
    $menuItems.on('click', function (e) {
        e.preventDefault();
        $infoWrapper.children().each(function(){
            $(this).css('display', 'none');
        });
        $menuItems.each(function () {
            $(this).removeClass('active');
        });
        $(this).addClass('active');
        $($(this).attr('href')).show();
    });
    //МЕНЮ



    var $danceProgramBlock=$('#dance-programs'),
        $ageCategoriesBlock=$('#age-categories'),
        $nominationsBlock=$('#nominations'),
        $leaguesBlock=$('#leagues'),
        $sendFormToServer=$('#send-dg-to-server');

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
        if (!$dpAddForm.find('input[name=dance-program-name-new]').val()=='') {
            var $dp=$('#form-add-dance-program').serializeArray(),
                dpName=$dp[0].value,
                dpInfo='<div class="dp-info-wrapper"><span class="text-bold count"></span><div class="btn-group-sm flat" role="group"><button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button></div><label>Название:<input disabled type="text" name="dance-program-name" class="input-standard" value="'+dpName+'"></label></div>';

            $dpShowForm.append(dpInfo);

            dpNumeration();

            $dpAddForm.find('input').each(function(){
                $(this).val('');
            })
        }
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
        if (!$agAddForm.find('input[name=age-category-name-new]').val()=='') {
            var $ac=$agAddForm.serializeArray(),
                acName=$ac[0].value,
                acMinAge=$ac[1].value,
                acMaxAge=$ac[2].value,
                acInfo='<div class="ag-info-wrapper"><span class="text-bold count"></span><div class="btn-group-sm flat" role="group"><button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button></div><label>Название:<input disabled type="text" name="age-category-name" class="input-standard" value="'+acName+'"></label><label>От:<input disabled type="text" name="age-category-rule-age-min" class="input-standard dancing-group-info-code" value="'+acMinAge+'"></label><label>До:<input disabled type="text" name="age-category-rule-age-max" class="input-standard dancing-group-info-code" value="'+acMaxAge+'"></label></div>';

            $agShowForm.append(acInfo);

            agNumeration();

            $agAddForm.find('input').each(function(){
                $(this).val('');
            })
        }
    });
    //ФУНКЦІЇ
    //редагування інформації
    $ageCategoriesBlock.on('click', 'button.btn-success.edit-button', function () {
        var $btn=$(this),
            $inputs=$btn.parents('.ag-info-wrapper').find('input');
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
        if (!$nmAddForm.find('input[name=nomination-name-new]').val()=='') {
            var $nm=$nmAddForm.serializeArray(),
                nmName=$nm[0].value,
                nmNumber=$nm[1].value,
                nmInfo='<div class="nm-info-wrapper"><span class="text-bold count"></span><div class="btn-group-sm flat" role="group"><button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button></div><label>Название:<input disabled type="text" name="nomination-name" class="input-standard" value="'+nmName+'"></label><label>Кол-во учасников:<input disabled type="text" name="nomination-rule-participants-number-min" class="input-standard dancing-group-info-code" value="'+nmNumber+'"></label></div>';

            $nmShowForm.append(nmInfo);

            nmNumeration();

            $nmAddForm.find('input').each(function(){
                $(this).val('');
            })
        }
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
        if (!$lgAddForm.find('input[name=league-name-new]').val()=='') {
            var $lg=$lgAddForm.serializeArray(),
                lgName=$lg[0].value,
                lgNumber=$lg[1].value,
                lgInfo='<div class="lg-info-wrapper"><span class="text-bold count"></span><div class="btn-group-sm flat" role="group"><button type="button" class="btn btn-success edit-button btn-flat"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button></div><label>Название:<input disabled type="text" name="league-name" class="input-standard" value="'+lgName+'"></label><label>Лет выступлений:<input disabled type="text" name="league-rule-participation-years" class="input-standard dancing-group-info-code" value="'+lgNumber+'"></label></div>';

            $lgShowForm.append(lgInfo);

            lgNumeration();

            $lgAddForm.find('input').each(function(){
                $(this).val('');
            })
        }
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
    $lgSendBtn.on('click', function (e) {
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
});