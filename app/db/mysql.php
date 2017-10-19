<?php
/* /
  //*
 * * */

class MySQL
{
    private static $instance = NULL;

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new PDO(
                'mysql:host=' . Config::$item['db1']['host']
                . ';dbname=' . Config::$item['db1']['base'], Config::$item['db1']['user'], Config::$item['db1']['pass']
            );
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
