<?php

//include_once(ROOT . 'models/Addevent.php');

class ProfileController
{
    public function actionIndex()
    {
		$referrer = $_SERVER['HTTP_REFERER'];
		require_once(ROOT . 'views/profile/index.php');
        return true;
    }
}