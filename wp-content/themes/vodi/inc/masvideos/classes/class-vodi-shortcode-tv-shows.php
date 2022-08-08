<?php
/**
 * Vodi TV Shows shortcode
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * TV Shows shortcode class.
 */
class Vodi_Shortcode_TV_Shows extends MasVideos_Shortcode_TV_Shows {

    private $original_post;

    /**
     * Get shortcode content.
     *
     * @since  1.0.0
     * @return string
     */
    public function get_tv_shows() {
        return $this->get_query_results();
    }

    /**
     * Get shortcode content.
     *
     * @since  1.0.0
     * @return string
     */
    public function tv_show_loop_start() {
        $columns  = absint( $this->attributes['columns'] );
        $classes  = $this->get_wrapper_classes( $columns );
        $tv_shows = $this->get_query_results();

        // Prime caches to reduce future queries.
        if ( is_callable( '_prime_post_caches' ) ) {
            _prime_post_caches( $tv_shows->ids );
        }

        // Prime meta cache to reduce future queries.
        update_meta_cache( 'post', $tv_shows->ids );
        update_object_term_cache( $tv_shows->ids, 'tv_show' );

        // Setup the loop.
        masvideos_setup_tv_shows_loop(
            array(
                'columns'      => $columns,
                'name'         => $this->type,
                'is_shortcode' => true,
                'is_search'    => false,
                'is_paginated' => masvideos_string_to_bool( $this->attributes['paginate'] ),
                'total'        => $tv_shows->total,
                'total_pages'  => $tv_shows->total_pages,
                'per_page'     => $tv_shows->per_page,
                'current_page' => $tv_shows->current_page,
            )
        );

        $this->original_post = $GLOBALS['post'];

        echo '<div class="' . esc_attr( implode( ' ', $classes ) ) . '">';

        do_action( "masvideos_shortcode_before_{$this->type}_loop", $this->attributes );

        // Fire standard shop loop hooks when paginating results so we can show result counts and so on.
        if ( masvideos_string_to_bool( $this->attributes['paginate'] ) ) {
            do_action( 'masvideos_before_shop_loop' );
        }

        masvideos_tv_show_loop_start();
    }

    /**
     * Get shortcode content.
     *
     * @since  1.0.0
     * @return string
     */
    public function tv_show_loop_end() {
        masvideos_tv_show_loop_end();

        $GLOBALS['post'] = $this->original_post; // WPCS: override ok.

        // Fire standard shop loop hooks when paginating results so we can show result counts and so on.
        if ( masvideos_string_to_bool( $this->attributes['paginate'] ) ) {
            do_action( 'masvideos_after_shop_loop' );
        }

        do_action( "masvideos_shortcode_after_{$this->type}_loop", $this->attributes );

        echo '</div>';

        wp_reset_postdata();
        masvideos_reset_tv_shows_loop();
    }

}
