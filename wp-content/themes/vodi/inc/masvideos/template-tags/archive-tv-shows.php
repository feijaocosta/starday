<?php

if ( ! function_exists( 'vodi_tv_shows_control_bar_top' ) ) {
    /**
     * tv shows top control bar.
     */
    function vodi_tv_shows_control_bar_top() {
        do_action( 'vodi_tv_shows_control_bar_top' );
    }
}

if ( ! function_exists( 'vodi_tv_shows_control_bar_top_open' ) ) {
    /**
     * Display top control bar open
     */
    function vodi_tv_shows_control_bar_top_open() {
        echo '<div class="masvideos-tv-show-control-bar vodi-control-bar">';
    }
}

if ( ! function_exists( 'vodi_tv_shows_archive_wrapper_open' ) ) {
    /**
     * Vodi Archive Wrapper Open
     */
    function vodi_tv_shows_archive_wrapper_open() {
        $view = 'grid';
        $archive_views = vodi_masvideos_get_archive_views( 'tv_show' );
        foreach( $archive_views as $archive_view => $archive_view_args ) {
            if ( $archive_view_args['active'] ) {
                $view = $archive_view;
                break;
            }
        }
        ?><div class="vodi-archive-wrapper" data-view="<?php echo esc_attr( $view ); ?>"><?php
    }
}

if ( ! function_exists( 'vodi_tv_shows_archive_wrapper_close' ) ) {
    /**
     * Vodi Archive Wrapper Close
     */
    function vodi_tv_shows_archive_wrapper_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_tv_shows_control_bar_bottom' ) ) {
    /**
     * tv shows bottom control bar.
     */
    function vodi_tv_shows_control_bar_bottom() {
        do_action( 'vodi_tv_shows_control_bar_bottom' );
    }
}

if ( ! function_exists( 'vodi_tv_shows_control_bar_bottom_open' ) ) {
    /**
     * Display Bottom Control Bar open
     */
    function vodi_tv_shows_control_bar_bottom_open() {
        echo '<div class="page-control-bar-bottom">';
    }
}

if ( ! function_exists( 'vodi_tv_shows_control_bar_bottom_close' ) ) {
    /**
     * Display Bottom Control Bar Close
     */
    function vodi_tv_shows_control_bar_bottom_close() {
        echo '</div>';
    }
}

if ( ! function_exists( 'vodi_tv_shows_control_bar_top_left' ) ) {
    /**
     * Display top control bar left
     */
    function vodi_tv_shows_control_bar_top_left() {
        ?><div class="vodi-control-bar__left">
            <?php vodi_tv_shows_control_bar_tag_filter(); ?>
        </div><?php
    }
}

if ( ! function_exists( 'vodi_tv_shows_view_switcher' ) ) :
    /** 
     * Displays Movies View Switcher
     */
    function vodi_tv_shows_view_switcher() {
        $tv_show_columns = vodi_get_tv_show_columns();
        vodi_masvideos_archives_view_switcher( 'tv_show', $tv_show_columns );
    }
    
endif;

if ( ! function_exists( 'vodi_tv_shows_catalog_ordering' ) ) :
    /**
     * Displays tv_shows sorting options
     */
    function vodi_tv_shows_catalog_ordering() {
        ?><div class="tv-shows-ordering"><?php
            vodi_handheld_sidebar();
            vodi_catalog_ordering();
            masvideos_tv_shows_catalog_ordering();
        ?></div><?php
    }
endif;

