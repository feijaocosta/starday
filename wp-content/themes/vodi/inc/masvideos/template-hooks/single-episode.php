<?php
/**
 * Single Hooks
 */
remove_action( 'masvideos_after_single_episode_summary', 'masvideos_template_single_episode_tabs', 30 );
add_action( 'vodi_content_top', 'vodi_toggle_single_episode_breadcrumb', 5 );
add_action( 'masvideos_before_single_episode', 'vodi_toggle_single_episode_hooks', 10 );

add_action( 'masvideos_after_single_episode_summary', 'vodi_single_episode_seasons_tabs_wrap_open', 9 );
add_action( 'masvideos_after_single_episode_summary', 'vodi_single_episode_seasons_tabs_wrap_close', 11 );

add_action( 'masvideos_share', 'vodi_single_episode_sharing',    10 );

add_action( 'masvideos_single_episode_meta', 'vodi_single_episode_views_likes', 30 );

remove_action( 'masvideos_after_single_episode_summary', 'masvideos_template_single_episode_related_tv_shows', 20 );
add_action( 'masvideos_after_single_episode_summary', 'vodi_template_single_episode_related_tv_shows_carousel', 20 );

add_action( 'vodi_single_episode_before_head', 'vodi_single_episode_head_info_wrap_open', 10 );
add_action( 'vodi_single_episode_before_head', 'masvideos_template_loop_episode_poster_open', 20 );
add_action( 'vodi_single_episode_before_head', 'masvideos_template_loop_episode_link_open', 30 );
add_action( 'vodi_single_episode_before_head', 'masvideos_template_loop_episode_poster', 40 );
add_action( 'vodi_single_episode_before_head', 'masvideos_template_loop_episode_link_close', 50 );
add_action( 'vodi_single_episode_before_head', 'masvideos_template_loop_episode_poster_close', 60 );
add_action( 'vodi_single_episode_before_head', 'masvideos_template_loop_episode_body_open', 70 );
add_action( 'vodi_single_episode_before_head', 'masvideos_template_single_episode_genres', 75 );
add_action( 'vodi_single_episode_before_head', 'masvideos_template_loop_episode_link_open', 80 );
add_action( 'vodi_single_episode_before_head', 'masvideos_template_loop_episode_title', 90 );
add_action( 'vodi_single_episode_before_head', 'masvideos_template_loop_episode_link_close', 100 );
add_action( 'vodi_single_episode_before_head', 'vodi_template_single_episode_views_likes_download_open', 103 );
add_action( 'vodi_single_episode_before_head', 'vodi_single_episode_views_likes', 105 );
add_action( 'vodi_single_episode_before_head', 'vodi_template_single_episode_views_likes_download_close', 108 );
add_action( 'vodi_single_episode_before_head', 'masvideos_template_single_episode_short_desc', 110 );
add_action( 'vodi_single_episode_before_head', 'masvideos_template_single_sharing', 110 );
add_action( 'vodi_single_episode_before_head', 'masvideos_template_loop_episode_body_close', 120 );
add_action( 'vodi_single_episode_before_head', 'vodi_single_episode_head_info_wrap_close', 130 );