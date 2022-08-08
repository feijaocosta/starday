<?php
/**
 * Hooks used for Category
 */

add_action( 'vodi_movie_category', 'vodi_movie_category_header');
add_action( 'vodi_movie_category', 'vodi_movie_category_content');
add_action( 'vodi_movie_category', 'vodi_page_control_bar_bottom' );

add_action( 'vodi_video_category', 'vodi_video_category_header');
add_action( 'vodi_video_category', 'vodi_video_category_content');
add_action( 'vodi_video_category', 'vodi_page_control_bar_bottom' );