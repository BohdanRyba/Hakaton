<?php

include_once(ROOT . 'models/Home.php');

class HomeController
{
    public function actionIndex()
    {
        $nav_content = Home::getNavHomeContent('home');

        require_once(ROOT . 'views/home/index.php');

        return true;
    }
}