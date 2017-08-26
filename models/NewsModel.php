<?php

namespace models;
use components\Db;

class NewsModel extends AppModel
{

    public static function getNewsItemById($id)
    {
        $id = intval($id);
        $newsItem = '';
        if ($id) {
            if ($db = Db::getConnection(Db::ADMIN_BASE)) {
                $result = $db->query("SELECT * FROM `news` WHERE `id` = $id");
                $newsItem = $result->fetch_assoc();
                $db->close();
            } else {
                return false;
            }
        }
        return $newsItem;
    }

    public static function getNewsList()
    {
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $newsList = [];
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
        } else {
            return false;
        }
    }

    //TODO this method is unused now, create the news
    public static function createNews()
    {
        if ($db = Db::getConnection(Db::ADMIN_BASE)) {
            $result = false;
            if ($_FILES['image']['error'] == 0) {
                $file_destination = ROOT . 'images/news/' . $_FILES['image']['name'];
                if (move_uploaded_file($_FILES['image']['tmp_name'], $file_destination)) {
                    $result = $db->query("INSERT INTO `news`
                        SET `title` = '{$_POST['title']}',
                            `date` = NOW(),
                            `short_content` = '{$_POST['short_content']}',
                            `content` = '{$_POST['content']}',
                            `author_name` = '{$_SESSION['current_user']}',
                            `preview` = 'images/news/{$_FILES['image']['name']}',
                            `type` = 'article'");
                }
            }
            $db->close();
            return $result;
        } else {
            return false;
        }
    }
}