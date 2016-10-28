<?php


class AdminModel
{

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

    public static function updateOrganization(){ // end this method;

        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
//            if()
            $result = $db->query("UPDATE `organizations`
                        SET `org_name` = '{$_POST['org_name']}',
                            `org_abbreviation` = '{$_POST['org_abbreviation']}',
                            `org_head_fio` = '{$_POST['org_head_fio']}',
                            `org_city` = '{$_POST['org_city']}',
                            `org_country` = '{$_POST['org_country']}',
                            `org_phone` = '{$_POST['org_phone']}',
                            `org_email` = '{$_POST['org_email']}'");
            return $result;
        }
        $db->close();
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

    static function event_add($link, $sobytie, $organization, $status, $name_meroprijatia, $date_begin, $date_end,
                              $city, $country, $main_sudia, $skutiner, $afisha/*,$image*/)
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
        //$image=trim($image);


        $t = " INSERT INTO events (sobytie,organization,status,name_meroprijatia,date_begin,date_end,city,country,main_sudia,skutiner,afisha)
  VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');";
        $query = sprintf($t,
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
            mysqli_real_escape_string($link, $afisha)
        /*,mysqli_real_escape_string($link,$image)*/
        );
        $result = mysqli_query($link, $query);
        if (!$result) {
            mysqli_error($link);
        }
        return $result = "successful";
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