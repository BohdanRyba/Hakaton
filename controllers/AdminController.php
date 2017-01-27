<?php

require_once(ROOT . 'models/AdminModel.php');
require_once(ROOT . 'components/Traits.php');

class AdminController
{
    function debug($array = array()){
        echo '<pre>';
        var_dump($array);
        echo '</pre>';
    }
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
        $_SESSION['organization_id'] = $id;
        if (isset($id) && is_numeric($id)) {
            $current_org_name = AdminModel::getOrganizationById($id);
            $nav_content = $this->createNavContent(Router::$uri, $id);
        }
        setcookie("get_id", "$id");
        include 'views/admin/SettingsOrg/org_settings.php';
        if (isset($_POST['action']) || isset($_POST['action'])) {
            if ($_POST['action'] == 'club') {
                $this->actionAddClub();
            } elseif ($_POST['action'] == 'event') {
                $this->actionAddEvent();
            } /*elseif ($_POST['action'] == 'category') {
                $this->actionAddCategory();
            }*/
        }
    }


    public function actionAddClub()
    {
        if (isset($_POST)) {
            if (!empty($_POST['club_name']) && !empty($_POST['club_country']) && !empty($_POST['club_city']) &&
                !empty($_POST['club_shief']) && !empty($_POST['club_number']) && !empty($_POST['club_mail']) &&
                !empty($_POST['org_id'])
            ) {
                AdminModel::club_add($_POST);
            } else {
                echo 'NooooO!';
            }
        }
        self::showArray($_POST);
    }

    public function actionAjaxCategory_create()
    {
        $category_parameters = AdminModel::getCategoryParametersForCreating();
        
        include 'views/admin/SettingsOrg/option_category.php';
    }

    public function actionAddEvent()
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
    public function actionAjaxClubCabinet($id)
    {

        $participant = AdminModel::ShowClubById($id);
        require_once ('views/admin/SettingsOrg/club-cabinet-for-adm.php');

        /**
         *
         * TODO: В будущем,если нужны будут какие нибудь данные раскоментировать
         *
         *         return $participant;
         */
    }

    public function actionRegClubForEvent($id)
    {
        $list = AdminModel::ShowClubsForReg($id) ;
        include 'views/admin/option_event/reg_part_for_event.php';
    }
    public function actionRegParticipantForEvent($id)
    {
        echo json_encode(AdminModel::ShowAllParticipantByClubId($id));
    }


