<?php
/**
 * Hooks used for Header, Footer, Sidebar
 */
add_action( 'vodi_header_v1', 'vodi_header_right_start',      10 );
add_action( 'vodi_header_v1', 'vodi_offcanvas_menu',          20 );
add_action( 'vodi_header_v1', 'vodi_header_logo',             30 );
add_action( 'vodi_header_v1', 'vodi_primary_nav',             40 );
add_action( 'vodi_header_v1', 'vodi_header_right_end',        50 );
add_action( 'vodi_header_v1', 'vodi_header_left_start',       60 );
add_action( 'vodi_header_v1', 'vodi_header_search',           70 );
add_action( 'vodi_header_v1', 'vodi_header_upload_link',      80 );
add_action( 'vodi_header_v1', 'vodi_header_user_account',    100 );
add_action( 'vodi_header_v1', 'vodi_header_left_end',        110 );

/**
 * Header v2 hooks
 */

add_action( 'vodi_header_v2', 'vodi_offcanvas_menu',           10 );
add_action( 'vodi_header_v2', 'vodi_header_logo',              20 );
add_action( 'vodi_header_v2', 'vodi_header_search_menu_start', 30 );
add_action( 'vodi_header_v2', 'vodi_header_search',            40 );
add_action( 'vodi_header_v2', 'vodi_primary_nav',              50 );
add_action( 'vodi_header_v2', 'vodi_header_search_menu_end',   60 );
add_action( 'vodi_header_v2', 'vodi_header_icon_start',        70 );
add_action( 'vodi_header_v2', 'vodi_header_upload_link',       80 );
add_action( 'vodi_header_v2', 'vodi_header_user_account',     100 );
add_action( 'vodi_header_v2', 'vodi_header_icon_end',         110 );

/**
 * Header v3 hooks
 */
add_action( 'vodi_header_v3',   'vodi_masthead_v3',            10 );
add_action( 'vodi_header_v3',   'vodi_quick_links',            20 );
add_action( 'vodi_masthead_v3', 'vodi_header_right_start',     10 );
add_action( 'vodi_masthead_v3', 'vodi_header_logo',            20 );
add_action( 'vodi_masthead_v3', 'vodi_primary_nav',            30 );
add_action( 'vodi_masthead_v3', 'vodi_header_right_end',       40 );
add_action( 'vodi_masthead_v3', 'vodi_header_left_start',      50 );
add_action( 'vodi_masthead_v3', 'vodi_secondary_nav',          60 );
add_action( 'vodi_masthead_v3', 'vodi_masthead_v3_search',     70 );
add_action( 'vodi_masthead_v3', 'vodi_header_user_account',    90 );
add_action( 'vodi_masthead_v3', 'vodi_header_left_end',       100 );

//add_action( 'vodi_header_v4',     'vodi_header_slider' );

add_action( 'vodi_before_header_v4', 'vodi_header_static_content',  10 );
add_action( 'vodi_header_v4',   'vodi_masthead_v4',                 10 );
add_action( 'vodi_header_v4',   'vodi_menu_with_search_bar',        20 );
add_action( 'vodi_masthead_v4', 'vodi_offcanvas_menu',              10 );
add_action( 'vodi_masthead_v4', 'vodi_header_logo',                 20 );
add_action( 'vodi_masthead_v4', 'vodi_header_user_account',         30 );


add_action( 'vodi_menu_with_search_bar', 'vodi_header_search',  10 );
add_action( 'vodi_menu_with_search_bar', 'vodi_navbar_primary', 20 );

add_action( 'vodi_after_main_content', 'vodi_sidebar',          10 );
add_action( 'vodi_sidebar', 'vodi_get_sidebar',                 10 );

//add_action( 'vodi_before_header_v4', 'vodi_live_videos' );

/**
 * Landing Header v1 hooks
 */
add_action( 'vodi_header_landing_v1', 'vodi_header_left_start',   10 );
add_action( 'vodi_header_landing_v1', 'vodi_header_landing_logo', 20 );
add_action( 'vodi_header_landing_v1', 'vodi_landing_nav',         30 );
add_action( 'vodi_header_landing_v1', 'vodi_header_left_end',     40 );
add_action( 'vodi_header_landing_v1', 'vodi_header_right_start',  50 );
add_action( 'vodi_header_landing_v1', 'vodi_header_user_account', 60 );
add_action( 'vodi_header_landing_v1', 'vodi_header_right_end',    70 );

/**
 * Landing Header v2 hooks
 */
add_action( 'vodi_header_landing_v2', 'vodi_landing_back_option',    10 );
add_action( 'vodi_header_landing_v2', 'vodi_header_landing_v2_logo', 20 );

/**
 * Comingsoon Header hooks
 */
add_action( 'vodi_header_comingsoon', 'vodi_header_landing_logo',       10 );
add_action( 'vodi_header_comingsoon', 'vodi_comingsoon_offcanvas_menu', 20 );

/**
 * Handheld Header
 */
add_action( 'vodi_before_content', 'vodi_handheld_header', 10 );
add_action( 'vodi_handheld_header', 'vodi_header_left_start', 10 );
add_action( 'vodi_handheld_header', 'vodi_offcanvas_menu', 20 );
add_action( 'vodi_handheld_header', 'vodi_header_logo', 30 );
add_action( 'vodi_handheld_header', 'vodi_header_left_end', 40 );
add_action( 'vodi_handheld_header', 'vodi_header_right_start', 50 );
add_action( 'vodi_handheld_header', 'vodi_header_search_dropdown', 60 );
add_action( 'vodi_handheld_header', 'vodi_header_user_account', 60 );
add_action( 'vodi_handheld_header', 'vodi_header_right_end', 70 );

add_action( 'wp_footer', 'vodi_header_register_login_modal_form' );