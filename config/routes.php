<?php

return array(
    'index.php' => 'home/index',
    'news/page/([0-9]+)' => 'news/index/$1',
    'news/single/([0-9]+)' => 'news/view/$1',
    'home' => 'home/index',
    'login' => 'login/index',
    'registration' => 'login/registration',
    'out' => 'login/out',
    'addnews' => 'addnews/index',
    'record' => 'addnews/record',
    'events/page/([0-9]+)' => 'events/index/$1', //in processing
    'events/single/([0-9]+)' => 'events/showSingleEvent/$1', //in processing
    'admin/organizations/event_add' => 'admin/event_add',
    'admin/organizations/org_settings/ajax_club_add' => 'admin/ajaxClub_add', // changed
    'admin/organizations/org_settings/ajax_create-event' => 'admin/ajaxCreate_event', // changed
    'admin/organizations/org_settings/ajax_eventShow' => 'admin/ajax_eventShow', // changed
    'admin/organizations/org_settings/ajax_create_category' => 'admin/ajaxCategory_add', // changed
    'admin/organizations/org_settings/([0-9]+)' => 'admin/org_settings/$1', // changed
    'admin/organizations/org_settings' => 'admin/org_settings',
    'admin/organizations/ajax_clubShow' => 'admin/ajax_clubShow',
    'admin/organizations/org_reg' => 'admin/org_reg',
    'admin/organizations/org_add' => 'admin/org_add',
    'admin/organizations/page/([0-9]+)' => 'admin/index/$1',
    'admin/organizations/page/ajax_showOrgInf' => 'admin/ajax_showOrgInf',
    'admin/organizations/page/delOrg' => 'admin/delOrg',
    'admin/organizations/page/updateOrg' => 'admin/updateOrg',
    'admin/dancing_groups/dance_list' => 'admin/dancingList',
    'admin/dancing_groups/add_dancing_groups' => 'admin/addDancingGroups',
    'admin/dancing_groups/add_dance_program' => 'admin/addDanceProgram',
    '' => 'home/index',
);