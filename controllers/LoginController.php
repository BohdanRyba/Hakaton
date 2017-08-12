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
                        $_SESSION['session_ttl'] = 31536000;
                    } else {
                        $_SESSION['session_ttl'] = 30;
                    }
                    $this->setUserSessionTTL($_SESSION['session_ttl']);
                    $message = json_encode([
                        'status' => 'success',
                        'message' => "Вы успешно авторизированы, {$_SESSION['current_user']}"
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
        $user = $this->getCurrentUserInfo();
        $userLoginTimestamp = time();
        $userSessionLogoutTimestamp = $userLoginTimestamp + $ttl;
        $userLoginDate = date('Y-m-d H:i:s', $userLoginTimestamp);
        $userSessionLogoutDate = date('Y-m-d H:i:s', $userSessionLogoutTimestamp);
        $result = LoginModel::setUserSessionTTL($user, $userLoginDate, $ttl, $userSessionLogoutDate);
        return $result;
    }

    public function actionOut($ttl_is_out = false)
    {
        $user = $this->getCurrentUserInfo();
        unset($_SESSION['accessing']);
        unset($_SESSION['user_access']);
        unset($_SESSION['org_id']);
        unset($_SESSION['organization_id']);
        unset($_SESSION['current_user']);
        unset($_SESSION['current_user_id']);
        unset($_SESSION['event_id']);
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
        LoginModel::clearUserSessionInfo($user);
        if($ttl_is_out){
            return false;
        }
        header('Location: ' . CORE_PATH . 'home');

        return true;
    }

    public function checkUserTTL(){
        $user = $this->getCurrentUserInfo();
        $currentTimestamp = time();
        $userLogoutTimestamp = strtotime($user['logout_date']);
        if( $currentTimestamp > $userLogoutTimestamp){
            return $this->actionOut($ttl_is_out = true);
        }
        return true;
    }
}