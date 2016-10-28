<?php

include_once(ROOT . 'models/Addnews.php');

class AddnewsController
{

    public function actionIndex()
    {

        require_once(ROOT . 'views/addnews/index.php');

        return true;
    }

    public function actionRecord()
    {

//        echo '<pre>';
//        var_export($_POST);
//        echo '</pre>';
//
//        echo '<pre>';
//        var_export($_FILES);
//        echo '</pre>';
//
//        echo '<pre>';
//        var_export($_SESSION);
//        echo '</pre>';
        $array_for_post_replace = array();

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

//        echo '<hr>';
//        echo '<br>';
//        echo '<pre>';
//        var_export($_POST);
//        echo '</pre>';
//        echo '<br>';
//        echo '<hr>';

        if (isset($_POST)) {
            if (!empty($_POST['title']) && !empty($_POST['short_content']) && !empty($_POST['content'])) {
                $resulting = (integer)Addnews::createNews();
                echo $resulting . ' is the result';
            } else {
                echo 'NooooO!';
            }
        }
        header('Location: '. CORE_PATH. $_POST['redirect']);
        return true;
    }
}