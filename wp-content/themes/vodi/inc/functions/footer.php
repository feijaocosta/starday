<?php
/**
 * Functions used in Footer
 */

if ( ! function_exists( 'vodi_get_footer_version' ) ) {
    /**
     * Gets the Footer version set in theme options
     */
    function vodi_get_footer_version() {

        $footer_version = apply_filters( 'vodi_get_footer_version', 'v1' );
        
        return $footer_version;
    }
}