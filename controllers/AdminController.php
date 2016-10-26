<?php

require_once(ROOT . 'models/AdminModel.php');

class AdminController
{

    public function actionIndex($Cpag)
    {
        $organizationsList = AdminModel::getAllOrganizations();
        $start_end_pagination_array = AdminModel::getPaginationContent($Cpag);
        $start = $start_end_pagination_array[0];
        $end = $start_end_pagination_array[1];
        $pagination = $start_end_pagination_array[2];

        require_once('views/admin/organizations/organizations_list.php');
        return true;
    }

    public function actionOrg_add()
    {

        require_once('views/admin/organizations/reg_org.php');

        return true;
    }

    public function actionOrg_reg()
    {


        echo '<pre>';
        var_export($_POST);
        echo '</pre>';

        echo '<pre>';
        var_export($_FILES);
        echo '</pre>';

        $_POST = array_map("AdminModel::addSlashes", $_POST);

        echo '<pre>';
        var_export($_POST);
        echo '</pre>';

        if (isset($_POST)) {
            if (!empty($_POST['org_name']) && !empty($_POST['org_abbreviation']) && !empty($_POST['org_head_fio']) &&
                !empty($_POST['org_city']) && !empty($_POST['org_country']) && !empty($_POST['org_phone']) &&
                !empty($_POST['org_email'])
            ) {
                $resulting = (integer)AdminModel::recordOrganization();
                echo $resulting . ' is the result';
            } else {
                echo 'NooooO!';
            }
        }

        return true;
    }

    public function actionAjax_showOrgInf(){

        $org_info = array();
        $org_info = AdminModel::getOrganizationById($_POST['id']);

        echo json_encode($org_info);
    }

    public function actionUpdateOrg(){

        echo '<pre>';
        var_export($_POST);
        echo '</pre>';



    }



    public function actionEvent_add()
    {


    }

    public function actionAll_events()
    {


    }

    public function actionEdit_event()
    {


    }

    public function actionOne_event()
    {


    }

}