<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Config
{
    public static $item = array(
        'site_uri' => 'http://test.off.net/002/',
        'app_name' => 'Test case off.net',
        'company' => array(
            'name' => 'TestCompany',
            'founder' => 'off.net',
            'manager'=>'Alex Bolduin',
            'tel1' => '+38000000000',
            'tel2' => '+79000000000',
            'email'=> 'test123@mail.ruru',
        ),
        'salt' => 'JWERYTSDfd',
        'default_role' => 'user',
        'db1' => array(
            'host' => 'localhost',
            'user' => 't002',
            'pass' => 'A5v1K2t7',
            'base' => 't002',
        ),
        'medoo' => array(
            // required
            'database_type' => 'mysql',
            'database_name' => 't002',
            'server' => 'localhost',
            'username' => 't002',
            'password' => 'A5v1K2t7',
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
