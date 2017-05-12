<?php
namespace controllers;

//use models\HomeModel;

class HomeController extends AppController
{

    public function actionIndex()
    {
        if (isset($_SESSION['messages'])) { //if there are messages in $_SESSION;
            $this->message = $this->parseMessages($_SESSION['messages']); //then we parse them: decode and convert an array to string;
        }
        $header = $this->loadHeader('simple_header');
        $footer = $this->loadFooter('footer_1');

        require_once(ROOT . 'views/home/index.php');
        unset($_SESSION['messages']); // we should to unset this variable to show correct messages when you reload a page;

        return true;
    }
}