//    public fu

    // ShowAllParticipantByClubId
    public function actionAjaxAddpart()
    {
        include 'views/admin/SettingsOrg/view_add_part.php';
    }

    public function actionAjax_clubShow($id)
    {
        echo json_encode(AdminModel::ShowClubs($id));
    }

    public function actionAjax_eventShow($id)
    {
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
        if(!empty($_POST)){

            if (isset($_POST) && !empty($_POST['redirect'])) {
                $json = json_decode($_POST['redirect'], true);
                $result = (integer)AdminModel::saveDanceProgram($json, 'update_list');
            } elseif($_POST['deletion-confirmation-btn'] == 'Удалить!' &&
                            !empty($_POST['dancing-group-id']) &&
                                !empty($_POST['deletion-confirmation-password'])){
                $message = '';
                if(AdminModel::getPermissionForDeletion()){
                    $result = (integer)AdminModel::deleteTheDanceGroup($_POST['dancing-group-id']);
                    if($result){
                        $message = json_encode([
                            'status' => 'success',
                            'message' => "Удаление подтверждено, танцевальная группа удалена."
                        ]);
                        self::saveMessage($message);
                    } else {
                        $message = json_encode([
                            'status' => 'warning',
                            'message' => "Удаление подтверждено, но танцевальную группу удалить не удалось."
                        ]);
                        self::saveMessage($message);
                    }
                } else {
                    $message = json_encode([
                        'status' => 'error',
                        'message' => "В доступе отказано, танцевальная группа не удалена."
                    ]);
                    self::saveMessage($message);
                }
            } else {
                $message = json_encode([
                    'status' => 'error',
                    'message' => "Вы не ввели пароль для подтверждения удаления танцеваной группы!"
                ]);
                self::saveMessage($message);
            }
        }
        $list = AdminModel::getAllDanceGroups('list');

        if (isset($_SESSION['messages'])) { //if there are messages in $_SESSION;
            $this->message = $this->parseMessages($_SESSION['messages']); //then we parse them: decode and convert an array to string;
        }
        $nav_content = $this->createNavContent(Router::$uri);
        require_once 'views/admin/dancing_groups/dance_list.php';
        unset($_SESSION['messages']); // we should to unset this variable to show correct messages when you reload a page;
        return true;
    }

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
            $category_parameters = AdminModel::getCategoryParametersById($_POST['id']);
            $array['dance_group'] = $dance_group;
            $array['category_parameters'] = $category_parameters;
            echo json_encode($array);
        }
    }

    public function actionAjax_saveDanceCategoryParameters($org_id)
    {
        if (!empty($_POST['massive'])) {
            $result = AdminModel::saveCategoryParameters($_POST['massive'], $org_id);
            if($result == 'updated'){
                setcookie("A_result", "$result");
                echo 'Параметры танцевальной группы обновлены';
            } elseif($result == 'inserted') {
                setcookie("A_result", "$result");
                echo 'Параметры танцевальной группы созданы';
            }
        } else {
            setcookie("A_result", "Empty_POST");
            echo 'Данные для сохранения отсутствуют';
        }
    }

    public function actionCreateDancingCategories(){
        $category_parameters = [];
        $category_parameters = AdminModel::getCategoryParametersForCreating();
        require_once ('views/admin/SettingsOrg/create_dancing_categories.php');
    }

    public function actionAjaxSaveDancingCategories(){
        self::showArray($_SESSION);
        $tmp = [];
        if(!empty($_POST['categories'])){
            $_SESSION['test'] = $_POST['categories'];
            foreach ($_POST['categories'] as $category){
                $category_parts = explode(',', $category[0]);
                (!empty($category[1])) ? array_push($category_parts, $category[1]) : array_push($category_parts, '');
                $resulting = AdminModel::saveCreatedCategory($category_parts);
                array_push($tmp, $resulting);
            }
            setcookie("A_result", "added");
        }
        $show_results = implode("\n", $tmp);
        echo $show_results;
    }

    public function actionAjax_NewInfo(){
        AdminModel::SaveParticipant($_POST);
    }

    public function actionAjaxShowAllCategoryParameters(){
        if(!empty($_POST['parameter'])){
            $array_with_asked_parameters = AdminModel::getCategoryParametersByParameter($_POST['parameter']);
            echo json_encode($array_with_asked_parameters);
        }
    }

    public function actionAjaxShowCategoriesAccordingToParameter(){
        if(!empty($_POST['name']) && !empty($_POST['parameter'])){
            $array_with_asked_categories = AdminModel::getCategoriesByName($_POST);
            echo json_encode($array_with_asked_categories);
        }
    }

    public function actionAjaxUpdatingCreatedDancingCategory(){
        if(!empty($_POST)){
            $array_with_asked_categories = AdminModel::editDanceCategories($_POST);
            $show_results = implode("\n", $array_with_asked_categories);
            echo $show_results;
        }
    }

    public function actionAjaxGetNewInfoAboutDancingGroup(){
        if(!empty($_POST['id'])){
            $dance_group = AdminModel::getDanceGroupsById($_POST['id']);
            echo json_encode($dance_group);
        }
        return true;
    }

    public function actionPickCategoriesForEvent($event_id){
        $nav_content = $this->createNavContent(Router::$uri);
        $dancing_programs = AdminModel::getUniqueDanceCategoryPrograms($event_id);
        require_once ('views/admin/option_event/pick_categories_for_event.php');
    }

    public function actionAjaxShowCategoriesToPickForEvent(){
        if(!empty($_POST['name']) && !empty($_POST['parameter'])){
            $asked_parameters = AdminModel::getCategoriesByName($_POST);
            echo json_encode($asked_parameters);
        }
    }
}