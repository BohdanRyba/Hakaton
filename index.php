<?php

session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function ($class) {
    $file_name = str_replace('\\', '/', $class) . '.php';
    if (file_exists($file_name)) {
        require_once($file_name);
    } else {
        echo "file does not exist!";
    }
});

define('ROOT', __DIR__.'/');
define('CORE_PATH', str_replace('index.php', '', implode('/', explode('/',$_SERVER['PHP_SELF'], -1)).'/'));
define('ADMIN_ROOT', ROOT . 'components/admin/');

//require_once (ROOT.'components/Db.php');
//require_once (ROOT.'components/Router.php');
require_once (ROOT.'config/const.php');

$router = new components\Router();
$router->run();
