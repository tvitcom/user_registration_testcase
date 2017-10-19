<!DOCTYPE html>
<html lang="<?php echo isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : 'en'; ?>">
    <head>
        <base href="<?php echo Config::$item['site_uri']; ?>">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <link rel="shortcut icon" href="<?php echo Config::$item['site_uri']; ?>app/assets/favicon.ico">

        <!-- Bootstrap core CSS -->
        <link href="<?php echo Config::$item['site_uri']; ?>app/assets/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo Config::$item['site_uri']; ?>app/assets/jumbotron-narrow.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="<?php echo Config::$item['site_uri']; ?>app/assets/html5shiv.min.js"></script>
          <script src="<?php echo Config::$item['site_uri']; ?>app/assets/respond.min.js"></script>
        <![endif]-->
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="<?php echo Config::$item['site_uri']; ?>app/assets/ie10-viewport-bug-workaround.js"></script>
