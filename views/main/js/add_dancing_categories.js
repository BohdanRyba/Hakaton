jQuery(function($) {

    var $body=$('body');

    // function ajax_settingUpDancingCategory(danceGroup) {
    //     var id=danceGroup.attr('data-id-dancing-group');
    //     $.ajax({
    //         type:"POST",
    //         url:'ajax_settingUpDancingCategory',
    //         data: 'id='+id,
    //         success: function(msg){
    //             var msg=JSON.parse(msg),
    //                 programs=msg['d_program'],                         /////data-id-dancing-group
    //                 ageCategories=msg['d_age_category'],
    //                 nominations=msg['d_nomination'],
    //                 leagues=msg['d_league'],
    //                 programsList=[],
    //                 ageCategoriesList=[],
    //                 nominationsList=[],
    //                 leaguesList=[],
    //                 $pickDancePrograms=$('#pick-dance-programs').find('ul'),
    //                 $pickAgeCategories=$('#pick-age-categories').find('ul'),
    //                 $pickNominations=$('#pick-nominations').find('ul'),
    //                 $pickLeagues=$('#pick-leagues').find('ul');
    //
    //
    //             for (var key in programs) {programsList.push(key);}
    //             for (var key in ageCategories) {ageCategoriesList.push(key);}
    //             for (var key in nominations) {nominationsList.push(key);}
    //             for (var key in leagues) {leaguesList.push(key);}
    //
    //             function clearOldInfo(ul) {
    //                 for (var i=ul.children().length-1; i>0; i--) {
    //                     ul.children().eq(i).remove();
    //                 }
    //             }
    //
    //             function addNewInfo(ul, list) {
    //                 for (var i=0; i<list.length; i++) {
    //                     ul.append('<li><label><input type="checkbox" name="'+list[i]+'">'+list[i]+'</label></li>');
    //                 }
    //             }
    //
    //             clearOldInfo($pickDancePrograms);
    //             clearOldInfo($pickAgeCategories);
    //             clearOldInfo($pickNominations);
    //             clearOldInfo($pickLeagues);
    //
    //             addNewInfo($pickDancePrograms, programsList);
    //             addNewInfo($pickAgeCategories, ageCategoriesList);
    //             addNewInfo($pickNominations, nominationsList);
    //             addNewInfo($pickLeagues, leaguesList);
    //         },
    //         error: function (msg) {
    //             console.log(msg);
    //         }
    //     });
    // }

    // function ajax_saveDanceCategoryParameters() {
    //     var $id=$('#add-dance-categories-parameters').attr('data-id-dancing-group'),
    //         pickedParameters=[];
    //     $('.pick-dancing-group-parameters-wrapper').find('form').each(function(){
    //         pickedParameters.push($(this).serializeArray());
    //     });
    //     pickedParameters=JSON.stringify(pickedParameters);
    //     $.ajax({
    //         type: "POST",
    //         url: 'ajax_saveDanceCategoryParameters',
    //         data: 'id='+$id+'&parameters='+pickedParameters,
    //         success:function () {
    //
    //         },
    //         error: function (msg) {
    //             console.log(msg);
    //         }
    //     });
    // }

    $body.on('click', '.dancing-group-list-item', function(){
        var $danceGroups=$('#pick-dancing-groups').children(),
            $sendBtn=$('#add-dance-categories-parameters');

        $sendBtn.removeAttr('data-id-dancing-group');
        $sendBtn.attr('data-id-dancing-group', $(this).attr('data-id-dancing-group'));

        $danceGroups.each(function () {
            $(this).removeClass('picked-dancing-group');
        });

        $(this).addClass('picked-dancing-group');
        
        //ajax_settingUpDancingCategory($(this));
        function ajax_settingUpDancingCategory(a) {
            var id=a.attr('data-id-dancing-group');
            $.ajax({
                type:"POST",
                url:'ajax_settingUpDancingCategory',
                data: 'id='+id,
                success: function(msg){
                    var msg=JSON.parse(msg),
                        programs=msg['d_program'],
                        ageCategories=msg['d_age_category'],
                        nominations=msg['d_nomination'],
                        leagues=msg['d_league'],
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
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        }

        ajax_settingUpDancingCategory($(this));

    });

    $body.on('click', '#add-dance-categories-parameters', function(e) {
        e.preventDefault();
    });

    $body.on('click', '#add-dance-categories-parameters', function () {
        var $id=$('#add-dance-categories-parameters').attr('data-id-dancing-group'),
            pickedParameters=[];
        $('.pick-dancing-group-parameters-wrapper').find('form').each(function(){
            pickedParameters.push($(this).serializeArray());
        });
        pickedParameters=JSON.stringify(pickedParameters);
        $.ajax({
            type: "POST",
            url: 'ajax_saveDanceCategoryParameters',
            data: 'id='+$id+'&parameters='+pickedParameters,
            success:function () {
                console.log('id='+$id+'&parameters='+pickedParameters);
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });
});


