<?php
namespace controllers;
use models\LoginModel;

class LoginController extends AppController
{
    public function actionIndex()
    {
        $message = '';
        if (isset($_POST['email']) && isset($_POST['pass_in'])) {

            $user = LoginModel::getUserFromBase($_POST['email']);
            if ($_POST['email'] == $user['club_mail'] && !empty($user)) {
                if (md5($_POST['pass_in']) == $user['password']) {
                    $_SESSION['accessing'] = $user['grant'];
                    $_SESSION['current_user_id'] = $user['id'];
                    $_SESSION['current_user'] = $user['club_shief'];
                    if(!empty($_POST['remember_me'])){
                        $ttl = 31536000;
                        $this->setUserSessionTTL($ttl);
                        $time_message = '1 год';
                    } else {
                        $ttl = 120;
                        $this->setUserSessionTTL($ttl);
                        $time_message = '2 минуты';
                    }
                    $message = json_encode([
                        'status' => 'success',
                        'message' => "Вы успешно авторизированы, {$_SESSION['current_user']} (Ваше время сессии: {$time_message})"
                    ]);
                } else {
                    $message = json_encode([
                        'status' => 'error',
                        'message' => 'Вы ввели неверные данные!'
                    ]);
                }
            } else {
                $message = json_encode([
                    'status' => 'error',
                    'message' => 'Вы ввели неверные данные!'
                ]);
            }
        }

        self::saveMessage($message);

        require_once(ROOT . 'views/login/index.php'); // CAUTION!!! There is a REDIRECT to home page!!!

        return true;
    }

    public function setUserSessionTTL($ttl){
        $userLoginTimestamp = time();
        $userSessionLogoutTimestamp = $userLoginTimestamp + $ttl;
        $_SESSION['session_login_timestamp'] = $userLoginTimestamp;
        $_SESSION['session_logout_timestamp'] = $userSessionLogoutTimestamp;
        return;
    }

    public function actionOut($ttl_is_out = false)
    {
        unset($_SESSION['accessing']);
        unset($_SESSION['user_access']);
        unset($_SESSION['org_id']);
        unset($_SESSION['organization_id']);
        unset($_SESSION['current_user']);
        unset($_SESSION['current_user_id']);
        unset($_SESSION['event_id']);
        unset($_SESSION['session_login_timestamp']);
        unset($_SESSION['session_logout_timestamp']);
        unset($_SESSION['session_ttl']);
        if($ttl_is_out){
            $message = json_encode([
                'status' => 'info',
                'message' => 'Ваше время сессии вышло!'
            ]);
        } else {
            $message = json_encode([
                'status' => 'info',
                'message' => 'Вы вышли!'
            ]);
        }
        self::saveMessage($message);
        if($ttl_is_out){
            return false;
        }
        header('Location: ' . CORE_PATH . 'home');

        return true;
    }

    public function checkUserTTL(){
        $currentTimestamp = time();
        if( $currentTimestamp > $_SESSION['session_logout_timestamp']){
            return $this->actionOut($ttl_is_out = true);
        }
        return true;
    }
}