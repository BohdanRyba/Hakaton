<?php
namespace controllers;
use models\NewsModel;

class NewsController extends AppController
{
    public function __construct()
    {
        $this->checkUserSessionTTL();
    }

    public function actionIndex($Cpag)
    {
        if (isset($_SESSION['messages'])) {
            $this->message = $this->parseMessages($_SESSION['messages']);
        }
        $newsList = NewsModel::getNewsList();
        $start_end_pagination_array = $this->getPaginationContent($Cpag, count($newsList));
        $start = $start_end_pagination_array[0];
        $end = $start_end_pagination_array[1];
        $pagination = $start_end_pagination_array[2];
        $_SESSION['current_page_id'] = $Cpag;
        $this->getHeader('header_base');
        require_once(ROOT . 'views/news/index.php');
        $this->getFooter('footer_base');
        unset($_SESSION['messages']);
        return true;
    }

    public function actionView($id)
    {
        if ($id) {
            if (isset($_SESSION['messages'])) {
                $this->message = $this->parseMessages($_SESSION['messages']);
            }
            $newsItem = NewsModel::getNewsItemById($id);
            $this->getHeader('header_base');
            require_once(ROOT . 'views/news/view.php');
            $this->getFooter('footer_base');
            unset($_SESSION['messages']);
            return true;
        }
        return true;
    }

    //TODO: this page should be created in future
    public function actionAdd()
    {
        $referrer = '/home';
//        $this->getHeader('header_base');
        require_once(ROOT . 'views/news/add.php');
//        $this->getFooter('footer_base');
        return true;
    }

    //TODO: this method serves "actionAdd" - it creates the news
    public function actionRecord(){
        $array_for_post_replace = [];

        foreach ($_POST as $post_string) {
            if (preg_match('/\'/', $post_string, $result)) {
                $post_string = str_replace('\'', '\\\'', $post_string);
                array_push($array_for_post_replace, $post_string);
            } else {
                array_push($array_for_post_replace, $post_string);
            }
        }
        $_POST['title'] = $array_for_post_replace[0];
        $_POST['short_content'] = $array_for_post_replace[1];
        $_POST['content'] = $array_for_post_replace[2];
        $_POST['submitik'] = $array_for_post_replace[3];

        if (isset($_POST)) {
            if (!empty($_POST['title']) && !empty($_POST['short_content']) && !empty($_POST['content'])) {
                $resulting = (integer)NewsModel::createNews();
                echo $resulting . ' is the result';
            } else {
                echo 'There is no needed data to create the news!';
            }
        }
//        header('Location: '. CORE_PATH. $_POST['redirect']);
        header('Location: /home');
        return true;
    }
}