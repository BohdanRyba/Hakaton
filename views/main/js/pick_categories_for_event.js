jQuery(function($) {
    var $body=$('body'),
        $pickedCategories=$('#pick_dancing_categories_for_event');

    $body.on('click', '.pick_dancing_categories_for_event', function () {
        var $inputStatus=$(this).find('input').prop('checked');
        if ($inputStatus==false) {
            $(this).removeAttr('data-checked');
        } else {
            $(this).attr('data-checked','checked');
        }
    });

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
                success: function () {
                    console.log('ajax_sendPickedCategoriesForEvent has worked successfully!');
                },
                error: function (msg) {
                    console.log('ajax_sendPickedCategoriesForEvent has failed work!');
                    console.log(msg);
                }
            })
        }
        ajax_sendPickedCategoriesForEvent();
    });

    $('dancing-group-list-item-to-see').one('click', function() {
        $('#categories-list').css('display', 'block');
    });

    $body.on('click', '.dancing-group-list-item-to-see', function(){
        var $categoriesList=$('#categories-list'),
            $danceGroups=$('#pick-dancing-group-parameter-to-see').children(),
            $searchedCategoriesForm=$('#pick_dancing_categories_for_event').find('ul');

        $danceGroups.each(function () {
            $(this).removeClass('picked-dancing-group');
        });

        $(this).addClass('picked-dancing-group');

        $categoriesList.css('display', 'block');

        $searchedCategoriesForm.empty();

        //AJAX 2 function AJAX_THAT_ADDS_CATEGORIES_ACCORDING_TO_PARAMETER!!!!!!!!!!!!!!!!!!!!!!!!!!!
        function ajax_THAT_ADDS_CATEGORIES_ACCORDING_TO_PARAMETER($parameter) {
            var $name=$parameter.attr('data-name'),
                obj={};

            obj['name']=$name;
            obj['parameter']='d_c_program';

            $.ajax({
                type:"POST",
                url:'ajax_showCategoriesToPickForEvent',
                data: obj,
                success: function(msg) {
                    // console.log('ajax_THAT_ADDS_CATEGORIES_ACCORDING_TO_PARAMETER (ajax2) has worked successfully!');
                    // console.log(msg);
                    var msg=JSON.parse(msg);
                    console.log(msg);
                    // console.log(msg[0]);
                    // if (msg[0]==undefined) {$searchedCategoriesForm.append('<div class="dp-info-wrapper"><p class="dance-category-name">таких категорий нет</p></div>');}
                    $searchedCategoriesForm.append('<li id="check-all-dancing-categories"><label><input class="text-capitalize" type="checkbox">выбрать все</label></li>');

                    for (var i=0; i<msg.length; i++) {
                        var category=msg[i],
                            program=category['d_c_program'],
                            ageCategory=category['d_c_age_category'],
                            nomination=category['d_c_nomination'],
                            league=category['d_c_league'],
                            id=category['id'],
                            generalName=program+' '+ageCategory+' '+nomination+' '+league;

                        // $searchedCategoriesForm.append('<div class="dp-info-wrapper" data-id="'+id+'" data-extraId="'+code+'" data-catagoryName="'+generalName+'"><div class="btn-group-sm flat" role="group"><button type="button" class="btn btn-success edit-button edit-categories-info btn-flat"><i class="fa fa-edit"></i></button> <button type="button" class="btn btn-danger delete-button delete-categories-info btn-flat"><i class="fa fa-trash"></i></button> </div><p class="dance-category-name">'+generalName+'</p><label>Код:<input disabled disabled type="text" name="dance-program-code" class="input-standard dancing-group-info-code" value="'+code+'"></label></div>');
                        $searchedCategoriesForm.append('<li class="pick_dancing_categories_for_event"><label><input type="checkbox" name="'+id+'">'+generalName+'</label></li>');
                    // '<li class="pick_dancing_categories_for_event"><label><input type="checkbox" name="хіп-хоп">'+generalName+'</label></li>'
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
});