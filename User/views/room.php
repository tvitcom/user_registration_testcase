<?php include(WEB_DIR . '/app/templates/headers.php'); ?>

<meta name="description" content="">
<meta name="author" content="">
<title>Room</title>
</head>
<body>

    <div class="container">

        <?php include(WEB_DIR . '/app/templates/mainmenu.php'); ?>


        <div class="jumbotron">
            <h1>Now you can use our site</h1>
            <p class="lead">You can doing: login, see your profile and remove it as soon as possible.</p>
            <p><a class="btn btn-lg btn-success" href="<?php echo Config::$item['site_uri'] . 'user/login'; ?>" role="button">I understand!</a></p>
        </div>

        <div class="row marketing">
            <div class="col-lg-6">
                <h4>Subheading</h4>
                <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

                <h4>Subheading</h4>
                <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

                <h4>Subheading</h4>
                <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
            </div>

            <div class="col-lg-6">
                <h4>Subheading</h4>
                <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

                <h4>Subheading</h4>
                <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

                <h4>Subheading</h4>
                <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
            </div>
        </div>
        <?php include(WEB_DIR . '/app/templates/footer.php'); ?>
