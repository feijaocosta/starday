<?php
/**
 * Vod functions.
 *
 * @package vodi
 */
if ( ! function_exists( 'vodi_is_landing_page' ) ) {
    function vodi_is_landing_page() {
        return is_page_template( array( 'template-landingpage-v2.php', 'template-landingpage-v1.php', 'template-comingsoon.php' ) );
    }
}

if( ! function_exists( 'vodi_is_redux_activated' ) ) {
    /**
     * Check if Redux Framework is activated
     */

    function vodi_is_redux_activated() {
        return class_exists( 'ReduxFrameworkPlugin' ) ? true : false;
    }
}

if ( ! function_exists( 'vodi_is_woocommerce_activated' ) ) {
    /**
     * Query WooCommerce activation
     */
    function vodi_is_woocommerce_activated() {
        return class_exists( 'WooCommerce' ) ? true : false;
    }
}

if ( ! function_exists( 'vodi_is_jetpack_activated' ) ) {
    function vodi_is_jetpack_activated() {
        return class_exists( 'Jetpack' ) ? true : false;
    }
}

if ( ! function_exists( 'vodi_is_masvideos_activated' ) ) {
    function vodi_is_masvideos_activated() {
        return class_exists( 'MasVideos' ) ? true : false;
    }
}

if ( ! function_exists( 'vodi_is_mas_static_content_activated' ) ) {
    function vodi_is_mas_static_content_activated() {
        return class_exists( 'Mas_Static_Content' ) ? true : false;
    }
}

if( ! function_exists( 'vodi_is_ocdi_activated' ) ) {
    /**
     * Check if One Click Demo Import is activated
     */
    function vodi_is_ocdi_activated() {
        return class_exists( 'OCDI_Plugin' ) ? true : false;
    }
}

if ( function_exists( 'vodi_is_masvideos_activated' ) && vodi_is_masvideos_activated() ) {
    require_once get_template_directory() . '/inc/masvideos/functions.php';
    require_once get_template_directory() . '/inc/masvideos/classes/class-vodi-shortcode-movies.php';
    require_once get_template_directory() . '/inc/masvideos/classes/class-vodi-shortcode-videos.php';
    require_once get_template_directory() . '/inc/masvideos/classes/class-vodi-shortcode-tv-shows.php';
    require_once get_template_directory() . '/inc/masvideos/classes/class-vodi-masvideos-helper.php';
    require_once get_template_directory() . '/inc/masvideos/classes/class-vodi-movie-taxonomies.php';
    require_once get_template_directory() . '/inc/masvideos/classes/class-vodi-tv-show-taxonomies.php';
    require_once get_template_directory() . '/inc/masvideos/classes/class-vodi-video-taxonomies.php';
}

/**
 * Call a shortcode function by tag name.
 *
 * @since  1.0.0
 *
 * @param string $tag     The shortcode whose function to call.
 * @param array  $atts    The attributes to pass to the shortcode function. Optional.
 * @param array  $content The shortcode's content. Default is null (none).
 *
 * @return string|bool False on failure, the result of the shortcode on success.
 */
function vodi_do_shortcode( $tag, array $atts = array(), $content = null ) {
    global $shortcode_tags;

    if ( ! isset( $shortcode_tags[ $tag ] ) ) {
        return false;
    }

    return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
}

/**
 * Get the content background color
 *
 * @since  1.0.0
 * @return string the background color
 */
function vodi_get_content_background_color() {

    $bg_color = str_replace( '#', '', get_theme_mod( 'background_color' ) );
    return '#' . $bg_color;
}

/**
 * Apply inline style to the Vodi header.
 *
 * @uses  get_header_image()
 * @since  1.0.0
 */
function vodi_header_styles() {
    $is_header_image = get_header_image();
    $header_bg_image = '';

    if ( $is_header_image ) {
        $header_bg_image = 'url(' . esc_url( $is_header_image ) . ')';
    }

    $styles = array();

    if ( '' !== $header_bg_image ) {
        $styles['background-image'] = $header_bg_image;
    }

    $styles = apply_filters( 'vodi_header_styles', $styles );

    foreach ( $styles as $style => $value ) {
        echo esc_attr( $style . ': ' . $value . '; ' );
    }
}

