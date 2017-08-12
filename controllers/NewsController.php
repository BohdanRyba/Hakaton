<?php
namespace controllers;
use models\NewsModel;

class NewsController extends AppController
{

    public function __construct()
    {
        $login = new LoginController();
        $result = $login->checkUserTTL();
        if(!$result){
            header('Location: ' . CORE_PATH . 'home');
        }
    }

    public function actionIndex($Cpag)
    {
        if (isset($_SESSION['messages'])) { //if there are messages in $_SESSION;
            $this->message = $this->parseMessages($_SESSION['messages']); //then we parse them: decode and convert an array to string;
        }
        $newsList = NewsModel::getNewsList();
        $start_end_pagination_array = $this->getPaginationContent($Cpag, count($newsList));
        $start = $start_end_pagination_array[0];
        $end = $start_end_pagination_array[1];
        $pagination = $start_end_pagination_array[2];
        $header = $this->loadHeader('simple_header');
        $footer = $this->loadFooter('footer_1');

        require_once(ROOT . 'views/news/index.php');
        unset($_SESSION['messages']); // we should to unset this variable to show correct messages when you reload a page;

        return true;

    }

    public function actionView($id)
    {
        if (isset($_SESSION['messages'])) { //if there are messages in $_SESSION;
            $this->message = $this->parseMessages($_SESSION['messages']); //then we parse them: decode and convert an array to string;
        }
        if ($id) {
            $newsItem = NewsModel::getNewsItemById($id);
            $header = $this->loadHeader('simple_header');
            $footer = $this->loadFooter('footer_1');

            require_once(ROOT . 'views/news/view.php');
            unset($_SESSION['messages']); // we should to unset this variable to show correct messages when you reload a page;

            return true;
        }
        return true;

    }

}