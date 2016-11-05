<?php

include_once(ROOT . 'models/HomeModel.php');
include_once(ROOT . 'components/Traits.php');

class HomeController
{
    use messagesOperations;

    public function actionIndex()
    {
        if (isset($_SESSION['messages'])) { //if there are messages in $_SESSION;
            $this->message = $this->parseMessages($_SESSION['messages']); //then we parse them: decode and convert an array to string;
        }
        $nav_content = HomeModel::getNavHomeContent('home');

        require_once(ROOT . 'views/home/index.php');
        unset($_SESSION['messages']); // we should to unset this variable to show correct messages when you reload a page;

        return true;
    }
}