/**
 * Apply inline style to the Vodi homepage content.
 *
 * @uses  get_the_post_thumbnail_url()
 * @since  1.0.0
 */
function vodi_homepage_content_styles() {
    $featured_image   = get_the_post_thumbnail_url( get_the_ID() );
    $background_image = '';

    if ( $featured_image ) {
        $background_image = 'url(' . esc_url( $featured_image ) . ')';
    }

    $styles = array();

    if ( '' !== $background_image ) {
        $styles['background-image'] = $background_image;
    }

    $styles = apply_filters( 'vodi_homepage_content_styles', $styles );

    foreach ( $styles as $style => $value ) {
        echo esc_attr( $style . ': ' . $value . '; ' );
    }
}

/**
 * Adjust a hex color brightness
 * Allows us to create hover styles for custom link colors
 *
 * @param  strong  $hex   hex color e.g. #111111.
 * @param  integer $steps factor by which to brighten/darken ranging from -255 (darken) to 255 (brighten).
 * @return string        brightened/darkened hex color
 * @since  1.0.0
 */
function vodi_adjust_color_brightness( $hex, $steps ) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter.
    $steps  = max( -255, min( 255, $steps ) );

    // Format the hex color string.
    $hex    = str_replace( '#', '', $hex );

    if ( 3 == strlen( $hex ) ) {
        $hex    = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
    }

    // Get decimal values.
    $r  = hexdec( substr( $hex, 0, 2 ) );
    $g  = hexdec( substr( $hex, 2, 2 ) );
    $b  = hexdec( substr( $hex, 4, 2 ) );

    // Adjust number of steps and keep it inside 0 to 255.
    $r  = max( 0, min( 255, $r + $steps ) );
    $g  = max( 0, min( 255, $g + $steps ) );
    $b  = max( 0, min( 255, $b + $steps ) );

    $r_hex  = str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
    $g_hex  = str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
    $b_hex  = str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );

    return '#' . $r_hex . $g_hex . $b_hex;
}

/**
 * Sanitizes choices (selects / radios)
 * Checks that the input matches one of the available choices
 *
 * @param array $input the available choices.
 * @param array $setting the setting object.
 * @since  1.0.0
 */
function vodi_sanitize_choices( $input, $setting ) {
    // Ensure input is a slug.
    $input = sanitize_key( $input );

    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Checkbox sanitization callback.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 * @since  1.0.0
 */
function vodi_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Vodi Sanitize Hex Color
 *
 * @param string $color The color as a hex.
 * @todo remove in 2.1.
 */
function vodi_sanitize_hex_color( $color ) {
    _deprecated_function( 'vodi_sanitize_hex_color', '2.0', 'sanitize_hex_color' );

    if ( '' === $color ) {
        return '';
    }

    // 3 or 6 hex digits, or the empty string.
    if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
        return $color;
    }

    return null;
}

/**
 * Run textarea with iframe.
 *
 * @since  1.0.0
 * @param  string $var Data to sanitize.
 * @return string
 */
function vodi_sanitize_textarea_iframe( $var ) {
    $allowed_tags = wp_kses_allowed_html( 'post' );
    // iframe
    $allowed_tags['iframe'] = array(
        'src'             => array(),
        'height'          => array(),
        'width'           => array(),
        'frameborder'     => array(),
        'allowfullscreen' => array(),
    );
    return wp_kses( $var, $allowed_tags );
}

/**
 * Run textarea with SVG.
 *
 * @since  1.0.0
 * @param  string $var Data to sanitize.
 * @return string
 */
