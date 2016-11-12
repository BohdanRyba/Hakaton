/**
 * Created by PC1 on 28.09.2016.
 */
$(function() {

    $(window).on('resize', function(){
        var width = window.innerWidth,
            $dl=$('.org-info-wrapper>dl');

        if (width <= 992) {
            $dl.addClass('text-center');
        } else {
            $dl.removeClass('text-center');
        }
    });
    $(window).trigger('resize');

    //      Центрування блоків організацій при вузькому екрані

    var aaa=window.location.href;
    aaa=aaa.split('/');
    aaa=aaa[aaa.length-1];


    //      виведення інформації по організації

    var $infoButton=$('button.btn-info>i.fa-info').parent(),
        $editButton=$('button.btn-success>i.fa-edit').parent(),
        $orgForm='<form method="post" class="text-capitalize org-full-info" action="updateOrg"><div class="col-xs-12"><label>название организации:<br><input disabled class="org-info-input" type="text" name="org_name"></label></div><div class="col-xs-12"><label>сокращенное название организации:<br><input class="org-info-input" disabled type="text" name="org_abbreviation"></label></div><div class="col-xs-12"><label>руководитель организации:<br><input class="org-info-input" disabled type="text" name="org_head_fio"></label></div><div class="col-xs-12"><label>город:<br><input class="org-info-input" disabled type="text" name="org_city"></label></div><div class="col-xs-12"><label>страна:<br><input class="org-info-input" disabled type="text" name="org_country"></label></div><div class="col-xs-12"><label>номер телефона:<br><input class="org-info-input" disabled type="text" name="org_phone"></label></div><div class="col-xs-12"><label>e-mail:<br><input class="org-info-input" disabled type="text" name="org_email"></label></div><div class="col-xs-6"><input disabled class="save-org-info org-info-input" type="submit" value="сохранить"></div><input name="redirect" type="hidden" value="admin/organizations/page/'+aaa+'"><input name="id" type="hidden"><div class="col-xs-6"><input  disabled class="dontsave-org-info org-info-input" type="button" value="отменить"></div></form>';

    //AJAX FUNCTIONS
    function getFullInfoAjax($infoContainer, $orgList) {
        var id=$orgList.attr('data-id');
        $.ajax({
            type:"POST",
            url:'ajax_showOrgInf',
            data: 'id='+id,
            success: function (msg) {

                console.log(msg);
                var orgFullInfo = JSON.parse(msg);
                $infoContainer.find('input[name="org_name"]').val(orgFullInfo.org_name);
                $infoContainer.find('input[name="org_abbreviation"]').val(orgFullInfo.org_abbreviation);
                $infoContainer.find('input[name="org_head_fio"]').val(orgFullInfo.org_head_fio);
                $infoContainer.find('input[name="org_city"]').val(orgFullInfo.org_city);
                $infoContainer.find('input[name="org_country"]').val(orgFullInfo.org_country);
                $infoContainer.find('input[name="org_phone"]').val(orgFullInfo.org_phone);
                $infoContainer.find('input[name="org_email"]').val(orgFullInfo.org_email);
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    }

    function delOrgAjax($orgOnDel,$delCncl) {
        var id=$orgOnDel.attr('data-id');
        $.ajax({
            type:"POST",
            url:'ajax_delOrg',
            data: 'id='+id,
            success: function () {
                $orgOnDel.parent().remove();
                $delCncl.trigger('click');
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    }
    //AJAX FUNCTIONS

    // ФУНКЦІЇ ПО ВИВЕДЕННЮ ІНФОРМАЦІЇ
    function addOrgFullInfo($infoContainer, $orgList, $orgForm, dataInput ) {

        $infoContainer.append($orgForm).css('display', 'none');

        getFullInfoAjax($infoContainer, $orgList);

        $orgList.find('.full-info-container').slideDown(200);

        if (dataInput=='active') {$orgList.find('.org-full-info').find('input[type="text"]').each(function () {

            $(this).prop('disabled', false);

        });}

        $orgList.find('.org-full-info').attr({'data-input':dataInput, 'data-visibility':'true'});
    }

    function switchOrgInfo($orgList, dataInput) {

        $orgList.find('.org-full-info').removeAttr('data-input');

        var propStatus;

        if (dataInput == 'disabled') {
            propStatus = true;
        } else if (dataInput == 'active') {
            propStatus = false;
        }

        ($orgList.find('.org-full-info').find('input[type="text"]').each(function () {
            $(this).prop('disabled', propStatus);
        }));

        $orgList.find('.org-full-info').attr('data-input', dataInput);

    }

    function hideOrgInfo($orgList, $infoContainer) {

        $orgList.find('.full-info-container').slideUp(200);

        $infoContainer.empty();

    }

    function toggleButtons($orgList, toggleStatus) {

        var $saveBtn=$orgList.find('.save-org-info'),
            $dontSaveBtn=$orgList.find('.dontsave-org-info');

        $saveBtn.toggle(toggleStatus);
        $dontSaveBtn.toggle(toggleStatus);

    }

    function infoChangeTrigger($orgList, $infoContainer) {

        $infoContainer.find('input[type="text"]').on('keydown', function () {
            $orgList.trigger('infoChange');
        })

    }

    function infoChange($orgList, $infoContainer) {

        $orgList.on('infoChange', function () {

            var $saveBtn = $orgList.find('.save-org-info'),
                $dontSaveBtn = $orgList.find('.dontsave-org-info');

            $saveBtn.prop('disabled', false);
            $dontSaveBtn.prop('disabled', false);

        });

    }

    function cancelInfoChange($orgList, $infoContainer) {

        var $dontSaveBtn=$orgList.find('.dontsave-org-info');

        $dontSaveBtn.on('click', function (){
            hideOrgInfo($orgList, $infoContainer);
        });
    }

    function addOrgId($orgList, $infoContainer){

        var $saveBtn=$orgList.find('.save-org-info');

        $saveBtn.on('click', function (){
            $infoContainer.find('input[name=id]').val($orgList.attr('data-id'));
        });

    }
    // ФУНКЦІЇ ПО ВИВЕДЕННЮ ІНФОРМАЦІЇ

    //КНОПКА ІНФОРМАЦІЇ
    $infoButton.on('click', function () {

        var $orgList=$(this).parents('.box.organization-list'),
            $infoContainer=$orgList.find('.full-info-container');

        $orgList.trigger('onClick');

        if ($infoContainer.children().length==0) {

            addOrgFullInfo($infoContainer, $orgList, $orgForm, 'disabled');

            toggleButtons($orgList, false);

        } else if ($infoContainer.children().eq(0).attr('data-input')=='active') {

            switchOrgInfo($orgList, 'disabled');

            toggleButtons($orgList, false);

        } else if ($infoContainer.children().eq(0).attr('data-visibility')=='true') {

            hideOrgInfo($orgList, $infoContainer);

        }

    });
    //КНОПКА ІНФОРМАЦІЇ

    //КНОПКА РЕДАГУВАННЯ ІНФОРМАЦІЇ
    $editButton.on('click', function () {

        var $orgList=$(this).parents('.box.organization-list'),
            $infoContainer=$orgList.find('.full-info-container');

        $orgList.trigger('onClick');

        if ($infoContainer.children().length==0) {

            addOrgFullInfo($infoContainer, $orgList, $orgForm, 'active');

            infoChangeTrigger($orgList, $infoContainer);

            infoChange($orgList, $infoContainer);

            cancelInfoChange($orgList, $infoContainer);

            addOrgId($orgList, $infoContainer);

        } else if ($infoContainer.children().eq(0).attr('data-input')=='disabled') {

            switchOrgInfo($orgList, 'active');

            toggleButtons($orgList, true);

            infoChangeTrigger($orgList, $infoContainer);

            infoChange($orgList, $infoContainer);

            cancelInfoChange($orgList, $infoContainer);

            addOrgId($orgList, $infoContainer);

        } else if ($infoContainer.children().eq(0).attr('data-visibility')=='true') {

            hideOrgInfo($orgList, $infoContainer);

            infoChangeTrigger($orgList, $infoContainer);

        }

    });
    //КНОПКА РЕДАГУВАННЯ ІНФОРМАЦІЇ



    //ПОКАЗАТИ ІНФОРМАЦІЮ ЛИШЕ ПО ОДНІЙ ОРГАНІЗАЦІЇ
    var $orgs=$('.organization-list');

    $orgs.on('onClick', function () {
        $orgs.each(function () {
            $(this).removeClass('active');
        });
        $(this).addClass('active');
        $orgs.not('.active').each(function (){
            var $infoContainer=$(this).find('.full-info-container');
            hideOrgInfo($(this), $infoContainer);
        })
    });
    //ПОКАЗАТИ ІНФОРМАЦІЮ ЛИШЕ ПО ОДНІЙ ОРГАНІЗАЦІЇ

    //    ВИДАЛЕННЯ ОРГАНІЗАЦІЇ
    var $delBtn=$('button.org-del-btn'),
        $delSub=$('button.deletion-submit'),
        $delCncl=$('button.deletion-cancel');

    $delBtn.on('click', function () {
        var $orgOnDel=$(this).parents('.box.organization-list'),
            $modalBody=$('#myModal').find('.modal-body p');
        $orgOnDel.attr('data-deletion', 'ready');
        $modalBody.text('Вы действительно хотите удалить '+$orgOnDel.find('h3.box-title').text()+'?');
        $('input[name="delete_org_id"]').val($('.box.organization-list[data-deletion=ready]').attr('data-id'));
    });

    $delSub.on('click', function () {
        var $orgOnDel=$('.box.organization-list[data-deletion=ready]');

        $('input[name="delete_org_id"]').val($orgOnDel.attr('data-id'));

    });

    $delCncl.on('click', function () {
        var $orgOnDel=$('.box.organization-list[data-deletion=ready]');
        $orgOnDel.removeAttr('data-deletion');
    });
    //    ВИДАЛЕННЯ ОРГАНІЗАЦІЇ

    //      виведення інформації по організації
});