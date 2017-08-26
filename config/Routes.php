<?php
namespace config;

Class Routes
{
    public function getRoutesMap()
    {
        return $this->routesArray;
    }

    private $routesArray = [
        'admin/organizations/org_settings/ajax_showCategoriesAccordingToParameter' => 'admin/ajaxShowCategoriesAccordingToParameter', // added by Roma;
        'index.php' => 'home/index',
        'news/add' => 'news/add',
        'news/record' => 'news/record',
        'news/page/([0-9]+)' => 'news/index/$1',
        'news/single/([0-9]+)' => 'news/view/$1',
        'test' => 'news/test',
        'home' => 'home/index',
        'login' => 'login/index',
        'admin/dancing_groups/ajax_GetNewInfoAboutDancingGroup' => 'admin/ajaxGetNewInfoAboutDancingGroup', // added by ROMA;
        'out' => 'login/out',
        'profile' => 'profile/index', // it should be completed...
        'events' => 'events/index', // it should be completed...
        'events/page/([0-9]+)' => 'events/index/$1', // it should be completed...
        'events/single/([0-9]+)' => 'events/showSingleEvent/$1', // it should be completed...
        'admin/organizations/event_add' => 'admin/event_add',
        'admin/organizations/pick_categories_for_event/ajax_showCategoriesToPickForEvent' => 'admin/ajaxShowCategoriesToPickForEvent',
        'admin/organizations/pick_categories_for_event/ajax_sendPickedCategoriesForEvent' => 'admin/ajaxSendPickedCategoriesForEvent',
        'admin/organizations/pick_categories_for_event/([0-9]+)' => 'admin/pickCategoriesForEvent/$1',
        'admin/organizations/picked_categories_for_event/([0-9]+)' => 'admin/pickedCategoriesForEvent/$1',
        'admin/organizations/picked_categories_for_event/ajax_sendRemovedCategories' => 'admin/ajax_sendRemovedCategories',
        'admin/organizations/create_dancing_departments/([0-9]+)' => 'admin/createDancingDepartments/$1',
        'admin/organizations/create_dancing_departments/ajax_getCategoriesToPickForDepartment' => 'admin/ajax_getCategoriesToPickForDepartment',
        'admin/organizations/create_dancing_departments/ajax_sendCategoriesPickedForDepartment' => 'admin/ajax_sendCategoriesPickedForDepartment',
        'admin/organizations/create_dancing_departments/ajax_getDepartmentContent' => 'admin/ajax_getDepartmentContent',
        'admin/organizations/create_dancing_departments/ajax_delCategory' => 'admin/ajax_delCategory',
        'admin/organizations/create_dancing_departments/ajax_transferCategory' => 'admin/ajax_transferCategory',
        'admin/organizations/org_settings/ajax_club_add' => 'admin/ajaxClub_add',
        'admin/organizations/org_settings/ajax_create-event' => 'admin/ajaxCreate_event',
        'admin/organizations/org_settings/ajax_settingUpDancingCategory' => 'admin/ajax_settingUpDancingCategory',
        'admin/organizations/org_settings/ajax_saveDanceCategoryParameters/([0-9]+)' => 'admin/ajax_saveDanceCategoryParameters/$1',
        'admin/organizations/org_settings/ajax_create_category' => 'admin/ajaxCategory_add', // when we push the "plus-button" for adding the category parameters;
        'admin/organizations/org_settings/ajax_option_category' => 'admin/ajaxCategory_create', // when we push the "category-button" for creating and saving categories;
        'admin/organizations/org_settings/ajax_eventShow/([0-9]+)' => 'admin/ajax_eventShow/$1',
        'admin/organizations/cabinet_club/([0-9]+)'=>'admin/ajaxClubCabinet/$1',
        'admin/organizations/cabinet_club/view_add_part/([0-9]+)' => 'admin/ajaxAddPart/$1',
        'admin/organizations/cabinet_club/add_new_info' => 'admin/ajax_NewInfo',
        'admin/organizations/org_settings/ajax_clubShow/([0-9]+)' => 'admin/ajax_clubShow/$1',
//        'admin/organizations/org_settings/ajax_AddParticipant/([0-9]+)' => 'admin/ajax_AddParticipant/$1', //TODO:: there is no action yet!
        'admin/organizations/org_settings/ajax_updatingCreatedDancingCategory' => 'admin/ajaxUpdatingCreatedDancingCategory', // added by Roma;
        'admin/organizations/org_settings/ajax_showAllDanceCategoriesParameters' => 'admin/ajaxShowAllCategoryParameters', // added by ROMA;
        'admin/organizations/org_settings/ajax_sendCreatedCategories' => 'admin/ajaxSaveDancingCategories', // added by ROMA;
        'admin/organizations/org_settings/([0-9]+)' => 'admin/org_settings/$1', // warning: this line should be lower than ajaxes!;
        'admin/organizations/org_reg' => 'admin/org_reg',
        'admin/organizations/org_add' => 'admin/org_add',
        'admin/organizations/page/([0-9]+)' => 'admin/index/$1',
        'admin/organizations/page/ajax_showOrgInf' => 'admin/ajax_showOrgInf',
        'admin/organizations/page/delOrg' => 'admin/delOrg',
        'admin/organizations/page/updateOrg' => 'admin/updateOrg',
        'admin/organizations/event_program/ajax_showCategoriesAccordingToDep' => 'admin/ajax_showCategoriesAccordingToDep',
        'admin/organizations/event_program/ajax_getNewCategoriesOrder' => 'admin/ajax_getNewCategoriesOrder',
        'admin/organizations/event_program/([0-9]+)' => 'admin/eventProgram/$1',
        'admin/organizations/event_program_print/([0-9]+)' => 'admin/eventProgramPrint/$1',
        'admin/organizations/event_program_print/ajax_showCategoriesAccordingToDep' => 'admin/ajax_showCategoriesAccordingToDep',
        'admin/organizations/event_program_print/ajax_setNewCategoriesPrintOrder' => 'admin/ajax_setNewCategoriesPrintOrder',
        'admin/organizations/judges/([0-9]+)' => 'admin/judges/$1',
        'admin/option_event/reg_part_for_event/([0-9]+)' => 'admin/regClubForEvent/$1',
        'admin/option_event/reg_part_for_event/regParticipantForEvent/([0-9]+)' => 'admin/regParticipantForEvent/$1',
        'admin/dancing_groups/dance_list' => 'admin/dancingList',
        'admin/dancing_groups/add_dancing_groups' => 'admin/addDancingGroups',
        'admin/dancing_groups/add_dance_program' => 'admin/addDanceProgram',
        '' => 'home/index',
    ];
}
