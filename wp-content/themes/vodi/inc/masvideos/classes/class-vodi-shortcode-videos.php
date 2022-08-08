<?php
/**
 * Vodi Videos shortcode
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Videos shortcode class.
 */
class Vodi_Shortcode_Videos extends MasVideos_Shortcode_Videos {

    private $original_post;

    /**
     * Get shortcode content.
     *
     * @since  1.0.0
     * @return string
     */
    public function get_videos() {
        return $this->get_query_results();
    }

    /**
     * Get shortcode content.
     *
     * @since  1.0.0
     * @return string
     */
    public function video_loop_start() {
        $columns  = absint( $this->attributes['columns'] );
        $classes  = $this->get_wrapper_classes( $columns );
        $videos = $this->get_query_results();

        // Prime caches to reduce future queries.
        if ( is_callable( '_prime_post_caches' ) ) {
            _prime_post_caches( $videos->ids );
        }

        // Prime meta cache to reduce future queries.
        update_meta_cache( 'post', $videos->ids );
        update_object_term_cache( $videos->ids, 'video' );

        // Setup the loop.
        masvideos_setup_videos_loop(
            array(
                'columns'      => $columns,
                'name'         => $this->type,
                'is_shortcode' => true,
                'is_search'    => false,
                'is_paginated' => masvideos_string_to_bool( $this->attributes['paginate'] ),
                'total'        => $videos->total,
                'total_pages'  => $videos->total_pages,
                'per_page'     => $videos->per_page,
                'current_page' => $videos->current_page,
            )
        );

        $this->original_post = $GLOBALS['post'];

        echo '<div class="' . esc_attr( implode( ' ', $classes ) ) . '">';

        do_action( "masvideos_shortcode_before_{$this->type}_loop", $this->attributes );

        // Fire standard shop loop hooks when paginating results so we can show result counts and so on.
        if ( masvideos_string_to_bool( $this->attributes['paginate'] ) ) {
            do_action( 'masvideos_before_shop_loop' );
        }

        masvideos_video_loop_start();
    }

    /**
     * Get shortcode content.
     *
     * @since  1.0.0
     * @return string
     */
    public function video_loop_end() {
        masvideos_video_loop_end();

        $GLOBALS['post'] = $this->original_post; // WPCS: override ok.

        // Fire standard shop loop hooks when paginating results so we can show result counts and so on.
        if ( masvideos_string_to_bool( $this->attributes['paginate'] ) ) {
            do_action( 'masvideos_after_shop_loop' );
        }

        do_action( "masvideos_shortcode_after_{$this->type}_loop", $this->attributes );

        echo '</div>';

        wp_reset_postdata();
        masvideos_reset_videos_loop();
    }

}
