<?php
if ( ! function_exists( 'vodi_movies_control_bar_top' ) ) {
    /**
     * movies top control bar.
     */
    function vodi_movies_control_bar_top() {
        do_action( 'vodi_movies_control_bar_top' );
    }
}

if ( ! function_exists( 'vodi_movies_control_bar_top_open' ) ) {
    /**
     * Display top control bar open
     */
    function vodi_movies_control_bar_top_open() {
        ?><div class="vodi-control-bar"><?php
    }
}

if ( ! function_exists( 'vodi_movies_archive_wrapper_open' ) ) {
    /**
     * Vodi Archive Wrapper Open
     */
    function vodi_movies_archive_wrapper_open() {
        $view = 'grid';
        $archive_views = vodi_masvideos_get_archive_views( 'movie' );
        foreach( $archive_views as $archive_view => $archive_view_args ) {
            if ( $archive_view_args['active'] ) {
                $view = $archive_view;
                break;
            }
        }
        ?><div class="vodi-archive-wrapper" data-view="<?php echo esc_attr( $view ); ?>"><?php
    }
}

if ( ! function_exists( 'vodi_movies_archive_wrapper_close' ) ) {
    /**
     * Vodi Archive Wrapper Close
     */
    function vodi_movies_archive_wrapper_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_movies_control_bar_bottom' ) ) {
    /**
     * movies bottom control bar.
     */
    function vodi_movies_control_bar_bottom() {
        do_action( 'vodi_movies_control_bar_bottom' );
    }
}

if ( ! function_exists( 'vodi_movies_control_bar_bottom_open' ) ) {
    /**
     * Display Bottom Control Bar open
     */
    function vodi_movies_control_bar_bottom_open() {
        ?><div class="page-control-bar-bottom"><?php
    }
}

