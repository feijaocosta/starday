<?php
remove_action( 'masvideos_before_videos_loop', 'masvideos_videos_control_bar', 10 );
remove_action( 'masvideos_after_videos_loop', 'masvideos_videos_pagination',    20 );

add_action( 'masvideos_before_videos_loop', 'vodi_videos_control_bar_top',      20 );
add_action( 'masvideos_before_videos_loop', 'vodi_videos_archive_wrapper_open', 30 );
add_action( 'masvideos_after_videos_loop', 'vodi_videos_archive_wrapper_close', 10 );
add_action( 'masvideos_after_videos_loop', 'vodi_videos_control_bar_bottom',    20 );

add_action( 'masvideos_videos_loop_item_title', 'vodi_template_loop_video_views_meta_open', 45 );
add_action( 'masvideos_videos_loop_item_title', 'vodi_show_page_views', 45 );
add_action( 'masvideos_videos_loop_item_title', 'vodi_template_loop_video_views_meta_close', 55 );

/**
 * Control Bar Top
 *
 * @see vodi_videos_control_bar_top_open()
 * @see vodi_videos_control_bar_top_left()
 * @see vodi_videos_control_bar_top_right()
 * @see vodi_videos_control_bar_top_close()
 */
add_action( 'vodi_videos_control_bar_top', 'vodi_videos_control_bar_top_open', 10 );
add_action( 'vodi_videos_control_bar_top', 'vodi_videos_control_bar_top_left', 20 );
add_action( 'vodi_videos_control_bar_top', 'vodi_videos_control_bar_top_right', 30 );
add_action( 'vodi_videos_control_bar_top', 'vodi_videos_control_bar_top_close', 999 );

/**
 * Control Bar Top
 *
 * @see vodi_videos_control_bar_top_open()
 * @see vodi_videos_control_bar_top_left()
 * @see vodi_videos_control_bar_top_right()
 * @see vodi_videos_control_bar_top_close()
 */
add_action( 'vodi_videos_control_bar_bottom', 'vodi_videos_control_bar_bottom_open', 10 );
add_action( 'vodi_videos_control_bar_bottom', 'masvideos_videos_count', 30 );
add_action( 'vodi_videos_control_bar_bottom', 'masvideos_videos_pagination', 40 );
add_action( 'vodi_videos_control_bar_bottom', 'vodi_videos_control_bar_bottom_close', 999 );

/**
 * Filters
 */
add_filter( 'masvideos_display_video_page_title', 'vodi_display_video_page_title' );
add_filter( 'masvideos_videos_pagination_args', 'vodi_videos_pagination_custom_args' );

/**
 * Archive
 */
add_action( 'masvideos_before_main_content', 'vodi_video_archive_header', 11 );