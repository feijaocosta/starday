<?php
/**
 * Template Tags used in Footer v4
 */
if ( ! function_exists( 'vodi_footer_v4_bar_open' ) ) : 
    /**
     * Opens .footer-v4-bar div
     */
    function vodi_footer_v4_bar_open() {
        ?><div class="footer-v4-bar"><?php
    }

endif;

if ( ! function_exists( 'vodi_footer_v4_menu' ) ) :
    /**
     * Display the footer menu
     *
     * @since 1.0.0
     * @return void
     */
    function vodi_footer_v4_menu() {
        if ( has_nav_menu( 'footer-v4-menu' ) ) {
            wp_nav_menu( array( 
                'container'       => false,
                'menu_class'      => 'footer-v4-menu', 
                'depth'           => 1,
                'theme_location'  => 'footer-v4-menu' 
            ) );
        }
    }

endif;

if ( ! function_exists( 'vodi_footer_v4_bar_close' ) ) : 
    /**
     * Closes .footer-v4-bar div
     */
    function vodi_footer_v4_bar_close() {
        ?></div><!-- /.footer-v4-bar --><?php
    }

endif;
