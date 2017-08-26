<?php
namespace controllers;

//use models\HomeModel;

class HomeController extends AppController
{
    public function __construct()
    {
        $this->checkUserSessionTTL();
    }

    public function actionIndex()
    {
        if (isset($_SESSION['messages'])) {
            $this->message = $this->parseMessages($_SESSION['messages']);
        }
        $this->getHeader('header_base');
        require_once(ROOT . 'views/home/index.php');
        $this->getFooter('footer_base');
        unset($_SESSION['messages']);
        return true;
    }
}