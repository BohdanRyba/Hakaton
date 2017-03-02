<?php

include_once(ROOT . 'models/Addevent.php');

class AddeventController
{
    public function actionIndex()
    {

        require_once(ROOT . 'views/addevent/index.php');

        return true;
    }

    public function actionCreate()
    {

        echo '<pre>';
        var_export($_POST);
        echo '</pre>';

        echo '<pre>';
        var_export($_FILES);
        echo '</pre>';

        echo '<pre>';
        var_export($_SESSION);
        echo '</pre>';

        if (isset($_POST)) {
            if (!empty($_POST['nazva_org_event']) && !empty($_POST['status_event']) && !empty($_POST['name_event']) &&
                !empty($_POST['date_event_begin']) && !empty($_POST['date_event_end']) && !empty($_POST['place_event']) &&
                !empty($_POST['country_event']) && !empty($_POST['judge_event']) && !empty($_POST['skrut_event']) &&
                !empty($_POST['add_info_event'])){
                $resulting = (integer) Addevent::createEvent();
                echo $resulting . ' is the result';
            } else {
                echo 'NooooO!';
            }
        }
//        header('Location: ' . CORE_PATH . $_POST['redirect']);

        return true;
    }
}