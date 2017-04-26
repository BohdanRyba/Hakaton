jQuery(function($) {
    var $body=$('body'),
        $modal=$('#deletionModal'),
        $modalBody=$modal.find('.modal-body'),
        $modalFooter=$modal.find('.modal-footer'),
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
            $modalBody.empty().append('<p class="text-bold">Забрать выбранные категории из этого события?</p>');
            $modalFooter.empty().append('<button type="button" id="deletionConfirmation" class="btn btn-danger text-capitalize">да!</button><button type="button" class="btn btn-default text-capitalize" data-dismiss="modal">отмена</button>');
            $modal.modal();
        }
    });
    //confirm deletion HERE MUST BE AJAX
    $body.on('click', '#deletionConfirmation', function () {
        function ajax_sendRemovedCategories() {
            var categories=[];
            $categoriesBlock.find('[data-checked="checked"]').each(function () {
                categories.push($(this).find('input').attr('name'));
            });

            console.log(categories);
            $.ajax({
                type:"POST",
                url:'ajax_sendRemovedCategories',
                data: categories,
                success: function (msg) {
                    console.log('ajax_sendRemovedCategories has worked successfully!');
                    $modalBody.empty().append('<p>Изменения сохраненны успешно!</p>');
                    $modalFooter.empty().append('<button type="button" class="btn btn-primary" data-dismiss="modal">ок</button>');
                    $resultModal.modal();
                    $deleteBtn.attr('data-status', 'initial').text('забрать категории');
                    $denyBtn.addClass('displayNone');
                    $categoriesBlock.children().each(function () {
                        $(this).removeAttr('data-checked').find('input').addClass('displayNone');
                    });
                },
                error: function (msg) {
                    console.log('ajax_sendRemovedCategories has failed work!');
                    $modalBody.empty().append('<p>Ошибка! Повторите операцию.</p>');
                    $modalFooter.empty().append('<button type="button" class="btn btn-primary" data-dismiss="modal">ок</button>');
                    $resultModal.modal();
                }
            });
        }
        ajax_sendRemovedCategories();

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