if ( ! function_exists( 'vodi_tv_shows_control_bar_top_right' ) ) {
    /**
     * Display top control bar right
     */
    function vodi_tv_shows_control_bar_top_right() {
        ?><div class="vodi-control-bar__right"><?php
            vodi_tv_shows_view_switcher();
            vodi_tv_shows_catalog_ordering();
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_tv_shows_control_bar_top_close' ) ) {
    /**
     * Display top control bar close
     */
    function vodi_tv_shows_control_bar_top_close() {
        echo '</div>';
    }
}

if ( ! function_exists( 'vodi_get_archive_views' ) ) {
    /**
     * Archive views
     */
    function vodi_get_archive_views() {
        return $archive_views = apply_filters( 'vodi_get_archive_views_args', array(
            'grid'              => array(
                'label'         => esc_html__( 'Grid View', 'vodi' ),
                'svg'          => 'templates/svg/grid-small-icon.svg',
                'enabled'       => true,
                'active'        => true,
            ),
            'grid-extended'          => array(
                'label'         => esc_html__( 'Grid View', 'vodi' ),
                'svg'          => 'templates/svg/grid-icon.svg',
                'enabled'       => true,
                'active'        => false,
            ),
            'list-large'          => array(
                'label'         => esc_html__( 'List Large View', 'vodi' ),
                'svg'          => 'templates/svg/listing-large-icon.svg',
                'enabled'       => true,
                'active'        => false,

            ),
            'list-small'          => array(
                'label'         => esc_html__( 'List View', 'vodi' ),
                'svg'          => 'templates/svg/listing-icon.svg',
                'enabled'       => true,
                'active'        => false,

            ),
            'list'          => array(
                'label'         => esc_html__( 'List Small View', 'vodi' ),
                'svg'          => 'templates/svg/listing-small.svg',
                'enabled'       => true,
                'active'        => false,

            ),
        ) );
    }
}

if ( ! function_exists( 'vodi_tv_shows_pagination_custom_args' ) ) {
    function vodi_tv_shows_pagination_custom_args( $args ) {
        $args['next_text'] = esc_html_x( 'Next Page &nbsp;&nbsp;&nbsp;&rarr;', 'Next page', 'vodi' );
        $args['prev_text'] = esc_html_x( '&larr;&nbsp;&nbsp;&nbsp; Previous Page', 'Previous page', 'vodi' );

        return $args;
    }
}

if ( ! function_exists( 'vodi_get_tv_show_rows' ) ) {
    function vodi_get_tv_show_rows( $rows = 6 ) {
        $rows = 6;
        return apply_filters( 'vodi_tv_show_rows', $rows );
    }
}

if ( ! function_exists( 'vodi_get_tv_show_columns' ) ) {
    function vodi_get_tv_show_columns( $columns = 5 ) {
        $columns = 5;
        return apply_filters( 'vodi_tv_show_columns', $columns );
    }
}

function vodi_tv_shows_where_filter( $where, $query ) {
    global $wpdb;

    if ( $query->query_vars['post_type'] == 'tv_show' ) {
        $all_ranges = array_merge( array( '0-9' ), range( '0', '9' ), range( 'A', 'Z' ) );
        $letter_filter = isset( $_GET['letter_filter'] ) ? array_filter( array_map( 'masvideos_clean', explode( ',', $_GET['letter_filter'] ) ) ) : ''; // WPCS: input var ok, CSRF ok, Sanitization ok.
        $result = is_array( $letter_filter ) && ! empty( $letter_filter ) ? array_intersect( $letter_filter, $all_ranges ) : '';

        if( ! empty( $result ) ) {
            $where .= $wpdb->prepare( " AND $wpdb->posts.post_title REGEXP %s",'^['. esc_sql( implode( '', $result ) ) . ']' );
        }
    }

    return $where;
}

if ( ! function_exists( 'vodi_tv_shows_jumbotron_top' ) ) {
    function vodi_tv_shows_jumbotron_top() {
        $static_block_id = '';

        if ( is_tv_shows() ) {
            $static_block_id = apply_filters( 'vodi_tv_shows_jumbotron_top_id', '' );
        } elseif ( is_tv_show_genre() ) {
            $term               = get_queried_object();
            $term_id            = $term->term_id;
            $static_block_id    = absint( get_term_meta( $term_id, 'jumbotron_top_id', true ) );
        }

        if( vodi_is_mas_static_content_activated() && ! empty( $static_block_id ) ) {
            $static_block = get_post( $static_block_id );
            $content = isset( $static_block->post_content ) ? $static_block->post_content : '';
            echo '<div class="tv-shows__jumbotron--top">' . apply_filters( 'the_content', $content ) . '</div>';
        }
    }
}

if ( ! function_exists( 'vodi_tv_shows_control_bar_tag_filter' ) ) {
    /**
     * Display top control bar tag filter
     */
    function vodi_tv_shows_control_bar_tag_filter() {
        $instance = apply_filters( 'vodi_tv_shows_control_bar_tag_filter_instance', array(
            'title'         => '',
            'limit'         => 2,
            'slugs'         => '',
            'query_type'    => 'and',
        ) );
        $args = apply_filters( 'vodi_tv_shows_control_bar_tag_filter_args', array() );
        the_widget( 'MasVideos_TV_Shows_Tags_Filter_Widget', $instance, $args );
    }
}

if ( ! function_exists( 'vodi_template_loop_tv_show_avg_rating' ) ) {

    /**
     * tv_show avg rating in the tv_show loop.
     */
    function vodi_template_loop_tv_show_avg_rating() {
        global $tv_show;

        if ( ! empty( $tv_show->get_review_count() ) && $tv_show->get_review_count() > 0 ) {
            ?>
            <a href="<?php echo esc_url( get_permalink( $tv_show->get_id() ) . '#reviews' ); ?>" class="avg-rating">
                <span class="rating-with-count">
                    <?php vodi_get_template( 'svg/avg-rating.svg' ); ?>
                    <span class="avg-rating-number"> <?php echo number_format( $tv_show->get_average_rating(), 1, '.', '' ); ?></span>
                </span>
                <span class="rating-number-with-text">
                    <span class="avg-rating-number"> <?php echo number_format( $tv_show->get_average_rating(), 1, '.', '' ); ?></span>
                    <span class="avg-rating-text">
                        <?php echo wp_kses_post( sprintf( _n( '<span>%s</span> Vote', '<span>%s</span> Votes', $tv_show->get_review_count(), 'vodi' ), $tv_show->get_review_count() ) ) ; ?>
                    </span>
                </span>
            </a>
            <?php
        }
    }
}


if ( ! function_exists( 'vodi_tv_show_archive_header' ) ) {

    function vodi_tv_show_archive_header() {
        if ( vodi_is_masvideos_activated() && ( is_tv_shows() || is_tv_show_taxonomy() ) && ! is_search() ) {
            vodi_tv_shows_jumbotron_top();
        }
    }
}

if ( ! function_exists( 'vodi_display_tv_show_page_title' ) ) {

    function vodi_display_tv_show_page_title( $enable ) {
        if( is_search() ) {
            return false;
        }

        return $enable;
    }
}