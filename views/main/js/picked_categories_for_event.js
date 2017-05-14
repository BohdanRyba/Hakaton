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
                data: {
                    categories : categories
                },
                success: function (msg) {
                    console.log(msg);
                    console.log('ajax_sendRemovedCategories has worked successfully!');
                    $modalBody.empty().append('<p>Изменения сохраненны успешно!</p>');
                    $modalFooter.empty().append('<button type="button" class="btn btn-primary" data-dismiss="modal">ок</button>');
                    // $resultModal.modal();
                    $deleteBtn.attr('data-status', 'initial').text('забрать категории');
                    $denyBtn.addClass('displayNone');
                    $categoriesBlock.children().each(function () {
                        $(this).removeAttr('data-checked').find('input').addClass('displayNone');
                    });
                    categories.forEach(function (item) {
                        $categoriesBlock.find('[name='+item+']').parents('li').remove();
                    });
                },
                error: function (msg) {
                    console.log('ajax_sendRemovedCategories has failed to work!');
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



    var $searchInput=$('#searchInput');

    $searchInput.on('keyup', function () {
        const queryString = $(this).val().toLowerCase().match(/^\s*(.*)/)[1];

        $categoriesBlock.find('.to_remove').each(function () {
            $(this).remove();
        });

        if (queryString=='') {
            $categoriesBlock.find('.true_var').each(function () {
               $(this).removeClass('displayNone');
            });
        } else {
            let allCategories = [];

            $categoriesBlock.find('.true_var').each(function () {
                let category = {},
                    $categoryLi=$(this),
                    $categoryInput=$categoryLi.find('input');

                $categoryLi.addClass('displayNone');
                category.name = $categoryInput.attr('name');
                category['data-checked'] = $categoryLi.attr('data-checked');
                category.displayNone = $categoryInput.hasClass('displayNone');
                allCategories.push(category);
            });

            let filteredCategories = allCategories.filter(function (element) {
                    return element.name.toLowerCase().includes(queryString);
                }
            );

            filteredCategories.forEach(function (item) {
                let displayNone = (function () {if (item.displayNone) {return 'displayNone';} else {return '';}})();
                $categoriesBlock.append('<li class="pick_dancing_categories_for_event to_remove" data-checked="'+item['data-checked']+'"><label><input class="'+displayNone+'" type="checkbox" name="'+item.name+'">'+item.name+'</label></li>');
            });

            let $searchedCategories=$categoriesBlock.find('.to_remove');

            $searchedCategories.each(function () {
                let parse=$(this).find('label').html().match(/(<.*>)(.*)/),
                    preText=parse[1],
                    text=parse[2],
                    regexp = new RegExp(queryString, 'i'),
                    regexpGlobal = new RegExp(queryString, 'gi'),
                    coincidences = text.match(regexpGlobal).length,
                    categoryFragments = [];

                for (let i=0; i<coincidences; i++) {
                    let thisCoincidence;

                    if (i==0) {
                        thisCoincidence = text.match(regexp)[0];
                        let coincidenceLength = thisCoincidence.length,
                            pos = text.indexOf(thisCoincidence);
                        categoryFragments.push(text.slice(0,pos));
                        thisCoincidence = '<span class="searchedFragment">'+thisCoincidence+'</span>';
                        categoryFragments.push(thisCoincidence);
                        categoryFragments.push(text.slice(pos+coincidenceLength));
                    } else {
                        let str = categoryFragments[categoryFragments.length-1];
                        thisCoincidence = str.match(regexp)[0];
                        let coincidenceLength = thisCoincidence.length,
                            pos = categoryFragments[categoryFragments.length-1].indexOf(thisCoincidence);
                        categoryFragments[categoryFragments.length-1]=str.slice(0,pos);
                        thisCoincidence = '<span class="searchedFragment">'+thisCoincidence+'</span>';
                        categoryFragments.push(thisCoincidence);
                        categoryFragments.push(str.slice(pos+coincidenceLength));
                    }
                }
                text=categoryFragments.join('');
                $(this).find('label').html(preText+text);
                if ($(this).attr('data-checked')=='checked') {$(this).find('input').prop('checked', true);}
            });
        }
    });
});