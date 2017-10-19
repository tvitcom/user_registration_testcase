<?php
/* /
  //*
 * * */

if (!defined('WEB_DIR'))
    die('Access denied!');

/*
 * User as model the thing in folder "user".
 */

require("Model.php");

class DefaultHandler
{

    function get()
    {
        $item = get_count_users();
        include("views/default.php");
    }
}

class ManagementHandler
{

    function __construct()
    {
        ToroHook::add("before_handler", function() {
            if (!Auth::isLogged()) {
                header('Location: ' . Config::$item['site_uri'] . 'user/login');
            }
        });
    }

    function get()
    {
        $user = get_user_data($_SESSION['user_email']);
        if ($user == true)
            include("views/management.php");
        else
            echo '{"notice":"error db read","access":"allow"}';
    }
}

class LoginHandler
{

    function post()
    {
        /* Фильтрация данных */
        $email = Filtr::txt($_POST['email']);
        $password = Filtr::pwd($_POST['password']);

        /* Запрос данных из модели: */
        $user = is_user($email);

        /* -- Выпoлнение логики метода: */
        if (empty($user)) {
            echo '{"notice":"error email"},{"access":"deny"}';
            exit();
        } else {
            $hash = Auth::hash($password, $user['t_passhash']);
            $hash_db = $user['passhash'];

            if ($hash === $hash_db) {
                Auth::setLogin($user);
                header('Location: ' . Config::$item['site_uri'] . 'user/management');
            } else {
                echo '{"notice":"error password"},{"access":"deny"}';
                exit();
            }
        }
    }

    function get()
    {
        include("views/login.php");
    }
}

class RegistrationHandler
{

    function __construct()
    {
        ToroHook::add("before_handler", function() {
            if (Auth::isLogged()) {
                header('Location: ' . Config::$item['site_uri'] . 'user/management');
            }
        });
    }

    function post()
    {
        /* Проверяем вхождение пустых значений в массиве POST */
        $filled = 6;//!Добавить функционал массовоо присваивания.

        if (count($_POST) !== $filled) {
            echo '{"notice":"You must fill in all fields are correctly!"},{"access":"deny"}';
            exit();
        }
        /*
         * Фильтруем и формируем данные для сохранения в БД:
         */
        if ($_POST['password2'] !== $_POST['password']) {
            echo '{"notice":"Retype passwords"},{}';
            exit();
        }

        /* --- Составляем хеш пароля ------- */
        $time = date('Y-m-d H:i:s');
        $hash = Auth::hash(Filtr::pwd($_POST['password'], 30), $time);

        $user['fio'] = Filtr::txt($_POST['fio'], 128);
        $user['whois'] = Filtr::txt('', 128);
        $user['email'] = Filtr::mail($_POST['email'], 40);
        $user['passhash'] = $hash;
        $user['credit_card'] = Filtr::txt('', 128);
        $user['card_expire'] = Filtr::txt('', 128);
        $user['photo'] = Filtr::txt('', 128);
        $user['rights'] = Filtr::txt('{"role":"user"}', 128);
        $user['is_active'] = Filtr::int(0, 128);
        $user['sex'] = Filtr::int($_POST['sex']);
        $user['t_passhash'] = $time;

        if (!insert_user($user)) {
            echo '{"notice":"error saving users"},{"access":"deny"}';
            exit();
        }

        /*
         * Формируем и отправляем специальное письмо для подтверджения
         * почтового ящика E-mail указанного при регистрации пользователя.
         */
        $remember_hash = Auth::hash($hash, $time);
        $activation_link = Config::$item['site_uri'] . 'user/affirmation/?e='
            . $user['email'] . '&l=' . Auth::affirm($user['email'], $time);

        /* ---- Formatting E-mail -------------------- */
        $to = $user['email'];
        $subject = 'Наш сайт "' . Config::$item['company']['name']
            . '" ожидает вашего подтверждения!';
        $text = require(WEB_DIR . "/app/templates/email_registration.php");
        $body = wordwrap($text, 70, "\r\n");
        $name = '=?UTF-8?B?' . base64_encode(Config::$item['company']['manager'])
            . '?=';
        $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
        $headers = "From: $name <" . Config::$item['company']['email'] . ">\r\n" .
            "Reply-To: " . Config::$item['company']['email'] . "\r\n" .
            "MIME-Version: 1.0\r\n" .
            "Content-Type: text/html; charset=UTF-8";

        // Указываем MIME-типы сообщения:
        if (mail($user['email'], $subject, $body, $headers)) {
            include('views/thanks.php');
            exit();
        } else {
            echo '{"notice":"error send email"},{"access":"deny"}';
        }
    }

    function get()
    {
        include("views/registration.php");
    }
}

class RememberHandler
{

    function post()
    {
        echo '{"notice":"Page under construction!"},{"access":"deny"}';
        exit();
    }

    function get()
    {
        include("views/remember.php");
    }
}

class AffirmationHandler
{

    function get()
    {
        $_link = Filtr::pwd($_GET['l']);
        $_email = Filtr::txt($_GET['e']);
        $user = get_user_data($_email);
        $valid_hash = Auth::affirm($_email, $user['t_passhash']);
        if ($_link === $valid_hash) {
            set_user_profile($_email);
            include("views/room.php");
        } else {
            echo '{"notice":"Invalid link!"},{"access":"deny"}';
        }
    }
}

class RoomHandler
{

    function __construct()
    {
        ToroHook::add("before_handler", function() {
            if (!Auth::isLogged()) {
                header('Location: ' . Config::$item['site_uri'] . '/');
            }
        });
    }

    function post()
    {
        echo '{"notice":"Page under construction!"},{"access":"deny"}';
    }

    function get()
    {
        include("views/room.php");
    }
}

class LogoutHandler
{

    public function get()
    {
        if (Auth::setLogout()) {
            header("Location: " . Config::$item['site_uri']);
        } else {
            include("views/room.php");
        }
    }
}

class DataHandler
{

    function __construct()
    {
        ToroHook::add("before_handler", function() {
            if (!Auth::isLogged()) {
                header('Location: ' . Config::$item['site_uri'] . '/');
            }
        });
    }

    public function post()
    {
        if (count($_POST) == false) {
            echo '{"notice":"null post","access":"allow"}';
            exit();
        }
        $user_id = Filtr::int($_POST['user_id']);
        if ($_SESSION['user_id'] == $user_id) {
            if (delete_user($user_id) == false) {
                echo '{"notice":"error delete!","access":"allow"}';
            } else {
                Auth::setLogout();
                echo '{"notice":"User deleted!","access":"deny"}';
            }
        }
        exit();
    }

    public function get_xnr($id)
    {
        echo '{"notice":"function under construction!"},{"access":"allow"}';
    }
}
