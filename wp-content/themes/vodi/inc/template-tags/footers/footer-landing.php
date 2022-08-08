<?php
/**
 * Template Tags used in Footer Landing
 */
if ( ! function_exists( 'vodi_landing_footer_bar_start' ) ) {
    /**
     * Displays start of landing footer bar
     */
    function vodi_landing_footer_bar_start() {
        ?><div class="site-footer__landing-bar"><?php
    }
}

if ( ! function_exists( 'vodi_landing_footer_bar_end' ) ) {
    /**
     * Displays end landing footer bar
     */
    function vodi_landing_footer_bar_end() {
        ?></div><!-- /.site-footer_landing-bar --><?php 
    }
}

if ( ! function_exists( 'vodi_comingsoon_footer_bar_start' ) ) {
    /**
     * Displays start of comingsoon footer bar
     */
    function vodi_comingsoon_footer_bar_start() {
        ?><div class="site-footer__comingsoon-bar"><?php
    }
}

if ( ! function_exists( 'vodi_comingsoon_footer_bar_end' ) ) {
    /**
     * Displays end comingsoon footer bar
     */
    function vodi_comingsoon_footer_bar_end() {
        ?></div><!-- /.site-footer_landing-bar --><?php 
    }
}

if ( ! function_exists( 'vodi_landing_footer_menu' ) ) {
    /**
     * Display the landing footer menu
     *
     * @since 1.0.0
     * @return void
     */
    function vodi_landing_footer_menu() {
        if ( has_nav_menu( 'landing-footer-menu' ) ) {
            wp_nav_menu( array( 
                'container_class'       => 'site-footer__landing-menu',
                'menu_class'            => 'landing-footer-menu', 
                'depth'                 => 1,
                'theme_location'        => 'landing-footer-menu',
                'fallback_cb'           => false,
            ) );
        }
    }
}