<?php include(WEB_DIR . '/app/templates/headers.php'); ?>
<!-- Custom styles for this template -->
<link href="<?php echo Config::$item['site_uri']; ?>app/assets/signin.css" rel="stylesheet">
<meta name="description" content="">
<meta name="author" content="">
<title></title>
</head>
<body>
    <div class="container">
        <form class="form-signin" action="<?php echo Config::$item['site_uri']; ?>user/login" method="post">
            <h2 class="form-signin-heading">Sign in or <a href="<?php echo Config::$item['site_uri']; ?>user/registration">register</a></h2>
            <input type="hidden" name="_csrf" value="<?php echo Auth::csrf(); ?>" />
            <label for="inputEmail" class="sr-only">E-mail</label>
            <input id="inputEmail" class="form-control" placeholder="E-mail" required
                   autocomplete="on" title="Your registered this E-mail"  maxlength="40" autofocus="" type="email" name="email">
            <div class="help-block"></div>
            <label for="inputPassword" class="sr-only">Password</label>
            <input id="inputPassword" class="form-control" placeholder="Password" required
                   autocomplete="on" title="Enter your password"  maxlength="30" type="password" name="password">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember_me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" formmethod="post"
                    autofocus="">Sign in</button>
            <div class="checkbox">
                (Remember: <a href="<?php echo Config::$item['site_uri']; ?>user/remember">I lost my email and/or password.</a> )
            </div>
        </form>

    </div><!-- /container -->

</body>
</html>
