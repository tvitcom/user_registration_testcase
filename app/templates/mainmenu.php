<div class="header clearfix">
    <nav>
        <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="<?php echo Config::$item['site_uri']; ?>">Home</a></li>
            <li role="presentation"><a href="<?php echo Config::$item['site_uri']; ?>user/registration">Join</a></li>
            <li role="presentation"><a href="<?php echo Config::$item['site_uri']; ?>user/management">Managment</a></li>
            <li role="presentation"><a href="<?php
                echo Config::$item['site_uri'];
                if (empty($_SESSION['user_id'])) {

                    ?>user/login">Login</a></li>

            <?php } else {

                ?>user/logout">Logout</a></li><?php }

            ?>
        </ul>
    </nav>
    <h3 class="text-muted"><?php echo Config::$item['company']['name']; ?></h3>
</div>