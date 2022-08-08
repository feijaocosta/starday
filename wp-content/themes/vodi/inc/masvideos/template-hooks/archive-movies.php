<?php
remove_action( 'masvideos_after_movies_loop_item', 'masvideos_template_single_movie_avg_rating', 20 );
add_action( 'masvideos_after_movies_loop_item', 'vodi_template_loop_movie_avg_rating', 20 );
remove_action( 'masvideos_before_movies_loop', 'masvideos_movies_control_bar', 10 );
remove_action( 'masvideos_after_movies_loop', 'masvideos_movies_page_control_bar', 10 );
remove_action( 'masvideos_before_main_content', 'masvideos_breadcrumb', 20, 0 );

add_action( 'masvideos_before_movies_loop', 'vodi_movies_control_bar_top',      20 );
add_action( 'masvideos_before_movies_loop', 'vodi_movies_archive_wrapper_open', 30 );
add_action( 'masvideos_after_movies_loop', 'vodi_movies_archive_wrapper_close', 10 );
add_action( 'masvideos_after_movies_loop', 'vodi_movies_control_bar_bottom',    20 );

/**
 * Control Bar Top
 *
 * @see vodi_movies_control_bar_top_open()
 * @see vodi_movies_control_bar_top_left()
 * @see vodi_movies_control_bar_top_right()
 * @see vodi_movies_control_bar_top_close()
 */
add_action( 'vodi_movies_control_bar_top', 'vodi_movies_control_bar_top_open', 10 );
add_action( 'vodi_movies_control_bar_top', 'vodi_movies_control_bar_top_left', 20 );
add_action( 'vodi_movies_control_bar_top', 'vodi_movies_control_bar_top_right', 30 );
add_action( 'vodi_movies_control_bar_top', 'vodi_movies_control_bar_top_close', 999 );

/**
 * Control Bar Top
 *
 * @see vodi_movies_control_bar_top_open()
 * @see vodi_movies_control_bar_top_left()
 * @see vodi_movies_control_bar_top_right()
 * @see vodi_movies_control_bar_top_close()
 */
add_action( 'vodi_movies_control_bar_bottom', 'vodi_movies_control_bar_bottom_open', 10 );
add_action( 'vodi_movies_control_bar_bottom', 'masvideos_movies_count', 30 );
add_action( 'vodi_movies_control_bar_bottom', 'masvideos_movies_pagination', 40 );
add_action( 'vodi_movies_control_bar_bottom', 'vodi_movies_control_bar_bottom_close', 999 );

add_filter( 'masvideos_movies_pagination_args', 'vodi_movies_pagination_custom_args' );

/**
 * Sidebar
 */
add_action( 'masvideos_sidebar',          'vodi_archive_get_sidebar',            10 );

/**
 * Filters
 */
add_filter( 'masvideos_display_movie_page_title', 'vodi_display_movie_page_title' );
add_filter( 'masvideos_movie_rows', 'vodi_get_movie_rows', 10 );
add_filter( 'masvideos_movie_columns', 'vodi_get_movie_columns', 10 );

add_filter( 'posts_where', 'vodi_movies_where_filter', 10, 2 );

/**
 * Archive
 */
add_action( 'masvideos_before_main_content', 'vodi_movie_archive_header', 11 );