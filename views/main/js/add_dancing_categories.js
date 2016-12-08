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

        ajax_settingUpDancingCategory($(this));

    });

    $body.on('click', '#add-dance-categories-parameters', function(e) {
        e.preventDefault();
    });

    $body.on('click', '#add-dance-categories-parameters', function () {
        var
            $id=$('#add-dance-categories-parameters').attr('data-id-dancing-group'),
            pickedParameters=[],
            pickedParametersWrapper={};
        $('.pick-dancing-group-parameters-wrapper').find('form').each(function(){
            pickedParameters.push($(this).serializeArray());
        });

        if (pickedParameters[0].length>0&&pickedParameters[1].length>0&&pickedParameters[2].length>0&&pickedParameters[3].length>0) {
            pickedParameters.push($id);
            pickedParametersWrapper["massive"]=pickedParameters;

            var org_id= window.location.href;// Roma added these lines
            org_id=org_id.split('/');// Roma added these lines
            org_id=org_id[org_id.length-1];// Roma added these lines
            console.log(org_id);// Roma added these lines
            $.ajax({
                type: "POST",
                url: 'ajax_saveDanceCategoryParameters/'+org_id,// Roma added these lines
                // data: 'b='+pickedParameters,
                data: pickedParametersWrapper,
                success:function (msg) {
                    alert(msg);
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        } else {
            alert('выберите все параметры');
        }
    });
});
