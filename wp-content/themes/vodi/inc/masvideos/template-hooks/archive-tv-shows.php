<?php
remove_action( 'masvideos_before_tv_shows_loop', 'masvideos_tv_shows_control_bar', 10 );
remove_action( 'masvideos_after_tv_shows_loop', 'masvideos_tv_shows_page_control_bar', 10 );
remove_action( 'masvideos_after_tv_shows_loop_item', 'masvideos_template_single_tv_show_avg_rating', 20 );
add_action( 'masvideos_after_tv_shows_loop_item', 'vodi_template_loop_tv_show_avg_rating', 20 );

add_action( 'masvideos_before_tv_shows_loop', 'vodi_tv_shows_control_bar_top',      20 );
add_action( 'masvideos_before_tv_shows_loop', 'vodi_tv_shows_archive_wrapper_open', 30 );
add_action( 'masvideos_after_tv_shows_loop', 'vodi_tv_shows_archive_wrapper_close', 10 );
add_action( 'masvideos_after_tv_shows_loop', 'vodi_tv_shows_control_bar_bottom',    20 );

/**
 * Control Bar Top
 *
 * @see vodi_tv_shows_control_bar_top_open()
 * @see vodi_tv_shows_control_bar_top_left()
 * @see vodi_tv_shows_control_bar_top_right()
 * @see vodi_tv_shows_control_bar_top_close()
 */
add_action( 'vodi_tv_shows_control_bar_top', 'vodi_tv_shows_control_bar_top_open', 10 );
add_action( 'vodi_tv_shows_control_bar_top', 'vodi_tv_shows_control_bar_top_left', 20 );
add_action( 'vodi_tv_shows_control_bar_top', 'vodi_tv_shows_control_bar_top_right', 30 );
add_action( 'vodi_tv_shows_control_bar_top', 'vodi_tv_shows_control_bar_top_close', 999 );

/**
 * Control Bar Top
 *
 * @see vodi_tv_shows_control_bar_top_open()
 * @see vodi_tv_shows_control_bar_top_left()
 * @see vodi_tv_shows_control_bar_top_right()
 * @see vodi_tv_shows_control_bar_top_close()
 */
add_action( 'vodi_tv_shows_control_bar_bottom', 'vodi_tv_shows_control_bar_bottom_open', 10 );
add_action( 'vodi_tv_shows_control_bar_bottom', 'masvideos_tv_shows_count', 30 );
add_action( 'vodi_tv_shows_control_bar_bottom', 'masvideos_tv_shows_pagination', 40 );
add_action( 'vodi_tv_shows_control_bar_bottom', 'vodi_tv_shows_control_bar_bottom_close', 999 );

add_filter( 'masvideos_tv_shows_pagination_args', 'vodi_tv_shows_pagination_custom_args' );

/**
 * Filters
 */
add_filter( 'masvideos_display_tv_show_page_title', 'vodi_display_tv_show_page_title' );
add_filter( 'masvideos_tv_show_rows', 'vodi_get_tv_show_rows', 10 );
add_filter( 'masvideos_tv_show_columns', 'vodi_get_tv_show_columns', 10 );

add_filter( 'posts_where', 'vodi_tv_shows_where_filter', 10, 2 );

/**
 * Archive
 */
add_action( 'masvideos_before_main_content', 'vodi_tv_show_archive_header', 11 );