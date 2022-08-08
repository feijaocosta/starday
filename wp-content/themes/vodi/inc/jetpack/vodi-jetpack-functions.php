<?php
/**
 *
 */

add_filter( 'sharing_services_email', '__return_true' );

add_filter( 'jetpack_gutenberg', '__return_false' );

function vodi_show_jetpack_share() {
    if ( function_exists( 'sharing_display' ) ) {
        sharing_display( '', true );
    }
}

function vodi_show_jetpack_likes() {
    if ( class_exists( 'Jetpack_Likes' ) ) {
        $custom_likes = new Jetpack_Likes;
        echo wp_kses_post( $custom_likes->post_likes( '' ) );
    }
}

function vodi_get_jetpack_page_views( $post_id ) {
    if ( function_exists( 'stats_get_csv' ) ) {
        $args = array( 'days' => -1, 'limit' => -1, 'post_id' => $post_id );
        $result = stats_get_csv( 'postviews', $args );
        $views = isset( $result[0]['views'] ) ? $result[0]['views'] : 0;
    } else {
        $views = 0;
    }

    return apply_filters( 'vodi_get_jetpack_page_views', absint( $views ) );
}