<?php

require_once(ROOT . 'components/Traits.php');

class AdminModel
{
    use messagesOperations;
    use paginationCreation;

    const CURRENT_PAGE = 1;
    const PER_PAGE = 4;

    static function getAllOrganizations()
    {
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $query = "SELECT * FROM `organizations` ORDER BY id DESC";
            $result = $db->query($query);

            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $organizationsList[$i]['id'] = $row['id'];
                $organizationsList[$i]['org_name'] = $row['org_name'];
                $organizationsList[$i]['org_abbreviation'] = $row['org_abbreviation'];
                $organizationsList[$i]['org_head_fio'] = $row['org_head_fio'];
                $organizationsList[$i]['org_city'] = $row['org_city'];
                $organizationsList[$i]['org_country'] = $row['org_country'];
                $organizationsList[$i]['org_phone'] = $row['org_phone'];
                $organizationsList[$i]['org_email'] = $row['org_email'];
                $organizationsList[$i]['org_pic_path'] = $row['org_pic_path'];
                $i++;
            }
            $db->close();

        };

        return $organizationsList;
    }

    static function getOrganizationById($id)
    {
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $query = "SELECT * FROM `organizations` WHERE `id` = '{$id}'";
            $result = $db->query($query);

            $row = $result->fetch_assoc();
            return $row;
        }
        $db->close();
    }

    public static function recordOrganization()
    {
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {

            if ($_FILES['org_image']['error'] == 0) {
                $file_destination = ROOT . 'views/main/img/org_image/' . $_FILES['org_image']['name'];
                move_uploaded_file($_FILES['org_image']['tmp_name'], $file_destination);
            }

            $result = $db->query("INSERT INTO `organizations`
                        SET `org_name` = '{$_POST['org_name']}',
                            `org_abbreviation` = '{$_POST['org_abbreviation']}',
                            `org_head_fio` = '{$_POST['org_head_fio']}',
                            `org_city` = '{$_POST['org_city']}',
                            `org_country` = '{$_POST['org_country']}',
                            `org_phone` = '{$_POST['org_phone']}',
                            `org_email` = '{$_POST['org_email']}',
                            `org_pic_path` = 'views/main/img/org_image/{$_FILES['org_image']['name']}'");

            return $result;
        }
        $db->close();
    }

    public static function addSlashes($element)
    {
        if (preg_match('/\'/', $element, $result)) {
            $element = str_replace('\'', '\\\'', $element);
            return $element;
        } else return $element;
    }

    public static function updateOrganization()
    {

        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $organizanization = AdminModel::getOrganizationById($_POST['id']);
            if ($_POST['org_name'] !== $organizanization['org_name']) {
                $result = $db->query("UPDATE `organizations`
                                      SET `org_name` = '{$_POST['org_name']}'
                                      WHERE `id` = {$_POST['id']}");
            }
            $result = $db->query("UPDATE `organizations`
                                  SET `org_abbreviation` = '{$_POST['org_abbreviation']}',
                                    `org_head_fio` = '{$_POST['org_head_fio']}',
                                    `org_city` = '{$_POST['org_city']}',
                                    `org_country` = '{$_POST['org_country']}',
                                    `org_phone` = '{$_POST['org_phone']}',
                                    `org_email` = '{$_POST['org_email']}'
                                    WHERE `id` = {$_POST['id']}");
            if ($result) {
                $message = json_encode([
                    'status' => 'success',
                    'message' => 'Изменения успешно сохранены!'
                ]);
            } else {
                $message = json_encode([
                    'status' => 'error',
                    'message' => 'Изменения сохранить не удалось! Пожалуйста, проверьте правильность ввода данных! Номер телефона должен состоять из цифер!'
                ]);

            }
            self::saveMessage($message);

            $db->close();
            return $result;
        } else return 'db.connect false';
    }

    public static function deleteOrganization($id)
    {
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $organizanization = AdminModel::getOrganizationById($id);

            $result = $db->query("DELETE FROM `organizations` WHERE `id` = {$id}");

            $tmp_arr_with_pic_path = explode("/", $organizanization['org_pic_path']); // we create temp array for pulling out the picture name;
            $image_name = array_pop($tmp_arr_with_pic_path); // then we are pulling that picture name;
            $pic_folder = implode("/", $tmp_arr_with_pic_path) . '/'; // after that we glue all the components to create a folder path with pictures;

            $old = getcwd(); // Save the current directory
            chdir(ROOT . $pic_folder); // change the dir where lays the organization's picture;
            $delete_picture_result = unlink(ROOT . $pic_folder . $image_name); // then delete the picture;
            chdir($old); // Restore the old working directory;

            if ($result == true && $delete_picture_result == true) {
                $message = json_encode([
                    'status' => 'success',
                    'message' => 'ОРГАНИЗАЦИЯ и ЛОГОТИП успешно удалены!'
                ]);
            } elseif ($result == true && $delete_picture_result == false) {
                $message = json_encode([
                    'status' => 'warning',
                    'message' => ' ЛОГОТИП организации удалить не удалось ( но сама организация удалена из базы данных успешно)!'
                ]);
            } elseif ($result == false && $delete_picture_result == true) {
                $message = json_encode([
                    'status' => 'warning',
                    'message' => 'Не удалось удалить ОРГАНИЗАЦИЮ из базы данных (но сам логотип удален успешно)!'
                ]);
            } elseif ($result == false && $delete_picture_result == false) {
                $message = json_encode([
                    'status' => 'error',
                    'message' => 'ОРГАНИЗАЦИЮ и ЛОГОТИП удалить не удалось!'
                ]);
            } else {
                $message = json_encode([
                    'status' => 'error',
                    'message' => 'Организацию удалить не удалось!'
                ]);
            }

            self::saveMessage($message);

            $db->close();
            return $result;
        } else return 'db.connect false';
    }

    public static function ShowClubs($id)
    {
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $query = "SELECT * FROM `clubs` WHERE org_id_for_club = {$id} ORDER BY id DESC";
            $result = $db->query($query);
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $clubsList[$i]['id'] = $row['id'];
                $clubsList[$i]['club_name'] = $row['club_name'];
                $clubsList[$i]['club_country'] = $row['club_country'];
                $clubsList[$i]['club_city'] = $row['club_city'];
                $clubsList[$i]['club_shief'] = $row['club_shief'];
                $clubsList[$i]['club_number'] = $row['club_number'];
                $clubsList[$i]['club_mail'] = $row['club_mail'];
                $clubsList[$i]['org_id_for_club'] = $row['org_id_for_club'];

                $i++;
            }
            $db->close();
        }
        return $clubsList;
    }

    public static function ShowEvents($id)
    {
        $eventsList = [];
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $query = "SELECT * FROM `events` WHERE org_id_for_event = {$id} ORDER BY id DESC";
            $result = $db->query($query);

            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $eventsList[$i]['id'] = $row['id'];
                $eventsList[$i]['event_name'] = $row['event_name'];
                $eventsList[$i]['event_image'] = $row['event_image'];
                $eventsList[$i]['event_status'] = $row['event_status'];
                $eventsList[$i]['event_start'] = $row['event_start'];
                $eventsList[$i]['event_end'] = $row['event_end'];
                $eventsList[$i]['event_city'] = $row['event_city'];
                $eventsList[$i]['event_country'] = $row['event_country'];
                $eventsList[$i]['event_referee'] = $row['event_referee'];
                $eventsList[$i]['event_skutiner'] = $row['event_skutiner'];
                $i++;
            }
            $db->close();

        };

        return $eventsList;
    }

    static function club_add($a)
    {
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {

            if ($_FILES['club_image']['error'] == 0) {
                $file_destination = ROOT . 'views/main/img/club_img/' . $_FILES['club_image']['name'];
                move_uploaded_file($_FILES['club_image']['tmp_name'], $file_destination);
            }
            $pass = md5($a['club_number']);
            $result = $db->query("INSERT INTO `clubs`
                        SET `club_name`       = '{$a['club_name']}',
                        `club_image`          = '../../../views/main/img/club_img/{$_FILES['club_image']['name']}',
                        `club_country`        = '{$a['club_country']}',
                        `club_city`           = '{$a['club_city']}',
                        `club_shief`          = '{$a['club_shief']}',
                        `club_number`         = '{$a['club_number']}',
                        `club_mail`           = '{$a['club_mail']}',
                        `org_id_for_club`           = '{$a['org_id']}',
                        `password`='{$pass}',
                        `grant`=1,
                        `active`=1
                        ");


            return $result;
        }
        $db->close();
        return true;
    }

    static function event_add($a)
    {
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {

            if ($_FILES['event_image']['error'] == 0) {
                $file_destination = ROOT . 'views/main/img/event_img/' . $_FILES['event_image']['name'];
                move_uploaded_file($_FILES['event_image']['tmp_name'], $file_destination);
            }
            $result = $db->query("INSERT INTO `events`
                        SET `event_name`       = '{$a['event_name']}',
                        `event_image`          = '../../../views/main/img/event_img/{$_FILES['event_image']['name']}',
                        `event_status`        = '{$a['event_status']}',
                        `event_start`           = '{$a['data-start']}',
                        `event_end`          = '{$a['data-finish']}',
                        `event_city`   = '{$a['event_city']}',
                        `event_country`  = '{$a['event_country']}',
                        `event_referee`   = '{$a['event_referee']}',
                        `event_skutiner`= '{$a['event_skutiner']}',
                        `org_id_for_event`= '{$a['org_id']}'
                        ");

            $db->close();
            return $result;
        }
        return true;
    }

    static function events_all($link)
    {
        $query = "SELECT * FROM events ORDER BY id DESC";
        $result = mysqli_query($link, $query);
        if (!$result) {
            die(mysqli_error($link));
        }
        $n = mysqli_num_rows($result);

        $events = array();

        for ($i = 0; $i < $n; $i++) {
            $row = mysqli_fetch_assoc($result);
            $events[] = $row;
        }

        return $events;
    }

    static function event_by_id($link, $event_id)
    {
        $query = sprintf("SELECT * FROM events WHERE id=%d", (int)$event_id);
        $result = mysqli_query($link, $query);
        $event = array();
        if (!$result) {
            die(mysqli_error($link));
        }
        $event = mysqli_fetch_assoc($result);
        return $event;
    }

    static function event_edit($link, $id, $sobytie, $organization, $status, $name_meroprijatia, $date_begin, $date_end,
                               $city, $country, $main_sudia, $skutiner, $afisha)
    {
        if (is_null($organization) || is_null($status) || is_null($name_meroprijatia) || is_null($date_begin) || is_null($date_end) ||
            is_null($city) || is_null($country) || is_null($main_sudia) || is_null($skutiner) || is_null($afisha) /*and $image=''*/
        ) {
            return false;
        }
        $sobytie = trim($sobytie);
        $organization = trim($organization);
        $status = trim($status);
        $name_meroprijatia = trim($name_meroprijatia);
        $date_begin = trim($date_begin);
        $date_end = trim($date_end);
        $city = trim($city);
        $country = trim($country);
        $main_sudia = trim($main_sudia);
        $skutiner = trim($skutiner);
        $afisha = trim($afisha);

        $sql = "UPDATE events SET sobytie='%s', organization='%s', status='%s', name_meroprijatia='%s', date_begin='%s',date_end='%s', city='%s', country='%s', main_sudia='%s' ,skutiner='%s', afisha='%s' WHERE id='%d'";
        $query = sprintf(
            $sql,
            mysqli_real_escape_string($link, $sobytie),
            mysqli_real_escape_string($link, $organization),
            mysqli_real_escape_string($link, $status),
            mysqli_real_escape_string($link, $name_meroprijatia),
            mysqli_real_escape_string($link, $date_begin),
            mysqli_real_escape_string($link, $date_end),
            mysqli_real_escape_string($link, $city),
            mysqli_real_escape_string($link, $country),
            mysqli_real_escape_string($link, $main_sudia),
            mysqli_real_escape_string($link, $skutiner),
            mysqli_real_escape_string($link, $afisha),
            $id
        );
        $result = mysqli_query($link, $query);
        if (!$result) {
            die(mysqli_error($link));
        }
        return mysqli_affected_rows($link);
    }

    static function event_delete($link, $id)
    {
        if ($id == '') {
            return false;
        }
        $id = (int)$id;
        $query = sprintf("DELETE FROM events WHERE id='%d'", $id);
        $result = mysqli_query($link, $query);
        if (!$result) {
            die(mysqli_error($link));
        }
        return mysqli_affected_rows($link);
    }

    static function saveDanceProgram($json)
    {
        $result = '';
        $message = '';
        $array_for_record = array();
        if (isset($json) && !empty($json)) {
            if ($db = Db::getConnection(Db::ADMIN_BASE)) {
                $result = $db->query("INSERT INTO `dance_groups`
                        SET `dance_group_name` = '{$json['dance-group-name']}',
                            `d_program` = '" . serialize($json['programs']) . "',
                            `d_age_category` = '" . serialize($json['age-categories']) . "',
                            `d_nomination` = '" . serialize($json['nominations']) . "',
                            `d_league` = '" . serialize($json['leagues']) . "'");
                if ($result == true) {
                    $message = json_encode([
                        'status' => 'success',
                        'message' => "Танцевальная программа \"{$json['dance-group-name']}\" успешно сохранена!"
                    ]);
                } elseif ($result == false) {
                    $message = json_encode([
                        'status' => 'error',
                        'message' => "Танцевальную программу \"{$json['dance-group-name']}\" сохранить не удалось!"
                    ]);
                }
            } else {
                $message = json_encode([
                    'status' => 'error',
                    'message' => 'НЕ удалось установить соединение с базой данных! Что-то пошло не так...'
                ]);
            }
        }
        self::saveMessage($message);
        return $result;
    }

    static function getAllDanceGroups()
    {
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $query = "SELECT * FROM `dance_groups` ORDER BY `dance_group_name` ASC";
            $result = $db->query($query);

            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $danceProgramList[$i]['id'] = $row['id'];
                $danceProgramList[$i]['dance_group_name'] = $row['dance_group_name'];
                $danceProgramList[$i]['d_program'] = $row['d_program'];
                $danceProgramList[$i]['d_age_category'] = $row['d_age_category'];
                $danceProgramList[$i]['d_nomination'] = $row['d_nomination'];
                $danceProgramList[$i]['d_league'] = $row['d_league'];
                $i++;
            }
            $db->close();

        };

        return $danceProgramList;
    }

    static function getDanceGroupsById($id)
    {
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $query = "SELECT * FROM `dance_groups` WHERE `id` = {$id}";
            $result = $db->query($query);

            $row = $result->fetch_assoc();
            $danceProgram['id'] = $row['id'];
            $danceProgram['dance_group_name'] = $row['dance_group_name'];
            $danceProgram['d_program'] = unserialize($row['d_program']);
            $danceProgram['d_age_category'] = unserialize($row['d_age_category']);
            $danceProgram['d_nomination'] = unserialize($row['d_nomination']);
            $danceProgram['d_league'] = unserialize($row['d_league']);

            $db->close();

        };

        return $danceProgram;
    }

    static function saveCategoryParameters($json, $org_id)
    {
        $result = FALSE;
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $check = $db->query("SELECT `id_dance_group`, `id_org` FROM `category_parameters` WHERE `id_dance_group` = {$json[4]} AND `id_org` = $org_id");
            $row = $check->fetch_assoc();
//            $_SESSION['for_check'] = $row;
            if ($row['id_dance_group'] == $json[4] && $row['id_org'] == $org_id) {
                $result = $db->query("UPDATE `category_parameters`
                                  SET `c_p_programs` = '" . serialize($json[0]) . "',
                                      `c_p_age_categories` = '" . serialize($json[1]) . "',
                                      `c_p_nominations` = '" . serialize($json[2]) . "',
                                      `c_p_leagues` = '" . serialize($json[3]) . "'
                                  WHERE `id_dance_group` = {$json[4]} AND `id_org` = $org_id");
                if ($result) {
                    $result = 'updated';
                }
            } else {
                $result = $db->query("INSERT INTO `category_parameters`
                        SET `id` = NULL,
                            `c_p_programs` = '" . serialize($json[0]) . "',
                            `c_p_age_categories` = '" . serialize($json[1]) . "',
                            `c_p_nominations` = '" . serialize($json[2]) . "',
                            `c_p_leagues` = '" . serialize($json[3]) . "',
                            `id_dance_group` = {$json[4]},
                            `id_org` = '{$org_id}'");
                if ($result) {
                    $result = 'inserted';
                }
            }
            $db->close();
        }
        return $result;
    }

    static function getCategoryParametersById($id)
    {
        $returning_array = [];
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $query = "SELECT * FROM `category_parameters` WHERE `id_dance_group` = {$id} AND `id_org` = {$_COOKIE['get_id']}";
            $result = $db->query($query);
            while ($row = $result->fetch_assoc()) {
                $returning_array['id'] = $row['id'];
                $returning_array['c_p_programs'] = unserialize($row['c_p_programs']);
                $returning_array['c_p_age_categories'] = unserialize($row['c_p_age_categories']);
                $returning_array['c_p_nominations'] = unserialize($row['c_p_nominations']);
                $returning_array['c_p_leagues'] = unserialize($row['c_p_leagues']);
            }
            $db->close();
        };
        return $returning_array;
    }

    static function getCategoryParametersForCreating()
    {
        $category_parameters = [];
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $query = "SELECT `dance_groups`.`dance_group_name`, `category_parameters`.`id_dance_group`
                      FROM `dance_groups`
                      RIGHT JOIN `category_parameters`
                      ON `dance_groups`.`id`=`category_parameters`.`id_dance_group` AND `category_parameters`.`id_org`={$_COOKIE['get_id']}";
            $result = $db->query($query);

            $i = 0;
            while ($row = $result->fetch_assoc()) {
                if ($row['dance_group_name'] != NULL) {
                    $category_parameters[$i]['dance_group_name'] = $row['dance_group_name'];
                    $category_parameters[$i]['id_dance_group'] = $row['id_dance_group'];
                }
                $i++;
            }
            $db->close();
        };
        return $category_parameters;
    }

    static function saveCreatedCategory($category_parts)
    {
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $query = "SELECT * FROM `dance_categories`
                      WHERE `d_c_program`='{$category_parts[0]}'
                      AND `d_c_age_category`='{$category_parts[1]}'
                      AND `d_c_nomination`='{$category_parts[2]}'
                      AND `d_c_league`='{$category_parts[3]}'
                      AND `org_id`={$_COOKIE['get_id']}
                      ";
            $result = $db->query($query);
            $checking_result = $result->fetch_assoc();

            if (!empty($checking_result)) {
                return 'Категория "' . $category_parts[0] . ' ' . $category_parts[1] . ' ' . $category_parts[2] . ' ' . $category_parts[3] . '" уже существует!';
            } else {
                $result = $db->query("INSERT INTO `dance_categories`
                        SET `id` = NULL,
                            `d_c_program` = '{$category_parts[0]}',
                            `d_c_age_category` = '{$category_parts[1]}',
                            `d_c_nomination` = '{$category_parts[2]}',
                            `d_c_league` = '{$category_parts[3]}',
                            `org_id` = {$_COOKIE['get_id']},
                            `extra_id` = '{$category_parts[4]}',
                            `id_dance_group` = '{$category_parts[5]}'");
                if($result){
                    return 'Категория "' . $category_parts[0] . ' ' . $category_parts[1] . ' ' . $category_parts[2] . ' ' . $category_parts[3] . '" успешно создана!';
                } else {
                    return 'Категория "' . $category_parts[0] . ' ' . $category_parts[1] . ' ' . $category_parts[2] . ' ' . $category_parts[3] . '" не создана, что-то пошло не так...';
                }
            }
        }
        $db->close();
    }

    public static function getCategoryParametersByParameter($parameter){
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $array_with_parameters = [];
            $result = $db->query("SELECT `{$parameter}` FROM `category_parameters` WHERE `id_org` = {$_COOKIE['get_id']}");
            while ($row = $result->fetch_assoc()){
                $array_with_parameters[] = unserialize($row[$parameter]);
            }
            return $array_with_parameters;
        }
        $db->close();
    }

    public static function getCategoriesByName($searching_array){
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $array_with_parameters = [];
            $result = $db->query("SELECT * FROM `dance_categories` WHERE `{$searching_array['parameter']}` = '{$searching_array['name']}' AND `org_id` = {$_COOKIE['get_id']}");
            while ($row = $result->fetch_assoc()){
                $array_with_parameters[] = $row;
            }
            return $array_with_parameters;
        }
        $db->close();
    }
}