<?php
/**
 * Plugin Name:    	Vodi Extensions
 * Plugin URI:     	https://madrasthemes.com/vodi
 * Description:    	This selection of extensions compliment our lean and mean theme for MasVideos, vodi. Please note: they don’t work with any WordPress theme, just vodi.
 * Author:         	MadrasThemes
 * Author URI:     	https://madrasthemes.com/
 * Version:        	1.2.9
 * Text Domain: 	vodi-extensions
 * Domain Path: 	/languages
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Vodi_Extensions' ) ) {
	/**
	 * Main Vodi_Extensions Class
	 *
	 * @class Vodi_Extensions
	 * @version	1.0.0
	 * @since 1.0.0
	 * @package	Vodi
	 * @author MadrasThemes
	 */
	final class Vodi_Extensions {
		/**
		 * Vodi_Extensions The single instance of Jobhunt_Extensions.
		 * @var 	object
		 * @access  private
		 * @since 	1.0.0
		 */
		private static $_instance = null;

		/**
		 * The token.
		 * @var     string
		 * @access  public
		 * @since   1.0.0
		 */
		public $token;

		/**
		 * The version number.
		 * @var     string
		 * @access  public
		 * @since   1.0.0
		 */
		public $version;

		/**
		 * Constructor function.
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function __construct () {

			$this->token 	= 'vodi-extensions';
			$this->version 	= '1.0.2';

			add_action( 'plugins_loaded', array( $this, 'setup_constants' ),		5 );
			add_action( 'plugins_loaded', array( $this, 'wp_ulike_includes' ),		7 );
			add_action( 'plugins_loaded', array( $this, 'includes' ),				20 );
		}

		/**
		 * Main Vodi_Extensions Instance
		 *
		 * Ensures only one instance of Vodi_Extensions is loaded or can be loaded.
		 *
		 * @since 1.0.0
		 * @static
		 * @see Vodi_Extensions()
		 * @return Main Vodi instance
		 */
		public static function instance () {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Setup plugin constants
		 *
		 * @access public
		 * @since  1.0.0
		 * @return void
		 */
		public function setup_constants() {

			// Plugin Folder Path
			if ( ! defined( 'VODI_EXTENSIONS_DIR' ) ) {
				define( 'VODI_EXTENSIONS_DIR', plugin_dir_path( __FILE__ ) );
			}

			// Plugin Folder URL
			if ( ! defined( 'VODI_EXTENSIONS_URL' ) ) {
				define( 'VODI_EXTENSIONS_URL', plugin_dir_url( __FILE__ ) );
			}

			// Plugin Root File
			if ( ! defined( 'VODI_EXTENSIONS_FILE' ) ) {
				define( 'VODI_EXTENSIONS_FILE', __FILE__ );
			}
		}

		/**
		 * Include wp-ulike functions
		 *
		 * @access public
		 * @since  1.0.0
		 * @return void
		 */
		public function wp_ulike_includes() {
			require VODI_EXTENSIONS_DIR . '/includes/wp-ulike/functions.php';
		}

		/**
		 * Include required files
		 *
		 * @access public
		 * @since  1.0.0
		 * @return void
		 */
		public function includes() {
			require VODI_EXTENSIONS_DIR . '/includes/functions.php';

			// Gutenberg Blocks
			require VODI_EXTENSIONS_DIR . '/includes/gutenberg/vodi-gutenberg-block-functions.php';
			require VODI_EXTENSIONS_DIR . '/includes/gutenberg/class-vodi-gutenberg-blocks.php';
		}

		/**
		 * Cloning is forbidden.
		 *
		 * @since 1.0.0
		 */
		public function __clone () {
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'vodi-extensions' ), '1.0.0' );
		}

		/**
		 * Unserializing instances of this class is forbidden.
		 *
		 * @since 1.0.0
		 */
		public function __wakeup () {
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'vodi-extensions' ), '1.0.0' );
		}
	}
}

/**
 * Returns the main instance of Vodi_Extensions to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Vodi_Extensions
 */
function Vodi_Extensions() {
	return Vodi_Extensions::instance();
}

/**
 * Initialise the plugin
 */
Vodi_Extensions();
