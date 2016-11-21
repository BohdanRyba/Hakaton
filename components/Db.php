<?php


class Db
{
    const ADMIN_BASE = 'hakaton_admin';

    public static function getConnection($dbname = ''){
        $paramsPath = ROOT. 'config/db_params.php';
        $params = include ($paramsPath);
        if($dbname !== ''){
            $params['dbname'] = $dbname;
        }

        $db = new mysqli($params['host'], $params['user'], $params['password'], $params['dbname']);
        $db->query("SET NAMES 'utf8'");

        return $db;
    }
}