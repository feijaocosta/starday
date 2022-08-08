<?php
/**
 * The template for displaying the footer v2.
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

    <footer id="colophon" class="site-footer site__footer--v2 desktop-footer" role="contentinfo">

            <?php
            /**
             * Functions hooked in to vodi_footer_v2 action
             *
             * @hooked vodi_footer_primary_menu        - 10
             * @hooked vodi_footer_bottom_open         - 20
             * @hooked vodi_footer_bottom_left_start   - 30
             * @hooked vodi_footer_top_bar_open        - 40
             * @hooked vodi_footer_logo                - 50
             * @hooked vodi_footer_top_bar_social      - 60
             * @hooked vodi_footer_top_bar_close       - 70
             * @hooked vodi_footer_secondary_menu      - 80
             * @hooked vodi_footer_credit              - 90
             * @hooked vodi_footer_tertiary_menu       - 100
             * @hooked vodi_footer_bottom_left_end     - 110
             * @hooked vodi_footer_bottom_right_start  - 120
             * @hooked vodi_footer_action_area         - 130
             * @hooked vodi_footer_bottom_right_end    - 140
             * @hooked vodi_footer_bottom_close        - 150
             */
            do_action( 'vodi_footer_v2' );
            ?>
    </footer><!-- #colophon -->

    <?php do_action( 'vodi_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
