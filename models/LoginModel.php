<?php

class LoginModel
{
    public static function getUserFromBase($user_email)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM `users` WHERE `email` = '$user_email'");
        $get_user = $result->fetch_assoc();

        $db->close();
        return $get_user;
    }

    public static function getUserEmailFromBase($email)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM `users` WHERE `email` = '$email'");
        $email = $result->fetch_assoc();

        $db->close();
        return $email;
    }

    public static function insertUser()
    {
        $db = Db::getConnection();

        $result = $db->query("INSERT INTO `users`
                        SET `login` = '{$_POST['user_login']}',
                            `password` = MD5('{$_POST['password_2']}'),
                            `grant` = 1,
                            `active` = 1,
                            `FIO` = '{$_POST['user_name']}',
                            `email` = '{$_POST['user_email']}',
                            `country` = '{$_POST['user_country']}',
                            `phone` = {$_POST['user_phone']}");

        return $result;
    }
}