<?php

if ( ! function_exists( 'vodi_masvideos_body_classes' ) ) {
    function vodi_masvideos_body_classes() {
        if ( is_single() && is_movie() ) {
            $style = function_exists( 'vodi_get_single_movie_style' ) ? vodi_get_single_movie_style() : 'v1';
            $style_class = ! empty( $style ) ? 'single-movie-' . $style : '';
        } elseif ( is_single() && is_video() ) {
            $style = function_exists( 'vodi_get_single_video_style' ) ? vodi_get_single_video_style() : 'v1';
            $style_class = ! empty( $style ) ? 'single-video-' . $style : '';
        } elseif ( is_single() && is_tv_show() ) {
            $style = function_exists( 'vodi_get_single_tv_show_style' ) ? vodi_get_single_tv_show_style() : 'v1';
            $style_class = ! empty( $style ) ? 'single-tv_show-' . $style : '';
        } elseif ( is_single() && is_episode() ) {
            $style = function_exists( 'vodi_get_single_episode_style' ) ? vodi_get_single_episode_style() : 'v1';
            $style_class = ! empty( $style ) ? 'single-episode-' . $style : '';
        } elseif( is_videos() || is_video_taxonomy() || is_page_template( array( 'template-videos-archive.php' ) ) ) {
            $style = function_exists( 'vodi_get_videos_style' ) ? vodi_get_videos_style() : '';
            $style_class = ! empty( $style ) ? 'home-archive' : '';
        } elseif( is_tv_shows() || is_tv_show_taxonomy() || is_page_template( array( 'template-tv-shows-archive.php' ) ) ) {
            $style = function_exists( 'vodi_get_tv_shows_style' ) ? vodi_get_tv_shows_style() : '';
            $style_class = ! empty( $style ) ? 'home-archive' : '';
        }

        return isset( $style_class ) ? $style_class : '';
    }
}

if ( ! function_exists( 'vodi_get_single_movie_style' ) ) {
    function vodi_get_single_movie_style() {
        $movie_style = get_post_meta( get_the_ID(), '_vodi_movie_style', true );
        $style = ! empty( $movie_style ) ? $movie_style : apply_filters( 'vodi_single_movie_style', 'v1' );

        return $style;
    }
}

if ( ! function_exists( 'vodi_get_single_video_style' ) ) {
    function vodi_get_single_video_style() {
        $video_style = get_post_meta( get_the_ID(), '_vodi_video_style', true );
        $style = ! empty( $video_style ) ? $video_style : apply_filters( 'vodi_single_video_style', 'v1' );

        return $style;
    }
}

if ( ! function_exists( 'vodi_get_single_tv_show_style' ) ) {
    function vodi_get_single_tv_show_style() {
        $tv_show_style = get_post_meta( get_the_ID(), '_vodi_tv_show_style', true );
        $style = ! empty( $tv_show_style ) ? $tv_show_style : apply_filters( 'vodi_single_tv_show_style', 'v1' );

        return $style;
    }
}

if ( ! function_exists( 'vodi_get_single_episode_style' ) ) {
    function vodi_get_single_episode_style() {
        $episode_style = get_post_meta( get_the_ID(), '_vodi_episode_style', true );
        $style = ! empty( $episode_style ) ? $episode_style : apply_filters( 'vodi_single_episode_style', 'v1' );

        return $style;
    }
}

if ( ! function_exists( 'vodi_get_videos_style' ) ) {
    function vodi_get_videos_style() {
        return apply_filters( 'vodi_videos_style', '' );
    }
}

if ( ! function_exists( 'vodi_get_tv_shows_style' ) ) {
    function vodi_get_tv_shows_style() {
        return apply_filters( 'vodi_tv_shows_style', '' );
    }
}

if( ! function_exists( 'vodi_set_views_likes_to_catalog_ordering_args' ) ) {
    function vodi_set_views_likes_to_catalog_ordering_args( $args, $orderby, $order ) {
        if ( function_exists( 'stats_get_csv' ) && $orderby == 'views' ) {
            $args['meta_key'] = '_jetpack_post_views_count'; // @codingStandardsIgnoreLine
            $args['orderby']  = array(
                'meta_value_num' => 'DESC',
                'ID'             => 'ASC',
            );
            return $args;
        } elseif( function_exists( 'RUN_WPULIKE' ) && shortcode_exists( 'wp_ulike' ) && $orderby == 'likes' ) {
            $args['meta_key'] = '_liked'; // @codingStandardsIgnoreLine
            $args['orderby']  = array(
                'meta_value_num' => 'DESC',
                'ID'             => 'ASC',
            );
            return $args;
        }
        return $args;
    }
}

if ( ! function_exists( 'vodi_live_search_movies_suggest' ) ) {
    function vodi_live_search_movies_suggest() {
        $suggestions = array();
        $posts = get_posts( array(
            's'                 => $_REQUEST['term'],
            'post_type'         => 'movie',
            'posts_per_page'    => '8',
        ) );

        global $post;

        $results = array();
        foreach ( $posts as $post ) {
            setup_postdata( $post );
            $suggestion = array();
            $suggestion['label'] = html_entity_decode( $post->post_title, ENT_QUOTES, 'UTF-8' );
            $suggestion['link'] = get_permalink( $post->ID );
            
            $suggestions[] = $suggestion;
        }

        // JSON encode and echo
        $response = $_GET["callback"] . "(" . json_encode( $suggestions ) . ")";
        echo wp_kses_post( $response );

        // Don't forget to exit!
        exit;
    }
}

if ( ! function_exists( 'vodi_live_search_tv_shows_suggest' ) ) {
    function vodi_live_search_tv_shows_suggest() {
        $suggestions = array();
        $posts = get_posts( array(
            's'                 => $_REQUEST['term'],
            'post_type'         => 'tv_show',
            'posts_per_page'    => '8',
        ) );

        global $post;

        $results = array();
        foreach ( $posts as $post ) {
            setup_postdata( $post );
            $suggestion = array();
            $suggestion['label'] = html_entity_decode( $post->post_title, ENT_QUOTES, 'UTF-8' );
            $suggestion['link'] = get_permalink( $post->ID );
            
            $suggestions[] = $suggestion;
        }

        // JSON encode and echo
        $response = $_GET["callback"] . "(" . json_encode( $suggestions ) . ")";
        echo wp_kses_post( $response );

        // Don't forget to exit!
        exit;
    }
}

if ( ! function_exists( 'vodi_live_search_videos_suggest' ) ) {
    function vodi_live_search_videos_suggest() {
        $suggestions = array();
        $posts = get_posts( array(
            's'                 => $_REQUEST['term'],
            'post_type'         => 'video',
            'posts_per_page'    => '8',
        ) );

        global $post;

        $results = array();
        foreach ( $posts as $post ) {
            setup_postdata( $post );
            $suggestion = array();
            $suggestion['label'] = html_entity_decode( $post->post_title, ENT_QUOTES, 'UTF-8' );
            $suggestion['link'] = get_permalink( $post->ID );
            
            $suggestions[] = $suggestion;
        }

        // JSON encode and echo
        $response = $_GET["callback"] . "(" . json_encode( $suggestions ) . ")";
        echo wp_kses_post( $response );

        // Don't forget to exit!
        exit;
    }
}
