<?php
/**
 * Functions used in Posts
 */
if ( ! function_exists( 'vodi_can_show_post_thumbnail' ) ) :
    /**
     * Determines if post thumbnail can be displayed.
     */
    function vodi_can_show_post_thumbnail() {
        return apply_filters( 'vodi_can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
    }
endif;