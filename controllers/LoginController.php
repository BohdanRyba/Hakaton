<?php

include_once(ROOT . 'models/LoginModel.php');
require_once(ROOT . 'components/Traits.php');

class LoginController
{
    use messagesOperations;

    public function actionIndex()
    {
//        $message = '';
        if (isset($_POST['email']) && isset($_POST['pass_in'])) {
            $user = LoginModel::getUserFromBase($_POST['email']);
            if ($_POST['email'] == $user['club_mail'] && !empty($user)) {
                if (md5($_POST['pass_in']) == $user['password']) {
                    $_SESSION['user_access'] = $user['grand'];
                    $_SESSION['current_user'] = $user['club_shief'];
                    $message = json_encode([
                        'status' => 'success',
                        'message' => "Вы успешно прошли авторизацию, {$_SESSION['current_user']}!"
                    ]);
                } else{
                    $message = json_encode([
                        'status' => 'error',
                        'message' => "Введены неверные данные!"
                    ]);
                }
            } else{
                $message = json_encode([
                    'status' => 'error',
                    'message' => "Введены неверные данные!"
                ]);
            }
        }
        self::saveMessage($message);

        require_once(ROOT . 'views/login/index.php');
//        return true;
    }

    public function actionOut()
    {
        unset($_SESSION['user_access']);
        header('Location: ' . CORE_PATH . 'home');
        $message = json_encode([
            'status' => 'info',
            'message' => "Вы вышли!"
        ]);
        self::saveMessage($message);

        return true;
    }
}