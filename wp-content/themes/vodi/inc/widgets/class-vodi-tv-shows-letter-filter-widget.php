<?php
/**
 * TV Shows Letter Filter Widget.
 *
 * @package Vodi/Widgets
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists('MasVideos_Widget') ) :

/**
 * Widget letter filter class.
 */
class Vodi_Tv_Shows_Letter_Filter_Widget extends MasVideos_Widget {

    /**
     * Constructor.
     */
    public function __construct() {
        $this->widget_cssclass    = 'vodi vodi-widget_tv_shows_letter_filter';
        $this->widget_description = esc_html__( 'Display a list of letters to filter tv shows.', 'vodi' );
        $this->widget_id          = 'vodi_tv_shows_letter_filter';
        $this->widget_name        = esc_html__( 'Vodi Filter TV Shows by Letter', 'vodi' );
        $this->settings           = array(
            'title'         => array(
                'type'          => 'text',
                'std'           => esc_html__( 'Filter TV Shows by Letter', 'vodi' ),
                'label'         => esc_html__( 'Title', 'vodi' ),
            ),
        );
        parent::__construct();
    }

    /**
     * Count tv shows after other filters have occurred by adjusting the main query.
     *
     * @param  int $rating Rating.
     * @return int
     */
    protected function get_tv_shows_count() {
        global $wpdb;

        $sql = "SELECT LEFT( `post_title`, 1 ) as post_title_start, count(*) AS 'count' FROM {$wpdb->posts} WHERE post_type = 'tv_show' AND post_status = 'publish' GROUP BY post_title_start;";

        $search = MasVideos_Movies_Query::get_main_search_query_sql();
        if ( $search ) {
            $sql .= ' AND ' . $search;
        }

        return $wpdb->get_results( $sql, ARRAY_A ); // WPCS: unprepared SQL ok.
    }

    /**
     * Widget function.
     *
     * @see WP_Widget
     * @param array $args     Arguments.
     * @param array $instance Widget instance.
     */
    public function widget( $args, $instance ) {
        if ( ! is_tv_shows() && ! is_tv_show_taxonomy() ) {
            return;
        }

        if ( ! MasVideos()->tv_show_query->get_main_query()->post_count ) {
            return;
        }

        $range_0_9 = range( '0', '9' );
        $range_a_z = range( 'A', 'Z' );
        if( apply_filters( 'vodi_tv_shows_letter_filter_display_numbers_group', true ) ) {
            $filters_range = $range_a_z;
            array_unshift( $filters_range, '0-9' );
        } else {
            $filters_range = array_merge( $range_0_9, $range_a_z );
        }

        ob_start();

        $found       = false;
        $letter_filter = isset( $_GET['letter_filter'] ) ? array_filter( array_map( 'masvideos_clean', explode( ',', wp_unslash( $_GET['letter_filter'] ) ) ) ) : array(); // WPCS: input var ok, CSRF ok, sanitization ok.

        $this->widget_start( $args, $instance );

        $all_letters_count_info = $this->get_tv_shows_count();
        $all_letters_count = array();
        foreach ( $all_letters_count_info as $value ) {
            if( apply_filters( 'vodi_tv_shows_letter_filter_display_numbers_group', true ) ) {
                $letter_key = preg_match( '/^[1-9][0-9]*$/', $value['post_title_start'] ) ? '0-9' : $value['post_title_start'];
            } else {
                $letter_key = $value['post_title_start'];
            }

            $all_letters_count[$letter_key] = $value['count'];
        }

        echo '<ul>';

        foreach ( $filters_range as $letter ) {
            $count = isset( $all_letters_count[$letter] ) ? $all_letters_count[$letter] : '';

            if ( empty( $count ) ) {
                continue;
            }

            $found = true;
            $link  = $this->get_current_page_url();

            if ( in_array( $letter, $letter_filter ) ) {
                $link_filter = implode( ',', array_diff( $letter_filter, array( $letter ) ) );
            } else {
                $link_filter = implode( ',', array_merge( $letter_filter, array( $letter ) ) );
            }

            $class       = in_array( $letter, $letter_filter ) ? 'vodi-layered-nav-tv-shows-letter chosen' : 'vodi-layered-nav-tv-shows-letter';
            $link        = apply_filters( 'vodi_tv_shows_letter_filter_link', $link_filter ? add_query_arg( 'letter_filter', $link_filter ) : remove_query_arg( 'letter_filter' ) );
            $letter_html = $letter;
            $count_html  = '<span class="count">' . absint( $count ) . '</span>';

            printf( '<li class="%s"><a href="%s"><span>%s</span> %s</a></li>', esc_attr( $class ), esc_url( $link ), $letter_html, $count_html ); // WPCS: XSS ok.
        }

        echo '</ul>';

        $this->widget_end( $args );

        if ( ! $found ) {
            ob_end_clean();
        } else {
            echo ob_get_clean(); // WPCS: XSS ok.
        }
    }
}

endif;