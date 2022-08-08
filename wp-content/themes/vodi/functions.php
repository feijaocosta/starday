<?php
/**
 * Vodi engine room
 *
 * @package vodi
 */

/**
 * Assign the Vodi version to a var
 */
$theme        = wp_get_theme( 'vodi' );
$vodi_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 990; /* pixels */
}

$vodi = (object) array(
    'version'    => $vodi_version,
    
    /**
     * Initialize all the things.
     */
    'main'       => require 'inc/class-vodi.php'
);

require_once get_template_directory() . '/inc/classes/class-vodi-social-media-walker.php';

require_once get_template_directory() . '/inc/vodi-functions.php';
require_once get_template_directory() . '/inc/vodi-template-functions.php';
require_once get_template_directory() . '/inc/vodi-template-hooks.php';


if ( is_admin() ) {
    require get_template_directory() . '/inc/admin/class-vodi-admin.php';
}

if ( vodi_is_jetpack_activated() ) {
    require_once get_template_directory() . '/inc/jetpack/vodi-jetpack-functions.php';
}

if ( vodi_is_redux_activated() ) {
    require_once get_template_directory() . '/inc/redux-framework/vodi-options.php';
    require_once get_template_directory() . '/inc/redux-framework/functions.php';
    require_once get_template_directory() . '/inc/redux-framework/hooks.php';
}

if ( vodi_is_ocdi_activated() ) {
    require get_template_directory() . '/inc/ocdi/hooks.php';
    require get_template_directory() . '/inc/ocdi/functions.php';
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */