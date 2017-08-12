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

    public static function setUserSessionTTL($user, $userLoginDate, $ttl, $userSessionLogoutDate){
        if($db = Db::getConnection(Db::ADMIN_BASE)){
            $result = $db->query("UPDATE `clubs`
                                        SET `login_date` = '{$userLoginDate}',
                                            `session_ttl` = '{$ttl}',
                                            `logout_date` = '{$userSessionLogoutDate}'
                                        WHERE `id` = '{$user['id']}'
                                        ");
            return $result;
        } else {
            return false;
        }
    }

    public static function clearUserSessionInfo($user){
        if($db = Db::getConnection(Db::ADMIN_BASE)){
            $result = $db->query("UPDATE `clubs`
                                         SET `login_date` = NULL,
                                             `session_ttl` = 120,
                                             `logout_date` = NULL
                                         WHERE `id` = '{$user['id']}'
                                        ");
            return $result;
        } else {
            return false;
        }
    }

}