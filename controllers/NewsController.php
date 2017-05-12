<?php
namespace controllers;
use components\Router;
use models\NewsModel;

class NewsController extends AppController
{

    public function actionIndex($Cpag)
    {
        if (isset($_SESSION['messages'])) { //if there are messages in $_SESSION;
            $this->message = $this->parseMessages($_SESSION['messages']); //then we parse them: decode and convert an array to string;
        }
        $newsList = NewsModel::getNewsList();
        $nav_content = $this->createNavContent(Router::$uri, $Cpag);
        $start_end_pagination_array = $this->getPaginationContent($Cpag, count($newsList));
        $start = $start_end_pagination_array[0];
        $end = $start_end_pagination_array[1];
        $pagination = $start_end_pagination_array[2];

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
            $nav_content = $this->createNavContent(Router::$uri, $id);
            require_once(ROOT . 'views/news/view.php');
            unset($_SESSION['messages']); // we should to unset this variable to show correct messages when you reload a page;

            return true;
        }
        return true;

    }

}