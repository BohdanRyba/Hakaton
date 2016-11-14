<?php

trait messagesOperations
{
    public $message;

    public static function saveMessage($data = null)
    {
        if (isset($data)) {
            $_SESSION['messages'] = $data;
        }
        return;
    }

    public function parseMessages($data)
    {
        if ($get = json_decode($data, TRUE)) {
            switch ($get['status']) {
                case 'error':
                    $message = <<<MESSAGE
    <div class="alert alert-danger">{$get['message']}</div>
MESSAGE;
                    break;
                case 'info':
                    $message = <<<MESSAGE
    <div class="alert alert-info">{$get['message']}</div>
MESSAGE;
                    break;
                case 'warning':
                    $message = <<<MESSAGE
    <div class="alert alert-warning">{$get['message']}</div>
MESSAGE;
                    break;
                case 'success':
                default:
                    $message = <<<MESSAGE
    <div class="alert alert-success">{$get['message']}</div>
MESSAGE;
            }
        } else {
            $message = $data;
        }
        return $message;
    }

    public static function showArray($array)
    {
        echo '<hr><br><pre>';
        var_export($array);
        echo '</pre><br><hr>';
    }
}

trait navigationFunctional
{
    public function getLink($data, $current = '', $id = '')
    {
        if ($id !== '') {
            $link = ($current == $data['link']) ? '' : (($data['description'] == 'popup') ? $id . $data['link'] : CORE_PATH . $data['link']);
        } else {
            $link = ($current == $data['link']) ? '' : (($data['description'] == 'popup') ? $current . $data['link'] : CORE_PATH . $data['link']);
        }
        $class = ($data['class'] !== '') ? ' class="' . $data['class'] . '"' : ' class=""';

        return '<li' . $class . '><a href="' . $link . '">' . $data['title'] . '</a></li>';
    }

    public function getNavigation()
    {
        $db = Db::getConnection();
        $db->query("SET NAMES 'utf8'");
        $result = $db->query("SELECT * FROM `pages` WHERE `active` = 1");

        $nav_from_db[] = '';
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $nav_from_db[$i]['id'] = $row['id'];
            $nav_from_db[$i]['title'] = $row['title'];
            $nav_from_db[$i]['link'] = $row['link'];
            $nav_from_db[$i]['description'] = $row['description'];
            $nav_from_db[$i]['active'] = $row['active'];
            $nav_from_db[$i]['grant'] = $row['grant'];
            $nav_from_db[$i]['class'] = $row['class'];
            $i++;
        }
        $db->close();
        return $nav_from_db;
    }

    public function createNavContent($page, $id = '')
    {
        $navigation = $this->getNavigation();

        $navContent = '';
        foreach ($navigation as $nav) {
            if (($nav['grant'] == ADMIN_ACCESS)) {
                if (isset($_SESSION['user_access']) && $_SESSION['user_access'] == ADMIN_ACCESS) {
                    $navContent .= $this->getLink($nav, $page, $id);
                }
            }
            if (($nav['grant'] == USER_ACCESS)) {
                if (isset($_SESSION['user_access']) && ($_SESSION['user_access'] == USER_ACCESS || $_SESSION['user_access'] == ADMIN_ACCESS)) {
                    $navContent .= $this->getLink($nav, $page, $id);
                }
            }
            if (($nav['grant'] == INLOGIN)) {
                if (empty($_SESSION['user_access'])) {
                    $navContent .= $this->getLink($nav, $page, $id);
                }
            }
            if ($nav['grant'] == ANY_ACCESS) {
                $navContent .= $this->getLink($nav, $page, $id);
            }
        }
        return $navContent;
    }
}

trait paginationCreation
{
    public static function getPaginationContent($Cpag, $listAmount) // we receive here two things: number of the current page, and a counted amount of the list which we are going to show;
    {

        if (isset($Cpag) and is_numeric($Cpag)) {
            $current = $Cpag;
        } else {
            $current = self::CURRENT_PAGE;
        }
        $per_page = self::PER_PAGE;

        $pagination = function ($all) use ($per_page, $current) {
            $pag = '<ul class="pagination">';
            for ($i = 0, $j = 0; $i < $all; $i += $per_page, $j++) {
                if ($current == $j + 1) {
                    $pag .= '<li class="active"><span>' . ($j + 1) . '</span></li>';
                } else {
                    $pag .= '<li><a href="' . ($j + 1) . '">' . ($j + 1) . '</a></li>';
                }
            }
            $pag .= '</ul>';
            return $pag;
        };

        $all_count = $listAmount;
        $start = ($current - 1) * $per_page;
        $end = (($current * $per_page) < $all_count) ? $current * $per_page : $all_count;

        $start_end_pagination_array = array();
        array_push($start_end_pagination_array, $start, $end, $pagination($listAmount));

        return $start_end_pagination_array;
    }
}