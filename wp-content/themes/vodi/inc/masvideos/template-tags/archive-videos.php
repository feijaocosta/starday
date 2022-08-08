<?php
if ( ! function_exists( 'vodi_videos_pagination_custom_args' ) ) {
    function vodi_videos_pagination_custom_args( $args ) {
        $args['next_text'] = esc_html_x( 'Next Page &nbsp;&nbsp;&nbsp;&rarr;', 'Next page', 'vodi' );
        $args['prev_text'] = esc_html_x( '&larr;&nbsp;&nbsp;&nbsp; Previous Page', 'Previous page', 'vodi' );

        return $args;
    }
}


if ( ! function_exists( 'vodi_videos_jumbotron_top' ) ) {
    function vodi_videos_jumbotron_top() {
        $static_block_id = '';

        if ( is_videos() ) {
            $static_block_id = apply_filters( 'vodi_videos_jumbotron_top_id', '' );
        } elseif ( is_video_category() ) {
            $term               = get_queried_object();
            $term_id            = $term->term_id;
            $static_block_id    = absint( get_term_meta( $term_id, 'jumbotron_top_id', true ) );
        }

        if( vodi_is_mas_static_content_activated() && ! empty( $static_block_id ) ) {
            $static_block = get_post( $static_block_id );
            $content = isset( $static_block->post_content ) ? $static_block->post_content : '';
            echo '<div class="videos__jumbotron--top">' . apply_filters( 'the_content', $content ) . '</div>';
        }
    }
}

if ( ! function_exists( 'vodi_video_archive_header' ) ) {

    function vodi_video_archive_header() {
        if ( vodi_is_masvideos_activated() && ( is_videos() || is_video_taxonomy() ) && ! is_search() ) {
            vodi_videos_jumbotron_top();
        }
    }
}

if ( ! function_exists( 'vodi_display_video_page_title' ) ) {

    function vodi_display_video_page_title( $enable ) {
        if( is_search() ) {
            return false;
        }

        return $enable;
    }
}

if ( ! function_exists( 'vodi_videos_control_bar_top' ) ) {
    /**
     * videos top control bar.
     */
    function vodi_videos_control_bar_top() {
        do_action( 'vodi_videos_control_bar_top' );
    }
}

if ( ! function_exists( 'vodi_videos_control_bar_top_open' ) ) {
    /**
     * Display top control bar open
     */
    function vodi_videos_control_bar_top_open() {
        echo '<div class="masvideos-video-control-bar vodi-control-bar">';
    }
}

if ( ! function_exists( 'vodi_videos_control_bar_bottom' ) ) {
    /**
     * videos bottom control bar.
     */
    function vodi_videos_control_bar_bottom() {
        do_action( 'vodi_videos_control_bar_bottom' );
    }
}

if ( ! function_exists( 'vodi_videos_control_bar_bottom_open' ) ) {
    /**
     * Display Bottom Control Bar open
     */
    function vodi_videos_control_bar_bottom_open() {
        echo '<div class="page-control-bar-bottom">';
    }
}

if ( ! function_exists( 'vodi_videos_control_bar_bottom_close' ) ) {
    /**
     * Display Bottom Control Bar Close
     */
    function vodi_videos_control_bar_bottom_close() {
        echo '</div>';
    }
}

if ( ! function_exists( 'vodi_videos_control_bar_top_left' ) ) {
    /**
     * Display top control bar left
     */
    function vodi_videos_control_bar_top_left() {
        ?><div class="vodi-control-bar__left">
            <?php vodi_videos_control_bar_tag_filter(); ?>
        </div><?php
    }
}

if ( ! function_exists( 'vodi_videos_archive_wrapper_open' ) ) {
    /**
     * Vodi Archive Wrapper Open
     */
    function vodi_videos_archive_wrapper_open() {
        $view = 'grid';
        $archive_views = vodi_masvideos_get_archive_views( 'video' );
        foreach( $archive_views as $archive_view => $archive_view_args ) {
            if ( $archive_view_args['active'] ) {
                $view = $archive_view;
                break;
            }
        }
        ?><div class="vodi-archive-wrapper" data-view="<?php echo esc_attr( $view ); ?>"><?php
    }
}
if ( ! function_exists( 'vodi_videos_archive_wrapper_close' ) ) {
    /**
     * Vodi Archive Wrapper Close
     */
    function vodi_videos_archive_wrapper_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_videos_view_switcher' ) ) :
    /** 
     * Displays Movies View Switcher
     */
    function vodi_videos_view_switcher() {
        $video_columns = vodi_get_video_columns();
        vodi_masvideos_archives_view_switcher( 'video', $video_columns );
    }
    
endif;

if ( ! function_exists( 'vodi_videos_catalog_ordering' ) ) :
    /**
     * Displays videos sorting options
     */
    function vodi_videos_catalog_ordering() {
        ?><div class="videos-ordering"><?php
            vodi_handheld_sidebar();
            vodi_catalog_ordering();
            masvideos_videos_catalog_ordering();
        ?></div><?php
    }
endif;

if ( ! function_exists( 'vodi_videos_control_bar_top_right' ) ) {
    /**
     * Display top control bar right
     */
    function vodi_videos_control_bar_top_right() {
        ?><div class="vodi-control-bar__right"><?php
            vodi_videos_view_switcher();
            vodi_videos_catalog_ordering();
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_videos_control_bar_top_close' ) ) {
    /**
     * Display top control bar close
     */
    function vodi_videos_control_bar_top_close() {
        echo '</div>';
    }
}

if ( ! function_exists( 'vodi_videos_control_bar_tag_filter' ) ) {
    /**
     * Display top control bar tag filter
     */
    function vodi_videos_control_bar_tag_filter() {
        $instance = apply_filters( 'vodi_videos_control_bar_tag_filter_instance', array(
            'title'         => '',
            'limit'         => 2,
            'slugs'         => '',
            'query_type'    => 'and',
        ) );
        $args = apply_filters( 'vodi_videos_control_bar_tag_filter_args', array() );
        the_widget( 'MasVideos_Videos_Tags_Filter_Widget', $instance, $args );
    }
}

if ( ! function_exists( 'vodi_get_video_rows' ) ) {
    function vodi_get_video_rows( $rows = 6 ) {
        $rows = 6;
        return apply_filters( 'vodi_video_rows', $rows );
    }
}

if ( ! function_exists( 'vodi_get_video_columns' ) ) {
    function vodi_get_video_columns( $columns = 5 ) {
        $columns = 5;
        return apply_filters( 'vodi_video_columns', $columns );
    }
}

if ( ! function_exists( 'vodi_template_loop_video_views_meta_open' ) ) {
    function vodi_template_loop_video_views_meta_open() {
        ?><div class="video__views-meta"><?php
    }
}

if ( ! function_exists( 'vodi_template_loop_video_views_meta_close' ) ) {
    function vodi_template_loop_video_views_meta_close() {
        ?></div><?php
    }
}