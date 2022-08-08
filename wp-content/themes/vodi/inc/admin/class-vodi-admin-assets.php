<?php
/**
 * Load assets
 *
 * @author      CheThemes
 * @category    Admin
 * @package     Vodi/Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Vodi_Admin_Assets' ) ) :

/**
 * Vodi_Admin_Assets Class.
 */
class Vodi_Admin_Assets {

	/**
	 * Hook in tabs.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	}

	/**
	 * Enqueue styles.
	 */
	public function admin_styles() {
		global $wp_scripts, $vodi_version;

		$screen         = get_current_screen();
		$screen_id      = $screen ? $screen->id : '';
		$jquery_version = isset( $wp_scripts->registered['jquery-ui-core']->ver ) ? $wp_scripts->registered['jquery-ui-core']->ver : '1.9.2';

		// Register admin styles
		wp_register_style( 'vodi-post-widget-admin-style', get_template_directory_uri() . '/assets/css/admin/vpw-admin.min.css', array(), $vodi_version );
		wp_enqueue_style( 'vodi-post-widget-admin-style' );

		$custom_css = '
			#_vodi_page_metabox input[type="checkbox"]:checked::before {
				content: url(\'data:image/svg+xml,%3Csvg aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-yes components-checkbox-control__checked" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" style="fill: %23fff"%3E%3Cpath d="M14.83 4.89l1.34.94-5.81 8.38H9.02L5.78 9.67l1.34-1.25 2.57 2.4z"%3E%3C/path%3E%3C/svg%3E\');
			}

			#_vodi_page_metabox input[type="checkbox"]:checked {
				background: #11a0d2;
				border-color: #11a0d2;
			}';
		wp_add_inline_style( 'vodi-post-widget-admin-style', $custom_css );
	}

	/**
	 * Enqueue scripts.
	 */
	public function admin_scripts() {
		global $wp_query, $post, $vodi_version;

		$screen       = get_current_screen();
		$screen_id    = $screen ? $screen->id : '';
		$ec_screen_id = sanitize_title( esc_html__( 'vodi', 'vodi' ) );
		$suffix       = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_register_script( 'vodi-post-widget-admin-script', get_template_directory_uri() . '/assets/js/admin/vpw-admin.js', array(), $vodi_version );

		wp_enqueue_script( 'vodi-post-widget-admin-script' );

	}
}
endif;

return new Vodi_Admin_Assets();