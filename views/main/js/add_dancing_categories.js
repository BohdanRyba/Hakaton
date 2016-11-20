jQuery(function($) {

    var $body=$('body');

    // var $danceGroups=$('#pick-dancing-groups').children(),
    //     $send=$('.send-info'),
    //     $pickParameters=$('.pick-dancing-group-parameters-wrapper');

    function ajax_settingUpDancingCategory(danceGroup) {
        var id=danceGroup.attr('data-id-dancing-group');
        $.ajax({
            type:"POST",
            url:'ajax_settingUpDancingCategory',
            data: 'id='+id,
            success: console.log('ajax_settingUpDancingCategory works!!!'),
            error: function (msg) {
                console.log(msg);
            }
        });
    }


    $('#pick-dancing-groups').children().each(function(){
        $(this).removeClass('picked-dancing-group');
    });

    $body.on('click', $('#pick-dancing-groups').children(), function(){
        var $danceGroups=$('#pick-dancing-groups').children();

        $danceGroups.each(function () {
            $(this).removeClass('picked-dancing-group');
        });
        $(this).addClass('picked-dancing-group');

        ajax_settingUpDancingCategory($(this));

    });

    $body.on('click', '#add-dance-categories-parameters', function(e) {
        e.preventDefault();
    });

    $body.on('click', '#add-dance-categories-parameters', function() {
        var pickedParameters=[];
        $('.pick-dancing-group-parameters-wrapper').find('form').each(function(){
            pickedParameters.push(($(this).serialize()));
        });
        console.log(pickedParameters);
    });



});