<?php

namespace models;

use components\Db;

class AppModel
{
    public static function saveMessage($data = null)
    {
        if (isset($data)) {
            $_SESSION['messages'] = $data;
        }
        return;
    }

    public static function getUser($id)
    {
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $query = "SELECT * FROM `clubs` WHERE `id` = '{$id}'";
            $result = $db->query($query);
            $row = $result->fetch_assoc();
            $db->close();
            return $row;
        } else {
            return false;
        }
    }

    public static function showArray($array)
    {
        echo '<hr><br><pre>';
        print_r($array);
        echo '</pre><br><hr>';
    }
}