<?php
require_once get_template_directory() . '/inc/masvideos/template-hooks/archive-movies.php';
require_once get_template_directory() . '/inc/masvideos/template-hooks/archive-videos.php';
require_once get_template_directory() . '/inc/masvideos/template-hooks/archive-tv-shows.php';
require_once get_template_directory() . '/inc/masvideos/template-hooks/loop.php';
require_once get_template_directory() . '/inc/masvideos/template-hooks/single-tv-show.php';
require_once get_template_directory() . '/inc/masvideos/template-hooks/single-episode.php';
require_once get_template_directory() . '/inc/masvideos/template-hooks/single-video.php';
require_once get_template_directory() . '/inc/masvideos/template-hooks/single-movie.php';
require_once get_template_directory() . '/inc/masvideos/template-hooks/single-person.php';
require_once get_template_directory() . '/inc/masvideos/template-hooks/my-account.php';

add_filter( 'masvideos_enqueue_styles', '__return_empty_array' );
add_filter( 'masvideos_enqueue_bootstrap_js', '__return_false' );
add_filter( 'masvideos_redirect_single_search_result', '__return_false' );

add_action( 'wp_ajax_vodi_live_search_movies_suggest', 'vodi_live_search_movies_suggest' );
add_action( 'wp_ajax_nopriv_vodi_live_search_movies_suggest', 'vodi_live_search_movies_suggest' );

add_action( 'wp_ajax_vodi_live_search_tv_shows_suggest', 'vodi_live_search_tv_shows_suggest' );
add_action( 'wp_ajax_nopriv_vodi_live_search_tv_shows_suggest', 'vodi_live_search_tv_shows_suggest' );

add_action( 'wp_ajax_vodi_live_search_videos_suggest', 'vodi_live_search_videos_suggest' );
add_action( 'wp_ajax_nopriv_vodi_live_search_videos_suggest', 'vodi_live_search_videos_suggest' );
