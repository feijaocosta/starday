<?php
if ( ! class_exists( 'Redux' ) ) {
    return;
}

if ( ! class_exists( 'Vodi_Options' ) ) {

    class Vodi_Options {

        public function __construct( ) {
            add_action( 'after_setup_theme', array( $this, 'load_config' ) );
        }

        public static function get_option_name() {
            return 'vodi_options';
        }

        public function load_config() {

            $options        = array( 'general', 'header', 'blog', 'movies', 'tv-shows', 'videos', 'footer', 'style', 'typography' );
            $options_dir    = get_template_directory() . '/inc/redux-framework/options';

            foreach ( $options as $option ) {
                $options_file = $option . '-options.php';
                require_once $options_dir . '/' . $options_file ;
            }

            $sections   = apply_filters( 'vodi_options_sections_args', array( $general_options, $header_options, $footer_options, $blog_options ) );

            if ( vodi_is_masvideos_activated() ) {
                $sections[] = $movies_options;
                $sections[] = $tv_shows_options;
                $sections[] = $videos_options;
            }

            $sections[] = $style_options;
            $sections[] = $typography_options;

            $theme      = wp_get_theme();
            $opt_name   = 'vodi_options';
            $args       = array(
                'opt_name'          => $opt_name,
                'display_name'      => $theme->get( 'Name' ),
                'display_version'   => $theme->get( 'Version' ),
                'allow_sub_menu'    => true,
                'menu_title'        => esc_html__( 'Vodi', 'vodi' ),
                'page_priority'     => 3,
                'page_slug'         => 'theme_options',
                'intro_text'        => '',
                'dev_mode'          => false,
                'customizer'        => true,
                'footer_credit'     => '&nbsp;',
            );

            Redux::set_args( $opt_name, $args );
            Redux::set_sections( $opt_name, $sections );
            Redux::disable_demo();
        }
    }

    new Vodi_Options();
}

if( ! array_key_exists( 'vodi_options' , $GLOBALS ) ) {
    $GLOBALS['vodi_options'] = get_option( 'vodi_options', array() );
}