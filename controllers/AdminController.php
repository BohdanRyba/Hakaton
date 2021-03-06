<?php
namespace controllers;
use components\Router;
use models\AdminModel;

class AdminController extends AppController
{

    public function __construct()
    {
        $this->checkUserSessionTTL();
    }

    public function actionIndex($Cpag)
    {
        if (isset($_SESSION['messages'])) {
            $this->message = $this->parseMessages($_SESSION['messages']);
        }
        $organizationsList = AdminModel::getAllOrganizations();
        $start_end_pagination_array = $this->getPaginationContent($Cpag, count($organizationsList));
        $start = $start_end_pagination_array[0];
        $end = $start_end_pagination_array[1];
        $pagination = $start_end_pagination_array[2];
        $this->getHeader('header_admin_simple');
        require_once(ROOT . 'views/admin/organizations/organizations_list.php');
        $this->getFooter('footer_admin');

        unset($_SESSION['messages']);
        return true;
    }

    public function actionOrg_add()
    {
        if (isset($_SESSION['messages'])) {
            $this->message = $this->parseMessages($_SESSION['messages']);
        }
        $this->getHeader('header_admin_simple');
        require_once(ROOT . 'views/admin/organizations/reg_org.php');
        $this->getFooter('footer_admin');
        unset($_SESSION['messages']);
        return true;
    }

    public function actionOrg_reg()
    {
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
        return true;
    }

    public function actionDelOrg()
    {
        if (!empty($_POST)) {
            $message = '';

            if ($_POST['delete_org'] === 'удалить!' && !empty($_POST['delete_org_id']) && isset($_POST['deletion-confirmation-password'])) {
                if (AdminModel::getPermissionForDeletion()) {
                    $resulting = (integer)AdminModel::deleteOrganization($_POST['delete_org_id']);
                    if ($resulting === 'db.connect false') {
                        $message = json_encode([
                            'status' => 'error',
                            'message' => "Ошибка при подключении к базе данных (если вы видите это сообщение уже несколько раз, пожалуйста, обратитесь к администратору)."
                        ]);
                        self::saveMessage($message);
                    }
                } else {
                    $message = json_encode([
                        'status' => 'error',
                        'message' => "В доступе отказано, организация не удалена."
                    ]);
                    self::saveMessage($message);
                }
            }
            header('Location: ' . Router::$permalink . $_POST['redirect']);
        }
        return true;
    }

    public function actionUpdateOrg()
    {
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
        setcookie("get_id", "$id");

        if (!empty($_POST['action'])) {
            if ($_POST['action'] == 'club') {
                $this->actionAddClub();
            } elseif ($_POST['action'] == 'event') {
                $this->actionAddEvent();
            } /*elseif ($_POST['action'] == 'category') {
                $this->actionAddCategory();
            }*/
        }

        if (isset($id) && is_numeric($id)) {
            if (isset($_SESSION['messages'])) {
                $this->message = $this->parseMessages($_SESSION['messages']);
            }
            $current_org_name = AdminModel::getOrganizationById($id);
            $this->getHeader('header_admin_simple');
            require_once (ROOT . 'views/admin/SettingsOrg/org_settings.php');
            $this->getFooter('footer_admin');
            unset($_SESSION['messages']);
        }
        return true;
    }

    public function actionAddClub()
    {
        if (isset($_POST)) {
            if (!empty($_POST['club_name']) && !empty($_POST['club_country']) && !empty($_POST['club_city']) &&
                !empty($_POST['club_shief']) && !empty($_POST['club_number']) && !empty($_POST['club_mail']) &&
                !empty($_POST['org_id'])
            ) {
                $result = AdminModel::club_add($_POST);
            } else {
                echo 'NooooO!';
            }
        }
        return true;
    }

    public function actionAjaxCategory_create()
    {
        $category_parameters = AdminModel::getCategoryParametersForCreating();
        if (isset($_SESSION['messages'])) { //if there are messages in $_SESSION;
            $this->message = $this->parseMessages($_SESSION['messages']); //then we parse them: decode and convert an array to string;
        }
        include 'views/admin/SettingsOrg/option_category.php';
        unset($_SESSION['messages']);
        return true;
    }

