<?php

require_once(ROOT . 'models/AdminModel.php');
require_once(ROOT . 'components/Traits.php');

class AdminController
{
    use messagesOperations;
    use navigationFunctional;

    public function actionIndex($Cpag)
    {
        if (isset($_SESSION['messages'])) { //if there are messages in $_SESSION;
            $this->message = $this->parseMessages($_SESSION['messages']); //then we parse them: decode and convert an array to string;
        }

        $nav_content = $this->createNavContent(Router::$uri, $Cpag);
        $organizationsList = AdminModel::getAllOrganizations();

        $start_end_pagination_array = AdminModel::getPaginationContent($Cpag, count($organizationsList));
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
        $nav_content = $this->createNavContent(Router::$uri);

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

    public function actionDelOrg()
    {
        self::showArray($_POST);
        if (isset($_POST)) {
            if (!empty($_POST['delete_org']) == 'удалить!' && !empty($_POST['delete_org_id'])) {
                $resulting = (integer)AdminModel::deleteOrganization($_POST['delete_org_id']);
                echo $resulting . ' is the result';
            } else {
                echo 'One of the POST\'s components didn\'t pass the checking clause!';
            }
        }
        header('Location: ' . Router::$permalink . $_POST['redirect']);
        return true;
    }

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

    public function actionOrg_settings($id = '')
    {
        if (isset($id) && is_numeric($id)) {
            $current_org_name = AdminModel::getOrganizationById($id);
            $nav_content = $this->createNavContent(Router::$uri, $id);
        }
        setcookie("get_id", "$id");

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
        if (isset($_POST)) {
            if (!empty($_POST['club_name']) && !empty($_POST['club_country']) && !empty($_POST['club_city']) &&
                !empty($_POST['club_shief']) && !empty($_POST['club_number']) && !empty($_POST['club_mail']) &&
                !empty($_POST['org_id']) && !empty($_POST['org_id'])
            ) {
                AdminModel::club_add($_POST);
            } else {
                echo 'NooooO!';
            }
        }
//        self::showArray($_POST);
    }

    public function addEvent()
    {
        if (isset($_POST)) {
            if (!empty($_POST['event_name']) && !empty($_POST['event_status']) && !empty($_POST['data-finish']) &&
                !empty($_POST['event_city']) && !empty($_POST['event_country']) && !empty($_POST['event_referee']) &&
                !empty($_POST['event_skutiner']) && !empty($_POST['org_id'])
            ) {
                $message = json_encode([
                    'status' => 'success',
                    'message' => 'Организация успешно сохранена в базе данных!'
                ]);
                AdminModel::event_add($_POST);
            } else {
                $message = json_encode([
                    'status' => 'error',
                    'message' => 'Сохранить событие не удалось! Пожалуйста, проверьте правильность ввода данных!'
                ]);
            }
        }

        self::saveMessage($message);
    }

    public function actionAjaxClub_add()
    {
        include 'views/admin/SettingsOrg/create-club.php';
    }

    public function actionAjax_clubShow($id)
    {
        echo json_encode(AdminModel::ShowClubs($id));
    }

    public function actionAjax_eventShow($id)
    {
//        echo $id;
//        die;
        echo json_encode(AdminModel::ShowEvents($id));
    }

    public function actionAjax_option_categoryShow(){
        echo 'Категории';
    } // readjusted by Roma;

    public function actionAjaxCategory_add()
    {
        $dance_programs_list = AdminModel::getAllDanceGroups();
//        self::showArray($list);
//        echo json_encode(AdminModel::ShowClubs());
        include 'views/admin/SettingsOrg/create-category.php';
    }

    public function actionAjaxCreate_event($id='')
    {
//        echo "it's create-event";
        include 'views/admin/SettingsOrg/create-event.php';
    }

    public function actionDancingList()
    {
        echo 'Hello from dancing list!';

        $db = Db::getConnection(Db::ADMIN_BASE);
        $query = "SELECT * FROM `dance_groups` ORDER BY id DESC";
        $result = $db->query($query);
        $list = array();
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $list[$i]['id'] = $row['id'];
            $list[$i]['dance_group_name'] = $row['dance_group_name'];
            $list[$i]['d_program'] = $row['d_program'];
            $list[$i]['d_age_category'] = $row['d_age_category'];
            $list[$i]['d_nomination'] = $row['d_nomination'];
            $list[$i]['d_league'] = $row['d_league'];
            $i++;
        }

        $db->close();

        self::showArray($list);

        $dance_group_mane = '';
        $d_program = array();
        $d_age_category = array();
        $d_nomination = array();
        $d_league = array();
        foreach ($list as $value) {
            $dance_group_mane .= '<br>' . $value['dance_group_name'] . '<br>';
            array_push($d_program, unserialize($value['d_program']));
            array_push($d_age_category, unserialize($value['d_age_category']));
            array_push($d_nomination, unserialize($value['d_nomination']));
            array_push($d_league, unserialize($value['d_league']));
        }


        echo '<br> Dance group name: ';
        echo $dance_group_mane . '<br>';


        echo '<br> Program array: <br>';
        self::showArray($d_program);
        echo '<br><br>';

        echo '<br> Age_category array: <br>';
        self::showArray($d_age_category);
        echo '<br><br>';

        echo '<br> Nomination array: <br>';
        self::showArray($d_nomination);
        echo '<br><br>';

        echo '<br> League array: <br>';
        self::showArray($d_league);
        echo '<br><br>';


    } //end this method!!!

    public function actionAddDancingGroups()
    {
        if (isset($_SESSION['messages'])) { //if there are messages in $_SESSION;
            $this->message = $this->parseMessages($_SESSION['messages']); //then we parse them: decode and convert an array to string;
        }
        $nav_content = $this->createNavContent(Router::$uri);
        include 'views/admin/dancing_groups/add_dancing_groups.php';
        unset($_SESSION['messages']); // we should to unset this variable to show correct messages when you reload a page;
    }

    public function actionAddDanceProgram()
    {
        if (isset($_POST) && !empty($_POST['redirect'])) {
            $json = json_decode($_POST['redirect'], true);
            $result = (integer)AdminModel::saveDanceProgram($json);
            echo '<br>';
            echo 'here is the result of the operation: ' . $result . '<br>';
            echo '<br>';
            echo 'redirect --> ' . Router::$permalink . $json['redirect'];
            header('Location: ' . Router::$permalink . $json['redirect']);
        }
    }

    public function actionAjax_settingUpDancingCategory()
    {
        if (isset($_POST) && !empty($_POST)) {
            $dance_group = AdminModel::getDanceGroupsById($_POST['id']);
            echo json_encode($dance_group);
        }
    }

    public function actionAjax_saveDanceCategoryParameters()
    {

    }
}