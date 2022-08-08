<?php
/**
 * Vodi Meta Boxes
 *
 * Sets up the write panels used by products and orders (custom post types).
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Vodi_Admin_Meta_Boxes.
 */
class Vodi_Admin_Meta_Boxes {

	/**
	 * Is meta boxes saved once?
	 *
	 * @var boolean
	 */
	private static $saved_meta_boxes = false;

	/**
	 * Meta box error messages.
	 *
	 * @var array
	 */
	public static $meta_box_errors  = array();

	/**
	 * Constructor.
	 */
	public function __construct() {
		global $post;

        add_action( 'vodi_add_metaboxes', array( $this, 'add_metaboxes' ) );
        add_action( 'save_post', array( $this, 'save_meta_boxes' ), 10, 2 );

		// Save Page Meta Boxes
		add_action( 'vodi_process_page_meta', 'Vodi_Meta_Box_Page::save', 10, 2 );

		// Error handling (for showing errors from meta boxes on next page load)
		add_action( 'admin_notices', array( $this, 'output_errors' ) );
		add_action( 'shutdown', array( $this, 'save_errors' ) );
	}

	/**
	 * Add an error message.
	 * @param string $text
	 */
	public static function add_error( $text ) {
		self::$meta_box_errors[] = $text;
	}

	/**
	 * Save errors to an option.
	 */
	public function save_errors() {
		update_option( 'vodi_meta_box_errors', self::$meta_box_errors );
	}

	/**
	 * Show any stored error messages.
	 */
	public function output_errors() {
		$errors = maybe_unserialize( get_option( 'vodi_meta_box_errors' ) );

		if ( ! empty( $errors ) ) {

			echo '<div id="vodi_errors" class="error notice is-dismissible">';

			foreach ( $errors as $error ) {
				echo '<p>' . wp_kses_post( $error ) . '</p>';
			}

			echo '</div>';

			// Clear
			delete_option( 'vodi_meta_box_errors' );
		}
	}

	/**
	 * Add Vodi Meta boxes.
	 */
	public function add_metaboxes( $post_type ) {
		global $post;

		$screen = get_current_screen();

		$template_file = get_post_meta( $post->ID, '_wp_page_template', true );

        $this->add_page_meta_box( $post_type );
	}

	private function add_page_meta_box() {
		global $post;

		$template_file = get_post_meta( $post->ID, '_wp_page_template', true );

		$page_for_posts = get_option( 'page_for_posts' );

		if ( get_post_type( $post ) != 'page' ) {
			return;
		}

		if( $post->ID === $page_for_posts ) {
			return;
		}

		if( function_exists( 'vodi_add_metabox' ) ) {
			vodi_add_metabox( '_vodi_page_metabox', esc_html__( 'Vodi Page Options', 'vodi' ), 'Vodi_Meta_Box_Page::output', 'page', 'side', 'high' );
		}
	}

	/**
	 * Check if we're saving, the trigger an action based on the post type.
	 *
	 * @param  int $post_id
	 * @param  object $post
	 */
	public function save_meta_boxes( $post_id, $post ) {

		// $post_id and $post are required
		if ( empty( $post_id ) || empty( $post ) || self::$saved_meta_boxes ) {
			return;
		}

		// Dont' save meta boxes for revisions or autosaves
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the nonce
		if ( empty( $_POST['vodi_meta_nonce'] ) || ! wp_verify_nonce( $_POST['vodi_meta_nonce'], 'vodi_save_data' ) ) {
			return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events
		if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
			return;
		}

		// Check user has permission to edit
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		// We need this save event to run once to avoid potential endless loops. This would have been perfect:
		//	remove_action( current_filter(), __METHOD__ );
		// But cannot be used due to https://github.com/woothemes/woocommerce/issues/6485
		// When that is patched in core we can use the above. For now:
		self::$saved_meta_boxes = true;

		$what = $post->post_type;

		do_action( 'vodi_process_' . $what . '_meta', $post_id, $post );
	}
}
new Vodi_Admin_Meta_Boxes();