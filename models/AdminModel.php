<?php

require_once(ROOT . 'components/Traits.php');

class AdminModel
{
    use messagesOperations;

    const CURRENT_PAGE = 1;
    const PER_PAGE = 4;

    public static function getPaginationContent($Cpag)
    {

        if (isset($Cpag) and is_numeric($Cpag)) {
            $current = $Cpag;
        } else {
            $current = self::CURRENT_PAGE;
        }
        $per_page = self::PER_PAGE;

        $pagination = function ($all) use ($per_page, $current) {
            $pag = '<ul class="pagination">';
            for ($i = 0, $j = 0; $i < count($all); $i += $per_page, $j++) {
                if ($current == $j + 1) {
                    $pag .= '<li class="active"><span>' . ($j + 1) . '</span></li>';
                } else {
                    $pag .= '<li><a href="' . ($j + 1) . '">' . ($j + 1) . '</a></li>';
                }
            }
            $pag .= '</ul>';
            return $pag;
        };

        $all_count = count(self::getAllOrganizations());
        $start = ($current - 1) * $per_page;
        $end = (($current * $per_page) < $all_count) ? $current * $per_page : $all_count;

        $start_end_pagination_array = array();
        array_push($start_end_pagination_array, $start, $end, $pagination(self::getAllOrganizations()));

        return $start_end_pagination_array;
    }

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
            echo '<br>';
            echo 'Path to picture in database: '.$organizanization['org_pic_path'];
            echo '<br>';

            echo '<br><pre>Temp array with path:<br>';
            var_export($tmp_arr_with_pic_path);
            echo '<br></pre>';


            $image_name = array_pop($tmp_arr_with_pic_path); // then we are pulling that picture name;
            echo '<br>';
            echo 'Image name from the temp array: '. $image_name;
            echo '<br>';

            $pic_folder = implode("/", $tmp_arr_with_pic_path) . '/'; // after that we glue all the components to create a folder path with pictures;
            echo '<br>';
            echo 'Folder name where lay all the pictures: '. $pic_folder;
            echo '<br>';

            $old = getcwd(); // Save the current directory
            echo '<br>';
            echo 'Current directory path: '. $old;
            echo '<br>';

            chdir(ROOT. $pic_folder); // change the dir where lays the organization's picture;
            echo '<br>';
            echo 'Path to the folder where lay all the pictures: '. ROOT. $pic_folder;
            echo '<br>';

            echo '<br>';
            echo 'Full path to the picture which we want to delete: '. ROOT. $pic_folder. $image_name;
            echo '<br>';
            $delete_picture_result = unlink(ROOT. $pic_folder. $image_name); // then delete the picture;
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
    }// end this method;

    public static function ShowClubs(){
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $query = "SELECT * FROM `clubs` ORDER BY id DESC";
            $result = $db->query($query);
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $clubsList[$i]['id'] = $row['id'];
                $clubsList[$i]['club_name'] = $row['club_name'];
                $clubsList[$i]['club_country'] = $row['club_country'];
                $clubsList[$i]['club_city'] = $row['club_city'];
                $clubsList[$i]['club_shief'] = $row['club_shief'];
                $clubsList[$i]['club_first_trener'] = $row['club_first_trener'];
                $clubsList[$i]['club_second_trener'] = $row['club_second_trener'];
                $clubsList[$i]['club_third_trener'] = $row['club_third_trener'];
                $clubsList[$i]['club_number'] = $row['club_number'];
                $clubsList[$i]['club_mail'] = $row['club_mail'];
                $i++;
            }
            $db->close();
        }
        return $clubsList;
    }

    public static function ShowEvents(){
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $query = "SELECT * FROM `events` ORDER BY id DESC";
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

            $result = $db->query("INSERT INTO `clubs`
                        SET `club_name`       = '{$a['club_name']}',
                        `club_image`          = 'views/main/img/club_img/{$_FILES['club_image']['name']}',
                        `club_country`        = '{$a['club_country']}',
                        `club_city`           = '{$a['club_city']}',
                        `club_shief`          = '{$a['club_shief']}',
                        `club_first_trener`   = '{$a['club_first_trener']}',
                        `club_second_trener`  = '{$a['club_second_trener']}',
                        `club_third_trener`   = '{$a['club_third_trener']}',
                        `club_number`         = '{$a['club_number']}',
                        `club_mail`           = '{$a['club_mail']}'
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
                        `event_image`          = '../../views/main/img/event_img/{$_FILES['event_image']['name']}',
                        `event_status`        = '{$a['event_status']}',
                        `event_start`           = '{$a['event_start']}',
                        `event_end`          = '{$a['event_end']}',
                        `event_city`   = '{$a['event_city']}',
                        `event_country`  = '{$a['event_country']}',
                        `event_referee`   = '{$a['event_referee']}',
                        `event_skutiner`         = '{$a['event_skutiner']}'
                        ");

            return $result;
        }
        $db->close();
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
}