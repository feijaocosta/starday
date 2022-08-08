<?php
/**
 * Functions used in Home
 */

if ( ! function_exists( 'vodi_section_coming_soon_videos_visibility' ) ) {
    /**
     * Display scheduled video for all user.
     */
    function vodi_section_coming_soon_videos_visibility( $visiblility, $id ) {
        if ( 'future' === get_post_status( $id ) ) {
            return true;
        }
        return false;
    }
}