function vodi_sanitize_textarea_svg( $var ) {
    $kses_defaults = wp_kses_allowed_html( 'post' );

    $svg_args = array(
        'svg'   => array(
            'id' => true,
            'class' => true,
            'aria-hidden' => true,
            'aria-labelledby' => true,
            'data-name' => true,
            'role' => true,
            'xmlns' => true,
            'width' => true,
            'height' => true,
            'viewbox' => true, // <= Must be lower case!
        ),
        'g'     => array( 'fill' => true ),
        'title' => array( 'title' => true ),
        'path'  => array( 'class' => true, 'd' => true, 'fill' => true,  ),
        'defs'  => true,
        'style' => true,
    );

    $allowed_tags = array_merge( $kses_defaults, $svg_args );

    return wp_kses( $var, $allowed_tags );
}

function vodi_number_format_i18n( $n ) {
    // first strip any formatting;
    $n = ( 0 + str_replace( ",", "", $n ) );

    // is this a number?
    if( ! is_numeric( $n ) ) {
        return $n;
    }

    // now filter it;
    if( $n >= 1000000000000 ) {
        return round( ( $n/1000000000000 ), 1 ) . 'T';
    } elseif( $n >= 1000000000 ) {
        return round( ( $n/1000000000 ), 1 ) . 'B';
    } elseif( $n >= 1000000 ) {
        return round( ( $n/1000000 ), 1 ) . 'M';
    } elseif( $n >= 1000 ) {
        return round( ( $n/1000 ), 1 ) . 'K';
    }

    return number_format_i18n( $n );
}

if ( ! function_exists( 'vodi_get_social_networks' ) ) {
    /**
     * List of all available social networks
     *
     * @return array array of all social networks and its details
     */
    function vodi_get_social_networks() {
        return apply_filters( 'vodi_get_social_networks', array(
            'facebook'      => array(
                'label' => esc_html__( 'Facebook', 'vodi' ),
                'icon'  => 'fab fa-facebook-f',
                'id'    => 'facebook_link',
                'link'  => '#'
            ),
            'twitter'       => array(
                'label' => esc_html__( 'Twitter', 'vodi' ),
                'icon'  => 'fab fa-twitter',
                'id'    => 'twitter_link',
                'link'  => '#'
            ),
            'whatsapp-mobile'   => array(
                'label' => esc_html__( 'Whatsapp Mobile', 'vodi' ),
                'icon'  => 'fab fa-whatsapp mobile',
                'id'    => 'whatsapp_mobile_link',
            ),
            'whatsapp-desktop'  => array(
                'label' => esc_html__( 'Whatsapp Desktop', 'vodi' ),
                'icon'  => 'fab fa-whatsapp desktop',
                'id'    => 'whatsapp_desktop_link',
            ),
            'pinterest'     => array(
                'label' => esc_html__( 'Pinterest', 'vodi' ),
                'icon'  => 'fab fa-pinterest',
                'id'    => 'pinterest_link',
            ),
            'linkedin'      => array(
                'label' => esc_html__( 'LinkedIn', 'vodi' ),
                'icon'  => 'fab fa-linkedin',
                'id'    => 'linkedin_link',
            ),
            'googleplus'    => array(
                'label' => esc_html__( 'Google+', 'vodi' ),
                'icon'  => 'fab fa-google-plus-g',
                'id'    => 'googleplus_link',
                'link'  => '#'
            ),
            'tumblr'    => array(
                'label' => esc_html__( 'Tumblr', 'vodi' ),
                'icon'  => 'fab fa-tumblr',
                'id'    => 'tumblr_link'
            ),
            'instagram'     => array(
                'label' => esc_html__( 'Instagram', 'vodi' ),
                'icon'  => 'fab fa-instagram',
                'id'    => 'instagram_link'
            ),
            'youtube'       => array(
                'label' => esc_html__( 'Youtube', 'vodi' ),
                'icon'  => 'fab fa-youtube',
                'id'    => 'youtube_link'
            ),
            'vimeo'         => array(
                'label' => esc_html__( 'Vimeo', 'vodi' ),
                'icon'  => 'fab fa-vimeo-square',
                'id'    => 'vimeo_link'
            ),
            'dribbble'      => array(
                'label' => esc_html__( 'Dribbble', 'vodi' ),
                'icon'  => 'fab fa-dribbble',
                'id'    => 'dribbble_link',
                'link'  => '#'
            ),
            'stumbleupon'   => array(
                'label' => esc_html__( 'StumbleUpon', 'vodi' ),
                'icon'  => 'fab fa-stumbleupon',
                'id'    => 'stumble_upon_link'
            ),
            'soundcloud'    => array(
                'label' => esc_html__('Sound Cloud', 'vodi'),
                'id'    => 'soundcloud_link',
                'icon'  => 'fab fa-soundcloud',
            ),

            'vine'           => array(
                'label' => esc_html__('Vine', 'vodi'),
                'id'    => 'vine_link',
                'icon'  => 'fab fa-vine',
            ),

            'vk'              => array(
                'label' => esc_html__('VKontakte', 'vodi'),
                'id'    => 'vk_link',
                'icon'  => 'fab fa-vk',
            ),

            'telegram'        => array(
                'label' => esc_html__('Telegram', 'vodi'),
                'id'    => 'telegram_link',
                'icon'  => 'fab fa-telegram-plane',
            ),

            'rss'           => array(
                'label' => esc_html__( 'RSS', 'vodi' ),
                'icon'  => 'fas fa-rss',
                'id'    => 'rss_link',
                'link'  => get_bloginfo( 'rss2_url' ),
            )
        ) );
    }
}

