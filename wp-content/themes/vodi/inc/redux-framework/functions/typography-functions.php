<?php
/**
 * Filter functions for Typography Section of Theme Options
 */

if ( ! function_exists( 'redux_apply_custom_font_css' ) ) {
    function redux_apply_custom_font_css() {
        global $vodi_options;

        if ( isset( $vodi_options['use_predefined_font'] ) && $vodi_options['use_predefined_font'] ) {
            return;
        }

        $css = redux_get_custom_font_css();
        $handle = 'vodi-style';
        if ( vodi_is_masvideos_activated() ) {
            $handle = 'vodi-masvideos';
        }
        wp_add_inline_style( $handle, $css );
    }
}

if ( ! function_exists( 'redux_get_custom_font_css' ) ) {
    function redux_get_custom_font_css() {
        global $vodi_options;

        $title_font = isset( $vodi_options['custom_title_font']['font-family'] ) ? $vodi_options['custom_title_font']['font-family'] : 'Montserrat';
        $body_font = isset( $vodi_options['custom_body_font']['font-family'] ) ? $vodi_options['custom_body_font']['font-family'] : 'Open Sans';

        $styles             = 
'body {
    font-family: ' . $body_font . ' !important;
}

h1, h2, h3, h4, h5, h6 {
    font-family: ' . $title_font . ' !important;
}';

        return $styles;
    }
}