<?php
/**
 * Single Hooks
 */

remove_action( 'masvideos_after_single_movie_summary', 'masvideos_movie_related_videos', 30 );
remove_action( 'masvideos_after_single_movie_summary', 'masvideos_template_single_movie_cast_crew_tabs', 30 );
remove_action( 'masvideos_after_single_movie_summary', 'comments_template', 30 );
remove_action( 'masvideos_after_single_movie_summary', 'masvideos_recommended_movies', 30 );
remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_short_desc', 25 );
remove_action( 'masvideos_single_movie_summary', 'masvideos_template_single_movie_avg_rating', 40 );
remove_action( 'masvideos_after_single_movie_summary', 'masvideos_template_single_movie_gallery', 30 );

add_action( 'vodi_content_top', 'vodi_toggle_single_movie_breadcrumb', 5 );
add_action( 'masvideos_before_single_movie', 'vodi_toggle_single_movie_hooks', 10 );
add_action( 'masvideos_share', 'vodi_single_movie_sharing', 10 );

add_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_head_info_wrap_open', 10 );

add_action( 'masvideos_single_movie_summary', 'vodi_template_loop_movie_avg_rating', 40 );
add_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_download_button', 45 );
add_action( 'masvideos_single_movie_summary', 'vodi_template_single_movie_head_info_wrap_close', 55 );

add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_info_left_wrap_open', 10 );
add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_poster_open', 10 );
add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_link_open', 20 );
add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_poster', 30 );
add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_link_close', 40 );
add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_poster_close', 50 );
add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_body_open', 60 );
add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_title', 70 );
add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_rating_with_playlist_wrap_open', 80 );
add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_button_movie_playlist', 100);
add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_rating_with_playlist_wrap_close', 110 );
add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_meta', 120 );
add_action( 'masvideos_single_movie_description_tab', 'vodi_views_likes', 125 );
add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_loop_movie_body_close', 140 );
add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_info_left_wrap_close', 150 );
add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_info_right_wrap_open', 160 );
add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_sharing', 170 );
add_action( 'masvideos_single_movie_description_tab', 'masvideos_template_single_movie_info_right_wrap_close', 200 );

add_action( 'masvideos_after_single_movie_summary', 'vodi_recommended_movies', 30 );
add_action( 'masvideos_single_movie_description_tab', 'vodi_template_loop_movie_avg_rating', 90 );

add_action( 'vodi_single_movie_before_head', 'vodi_template_single_movie_head_info_wrap_open', 10 );
add_action( 'vodi_single_movie_before_head', 'masvideos_template_loop_movie_poster_open', 20 );
add_action( 'vodi_single_movie_before_head', 'masvideos_template_loop_movie_link_open', 30 );
add_action( 'vodi_single_movie_before_head', 'masvideos_template_loop_movie_poster', 40 );
add_action( 'vodi_single_movie_before_head', 'masvideos_template_loop_movie_link_close', 50 );
add_action( 'vodi_single_movie_before_head', 'masvideos_template_loop_movie_poster_close', 60 );
add_action( 'vodi_single_movie_before_head', 'masvideos_template_loop_movie_body_open', 70 );
add_action( 'vodi_single_movie_before_head', 'masvideos_template_single_movie_genres', 75 );
add_action( 'vodi_single_movie_before_head', 'masvideos_template_loop_movie_link_open', 80 );
add_action( 'vodi_single_movie_before_head', 'masvideos_template_loop_movie_title', 90 );
add_action( 'vodi_single_movie_before_head', 'masvideos_template_loop_movie_link_close', 100 );
add_action( 'vodi_single_movie_before_head', 'vodi_views_likes', 105 );
add_action( 'vodi_single_movie_before_head', 'masvideos_template_single_movie_short_desc', 110 );
add_action( 'vodi_single_movie_before_head', 'masvideos_template_single_sharing', 120 );
add_action( 'vodi_single_movie_before_head', 'masvideos_template_loop_movie_body_close', 130 );
add_action( 'vodi_single_movie_before_head', 'vodi_template_single_movie_head_info_wrap_close', 140 );

add_action( 'vodi_single_movie_v2_sidebar_content', 'vodi_template_single_movie_sidebar_head_info_wrap_open', 10 );
add_action( 'vodi_single_movie_v2_sidebar_content', 'masvideos_template_loop_movie_poster_open', 20 );
add_action( 'vodi_single_movie_v2_sidebar_content', 'masvideos_template_loop_movie_poster', 30 );
add_action( 'vodi_single_movie_v2_sidebar_content', 'masvideos_template_loop_movie_poster_close', 40 );
add_action( 'vodi_single_movie_v2_sidebar_content', 'masvideos_template_loop_movie_body_open', 50 );
add_action( 'vodi_single_movie_v2_sidebar_content', 'masvideos_template_loop_movie_title', 60 );
add_action( 'vodi_single_movie_v2_sidebar_content', 'masvideos_template_single_movie_meta', 70 );
add_action( 'vodi_single_movie_v2_sidebar_content', 'vodi_views_likes', 75 );
add_action( 'vodi_single_movie_v2_sidebar_content', 'masvideos_template_loop_movie_body_close', 80 );
add_action( 'vodi_single_movie_v2_sidebar_content', 'vodi_template_single_movie_sidebar_head_info_wrap_close', 90 );

add_action( 'vodi_single_movie_v2_sidebar_content', 'masvideos_template_single_movie_rating_with_playlist_wrap_open', 110 );
add_action( 'vodi_single_movie_v2_sidebar_content', 'vodi_template_loop_movie_avg_rating', 120 );
add_action( 'vodi_single_movie_v2_sidebar_content', 'masvideos_template_button_movie_playlist', 130);
add_action( 'vodi_single_movie_v2_sidebar_content', 'vodi_template_single_movie_download_button', 135 );
add_action( 'vodi_single_movie_v2_sidebar_content', 'masvideos_template_single_movie_rating_with_playlist_wrap_close', 140 );
add_action( 'vodi_single_movie_v2_sidebar_content', 'masvideos_template_single_movie_description', 150 );
add_action( 'vodi_single_movie_v2_sidebar_content', 'masvideos_template_single_sharing', 160 );

add_filter( 'masvideos_movie_play_source_text', 'vodi_play_source_text', 10 );
add_filter( 'masvideos_episode_play_source_text', 'vodi_play_source_text', 10 );

add_action( 'masvideos_movie_review_before', 'vodi_template_comment_container_inner_wrap_open', 5 );
add_action( 'masvideos_movie_review_after', 'vodi_template_comment_container_inner_wrap_close', 10 );
add_action( 'masvideos_movie_review_after', 'masvideos_movie_review_display_comment_text', 15 );

add_action( 'masvideos_single_movie_meta', 'vodi_template_single_movie_tmdb_rating', 5 );
add_action( 'masvideos_single_movie_meta', 'vodi_template_single_movie_run_time', 14 );
add_action( 'masvideos_single_movie_meta', 'vodi_template_single_movie_censor_rating', 18 );