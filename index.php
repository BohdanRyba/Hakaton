<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', __DIR__.'/');
define('CORE_PATH', str_replace('index.php', '', implode('/', explode('/',$_SERVER['PHP_SELF'], -1)).'/'));
define('ADMIN_ROOT', ROOT . 'components/admin/');

require_once (ROOT.'components/admin/AdminRouter.php');
require_once (ROOT.'components/Db.php');
require_once (ROOT.'components/Navigation.php');
require_once (ROOT.'components/Router.php');
require_once (ROOT.'config/const.php');

$router = new Router();
$router->run();
