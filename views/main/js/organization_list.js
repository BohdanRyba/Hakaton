/**
 * Created by PC1 on 28.09.2016.
 */
jQuery(function($) {

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










    //      виведення інформації по організації

        var $infoButton=$('button.btn-info>i.fa-info').parent(),
            $editButton=$('button.btn-success>i.fa-edit').parent(),
            $orgForm='<form class="text-capitalize org-full-info" action=""><div class="col-xs-12"><label>название организации:<br><input disabled class="org-info-input" type="text" value="название организации"></label></div><div class="col-xs-12"><label>сокращенное название организации:<br><input class="org-info-input" disabled type="text" value="название организации"></label></div><div class="col-xs-12"><label>руководитель организации:<br><input class="org-info-input" disabled type="text" value="название организации"></label></div> <div class="col-xs-12"><label>город:<br><input class="org-info-input" disabled type="text" value="название организации"></label></div><div class="col-xs-12"><label>страна:<br><input class="org-info-input" disabled type="text" value="название организации"></label></div><div class="col-xs-12"><label>e-mail:<br><input class="org-info-input" disabled type="text" value="название организации"></label></div><div class="col-xs-12"><label>номер телефона:<br><input class="org-info-input" disabled type="text" value="название организации"></label></div><div class="col-xs-6"><input disabled class="save-org-info org-info-input" type="submit" value="сохранить"></div><div class="col-xs-6"><input  disabled class="dontsave-org-info org-info-input" type="button" value="отменить"></div></form>';

        // ФУНКЦІЇ ПО ВИВЕДЕННЮ ІНФОРМАЦІЇ
        function addOrgFullInfo($infoContainer, $orgList, $orgForm, dataInput ) {

            $infoContainer.append($orgForm).css('display', 'none');

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

            } else if ($infoContainer.children().eq(0).attr('data-input')=='disabled') {

                switchOrgInfo($orgList,'active');

                toggleButtons($orgList, true);

                infoChangeTrigger($orgList, $infoContainer);

                infoChange($orgList, $infoContainer);

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
            var $orgOnDel=$(this).parents('.box.organization-list');

            $orgOnDel.attr('data-deletion', 'ready');
           // console.log($orgOnDel); $('[data-deletion=true]')
        });

        $delSub.on('click', function () {
            var $orgOnDel=$('.box.organization-list[data-deletion=ready]');

            $orgOnDel.parent().remove();

            $delCncl.trigger('click');
        });
    //    ВИДАЛЕННЯ ОРГАНІЗАЦІЇ

    //      виведення інформації по організації
});





























