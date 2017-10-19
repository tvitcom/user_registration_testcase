<?php
header('X-Powered-By: ASP.NET, ARR/2.5, ASP.NET');
//echo "<h4>Site coming soon ...! Good bye!</h4>";exit();
define('WEB_DIR', __DIR__);

/* /
  //*
 * * */

/* Укажем кодировку для безопасной обработки строк. */
mb_internal_encoding('UTF-8');
mb_regex_encoding('UTF-8');
ini_set('default_charset', 'UTF-8');

//Set encoding for [iconv] functions:
ini_set('iconv.input_encoding', 'UTF-8');
ini_set('iconv.internal_encoding', 'UTF-8');
ini_set('iconv.output_encoding', 'UTF-8');

//Set encoding for [mbstring] functions:
ini_set('mbstring.language', 'Neutral');
ini_set('mbstring.internal_encoding', 'UTF-8');
ini_set('mbstring.http_input', 'auto');
ini_set('mbstring.http_output', 'UTF-8');
ini_set('mbstring.encoding_translation', 'On');
ini_set('mbstring.detect_order', 'auto');
ini_set('mbstring.substitute_character', 'none');

if (__DIR__ === '/home/www/start/webroot' OR __DIR__ ===
    '/srv/Sites/defaultsite/webroot')
    require('app/config/localhost-config.php');
elseif (__DIR__ === '/var/www')
    require('app/config/server14-config.php');
elseif (__DIR__ === '/srv/Sites/off/webroot')
    require('app/config/localhost-config.php');
else
    require('app/config/off-config.php');

require 'app/secure/Filtr.php';
require 'app/secure/Auth.php';
require 'app/secure/Crypt.php';
require 'app/db/mysql.php';

require 'app/vendor/autoload.php';

/* -- Things case: -- */
require 'User/Controller.php';

/* -- Lets go run web-application: -- */
require ('app/Routing.php');