    public function actionAddEvent()
    {
        $message = '';
        if (isset($_POST)) {
            if (!empty($_POST['event_name']) && !empty($_POST['event_status']) && !empty($_POST['data-finish']) &&
                !empty($_POST['event_city']) && !empty($_POST['event_country']) && !empty($_POST['event_referee']) &&
                !empty($_POST['event_skutiner']) && !empty($_POST['org_id'])
            ) {
                $result = AdminModel::event_add($_POST);

                if($result === 'this name is already exist'){
                    $message = json_encode([
                        'status' => 'error',
                        'message' => 'Имя события "' . $_POST['event_name'] . '" уже существует, пожалуйста, выберите другое!'
                    ]);
                } elseif($result){
                    $message = json_encode([
                        'status' => 'success',
                        'message' => 'Событие "' . $_POST['event_name'] . '" успешно сохранено в базе данных!'
                    ]);
                } else {
                    $message = json_encode([
                        'status' => 'error',
                        'message' => 'Обибка при попытке сохранения в базу данных!'
                    ]);
                }
            } else {
                $message = json_encode([
                    'status' => 'error',
                    'message' => 'Сохранить событие не удалось! Пожалуйста, проверьте правильность ввода данных!'
                ]);
            }
        }
        self::saveMessage($message);
        return true;
    }

    public function actionAjaxClub_add()
    {
        include 'views/admin/SettingsOrg/create-club.php';
        return true;
    }

    public function actionAjaxClubCabinet($id)
    {
        $participant = AdminModel::ShowClubById($id);
        $nav_content = $this->createNavContent(Router::$uri);
        $organization = AdminModel::getOrganizationById($_SESSION['organization_id']);
        $this->getHeader('header_admin_simple');
        require_once (ROOT . 'views/admin/SettingsOrg/club-cabinet-for-adm.php');
        $this->getFooter('footer_admin');
        /**
         *
         * TODO: В будущем,если нужны будут какие нибудь данные раскоментировать
         *
         *         return $participant;
         */
        return true;
    }

    public function actionRegClubForEvent($id)
    {
        $list = AdminModel::ShowClubsForReg($id);
        $this->getHeader('header_admin_complex');
        require_once (ROOT . 'views/admin/option_event/reg_part_for_event.php');
        $this->getFooter('footer_admin');
        return true;
    }

    public function actionRegParticipantForEvent($id)
    {
        echo json_encode(AdminModel::ShowAllParticipantByClubId($id));
        return true;
    }

    public function actionAjaxAddpart($id = '')
    {
        $list = AdminModel::ShowClubsForReg($id);
        include 'views/admin/SettingsOrg/view_add_part.php';
        return true;
    }

    public function actionAjax_clubShow($id)
    {
        echo json_encode(AdminModel::ShowClubs($id));
        return true;
    }

    public function actionAjax_eventShow($id)
    {
        echo json_encode(AdminModel::ShowEvents($id));
        return true;
    }

    public function actionAjaxCategory_add()
    {
        $dance_programs_list = AdminModel::getAllDanceGroups();
        include 'views/admin/SettingsOrg/create-category.php';
        return true;
    }

    public function actionAjaxCreate_event($id = '')
    {
        include 'views/admin/SettingsOrg/create-event.php';
        return true;
    }

