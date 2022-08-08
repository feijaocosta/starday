<?php
/**
 * Loop Hooks
 */

add_action( 'masvideos_before_movies_slider_loop_item',         'movies_slider_template_loop_open', 10 );

add_action( 'masvideos_before_movies_slider_loop_item_title',   'movies_slider_action_button',  10 );

add_action( 'masvideos_movies_slider_loop_item_title',          'masvideos_template_loop_movie_link_open',      10 );
add_action( 'masvideos_movies_slider_loop_item_title',          'masvideos_template_loop_movie_title',          20 );
add_action( 'masvideos_movies_slider_loop_item_title',          'masvideos_template_loop_movie_link_close',     30 );
add_action( 'masvideos_movies_slider_loop_item_title',          'movies_slider_loop_movie_meta',                40 );

add_action( 'masvideos_after_movies_slider_loop_item_title',    'masvideos_template_loop_movie_short_desc_wrap_open',   10 );
add_action( 'masvideos_after_movies_slider_loop_item_title',    'masvideos_template_loop_movie_short_desc',             20 );
add_action( 'masvideos_after_movies_slider_loop_item_title',    'masvideos_template_loop_movie_short_desc_wrap_close',  30 );
add_action( 'masvideos_after_movies_slider_loop_item_title',    'masvideos_template_loop_movie_actions',                40 );

add_action( 'masvideos_after_movies_slider_loop_item',          'movies_slider_template_loop_close',    10 );


add_action( 'masvideos_before_movie_list_item',         		'movie_list_template_loop_open', 10 );
add_action( 'masvideos_before_movie_list_item', 				'movie_list_template_loop_movie_poster_open', 20 );
add_action( 'masvideos_before_movie_list_item', 				'movie_list_template_loop_movie_link_open', 30 );
add_action( 'masvideos_before_movie_list_item',                 'movie_list_template_loop_movie_poster', 40 );
add_action( 'masvideos_before_movie_list_item', 				'movie_list_template_loop_movie_link_close', 50 );
add_action( 'masvideos_before_movie_list_item', 				'movie_list_template_loop_movie_poster_close', 60 );


add_action( 'masvideos_movie_list_item_title', 					'movie_list_template_loop_movie_body_open', 10 );
add_action( 'masvideos_movie_list_item_title', 					'movie_list_template_loop_movie_release', 20 );
add_action( 'masvideos_movie_list_item_title', 					'movie_list_template_loop_movie_link_open', 30 );
add_action( 'masvideos_movie_list_item_title',                  'movie_list_template_loop_movie_title', 40 );
add_action( 'masvideos_movie_list_item_title', 					'movie_list_template_loop_movie_link_close', 50 );
add_action( 'masvideos_movie_list_item_title', 					'movie_list_template_loop_movie_category', 60 );
add_action( 'masvideos_movie_list_item_title', 					'movie_list_template_loop_movie_body_close', 70 );

add_action( 'masvideos_after_movie_list_item',          		'movie_list_template_loop_close',    10 );


add_action( 'masvideos_before_video_coming_soon_loop_item',         'vodi_template_loop_video_coming_soon_release_datetime_open', 10 );
add_action( 'masvideos_before_video_coming_soon_loop_item',         'vodi_template_loop_video_coming_soon_release_datetime', 20 );
add_action( 'masvideos_before_video_coming_soon_loop_item',         'vodi_template_loop_video_coming_soon_release_datetime_close', 30 );
add_action( 'masvideos_before_video_coming_soon_loop_item_title',   'vodi_template_loop_video_coming_soon_info_open', 10 );
add_action( 'masvideos_before_video_coming_soon_loop_item_title',   'vodi_template_loop_video_coming_soon_meta', 20 );
add_action( 'masvideos_video_coming_soon_loop_item_title',          'vodi_template_loop_video_coming_soon_title', 10 );
add_action( 'masvideos_video_coming_soon_loop_item_title',          'vodi_template_loop_video_coming_soon_release_countdown', 20 );
add_action( 'masvideos_after_video_coming_soon_loop_item_title',    'vodi_template_loop_video_coming_soon_info_close', 10 );

// Search results header
add_action( 'vodi_content_top', 'vodi_search_result_page_header', 5 );

// Orderby set likes and views
add_filter( 'masvideos_default_tv_shows_catalog_orderby_options',   'vodi_set_masvideos_catalog_orderby_options', 10 );
add_filter( 'masvideos_default_movies_catalog_orderby_options',     'vodi_set_masvideos_catalog_orderby_options', 10 );
add_filter( 'masvideos_default_videos_catalog_orderby_options',     'vodi_set_masvideos_catalog_orderby_options', 10 );

add_filter( 'masvideos_get_tv_shows_catalog_ordering_args',         'vodi_set_views_likes_to_catalog_ordering_args', 10, 3 );
add_filter( 'masvideos_get_movies_catalog_ordering_args',           'vodi_set_views_likes_to_catalog_ordering_args', 10, 3 );
add_filter( 'masvideos_get_videos_catalog_ordering_args',           'vodi_set_views_likes_to_catalog_ordering_args', 10, 3 );