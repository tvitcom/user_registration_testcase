<?php include(WEB_DIR . '/app/templates/headers.php'); ?>

<meta name="description" content="">
<meta name="author" content="">
<title></title>
</head>
<body>
    <div class="container">
        <?php include(WEB_DIR . '/app/templates/mainmenu.php'); ?>
        <h1>Title for registration user</h1>
        <div class="row">
            <div class="col-md-7">
                <br>
                <div class="register-item">
                    <b>Registration for User!</b>
                    <small class="text-muted"><?php echo date('HH:MM Y-m-d'); ?></small>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                </div>
                <br>
                <div class="register-item">
                    <b>Second user</b>
                    <small class="text-muted">Jun 11, 2015 11:45:36 PM</small>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <blockquote>
                        <b>Administrator</b><br>
                        Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.                    </blockquote>
                </div>
                <br>
            </div>
            <div class="col-md-5">
                <h4>Registration form:</h4>
                <div class="well well-sm">

                    <form id="w0" action="<?php echo Config::$item['site_uri']; ?>user/registration" method="post">
                        <input type="hidden" name="_csrf" value="<?php echo Auth::csrf(); ?>" />
                        <div class="form-group field-register-name requirementd">
                            <label class="control-label" for="register-name">Full name</label>
                            <input id="register-name" class="form-control" name="fio"
                                   autocomplete="on" title="Only russian symbols!" pattern="^[А-Яа-яЁё\s]+$" placeholder="Some russian word allowed only!" required type="text" maxlength="128">
                            <div class="help-block">
                            </div>
                        </div>

                        <div class="form-group field-register-email">
                            <label class="control-label" for="register-email">E-mail</label>
                            <input id="register-email" class="form-control" name="email"
                                   placeholder="Your E-mail allowed only!" required type="email" maxlength="40">
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group field-register-name requirementd">
                            <label class="control-label" for="register-name">Password</label>
                            <input id="register-name" class="form-control" name="password"
                                   autocomplete="on" title="Minimum 6 symbols!(max =30)"  pattern=".{6,30}" placeholder="At least eight of any characters!" required type="password" maxlength="30">
                            <div class="help-block">
                            </div>
                        </div>

                        <div class="form-group field-register-name requirementd">
                            <label class="control-label" for="register-name">Retype password</label>
                            <input id="register-name" class="form-control" name="password2"
                                   autocomplete="on" title="Minimum 6 symbols!(max =30)" pattern=".{6,30}" placeholder="At least eight of any characters!" maxlength="30" required type="password">
                            <div class="help-block">
                            </div>
                        </div>

                        <div class="form-group field-register-text requirementd">
                            <label class="control-label" for="register-text">M/F</label>
                            <select class="form-control" id="gender1" name="sex">
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>
                            <div class="help-block"></div>
                        </div>
                        <button type="submit" class="btn btn-primary" formmethod="post">Send</button></form>
                </div>
            </div><!-- Registration form -->
        </div>

        <?php include(WEB_DIR . '/app/templates/footer.php'); ?>
