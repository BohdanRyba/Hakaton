<?php

namespace components;

class Helper
{
    public static function getPageStyles($currentPageUri){
        foreach (self::$stylesArray as $uriPattern => $stylesArrayList) {
            if (preg_match("~$uriPattern~", $currentPageUri)) {
                return $stylesArrayList;
            }
        }
        return false;
    }

    public static function getPageScripts($currentPageUri){
        foreach (self::$scriptsArray as $uriPattern => $scriptsArrayList) {
            if (preg_match("~$uriPattern~", $currentPageUri)) {
                return $scriptsArrayList;
            }
        }
        return false;
    }

    private static $stylesArray = [
        'index.php' => ['views/main/css/style.css'],
        'home' => ['views/main/css/style.css'],
        'news/page/([0-9]+)' => ['views/main/css/style.css'],
        'news/single/([0-9]+)' => ['views/main/css/style.css'],
        'test' => [
            'views/main/css/style.css',
            'views/main/css/event_program_print.less',
        ],
        'admin/organizations/pick_categories_for_event/([0-9]+)' => ['views/main/css/pick_categories_for_event.less'],
        'admin/organizations/picked_categories_for_event/([0-9]+)' => ['views/main/css/pick_categories_for_event.less'],
        'admin/organizations/create_dancing_departments/([0-9]+)' => ['views/main/css/create_dancing_departments.less'],
        'admin/organizations/cabinet_club/([0-9]+)'=> [
            'views/main/css/style.css',
            'views/main/css/pick_categories_for_event.less'
        ],
        'admin/organizations/org_settings/([0-9]+)' => [
            'views/main/css/style.css',
            'views/main/css/add_dancing_categories.less',
            'views/main/css/create_dancing_categories.less'
        ],
        'admin/organizations/org_add' => ['views/main/css/style.css'],
        'admin/organizations/page/([0-9]+)' => ['views/main/css/organization_list.less'],
        'admin/organizations/event_program/([0-9]+)' => ['views/main/css/event_program.less'],
        'admin/organizations/event_program_print/([0-9]+)' => ['views/main/css/event_program_print.less'],
        'admin/option_event/reg_part_for_event/([0-9]+)' => ['views/main/css/style.css'],
        'admin/dancing_groups/dance_list' => ['views/main/css/dance_groups_list.less'],
        'admin/dancing_groups/add_dancing_groups' => ['views/main/css/add_dancing_groups.less'],
        '' => ['views/main/css/style.css'],
    ];

    private static $scriptsArray = [
        'index.php' => ['views/main/js/script.js'],
        'news/page/([0-9]+)' => ['views/main/js/script.js'],
        'news/single/([0-9]+)' => ['views/main/js/script.js'],
        'home' => ['views/main/js/script.js'],
        'admin/organizations/pick_categories_for_event/([0-9]+)' => ['views/main/js/pick_categories_for_event.js'],
        'admin/organizations/picked_categories_for_event/([0-9]+)' => ['views/main/js/picked_categories_for_event.js'],
        'admin/organizations/create_dancing_departments/([0-9]+)' => [
            'views/main/js/mySearch.js',
            'views/main/js/create_dancing_departments.js'
        ],
        'admin/organizations/cabinet_club/([0-9]+)' => [
            'views/main/js/script.js',
            'views/main/js/ajax.js',
            'views/main/js/masks.js',
            'views/main/js/pick_categories_for_event.js'
        ],
        'admin/organizations/org_settings/([0-9]+)' => [
            'views/main/plugins/select2/select2.full.min.js',
            'views/main/plugins/input-mask/jquery.inputmask.js',
            'views/main/plugins/input-mask/jquery.inputmask.date.extensions.js',
            'views/main/plugins/input-mask/jquery.inputmask.extensions.js',
            'views/main/plugins/datepicker/bootstrap-datepicker.js',
            'views/main/plugins/timepicker/bootstrap-timepicker.min.js',
            'views/main/plugins/slimScroll/jquery.slimscroll.min.js',
            'views/main/plugins/iCheck/icheck.min.js',
            'views/main/plugins/fastclick/fastclick.js',
            'views/main/js/jquery-ui.js',
            'views/main/js/spin.min.js',
            'views/main/js/script.js',
            'views/main/js/ajax.js',
            'views/main/js/masks.js',
            'views/main/js/add_dancing_categories.js',
            'views/main/js/create_dancing_categories.js',
            'views/main/js/ajax_search.js'
        ],
        'admin/organizations/org_add' => ['views/main/js/script.js'],
        'admin/organizations/page/([0-9]+)' => ['views/main/js/organization_list.js'],
        'admin/organizations/event_program/([0-9]+)' => [
            'views/main/js/dragFrame.js',
            'views/main/js/eventProgramDragInit.js'
        ],
        'admin/organizations/event_program_print/([0-9]+)' => [
            'views/main/plugins/pace/pace.min.js',
            'views/main/plugins/slimScroll/jquery.slimscroll.min.js',
            'views/main/js/dragFrame.js',
            'views/main/js/eventProgramPrintDragInit.js'
        ],
        'admin/option_event/reg_part_for_event/([0-9]+)' => [
            'views/main/plugins/select2/select2.full.min.js',
            'views/main/plugins/input-mask/jquery.inputmask.js',
            'views/main/plugins/input-mask/jquery.inputmask.date.extensions.js',
            'views/main/plugins/input-mask/jquery.inputmask.extensions.js',
            'views/main/plugins/datepicker/bootstrap-datepicker.js',
            'views/main/plugins/timepicker/bootstrap-timepicker.min.js',
            'views/main/plugins/slimScroll/jquery.slimscroll.min.js',
            'views/main/plugins/iCheck/icheck.min.js',
            'views/main/plugins/fastclick/fastclick.js',
            'views/main/js/jquery-ui.js',
            'views/main/js/spin.min.js',
            'views/main/js/script.js',
            'views/main/js/ajax.js',
            'views/main/js/masks.js',
            'views/main/js/ajax_search.js'
        ],
        'admin/dancing_groups/dance_list' => ['views/main/js/dance_groups_list.js'],
        'admin/dancing_groups/add_dancing_groups' => ['views/main/js/add_dancing_groups.js'],
        '' => ['views/main/js/script.js'],
    ];
}