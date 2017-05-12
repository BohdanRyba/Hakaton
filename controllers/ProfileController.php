<?php
namespace controllers;
//use models\NewsModel;

class ProfileController extends AppController
{
    public function actionIndex()
    {
		$referrer = $_SERVER['HTTP_REFERER'];
		require_once(ROOT . 'views/profile/index.php');
        return true;
    }
}