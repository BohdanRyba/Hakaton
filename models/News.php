<?php

class News
{
    const CURRENT_PAGE = 1;
    const PER_PAGE = 4;

    public static function getNavNewsContent($Cpag = '', $id =''){
        $navigation = new Navigation();
        $nav_content = '';
        if($Cpag !== ''){
            $nav_content = $navigation->createNavContent("news/page/1", $Cpag);
        } elseif ($id !== '') {
            $nav_content = $navigation->createNavContent("news/single/", $id);
        }
        return $nav_content;
    }

    public static function getPaginationContent($Cpag){

        if (isset($Cpag) and is_numeric($Cpag)) {
            $current = $Cpag;
        } else {
            $current = self::CURRENT_PAGE;
        }
        $per_page = self::PER_PAGE;

        $pagination = function ($all) use ($per_page, $current) {
            $pag = '<ul class="pagination">';
            for ($i = 0, $j = 0; $i < count($all); $i += $per_page, $j++) {
                if ($current == $j + 1) {
                    $pag .= '<li class="active"><span>' . ($j + 1) . '</span></li>';
                } else {
                    $pag .= '<li><a href="' . ($j + 1) . '">' . ($j + 1) . '</a></li>';
                }
            }
            $pag .= '</ul>';
            return $pag;
        };

        $all_count = count(self::getNewsList());
        $start = ($current - 1) * $per_page;
        $end = (($current * $per_page) < $all_count) ? $current * $per_page : $all_count;

        $start_end_pagination_array = array();
        array_push($start_end_pagination_array, $start, $end, $pagination(self::getNewsList()));

        return $start_end_pagination_array;
    }

    public static function getNewsItemById($id)
    {
        $id = intval($id);
        $newsItem = '';
        if ($id) {
            $db = Db::getConnection();
            $db->query("SET NAMES 'utf8'");

            $result = $db->query("SELECT * FROM `news` WHERE `id` = $id");
            $newsItem = $result->fetch_assoc();

            $db->close();
        }
        return $newsItem;
    }

    public static function getNewsList()
    {
        $db = Db::getConnection();
        $db->query("SET NAMES 'utf8'");

        $newsList = array();

        $result = $db->query("SELECT `id`, `title`, `date`, `short_content`, `author_name`, `preview` FROM `news` ORDER BY `id` DESC");

        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $newsList[$i]['preview'] = $row['preview'];
            $i++;
        }
        $db->close();

        return $newsList;
    }
}