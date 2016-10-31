<?php

require_once(ROOT . 'models/AdminModel.php');
require_once(ROOT . 'components/Traits.php');

class AdminController
{
    use messagesOperations;

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
        if (isset($_SESSION['messages'])) { //if there are messages in $_SESSION;
            $this->message = $this->parseMessages($_SESSION['messages']); //then we parse them: decode and convert an array to string;
        }
        require_once('views/admin/organizations/reg_org.php'); // here in view file we show the message;

        unset($_SESSION['messages']); // we should to unset this variable to show correct messages when you reload a page;
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

        if (isset($_POST)) {
            if (!empty($_POST['org_name']) && !empty($_POST['org_abbreviation']) && !empty($_POST['org_head_fio']) &&
                !empty($_POST['org_city']) && !empty($_POST['org_country']) && !empty($_POST['org_phone']) &&
                !empty($_POST['org_email'])
            ) {
                $resulting = (integer)AdminModel::recordOrganization();
                echo $resulting . ' is the result';
                $this->message = json_encode([
                    'status' => 'success',
                    'message' => 'Организация успешно сохранена в базе данных!'
                ]);
            } else {
                echo 'NooooO!';
                $this->message = json_encode([
                    'status' => 'error',
                    'message' => 'Организацию сохранить не удалось! Пожалуйста, заполните все обязательные поля.'
                ]);
            }
            $this->saveMessage($this->message);
        }

        header('Location: ' . Router::$permalink . $_POST['redirect']);
        return true;
    }

    public function actionAjax_showOrgInf()
    {

        $org_info = array();
        $org_info = AdminModel::getOrganizationById($_POST['id']);

        echo json_encode($org_info);
    }

    public function actionUpdateOrg()
    {

        echo '<pre>';
        var_export($_POST);
        echo '</pre>';

        $_POST = array_map("AdminModel::addSlashes", $_POST);

        if (isset($_POST)) {
            if (!empty($_POST['org_name']) && !empty($_POST['org_abbreviation']) && !empty($_POST['org_head_fio']) &&
                !empty($_POST['org_city']) && !empty($_POST['org_country']) && !empty($_POST['org_phone']) &&
                !empty($_POST['org_email'])
            ) {
                $resulting = (integer)AdminModel::updateOrganization();
                echo $resulting . ' is the result';
                $this->message = json_encode([
                    'status' => 'success',
                    'message' => 'Изменения сохранены успешно!'
                ]);
            } else {
                echo 'NooooO!';
                $this->message = json_encode([
                    'status' => 'error',
                    'message' => 'Данные обновить не удалось!'
                ]);
            }
            $this->saveMessage($this->message);
        }

//        header('Location: '. Router::$permalink . $_POST['redirect']);
        return true;
    }


    public function actionOrg_settings()
    {
        include 'views/admin/SettingsOrg/org_settings.php';
        if($_POST) {
            if ($_POST['action'] == 'club') {
                $this->addClub();
            } elseif ($_POST['action'] == 'event') {
                $this->addEvent();
            }
        }
    }

    public function addClub(){
        AdminModel::club_add($_POST);
    }
    public function addEvent(){
        echo 'world';
    }

    public  function actionAjaxClub_add()
    {
        include 'views/admin/SettingsOrg/create-club.php';
    }

    public function actionAjaxCategory_add()
    {
        include 'views/admin/SettingsOrg/create-category.php';
    }

    public function actionAjaxCreate_event()
    {
        include 'views/admin/SettingsOrg/create-event.php';
    }

}