<?php
/**
 * Template Tags used in Footer v3
 */
if ( ! function_exists( 'vodi_footer_v3_bar_open' ) ) : 
    /**
     * Opens .footer-v3-bar div
     */
    function vodi_footer_v3_bar_open() {
        ?><div class="footer-v3-bar"><?php
    }

endif;

if ( ! function_exists( 'vodi_footer_v3_social_icons' ) ) :
    /**
     * Displays social icons at Footer v3
     */
    function vodi_footer_social_icons() {
        if ( has_nav_menu( 'social-media' ) ) {
            wp_nav_menu( array(
                'theme_location'  => 'social-media',
                'container_class' => 'site-footer__social-icons footer-social-icons',
                'menu_class'      => 'social-icons',
                'anchor_class'    => 'footer-social-icon',
                'depth'           => 1,
                'fallback_cb'     => false,
                'icon_before'     => '<span class="fa-stack"><i class="fas fa-circle fa-stack-2x"></i>',
                'icon_class'      => array( 'fa-stack-1x', 'fa-inverse' ),
                'icon_after'      => '</span>',
                'walker'          => new Vodi_Social_Media_Navwalker(),
            ) );
        }
    }

endif;

if ( ! function_exists( 'vodi_footer_v3_bar_close' ) ) : 
    /**
     * Closes .footer-v3-bar div
     */
    function vodi_footer_v3_bar_close() {
        ?></div><!-- /.footer-v3-bar --><?php
    }

endif;
