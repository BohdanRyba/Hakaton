<?php

class Addevent
{
    public static function createEvent()
    {
        $db = Db::getConnection();
        $db->query("SET NAMES 'utf8'");
        if (isset($_FILES) && !empty($_FILES['image'])) {
            if ($_FILES['image']['error'] == 0) {
                $file_destination = ROOT . 'images/events/' . $_FILES['image']['name'];
                if (move_uploaded_file($_FILES['image']['tmp_name'], $file_destination)) {
                    $result = $db->query("INSERT INTO `events`
                        SET `nazva_org_event` = '{$_POST['nazva_org_event']}',
                            `status_event` = '{$_POST['status_event']}',
                            `name_event` = '{$_POST['name_event']}',
                            `date_event_begin` = '{$_POST['date_event_begin']}',
                            `date_event_end` = '{$_POST['date_event_end']}',
                            `place_event` = '{$_POST['place_event']}',
                            `country_event` = '{$_POST['country_event']}',
                            `judge_event` = '{$_POST['judge_event']}',
                            `skrut_event` = '{$_POST['skrut_event']}',
                            `add_info_event` = '{$_POST['add_info_event']}',
                            `image_path` = 'images/events/{$_FILES['image']['name']}");
                }
            }
        } else {

        }

        $db->close();
        return $result;
    }
}