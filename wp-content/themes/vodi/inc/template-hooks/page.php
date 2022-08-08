<?php
/**
 * Hooks used for Page
 */
add_filter( 'vodi_get_header_version', 'vodi_get_page_site_header_version', 20 );
add_filter( 'vodi_header_theme', 'vodi_get_page_site_header_theme', 20 );
add_filter( 'vodi_get_footer_version', 'vodi_get_page_site_footer_version', 20 );
add_filter( 'vodi_footer_theme', 'vodi_get_page_site_footer_theme', 20 );
add_filter( 'vodi_show_site_content_page_header', 'vodi_toggle_page_site_content_page_header', 20 );
add_filter( 'vodi_show_breadcrumb', 'vodi_toggle_page_breadcrumb', 20 );
add_filter( 'vodi_show_site_content_page_title', 'vodi_toggle_page_site_content_page_title', 20 );
add_filter( 'vodi_site_content_page_title', 'vodi_page_site_content_page_title' );

add_action( 'vodi_page_header_aside', 'vodi_breadcrumb' );

add_action( 'vodi_page', 'vodi_page_content', 20 );
add_action( 'vodi_page', 'vodi_display_comments', 30 );

add_action( 'vodi_content_top', 'vodi_container_start', 0 );
add_action( 'vodi_content_bottom', 'vodi_container_end', 0 );

add_action( 'vodi_content_top', 'vodi_handheld_before_content_sidebar', 20 );