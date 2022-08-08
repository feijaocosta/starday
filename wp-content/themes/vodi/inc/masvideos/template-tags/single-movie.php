<?php
/**
 * Template functions for single
 */

if ( ! function_exists( 'vodi_toggle_single_movie_breadcrumb' ) ) {
    function vodi_toggle_single_movie_breadcrumb() {
        if ( is_movie() ) {
            remove_action( 'vodi_content_top', 'vodi_breadcrumb', 10 );
            add_action( 'masvideos_before_single_movie_summary', 'vodi_breadcrumb', 4 );
        }
    }
}

if ( ! function_exists( 'vodi_toggle_single_movie_hooks' ) ) {
    function vodi_toggle_single_movie_hooks() {
        $style  = vodi_get_single_movie_style();

        if ( $style !== 'v4' && $style !== 'v3' ) {
            add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_player_container_wrap_open', 1 );
            add_action( 'masvideos_after_single_movie_summary',  'vodi_template_single_movie_player_container_wrap_close', 10 );
        }

        if( $style === 'v7' ) {
            remove_filter( 'masvideos_related_movies_default_args', 'vodi_related_movies_default_args' );
            remove_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_head_wrap_open', 10 );
            remove_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_player_wrap_open', 30 );
            remove_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_movie', 40 );
            remove_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_player_wrap_close', 50 );
            remove_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_head_wrap_close', 70 );
            remove_action( 'masvideos_after_single_movie_summary',  'masvideos_template_single_movie_tabs', 30 );
            remove_action( 'masvideos_after_single_movie_summary',  'vodi_recommended_movies', 30 );

            remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_rating_with_playlist_wrap_open', 30 );
            remove_action( 'masvideos_single_movie_summary', 'vodi_template_loop_movie_avg_rating', 40 );
            remove_action( 'masvideos_single_movie_summary', 'masvideos_template_button_movie_playlist', 45 );
            remove_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_download_button', 45 );
            remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_rating_with_playlist_wrap_close', 50 );

            remove_action( 'masvideos_single_movie_summary',        'vodi_template_single_movie_head_info_wrap_open', 10 );
            remove_action( 'masvideos_single_movie_summary',        'vodi_template_single_movie_head_info_wrap_close', 55 );

            remove_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_player_container_wrap_open', 1 );
            remove_action( 'masvideos_after_single_movie_summary',  'vodi_template_single_movie_player_container_wrap_close', 10 );

            add_action( 'masvideos_before_single_movie_summary',    'vodi_template_single_movie_row_wrap_open', 92 );
            add_action( 'masvideos_before_single_movie_summary',    'vodi_template_single_movie_primary_open', 95 );
            add_action( 'masvideos_before_single_movie_summary',    'vodi_template_single_movie_summary_inner_wrap_open', 110 );

            add_action( 'masvideos_single_movie_summary',           'vodi_template_single_movie_action_buttons', 1 );
            add_action( 'masvideos_single_movie_summary',           'vodi_template_single_movie_info_wrap_open', 2 );
            add_action( 'masvideos_single_movie_summary',           'masvideos_template_single_movie_short_desc', 25 );
            add_action( 'masvideos_single_movie_summary',           'masvideos_template_single_movie_featured_crew', 30 );
            add_action( 'masvideos_single_movie_summary',           'vodi_single_movie_sharing', 40 );
            add_action( 'masvideos_single_movie_summary',           'vodi_template_single_movie_info_wrap_close', 50 );
            add_action( 'masvideos_after_single_movie_summary',     'vodi_template_single_movie_summary_inner_wrap_close', 11 );
            add_action( 'masvideos_after_single_movie_summary',     'vodi_template_related_movies_by_person', 40 );
            add_action( 'masvideos_after_single_movie_summary',     'vodi_template_single_movie_highlighted_comment', 45 );
            add_action( 'masvideos_after_single_movie_summary',     'masvideos_template_single_movie_cast_crew_tabs', 50 );
            add_filter( 'masvideos_movie_attribute',                'vodi_template_single_movie_attribute', 10, 3 );
            add_action( 'masvideos_after_single_movie_summary',     'vodi_template_single_movie_details', 60 );
            add_action( 'masvideos_after_single_movie_summary',     'comments_template', 70 );
            add_action( 'masvideos_after_single_movie_summary',     'vodi_template_single_movie_primary_close', 80 );
            add_action( 'masvideos_after_single_movie_summary',     'vodi_template_single_movie_sidebar_open', 90 );

            add_action( 'masvideos_after_single_movie_summary',     'masvideos_template_loop_movie_poster_open', 100 );
            add_action( 'masvideos_after_single_movie_summary',     'vodi_template_single_movie_poster', 110 );
            add_action( 'masvideos_after_single_movie_summary',     'masvideos_template_loop_movie_poster_close', 120 );
            add_action( 'masvideos_after_single_movie_summary',  'vodi_template_streaming_medias', 125 );
            add_action( 'masvideos_after_single_movie_summary',  'vodi_template_single_movie_sidebar_close', 130 );
            add_action( 'masvideos_after_single_movie_summary',  'vodi_template_single_movie_row_wrap_close', 140 );

            add_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_rating_with_playlist_wrap_open', 8 );
            add_action( 'masvideos_single_movie_summary', 'vodi_template_loop_movie_avg_rating', 10 );
            add_action( 'masvideos_single_movie_summary', 'masvideos_template_button_movie_playlist', 15 );
            add_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_download_button', 16 );
            add_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_rating_with_playlist_wrap_close', 18 );
        }
        if( $style === 'v6' ) {
            remove_action( 'masvideos_before_single_movie_summary', 'vodi_breadcrumb', 4 );
            remove_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_head_wrap_open', 10 );
            remove_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_player_wrap_open', 30 );
            remove_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_movie', 40 );
            remove_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_player_wrap_close', 50 );
            remove_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_head_wrap_close', 70 );
            remove_action( 'masvideos_after_single_movie_summary', 'masvideos_related_movies', 20 );
            remove_action( 'masvideos_after_single_movie_summary', 'masvideos_template_single_movie_tabs', 30 );
            remove_action( 'masvideos_after_single_movie_summary', 'vodi_recommended_movies', 30 );

            remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_rating_with_playlist_wrap_open', 30 );
            remove_action( 'masvideos_single_movie_summary', 'vodi_template_loop_movie_avg_rating', 40 );
            remove_action( 'masvideos_single_movie_summary', 'masvideos_template_button_movie_playlist', 45 );
            remove_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_download_button', 45 );
            remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_rating_with_playlist_wrap_close', 50 );

            remove_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_head_info_wrap_open', 10 );
            remove_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_head_info_wrap_close', 55 );
            remove_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_player_container_wrap_close', 10 );

            add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_player_container_wrap_close', 90 );
            add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_row_wrap_open', 92 );
            add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_primary_open', 95 );
            add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_summary_inner_wrap_open', 110 );
            add_action( 'masvideos_single_movie_summary',           'vodi_template_single_movie_action_buttons', 1 );
            add_action( 'masvideos_single_movie_summary',        'vodi_template_single_movie_info_wrap_open', 2 );
            add_action( 'masvideos_single_movie_summary',        'masvideos_template_single_movie_short_desc', 25 );
            add_action( 'masvideos_single_movie_summary',        'masvideos_template_single_movie_featured_crew', 30 );
            add_action( 'masvideos_single_movie_summary',        'vodi_single_movie_sharing', 40 );
            add_action( 'masvideos_single_movie_summary',        'vodi_template_single_movie_info_wrap_close', 50 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_summary_inner_wrap_close', 11 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_casts', 12 );
            add_action( 'masvideos_after_single_movie_summary', 'masvideos_movie_related_videos', 13 );
            add_action( 'masvideos_after_single_movie_summary', 'masvideos_template_single_movie_gallery', 14 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_highlighted_comment', 14 );
            add_filter( 'masvideos_movie_attribute',  'vodi_template_single_movie_attribute', 10, 3 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_details', 15 );
            add_action( 'masvideos_after_single_movie_summary',  'comments_template', 18 );
            add_action( 'masvideos_after_single_movie_summary',  'vodi_template_single_movie_primary_close', 20 );
            add_action( 'masvideos_after_single_movie_summary',  'vodi_template_single_movie_sidebar_open', 30 );
            add_action( 'masvideos_after_single_movie_summary', 'masvideos_template_loop_movie_poster_open', 35 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_poster', 40 );
            add_action( 'masvideos_after_single_movie_summary', 'masvideos_template_loop_movie_poster_close', 45 );
            add_action( 'masvideos_after_single_movie_summary',  'vodi_template_streaming_medias', 48 );
            add_action( 'masvideos_after_single_movie_summary',  'vodi_template_single_movie_sidebar_close', 50 );
            add_action( 'masvideos_after_single_movie_summary',  'vodi_template_single_movie_row_wrap_close', 60 );
            add_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_rating_with_playlist_wrap_open', 8 );
            add_action( 'masvideos_single_movie_summary', 'vodi_template_loop_movie_avg_rating', 10 );
            add_action( 'masvideos_single_movie_summary', 'masvideos_template_button_movie_playlist', 15 );
            add_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_download_button', 16 );
            add_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_rating_with_playlist_wrap_close', 18 );

        }
        if( $style === 'v5' ) {
            remove_action( 'masvideos_before_single_movie_summary', 'vodi_breadcrumb', 4 );
            remove_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_player_container_wrap_open', 1 );
            remove_action( 'masvideos_after_single_movie_summary',  'vodi_template_single_movie_player_container_wrap_close', 10 );
            remove_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_head_wrap_open', 10 );
            remove_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_player_wrap_open', 30 );
            remove_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_movie', 40 );
            remove_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_player_wrap_close', 50 );
            remove_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_head_wrap_close', 70 );
            remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_short_desc', 25 );
            remove_action( 'masvideos_after_single_movie_summary', 'masvideos_related_movies', 20 );
            remove_action( 'masvideos_after_single_movie_summary', 'masvideos_template_single_movie_tabs', 30 );
            remove_action( 'masvideos_after_single_movie_summary', 'vodi_recommended_movies', 30 );

            add_action( 'masvideos_before_single_movie_summary', 'vodi_breadcrumb', 1 );
            add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_player_container_wrap_open', 2 );
            add_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_title', 3 );
            add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_action_buttons', 4 );
            add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_player_container_wrap_close', 90 );
            add_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_body_info_wrap_open', 55 );
            add_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_short_desc', 60 );
            add_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_sharing_with_tag_wrap_open', 65 );
            add_action( 'masvideos_single_movie_summary', 'masvideos_template_single_sharing', 70 );
            add_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_tags', 75 );
            add_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_sharing_with_tag_wrap_close', 80 );
            add_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_body_info_wrap_close', 90 );
            add_action( 'masvideos_after_single_movie_summary', 'masvideos_movie_related_videos', 30 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_movie_related_posts', 40 );
            add_filter( 'masvideos_gallery_thumbnail_size', 'vodi_template_gallery_thumbnail_size');
            add_filter( 'masvideos_movie_gallery_thumbnails_columns', 'vodi_template_movie_gallery_thumbnails_columns' );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_gallery_carousel', 40 );
            add_action( 'masvideos_template_single_movie_cast_end', 'vodi_template_single_movie_cast_short_desc' );
            add_action( 'masvideos_template_single_movie_crew_end', 'vodi_template_single_movie_crew_short_desc' );
            add_action( 'masvideos_after_single_movie_summary', 'masvideos_template_single_movie_cast_crew_tabs', 60 );
        }
        if( $style === 'v4' ) {
            remove_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_summary_open', 100 );
            remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_title', 5 );
            remove_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_head_info_wrap_open', 10 );
            remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_meta', 20 );
            remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_rating_with_playlist_wrap_open', 30 );
            remove_action( 'masvideos_single_movie_summary', 'vodi_template_loop_movie_avg_rating', 40 );
            remove_action( 'masvideos_single_movie_summary', 'masvideos_template_button_movie_playlist', 45 );
            remove_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_download_button', 45 );
            remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_rating_with_playlist_wrap_close', 50 );
            remove_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_head_info_wrap_close', 55 );
            remove_action( 'masvideos_after_single_movie_summary', 'masvideos_template_single_movie_summary_close', 10 );
            remove_action( 'masvideos_after_single_movie_summary', 'masvideos_related_movies', 20 );
            remove_action( 'masvideos_after_single_movie_summary', 'masvideos_template_single_movie_tabs', 30 );
            remove_action( 'masvideos_after_single_movie_summary', 'vodi_recommended_movies', 30 );

            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_info_left_wrap_open', 10 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_poster_open', 10 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_link_open', 20 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_poster', 30 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_link_close', 40 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_poster_close', 50 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_body_open', 60 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_title', 70 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_rating_with_playlist_wrap_open', 80 );
            remove_action( 'masvideos_single_movie_description_tab', 'vodi_template_loop_movie_avg_rating', 90 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_button_movie_playlist', 100);
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_rating_with_playlist_wrap_close', 110 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_meta', 120 );
            remove_action( 'masvideos_single_movie_description_tab', 'vodi_views_likes', 125 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_body_close', 140 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_info_left_wrap_close', 150 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_info_right_wrap_open', 160 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_sharing', 170 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_display_movie_attributes', 180 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_tags', 190 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_info_right_wrap_close', 200 );

            add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_primary_open', 5 );
            add_action( 'masvideos_before_single_movie_summary', 'masvideos_template_single_movie_before_head', 9 );

            add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_nav_wrap_open', 62 );
            add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_prev_navigation', 64 );
            add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_next_navigation', 66 );
            add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_nav_wrap_close', 68 );

            add_action( 'masvideos_after_single_movie_summary', 'masvideos_template_single_movie_tabs', 95 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_recommended_movies', 100 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_primary_close', 500 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_sidebar_open', 510 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_rating_playlist_open', 520 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_loop_movie_avg_rating', 530 );
            add_action( 'masvideos_after_single_movie_summary', 'masvideos_template_button_movie_playlist', 540);
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_download_button', 545);
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_rating_playlist_close', 550 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_sidebar_top_movies', 560 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_sidebar_banner', 570 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_sidebar_close', 600 );
        }
        if ( $style == 'v3' ) {
            remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_title', 5 );
            remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_meta', 20 );
            remove_action( 'masvideos_after_single_movie_summary', 'masvideos_related_movies', 20 );
            remove_action( 'masvideos_after_single_movie_summary', 'masvideos_template_single_movie_tabs', 30 );
            remove_action( 'masvideos_after_single_movie_summary', 'vodi_recommended_movies', 30 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_info_left_wrap_open', 10 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_poster_open', 10 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_link_open', 20 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_poster', 30 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_link_close', 40 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_poster_close', 50 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_body_open', 60 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_title', 70 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_rating_with_playlist_wrap_open', 80 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_avg_rating', 90 );
            remove_action( 'masvideos_single_movie_description_tab', 'vodi_template_loop_movie_avg_rating', 90 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_button_movie_playlist', 100);
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_rating_with_playlist_wrap_close', 110 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_meta', 120 );
            remove_action( 'masvideos_single_movie_description_tab', 'vodi_views_likes', 125 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_body_close', 140 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_info_left_wrap_close', 150 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_info_right_wrap_open', 160 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_sharing', 170 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_display_movie_attributes', 180 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_tags', 190 );
            remove_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_info_right_wrap_close', 200 );
            
            add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_player_container_wrap_top', 1 );
            add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_primary_content_open', 5 );
            add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_bg_image_wrap', 25 );
            add_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_meta_title_wrap_open', 10 );
            add_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_title', 15 );
            add_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_meta', 20 );
            add_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_meta_title_wrap_close', 25 );
            add_action( 'masvideos_single_movie_summary', 'vodi_views_likes', 75 );
            add_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_short_desc', 80 );
            add_action( 'masvideos_single_movie_summary', 'masvideos_template_single_sharing', 90 );
            add_action( 'masvideos_after_single_movie_summary', 'masvideos_template_single_movie_tabs', 95 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_recommended_movies', 98 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_primary_content_close', 100 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_player_container_wrap_bottom', 105 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_sidebar_open', 510 );
            add_action( 'masvideos_after_single_movie_summary', 'masvideos_template_loop_movie_poster', 520 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_sidebar_top_movies', 530 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_sidebar_banner', 540 );
            add_action( 'masvideos_after_single_movie_summary', 'vodi_template_single_movie_sidebar_close', 600 );
        } elseif ( $style === 'v2' ) {
           remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_title', 5 );
           remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_meta', 20 );
           remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_rating_with_playlist_wrap_open', 30 );
           remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_avg_rating', 40 );
           remove_action( 'masvideos_single_movie_summary', 'masvideos_template_button_movie_playlist', 45 );
           remove_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_download_button', 45 );
           remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_rating_with_playlist_wrap_close', 50 );
           remove_action( 'masvideos_after_single_movie_summary', 'masvideos_template_single_movie_tabs', 30 );
           add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_row_wrap_open',5 );
           add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_primary_open',6 );
           add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_primary_close',80 ); 
           add_action( 'masvideos_before_single_movie_summary', 'vodi_template_single_movie_sidebar_open',85 ); 
           add_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_sidebar_content', 2 );
           add_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_sidebar_close',60 );
           add_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_row_wrap_close',70 ); 
        } else {
        }
    }
}

if ( ! function_exists( 'vodi_template_single_movie_meta_title_wrap_open' ) ) {
    function vodi_template_single_movie_meta_title_wrap_open() {
        ?><div class="movie__info--head-inner"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_meta_title_wrap_close' ) ) {
    function vodi_template_single_movie_meta_title_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_row_wrap_open' ) ) {
    function vodi_template_single_movie_row_wrap_open() {
        ?><div class="single-movie__row row"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_row_wrap_close' ) ) {
    function vodi_template_single_movie_row_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_primary_open' ) ) {
    function vodi_template_single_movie_primary_open() {
        ?><div class="single-movie__content column"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_primary_close' ) ) {
    function vodi_template_single_movie_primary_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_primary_content_open' ) ) {
    function vodi_template_single_movie_primary_content_open() {
        ?><div class="single-movie__player"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_primary_content_close' ) ) {
    function vodi_template_single_movie_primary_content_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_sidebar_open' ) ) {
    function vodi_template_single_movie_sidebar_open() {
        ?><div class="single-movie__sidebar column"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_sidebar_close' ) ) {
    function vodi_template_single_movie_sidebar_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_rating_playlist_open' ) ) {
    function vodi_template_single_movie_rating_playlist_open() {
        ?><div class="single-movie__sidebar--rating-playlist"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_rating_playlist_close' ) ) {
    function vodi_template_single_movie_rating_playlist_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_sidebar_content' ) ) {
    function vodi_template_single_movie_sidebar_content() {
        do_action( 'vodi_single_movie_v2_sidebar_content' ); 
    }
}

if ( ! function_exists( 'vodi_template_single_movie_player_container_wrap_open' ) ) {
    function vodi_template_single_movie_player_container_wrap_open() {
        $bg_image = vodi_single_movie_player_background();
        ?><div class="single-movie__player-container stretch-full-width" <?php echo ! empty( $bg_image ) ? 'style="background-image: url(' . $bg_image . ');"' : ''; ?>><div class="single-movie__player-container--inner container"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_player_container_wrap_close' ) ) {
    function vodi_template_single_movie_player_container_wrap_close() {
        ?></div></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_bg_image_wrap' ) ) {
    function vodi_template_single_movie_bg_image_wrap() {
        $bg_image = vodi_single_movie_player_background();
        if( ! empty( $bg_image ) ) {
            ?><div class="single-movie-bg-image" <?php echo ! empty( $bg_image ) ? 'style="background-image: url(' . $bg_image . ');"' : ''; ?>></div><?php
        }
    }
}

if ( ! function_exists( 'vodi_template_single_movie_player_container_wrap_top' ) ) {
    function vodi_template_single_movie_player_container_wrap_top() {
        ?><div class="single-movie__content column"><div class="single-movie__content-inner"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_player_container_wrap_bottom' ) ) {
    function vodi_template_single_movie_player_container_wrap_bottom() {
        ?></div></div><?php
    }
}

if ( ! function_exists( 'vodi_single_movie_player_background' ) ) {
    function vodi_single_movie_player_background() {
        $bg_image_id = get_post_meta( get_the_ID(), '_vodi_movie_bg_image', true );

        if ( vodi_get_single_movie_style() !== 'v4' && $bg_image_id > 0 ) {
            return wp_get_attachment_image_url( $bg_image_id, 'full' );
        }

        return '';
    }
}

if ( ! function_exists( 'masvideos_template_single_movie_before_head' ) ) {
    function masvideos_template_single_movie_before_head() {
        do_action( 'vodi_single_movie_before_head' ); 
    }
}

if ( ! function_exists( 'vodi_template_single_movie_head_info_wrap_open' ) ) {
    function vodi_template_single_movie_head_info_wrap_open() {
        ?><div class="movie__info--head"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_head_info_wrap_close' ) ) {
    function vodi_template_single_movie_head_info_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_nav_wrap_open' ) ) {
    function vodi_template_single_movie_nav_wrap_open() {
        ?><div class="movie__player--arrows"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_nav_wrap_close' ) ) {
    function vodi_template_single_movie_nav_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_sidebar_head_info_wrap_open' ) ) {
    function vodi_template_single_movie_sidebar_head_info_wrap_open() {
        ?><div class="single-movie__sidebar--head-info"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_sidebar_head_info_wrap_close' ) ) {
    function vodi_template_single_movie_sidebar_head_info_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_single_movie_sharing' ) ) {
    function vodi_single_movie_sharing() {
        if ( is_movie() ) {
            ?><div class="movie__sharing vodi-sharing"><?php 
            if ( function_exists( 'A2A_SHARE_SAVE_add_to_content' ) ) {
                echo A2A_SHARE_SAVE_add_to_content( '' );
            } elseif ( function_exists( 'mashshare_filter_content' ) ) {
                echo mashshare_filter_content( '' );
            } elseif ( function_exists( 'vodi_show_jetpack_share' ) ) {
                vodi_show_jetpack_share();
            }
            ?></div><?php
        }
    }
}

if ( ! function_exists( 'vodi_template_single_movie_prev_navigation' ) ) {
    /**
     * Display navigation to previous post when applicable.
     */
    function vodi_template_single_movie_prev_navigation() {
        $prev_post = get_adjacent_post();
        $prev_post_link = get_permalink( $prev_post );
        if( ! empty( $prev_post_link ) ) {
            ?>
            <div class="movie__player--prev-movie">
                <a href="<?php echo esc_url( $prev_post_link ); ?>" class="movie__player--prev-movie__link">
                    <span class="movie__player--prev-movie__label">
                        <?php echo esc_html__( 'Previous Movie ', 'vodi' ); ?>
                    </span>
                </a>
            </div>
            <?php
        }
    }
}

if ( ! function_exists( 'vodi_template_single_movie_next_navigation' ) ) {
    /**
     * Display navigation to next post when applicable.
     */
    function vodi_template_single_movie_next_navigation() { 
        $next_post = get_adjacent_post( false, '', false );
        $next_post_link = get_permalink( $next_post );
        if( ! empty( $next_post_link ) ) {
            ?>
            <div class="movie__player--next-movie">
                <a href="<?php echo esc_url( $next_post_link ); ?>" class="movie__player--next-movie__link">
                    <span class="movie__player--next-movie__label">
                        <?php echo esc_html__( 'Next Movie ', 'vodi' ); ?>
                    </span>
                </a>
            </div>
            <?php
        }
    }
}

if ( ! function_exists( 'vodi_template_single_movie_sidebar_top_movies' ) ) {
    function vodi_template_single_movie_sidebar_top_movies() {
        the_widget( 'MasVideos_Movies_Widget', apply_filters( 'vodi_template_single_movie_sidebar_top_movies_instance', array( 
            'title'     => esc_html__( 'Top 5 List', 'vodi' ),
            'top_rated' => 1,
        ) ) );
    }
}

if ( ! function_exists( 'vodi_template_single_movie_sidebar_banner' ) ) {
    function vodi_template_single_movie_sidebar_banner() {
        $banner_image_id = get_post_meta( get_the_ID(), '_vodi_movie_banner_image', true );
        $banner_link = get_post_meta( get_the_ID(), '_vodi_movie_banner_link', true );
        $banner_content = apply_filters( 'vodi_movie_banner_content', '' );

        if( ! empty( $banner_image_id ) || ! empty( $banner_content ) ) {
            ?><div class="single-movie__sidebar--banner-image"><?php
                if( ! empty( $banner_image_id ) ) {
                    if( ! empty( $banner_link ) ) {
                        ?><a href="<?php echo esc_url( $banner_link ); ?>"><?php
                        echo wp_get_attachment_image( $banner_image_id, 'full' );
                        ?></a><?php
                    } else {
                        echo wp_get_attachment_image( $banner_image_id, 'full' );
                    }
                } else {
                    echo vodi_sanitize_textarea_iframe( $banner_content );
                }
            ?></div><?php
        }
    }
}

if ( ! function_exists( 'vodi_template_single_movie_download_button' ) ) {
    function vodi_template_single_movie_download_button() {
        if ( is_movie() && apply_filters( 'vodi_is_template_single_movie_download_button', false ) ) {
            global $movie;

            if ( $movie->get_movie_choice() == 'movie_file' ) {
                $download_url =  wp_get_attachment_url( $movie->get_movie_attachment_id() );
                $button_text = apply_filters( 'vodi_template_single_movie_download_button_text', sprintf( '%s %s', '<i class="far fa-arrow-alt-circle-down"></i>', esc_html__( 'Download', 'vodi' ) ) );
                ?><a href="<?php echo esc_url( $download_url ); ?>" class="movie-download-btn" download><?php echo wp_kses_post( $button_text ); ?></a><?php
            }
        }
    }
}

if ( ! function_exists( 'vodi_template_single_movie_head_info_wrap_open' ) ) {
    function vodi_template_single_movie_head_info_wrap_open() {
        ?><div class="movie__info--head"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_head_info_wrap_close' ) ) {
    function vodi_template_single_movie_head_info_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_related_movies_default_args' ) ) {
    function vodi_related_movies_default_args( $args ) {
        $args['limit'] = 8;
        $args['columns'] = 8;

        return $args;
    }
}
add_filter( 'masvideos_related_movies_default_args', 'vodi_related_movies_default_args' );

if ( ! function_exists( 'vodi_recommended_movies' ) ) {
    function vodi_recommended_movies() {
        do_action( 'vodi_recommended_movies_before' );
        masvideos_recommended_movies();
        do_action( 'vodi_recommended_movies_after' );
    }
}

if ( ! function_exists( 'vodi_play_source_text' ) ) {
    function vodi_play_source_text($text) {
        return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="35px"><image  x="0px" y="0px" width="35px" height="35px" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACMAAAAjCAMAAAApB0NrAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACClBMVEX///8qXKYqXqgrYKkrYqorZKwrZq0raK8rarArbLIrbrMrcLUrdbgrd7orebsre70rfb4rf8ArYqorZKwrZq0rf8ArgcErg8MqXqgrYKkrYqorg8MrhcQsh8UqXKYqXqgsh8UsiccqWqUqXKYsiccsi8gqWKQqWqUsi8gsjckqVqIqWKQsjcksj8sqVaEqVqIsj8sskMwqVaEskMwqU6AqVaEskMwsks0qU6Asks0qUZ8qU6Asks0slM4qUZ8slM4qUZ8slM4qUZ8slM4qUZ8slM4qUZ8slM4qU6AqU6AqVaEqVaEqVqIqWqUsi8gqXKYqXqgsh8UsiccqXqgrYKkrYqorg8Msh8UrYqorZq0rf8ArgcErg8MraK8rcLUrdbgrc7YraK8rarArbLIrbrMrcLUrdbgrd7orebsre70rfb4rZKwrZq0rf8ArgcErYKkrYqorg8MrhcQqXqgsh8UqXKYsiccqWqUsi8gqWKQsjckqVqIsj8sqVaGXtdj////W5PF8qdJDhcAskMzY4/DC1+tsoc81f74qU6Du8/n5+/2jxeFTlMksks37/P3a6PN9r9c5iMSx0OhQl8zQ4/FVnM/J3/AqUZ8slM7D3O7D2+1PmM39/f6kyORFkMnU5PJ4rNY0hcPu8/jw9fqav95PkcjW4vC40edjm8wxfb2SsdbQ4O93ptA/gr9MFIuTAAAAYHRSTlMAAAAAAAADQoW53/Dw37mFQwMWh+fnhxYGfPX1fQYmz88nP+/vP0L19kIn8PAnB8/QB3t8F/X2F4aHBOfoBEJFhYm4uODf8fHoh/Z80Pf3KNHQKAd99vYHF+npiBdD8fF0vQ+CAAAAAWJLR0QAiAUdSAAAAAd0SU1FB+MFFg8DAMHnUEEAAAF2SURBVDjLldRlV0JBEAbgsTuxxU4MLCzs7u7G7u5cu7u7O/6jF/CyC9wrOp+fs2d3duYFkJSauoamlraOrp6+gcjQyNjE1AyUijLmHIv6hsamZlFLa1t7h6WVtZKxsbXr7CJMd48910HeODr19imY/gFnF5K4ug0ymCF3D0w8vYYZzYg3jyY+vqMsZszPX0r4AeOsZiIwSGKCJ38xUyFiIgj91YSFUyZiWmZmEEKzc/NyZiESQBiFzSIS19LyCmmiYyB2FZs1iUHrG5uE2YqDeMJso5/a2d3DJgESCYNw7R/ITBIkMxt0eESbFEhlMeiYNmlwwmYQbU7ZzznD57Dd5/wC34f5XZdX18S7GPtzc3tH9ofs871UPDw+yfdZmI7Ns4S8vL4p/BdkYPNOiY/PL6V/B0Gm6vmBLNVzCPxs1fP8l72g9iuHxeTy/rWnAHn5DKagUD43iopLFEwpt0wpf8o5FYSprKpmyCgqx2qoHKsV1Snm2DfDMKyVe/jGtwAAAABJRU5ErkJggg==" /></svg>' . $text;
    }
}

if ( ! function_exists( 'vodi_template_single_movie_sharing_with_tag_wrap_open' ) ) {
    function vodi_template_single_movie_sharing_with_tag_wrap_open() {
        ?><div class="movie__sharing-with-tags"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_sharing_with_tag_wrap_close' ) ) {
    function vodi_template_single_movie_sharing_with_tag_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_body_info_wrap_open' ) ) {
    function vodi_template_single_movie_body_info_wrap_open() {
        ?><div class="movie__info--body"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_body_info_wrap_close' ) ) {
    function vodi_template_single_movie_body_info_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_info_wrap_open' ) ) {
    function vodi_template_single_movie_info_wrap_open() {
        ?><div class="movie__info"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_info_wrap_close' ) ) {
    function vodi_template_single_movie_info_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_info_action_button_wrap_open' ) ) {
    function vodi_template_single_movie_info_action_button_wrap_open() {
        ?><div class="movie__info--action-buttons"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_info_action_button_wrap_close' ) ) {
    function vodi_template_single_movie_info_action_button_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_poster' ) ) {
    /**
     * single movie poster.
     */
    function vodi_template_single_movie_poster() {
        echo masvideos_get_movie_thumbnail( 'masvideos_movie_large' );
    }
}

if ( ! function_exists( 'vodi_template_single_movie_summary_inner_wrap_open' ) ) {
    function vodi_template_single_movie_summary_inner_wrap_open() {
        ?><div class="summary__inner"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_summary_inner_wrap_close' ) ) {
    function vodi_template_single_movie_summary_inner_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_movie_related_posts' ) ) {

    /**
     * Output the recommended movies.
     *
     * @param array $args Provided arguments.
     */
    function vodi_movie_related_posts( $movie_id = false, $args = array() ) {
        global $movie;

        $movie_id = $movie_id ? $movie_id : $movie->get_id();

        if ( ! $movie_id ) {
            return;
        }

        $defaults = apply_filters( 'vodi_movie_related_posts_default_args', array(
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'orderby'               => 'post__in',
            'order'                 => 'asc',
            'limit'                 => 4,
            'columns'               => 4,
        ) );

        $args = wp_parse_args( $args, $defaults );

        $title = apply_filters( 'vodi_movie_related_posts_title', esc_html__( 'Find the Latest Blogs About This Film', 'vodi' ), $movie_id );

        $post_ids = array_filter( array_map( 'absint', (array) get_post_meta( get_the_ID(), '_vodi_movie_related_posts', true ) ) );

        if( ! empty( $post_ids ) ) {
            $args['post__in'] = $post_ids;

            $movie_related_posts = new WP_Query( $args );

            if ( $movie_related_posts->have_posts()) : ?>
                  <div class="movie__related-posts">
                        <?php echo sprintf( '<h2 class="movie__related-posts--title">%s</h2>', $title ); ?>
                        <div class="posts">
                            <?php while ( $movie_related_posts->have_posts() ) : $movie_related_posts->the_post(); ?>
                                <article class="post article">
                                    <?php
                                        vodi_post_featured_image(); ?>
                                        <header class="article__header"><?php 
                                              vodi_post_categories();
                                              do_action( 'vodi_post_header' ); 
                                        ?></header><?php
                                    ?>
                                </article>
                            <?php endwhile; ?>
                        </div>
                  </div>
            <?php endif;
            wp_reset_postdata();
        }
    }
}

if ( ! function_exists( 'vodi_template_single_movie_casts' ) ) {
    function vodi_template_single_movie_casts() {
        global $movie;
        $casts = $movie->get_cast();

        if( ! empty( $casts ) ) {
            $title = apply_filters( 'vodi_template_single_movie_casts_title', esc_html__( 'Stars', 'vodi' ), $movie, $casts );
            $carousel_args = apply_filters( 'vodi_template_single_movie_casts_carousel_args', array(
                'slidesToShow'          => 6,
                'slidesToScroll'        => 2,
                'dots'                  => false,
                'arrows'                => false,
                'autoplay'              => false,
                'infinite'              => false,
                'responsive' => array(
                    array(
                        'breakpoint'    => 768,
                        'settings'      => array(
                            'slidesToShow'      => 2,
                            'slidesToScroll'    => 1
                        )
                    ),
                    array(
                        'breakpoint'    => 992,
                        'settings'      => array(
                            'slidesToShow'      => 3,
                            'slidesToScroll'    => 1
                        )
                    ),
                    array(
                        'breakpoint'    => 1200,
                        'settings'      => array(
                            'slidesToShow'      => 4,
                            'slidesToScroll'    => 1
                        )
                    ),
                ),
            ) );

            $section_id = 'section-movies-carousel-casts-' . uniqid();

            ?>
            <section id="<?php echo esc_attr( $section_id ); ?>" class="single-movie-casts">
                <?php echo sprintf( '<h2 class="single-movie-casts--title">%s</h2>', $title ); ?>
                <div class="movie-casts" data-ride="vodi-slick-carousel" data-wrap=".movie-casts__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                    <div class="movie-casts__inner">
                        <?php
                        foreach( $casts as $cast ) :
                            $person = masvideos_get_person( $cast['id'] );
                            if( $person && is_a( $person, 'MasVideos_Person' ) ) :
                                ?>
                                <div class="movie-cast">
                                    <div class="person-image">
                                        <a href="<?php the_permalink( $person->get_ID() ); ?>">
                                            <?php echo masvideos_get_person_thumbnail( 'masvideos_movie_thumbnail', $person ); ?>
                                        </a>
                                    </div>
                                    <a href="<?php the_permalink( $person->get_ID() ); ?>">
                                        <h3 class="person-name"><?php echo esc_html( $person->get_name() ); ?></h3>
                                    </a>
                                    <div class="person-role"><?php echo esc_html( $cast['character'] ); ?></div>
                                </div>
                                <?php
                            endif;
                        endforeach;
                        ?>
                    </div>
                </div>
            </section>
            <?php
        }
    }
}

if ( ! function_exists( 'vodi_template_single_movie_details' ) ) {
    function vodi_template_single_movie_details() {
        global $movie;

        $attributes = $movie->get_attributes();
        $description = get_the_content();
        $attribute_title = apply_filters( 'vodi_single_movie_details_attribute_title', esc_html__( 'Details of Movie', 'vodi' ));
        $description_title = apply_filters( 'vodi_single_movie_details_description_title', esc_html__( 'Fun Facts of Movie', 'vodi' ));

        if ( ! empty ( $attributes ) || ! empty ( $description ) ) {
            ?>
            <section class="single-movie-details">
                <div class="single-movie-details__inner">
                    <?php if ( ! empty ( $attributes ) ) : ?>
                        <div class="single-movie-details--attributes">
                            <?php echo sprintf( '<h2 class="single-movie-details--attributes__title">%s</h2>', $attribute_title ); ?>
                            <?php masvideos_display_movie_attributes(); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ( ! empty ( $description ) ) : ?>
                    <div class="single-movie-details--description">
                        <?php echo sprintf( '<h2 class="single-movie-details--description__title">%s</h2>', $description_title ); ?>
                        <?php masvideos_template_single_movie_description(); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </section>
            <?php
        }
    }
}

if ( ! function_exists( 'vodi_template_comment_container_inner_wrap_open' ) ) {
    function vodi_template_comment_container_inner_wrap_open() {
        ?><div class="comment_container--inner"><?php
    }
}

if ( ! function_exists( 'vodi_template_comment_container_inner_wrap_close' ) ) {
    function vodi_template_comment_container_inner_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_movie_gallery_thumbnails_columns' ) ) {
    function vodi_template_movie_gallery_thumbnails_columns( $columns ) {
        return 1;
    }
}

if ( ! function_exists( 'vodi_template_gallery_thumbnail_size' ) ) {
    function vodi_template_gallery_thumbnail_size( $size ) {
        return 'full';
    }
}

if ( ! function_exists( 'vodi_template_single_movie_gallery_carousel' ) ) {
    function vodi_template_single_movie_gallery_carousel() {
        $carousel_args = apply_filters( 'vodi_template_single_movie_gallery_carousel_args', array(
            'slidesToShow'          => 1,
            'slidesToScroll'        => 1,
            'dots'                  => true,
            'arrows'                => false,
            'autoplay'              => false,
            'infinite'              => false,
            'responsive' => array(
                    array(
                        'breakpoint'    => 768,
                        'settings'      => array(
                            'slidesToShow'      => 1,
                            'slidesToScroll'    => 1
                        )
                    ),
                    array(
                        'breakpoint'    => 992,
                        'settings'      => array(
                            'slidesToShow'      => 1,
                            'slidesToScroll'    => 1
                        )
                    ),
                    array(
                        'breakpoint'    => 1200,
                        'settings'      => array(
                            'slidesToShow'      => 1,
                            'slidesToScroll'    => 1
                        )
                    ),
                ),
        ) );
        ?>
        <div class="movie-gallery-carousel" data-ride="vodi-slick-carousel" data-wrap=".masvideos-movie-gallery__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
            <div class="movie-gallery-carousel__inner">
                <?php masvideos_template_single_movie_gallery(); ?>
            </div>
        </div>
        <?php
    }
}

if ( ! function_exists( 'vodi_template_single_movie_action_buttons' ) ) {
    function vodi_template_single_movie_action_buttons() {
        global $movie;
        $movie_id = $movie->get_ID();
        $ticket_button_text =  get_post_meta( $movie_id, '_vodi_movie_buy_ticket_text', true );
        $ticket_button_link = get_post_meta( $movie_id, '_vodi_movie_buy_ticket_link', true );
        $trailer_button_text = get_post_meta( $movie_id, '_vodi_movie_play_trailer_text', true );
        $trailer_button_link = get_post_meta( $movie_id, '_vodi_movie_play_trailer_link', true );
        $watch_button_text = apply_filters( 'vodi_single_movie_watch_button_text', esc_html__( 'Watch Now', 'vodi' ) );
        $output_content = '';

        if ( ( $movie->get_movie_choice() == 'movie_url' ) && $movie->get_movie_is_affiliate_link() ) {
            if( ! empty ( $movie->get_movie_url_link() ) && ! empty( $watch_button_text ) ) {
                ob_start();
                ?><a href="<?php echo esc_url( $movie->get_movie_url_link() ); ?>" class="movie-actions--watch-now movie-affiliate-link" target="_blank">
                    <?php echo esc_html( $watch_button_text ); ?>
                </a><?php
                $output_content = ob_get_clean();
            }
        } elseif( ! empty( masvideos_get_the_movie( $movie ) ) ) {
            ob_start();
            ?><a data-fancybox data-src="#hidden-movie-content-<?php echo esc_attr( $movie_id ); ?>" class="single-movie-popup-btn movie-actions--watch-now" href="javascript:;">
                <?php echo esc_html( $watch_button_text ); ?>
            </a>
            <div class="single-movie-popup" id="hidden-movie-content-<?php echo esc_attr( $movie_id ); ?>">
                  <div class="movie__player">
                        <?php masvideos_the_movie( $movie ); ?>
                  </div>
            </div><?php
            $output_content = ob_get_clean();
        }

        if ( ( ! empty( $ticket_button_text ) && ! empty( $ticket_button_link ) ) || ( ! empty( $trailer_button_text ) && ! empty( $trailer_button_link ) ) || ! empty( $output_content ) ) :
            ?>
            <div class="single-movie__actions">
                <?php if ( ! empty( $output_content ) ) {
                    echo $output_content;
                } ?>
                <?php if ( ! empty( $ticket_button_text ) && ! empty( $ticket_button_link ) ) : ?>
                    <a href="<?php echo esc_url( $ticket_button_link ); ?>" class="movie-actions--get-tickets" tabindex="0" target="_blank">
                        <?php echo esc_html( $ticket_button_text ); ?>
                    </a>
                <?php endif; ?>
                <?php if ( ! empty( $trailer_button_text ) && ! empty( $trailer_button_link ) ) : ?>
                    <a href="<?php echo esc_url( $trailer_button_link ); ?>" class="movie-actions--play-trailers" tabindex="0" target="_blank">
                        <?php echo esc_html( $trailer_button_text ); ?>
                    </a>
                <?php endif; ?>
            </div>
            <?php
        endif;
    }
}

if ( ! function_exists( 'vodi_template_single_movie_attribute' ) ) {
    function vodi_template_single_movie_attribute( $content, $attribute, $values ) {
        return '<span>' . wp_kses_post( implode( '</span><span> ', $values ) ) . '</span>';
    }
}

if ( ! function_exists( 'vodi_template_related_movies_by_person' ) ) {
    function vodi_template_related_movies_by_person() {
        global $movie;

        $args = apply_filters( 'vodi_template_related_movies_by_person_default_args', array(
            'limit'          => 2,
            'columns'        => 2,
            'orderby'        => 'rand',
            'order'          => 'desc',
        ) );

        $type = ( 'cast' == get_post_meta( get_the_ID(), '_vodi_related_movies_by_person_type', true ) ) ? 'cast' : 'crew';
        $title_label = get_post_meta( get_the_ID(), '_vodi_related_movies_by_person_title', true );
        $title_label = empty( $title_label ) ? esc_html__( 'Known For', 'vodi' ) : $title_label;
        $title_name = '';

        $related_movie_ids = array();

        if( $type == 'crew' ) {
            $movie_crew             = $movie->get_crew();
            $person_id              = isset( $movie_crew[0]['id'] ) ? absint( $movie_crew[0]['id'] ) : 0;
            $person_category_id     = isset( $movie_crew[0]['category'] ) ? absint( $movie_crew[0]['category'] ) : 0;
            $person                 = masvideos_get_person( $person_id );

            if( $person && is_a( $person, 'MasVideos_Person' ) ) {
                $title_name = $person->get_name();
                $person_crew_movie_ids  = $person->get_movie_crew();
                if ( ( $key = array_search( get_the_ID(), $person_crew_movie_ids ) ) !== false ) {
                    unset( $person_crew_movie_ids[$key] );
                }

                if( ! empty( $person_crew_movie_ids ) ) {
                    if( apply_filters( 'vodi_template_related_movies_by_person_force_category_id', true ) && $person_category_id ) {
                        foreach( $person_crew_movie_ids as $crew_movie_id ) {
                            $related_movie = masvideos_get_movie( $crew_movie_id );
                            if( $related_movie && is_a( $related_movie, 'MasVideos_Movie' ) ) {
                                $movie_crew = $related_movie->get_crew();
                                $found_keys = array_keys( array_column( $movie_crew, 'id' ), $person->get_ID() );

                                foreach( $found_keys as $found_key ) {
                                    if( $found_key !== false ) {
                                        if( $movie_crew[$found_key]['category'] == $person_category_id ) {
                                            $related_movie_ids[] = $related_movie->get_ID();
                                            break;
                                        }
                                    }
                                }
                            }

                            if( count( $related_movie_ids ) > $args['limit'] ) {
                                break;
                            }
                        }
                    } else {
                        $related_movie_ids = $person_crew_movie_ids;
                    }
                }
            }
        } else {
            $movie_cast             = $movie->get_cast();
            $person_id              = isset( $movie_cast[0]['id'] ) ? absint( $movie_cast[0]['id'] ) : 0;
            $person                 = masvideos_get_person( $person_id );

            if( $person && is_a( $person, 'MasVideos_Person' ) ) {
                $title_name = $person->get_name();
                $related_movie_ids = $person->get_movie_cast();
                if ( ( $key = array_search( get_the_ID(), $related_movie_ids ) ) !== false ) {
                    unset( $related_movie_ids[$key] );
                }
            }
        }

        $title = sprintf( '%s %s', $title_label, $title_name );
        $title = apply_filters( 'vodi_template_related_movies_by_person_title', $title, $title_name );
        $args['ids'] = implode( ',', $related_movie_ids );

        if( ! empty( $related_movie_ids ) ) {
            echo '<section class="movie_related__by-person">';
                echo '<div class="movie_related__by-person--inner">';
                    echo sprintf( '<h2 class="movie_related__by-person--title">%s</h2>', $title );
                    echo MasVideos_Shortcodes::movies( $args );
                echo '</div>';
            echo '</section>';
        }
    }
}

if ( ! function_exists( 'vodi_template_single_movie_related_playlist_movies' ) ) {
    /**
     * Single movie page related playlist movies.
     *
     * @since  1.0.0
     */
    function vodi_template_single_movie_related_playlist_movies() {
        global $movie;
        $movie_id = $movie->get_id();

        $movie_playlist_id = isset( $_GET['movie_playlist_id'] ) ? absint( $_GET['movie_playlist_id'] ) : 0;

        if( $movie_playlist_id > 0 ) {
            $movies_ids = masvideos_single_movie_playlist_movies( $movie_playlist_id );
            $title = apply_filters( 'vodi_template_single_movie_movies_playlist_title', get_the_title( $movie_playlist_id ), $movie_playlist_id );
            $count_info = apply_filters( 'vodi_template_single_movie_movies_playlist_count', count( $movies_ids ) . esc_html__( ' movies', 'vodi' ), $movie_playlist_id );

            if( ! empty( $movies_ids ) ) {
                $filtered_movies_ids = $movies_ids;

                if ( ( $current_movie_key = array_search( $movie_id, $filtered_movies_ids ) ) !== false ) {
                    unset( $filtered_movies_ids[$current_movie_key] );
                }

                $args = apply_filters( 'vodi_template_single_movie_movies_playlist_args', array(
                    'limit'          => 5,
                    'columns'        => 5,
                    'orderby'        => 'rand',
                    'order'          => 'desc',
                    'ids'            => implode( ",", $filtered_movies_ids )
                ) );
                ?>
                <div class="single-movie__related-playlist-movies">
                    <div class="single-movie__related-playlist-movies--flex-header">
                        <?php
                            echo wp_kses_post( sprintf( '<h2 class="single-movie__related-playlist-movies--title">%s</h2>', $title ) );
                            echo wp_kses_post( sprintf( '<a href="%s" class="single-movie__related-playlist-movies--count">%s</a>', get_permalink( $movie_playlist_id ), $count_info ) );
                        ?>
                    </div>
                    <div class="single-movie__related-playlist-movies--content" data-simplebar>
                        <?php masvideos_template_single_movie_playlist_movies( $movie_playlist_id, $args ); ?>
                    </div>
                </div>
                <?php
            }
        } else {
            $title = apply_filters( 'vodi_template_single_movie_prev_next_movies_title', esc_html__( "Up Next", 'vodi' ) );
            $prev_movie_ids = vodi_get_previous_post_ids();
            $next_movie_ids = vodi_get_next_post_ids();
            $movie_ids = array_merge( $prev_movie_ids, $next_movie_ids );

            if( ! empty( $movie_ids ) ) {
                $args = apply_filters( 'vodi_template_single_movie_prev_next_movies_args', array(
                    'limit'          => -1,
                    'columns'        => 6,
                    'orderby'        => 'rand',
                    'order'          => 'desc',
                    'ids'            => implode( ",", $movie_ids )
                ) );

                ?>
                <div class="single-movie__prev-next-movies">
                    <div class="single-movie__prev-next-movies--flex-header">
                        <?php echo wp_kses_post( sprintf( '<h2 class="single-movie__prev-next-movies--title">%s</h2>', $title ) ); ?>
                    </div>
                    <div class="single-movie__prev-next-movies--content" data-simplebar>
                        <?php echo MasVideos_Shortcodes::movies( $args ); ?>
                    </div>
                </div>
                <?php
            }
        }
    }
}

if ( ! function_exists( 'masvideos_template_single_movie_featured_crew' ) ) {
    function masvideos_template_single_movie_featured_crew() {
        global $movie;
        $crew = $movie->get_crew();

        if( ! empty( $crew ) ) {
            $featured_crew_limit = apply_filters( 'vodi_template_single_movie_featured_crew_limit', 3 );

            ?>
            <div class="movie-featured-crew">
                <?php
                    for( $i = 0; $i < min( $featured_crew_limit, count( $crew ) ); $i++ ) :
                        $person = masvideos_get_person( $crew[$i]['id'] );
                        if( $person && is_a( $person, 'MasVideos_Person' ) ) :
                            ?>
                            <div class="movie-crew">
                                <a href="<?php the_permalink( $person->get_ID() ); ?>">
                                    <h3 class="person-name"><?php echo esc_html( $person->get_name() ); ?></h3>
                                </a>
                                <div class="person-role"><?php echo esc_html( $crew[$i]['job'] ); ?></div>
                            </div>
                            <?php
                        endif;
                    endfor;
                ?>
            </div>
            <?php
        }
    }
}

if ( ! function_exists( 'vodi_template_single_movie_highlighted_comment' ) ) {
    function vodi_template_single_movie_highlighted_comment() {
        global $movie;
        $highlighted_comment_id = get_post_meta( $movie->get_ID(), '_vodi_movie_highlighted_comment', true );
        $title = apply_filters( 'vodi_template_single_movie_highlighted_comment_title', esc_html__( 'Our Review', 'vodi' ));

        if( ! empty( $highlighted_comment_id ) ) {
            $comment = get_comment( $highlighted_comment_id );
            ?>
            <div class="single-movie-highlighted-comment">
                <?php echo sprintf( '<h2 class="single-movie-highlighted-comment--title">%s</h2>', $title ); ?>
                <ol class="commentlist">
                    <?php masvideos_movie_comments( $comment , array(), '' ); ?></li>
                </ol>
            </div>
            <?php
        }
    }
}

if ( ! function_exists( 'vodi_template_streaming_medias' ) ) {
    function vodi_template_streaming_medias() {
        global $movie;
        $sources = $movie->get_sources();
        if( !empty( $sources ) && is_array( $sources ) ) {
            ?><ul class="movie__streaming-medias"><?php
                foreach ( $sources as $source ) {
                    $source_content = ( $source['choice'] == 'movie_url' ) ? $source['link'] : $source['embed_content'];

                    if( isset( $source['is_affiliate'] ) && $source['is_affiliate'] && ! empty( $source_content ) ) {
                        ?><li><?php echo apply_filters( 'the_content', $source_content ); ?></li><?php
                    } elseif( ! empty( $source_content ) ) {
                        ?>
                        <li>
                            <a  data-fancybox data-src="#movie-source-<?php echo esc_attr( $source['position'] ); ?>" class="movie-actions--watch-now" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="35px" style="margin-right: 8px;"><image  x="0px" y="0px" width="35px" height="35px" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACMAAAAjCAMAAAApB0NrAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACClBMVEX///8qXKYqXqgrYKkrYqorZKwrZq0raK8rarArbLIrbrMrcLUrdbgrd7orebsre70rfb4rf8ArYqorZKwrZq0rf8ArgcErg8MqXqgrYKkrYqorg8MrhcQsh8UqXKYqXqgsh8UsiccqWqUqXKYsiccsi8gqWKQqWqUsi8gsjckqVqIqWKQsjcksj8sqVaEqVqIsj8sskMwqVaEskMwqU6AqVaEskMwsks0qU6Asks0qUZ8qU6Asks0slM4qUZ8slM4qUZ8slM4qUZ8slM4qUZ8slM4qUZ8slM4qU6AqU6AqVaEqVaEqVqIqWqUsi8gqXKYqXqgsh8UsiccqXqgrYKkrYqorg8Msh8UrYqorZq0rf8ArgcErg8MraK8rcLUrdbgrc7YraK8rarArbLIrbrMrcLUrdbgrd7orebsre70rfb4rZKwrZq0rf8ArgcErYKkrYqorg8MrhcQqXqgsh8UqXKYsiccqWqUsi8gqWKQsjckqVqIsj8sqVaGXtdj////W5PF8qdJDhcAskMzY4/DC1+tsoc81f74qU6Du8/n5+/2jxeFTlMksks37/P3a6PN9r9c5iMSx0OhQl8zQ4/FVnM/J3/AqUZ8slM7D3O7D2+1PmM39/f6kyORFkMnU5PJ4rNY0hcPu8/jw9fqav95PkcjW4vC40edjm8wxfb2SsdbQ4O93ptA/gr9MFIuTAAAAYHRSTlMAAAAAAAADQoW53/Dw37mFQwMWh+fnhxYGfPX1fQYmz88nP+/vP0L19kIn8PAnB8/QB3t8F/X2F4aHBOfoBEJFhYm4uODf8fHoh/Z80Pf3KNHQKAd99vYHF+npiBdD8fF0vQ+CAAAAAWJLR0QAiAUdSAAAAAd0SU1FB+MFFg8DAMHnUEEAAAF2SURBVDjLldRlV0JBEAbgsTuxxU4MLCzs7u7G7u5cu7u7O/6jF/CyC9wrOp+fs2d3duYFkJSauoamlraOrp6+gcjQyNjE1AyUijLmHIv6hsamZlFLa1t7h6WVtZKxsbXr7CJMd48910HeODr19imY/gFnF5K4ug0ymCF3D0w8vYYZzYg3jyY+vqMsZszPX0r4AeOsZiIwSGKCJ38xUyFiIgj91YSFUyZiWmZmEEKzc/NyZiESQBiFzSIS19LyCmmiYyB2FZs1iUHrG5uE2YqDeMJso5/a2d3DJgESCYNw7R/ITBIkMxt0eESbFEhlMeiYNmlwwmYQbU7ZzznD57Dd5/wC34f5XZdX18S7GPtzc3tH9ofs871UPDw+yfdZmI7Ns4S8vL4p/BdkYPNOiY/PL6V/B0Gm6vmBLNVzCPxs1fP8l72g9iuHxeTy/rWnAHn5DKagUD43iopLFEwpt0wpf8o5FYSprKpmyCgqx2qoHKsV1Snm2DfDMKyVe/jGtwAAAABJRU5ErkJggg==" /></svg>
                                <strong><?php echo esc_html( $source['name'] . ( $source['player'] ? ' ( ' . $source['player'] . ' )' : ( $source['quality'] ? ' ( ' . $source['quality'] . ' )': '' ) ) ); ?></strong>
                            </a>
                            <div class="single-movie-popup" style="display: none;" id="movie-source-<?php echo esc_attr( $source['position'] ); ?>">
                                <?php echo apply_filters( 'the_content', $source_content ); ?>
                            </div>
                        </li>
                        <?php
                    }
                }
            ?></ul><?php
        }
    }
}

if ( ! function_exists( 'vodi_template_single_movie_cast_short_desc' ) ) {
    function vodi_template_single_movie_cast_short_desc( $cast ) {
        $person = masvideos_get_person( $cast['id'] );
        if( $person && is_a( $person, 'MasVideos_Person' ) ) {
            $short_description = apply_filters( 'masvideos_template_single_person_short_desc', $person->get_short_description() );

            if ( ! $short_description ) {
                return;
            }

            ?>
            <div class="single-person__short-description">
                <?php echo '<div>' . $short_description . '</div>'; ?>
            </div>
            <?php
        }
    }
}

if ( ! function_exists( 'vodi_template_single_movie_crew_short_desc' ) ) {
    function vodi_template_single_movie_crew_short_desc( $crew ) {
        $person = masvideos_get_person( $crew['id'] );
        if( $person && is_a( $person, 'MasVideos_Person' ) ) {
            $short_description = apply_filters( 'masvideos_template_single_person_short_desc', $person->get_short_description() );

            if ( ! $short_description ) {
                return;
            }

            ?>
            <div class="single-person__short-description">
                <?php echo '<div>' . $short_description . '</div>'; ?>
            </div>
            <?php
        }
    }
}

if ( ! function_exists( 'vodi_template_single_movie_tmdb_rating' ) ) {
    /**
     * Movie tmdb ratings in the movie single.
     */
    function vodi_template_single_movie_tmdb_rating() {
        global $movie;

        if( is_movie() ) {
            $tmdb_rating = get_post_meta( $movie->get_ID(), 'vote_average', true );

            if( ! empty ( $tmdb_rating ) ) {
                ?>
                <span class="movie__meta--tmdb-rating">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 160.02 174.22" width="15px" style="margin-right: 5px;">
                        <defs><style>.cls-1{fill:#01d277;}</style></defs>
                        <title>Stacked_Blue</title>
                        <path class="cls-1" d="M2868.25,2996c15.29,0,25.63-10.34,25.63-25.63v-107.7c0-15.29-10.34-25.63-25.63-25.63H2759.5c-15.29,0-25.63,10.34-25.63,25.63v148.58L2747,2996h0V2862.67a12.5,12.5,0,0,1,12.48-12.48h108.75a12.5,12.5,0,0,1,12.48,12.48v107.7a12.5,12.5,0,0,1-12.48,12.48H2777L2763.86,2996l-0.08-.1" transform="translate(-2733.87 -2837.04)"/>
                        <path class="cls-1" d="M2790.55,2920.27h-12.32v41.36h12.32C2818.08,2961.63,2818.08,2920.27,2790.55,2920.27Zm0,33.09h-4v-24.82h4C2806.63,2928.54,2806.63,2953.35,2790.55,2953.35Z" transform="translate(-2733.87 -2837.04)"/>
                        <polygon class="cls-1" points="54.28 75.41 62.55 75.41 62.55 42.32 72.84 42.32 72.84 34.11 43.98 34.11 43.98 42.32 54.28 42.32 54.28 75.41"/>
                        <polygon class="cls-1" points="94.98 52.27 80.67 34.11 78.01 34.11 78.01 76.1 86.4 76.1 86.4 53.02 94.98 64.13 103.57 53.02 103.51 76.1 111.9 76.1 111.9 34.11 109.29 34.11 94.98 52.27"/>
                        <path class="cls-1" d="M2842.79,2940.95c2.6-1.79,3.7-5,3.82-8.16,0.17-7.29-4.4-12.55-11.74-12.55H2818.5v41.42h16.37a12.3,12.3,0,0,0,12.2-12.44A10,10,0,0,0,2842.79,2940.95Zm-16-12.44h7.35c2.37,0,3.82,1.85,3.82,4.16a3.87,3.87,0,0,1-3.82,4.17h-7.35v-8.33Zm7.35,24.87h-7.35v-8.27h7.35a4.06,4.06,0,0,1,4.16,4.11A4.11,4.11,0,0,1,2834.18,2953.38Z" transform="translate(-2733.87 -2837.04)"/>
                    </svg>
                    <?php echo sprintf( '<span class="movie__ratings--rating"><span class="rating">%s</span> / <span class="out-of">10</span></span>',$tmdb_rating ); ?>
                    <svg class="vodi-svg" width="15px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 39" style="vertical-align:top;">
                        <title>star</title>
                        <path fill-rule="evenodd" style="fill: #fec02c;" d="M19.633,-0.000 C21.509,0.035 21.530,1.174 22.167,2.414 C23.329,4.679 24.406,7.067 25.572,9.338 C25.853,9.886 26.431,11.640 26.918,11.834 C27.486,12.203 29.345,12.109 30.165,12.316 C32.170,12.825 34.489,12.860 36.500,13.364 C37.516,13.618 38.689,13.413 39.430,13.927 C39.689,14.107 39.770,14.504 39.984,14.732 C40.047,16.499 39.096,16.843 38.163,17.792 C36.473,19.509 34.784,21.227 33.095,22.944 C32.585,23.462 31.092,24.543 31.036,25.359 C31.423,25.951 31.307,27.455 31.511,28.258 C32.138,30.727 32.213,33.522 32.857,35.987 C33.142,37.078 33.016,38.241 32.303,38.724 C31.108,39.533 29.632,38.193 28.819,37.758 C26.695,36.623 24.601,35.624 22.483,34.457 C21.979,34.179 20.607,33.178 20.108,33.088 C19.748,33.023 18.163,34.107 17.812,34.296 C15.557,35.505 13.340,36.640 11.080,37.839 C10.548,38.120 9.180,39.226 8.309,38.966 C6.955,38.558 6.874,36.993 7.280,35.423 C7.716,33.733 7.697,31.880 8.151,30.109 C8.527,28.642 8.907,26.529 9.022,24.957 C8.092,24.344 7.202,23.107 6.408,22.300 C4.760,20.625 3.059,18.990 1.340,17.389 C0.646,16.742 -0.578,15.515 0.311,14.249 C0.915,13.388 2.364,13.656 3.557,13.364 C6.678,12.599 10.114,12.468 13.298,11.834 C14.186,9.747 15.306,7.711 16.307,5.716 C16.954,4.426 17.496,3.163 18.128,1.931 C18.334,1.531 18.358,1.093 18.603,0.724 C18.845,0.362 19.299,0.273 19.633,-0.000 Z">
                        </path>
                    </svg>
                </span>
                <?php
            }
        }
    }
}

if ( ! function_exists( 'vodi_template_single_movie_run_time' ) ) {
    /**
     * Movie run time in the movie single.
     */
    function vodi_template_single_movie_run_time() {
        global $movie;

        if( is_movie() ) {
            $run_time = get_post_meta( $movie->get_ID(), '_movie_run_time', true );

            if( ! empty( $run_time ) ) {
                ?><span class="movie__meta--movie-run-time"><?php
                    echo sprintf( "%s%s", $run_time, ctype_digit( $run_time ) ? esc_html__( ' min', 'vodi' ) : '' );
                ?></span><?php
            }
        }
    }
}

if ( ! function_exists( 'vodi_template_single_movie_censor_rating' ) ) {
    /**
     * Movie censor ratings in the movie single.
     */
    function vodi_template_single_movie_censor_rating() {
        global $movie;

        if( is_movie() ) {
            $censor_rating = get_post_meta( $movie->get_ID(), '_movie_censor_rating', true );
            if( ! empty( $censor_rating ) ) {
                ?><span class="movie__meta--censor-rating"><?php
                    echo esc_html( $censor_rating );
                ?></span><?php
            }
        }
    }
}
