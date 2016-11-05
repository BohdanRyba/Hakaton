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

    public static function showArray($array){
        echo '<hr><br><pre>';
        var_export($array);
        echo '</pre><br><hr>';
    }
}