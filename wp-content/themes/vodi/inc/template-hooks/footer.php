<?php
/**
 * Template Hooks used in Footer
 */

/**
 * Vodi Footer v1
 */
add_action( 'vodi_footer_v1', 'vodi_container_start',         10 );
add_action( 'vodi_footer_v1', 'vodi_footer_top_bar_open',     20 );
add_action( 'vodi_footer_v1', 'vodi_footer_logo',             30 );
add_action( 'vodi_footer_v1', 'vodi_footer_top_bar_social',   40 );
add_action( 'vodi_footer_v1', 'vodi_footer_top_bar_close',    50 );
add_action( 'vodi_footer_v1', 'vodi_footer_widgets',          60 );
add_action( 'vodi_footer_v1', 'vodi_container_end',           70 );
add_action( 'vodi_footer_v1', 'vodi_footer_bottom_bar_open',  80 );
add_action( 'vodi_footer_v1', 'vodi_footer_credit',           90 );
add_action( 'vodi_footer_v1', 'vodi_footer_quick_links',      100 );
add_action( 'vodi_footer_v1', 'vodi_footer_bottom_bar_close', 110 );

/**
 * Vodi Footer v2
 */
add_action( 'vodi_footer_v2', 'vodi_footer_primary_menu',       10 );
add_action( 'vodi_footer_v2', 'vodi_footer_bottom_open',        20 );
add_action( 'vodi_footer_v2', 'vodi_footer_bottom_left_start',  30 );
add_action( 'vodi_footer_v2', 'vodi_footer_top_bar_open',       40 );
add_action( 'vodi_footer_v2', 'vodi_footer_logo',               50 );
add_action( 'vodi_footer_v2', 'vodi_footer_top_bar_social',     60 );
add_action( 'vodi_footer_v2', 'vodi_footer_top_bar_close',      70 );
add_action( 'vodi_footer_v2', 'vodi_footer_secondary_menu',     80 );
add_action( 'vodi_footer_v2', 'vodi_footer_credit',             90 );
add_action( 'vodi_footer_v2', 'vodi_footer_tertiary_menu',      100 );
add_action( 'vodi_footer_v2', 'vodi_footer_bottom_left_end',    110 );
add_action( 'vodi_footer_v2', 'vodi_footer_bottom_right_start', 120 );
add_action( 'vodi_footer_v2', 'vodi_footer_action_area',        130 );
add_action( 'vodi_footer_v2', 'vodi_footer_bottom_right_end',   140 );
add_action( 'vodi_footer_v2', 'vodi_footer_bottom_close',       150 );

/**
 * Vodi Footer v3
 */
add_action( 'vodi_footer_v3', 'vodi_footer_v3_bar_open',  10 );
add_action( 'vodi_footer_v3', 'vodi_footer_logo',         20 );
add_action( 'vodi_footer_v3', 'vodi_footer_social_icons', 40 );
add_action( 'vodi_footer_v3', 'vodi_footer_v3_bar_close', 50 );
add_action( 'vodi_footer_v3', 'vodi_footer_credit',       60 );

/**
 * Vodi Footer v4
 */
add_action( 'vodi_footer_v4', 'vodi_footer_v4_bar_open',  10 );
add_action( 'vodi_footer_v4', 'vodi_footer_logo',         20 );
add_action( 'vodi_footer_v4', 'vodi_footer_v4_menu',      30 );
add_action( 'vodi_footer_v4', 'vodi_footer_social_icons', 40 );
add_action( 'vodi_footer_v4', 'vodi_footer_v4_bar_close', 50 );
add_action( 'vodi_footer_v4', 'vodi_footer_credit',       60 );

/**
 * Vodi Footer landing
 */
add_action( 'vodi_footer_landing', 'vodi_landing_footer_bar_start', 10);
add_action( 'vodi_footer_landing', 'vodi_footer_logo',              20);
add_action( 'vodi_footer_landing', 'vodi_landing_footer_menu',      30);
add_action( 'vodi_footer_landing', 'vodi_footer_top_bar_social',    40);
add_action( 'vodi_footer_landing', 'vodi_landing_footer_bar_end',   50);
add_action( 'vodi_footer_landing', 'vodi_footer_credit',            60);

/**
 * Comingsoon Footer hooks
 */
add_action( 'vodi_footer_comingsoon', 'vodi_comingsoon_footer_bar_start', 10);
add_action( 'vodi_footer_comingsoon', 'vodi_footer_top_bar_social',         20);
add_action( 'vodi_footer_comingsoon', 'vodi_footer_credit',                      30);
add_action( 'vodi_footer_comingsoon', 'vodi_comingsoon_footer_bar_end',   40);


/**
 * Handheld Footer
 */
add_action( 'vodi_after_footer', 'vodi_handheld_footer', 10 );
add_action( 'vodi_handheld_footer', 'vodi_handheld_widgets', 10 );
add_action( 'vodi_handheld_footer', 'vodi_container_start', 10 );
add_action( 'vodi_handheld_footer', 'vodi_footer_credit', 10 );
add_action( 'vodi_handheld_footer', 'vodi_container_end', 10 );