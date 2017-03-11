<?php

//include_once(ROOT . 'models/Addevent.php');

class EventsController
{
    public function actionIndex()
    {
		$referrer = $_SERVER['HTTP_REFERER'];
		require_once(ROOT . 'views/events/index.php');
        return true;
    }
}