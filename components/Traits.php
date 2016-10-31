<<<<<<< HEAD
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
=======
<?php

trait messagesOperations
{

    public $message;

    public function saveMessage($data = null)
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
>>>>>>> 17191729b31ed5dce03a90a18560cd06fdbb9b9c
}