<?php
/**
 * Redux Framworks hooks
 *
 * @package Vodi/ReduxFramework
 */

add_action( 'init',                            'vodi_remove_demo_mode_link' );
add_action( 'redux/loaded',                    'vodi_redux_disable_dev_mode_and_remove_admin_notices' );
add_action( 'redux/page/vodi_options/enqueue', 'redux_queue_font_awesome' );

// General Filters
add_filter( 'vodi_enable_scrollup',             'redux_toggle_scrollup',                10 );
add_filter( 'vodi_register_image_sizes',        'redux_toggle_register_image_size',     10 );
add_filter( 'vodi_register_image_size_args',    'redux_set_register_image_size_args',   10 );
add_filter( 'vodi_enable_live_search',          'redux_toggle_live_search',             10 );

// Header Filters
add_filter( 'vodi_get_header_version',          'redux_apply_header_version',       10 );
add_filter( 'vodi_header_static_content_id',    'redux_apply_header_static_content_id',   10 );
add_filter( 'vodi_header_theme',                'redux_apply_header_theme',         10 );
add_filter( 'vodi_header_search_type',          'redux_apply_header_search_type',   10 );
add_filter( 'vodi_use_svg_logo',                'redux_toggle_logo_svg',            10 );
add_filter( 'vodi_enable_sticky_header',        'redux_toggle_sticky_header',       10 );
add_filter( 'vodi_enable_hh_sticky_header',     'redux_toggle_handheld_sticky_header',  10 );
add_filter( 'vodi_offcanvas_classes',           'redux_append_offcanvas_classes',   10 );
add_filter( 'vodi_enable_header_search',        'redux_toggle_header_search',       10 );
add_filter( 'vodi_enable_header_upload_link',   'redux_toggle_header_upload_link',  10 );
add_filter( 'vodi_enable_header_notification',  'redux_toggle_header_notification', 10 );
add_filter( 'vodi_enable_header_user_account',  'redux_toggle_header_user_account', 10 );
add_filter( 'vodi_landing_back_option_button',  'redux_toggle_back_option_button',  10 );
add_filter( 'vodi_landing_back_option_label',   'redux_append_back_option_label',   10 );
add_filter( 'vodi_landing_back_option_text',    'redux_append_back_option_text',    10 );
add_filter( 'vodi_landing_back_option_url',     'redux_append_back_option_url',     10 );

// Footer Filters
add_filter( 'vodi_get_footer_version',          'redux_apply_footer_version',           10 );
add_filter( 'vodi_footer_theme',                'redux_apply_footer_theme',             10 );
add_filter( 'vodi_enable_footer_logo',          'redux_toggle_footer_logo',             10 );
add_filter( 'vodi_enable_separate_footer_logo', 'redux_toggle_separate_footer_logo',    10 );
add_filter( 'vodi_separate_footer_logo',        'redux_apply_separate_footer_logo',     10 );
add_filter( 'vodi_footer_widgets',              'redux_toggle_footer_widgets',          10 );
add_filter( 'vodi_footer_widget_columns',       'redux_append_footer_widget_columns',   10 );
add_filter( 'vodi_enable_footer_action',        'redux_toggle_footer_action_area',      10 );
add_filter( 'vodi_copyright_text',              'redux_append_copyright_text',          10 );
add_filter( 'vodi_footer_action_title',         'redux_apply_footer_action_title',      10 );
add_filter( 'vodi_footer_action_subtitle',      'redux_apply_footer_action_subtitle',   10 );
add_filter( 'vodi_footer_action_content',       'redux_apply_footer_action_content',    10 );

// Movies Filters
add_filter( 'vodi_movies_layout',          'redux_apply_movies_layout',             10 );
add_filter( 'vodi_movies_theme',           'redux_apply_movies_theme',              10 );
add_filter( 'vodi_movie_rows',             'redux_apply_movie_rows',                10 );
add_filter( 'vodi_movie_columns',          'redux_apply_movie_columns',             10 );
add_filter( 'vodi_movies_control_bar_tag_filter_instance', 'redux_apply_movies_control_bar_tag_filter_instance', 10 );
add_filter( 'vodi_movies_jumbotron_top_id', 'redux_apply_movies_jumbotron_top_id',  10 );
add_filter( 'vodi_movie_banner_content',    'redux_apply_movie_banner_content',     10 );
add_filter( 'vodi_is_template_single_movie_download_button',    'redux_apply_movie_download_button',     10 );

