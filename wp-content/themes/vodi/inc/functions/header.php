<?php
/**
 * Functions used in Header
 */

if ( ! function_exists( 'vodi_get_header_version' ) ) {
    /**
     * Gets the Header version set in theme options
     */
    function vodi_get_header_version() {

        $header_version = apply_filters( 'vodi_get_header_version', 'v1' );
        
        return $header_version;
    }
}

if ( ! function_exists( 'vodi_header_search_form' ) ) {
    /**
     * Gets the Header search form
     */
    function vodi_header_search_form( $type = 'video' ) {
        $function_name = "masvideos_get_{$type}_search_form";
        if( function_exists( $function_name ) ) {
            $function_name();
        } else {
            get_search_form();
        }
    }
}