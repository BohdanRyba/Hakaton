<?php
namespace controllers;

class EventsController extends AppController
{
    public function actionIndex()
    {
		$referrer = $_SERVER['HTTP_REFERER'];
		require_once(ROOT . 'views/events/index.php');
        return true;
    }
}