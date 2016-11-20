jQuery(function($) {

    var $danceGroups=$('#pick-dancing-groups').children(),
        $send=$('.send-info'),
        $pickParameters=$('.pick-dancing-group-parameters-wrapper');

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

    $danceGroups.each(function(){
        $(this).removeClass('picked-dancing-group');
    });

    $danceGroups.on('click', function(){
        $danceGroups.each(function () {
            $(this).removeClass('picked-dancing-group');
        });
        $(this).addClass('picked-dancing-group');

        ajax_settingUpDancingCategory($(this));

    });

    $send.on('click', function(e) {
        e.preventDefault();
    });

    $send.on('click',  function serializeCheckboxes () {
        var pickedParameters=[];
        $pickParameters.find('form').each(function(){
            pickedParameters.push(($(this).serialize()));
        });
        console.log(pickedParameters);
    });



});