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
}