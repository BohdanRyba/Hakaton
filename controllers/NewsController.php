<?php

include_once(ROOT . 'models/News.php');

class NewsController
{

    public function actionIndex($Cpag)
    {

        $newsList = News::getNewsList();
        $nav_content = News::getNavNewsContent($Cpag);
        $start_end_pagination_array = News::getPaginationContent($Cpag);
        $start = $start_end_pagination_array[0];
        $end = $start_end_pagination_array[1];
        $pagination = $start_end_pagination_array[2];

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