<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Config
{
    public static $item = array(
        'site_uri' => 'http://123.123.123.123/',
        'app_name' => 'Test case Off.net',
        'company' => array(
            'name' => 'TestCompany',
            'founder' => 'off.net',
            'manager' => 'Alex Bolduin',
            'tel1' => '+38000000000',
            'tel2' => '+79000000000',
            'email' => 'test123@mail.ruru',
        ),
        'salt' => 'JWERYTSDfd',
        'default_role' => 'user',
        'db1' => array(
            'host' => 'localhost',
            'user' => 'off',
            'pass' => 'pass_to_off',
            'base' => 'off',
        ),
        'medoo' => array(
            // required
            'database_type' => 'mysql',
            'database_name' => 'off',
            'server' => 'localhost',
            'username' => 'off',
            'password' => 'pass_to_off',
            'charset' => 'utf8',
            // optional
            'port' => 3306,
            // driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
            'option' => array(
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ),
        ),
        'roles' => array(
            'reader' => '{"role":"reader"}',
            'user' => '{"role":"user"}',
            'admin' => '{"role":"admin"}',
        ),
    );

}

;
