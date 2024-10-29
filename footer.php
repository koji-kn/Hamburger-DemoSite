<footer class="l-footer">

        <?php wp_nav_menu(
            array('theme_location' => 'footer-nav',
                    'container'      => 'div',
                    'container_class'=> 'l-footer__nav',
                    'menu_class'     => 'l-footer__menu u-flex',
            )); 
        ?>

    <div class="copyright">
        <small>Copyright : RaiseTech</small>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>