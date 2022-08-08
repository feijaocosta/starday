<?php
/**
 * Template tags used in Footer v2
 */

if ( ! function_exists( 'vodi_footer_primary_menu' ) ) :
    /**
     * Displays Footer Primary Menu in Footer v2
     */
    function vodi_footer_primary_menu() {
        if ( has_nav_menu( 'footer-primary-menu' ) ) : ?>
        <div class="footer__primary-nav-wrap">
            <div class="container"><?php
                wp_nav_menu( array( 
                    'container'         => false,
                    'menu_class'        => 'footer-primary-menu', 
                    'depth'             => 1,
                    'theme_location'    => 'footer-primary-menu' 
                ) ); ?>
            </div>
        </div><?php
        endif;
    }

endif;

if ( ! function_exists( 'vodi_footer_bottom_open' ) ) :
    /**
     * Opens .footer-bottom div
     */
    function vodi_footer_bottom_open() { ?>
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom__inner"><?php
    }

endif;

if ( ! function_exists( 'vodi_footer_bottom_left_start' ) ) : 
    /**
     * Opens .footer-bottom__left div
     */
    function vodi_footer_bottom_left_start() { ?>
        <div class="footer-bottom__left"><?php 
    }

endif;

if ( ! function_exists( 'vodi_footer_secondary_menu' ) ) :
    /**
     * Display the footer secondary menu
     *
     * @since 1.0.0
     * @return void
     */
    function vodi_footer_secondary_menu() {
        if ( has_nav_menu( 'footer-secondary-menu' ) ) {
            wp_nav_menu( array( 
                'container'       => false,
                'menu_class'      => 'footer-secondary-menu', 
                'depth'           => 1,
                'theme_location'  => 'footer-secondary-menu' 
            ) );
        }
    }

endif;

if ( ! function_exists( 'vodi_footer_tertiary_menu' ) ) :
    /**
     * Display the footer tertiary menu
     *
     * @since 1.0.0
     * @return void
     */
    function vodi_footer_tertiary_menu() {
        if ( has_nav_menu( 'footer-tertiary-menu' ) ) {
            wp_nav_menu( array( 
                'container'       => false,
                'menu_class'      => 'footer-tertiary-menu', 
                'depth'           => 1,
                'theme_location'  => 'footer-tertiary-menu' 
            ) );
        }
    }

endif;

if ( ! function_exists( 'vodi_footer_bottom_left_end' ) ) : 
    /**
     * Opens .footer-bottom__left div
     */
    function vodi_footer_bottom_left_end() { ?>
        </div><!-- /.footer-bottom__left --><?php 
    }

endif;

if ( ! function_exists( 'vodi_footer_bottom_right_start' ) ) : 
    /**
     * Opens .footer-bottom__right div
     */
    function vodi_footer_bottom_right_start() { 
        if ( apply_filters( 'vodi_enable_footer_action', false ) ) : ?>
        <div class="footer-bottom__right"><?php
        endif;
    }
endif;

if ( ! function_exists( 'vodi_footer_action_area' ) ) :
    /**
     * Displays Footer Newsletter
     */
    function vodi_footer_action_area() {

        if ( apply_filters( 'vodi_enable_footer_action', false ) ) {

            $title    = apply_filters( 'vodi_footer_action_title', wp_kses_post( __( 'Watch Vodi. Anytime <br>Anywhere', 'vodi' ) ) );
            $subtitle = apply_filters( 'vodi_footer_action_subtitle', wp_kses_post( __( 'Subscribe to our newsletter and get unique alerts.', 'vodi' ) ) );
            $content  = apply_filters( 'vodi_footer_action_content', wp_kses_post( __( '<a href="#" class="btn btn-vodi-primary btn-long">Sign Up</a>', 'vodi' ) ) );

            ?><div class="footer-action">
                <h2 class="footer-action__title"><?php echo wp_kses_post( $title ); ?></h2>
                <p class="footer-action__subtitle"><?php echo wp_kses_post( $subtitle ); ?></p>
                <div class="footer-action__content"><?php echo wp_kses_post( $content ); ?></div>
            </div><?php
        }
    }

endif;

if ( ! function_exists( 'vodi_footer_bottom_right_end' ) ) : 
    /**
     * Opens .footer-bottom__right div
     */
    function vodi_footer_bottom_right_end() { 
        if ( apply_filters( 'vodi_enable_footer_action', false ) ) : ?>
        </div><!-- /.footer-bottom__right --><?php 
        endif;
    }

endif;

if ( ! function_exists( 'vodi_footer_bottom_close' ) ) :
    /**
     * Closes .footer-bottom div
     */
    function vodi_footer_bottom_close() { ?>
            </div><!-- /.footer-bottom__inner -->
        </div>
    </div><!-- /.footer-bottom --><?php
    }

endif;