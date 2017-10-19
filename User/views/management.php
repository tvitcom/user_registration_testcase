<?php include(WEB_DIR . '/app/templates/headers.php'); ?>
<script src="<?php
echo Config::$item['site_uri']
 . 'app/assets/angular-1.4.5.js';

?>">
</script>
<script src="<?php
echo Config::$item['site_uri']
 . 'app/assets/angular-app.js';

?>"></script>
<meta name="description" content="">
<meta name="author" content="">
<title>Users management</title>
</head>
<body ng-app="UsersManagement" ng-controller="UsersCRUD">
    <div class="container">
        <?php include(WEB_DIR . '/app/templates/mainmenu.php'); ?>
        <div class="row marketing">
            <div class="col-lg-7">
                <h2 class="sub-header">Manage users:</h2>
                <h4>All accounts for management:</h4>
                <div class="col-lg-12">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>fio</th>
                                <th>whois</th>
                                <th>email</th>
                                <th>credit card</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="">
                                <td></td>
                                <td ></td>
                                <td ng-model="whois"></td>
                                <td ng-model="email"></td>
                                <td ng-model="credit_card"></td>
                                <td ng-click="edit()">Edit</td>
                            </tr>
                        </tbody>
                    </table>
                </div><!-- col-lg-12 -->
            </div><!-- col-lg-7 -->
            <div class="col-md-5">
                <h4>Account user data:</h4>
                <div class="well well-sm">

                    <form id="w0" action="<?php
                    echo Config::$item['site_uri'];

                    ?>user/data" method="post">
                        <input type="hidden" name="_csrf" value="<?php echo Auth::csrf(); ?>" />
                        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>" />
                        <div class="form-group field-register-name">
                            <label class="control-label" for="register-name">Full name</label>
                            <input id="register-name" class="form-control" name="fio"
                                   placeholder="Full name not set"  required type="text" maxlength="128"
                                   value="<?php echo $user['fio']; ?>" ng-model="fio">
                            <div class="help-block">
                            </div>
                        </div>

                        <div class="form-group field-register-name">
                            <label class="control-label" for="register-name">Whois</label>
                            <input id="register-name" class="form-control" name="password"
                                   placeholder="Description not set" autocomplete="on" type="text" ng-model="whois"
                                   value="<?php echo $user['whois']; ?>" maxlength="30">
                            <div class="help-block">
                            </div>
                        </div>

                        <div class="form-group field-register-email">
                            <label class="control-label" for="register-email">E-mail</label>
                            <input id="register-email" class="form-control" name="email"
                                   placeholder="E-mail not set" required type="email"
                                   value="<?php echo $user['email']; ?>" maxlength="40">
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group field-register-name">
                            <label class="control-label" for="register-name">Credit card</label>
                            <input id="register-name" class="form-control" name="credit_card"
                                   autocomplete="on" title="Minimum 16 symbols!(max =22)" pattern=".{16,22}"
                                   placeholder="Credit card not set!"
                                   value="<?php echo $user['credit_card']; ?>" maxlength="30" type="text">
                            <div class="help-block">
                            </div>
                        </div>

                        <div class="form-group field-register-text">
                            <label class="control-label" for="register-text">Male / Female</label>
                            <select class="form-control" id="activation" value="<?php echo $user['sex']; ?>" name="sex">
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>
                            <div class="help-block"></div>
                        </div>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-default" type="submit" formmethod="post">Delete account</button>
                        </div>

                    </form>
                </div>
            </div><!--col-md-5 Registration form -->
        </div><!-- container -->

        <?php include(WEB_DIR . '/app/templates/footer.php'); ?>