add_filter( 'vodi_single_movie_style',     'redux_apply_single_movie_style',        10 );

add_filter( 'vodi_masvideos_get_archive_views_args',    'redux_set_archive_view_args', 10, 2 );

// TV Shows Filters
add_filter( 'vodi_tv_shows_style',         'redux_apply_tv_shows_style',         10 );
add_filter( 'vodi_tv_shows_layout',        'redux_apply_tv_shows_layout',        10 );
add_filter( 'vodi_tv_shows_theme',         'redux_apply_tv_shows_theme',         10 );
add_filter( 'vodi_tv_show_rows',           'redux_apply_tv_show_rows',           10 );
add_filter( 'vodi_tv_show_columns',        'redux_apply_tv_show_columns',        10 );
add_filter( 'vodi_tv_shows_control_bar_tag_filter_instance', 'redux_apply_tv_shows_control_bar_tag_filter_instance', 10 );
add_filter( 'vodi_tv_shows_jumbotron_top_id', 'redux_apply_tv_shows_jumbotron_top_id', 10 );

add_filter( 'vodi_single_episode_style',   'redux_apply_single_episode_style',   10 );
add_filter( 'vodi_is_template_single_episode_download_button',    'redux_apply_episode_download_button',     10 );

// Videos Filters
add_filter( 'vodi_videos_style',            'redux_apply_videos_style',                 10 );
add_filter( 'vodi_videos_layout',           'redux_apply_videos_layout',                10 );
add_filter( 'vodi_videos_theme',            'redux_apply_videos_theme',                 10 );
add_filter( 'masvideos_video_rows',         'redux_apply_video_rows',                   10 );
add_filter( 'masvideos_video_columns',      'redux_apply_video_columns',                10 );
add_filter( 'vodi_videos_control_bar_tag_filter_instance', 'redux_apply_videos_control_bar_tag_filter_instance', 10 );
add_filter( 'vodi_videos_jumbotron_top_id', 'redux_apply_videos_jumbotron_top_id',      10 );
add_filter( 'vodi_single_video_style',      'redux_apply_single_video_style',           10 );
add_filter( 'vodi_video_banner_content',    'redux_apply_video_banner_content',         10 );
add_filter( 'vodi_is_template_single_video_download_button',    'redux_apply_video_download_button',	10 );
add_filter( 'vodi_enable_video_upload_instructions',	'redux_toggle_enable_upload_instructions',		10 );
add_filter( 'vodi_video_upload_instructions_args',	'redux_apply_upload_video_instructions_args',		10 );

// Blog Filters
add_filter( 'vodi_blog_layout',          'redux_apply_blog_layout',          10 );
add_filter( 'vodi_blog_theme',           'redux_apply_blog_theme',           10 );
add_filter( 'vodi_single_post_layout',   'redux_apply_single_post_layout',   10 );
add_filter( 'vodi_single_post_sidebar',  'redux_apply_single_post_sidebar',  10 );
add_filter( 'vodi_sidebar_args',         'redux_add_single_post_sidebar',    10 );
add_filter( 'vodi_enable_related_posts', 'redux_toggle_related_posts',       10 );
add_filter( 'vodi_related_posts_args',   'redux_apply_related_posts_title',  10 );
add_filter( 'vodi_related_posts_args',   'redux_apply_related_posts_number', 10 );

// Style Filters
add_filter( 'vodi_use_predefined_colors',                   'redux_toggle_use_predefined_colors',           10 );
add_action( 'wp_enqueue_scripts',                           'redux_apply_custom_color_css',               	20 );
add_filter( 'redux/options/' . Vodi_Options::get_option_name() . '/compiler', 'redux_apply_compiler_action', 10, 3 );

// Typography Filters
add_action( 'wp_enqueue_scripts',                           'redux_apply_custom_font_css',               	20 );
