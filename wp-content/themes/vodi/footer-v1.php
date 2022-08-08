<?php
/**
 * The template for displaying the footer v1.
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

    <footer id="colophon" class="site-footer site__footer--v1 desktop-footer <?php echo esc_attr( apply_filters( 'vodi_footer_theme', 'dark' ) ); ?>" role="contentinfo">

            <?php
            /**
             * Functions hooked in to vodi_footer_v1 action
             *
             * @hooked vodi_container_start          - 10
             * @hooked vodi_footer_top_bar_open      - 20
             * @hooked vodi_footer_logo              - 30
             * @hooked vodi_footer_top_bar_social    - 40
             * @hooked vodi_footer_top_bar_close     - 50
             * @hooked vodi_footer_widgets           - 60
             * @hooked vodi_container_end            - 70
             * @hooked vodi_footer_bottom_bar_open   - 80
             * @hooked vodi_footer_credit            - 90
             * @hooked vodi_footer_quick_links       - 100
             * @hooked vodi_footer_bottom_bar_close  - 110
             */
            do_action( 'vodi_footer_v1' );
            ?>
            
    </footer><!-- #colophon -->

    <?php do_action( 'vodi_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>