if ( ! function_exists( 'vodi_pr' ) ) {
    function vodi_pr( $var ) {
        echo '<pre>' . print_r( $var, 1 ) . '</pre>';
    }
}

/**
 * Get other templates (e.g. product attributes) passing attributes and including the file.
 *
 * @access public
 * @param string $template_name
 * @param array $args (default: array())
 * @param string $template_path (default: '')
 * @param string $default_path (default: '')
 * @return void
 */
function vodi_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
    if ( $args && is_array( $args ) ) {
        extract( $args );
    }
    $located = vodi_locate_template( $template_name, $template_path, $default_path );
    if ( ! file_exists( $located ) ) {
        _doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $located ), '2.1' );
        return;
    }
    // Allow 3rd party plugin filter template file from their plugin
    $located = apply_filters( 'vodi_get_template', $located, $template_name, $args, $template_path, $default_path );
    do_action( 'vodi_before_template_part', $template_name, $template_path, $located, $args );
    include( $located );
    do_action( 'vodi_after_template_part', $template_name, $template_path, $located, $args );
}
/**
 * Locate a template and return the path for inclusion.
 *
 * This is the load order:
 *
 *      yourtheme       /   $template_path  /   $template_name
 *      yourtheme       /   $template_name
 *      $default_path   /   $template_name
 *
 * @access public
 * @param string $template_name
 * @param string $template_path (default: '')
 * @param string $default_path (default: '')
 * @return string
 */
function vodi_locate_template( $template_name, $template_path = '', $default_path = '' ) {
    if ( ! $template_path ) {
        $template_path = 'templates/';
    }
    if ( ! $default_path ) {
        $default_path = 'templates/';
    }
    // Look within passed path within the theme - this is priority
    $template = locate_template(
        array(
            trailingslashit( $template_path ) . $template_name,
            $template_name
        )
    );
    // Get default template
    if ( ! $template || VODI_TEMPLATE_DEBUG_MODE ) {
        $template = $default_path . $template_name;
    }
    // Return what we found
    return apply_filters( 'vodi_locate_template', $template, $template_name, $template_path );
}

