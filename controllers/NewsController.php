<?php

include_once(ROOT . 'models/News.php');

class NewsController
{

    public function actionIndex($Cpag)
    {

        $newsList = News::getNewsList();
        $nav_content = News::getNavNewsContent($Cpag);

        require_once(ROOT . 'views/news/index.php');

        return true;

    }

    public function actionView($id)
    {
        if ($id) {
            $newsItem = News::getNewsItemById($id);
            $nav_content = News::getNavNewsContent($id);
            require_once(ROOT . 'views/news/view.php');

            return true;
        }
        return true;

    }

}