jQuery(function($) {
    var $body=$('body'),
        $modal=$('#deletionModal'),
        $deleteBtn=$('#delete_picked_categories'),
        $denyBtn=$('#deny_deletion'),
        $categoriesBlock=$('#picked_dancing_categories_for_event').find('ul');

    //deleteBtn click function
    $body.on('click', '#delete_picked_categories', function () {
        var status=$deleteBtn.attr('data-status');

        if (status=='initial') {
            $deleteBtn.attr('data-status', 'pick').text('забрать выбранные категории');
            $denyBtn.removeClass('displayNone');
            $categoriesBlock.children().each(function () {
                $(this).find('input').removeClass('displayNone').prop('checked', false);
            });
        } else if (status=='pick') {
            $modal.modal();
        }
    });
    //confirm deletion HERE MUST BE AJAX
    $body.on('click', '#deletionConfirmation', function () {
        $deleteBtn.attr('data-status', 'initial').text('забрать категории');
        $denyBtn.addClass('displayNone');
        $modal.modal('hide');
        $categoriesBlock.children().each(function () {
            $(this).removeAttr('data-checked').find('input').addClass('displayNone');
        });
    });
    //deny deletion
    $body.on('click', '#deny_deletion', function () {
        $(this).addClass('displayNone');
        $deleteBtn.attr('data-status', 'initial').text('забрать категории');
        $categoriesBlock.children().each(function () {
            $(this).removeAttr('data-checked').find('input').addClass('displayNone');
        });
    });
    //check checkboxes
    $body.on('click', '.pick_dancing_categories_for_event', function () {
        var status=$deleteBtn.attr('data-status');

        if (status=='pick') {
            var $inputStatus=$(this).find('input').prop('checked');
            if ($inputStatus==false) {
                $(this).removeAttr('data-checked');
            } else {
                $(this).attr('data-checked','checked');
            }
        }
    });
    
});