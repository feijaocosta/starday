<?php
/**
 * Single Hooks
 */
add_action( 'vodi_content_top', 'vodi_toggle_single_video_breadcrumb', 5 );
add_action( 'masvideos_before_single_video', 'vodi_toggle_single_video_hooks', 10 );

add_filter( 'masvideos_related_videos_default_args', 'vodi_template_single_related_videos_default_args', 10 );

remove_action( 'masvideos_before_single_video_summary', 'masvideos_template_single_video_player_wrap_open', 5 );
remove_action( 'masvideos_before_single_video_summary', 'masvideos_template_single_video_player_wrap_close', 20 );
remove_action( 'masvideos_single_video_summary', 'masvideos_template_single_video_meta', 10 );
remove_action( 'masvideos_single_video_summary', 'masvideos_template_single_video_actions_bar', 15 );
remove_action( 'masvideos_single_video_summary', 'masvideos_template_single_video_short_desc', 20 );
remove_action( 'masvideos_after_single_video_summary', 'masvideos_template_single_video_tabs', 30 );
remove_action( 'masvideos_after_single_video_summary', 'masvideos_template_single_video_gallery', 40 );

add_action( 'masvideos_before_single_video_summary', 'vodi_template_single_video_inner_wrap_open', 5 );
add_action( 'masvideos_before_single_video_summary', 'vodi_template_single_video_primary_open', 8 );
add_action( 'masvideos_before_single_video_summary', 'vodi_template_single_video_video_wrap_open', 9 );
add_action( 'masvideos_before_single_video_summary', 'vodi_template_single_video_video_wrap_close', 11 );
add_action( 'masvideos_single_video_summary', 'vodi_template_single_video_meta', 10 );
add_action( 'masvideos_single_video_summary', 'vodi_template_single_video_actions_bar', 15 );
add_action( 'masvideos_single_video_summary', 'masvideos_template_single_video_description', 20 );
add_action( 'masvideos_single_video_summary', 'vodi_template_single_video_comments_link', 30 );
add_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_primary_close', 10 );
add_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_sidebar_open', 30 );
add_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_sidebar_banner', 31 );
add_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_related_playlist_videos', 35 );
add_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_sidebar_close', 40 );
add_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_inner_wrap_close', 45);
