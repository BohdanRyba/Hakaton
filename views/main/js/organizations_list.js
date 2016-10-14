/**
 * Created by PC1 on 28.09.2016.
 */
jQuery(function($) {
    //    DELETE ORGANIZATIONS
    var $delOrg=$('.delete-org'),
        $org=$('.organization-list'),
        $boxHeader=$(this).find('div.box-header');

    $delOrg.click(function () {

        $org.each(function () {

            $boxHeader.find('button.btn.btn-box-tool').toggle();

        });

    });
    //    DELETE ORGANIZATIONS
    //      Центрування блоків організацій при вузькому екрані

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
            $orgForm='<form class="text-capitalize org-full-info" action=""><div class="col-xs-12"><label>название организации:<br><input disabled type="text" value="название организации"></label></div><div class="col-xs-12"><label>сокращенное название организации:<br><input disabled type="text" value="название организации"></label></div><div class="col-xs-12"><label>руководитель организации:<br><input disabled type="text" value="название организации"></label></div> <div class="col-xs-12"><label>город:<br><input disabled type="text" value="название организации"></label></div><div class="col-xs-12"><label>страна:<br><input disabled type="text" value="название организации"></label></div><div class="col-xs-12"><label>e-mail:<br><input disabled type="text" value="название организации"></label></div><div class="col-xs-12"><label>номер телефона:<br><input disabled type="text" value="название организации"></label></div></form></div>';
            //$thisOrg=$infoButton;

        $infoButton.on('click', function () {

           var $orgList=$(this).parents('.box.organization-list'),
               $infoContainer=$orgList.find('.full-info-container');

            if ($infoContainer.children().length==0) {

                $infoContainer.append($orgForm).css('display', 'none');

                $orgList.find('.full-info-container').slideDown(300);

                $orgList.find('.org-full-info').attr({'data-input':'disabled', 'data-visibility':'true'});

            } else if ($infoContainer.children().eq(0).attr('data-input')=='active') {

                $orgList.find('.org-full-info').removeAttr('data-input');

                ($orgList.find('.org-full-info').find('input[type="text"]').each(function () {
                    $(this).prop('disabled', true);
                }));

                $orgList.find('.org-full-info').attr('data-input', 'disabled');

            } else if ($infoContainer.children().eq(0).attr('data-visibility')=='true') {

                $orgList.find('.org-full-info').removeAttr('data-visibility');

                $orgList.find('.full-info-container').slideUp(300);

                $infoContainer.empty();

            }
        });

        $editButton.on('click', function () {

            var $orgList=$(this).parents('.box.organization-list'),
                $infoContainer=$orgList.find('.full-info-container');

            if ($infoContainer.children().length==0) {

                $infoContainer.append($orgForm).css('display', 'none');

                $orgList.find('.full-info-container').slideDown(300);

                $orgList.find('.org-full-info').find('input[type="text"]').each(function () {

                    $(this).prop('disabled', false);

                });

                $orgList.find('.org-full-info').attr({'data-input':'active', 'data-visibility':'true'});

            } else if ($infoContainer.children().eq(0).attr('data-input')=='disabled') {

                $orgList.find('.org-full-info').removeAttr('data-input');

                $orgList.find('.org-full-info').find('input[type="text"]').each(function () {

                    $(this).prop('disabled', false);

                });

                $orgList.find('.org-full-info').attr('data-input', 'active');

            } else if ($infoContainer.children().eq(0).attr('data-visibility')=='true') {

                $orgList.find('.org-full-info').removeAttr('data-visibility');

                $orgList.find('.full-info-container').slideUp(300);

                $infoContainer.empty();

            }

        });
    // function addOrgFullInfo(dataInput) {
    //
    //     $infoContainer.append($orgForm).css('display', 'none');
    //
    //     $orgList.find('.full-info-container').slideDown(300);
    //
    //     if (dataInput=='active') {$orgList.find('.org-full-info').find('input[type="text"]').each(function () {
    //
    //         $(this).prop('disabled', false);
    //
    //     });}
    //
    //     $orgList.find('.org-full-info').attr({'data-input':dataInput, 'data-visibility':'true'});
    //
    // }


    //      виведення інформації по організації
});





























