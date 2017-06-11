jQuery(function($) {

    var $menuItems=$('.dance-group-menu a'),
        $infoWrapper=$('#main_info_wrapper'),
        $body=$('body'),
        $departmentsContent=$('#departments_content'),
        //DEPARTMENTS LIST
        $deleteDepartmentModal=$('#confirmDepartmentDeletion'),
        $editDepartmentModal=$('#editDepartmentName'),
        $createDepartmentModal=$('#createDepartment'),
        //DEPARTMENTS FIILLING
        $danceProgramsList=$('#dance-program-to-pick-categories'),
        $departmentsFillingPanelBody=$('#departments-filling-panel-body'),
        $departmentsFillingCategoriesList=$('#categories-list'),
        $departmentsFillingSaveBtn=$('#update-dancing-department-info'),
        //DEPARTMENTS EDITION
        $departmentsEditionSaveBtn=$('#update-dancing-department-categories-list'),
        $departmentsEditionPanelBody=$('#departments-edition-panel-body'),
        $departmentsEditionTransferCategory=$('#transferCategory'),
        $contentBlock = $('#department-categories-list'),
        $transferConformation = $('#confirmTransfer'),
        $confirmCategoryDeletion = $('#confirmCategoryDeletion'),
        $confirmCategoryDeletionBtn = $('#deleteCategory');

    function toggleVisibility (target, visibility) {
        target.css('display', visibility);
    }

    function getEventId() {
        var eventId=window.location.href;

        eventId=eventId.split('/');
        eventId=eventId[eventId.length-1];
        eventId= parseInt(eventId);

        return eventId;
    }

        setTimeout(function () {
            $body.find('.alert').slideUp(450, function () {
                $(this).remove();
            })}, 5500);


//МЕНЮ
    $menuItems.on('click', function (e) {
        e.preventDefault();
        $infoWrapper.children().each(function(){
            toggleVisibility ($(this), 'none');
        });
        $menuItems.each(function () {
            $(this).removeClass('active');
        });
        $(this).addClass('active');
        $($(this).attr('href')).show();
        document.cookie = "lastOpenedTab=" + $('.dance-group-menu').find('.active').attr('href');
    });
//МЕНЮ

//DEPARTMENTS LIST
    //department deletion
    $('.delete-department').on('click', function () {
        var $modalBody=$deleteDepartmentModal.find('.modal-body'),
            $li=$(this).parents('li');
        $modalBody.find('p').remove();
        // $('#dancing-group-deletion-id').val($li.attr('data-id-dancing-group'));
        $modalBody.prepend('<p>Вы действительно хотите удалить танцевальное отделение <b>'+ $li.find('.department-name').text()+'</b> ?</p>');
        $deleteDepartmentModal.find('[name="department-id"]').val($(this).parents('li').attr('data-id-department'));
    });

    //department name edition
    $('.edit-info-about-department').on('click', function () {
        var $modalBody=$editDepartmentModal.find('.modal-body'),
            $li=$(this).parents('li');
        $modalBody.find('p').remove();
        // $('#dancing-group-deletion-id').val($li.attr('data-id-dancing-group'));
        $modalBody.prepend('<p>Вы собираетесь переименовать отделение <b>'+ $li.find('.department-name').text()+'</b> .</p>');
        $editDepartmentModal.find('[name="department-id"]').val($(this).parents('li').attr('data-id-department'));
    });

    $('[name="new-department-name-confirmation-btn"]').on('click', function (e) {
        var name=$editDepartmentModal.find('#newDepartment').val();
        if (name=='') {
            e.preventDefault();
        }
    });

//DEPARTMENTS LIST
//    =========================================================================================================
//DEPARTMENTS FIILLING
    //show picked dance program
    $body.on('click', '.dance-program-name', function () {
        $danceProgramsList.children().each(function () {
            $(this).removeClass('picked-dancing-program');
        });
        $(this).addClass('picked-dancing-program');
    });

//   visual designation for picked categories
    $body.on('click', '.pick-dancing-categories-for-department', function () {
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
            $liRemove=$('.to_remove'),
            $liTrue = $('.true_var');

        if ($liRemove.length == 0) {
            if ($checkAll.prop('checked')==true) {
                $liTrue.each(function () {
                    $(this).find('[type="checkbox"]').prop('checked', true);
                    $(this).attr('data-checked', 'checked');
                })
            } else {
                $liTrue.each(function () {
                    $(this).find('[type="checkbox"]').prop('checked', false);
                    $(this).removeAttr('data-checked');
                })
            }
        } else {
            if ($checkAll.prop('checked')==true) {
                $liRemove.each(function () {
                    let id = $(this).attr('data-id');

                    $categoriesBlock.find('.true_var').each(function(){
                        if ($(this).attr('data-id') == id) {
                            $(this).attr('data-checked', 'checked');
                            $(this).find('input').prop('checked', true);
                        }
                    });

                    $(this).find('[type="checkbox"]').prop('checked', true);
                    $(this).attr('data-checked', 'checked');
                })
            } else {
                $liRemove.each(function () {
                    let id = $(this).attr('data-id');

                    $categoriesBlock.find('.true_var').each(function(){
                        if ($(this).attr('data-id') == id) {
                            $(this).removeAttr('data-checked');
                            $(this).find('input').prop('checked', false);
                        }
                    });

                    $(this).find('[type="checkbox"]').prop('checked', false);
                    $(this).removeAttr('data-checked');
                })
            }
        }

    });

//   dropdown pick department
    $body.on('click', '.dropdown-menu-department',function () {
        var $departments=$(this).parent().children(),
            $departmentName=$(this).children().text(),
            $seeDepartmentName=$('#see-department-name');

        $departments.each(function () {
            $(this).removeClass('active');
        });
        $(this).addClass('active');
        // $(this).parents('.dropdown').find('.dropdown-toggle').html($departmentName+'<span class="caret"></span>');
        $seeDepartmentName.text($departmentName);
        if ($departmentsFillingPanelBody.css('display')=='none') {
            toggleVisibility ($departmentsFillingPanelBody,'block');
        }
        toggleVisibility ($departmentsFillingCategoriesList,'none');

        $danceProgramsList.find('.picked-dancing-program').removeClass('picked-dancing-program');
        $('#pick-dancing-categories-for-department').find('ul').empty();
    });

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!AJAX TO BE ADDED HERE (AJAX THAT ADDS DANCING PROGRAMS IN $danceProgramsList THAT ARE USED IN THE DEPARTMENT)!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  view categories according to dance program name
    $body.on('click', '.dance-program-name', function () {
        var name=$(this).attr('data-name');
        var department_ids = [];
        $('#departments-to-fill').find('li').each(function () {
            department_ids.push($(this).data('department-id'));
        });
        toggleVisibility($departmentsFillingCategoriesList, 'block');
        function ajax_getCategories() {
            $.ajax({
                type:"POST",
                url:'ajax_getCategoriesToPickForDepartment',
                data: {
                    d_c_program : name,
                    department_ids : department_ids
                },
                success: function (msg) {
                    var msg = JSON.parse(msg)['dance_categories'];
                    console.log('ajax_sendRemovedCategories has worked successfully!');
                    let $searchedCategoriesBlock = $('#pick-dancing-categories-for-department').find('ul');
                    $searchedCategoriesBlock.empty();
                    $fillingSearch.val('');

                    if (msg.length > 0) {
                        $searchedCategoriesBlock.append('<li id="check-all-dancing-categories" class="prevent-text-emphasizing"><label><input class="text-capitalize" type="checkbox">выбрать все</label></li>');

                        for (var i=0; i<msg.length; i++) {
                        var category=msg[i],
                            program=category['d_c_program'],
                            ageCategory=category['d_c_age_category'],
                            nomination=category['d_c_nomination'],
                            league=category['d_c_league'],
                            id=category['id'],
                            generalName=program+' '+ageCategory+' '+nomination+' '+league;

                        $searchedCategoriesBlock.append('<li data-id="'+id+'" class="true_var prevent-text-emphasizing pick-dancing-categories-for-department"><label><input type="checkbox" name="'+generalName+'">'+generalName+'</label></li>');
                        }
                    } else {
                        $searchedCategoriesBlock.append('<li class="prevent-text-emphasizing text-bold"><div class="flat callout callout-danger"><p>Больше нет доступных категорий.</p></div></li>');
                    }

                },
                error: function (msg) {
                    console.log('ajax_sendRemovedCategories has failed to work!');
                    let $searchedCategoriesBlock = $('#pick-dancing-categories-for-department').find('ul');
                    $searchedCategoriesBlock.empty();
                    $searchedCategoriesBlock.append('<li class="prevent-text-emphasizing text-uppercase">ошибка. повторите попытку.</li>');
                }
            });
        }
        ajax_getCategories();
        //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!AJAX TO BE ADDED HERE (AJAX THAT SHOWS CATEGORIES $danceProgramsList THAT ARE USED IN THE DANCING PROGRAM)!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    });

    var $fillingSearch = $('#departments-search-category'),
        $categoriesBlock = $('#pick-dancing-categories-for-department').children('ul');

    $fillingSearch.on('keyup', function () {
        const queryString = $(this).val().toLowerCase().match(/^\s*(.*)/)[1];
        let $checkAll = $('#check-all-dancing-categories');

        $categoriesBlock.find('.to_remove').each(function () {
            // if ($(this).attr('data-checked')=='checked') {
            //     let name = $(this).find('label').text();
            //     $categoriesBlock.find('.true_var').each(function () {
            //         if ($(this).find('label').text() == name) {
            //             $(this).attr('data-checked', 'checked');
            //         }
            //     });
            // }
            $(this).remove();
        });
        $categoriesBlock.find('.callout').parent().remove();

        $checkAll.find('input').prop('checked', false);

        if (queryString=='') {
            let $liTrue = $categoriesBlock.find('.true_var');

            if ($liTrue.length > 0) {
                $liTrue.each(function () {
                    $(this).removeClass('displayNone');
                });
                toggleVisibility($checkAll, 'block');
            } else {
                $checkAll.remove();
                $categoriesBlock.append('<li class="prevent-text-emphasizing text-bold"><div class="flat callout callout-danger"><p>Больше нет доступных категорий.</p></div></li>');
            }
        } else {
            let allCategories = [];

            $categoriesBlock.find('.true_var').each(function () {
                let category = {},
                    $categoryLi=$(this);

                $categoryLi.addClass('displayNone');
                category.id = $categoryLi.attr('data-id');
                category.name = $categoryLi.find('label').text();
                category['data-checked'] = $categoryLi.attr('data-checked');
                allCategories.push(category);
            });

            let filteredCategories = allCategories.filter(function (element) {
                    return element.name.toLowerCase().includes(queryString);
                }
            );

            if (filteredCategories.length != 0) {
                toggleVisibility($checkAll, 'block');

                filteredCategories.forEach(function (item) {
                    let pickedStatus = (function () {if (item['data-checked']) {return 'checked';} else {return '';}})();
                    $categoriesBlock.append('<li data-id="'+item.id+'" data-checked="'+pickedStatus+'" class="to_remove prevent-text-emphasizing pick-dancing-categories-for-department"><label><input type="checkbox" '+pickedStatus+' name="'+item.name+'">'+item.name+'</label></li>');
                });

                let $searchedCategories=$categoriesBlock.find('.to_remove');

                $searchedCategories.each(function () {
                    let parse=$(this).find('label').html().match(/(.*)/),
                        labelHtml = parse[1].match(/(<input.*>)(.*)/),
                        input = labelHtml[1],
                        text = labelHtml[2],
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
                    text=input+categoryFragments.join('');
                    $(this).find('label').html(text);
                });
            } else {
                toggleVisibility($checkAll, 'none');
                $categoriesBlock.append('<li class="prevent-text-emphasizing text-bold"><div class="flat callout callout-danger"><p>Таких категорий нет.</p></div></li>');
            }
        }
    });

    $body.on('click', '.to_remove', function () {
       let id = $(this).attr('data-id'),
           checkedStatus = $(this).attr('data-checked');

        if (checkedStatus) {
            $categoriesBlock.find('.true_var').each(function(){
                if ($(this).attr('data-id') == id) {
                    $(this).attr('data-checked', checkedStatus);
                    $(this).find('input').prop('checked', true);
                }
            });
        } else {
            $categoriesBlock.find('.true_var').each(function(){
                if ($(this).attr('data-id') == id) {
                    $(this).removeAttr('data-checked');
                    $(this).find('input').prop('checked', false);
                }
            });
        }
    });


//  show save btn
    $body.on('click', '#check-all-dancing-categories', function () {
        toggleVisibility($departmentsFillingSaveBtn, 'block');
    });
    $body.on('click', '.pick-dancing-categories-for-department', function () {
        toggleVisibility($departmentsFillingSaveBtn, 'block');
    });

    $body.on('click', '#update-dancing-department-info', function () {
        let $searchedCategoriesBlock = $('#pick-dancing-categories-for-department').find('ul');
        var pickedCategories = [],
            department = parseInt($('#departments-to-fill').children('.active').attr('data-department-id'));

        let $liRemove = $searchedCategoriesBlock.find('.to_remove'),
            $checkAll = $('#check-all-dancing-categories');

        if ($liRemove.length == 0) {

            if ($checkAll.css('display') != 'none') {

                $searchedCategoriesBlock.children('[data-checked="checked"]').each(function () {
                    pickedCategories.push(parseInt($(this).attr('data-id')));
                });

                if (pickedCategories.length > 0) {
                    ajax_sendCategories();
                }

            }
        } else {

            $liRemove.each(function () {
                if ($(this).attr('data-checked') == 'checked') {pickedCategories.push(parseInt($(this).attr('data-id')));}

                if (pickedCategories.length > 0) {
                    ajax_sendCategories();
                }
            });

        }

        // console.log(department);
        // console.log(pickedCategories);

        function ajax_sendCategories() {
            $.ajax({
                type:"POST",
                url:'ajax_sendCategoriesPickedForDepartment',
                data: {
                    department : department,
                    pickedCategories : pickedCategories
                },
                success: function (msg) {
                    console.log(JSON.parse(msg));
                    console.log('ajax_sendCategoriesPickedForDepartment has worked successfully!');

                    let $liRemove = $searchedCategoriesBlock.find('.to_remove');

                    if ($liRemove.length == 0 && $checkAll.css('display') != 'none') {
                        $searchedCategoriesBlock.children('[data-checked="checked"]').each(function () {
                            $(this).remove();
                        });
                    } else if ($liRemove.length == 0 && $checkAll.css('display') == 'none') {
                        $searchedCategoriesBlock.append('<li class="prevent-text-emphasizing text-bold"><div class="flat callout callout-danger"><p>Больше нет доступных категорий.</p></div></li>');
                    } else if ($liRemove.length > 0) {
                        $liRemove.each(function () {
                            if ($(this).attr('data-checked') == 'checked') {
                                let id = $(this).attr('data-id');
                                $searchedCategoriesBlock.find('[data-id="'+id+'"]').each(function () {
                                    $(this).remove();
                                });
                            }
                        });
                    }

                    console.log($liRemove);
                    let $liTrue = $searchedCategoriesBlock.find('.true_var');

                    if ($searchedCategoriesBlock.find('.to_remove').length == 0 && $checkAll.css('display') != 'none' && $liTrue.length == 0) {
                        $searchedCategoriesBlock.children().eq(0).remove();
                        $searchedCategoriesBlock.append('<li class="prevent-text-emphasizing text-bold"><div class="flat callout callout-danger"><p>Больше нет доступных категорий.</p></div></li>');
                    } else if ($searchedCategoriesBlock.find('.to_remove').length == 0 && $checkAll.css('display') != 'none' && $liTrue.length > 0) {
                        toggleVisibility($checkAll, 'none');
                        $searchedCategoriesBlock.append('<li class="prevent-text-emphasizing text-bold"><div class="flat callout callout-danger"><p>Больше нет доступных категорий.</p></div></li>');
                    }

                    toggleVisibility($departmentsFillingSaveBtn, 'none');
                },
                error: function (msg) {
                    console.log('ajax_sendCategoriesPickedForDepartment has failed to work!');
                }
            });
        }
        // ajax_sendCategories();
        //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!AJAX TO BE ADDED HERE (AJAX THAT saves CATEGORIES $danceProgramsList THAT ARE USED IN THE DANCING PROGRAM)!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    });
//DEPARTMENTS FIILLING


//DEPARTMENTS EDITION
    //   dropdown pick department
    $body.on('click', '.dropdown-menu-department-content',function () {
        var $departments=$(this).parent().children(),
            $departmentName=$(this).children().text(),
            $seeDepartmentName=$('#see-department-content-name');

        $departments.each(function () {
            $(this).removeClass('active');
        });
        $(this).addClass('active');

        let activeDepartment = $(this).parent().find('.active').attr('data-department-id');
        function getDepartmentContent () {
            $.ajax({
                type:"POST",
                url:'ajax_getDepartmentContent',
                data: {
                    department : activeDepartment
                },
                success: function (msg) {
                    console.log('ajax_getDepartmentContent has worked successfully!');
                    $seeDepartmentName.text($departmentName);
                    var msg = JSON.parse(msg)['categories'],
                        $block = $('#department-categories-list');
                    $block.empty();

                    console.log(msg);

                    if (msg != undefined) {
                        for (var i=0; i<msg.length; i++) {
                            var category=msg[i],
                                program=category['d_c_program'],
                                ageCategory=category['d_c_age_category'],
                                nomination=category['d_c_nomination'],
                                league=category['d_c_league'],
                                id=category['id'],
                                generalName=program+' '+ageCategory+' '+nomination+' '+league;

                            $block.append('<div class="dp-info-wrapper">'+
                                '<p class="dance-category-name prevent-text-emphasizing text-bold" data-id="'+id+'">'+generalName+'</p>'+
                                '<div class="prevent-text-emphasizing btn-group-sm flat" role="group">'+
                                '<button type="button" class="btn btn-success edit-created-category-info edit-button btn-flat"><i class="fa fa-exchange"></i></button>'+
                                '<button type="button" class="btn btn-danger delete-created-categories-info delete-button btn-flat"><i class="fa fa-trash"></i></button>'+
                                '</div>'+
                                '</div>');
                        }
                    } else {
                        $block.append('<div class="dp-info-wrapper"><p class="dance-category-name prevent-text-emphasizing text-bold">Отделение пусто.</p></div>');
                    }

                    if ($departmentsEditionPanelBody.css('display')=='none') {
                        toggleVisibility ($departmentsEditionPanelBody,'block');
                    }
                },
                error: function (msg) {
                    console.log('ajax_getDepartmentContent has failed to work!');
                    alert('Ошибка, повторите действие.');
                }
            });
        }
        getDepartmentContent ();
        // $(this).parents('.dropdown').find('.dropdown-toggle').html($departmentName+'<span class="caret"></span>');


    });

    var transferedCategory;
    //  click on btn to transfer category
    $body.on('click', '.edit-created-category-info', function () {
        transferedCategory = $(this).parents('.dp-info-wrapper').find('.dance-category-name').attr('data-id');

        var currentDepartment=$departmentsContent.find('.dropdown-menu').children('.active').text(),
            $from=$departmentsEditionTransferCategory.find('[data-direction="from"]'),
            $to=$departmentsEditionTransferCategory.find('[data-direction="to"]'),
            departments={};
        let $menu=$departmentsEditionTransferCategory.find('.dropdown-menu');

        $departmentsContent.find('.dropdown-menu').children().each(function () {
            departments[$(this).text()]=$(this).attr('data-department-id');
        });
        delete departments[currentDepartment];

        $menu.empty();

        // fill dropdown menu with available departments to choose from
        for (var key in departments) {
            $menu.append('<li data-department-id="'+departments[key]+'" class="transfer-to dropdown-menu-department prevent-text-emphasizing"><a href="#">'+key+'</a></li>');
        }

        $to.text('');
        $to.removeAttr('data-depid');
        $from.removeAttr('data-depid');
        $departmentsEditionTransferCategory.find('.dropdown-menu-department').each(function () {
            $(this).removeClass('active');
        });
        $from.text(currentDepartment);
        let curId = $departmentsContent.find('.dropdown-menu').children('.active').attr('data-department-id');
        $from.attr('data-depid', curId);
        $departmentsEditionTransferCategory.modal();
    });

    //  choose what department to transfer category in
    $body.on('click', '.transfer-to', function () {
        var $to=$departmentsEditionTransferCategory.find('[data-direction="to"]'),
            toName=$(this).text(),
            id = $(this).attr('data-department-id');

        $to.text(toName);
        $to.attr('data-depid', id);
    });

    $transferConformation.on('click', function () {
        let $modalTrans = $('#transferCategory'),
            from = $modalTrans.find('[data-direction="from"]').attr('data-depid'),
            to = $modalTrans.find('[data-direction="to"]').attr('data-depid');

        if (to == undefined) {return false} else {
            function transferCategory() {
                $.ajax({
                    type:"POST",
                    url:'ajax_transferCategory',
                    data: {
                        category : parseInt(transferedCategory),
                        to : parseInt(to),
                        from : parseInt(from)
                    },
                    success: function (msg) {
                        console.log('ajax_delCategory has worked successfully!');
                        $contentBlock.find('[data-id="'+transferedCategory+'"]').parents('.dp-info-wrapper').remove();
                        $modalTrans.modal('hide');
                        transferedCategory = undefined;
                    },
                    error: function (msg) {
                        console.log('ajax_delCategory has failed to work!');
                        alert('Ошибка, повторите действие.');
                    }
                });
            }
            transferCategory();
        }
    });

    // #confirmCategoryDeletion
    var categoryToDelete;
    $body.on('click', '.delete-created-categories-info', function () {
        let $categoryBlock = $(this).parents('.dp-info-wrapper').find('.dance-category-name'),
            name = $categoryBlock.text();

        categoryToDelete = $categoryBlock.attr('data-id');
        $confirmCategoryDeletion.find('.modal-body').find('span').text(name);
        $confirmCategoryDeletion.modal();
    });

    $confirmCategoryDeletionBtn.on('click', function () {
        let activeDepartment = $('#dropdownMenuContent').find('.active').attr('data-department-id');
        function delCategory() {
            $.ajax({
                type:"POST",
                url:'ajax_delCategory',
                data: {
                    categoryId : parseInt(categoryToDelete),
                    department : parseInt(activeDepartment)
                },
                success: function (msg) {
                    console.log('ajax_delCategory has worked successfully!');
                    $contentBlock.find('[data-id="'+categoryToDelete+'"]').parents('.dp-info-wrapper').remove();
                    $confirmCategoryDeletion.modal('hide');
                    categoryToDelete = undefined;
                },
                error: function (msg) {
                    console.log('ajax_delCategory has failed to work!');
                    alert('Ошибка, повторите действие.');
                }
            });
        }
        delCategory();
    });

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!AJAX TO BE ADDED HERE (AJAX THAT ADDS DANCING PROGRAMS IN $danceProgramsList THAT ARE USED IN THE DEPARTMENT)!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//DEPARTMENTS EDITION

});


















