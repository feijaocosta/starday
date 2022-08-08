<?php
/**
 * The template for displaying the footer v3.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package vodi
 */

?>
            </div><!-- /.site-content-inner -->
        
        <?php do_action( 'vodi_content_bottom' ); ?>

    </div><!-- #content -->

    <?php do_action( 'vodi_before_footer' ); ?>

    <footer id="colophon" class="site-footer site__footer--v3 desktop-footer <?php echo esc_attr( apply_filters( 'vodi_footer_theme', 'light' ) ); ?>" role="contentinfo">
        <div class="container">

            <?php
            /**
             * Functions hooked in to vodi_footer_v3 action
             *
             * @hooked vodi_footer_v3_bar_open  - 10
             * @hooked vodi_footer_logo         - 20
             * @hooked vodi_footer_v3_menu      - 30
             * @hooked vodi_footer_social_icons - 40
             * @hooked vodi_footer_v3_bar_close - 50
             * @hooked vodi_footer_credit       - 60
             */
            do_action( 'vodi_footer_v3' );
            ?>

        </div><!-- .container -->
    </footer><!-- #colophon -->

    <?php do_action( 'vodi_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>