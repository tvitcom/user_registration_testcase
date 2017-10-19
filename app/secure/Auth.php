<?php

/*/
//*
***/

define('AUTH_LOGIN', 'true');

class Auth
{
    public static function isLogged()
    {
        if (null !==@$_SESSION['user_id'])
            return $_SESSION['user_id'];
        else 
            return;
    }

    public static function setLogin($user=array())
    {
        if (isset($user)) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['rights'] = $user['rights'];
        }
        return self::isLogged();
    }

    public static function setLogout(){
        $_SESSION = array();
        session_unset();
        session_destroy();
        session_regenerate_id(true);
        return true;
    }

    public static function hash($pass = '', $tstamp = '') {
        if (($pass == true) AND ( $tstamp == true)){
            $half_hash = '$2y$' . base64_encode(
                hash_hmac('sha512', $pass, Config::$item['salt'] . $tstamp, true)
            );
            return substr($half_hash, 0, -2);
        } else
            return false;
    }

    public static function affirm($email='',$time=''){
        return md5($email.$time);
    }

    //Создаем хэш-код для проверки форм
    public static function csrf()
    {
        $is_logged = (self::isLogged())?self::isLogged():'none';
        $server_vars=$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'];
        $_SESSION['csrf'] = md5($server_vars . $is_logged . date("md"));
        return (null !== $_SESSION['csrf'])? $_SESSION['csrf']:null; 
    }
}
