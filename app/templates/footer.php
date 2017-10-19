<footer class="footer">
    <p>© <?php echo date('Y'); ?> <?php
        echo (Auth::isLogged()) ? 'User' : 'Guest';
        echo ' mode';

        ?>
    </p>
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo Config::$item['site_uri']; ?>app/assets/jquery.min.js"></script>
<script src="<?php echo Config::$item['site_uri']; ?>app/assets/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo Config::$item['site_uri']; ?>app/assets/ie10-viewport-bug-workaround.js"></script>
</div> <!-- /container -->
</body></html>