    public function actionDancingList()
    {
        if (!empty($_POST)) {
            $message = '';
            if (isset($_POST) && !empty($_POST['redirect'])) {
                $json = json_decode($_POST['redirect'], true);
                $result = (integer)AdminModel::saveDanceProgram($json, 'update_list');
            } elseif ($_POST['deletion-confirmation-btn'] == 'Удалить!' &&
                !empty($_POST['dancing-group-id']) &&
                isset($_POST['deletion-confirmation-password'])
            ) {
                if (AdminModel::getPermissionForDeletion()) {
                    $result = (integer)AdminModel::deleteTheDanceGroup($_POST['dancing-group-id']);
                    if ($result) {
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
            }
        }
        $list = AdminModel::getAllDanceGroups('list');

        if (isset($_SESSION['messages'])) {
            $this->message = $this->parseMessages($_SESSION['messages']);
        }
        $this->getHeader('header_admin_simple');
        require_once(ROOT . 'views/admin/dancing_groups/dance_list.php');
        $this->getFooter('footer_admin');
        unset($_SESSION['messages']);
        return true;
    }

    public function actionAddDancingGroups()
    {
        if (isset($_SESSION['messages'])) {
            $this->message = $this->parseMessages($_SESSION['messages']);
        }
        $this->getHeader('header_admin_simple');
        require_once(ROOT . 'views/admin/dancing_groups/add_dancing_groups.php');
        $this->getFooter('footer_admin');
        unset($_SESSION['messages']);
        return true;
    }

    public function actionAddDanceProgram()
    {
        if (isset($_POST) && !empty($_POST['redirect'])) {
            $json = json_decode($_POST['redirect'], true);
            $result = (integer)AdminModel::saveDanceProgram($json);
            header('Location: ' . Router::$permalink . $json['redirect']);
        }
        return true;
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
        return true;
    }

    public function actionAjax_saveDanceCategoryParameters($org_id)
    {
        if (!empty($_POST['massive'])) {
            $result = AdminModel::saveCategoryParameters($_POST['massive'], $org_id);
            if ($result == 'updated') {
                setcookie("A_result", "$result");
                echo 'Параметры танцевальной группы обновлены';
            } elseif ($result == 'inserted') {
                setcookie("A_result", "$result");
                echo 'Параметры танцевальной группы созданы';
            }
        } else {
            setcookie("A_result", "Empty_POST");
            echo 'Данные для сохранения отсутствуют';
        }
        return true;
    }

    public function actionAjaxSaveDancingCategories()
    {
        self::showArray($_SESSION);
        $tmp = [];
        if (!empty($_POST['categories'])) {
            $_SESSION['test'] = $_POST['categories'];
            foreach ($_POST['categories'] as $category) {
                $category_parts = explode(',', $category[0]);
                (!empty($category[1])) ? array_push($category_parts, $category[1]) : array_push($category_parts, '');
                $resulting = AdminModel::saveCreatedCategory($category_parts);
                array_push($tmp, $resulting);
            }
            setcookie("A_result", "added");
        }
        $show_results = implode("\n", $tmp);
        echo $show_results;
        return true;
    }

    public function actionAjax_NewInfo()
    {
        AdminModel::SaveParticipant($_POST);
        return true;
    }

    public function actionAjaxShowAllCategoryParameters()
    {
        if (!empty($_POST['parameter'])) {
            $array_with_asked_parameters = AdminModel::getCategoryParametersByParameter($_POST['parameter']);
            echo json_encode($array_with_asked_parameters);
        }
        return true;
    }

    public function actionAjaxShowCategoriesAccordingToParameter()
    {
        if (!empty($_POST['name']) && !empty($_POST['parameter']) && !isset($_POST['event_id'])) {
            $name = $_POST['name'];
            $parameter = $_POST['parameter'];
            $asked_parameters = AdminModel::getCategoriesByName($name, $parameter);
            echo json_encode($asked_parameters);
        }
        return true;
    }

    public function actionAjaxUpdatingCreatedDancingCategory()
    {
        if (!empty($_POST)) {
            $array_with_asked_categories = AdminModel::editDanceCategories($_POST);
            $show_results = implode("\n", $array_with_asked_categories);
            echo $show_results;
        }
        return true;
    }

    public function actionAjaxGetNewInfoAboutDancingGroup()
    {
        if (!empty($_POST['id'])) {
            $dance_group = AdminModel::getDanceGroupsById($_POST['id']);
            echo json_encode($dance_group);
        }
        return true;
    }

    public function actionPickCategoriesForEvent($event_id)
    {
        $_SESSION['event_id'] = $event_id;
        $dancing_programs = AdminModel::getUniqueDanceCategoryPrograms();
        $event = AdminModel::getEventById($event_id);
        $organization = AdminModel::getOrganizationById($_SESSION['organization_id']);
        $this->getHeader('header_admin_complex');
        require_once(ROOT . 'views/admin/option_event/pick_categories_for_event.php');
        $this->getFooter('footer_admin');
        return true;
    }

    public function actionAjaxShowCategoriesToPickForEvent()
    {
        if (!empty($_POST['name']) && !empty($_POST['parameter']) && !empty($_POST['event_id'])) {
            $name = $_POST['name'];
            $parameter = $_POST['parameter'];
            $event_id = $_POST['event_id'];
            $asked_parameters = AdminModel::getCategoriesByName($name, $parameter, $event_id);
            echo json_encode($asked_parameters);
        }
        return true;
    }

    public function actionAjaxSendPickedCategoriesForEvent()
    {
        if (!empty($_POST)) {
            $all_ids = $_POST['all'];
            $checked_ids = array();
            if (!empty($_POST['checked'])) {
                $checked_ids = $_POST['checked'];
            }
            $event_id = $_POST['event_id'];
            $result = AdminModel::createEventsCategoriesRelationships($all_ids, $checked_ids, $event_id);
            echo json_encode($result);
        }
        return true;
    }

    public function actionCreateDancingDepartments($event_id)
    {
        if (!empty($_POST)) {
            if (!empty($_POST['new-department-name-confirmation-btn'])) {
                if ($_POST['new-department-name-confirmation-btn'] == 'Создать'
                    && !empty($_POST['new-Department-Name'])
                ) {
                    $name = $_POST['new-Department-Name'];
                    $option_name = $_POST['new-department-name-confirmation-btn'];
                    $result = AdminModel::departmentsOperation($name, $event_id, $option_name);
                } elseif ($_POST['new-department-name-confirmation-btn'] == 'Изменить'
                    && !empty($_POST['new-Department-Name'])
                    && !empty($_POST['department-id'])
                ) {
                    $dep_id = $_POST['department-id'];
                    $name = $_POST['new-Department-Name'];
                    $option_name = $_POST['new-department-name-confirmation-btn'];
                    $result = AdminModel::departmentsOperation($name, $event_id, $option_name, $dep_id);
                }
            } elseif (!empty($_POST['deletion-confirmation-btn']) && !empty($_POST['department-id'])) {
                if (AdminModel::getPermissionForDeletion()) {
                    $result = AdminModel::deleteDepartment($_POST['department-id']);
                }
            }
        }
        if (isset($_SESSION['messages'])) {
            $this->message = $this->parseMessages($_SESSION['messages']);
        }
        $departments = AdminModel::getDepartmentsByEventId($event_id);
        $d_c_program_names = AdminModel::getUniqueDanceCategoryPrograms();
        $this->getHeader('header_admin_complex');
        require_once(ROOT . 'views/admin/option_event/create_dancing_departments.php');
        $this->getFooter('footer_admin');
        unset($_SESSION['messages']);
        return true;
    }

    public function actionPickedCategoriesForEvent($event_id){
        $picked_categories = AdminModel::getPickedCategories($event_id);
        $this->getHeader('header_admin_complex');
        require_once(ROOT . 'views/admin/organizations/picked_categories_for_event.php');
        $this->getFooter('footer_admin');
        return true;
    }

    public function actionAjax_sendRemovedCategories(){
        if(!empty($_POST['categories'])){
            $result = AdminModel::uncheckCategories($_POST['categories']);
            echo json_encode($result);
        } else {
            echo false;
        }
        return true;
    }

    public function actionAjax_getCategoriesToPickForDepartment(){

        if(!empty($_POST['d_c_program']) && !empty($_POST['department_ids'])){
            $department_ids = implode(',', $_POST['department_ids']);

            $result = AdminModel::getTheFilledCategories($_POST['d_c_program'], $department_ids);
            $array = [];
            if($result !== false || !empty($result)){
                $array['dance_categories'] = $result;
            }
            echo json_encode($array);
        }
        return true;
    }

    public function actionAjax_sendCategoriesPickedForDepartment(){
        if(!empty($_POST['department']) && !empty($_POST['pickedCategories'])){
            $department_id = $_POST['department'];
            $picked_categories_ids = $_POST['pickedCategories'];
            $result = AdminModel::assignCategoriesToDepartment($department_id, $picked_categories_ids);
            echo json_encode($result);
        }
        return true;
    }

    public function actionAjax_getDepartmentContent(){
        if(!empty($_POST['department'])){
            $result = AdminModel::getDepartmentCategories($_POST['department']);
            echo json_encode($result);
        }
        return true;
    }

    public function actionAjax_delCategory(){
        if(!empty($_POST['categoryId']) && !empty($_POST['department'])){
            $department_id = $_POST['department'];
            $category_id = $_POST['categoryId'];
            $result = AdminModel::unbindCategoryFromDepartment($department_id, $category_id);
            echo json_encode($result);
        }
        return true;
    }

    public function actionAjax_transferCategory(){
        if(!empty($_POST['from']) && !empty($_POST['to']) && !empty($_POST['category'])){
            $department_from = $_POST['from'];
            $department_to = $_POST['to'];
            $category_id = $_POST['category'];
            $result = AdminModel::unbindCategoryFromDepartment($department_from, $category_id);
            if($result){
                $result_2 = AdminModel::assignCategoriesToDepartment($department_to, [$category_id]);
                echo json_encode($result_2);
            }
            echo json_encode($result);
        }
        return true;
    }

    public function actionEventProgram($event_id){
        $departments = AdminModel::getDepartmentsByEventId($event_id);
        $this->getHeader('header_admin_complex');
        require_once(ROOT . 'views/admin/organizations/event_program.php');
        $this->getFooter('footer_admin');
        return true;
    }

    public function actionAjax_showCategoriesAccordingToDep(){
        if(!empty($_POST['id'])){
            $department_id = (int)$_POST['id'];
            $is_print = $_POST['print'];
            $categories_in_department = AdminModel::getDepartmentCategories($department_id);
            $result = AdminModel::getCategoriesAccordingToDepartment($department_id, $categories_in_department['categories'], $is_print);
            echo json_encode($result);
        }
        return true;
    }

    public function actionAjax_getNewCategoriesOrder(){
        if(!empty($_POST['categories']) && !empty($_POST['department_id'])){
            $categories = $_POST['categories'];
            $department_id = $_POST['department_id'];
            $result = AdminModel::changeCategoriesSortOrder($categories, $department_id);
            echo json_encode($result);
        }
        return true;
    }

    public function actionEventProgramPrint($event_id){
        $departments = AdminModel::getDepartmentsByEventId($event_id);
        $current_event = AdminModel::getEventById($event_id);
        $organization = AdminModel::getOrganizationById($current_event['org_id_for_event']);
        $this->getHeader('header_admin_complex');
        require_once(ROOT . 'views/admin/organizations/event_program_print.php');
        $this->getFooter('footer_admin');
        return true;
    }

    public function actionAjax_setNewCategoriesPrintOrder(){
        if(!empty($_POST['categories']) && !empty($_POST['department_id'])){
            $categories = $_POST['categories'];
            $department_id = $_POST['department_id'];
            $result = AdminModel::changeRoundsSortOrder($categories, $department_id);
            echo json_encode($result);
        }
        return true;
    }

    //TODO: this page is now created yet!
    public function actionJudges($event_id){
        $referrer = $_SERVER['HTTP_REFERER'];
//        $this->getHeader('header_admin_complex');
        require_once(ROOT . 'views/admin/organizations/judges.php');
//        $this->getFooter('footer_admin');
        return true;
    }
}