if ( ! function_exists( 'vodi_get_layout' ) ) {
    /**
     * Returns the layout for a given page in Vodi
     */
    function vodi_get_layout() {
        $layout = 'sidebar-right';

        if ( is_front_page() && is_home() ) {
           // Default homepage
            $layout = is_active_sidebar( 'sidebar-blog' ) ? apply_filters( 'vodi_blog_layout', 'sidebar-right' ) : 'full-width';

        } elseif ( vodi_is_masvideos_activated() && ( is_movies() || is_movie_taxonomy() ) ) {
            $layout = is_active_sidebar( 'sidebar-movie' ) || is_active_sidebar( 'movie-filters' ) ? apply_filters( 'vodi_movies_layout', 'sidebar-left' ) : 'full-width';

        } elseif ( vodi_is_masvideos_activated() && ( is_tv_shows() || is_tv_show_taxonomy() || is_page_template( array( 'template-tv-shows-archive.php' ) ) ) ) {
            $layout = is_active_sidebar( 'sidebar-tv-show' ) || is_active_sidebar( 'tv-show-filters' ) ? apply_filters( 'vodi_tv_shows_layout', 'sidebar-left' ) : 'full-width';

        } elseif ( vodi_is_masvideos_activated() && ( is_videos() || is_video_taxonomy() || is_page_template( array( 'template-videos-archive.php' ) ) ) ) {
            $layout = is_active_sidebar( 'sidebar-video' ) || is_active_sidebar( 'video-filters' ) ? apply_filters( 'vodi_videos_layout', 'sidebar-left' ) : 'full-width';

        } elseif ( vodi_is_masvideos_activated() && ( ( function_exists( 'is_persons' ) && is_persons() ) || ( function_exists( 'is_person_taxonomy' ) && is_person_taxonomy() ) ) ) {
            $layout = 'full-width';

        } elseif ( is_page_template( array( 'template-page-sidebar-left.php' ) ) ) {
            $layout = 'sidebar-left';

        } elseif ( is_page_template( array( 'template-page-sidebar-right.php' ) ) ) {
            $layout = 'sidebar-right';

        } elseif ( is_front_page() ) {
           // static homepage
            $layout = 'full-width';

        } elseif ( is_home() ) {
           // blog page
            $layout = is_active_sidebar( 'sidebar-blog' ) ? apply_filters( 'vodi_blog_layout', 'sidebar-right' ) : 'full-width';

        } elseif( 'post' == get_post_type() && ( is_category() || is_tag() || is_author() || is_date() || is_year() || is_month() || is_time() ) ) {
            // post archive pages
            $layout = is_active_sidebar( 'sidebar-blog' ) ? apply_filters( 'vodi_blog_layout', 'sidebar-right' ) : 'full-width';

        } elseif ( is_404() ) {
            $layout = 'full-width';

        } elseif ( is_page() ) {
            $layout = 'full-width';

        } elseif ( is_single() ) {
            $single_post_sidebar = apply_filters( 'vodi_single_post_sidebar', 'sidebar-blog' );
            
            if ( vodi_is_masvideos_activated() && is_movie() ) {
                $layout = apply_filters( 'vodi_movie_layout', 'full-width' );
            } elseif ( vodi_is_masvideos_activated() && is_episode() ) {
                 $layout = apply_filters( 'vodi_episode_layout', 'full-width' );
            } elseif ( vodi_is_masvideos_activated() && is_video() ) {
                 $layout = apply_filters( 'vodi_video_layout', 'full-width' );
            } elseif ( vodi_is_masvideos_activated() && is_tv_show() ) {
                 $layout = apply_filters( 'vodi_tv_show_layout', 'full-width' );
            } elseif ( vodi_is_masvideos_activated() && function_exists( 'is_person' ) && is_person() ) {
                $layout = apply_filters( 'vodi_person_layout', 'full-width' );
            } else {
                $layout = is_active_sidebar( $single_post_sidebar ) ? apply_filters( 'vodi_single_post_layout', 'sidebar-right' ) : 'full-width';    
            }

        }

        return apply_filters( 'vodi_get_layout', $layout );
    }
}


