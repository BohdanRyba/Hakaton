<?php

require_once (ROOT . 'models/AdminModel.php');

class AdminController
{
    public function actionIndex($Cpag){
        $organizationsList = AdminModel::getAllOrganizations();
        $start_end_pagination_array = AdminModel::getPaginationContent($Cpag);
        $start = $start_end_pagination_array[0];
        $end = $start_end_pagination_array[1];
        $pagination = $start_end_pagination_array[2];

        require_once ('views/admin/organizations/organizations_list.php');

    }

    public function actionOrg_add(){



//        $organizationsList = AdminModel::getAllOrganizations();
//        $start_end_pagination_array = AdminModel::getPaginationContent();
//        $start = $start_end_pagination_array[0];
//        $end = $start_end_pagination_array[1];
//        $pagination = $start_end_pagination_array[2];
//
        require_once ('views/admin/organizations/reg_org.php');

    }




    public function actionEvent_add(){


    }

    public function actionAll_events(){


    }

    public function actionEdit_event(){


    }

    public function actionOne_event(){


    }

}