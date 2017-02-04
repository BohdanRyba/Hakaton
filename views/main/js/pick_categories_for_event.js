jQuery(function($) {
    var $body=$('body'),
        $pickedCategories=$('#pick_dancing_categories_for_event'),
        $sendBtn=$('#update-dancing-categories-info'),
        $modal=$('#pickCategoriesForEventCallback'),
        $modalBody=$modal.find('.modal-body');

    function toggleSendBtnVisibility(visibility){$sendBtn.css('display', visibility);}

    $body.on('click', '.pick_dancing_categories_for_event', function () {
        var $inputStatus=$(this).find('input').prop('checked');
        if ($inputStatus==false) {
            $(this).removeAttr('data-checked');
        } else {
            $(this).attr('data-checked','checked');
        }
    });

    //function responsible for 1-click-checking all categories
    $body.on('click','#check-all-dancing-categories', function () {
        var $checkAllLi=$(this),
            $checkAll=$checkAllLi.find('input'),
            $li=$('.pick_dancing_categories_for_event');

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

    //send to server picked categories
    $body.on('click', '#update-dancing-categories-info', function () {
        function ajax_sendPickedCategoriesForEvent() {
            var dataForServer={'all':[], 'checked':[]},
                id=window.location.href;

            id=id.split('/');
            id=id[id.length-1];
            id= parseInt(id);
            dataForServer['event_id']=id;

            $pickedCategories.find('.pick_dancing_categories_for_event').each(function () {
                var $input=$(this).find('input'),
                    id=parseInt($input.attr('name'),10);

                dataForServer['all'].push(id);

                if ($input.prop('checked')) {
                    dataForServer['checked'].push(id);
                }

            });

            $.ajax({
                type:"POST",
                url:'ajax_sendPickedCategoriesForEvent',
                data: dataForServer,
                success: function (msg) {
                    console.log('ajax_sendPickedCategoriesForEvent has worked successfully!');
                    console.log(dataForServer);
                    console.log(msg);
                    $modalBody.empty();
                    $modalBody.append('<p>Изменения сохраненны успешно!</p>');
                    $modal.modal();
                },
                error: function (msg) {
                    console.log('ajax_sendPickedCategoriesForEvent has failed work!');
                    console.log(msg);
                    $modalBody.empty();
                    $modalBody.append('<p>Ошибка! Изменения <b>не</b> сохраненны!</p>');
                    $modal.modal();
                }
            })
        }
        ajax_sendPickedCategoriesForEvent();
    });

    //show block with categories after dance program was clicked
    $('dancing-group-list-item-to-see').one('click', function() {
        $('#categories-list').css('display', 'block');
    });

    //loading categories according to clicked dance program
    $body.on('click', '.dancing-group-list-item-to-see', function(){
        var $categoriesList=$('#categories-list'),
            $danceGroups=$('#pick-dancing-group-parameter-to-see').children(),
            $searchedCategoriesForm=$('#pick_dancing_categories_for_event').find('ul');

        $danceGroups.each(function () {
            $(this).removeClass('picked-dancing-group');
        });

        $(this).addClass('picked-dancing-group');

        $categoriesList.css('display', 'block');
        toggleSendBtnVisibility('none');

        $searchedCategoriesForm.empty();

        //AJAX 2 function AJAX_THAT_ADDS_CATEGORIES_ACCORDING_TO_PARAMETER!!!!!!!!!!!!!!!!!!!!!!!!!!!
        function ajax_THAT_ADDS_CATEGORIES_ACCORDING_TO_PARAMETER($parameter) {
            var $name=$parameter.attr('data-name'),
                obj={},
                id=window.location.href;

            id=id.split('/');
            id=id[id.length-1];
            id= parseInt(id);
            obj['event_id']=id;

            obj['name']=$name;
            obj['parameter']='d_c_program';

            $.ajax({
                type:"POST",
                url:'ajax_showCategoriesToPickForEvent',
                data: obj,
                success: function(msg) {
                    console.log('ajax_THAT_ADDS_CATEGORIES_ACCORDING_TO_PARAMETER (ajax2) has worked successfully!');
                    var msg=JSON.parse(msg),
                        categories=msg['all_dancing_categories'],
                        checkedCategories=msg['checked_dancing_categories'];
                    $searchedCategoriesForm.append('<li id="check-all-dancing-categories"><label><input class="text-capitalize" type="checkbox">выбрать все</label></li>');

                    for (let i=0; i<categories.length; i++) {
                        var category=categories[i],
                            program=category['d_c_program'],
                            ageCategory=category['d_c_age_category'],
                            nomination=category['d_c_nomination'],
                            league=category['d_c_league'],
                            id=category['id'],
                            generalName=program+' '+ageCategory+' '+nomination+' '+league;

                        $searchedCategoriesForm.append('<li class="pick_dancing_categories_for_event"><label><input type="checkbox" name="'+id+'">'+generalName+'</label></li>');
                    }


                    var $allCategories=$searchedCategoriesForm.find('.pick_dancing_categories_for_event');

                    for (let i=0; i<checkedCategories.length; i++) {
                        let id=checkedCategories[i],
                            $pickedCategory=$allCategories.find('[name="'+id+'"]');

                        $pickedCategory.prop('checked', true);
                    $pickedCategory.parents('.pick_dancing_categories_for_event').attr('data-checked','checked')
                    }
                },
                error: function (msg) {
                    console.log(msg);
                    console.log('ajax_THAT_ADDS_CATEGORIES_ACCORDING_TO_PARAMETER (ajax2) has failed work!');
                }
            })

        }

        ajax_THAT_ADDS_CATEGORIES_ACCORDING_TO_PARAMETER($(this));

    });

    $body.on('click', '.pick_dancing_categories_for_event', function () {
        toggleSendBtnVisibility('block');
    });
        $body.on('click', '#check-all-dancing-categories', function () {
        toggleSendBtnVisibility('block');
    });
});