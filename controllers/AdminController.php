<?php

require_once(ROOT . 'models/AdminModel.php');
require_once(ROOT . 'components/Traits.php');

class AdminController
{
    use messagesOperations;

    public function actionIndex($Cpag)
    {
        if (isset($_SESSION['messages'])) { //if there are messages in $_SESSION;
            $this->message = $this->parseMessages($_SESSION['messages']); //then we parse them: decode and convert an array to string;
        }
        $organizationsList = AdminModel::getAllOrganizations();
        
        $start_end_pagination_array = AdminModel::getPaginationContent($Cpag);
        $start = $start_end_pagination_array[0];
        $end = $start_end_pagination_array[1];
        $pagination = $start_end_pagination_array[2];

        require_once('views/admin/organizations/organizations_list.php'); // here in view file we show the message;
        unset($_SESSION['messages']); // we should to unset this variable to show correct messages when you reload a page;
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
        $_POST = array_map("AdminModel::addSlashes", $_POST);

        if (isset($_POST)) {
            if (!empty($_POST['org_name']) && !empty($_POST['org_abbreviation']) && !empty($_POST['org_head_fio']) &&
                !empty($_POST['org_city']) && !empty($_POST['org_country']) && !empty($_POST['org_phone']) &&
                !empty($_POST['org_email'])
            ) {
                $resulting = (integer)AdminModel::recordOrganization();
                echo $resulting . ' is the result';
                $message = json_encode([
                    'status' => 'success',
                    'message' => 'Организация успешно сохранена в базе данных!'
                ]);
            } else {
                echo 'NooooO!';
                $message = json_encode([
                    'status' => 'error',
                    'message' => 'Организацию сохранить не удалось! Пожалуйста, заполните все обязательные поля.'
                ]);
            }
            self::saveMessage($message);
        }
        header('Location: ' . Router::$permalink . $_POST['redirect']);
        return true;
    }

    public function actionAjax_showOrgInf()
    {
        $org_info = AdminModel::getOrganizationById($_POST['id']);

        echo json_encode($org_info);
    }

    public function actionDelOrg(){

        if (isset($_POST)) {
            if (!empty($_POST['delete_org']) == 'удалить!' && !empty($_POST['delete_org_id'])) {
                $resulting = (integer)AdminModel::deleteOrganization($_POST['delete_org_id']);
                echo $resulting . ' is the result';
            } else {
                echo 'One of the POST\'s components didn\'t pass the checking clause!';
            }
        }
//        header('Location: ' . Router::$permalink . $_POST['redirect']);
        return true;
    } // End this method!

    public function actionUpdateOrg()
    {
        $_POST = array_map("AdminModel::addSlashes", $_POST);

        if (isset($_POST)) {
            if (!empty($_POST['org_name']) && !empty($_POST['org_abbreviation']) && !empty($_POST['org_head_fio']) &&
                !empty($_POST['org_city']) && !empty($_POST['org_country']) && !empty($_POST['org_phone']) &&
                !empty($_POST['org_email'])
            ) {
                $resulting = (integer)AdminModel::updateOrganization();
                echo $resulting . ' is the result';
            } else {
                echo 'NooooO!';
            }
        }
        header('Location: ' . Router::$permalink . $_POST['redirect']);
        return true;
    }

    public function actionOrg_settings()
    {
//        self::showArray($_POST);
        if(isset($_POST['org_id'])){
            $current_org_name = AdminModel::getOrganizationById($_POST['org_id']);
        }
        include 'views/admin/SettingsOrg/org_settings.php';
        if (isset($_POST['action']) || isset($_POST['action'])) {
            if ($_POST['action'] == 'club') {
                $this->addClub();
            } elseif ($_POST['action'] == 'event') {
                $this->addEvent();
            }
        }
    }

    public function addClub()
    {
        AdminModel::club_add($_POST);
    }

    public function addEvent(){
        AdminModel::event_add($_POST);
    }

    public function actionAjaxClub_add()
    {
        include 'views/admin/SettingsOrg/create-club.php';
    }

    public function actionAjax_clubShow()
    {
        echo  json_encode(AdminModel::ShowClubs()) ;
    }

    public function actionAjax_eventShow()
    {
//        $array = AdminModel::ShowEvents();
//        self::showArray($array);
//        die;
//
        echo  json_encode(AdminModel::ShowEvents()) ;
    }

    public function actionAjaxCategory_add()
    {
        include 'views/admin/SettingsOrg/create-category.php';
    }

    public function actionAjaxCreate_event()
    {
//        echo "it's create-event";
        include 'views/admin/SettingsOrg/create-event.php';
    }

}