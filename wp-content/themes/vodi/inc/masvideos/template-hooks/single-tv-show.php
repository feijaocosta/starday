<?php
/**
 * Single Hooks
 */
remove_action( 'masvideos_after_single_tv_show_summary', 'masvideos_template_single_tv_show_cast_crew_tabs', 10 );
add_action( 'masvideos_after_single_tv_show_summary',          		'vodi_single_tv_show_seasons_tabs_wrap_open',    9 );
add_action( 'masvideos_after_single_tv_show_summary',          		'vodi_single_tv_show_seasons_tabs_wrap_close',   11 );

add_action( 'masvideos_share', 'vodi_single_tv_show_sharing', 10 );

remove_action( 'masvideos_after_single_tv_show_summary', 'masvideos_related_tv_shows', 20 );
add_action( 'masvideos_after_single_tv_show_summary', 'vodi_template_single_related_tv_shows_carousel', 20 );
remove_action( 'masvideos_single_tv_show_summary', 'masvideos_template_single_tv_show_avg_rating', 40 );
add_action( 'masvideos_single_tv_show_summary', 'vodi_template_loop_tv_show_avg_rating', 40 );

add_action( 'masvideos_single_tv_show_meta', 'vodi_single_tv_show_views_likes', 30 );