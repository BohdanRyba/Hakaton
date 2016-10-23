<?php

include_once(ROOT . 'models/NewsModel.php');

class NewsController
{

    public function actionIndex($Cpag)
    {

        $newsList = NewsModel::getNewsList();
        $nav_content = NewsModel::getNavNewsContent($Cpag);
        $start_end_pagination_array = NewsModel::getPaginationContent($Cpag);
        $start = $start_end_pagination_array[0];
        $end = $start_end_pagination_array[1];
        $pagination = $start_end_pagination_array[2];

        require_once(ROOT . 'views/news/index.php');

        return true;

    }

    public function actionView($id)
    {
        if ($id) {
            $newsItem = NewsModel::getNewsItemById($id);
            $nav_content = NewsModel::getNavNewsContent($id);
            require_once(ROOT . 'views/news/view.php');

            return true;
        }
        return true;

    }

}