jQuery(function($) {

    var $menuItems=$('.dance-group-menu a'),
        $infoWrapper=$('#main_info_wrapper'),
        $body=$('body'),
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
        $departmentsEditionTransferCategory=$('#transferCategory');

    function toggleVisibility (target, visibility) {
        target.css('display', visibility);
    }


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
    });

    //department name edition
    $('.edit-info-about-department').on('click', function () {
        var $modalBody=$editDepartmentModal.find('.modal-body'),
            $li=$(this).parents('li');
        $modalBody.find('p').remove();
        // $('#dancing-group-deletion-id').val($li.attr('data-id-dancing-group'));
        $modalBody.prepend('<p>Вы собираетесь переименовать отделение <b>'+ $li.find('.department-name').text()+'</b> .</p>');
    });

    //create new department
    $('#create_new_department').on('click', function () {
        // var $modalBody=$editDepartmentModal.find('.modal-body'),
        //     $li=$(this).parents('li');
        // $modalBody.find('p').remove();
        // $('#dancing-group-deletion-id').val($li.attr('data-id-dancing-group'));
    });

    $('#send-created-department').on('click', function () {
        var name=$createDepartmentModal.find('#newDepartment').val();

        console.log(name);
        $.ajax({
            type:"POST",
            url:'ajax_',
            data: ,
            success: function(msg) {
                console.log(msg);
                var $ul=$('#departments_list').find('.dancing-department-list-wrapper');

                $ul.append('<li data-id-dancing-group="'+id+'"><div class="btn-group-xs button-wrapper">
                    <button type="button" class="show-info-about-dance-group btn btn-info btn-flat"><i class="fa fa-info"></i></button>
                    <button type="button" data-toggle="modal" data-target="#editDepartmentName" class="edit-info-about-department btn btn-success btn-flat"><i class="fa fa-edit"></i></button>
                    <button type="button" data-toggle="modal" data-target="#confirmDepartmentDeletion" class="delete-department btn btn-danger delete-button btn-flat"><i class="fa fa-trash"></i></button>
                    </div>
                    <p class="department-name">'+name+'</p></li>');

                $createDepartmentModal.find('[data-dismiss="modal"]').trigger('click');
            },
            error: function (msg) {
                console.log(msg);
                alert('Ошибка! Попробуйте ещё раз.');
                console.log('ajax_THAT_ADDS_CATEGORIES_ACCORDING_TO_PARAMETER (ajax2) has failed work!');
            }
        });
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
            $li=$('.pick-dancing-categories-for-department');

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
    });
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!AJAX TO BE ADDED HERE (AJAX THAT ADDS DANCING PROGRAMS IN $danceProgramsList THAT ARE USED IN THE DEPARTMENT)!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  view categories according to dance program name
    $body.on('click', '.dance-program-name', function () {

        toggleVisibility($departmentsFillingCategoriesList, 'block');
        //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!AJAX TO BE ADDED HERE (AJAX THAT SHOWS CATEGORIES $danceProgramsList THAT ARE USED IN THE DANCING PROGRAM)!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    });

//  show save btn
    $body.on('click', '#check-all-dancing-categories', function () {
        toggleVisibility($departmentsFillingSaveBtn, 'block');
    });
    $body.on('click', '.pick-dancing-categories-for-department', function () {
        toggleVisibility($departmentsFillingSaveBtn, 'block');
    });

    $body.on('click', '#update-dancing-department-info', function () {
        //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!AJAX TO BE ADDED HERE (AJAX THAT saves CATEGORIES $danceProgramsList THAT ARE USED IN THE DANCING PROGRAM)!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    });
//DEPARTMENTS FIILLING


//DEPARTMENTS EDITION
    //   dropdown pick department
    $body.on('click', '.dropdown-menu-department-content',function () {
        var $departments=$(this).parent().children(),
            $departmentName=$(this).children().text(),
            $seeDepartmentName=$('#see-department-content-name');
        console.log($departmentsEditionPanelBody.css('display'));

        $departments.each(function () {
            $(this).removeClass('active');
        });
        $(this).addClass('active');
        // $(this).parents('.dropdown').find('.dropdown-toggle').html($departmentName+'<span class="caret"></span>');
        $seeDepartmentName.text($departmentName);
        if ($departmentsEditionPanelBody.css('display')=='none') {
            toggleVisibility ($departmentsEditionPanelBody,'block');
        }
    });
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!AJAX TO BE ADDED HERE (AJAX THAT ADDS DANCING PROGRAMS IN $danceProgramsList THAT ARE USED IN THE DEPARTMENT)!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//DEPARTMENTS EDITION

});


















