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
    'events' => 'events/index',
    'admin/organizations/org_settings' => 'admin/org_settings',
    'admin/organizations/org_settings/([.*]+)' => 'admin/org_settings/$1',
    'admin/organizations/ajax_club_add' => 'admin/ajaxClub_add',
    'admin/organizations/ajax_clubShow' => 'admin/ajax_clubShow',
    'admin/organizations/ajax_eventShow' => 'admin/ajax_eventShow',
    'admin/organizations/ajax_create_category' => 'admin/ajaxCategory_add',
    'admin/organizations/create-event' => 'admin/ajaxCreate_event',
    'admin/organizations/org_reg' => 'admin/org_reg',
    'admin/organizations/org_add' => 'admin/org_add',
    'admin/organizations/page/([0-9]+)' => 'admin/index/$1',
    'admin/organizations/page/ajax_showOrgInf' => 'admin/ajax_showOrgInf',
    'admin/organizations/page/updateOrg' => 'admin/updateOrg',
    '' => 'home/index',

);