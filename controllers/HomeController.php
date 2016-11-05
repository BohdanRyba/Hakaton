<?php

include_once(ROOT . 'models/HomeModel.php');

class HomeController
{
    public function actionIndex()
    {
        $nav_content = HomeModel::getNavHomeContent('home');

        require_once(ROOT . 'views/home/index.php');

        return true;
    }
}