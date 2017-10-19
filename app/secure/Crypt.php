<?php

/*/
//*
***/

class Crypt
{
    private $_salt;

    public function __construct()
    {
        self::$_salt = Config::$item['salt'];
    }

    public static function test()
    {
        $r = self::enc("Encryption/decryption test PASSED!");
        return "<br>\n<pre>" . substr($r, 0, 18) . "... :" . self::dec($r) . "</pre>";
    }

    public static function enc_params(
    $pass = 'simple_pass', $salt_sixteen = '0000000000000000'
    )
    {
        return array($pass, $salt_sixteen, "aes-128-cbc");
    }

    public static function enc($msg)
    {
        list ($pass, $iv, $method) = self::enc_params();
        if (function_exists('openssl_encrypt'))
            return urlencode(openssl_encrypt(urlencode($msg), $method, $pass, false, $iv));
        else
            return urlencode(exec("echo \"" . urlencode($msg) . "\" | openssl enc -" . urlencode($method) . " -base64 -nosalt -K " . bin2hex($pass) . " -iv " . bin2hex($iv)));
    }

    public static function dec($msg)
    {
        list ($pass, $iv, $method) = self::enc_params();
        if (function_exists('openssl_decrypt'))
            return trim(urldecode(openssl_decrypt(urldecode($msg), $method, $pass, false, $iv)));
        else
            return trim(urldecode(exec("echo \"" . urldecode($msg) . "\" | openssl enc -" . $method . " -d -base64 -nosalt -K " . bin2hex($pass) . " -iv " . bin2hex($iv))));
    }
}