if ( ! function_exists( 'vodi_get_theme' ) ) {
    /**
     * Returns the theme for a given page in Vodi
     */
    function vodi_get_theme() {
        $theme = apply_filters( 'vodi_blog_theme', 'light' );

        if ( vodi_is_masvideos_activated() && ( is_movies() || is_movie_taxonomy() ) ) {
            $theme = apply_filters( 'vodi_movies_theme', 'dark' );
        } elseif ( vodi_is_masvideos_activated() && ( is_tv_shows() || is_tv_show_taxonomy() || is_page_template( array( 'template-tv-shows-archive.php' ) ) ) ) {
            $theme = apply_filters( 'vodi_tv_shows_theme', 'dark' );
        } elseif ( vodi_is_masvideos_activated() && ( is_videos() || is_video_taxonomy() || is_page_template( array( 'template-videos-archive.php' ) ) ) ) {
            $theme = apply_filters( 'vodi_videos_theme', 'light' );
        } elseif ( vodi_is_masvideos_activated() && is_movie() ) {
            $theme = apply_filters( 'vodi_movie_theme', 'dark' );
        } elseif ( vodi_is_masvideos_activated() && is_episode() ) {
            $theme = apply_filters( 'vodi_episode_theme', 'dark' );
        } elseif ( vodi_is_masvideos_activated() && is_tv_show() ) {
            $theme = apply_filters( 'vodi_tv_show_theme', 'dark' );
        } elseif ( vodi_is_masvideos_activated() && ( ( function_exists( 'is_persons' ) && is_persons() ) || ( function_exists( 'is_person_taxonomy' ) && is_person_taxonomy() ) || ( function_exists( 'is_person' ) && is_person() ) ) ) {
            $theme = apply_filters( 'vodi_persons_theme', 'dark' );
            if( is_person() ) {
                $theme = apply_filters( 'vodi_single_person_theme', 'dark' );
            }
        } elseif( vodi_is_landing_page() ) {
            // Comingsoon and Landing Page Templates
            $theme = apply_filters( 'vodi_landing_page_theme', '' );
        } elseif ( is_page() ) {
            // Default Page Templates
            $theme = apply_filters( 'vodi_page_theme', '' );
        }

        return apply_filters( 'vodi_get_theme', $theme );
    }
}

if ( ! function_exists( 'vodi_sticky_classes' ) ) {
    function vodi_sticky_classes( $classes, $class, $post_id ) {
        if ( ! is_sticky() ) {
            return $classes;
        }

        $classes[] = 'vodi-sticky';

        return $classes;
    }
}
add_filter( 'post_class', 'vodi_sticky_classes', 10, 3 );

if ( ! function_exists( 'vodi_get_previous_post_ids' ) ) {
    function vodi_get_previous_post_ids( $limit = 3 ) {
        $ids = array();

        if ( is_single() ) {
            global $post;

            $current_post = $post;

            for( $i = 1; $i <= $limit; $i++ ) {
                $post = get_previous_post();
                if ( ! empty( $post ) ) {
                    setup_postdata( $post );
                    $ids[] = $post->ID;
                } else {
                    break;
                }
            }

            wp_reset_postdata();
            $post = $current_post;
        }

        return array_reverse( $ids );
    }
}

if ( ! function_exists( 'vodi_get_next_post_ids' ) ) {
    function vodi_get_next_post_ids( $limit = 3 ) {
        $ids = array();

        if ( is_single() ) {
            global $post;

            $current_post = $post;

            for( $i = 1; $i <= $limit; $i++ ) {
                $post = get_next_post();
                if ( ! empty( $post ) ) {
                    setup_postdata( $post );
                    $ids[] = $post->ID;
                } else {
                    break;
                }
            }

            wp_reset_postdata();
            $post = $current_post;
        }

        return $ids;
    }
}

if ( ! function_exists( 'vodi_get_recent_comment_post_ids' ) ) {
    function vodi_get_recent_comment_post_ids( $args = array() ) {
        $post_ids = array();
        $comments = get_comments( $args );

        if ( $comments ) {
            foreach ( $comments as $c ) {
                $post_ids[] = $c->comment_post_ID;
            }
        }

        return $post_ids;
    }
}

require_once get_template_directory() . '/inc/functions/media.php';
require_once get_template_directory() . '/inc/functions/home.php';
require_once get_template_directory() . '/inc/functions/header.php';
require_once get_template_directory() . '/inc/functions/footer.php';
require_once get_template_directory() . '/inc/functions/article.php';
require_once get_template_directory() . '/inc/functions/menu.php';