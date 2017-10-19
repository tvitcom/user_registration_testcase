<?php

/*/
//*
***/


class Filtr
{
    public static $notice = array();
    public static $err_mesage = array();

    public static function mail($mail = '',$max=128)
    {
        //проверим почту:
        $mail = substr($mail, 0, $max);
        $regex = "/[a-z0-9-_]{2,64}\@[a-z0-9\-\_]{2,64}\.[a-z0-9]{2,6}/i";
        $mail = str_replace(' ', '', $mail); //удаление пробелов в строке (хотя RFC'ы допускают пробелы в кавычках)

        if (preg_match($regex, $mail))
            return $mail;
        else
            return;
    }

    //В строке отавляем все экранированные символы кроме тэгов
    public static function txt($str = '' , $maxlen=128)
    {
        mb_substr( $str, 0, $maxlen); // выполняем преобразование строки
        if (trim($str))
            return trim(addslashes($str));
    }

    //В строке отавляем все кроме пробелов
    public static function pwd($str = '')
    {
        $str = preg_replace('/\s\s+/', '', $str); 
        return $str;
    }

    //В строке оставляем только первую цифру
    public static function int($val = 0)
    {   
        return intval($val);
    }

    public static function onlyciph($str = '')
    {
        return preg_replace("/[^0-9]/", '', $str);
    }
}
