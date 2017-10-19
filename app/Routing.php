<?php
/* /
  //*
 * * */

// Fired for 404 errors; must be defined before Toro::serve() call
ToroHook::add("404", function() {
    echo '<p>Error result! Sorry... <s>Try <a href="http://123.123.123.123/">another server</a></s>.</p>';
});

ToroHook::add("before_request", function() {

    /* ------ SESSION TEST! ------------ */
    if (!session_start()) {
        echo "Extended server error 500!. Please come later!";
        exit();
    }

    /* ------ Anti CSRF and XSS --------- */
    if (count($_POST)) {
        if (!array_key_exists('_csrf', $_POST) || (@$_POST['_csrf'] !== $_SESSION['csrf'])) {
            echo "Request Forgery detected!";
            exit();
        }
    }
    /* ----- Anti script kidies -------- */
    if (empty($_SERVER['HTTP_USER_AGENT'])) {
        echo "
dear friend, do not break the site - it's a bunch of test scripts and would be a shame if you break it down trust me :)!";
        exit();
    }
});

ToroHook::add("after_request", function() {
    Auth::csrf();
});

/* Notice: В массив маршрутов вручную добавлен тип для hash */
Toro::serve(array(
    "/" => "DefaultHandler",
    "/user/login" => "LoginHandler",
    "/user/room" => "RoomHandler",
    "/user/registration" => "RegistrationHandler",
    "/user/affirmation/([a-zA-Z0-9-_=@+$:*/|,\.]{0,165})" => "AffirmationHandler",
    "/user/management" => "ManagementHandler",
    "/user/remember" => "RememberHandler",
    "/user/logout" => "LogoutHandler",
    "/user/data" => "DataHandler",
    "/site/thanks" => "ThanksHandler",
));
