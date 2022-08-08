<?php
/**
 * Vodi Class
 *
 * @since    0.0.1
 * @package  vodi
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Vodi' ) ) :

	/**
	 * The main Vodi class
	 */
	class Vodi {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			$this->includes();
			$this->init_hooks();
		}

		public function includes() {
			// TGMPA
			include_once get_template_directory() . '/inc/classes/class-tgm-plugin-activation.php';
		}

		public function init_hooks() {
			add_action( 'widgets_init',                 array( $this, 'widgets_init' ), 10 );
			add_action( 'after_setup_theme',            array( $this, 'setup' ) );
			add_action( 'after_setup_theme',            array( $this, 'vodi_template_debug_mode' ) );
			add_action( 'wp_enqueue_scripts',           array( $this, 'scripts' ), 10 );
			add_action( 'wp_enqueue_scripts',           array( $this, 'child_scripts' ), 30 ); // After WooCommerce.
			add_action( 'enqueue_block_editor_assets',  array( $this, 'block_editor_assets' ) );
			add_action( 'enqueue_block_assets',         array( $this, 'block_assets' ) );
			add_action( 'admin_head',                   array( $this, 'wp_5_6_editor_block_width_fix' ) );
			add_filter( 'body_class',                   array( $this, 'body_classes' ) );
			add_filter( 'embed_defaults',               array( $this, 'embed_defaults' ) );
			add_action( 'tgmpa_register',               array( $this, 'required_plugins' ) );
		}

		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		public function setup() {
			/*
			 * Load Localisation files.
			 *
			 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
			 */

			// Loads wp-content/languages/themes/vodi-it_IT.mo.
			load_theme_textdomain( 'vodi', trailingslashit( WP_LANG_DIR ) . 'themes/' );

			// Loads wp-content/themes/vodi-child/languages/it_IT.mo.
			load_theme_textdomain( 'vodi', get_stylesheet_directory() . '/languages' );

			// Loads wp-content/themes/vodi/languages/it_IT.mo.
			load_theme_textdomain( 'vodi', get_template_directory() . '/languages' );

			/**
			 * Add default posts and comments RSS feed links to head.
			 */
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#Post_Thumbnails
			 */
			add_theme_support( 'post-thumbnails' );

			/*
			 * Enable support for Post Formats.
			 *
			 * See: https://codex.wordpress.org/Post_Formats
			 */
			add_theme_support(
				'post-formats', array(
					'aside',
					'image',
					'video',
					'quote',
					'link',
					'gallery',
					'audio',
				)
			);

			/**
			 * Enable support for site logo.
			 */
			add_theme_support(
				'custom-logo', apply_filters(
					'vodi_custom_logo_args', array(
						'height'      => 110,
						'width'       => 470,
						'flex-width'  => true,
						'flex-height' => true,
					)
				)
			);


			/**
			 * Register menu locations.
			 */
			register_nav_menus(
				apply_filters(
					'vodi_register_nav_menus', array(
						'primary'               => esc_html__( 'Primary Menu', 'vodi' ),
						'secondary'             => esc_html__( 'Secondary Menu', 'vodi' ),
						'secondary-nav-v3'      => esc_html__( 'Secondary Nav v3 Menu', 'vodi' ),
						'offcanvas'             => esc_html__( 'Offcanvas Menu', 'vodi' ),
						'navbar-primary'        => esc_html__( 'Navbar Primary', 'vodi' ),
						'footer-quick-links'    => esc_html__( 'Footer v1 Quick Links', 'vodi' ),
						'footer-primary-menu'   => esc_html__( 'Footer v2 Primary Menu', 'vodi' ),
						'footer-secondary-menu' => esc_html__( 'Footer v2 Secondary Menu', 'vodi' ),
						'footer-tertiary-menu'  => esc_html__( 'Footer v2 Tertiary Menu', 'vodi' ),
						'footer-v4-menu'        => esc_html__( 'Footer v4 Menu', 'vodi' ),
						'landing-nav'           => esc_html__( 'Landing Menu', 'vodi' ),
						'comingsoon-offcanvas'  => esc_html__( 'Comingsoon Offcanvas Menu', 'vodi' ),
						'landing-footer-menu'   => esc_html__( 'Landing footer Menu', 'vodi' ),
						'social-media'          => esc_html__( 'Social Media', 'vodi' ),
					)
				)
			);

			/*
			 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
			 * to output valid HTML5.
			 */
			add_theme_support(
				'html5', apply_filters(
					'vodi_html5_args', array(
						'search-form',
						'comment-form',
						'comment-list',
						'gallery',
						'caption',
						'widgets',
					)
				)
			);

			/**
			 * Setup the WordPress core custom background feature.
			 */
			add_theme_support(
				'custom-background', apply_filters(
					'vodi_custom_background_args', array(
						'default-color' => apply_filters( 'vodi_default_background_color', 'ffffff' ),
						'default-image' => '',
					)
				)
			);

			/**
			 * Setup the WordPress core custom header feature.
			 */
			add_theme_support(
				'custom-header', apply_filters(
					'vodi_custom_header_args', array(
						'default-image' => '',
						'header-text'   => false,
						'width'         => 1440,
						'height'        => 500,
						'flex-width'    => true,
						'flex-height'   => true,
					)
				)
			);

			/**
			 *  Add support for the Site Logo plugin and the site logo functionality in JetPack
			 *  https://github.com/automattic/site-logo
			 *  http://jetpack.me/
			 */
			add_theme_support(
				'site-logo', apply_filters(
					'vodi_site_logo_args', array(
						'size' => 'full',
					)
				)
			);

			/**
			 * Declare support for title theme feature.
			 */
			add_theme_support( 'title-tag' );

			/**
			 * Declare support for selective refreshing of widgets.
			 */
			add_theme_support( 'customize-selective-refresh-widgets' );

			/**
			 * Declare support for masvideos.
			 */
			add_theme_support( 'masvideos', array(
				'image_sizes'   => apply_filters( 'vodi_masvideos_image_sizes', array(
					'video_large'       => array(
						'width'     => 640,
						'height'    => 360,
						'crop'      => 1,
					),
					'video_medium'      => array(
						'width'     => 480,
						'height'    => 270,
						'crop'      => 1,
					),
					'video_thumbnail'   => array(
						'width'     => 120,
						'height'    => 67,
						'crop'      => 1,
					),
					'movie_large'       => array(
						'width'     => 600,
						'height'    => 900,
						'crop'      => 1,
					),
					'movie_medium'      => array(
						'width'     => 300,
						'height'    => 450,
						'crop'      => 1,
					),
					'movie_thumbnail'   => array(
						'width'     => 150,
						'height'    => 225,
						'crop'      => 1,
					)
				) ),
			) );

			add_theme_support( 'masvideos-movie-gallery-lightbox' );

			/**
			 * Add support for Block Styles.
			 */
			add_theme_support( 'wp-block-styles' );

			/**
			 * Add support for full and wide align images.
			 */
			add_theme_support( 'align-wide' );

			/**
			 * Add support for editor styles.
			 */
			add_theme_support( 'editor-styles' );

			/**
			 * Enqueue editor styles.
			 */
			if( apply_filters( 'vodi_use_predefined_colors', true ) ) {
				$color_css_file = apply_filters( 'vodi_primary_color', 'blue' );
				$color_css_url = get_template_directory_uri() . '/assets/css/colors/' . $color_css_file . '.css';
			} else {
				$custom_color_css_external_file = redux_apply_custom_color_css_external_file();
				if ( $custom_color_css_external_file ) {
					$color_css_url = $custom_color_css_external_file['url'];
				} else {
					$color_css_url = get_template_directory_uri() . '/assets/css/colors/blue.css';
				}
			}

			$editor_styles = [
				is_rtl() ? 'assets/css/gutenberg-editor-rtl.css' : 'assets/css/gutenberg-editor.css',
				$color_css_url,
				$this->google_fonts(),
			];

			add_editor_style( apply_filters( 'vodi_editor_styles', $editor_styles ) );

			/**
			 * Add support for responsive embedded content.
			 */
			add_theme_support( 'responsive-embeds' );

			/**
			 * Remove support for widget block editor.
			 */
			remove_theme_support( 'widgets-block-editor' );
		}

		/**
		 * Enqueue scripts and styles.
		 *
		 * @since  1.0.0
		 */
		public function scripts() {
			global $vodi_version;

			/**
			 * Styles
			 */
			wp_enqueue_style( 'vodi-style', get_template_directory_uri() . '/style.css', '', $vodi_version );
			wp_style_add_data( 'vodi-style', 'rtl', 'replace' );

			wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.css', '', $vodi_version );

			wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.css', '', $vodi_version );

			wp_enqueue_style( 'vodi-theme', get_template_directory_uri() . '/assets/css/theme.css', '', $vodi_version );
			wp_style_add_data( 'vodi-theme', 'rtl', 'replace' );

			wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css', '', $vodi_version );
			   
			if ( vodi_is_masvideos_activated() ) {
				wp_enqueue_style( 'vodi-masvideos', get_template_directory_uri() . '/assets/css/masvideos.css', '', $vodi_version );
				wp_style_add_data( 'vodi-masvideos', 'rtl', 'replace' );
			}

			if( apply_filters( 'vodi_use_predefined_colors', true ) ) {
				$color_css_file = apply_filters( 'vodi_primary_color', 'blue' );
				wp_enqueue_style( 'vodi-color', get_template_directory_uri() . '/assets/css/colors/' . $color_css_file . '.css', '', $vodi_version );
			}


			/**
			 * Fonts
			 */
			wp_enqueue_style( 'vodi-fonts', $this->google_fonts(), array(), null );

			if( function_exists( 'RUN_WPULIKE' ) ) {
				wp_dequeue_style( 'wp-ulike' );
			}

			/**
			 * Scripts
			 */
			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle' . $suffix . '.js', array( 'jquery' ), $vodi_version, true );

			$waypoints_js_handler = function_exists( 'is_elementor_activated' ) && is_elementor_activated() ? 'elementor-waypoints' : 'waypoints';
			wp_enqueue_script( $waypoints_js_handler,   get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array( 'jquery' ), $vodi_version, true );

			if ( apply_filters( 'vodi_enable_sticky_header', true ) || apply_filters( 'vodi_enable_hh_sticky_header', true ) ) {
				wp_enqueue_script( 'waypoints-sticky',   get_template_directory_uri() . '/assets/js/waypoints-sticky.min.js', array( 'jquery' ), $vodi_version, true );
			}

			if( apply_filters( 'vodi_enable_scrollup', true ) ) {
				wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing.min.js', array( 'jquery' ), $vodi_version, true );
				wp_enqueue_script( 'vodi-scrollup', get_template_directory_uri() . '/assets/js/scrollup.min.js', array( 'jquery' ), $vodi_version, true );
			}

			wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array( 'jquery' ), $vodi_version, true );

			wp_enqueue_script( 'readmore',   get_template_directory_uri() . '/assets/js/readmore.min.js', array( 'jquery' ), '3.0.0', true );

			wp_enqueue_script( 'simplebar', get_template_directory_uri() . '/assets/js/simplebar.min.js', array(), $vodi_version, true );

			wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), $vodi_version, true );
			wp_enqueue_script( 'vodi-slick', get_template_directory_uri() . '/assets/js/vodi-slick' . $suffix . '.js', array( 'jquery', 'slick' ), $vodi_version, true );

			if( apply_filters( 'vodi_enable_live_search', false ) ) {
				wp_enqueue_script( 'jquery-ui-autocomplete' );
			}

			wp_enqueue_script( 'vodi-scripts', get_template_directory_uri() . '/assets/js/vodi' . $suffix . '.js', array( 'jquery' ), $vodi_version, true );

			$vodi_js_options = apply_filters( 'vodi_localize_script_data', array(
				'rtl'                     => is_rtl() ? '1' : '0',
				'enable_live_search'      => apply_filters( 'vodi_enable_live_search', false ),
				'enable_sticky_header'    => apply_filters( 'vodi_enable_sticky_header', true ),
				'enable_hh_sticky_header' => apply_filters( 'vodi_enable_hh_sticky_header', false ),
				'ajax_url'                => admin_url( 'admin-ajax.php' ),
				'deal_countdown_text'     => apply_filters( 'vodi_deal_countdown_timer_clock_text', array(
					'days_text'     => esc_html__( 'Days', 'vodi' ),
					'hours_text'    => esc_html__( 'Hours', 'vodi' ),
					'mins_text'     => esc_html__( 'Mins', 'vodi' ),
					'secs_text'     => esc_html__( 'Secs', 'vodi' ),
				) ),
				'wp_local_time_offset'  => get_option('gmt_offset'),
				'enable_vodi_readmore'  => apply_filters( 'vodi_enable_vodi_readmore', true ),
				'vodi_readmore_data'    => apply_filters( 'vodi_readmore_data', array(
					array(
						'selectors'     => '.single-episode-v1 .episode__description > div, .single-episode-v2 .episode__description > div, .single-episode-v2 .episode__description > div, .single-episode-v4 .episode__short-description > p',
						'options'       => apply_filters( 'vodi_episode_readmore_data', array(
							'moreLink'          => '<a class="maxlist-more" href="#">' . esc_html__( 'Read More', 'vodi' ) . '</a>',
							'lessLink'          => '<a class="maxlist-less" href="#">' . esc_html__( 'Show Less', 'vodi' ) . '</a>',
							'collapsedHeight'   => 47,
							'speed'             => 600,
						) ),
					),
					array(
						'selectors'     => '.single-movie-v1 .movie__description > div, .single-movie-v2 .movie__description > div, .single-movie-v3 .movie__description > div, .single-movie-v4 .movie__info--head .movie__short-description > p',
						'options'       => apply_filters( 'vodi_movie_readmore_data', array(
							'moreLink'          => '<a class="maxlist-more" href="#">' . esc_html__( 'Read More', 'vodi' ) . '</a>',
							'lessLink'          => '<a class="maxlist-less" href="#">' . esc_html__( 'Show Less', 'vodi' ) . '</a>',
							'collapsedHeight'   => 47,
							'speed'             => 600,
						) ),
					),
					array(
						'selectors'     => '.single-video .single-video__description > div',
						'options'       => apply_filters( 'vodi_video_readmore_data', array(
							'moreLink'          => '<a class="maxlist-more" href="#">' . esc_html__( 'Show more', 'vodi' ) . '</a>',
							'lessLink'          => '<a class="maxlist-less" href="#">' . esc_html__( 'Show less', 'vodi' ) . '</a>',
							'collapsedHeight'   => 0,
							'speed'             => 600,
						) ),
					),
				) ),
				'vodi_fancybox_options' => apply_filters( 'vodi_fancybox_options', array(
					'speedIn' => 300,
					'speedOut' => 300,
				) ),
			) );

			wp_localize_script( 'vodi-scripts', 'vodi_options', $vodi_js_options );

			if ( has_nav_menu( 'handheld' ) ) {
				$vodi_l10n = array(
					'expand'   => esc_html__( 'Expand child menu', 'vodi' ),
					'collapse' => esc_html__( 'Collapse child menu', 'vodi' ),
				);

				wp_localize_script( 'vodi-navigation', 'vodiScreenReaderText', $vodi_l10n );
			}

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Enqueue child theme stylesheet.
		 * A separate function is required as the child theme css needs to be enqueued _after_ the parent theme
		 * primary css and the separate WooCommerce css.
		 *
		 * @since  1.0.0
		 */
		public function child_scripts() {
			if ( is_child_theme() ) {
				$child_theme = wp_get_theme( get_stylesheet() );
				wp_enqueue_style( 'vodi-child-style', get_stylesheet_uri(), array(), $child_theme->get( 'Version' ) );
			}
		}

		/**
		 * Enqueue supplemental block editor assets.
		 *
		 * @since 1.0.0
		 */
		public function block_editor_assets() {
			global $vodi_version;

			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			// Scripts.
			wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), $vodi_version, true );
			wp_enqueue_script( 'vodi-slick', get_template_directory_uri() . '/assets/js/vodi-slick' . $suffix . '.js', array( 'jquery', 'slick' ), $vodi_version, true );
		}

		/**
		 * Enqueue supplemental block editor assets.
		 *
		 * @since 1.0.0
		 */
		public function block_assets() {
			global $vodi_version;

			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			// Styles.
			wp_enqueue_style( 'vodi-block-styles', get_template_directory_uri() . '/assets/css/gutenberg-blocks' . $suffix . '.css', false, $vodi_version, 'all' );
			wp_style_add_data( 'vodi-block-styles', 'rtl', 'replace' );
		}

		/**
		 * WordPress 5.6 editor width issue fix.
		 *
		 * @since 1.0.0
		 */
		public function wp_5_6_editor_block_width_fix() {
			if( version_compare( get_bloginfo( 'version' ), '5.6', '>=' ) ) {
				echo '<style>.interface-interface-skeleton__editor { max-width: 100%; }</style>';
			}
		}

		/**
		 * Register Google fonts.
		 *
		 * @since 1.0.0
		 * @return string Google fonts URL for the theme.
		 */
		public function google_fonts() {
			$google_fonts = apply_filters(
				'vodi_google_font_families', array(
					'montserrat' => 'Montserrat:300,400,500,600,700,800',
					'open-sans'  => 'Open+Sans:400,600,700'
				)
			);

			$query_args = array(
				'family' => implode( '%7c', $google_fonts ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
			return $fonts_url;
		}

		/**
		 * Enables template debug mode
		 */
		public function vodi_template_debug_mode() {
			if ( ! defined( 'VODI_TEMPLATE_DEBUG_MODE' ) ) {
				$status_options = get_option( 'woocommerce_status_options', array() );
				if ( ! empty( $status_options['template_debug_mode'] ) && current_user_can( 'manage_options' ) ) {
					define( 'VODI_TEMPLATE_DEBUG_MODE', true );
				} else {
					define( 'VODI_TEMPLATE_DEBUG_MODE', false );
				}
			}
		}

		/**
		 * Register widget area.
		 *
		 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
		 */
		public function widgets_init() {
			$sidebar_args['sidebar_blog'] = array(
				'name'          => esc_html__( 'Blog Sidebar', 'vodi' ),
				'id'            => 'sidebar-blog',
				'description'   => esc_html__( 'Widgets added to this region will appear in the blog and single post page.', 'vodi' ),
				'widget_tags'   => array(
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div></div>',
					'before_title'  => '<div class="widget-header"><span class="widget-title">',
					'after_title'   => '</span></div><div class="widget-body">',
				),
			);

			$sidebar_args['sidebar_movie'] = array(
				'name'        => esc_html__( 'Movie Sidebar', 'vodi' ),
				'id'          => 'sidebar-movie',
				'description' => esc_html__( 'Widgets added to this region will appear on movie pages.', 'vodi' ),
			);

			$sidebar_args['sidebar_tv_show'] = array(
				'name'        => esc_html__( 'TV Show Sidebar', 'vodi' ),
				'id'          => 'sidebar-tv-show',
				'description' => esc_html__( 'Widgets added to this region will appear on tv show pages.', 'vodi' ),
			);

			$sidebar_args['sidebar_video'] = array(
				'name'        => esc_html__( 'Video Sidebar', 'vodi' ),
				'id'          => 'sidebar-video',
				'description' => esc_html__( 'Widgets added to this region will appear on video pages.', 'vodi' ),
			);

			$sidebar_args['movie-filters'] = array(
				'name'        => esc_html__( 'Movie Filters', 'vodi' ),
				'id'          => 'movie-filters',
				'description' => esc_html__( 'Widgets added to this region will appear on movie pages.', 'vodi' ),
			);

			$sidebar_args['video-filters'] = array(
				'name'        => esc_html__( 'Video Filters', 'vodi' ),
				'id'          => 'video-filters',
				'description' => esc_html__( 'Widgets added to this region will appear on video pages.', 'vodi' ),
			);

			$sidebar_args['tv-show-filters'] = array(
				'name'        => esc_html__( 'TV Show Filters', 'vodi' ),
				'id'          => 'tv-show-filters',
				'description' => esc_html__( 'Widgets added to this region will appear on tv-show pages.', 'vodi' ),
			);

			$rows    = intval( apply_filters( 'vodi_footer_widget_rows', 1 ) );
			$regions = intval( apply_filters( 'vodi_footer_widget_columns', 3 ) );
			for ( $row = 1; $row <= $rows; $row++ ) {
				for ( $region = 1; $region <= $regions; $region++ ) {
					$footer_n = $region + $regions * ( $row - 1 ); // Defines footer sidebar ID.
					$footer   = sprintf( 'footer_%d', $footer_n );
					if ( 1 == $rows ) {
						$footer_region_name = sprintf( esc_html__( 'Footer Column %1$d', 'vodi' ), $region );
						$footer_region_description = sprintf( esc_html__( 'Widgets added here will appear in column %1$d of the footer.', 'vodi' ), $region );
					} else {
						$footer_region_name = sprintf( esc_html__( 'Footer Row %1$d - Column %2$d', 'vodi' ), $row, $region );
						$footer_region_description = sprintf( esc_html__( 'Widgets added here will appear in column %1$d of footer row %2$d.', 'vodi' ), $region, $row );
					}
					$sidebar_args[ $footer ] = array(
						'name'        => $footer_region_name,
						'id'          => sprintf( 'footer-%d', $footer_n ),
						'description' => $footer_region_description,
					);
				}
			}

			$sidebar_args = apply_filters( 'vodi_sidebar_args', $sidebar_args );

			foreach ( $sidebar_args as $sidebar => $args ) {

				$widget_tags = array(
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="widget-header"><span class="widget-title">',
					'after_title'   => '</span></div>',
				);

				/**
				 * Dynamically generated filter hooks. Allow changing widget wrapper and title tags. See the list below.
				 *
				 * 'vodi_sidebar_shop_widget_tags'
				 *
				 */
				$filter_hook = sprintf( 'vodi_%s_widget_tags', $sidebar );
				$widget_tags = apply_filters( $filter_hook, $widget_tags );

				if ( is_array( $widget_tags ) ) {
					register_sidebar( $args + $widget_tags );
				}
			}
		}

		/**
		 * Adds custom classes to the array of body classes.
		 *
		 * @param array $classes Classes for the body element.
		 * @return array
		 */
		public function body_classes( $classes ) {
			// Adds a class of group-blog to blogs with more than 1 published author.
			if ( is_multi_author() ) {
				$classes[] = 'group-blog';
			}

			if ( ! function_exists( 'masvideos_breadcrumb' ) ) {
				$classes[]  = 'no-masvideos-breadcrumb';
			}

			if ( is_search() ) {
				$current_post_type = get_query_var( 'post_type' );
				if( ! empty( $current_post_type ) ) {
					$classes[]  = esc_attr( $current_post_type ) . '-search-results';
				}
			}

			/**
			 * What is this?!
			 * Take the blue pill, close this file and forget you saw the following code.
			 * Or take the red pill, filter vodi_make_me_cute and see how deep the rabbit hole goes...
			 */
			$cute = apply_filters( 'vodi_make_me_cute', false );

			if ( true === $cute ) {
				$classes[] = 'vodi-cute';
			}

			if ( function_exists( 'vodi_masvideos_body_classes' ) ) {
				$classes[]  = vodi_masvideos_body_classes();
			}

			if ( ! vodi_is_redux_activated() ) {
				$classes[] = 'no-redux';
			}

			// Layout
			$classes[] = vodi_get_layout();

			// Theme
			$classes[] = vodi_get_theme();

			// Additional Classes
			$classes[] = vodi_get_page_extra_class();

			return $classes;
		}

		public function embed_defaults( $embed_size ) {

			if ( is_sticky() || is_single() ) {
				$embed_size['width']  = 990;
				$embed_size['height'] = 560;
			} else {
				$embed_size['width']  = 480;
				$embed_size['height'] = 270;
			}

			return $embed_size;
		}

		public function required_plugins() {
			global $vodi_version;

			$plugins = apply_filters( 'vodi_tgmpa_plugins', array(

				array(
					'name'                  => esc_html__( 'Envato Market', 'vodi' ),
					'slug'                  => 'envato-market',
					'source'                => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
					'required'              => false,
					'version'               => '2.0.6',
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => '',
				),

				array(
					'name'                  => esc_html__( 'Jetpack', 'vodi' ),
					'slug'                  => 'jetpack',
					'required'              => false,
					'version'               => '9.9.1',
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => '',
				),

				array(
					'name'                  => esc_html__( 'MAS Static Content', 'vodi' ),
					'slug'                  => 'mas-static-content',
					'required'              => true,
					'version'               => '1.0.4',
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => '',
				),

				array(
					'name'                  => esc_html__( 'MAS Videos', 'vodi' ),
					'slug'                  => 'masvideos',
					'required'              => true,
					'version'               => '1.2.6',
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => '',
				),

				array(
					'name'                  => esc_html__( 'Menu Image', 'vodi' ),
					'slug'                  => 'menu-image',
					'required'              => false,
					'version'               => '3.0',
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => '',
				),

				array(
					'name'                  => esc_html__( 'One Click Demo Import', 'vodi' ),
					'slug'                  => 'one-click-demo-import',
					'required'              => false,
					'version'               => '3.0.2',
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => '',
				),

				array(
					'name'                  => esc_html__( 'Redux', 'vodi' ),
					'slug'                  => 'redux-framework',
					'required'              => true,
					'version'               => '4.2.7',
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => '',
				),

				array(
					'name'                  => esc_html__( 'Vodi Extensions', 'vodi' ),
					'slug'                  => 'vodi-extensions',
					'source'                => 'https://transvelo.github.io/vodi/assets/plugins/vodi-extensions.zip',
					'required'              => false,
					'version'               => $vodi_version,
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => '',
				),

				array(
					'name'                  => esc_html__( 'WPForms Lite', 'vodi' ),
					'slug'                  => 'wpforms-lite',
					'required'              => false,
					'version'               => '1.6.8.1',
					'force_activation'      => false,
					'force_deactivation'    => false,
					'external_url'          => '',
				),

			) );

			$config = apply_filters( 'vodi_tgmpa_config', array(
				'domain'            => 'vodi',
				'default_path'      => '',
				'parent_slug'       => 'themes.php',
				'menu'              => 'install-required-plugins',
				'has_notices'       => true,
				'is_automatic'      => false,
				'message'           => '',
				'strings'           => array(
					'page_title'                      => esc_html__( 'Install Required Plugins', 'vodi' ),
					'menu_title'                      => esc_html__( 'Install Plugins', 'vodi' ),
					'installing'                      => esc_html__( 'Installing Plugin: %s', 'vodi' ),
					'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'vodi' ),
					'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'vodi' ),
					'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'vodi' ),
					'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'vodi' ),
					'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'vodi' ),
					'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'vodi' ),
					'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'vodi' ),
					'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'vodi' ),
					'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'vodi' ),
					'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'vodi'  ),
					'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'vodi'  ),
					'return'                          => esc_html__( 'Return to Required Plugins Installer', 'vodi' ),
					'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'vodi' ),
					'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'vodi' ),
					'nag_type'                        => 'updated'
				)
			) );

			tgmpa( $plugins, $config );
		}
	}

endif;

return new Vodi();
