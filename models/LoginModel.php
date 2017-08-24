<?php

namespace models;
use components\Db;

class LoginModel extends AppModel
{
    public static function getUserFromBase($user_email)
    {
        $db = Db::getConnection(Db::ADMIN_BASE);

        $result = $db->query("SELECT * FROM `clubs` WHERE `club_mail` = '$user_email'");
        $get_user = $result->fetch_assoc();

        $db->close();
        return $get_user;
    }

}