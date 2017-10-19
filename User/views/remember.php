<?php include(WEB_DIR . '/app/templates/headers.php'); ?>

<meta name="description" content="">
<meta name="author" content="">
<title>Remember user area!</title>
</head>

<body>

    <div class="container">
        <?php include(WEB_DIR . '/app/templates/mainmenu.php'); ?>

        <div class="row marketing">
            <div class="col-lg-8">
                <h4>Subheading</h4>
                <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

                <h4>Subheading</h4>
                <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

                <h4>Subheading</h4>
                <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
            </div>
            <form class="form-remember col-lg-4" formmethod="post">
                <h2 class="form-remember-heading">Remember or <a href="<?php echo Config::$item['site_uri']; ?>user/login">login again!</a></h2>
                <input type="hidden" name="_csrf" value="<?php echo Auth::csrf(); ?>" />
                <label for="inputEmail" class="sr-only">E-mail</label>
                <input id="inputEmail" class="form-control" placeholder="Your E-mail" required="on" autocomplete="on"
                       title="Input your e-mail and get letter with credential for site." autofocus="on" type="email" name="email" maxlenght="40">
                <div class="help-block"></div>
                <button class="btn btn-primary" type="submit" formmethod="post" autofocus="on">Send me!</button>
            </form>
        </div>
        <?php include(WEB_DIR . '/app/templates/footer.php'); ?>