if ( ! function_exists( 'vodi_movies_control_bar_bottom_close' ) ) {
    /**
     * Display Bottom Control Bar Close
     */
    function vodi_movies_control_bar_bottom_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_movies_control_bar_top_left' ) ) {
    /**
     * Display top control bar left
     */
    function vodi_movies_control_bar_top_left() {
        ?><div class="vodi-control-bar__left"><?php
            vodi_movies_control_bar_tag_filter();
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_movies_view_switcher' ) ) :
    /** 
     * Displays Movies View Switcher
     */
    function vodi_movies_view_switcher() {
        $movie_columns = vodi_get_movie_columns();
        vodi_masvideos_archives_view_switcher( 'movie', $movie_columns );
    }
    
endif;

if ( ! function_exists( 'vodi_movies_control_bar_top_right' ) ) {
    /**
     * Display top control bar right
     */
    function vodi_movies_control_bar_top_right() {
        ?><div class="vodi-control-bar__right"><?php
            vodi_movies_view_switcher();
            vodi_movies_catalog_ordering();
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_movies_catalog_ordering' ) ) :
    /**
     * Displays movies sorting options
     */
    function vodi_movies_catalog_ordering() {
        ?><div class="movies-ordering"><?php
            vodi_handheld_sidebar();
            vodi_catalog_ordering();
            masvideos_movies_catalog_ordering();
        ?></div><?php
    }
endif;

if ( ! function_exists( 'vodi_movies_control_bar_top_close' ) ) {
    /**
     * Display top control bar close
     */
    function vodi_movies_control_bar_top_close() {
        echo '</div>';
    }
}

function vodi_movies_where_filter( $where, $query ) {
    global $wpdb;

    if ( $query->query_vars['post_type'] == 'movie' ) {
        $all_ranges = array_merge( array( '0-9' ), range( '0', '9' ), range( 'A', 'Z' ) );
        $letter_filter = isset( $_GET['letter_filter'] ) ? array_filter( array_map( 'masvideos_clean', explode( ',', $_GET['letter_filter'] ) ) ) : ''; // WPCS: input var ok, CSRF ok, Sanitization ok.
        $result = is_array( $letter_filter ) && ! empty( $letter_filter ) ? array_intersect( $letter_filter, $all_ranges ) : '';

        if( ! empty( $result ) ) {
            $where .= $wpdb->prepare( " AND $wpdb->posts.post_title REGEXP %s",'^['. esc_sql( implode( '', $result ) ) . ']' );
        }
    }

    return $where;
}

if ( ! function_exists( 'vodi_movies_jumbotron_top' ) ) {
    function vodi_movies_jumbotron_top() {
        $static_block_id = '';

        if ( is_movies() ) {
            $static_block_id = apply_filters( 'vodi_movies_jumbotron_top_id', '' );
        } elseif ( is_movie_genre() ) {
            $term               = get_queried_object();
            $term_id            = $term->term_id;
            $static_block_id    = absint( get_term_meta( $term_id, 'jumbotron_top_id', true ) );
        }

        if( vodi_is_mas_static_content_activated() && ! empty( $static_block_id ) ) {
            $static_block = get_post( $static_block_id );
            $content = isset( $static_block->post_content ) ? $static_block->post_content : '';
            echo '<div class="movies__jumbotron--top">' . apply_filters( 'the_content', $content ) . '</div>';
        }
    }
}

if ( ! function_exists( 'vodi_movies_control_bar_tag_filter' ) ) {
    /**
     * Display top control bar tag filter
     */
    function vodi_movies_control_bar_tag_filter() {
        $instance = apply_filters( 'vodi_movies_control_bar_tag_filter_instance', array(
            'title'         => '',
            'limit'         => 2,
            'slugs'         => '',
            'query_type'    => 'and',
        ) );
        $args = apply_filters( 'vodi_movies_control_bar_tag_filter_args', array() );
        the_widget( 'MasVideos_Movies_Tags_Filter_Widget', $instance, $args );
    }
}

if ( ! function_exists( 'vodi_archive_get_sidebar' ) ) {
    function vodi_archive_get_sidebar() {
        if ( is_movies() || is_movie_taxonomy() ) {
            get_sidebar( 'movie' );
        } elseif ( is_tv_shows() || is_tv_show_taxonomy() || is_page_template( array( 'template-tv-shows-archive.php' ) ) ) {
            get_sidebar( 'tv-show' );
        } elseif ( is_episodes() || is_episode_taxonomy() ) {
            get_sidebar( 'tv-show' );
        } elseif ( is_videos() || is_video_taxonomy() || is_page_template( array( 'template-videos-archive.php' ) ) ) {
            get_sidebar( 'video' );
        }
    }
}

if ( ! function_exists( 'vodi_movies_pagination_custom_args' ) ) {
    function vodi_movies_pagination_custom_args( $args ) {
        $args['next_text'] = esc_html_x( 'Next Page &nbsp;&nbsp;&nbsp;&rarr;', 'Next page', 'vodi' );
        $args['prev_text'] = esc_html_x( '&larr;&nbsp;&nbsp;&nbsp; Previous Page', 'Previous page', 'vodi' );

        return $args;
    }
}

if ( ! function_exists( 'vodi_get_movie_rows' ) ) {
    function vodi_get_movie_rows( $rows = 4 ) {
        $rows = 4;
        return apply_filters( 'vodi_movie_rows', $rows );
    }
}

if ( ! function_exists( 'vodi_get_movie_columns' ) ) {
    function vodi_get_movie_columns( $columns = 6 ) {
        $columns = 6;
        return apply_filters( 'vodi_movie_columns', $columns );
    }
}

if ( ! function_exists( 'vodi_template_loop_movie_avg_rating' ) ) {

    /**
     * movie avg rating in the movie loop.
     */
    function vodi_template_loop_movie_avg_rating() {
        global $movie;

        if ( ! empty( $movie->get_review_count() ) && $movie->get_review_count() > 0 ) {
            ?>
            <a href="<?php echo esc_url( get_permalink( $movie->get_id() ) . '#reviews' ); ?>" class="avg-rating">
                <span class="rating-with-count">
                    <?php vodi_get_template( 'svg/avg-rating.svg' ); ?>
                    <span class="avg-rating-number"> <?php echo number_format( $movie->get_average_rating(), 1, '.', '' ); ?></span>
                </span>
                <span class="rating-number-with-text">
                    <span class="avg-rating-number"> <?php echo number_format( $movie->get_average_rating(), 1, '.', '' ); ?></span>
                    <span class="avg-rating-text">
                        <?php echo wp_kses_post( sprintf( _n( '<span>%s</span> Vote', '<span>%s</span> Votes', $movie->get_review_count(), 'vodi' ), $movie->get_review_count() ) ) ; ?>
                    </span>
                </span>
            </a>
            <?php
        }
    }
}

if ( ! function_exists( 'vodi_movie_archive_header' ) ) {

    function vodi_movie_archive_header() {
        if ( vodi_is_masvideos_activated() && ( is_movies() || is_movie_taxonomy() ) && ! is_search() ) {
            vodi_movies_jumbotron_top();
        }
    }
}

if ( ! function_exists( 'vodi_display_movie_page_title' ) ) {

    function vodi_display_movie_page_title( $enable ) {
        if( is_search() ) {
            return false;
        }

        return $enable;
    }
}