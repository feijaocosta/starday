<?php
/**
 * Template tags used in Header, Footer and Sidebar
 */
if ( ! function_exists( 'vodi_header_right_start' ) ) {
    /**
     * Displays start of header right
     */
    function vodi_header_right_start() {
        ?><div class="site-header__right"><?php
    }
}

if ( ! function_exists( 'vodi_nav_menu_fallback' ) ) {
    function vodi_nav_menu_fallback( $args ) {

        if ( current_user_can( 'manage_options' ) ) {

            extract( $args );

            $fb_output = null;

            if ( $container ) {
                $fb_output = '<' . $container;

                if ( $container_id )
                    $fb_output .= ' id="' . $container_id . '"';

                if ( $container_class )
                    $fb_output .= ' class="' . $container_class . '"';

                $fb_output .= '>';
            }

            $fb_output .= '<ul';

            if ( $menu_id )
                $fb_output .= ' id="' . $menu_id . '"';

            if ( $menu_class )
                $fb_output .= ' class="' . $menu_class . '"';

            $fb_output .= '>';
            $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">' . esc_html__( 'Add a menu', 'vodi' ) . '</a></li>';
            $fb_output .= '</ul>';

            if ( $container )
                $fb_output .= '</' . $container . '>';

            echo wp_kses_post( $fb_output );
        }

    }
}

if ( ! function_exists( 'vodi_offcanvas_menu' ) ) {
    /**
     * Displays the offcanvas menu in header
     */
    function vodi_offcanvas_menu() {
        if( has_nav_menu( 'offcanvas' ) ) {
            require_once get_template_directory() . '/inc/classes/class-wp-bootstrap-navwalker.php';
            $off_canvas_classes = apply_filters( 'vodi_offcanvas_classes', array(
                'site-header__offcanvas'
            ) );
            ?><div class="<?php echo esc_attr( implode( ' ', $off_canvas_classes ) ); ?>">
                <button class="site-header__offcanvas--toggler navbar-toggler" data-toggle="offcanvas"><?php vodi_get_template( 'templates/svg/menu-toggle-icon.svg' ); ?></button>
                <div class="offcanvas-drawer">
                    <div class="offcanvas-collapse" data-simplebar><?php
                        wp_nav_menu( array(
                            'theme_location'    => 'offcanvas',
                            'container_class'   => 'site_header__offcanvas-nav',
                            'menu_class'        => 'offcanvas-nav yamm',
                            'fallback_cb'       => false,
                            'walker'            => new WP_Bootstrap_Navwalker(),
                            'depth'             => 2,
                        ) );
                    ?></div>
                </div>
            </div><?php
        }
    }
}

if ( ! function_exists( 'vodi_comingsoon_offcanvas_menu' ) ) {
    /**
     * Displays the comingsoon offcanvas menu in header
     */
    function vodi_comingsoon_offcanvas_menu() {
        if( has_nav_menu( 'comingsoon-offcanvas' ) ) {
            ?><div class="site-header__comingsoon-offcanvas">
                <a href="#" class="site-header__btn-link btn" data-toggle="collapse" data-target="#comingsoon-offcanvas" aria-controls="comingsoon-offcanvas" aria-expanded="true">
                    <?php
                     echo '<i class="fas fa-align-justify"></i>'
                    ?>
                </a>
               <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'comingsoon-offcanvas',
                        'container_class'   => 'site-header__comingsoon-offcanvas-menu',
                        'menu_id'           =>  'comingsoon-offcanvas',
                        'menu_class'        => 'comingsoon-offcanvas-nav collapse',
                        'fallback_cb'       => false
                    ) );
                ?>
            </div><?php
        }
    }
}


if ( ! function_exists( 'vodi_landing_back_option' ) ) {
    function vodi_landing_back_option() {
        if ( apply_filters( 'vodi_landing_back_option_button', true ) ) :
            $back_to_home_label = apply_filters( 'vodi_landing_back_option_label', esc_html__( 'Go back to', 'vodi' ) );
            $back_to_home_url = apply_filters( 'vodi_landing_back_option_url', get_home_url() );
            $back_to_home_text = apply_filters( 'vodi_landing_back_option_text', esc_html__( 'Vodi.tv', 'vodi' ) );
            ?>
            <div class="site-header__landing-back-option">
                <?php echo wp_kses_post( $back_to_home_label ); ?>
                <a href="<?php echo esc_url( $back_to_home_url ); ?>">
                    <?php echo wp_kses_post( $back_to_home_text ); ?>
                </a>
            </div><?php
        endif;
    }
}

if ( ! function_exists( 'vodi_header_landing_v2_logo' ) ) {
    /**
     * Displays logo in landing header v2
     */
    function vodi_header_landing_v2_logo() {
        ?><div class="site-header__logo" style="display: flex; justify-content: center;"><?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } elseif ( apply_filters( 'vodi_use_svg_logo', false ) ) {
                ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php vodi_get_template( 'global/landing-logo-svg.php' ); ?></a><?php
            } else {
                ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand"><h1 class="site-title"><?php bloginfo( 'name' ); ?></h1></a><?php
            }
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_header_logo' ) ) {
    /**
     * Displays site logo in header
     */
    function vodi_header_logo() {
        ?><div class="site-header__logo"><?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } elseif ( apply_filters( 'vodi_use_svg_logo', false ) ) {
                ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand"><?php vodi_get_template( 'global/logo-svg.php' ); ?></a><?php
            } else {
                ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand"><h1 class="site-title"><?php bloginfo( 'name' ); ?></h1></a><?php
            }
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_header_v3_logo' ) ) {
    /**
     * Displays site logo in header v3
     */
    function vodi_header_v3_logo() {
        ?><div class="site-header__logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php vodi_get_template( 'global/logo-2-svg.php' ); ?></a></div><?php
    }
}

if ( ! function_exists( 'vodi_header_v4_logo' ) ) {
    /**
     * Displays site logo in header v4
     */
    function vodi_header_v4_logo() {
        ?><div class="site-header__logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php vodi_get_template( 'global/logo-3-svg.php' ); ?></a></div><?php
    }
}

if ( ! function_exists( 'vodi_header_landing_logo' ) ) {
    /**
     * Displays logo in header landing v1
     */
    function vodi_header_landing_logo() {
        ?><div class="site-header__logo"><?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } elseif ( apply_filters( 'vodi_use_svg_logo', false ) ) {
                ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php vodi_get_template( 'global/logo-svg.php' ); ?></a><?php
            } else {
                ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand"><h1 class="site-title"><?php bloginfo( 'name' ); ?></h1></a><?php
            }
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_primary_nav' ) ) {
    /**
     * Displays the primary menu in header
     */
    function vodi_primary_nav() {
        wp_nav_menu( array(
            'theme_location'    => 'primary',
            'container_class'   => 'site_header__primary-nav',
            'menu_class'        => 'nav yamm',
            'fallback_cb'       => 'vodi_nav_menu_fallback',
        ) );
    }
}

if ( ! function_exists( 'vodi_secondary_nav' ) ) {
    /**
     * Displays the secondary menu in header
     */
    function vodi_secondary_nav() {
        wp_nav_menu( array(
            'theme_location'    => 'secondary',
            'container_class'   => 'site_header__secondary-nav',
            'menu_class'        => 'nav yamm',
            'fallback_cb'       => 'vodi_nav_menu_fallback',
        ) );
    }
}

if ( ! function_exists( 'vodi_secondary_nav_v3' ) ) {
    /**
     * Displays the secondary menu in header
     */
    function vodi_secondary_nav_v3() {
        wp_nav_menu( array(
            'theme_location'    => 'secondary-nav-v3',
            'menu_class'        => 'nav yamm',
            'fallback_cb'       => 'vodi_nav_menu_fallback',
        ) );
    }
}

if ( ! function_exists( 'vodi_navbar_primary' ) ) {
    /**
     * Displays the secondary menu in header
     */
    function vodi_navbar_primary() {
        wp_nav_menu( array(
            'theme_location'    => 'navbar-primary',
            'container_class'   => 'site_header__navbar-primary',
            'menu_class'        => 'nav navbar-primary yamm',
            'fallback_cb'       => 'vodi_nav_menu_fallback',
        ) );
    }
}

if ( ! function_exists( 'vodi_landing_nav' ) ) {
    /**
     * Displays the secondary menu in header
     */
    function vodi_landing_nav() {
        wp_nav_menu( array(
            'theme_location'    => 'landing-nav',
            'container_class'   => 'site-header__landing-nav',
            'menu_class'        => 'landing-nav',
            'fallback_cb'       => false,
        ) );
    }
}


if ( ! function_exists( 'vodi_header_right_end' ) ) {
    /**
     * Displays end of header right
     */
    function vodi_header_right_end() {
        ?></div><!-- /.site-header__right --><?php
    }
}

if ( ! function_exists( 'vodi_header_left_start' ) ) {
    /**
     * Displays start of header left
     */
    function vodi_header_left_start() {
        ?><div class="site-header__left"><?php
    }
}

if ( ! function_exists( 'vodi_header_icon_start' ) ) {
    /**
     * Displays start of header icon
     */
    function vodi_header_icon_start() {
        ?><div class="site-header__header-icons"><?php
    }
}

if ( ! function_exists( 'vodi_header_icon_end' ) ) {
    /**
     * Displays end of header icon
     */
    function vodi_header_icon_end() {
        ?></div><!-- /.site-header__header-icon --><?php
    }
}

if ( ! function_exists( 'vodi_header_search' ) ) {
    /**
     * Displays search form in header
     */
    function vodi_header_search() {
        if( apply_filters( 'vodi_enable_header_search', true ) ) {
            ?><div class="site-header__search"><?php vodi_header_search_form( apply_filters( 'vodi_header_search_type', 'video' ) ); ?></div><?php
        }
    }
}

if ( ! function_exists( 'vodi_masthead_v3' ) ) {
    function vodi_masthead_v3() {
        ?><div class="masthead">
            <div class="container-fluid">
                <div class="site-header__inner">
                <?php do_action( 'vodi_masthead_v3' ); ?>
                </div>
            </div>
        </div><?php
    }
}

if ( ! function_exists( 'vodi_masthead_v4' ) ) {
    function vodi_masthead_v4() {
        ?><div class="masthead">
            <div class="site-header__inner">
            <?php do_action( 'vodi_masthead_v4' ); ?>
            </div>
        </div><?php
    }
}

if ( ! function_exists( 'vodi_menu_with_search_bar' ) ) {
    function vodi_menu_with_search_bar() {
        ?><div class="masthead-row-2">
            <div class="container">
                <div class="masthead-row-2__inner">
                    <?php do_action( 'vodi_menu_with_search_bar' ); ?>
                </div>
            </div>
        </div><?php
    }
}

if ( ! function_exists( 'vodi_masthead_v3_search' ) ) {
    /**
     * Displays search form in header v3
     */
    function vodi_masthead_v3_search() {
        if( apply_filters( 'vodi_enable_header_search', true ) ) {
            ?><div class="site-header__search">
                <span class="fas fa-search search-btn"></span>
                <?php vodi_header_search_form( apply_filters( 'vodi_header_search_type', 'video' ) ); ?>
            </div><?php
        }
    }
}

if ( ! function_exists( 'vodi_quick_links' ) ) {
    /**
     * Displays quick links menu
     */
    function vodi_quick_links() {
        $menu_title    = apply_filters( 'vodi_quick_links_title', esc_html__( 'Quick links:', 'vodi' ) );
        ?><div class="vodi-navigation-v3">
            <div class="container-fluid">
                <div class="site_header__secondary-nav-v3">
                    <?php if ( has_nav_menu( 'secondary-nav-v3' ) ) { ?>
                        <span class="nav-title"><?php echo wp_kses_post( $menu_title ); ?></span>
                    <?php } ?>
                <?php vodi_secondary_nav_v3(); ?>
                </div>
            </div>
        </div>
        <?php
    }
}

if ( ! function_exists( 'vodi_header_upload_link' ) ) {
    /**
     * Displays a header upload link
     */
    function vodi_header_upload_link() {
        if ( vodi_is_masvideos_activated() && apply_filters( 'vodi_enable_header_upload_link', true ) ) :
            $upload_url = function_exists( 'masvideos_get_page_permalink' ) ? masvideos_get_page_permalink( 'upload_video' ) : wp_login_url( get_permalink() );
            ?><div class="site-header__upload"><a href="<?php echo esc_url( $upload_url ); ?>" class="site-header__upload--link"><span class="site-header__upload--icon"><?php vodi_get_template( 'templates/svg/upload-icon.svg' ); ?></span><?php echo esc_html__( 'Upload', 'vodi' ); ?></a></div><?php
        endif;
    }
}

if ( ! function_exists( 'vodi_header_notification' ) ) {
    /**
     * Displays a notification in header
     */
    function vodi_header_notification() {
        if ( vodi_is_masvideos_activated() && apply_filters( 'vodi_enable_header_notification', true ) ) :
            ?><div class="site-header__notification"><a href="#" class="site-header__notification--link"><span class="site-header__notification--icon"><?php vodi_get_template( 'templates/svg/notification-icon.svg' ); ?></span></a></div><?php
        endif;
    }
}

if ( ! function_exists( 'vodi_header_user_account' ) ) {
    /**
     * Displays user account in header
     */
    function vodi_header_user_account() {
        if ( apply_filters( 'vodi_enable_header_user_account', true ) ) {
            $myaccount_page_url         = function_exists( 'masvideos_get_page_permalink' ) ? masvideos_get_page_permalink( 'myaccount' ) : wp_login_url( get_permalink() );
            $register_page_url          = apply_filters( 'vodi_header_register_page_url', $myaccount_page_url );
            $login_page_url             = apply_filters( 'vodi_header_login_page_url', $myaccount_page_url );

            if ( is_user_logged_in() ) {
                $user_id      = get_current_user_id();
                $current_user = wp_get_current_user();

                if( function_exists( 'masvideos_user_edit_account_url' ) ) {
                    $profile_url = masvideos_user_edit_account_url();
                } elseif ( current_user_can( 'read' ) ) {
                    $profile_url = get_edit_profile_url( $user_id );
                } elseif ( is_multisite() ) {
                    $profile_url = get_dashboard_url( $user_id, 'profile.php' );
                } else {
                    $profile_url = false;
                }

                $profile_url = apply_filters( 'vodi_header_profile_url', $profile_url );

                $user_info = "<span class='display-name'>{$current_user->display_name}</span>";

                if ( $current_user->display_name !== $current_user->user_login ) {
                    $user_info .= "<span class='username'>{$current_user->user_login}</span>";
                }

                $user_account_menu_items = array(
                    'user-info'    => array(
                        'title'       => $user_info,
                        'href'        => $profile_url,
                    ),
                    'edit-profile' => array(
                        'title'       => esc_html__( 'Edit My Profile', 'vodi' ),
                        'href'        => $profile_url,
                    ),
                );

                if( function_exists( 'masvideos_get_page_permalink' ) && function_exists( 'masvideos_get_endpoint_url' ) ) {
                    $movie_playlists_page_url = masvideos_get_endpoint_url( 'movie-playlists', '', $myaccount_page_url );
                    if( $movie_playlists_page_url ) {
                        $user_account_menu_items['movie-playlists'] = array(
                            'title'       => esc_html__( 'Movie Playlists', 'vodi' ),
                            'href'        => $movie_playlists_page_url,
                        );
                    }

                    $video_playlists_page_url = masvideos_get_endpoint_url( 'video-playlists', '', $myaccount_page_url );
                    if( $video_playlists_page_url ) {
                        $user_account_menu_items['video-playlists'] = array(
                            'title'       => esc_html__( 'Video Playlists', 'vodi' ),
                            'href'        => $video_playlists_page_url,
                        );
                    }

                    $tv_show_playlists_page_url = masvideos_get_endpoint_url( 'tv-show-playlists', '', $myaccount_page_url );
                    if( $tv_show_playlists_page_url ) {
                        $user_account_menu_items['tv-show-playlists'] = array(
                            'title'       => esc_html__( 'TV Show Playlists', 'vodi' ),
                            'href'        => $tv_show_playlists_page_url,
                        );
                    }
                }

                $user_account_menu_items['logout'] = array(
                    'title'       => esc_html__( 'Log Out', 'vodi' ),
                    'href'        => wp_logout_url(),
                );

                $user_account_menu_items = apply_filters( 'vodi_header_user_account_menu_items', $user_account_menu_items );

                ?>
                <div class="site-header__user-account dropdown">
                    <a href="<?php echo esc_url( $profile_url ); ?>" class="site-header__user-account--link" data-toggle="dropdown">
                        <?php echo get_avatar( $user_id, 32 ); ?>
                    </a>
                    <ul class="dropdown-menu sub-menu">
                        <?php foreach ( $user_account_menu_items as $user_account_menu_item ) : ?>
                        <li><a href="<?php echo esc_url( $user_account_menu_item['href'] ); ?>"><?php echo wp_kses_post( $user_account_menu_item['title'] ); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php
            } else {
                $outline_theme = ( apply_filters( 'vodi_header_theme', 'light' ) === 'light' ) ? 'dark' : 'light';
                ?>
                <div class="site-header__user-account dropdown">
                    <a href="<?php echo esc_url( $login_page_url ); ?>" class="site-header__user-account--link" data-toggle="dropdown">
                        <?php vodi_default_user_account_gravatar(); ?>
                    </a>
                    <ul class="dropdown-menu sub-menu">
                        <li><a href="<?php echo esc_url( $login_page_url ); ?>" <?php echo vodi_is_header_register_login_modal_form() ? 'data-toggle="modal" data-target="#modal-register-login"' : ''?>><?php echo esc_html__( 'Sign in', 'vodi' ); ?></a></li>
                        <?php if ( 'yes' === get_option( 'masvideos_enable_myaccount_registration' ) ) : ?>
                            <li><a href="<?php echo esc_url( $register_page_url ); ?>" <?php echo vodi_is_header_register_login_modal_form() ? 'data-toggle="modal" data-target="#modal-register-login"' : ''?>><?php echo esc_html__( 'Register', 'vodi' ); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <?php
            }
        }
    }
}

if ( ! function_exists( 'vodi_is_header_register_login_modal_form' ) ) {
    function vodi_is_header_register_login_modal_form() {
        if( function_exists( 'vodi_is_masvideos_activated' ) && vodi_is_mas_static_content_activated() ) {
            return apply_filters( 'vodi_is_header_register_login_modal_form', true );
        } else {
            return false;
        }
    }
}

if ( ! function_exists( 'vodi_header_register_login_modal_form' ) ) {
    /**
    * Modal Register/Login Form
    *
    * @return void
    * @since  1.0.0
    */
    function vodi_header_register_login_modal_form() {
        if ( vodi_is_header_register_login_modal_form() && ! is_user_logged_in() ) {
            ?>
            <div class="modal-register-login-wrapper">
                <div class="modal fade modal-register-login" id="modal-register-login" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <?php echo vodi_do_shortcode( 'mas_my_account' ); ?>
                                <a class="close-button" data-dismiss="modal" aria-label="<?php echo esc_attr__( 'Close', 'vodi' ) ?>"><i class="la la-close"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}

if ( ! function_exists( 'vodi_header_left_end' ) ) {
    /**
     * Displays end of header left
     */
    function vodi_header_left_end() {
        ?></div><!-- /.site-header__left --><?php
    }
}


if ( ! function_exists( 'vodi_sidebar' ) ) {
    function vodi_sidebar() {

        $layout = vodi_get_layout();

        if ( 'sidebar-right' === $layout || 'sidebar-left' === $layout ) {
            do_action( 'vodi_sidebar' );
        }
    }
}

if ( ! function_exists( 'vodi_get_sidebar' ) ) {
    /**
     * Display vodi sidebar
     * @uses get_sidebar()
     *
     */
    function vodi_get_sidebar( $name = 'blog' ) {

        if ( empty( $name ) ) {
            $name = 'blog';

            if ( is_single() ) {
                $name = str_replace( 'sidebar-', '', apply_filters( 'vodi_single_post_sidebar', 'sidebar-blog' ) );
            }
        }

        get_sidebar( apply_filters( 'vodi_get_sidebar_name', $name ) );
    }
}

if ( ! function_exists( 'vodi_header_search_menu_start' ) ) {
    /**
     * Displays start of masthead
     */
    function vodi_header_search_menu_start() {
        ?><div class="site-header__search-outer"><?php
    }
}

if ( ! function_exists( 'vodi_header_search_menu_end' ) ) {
    /**
     * Displays end of masthead
     */
    function vodi_header_search_menu_end() {
        ?></div><?php
    }
}


if ( ! function_exists( 'vodi_active_videos' ) ) {
    function vodi_active_videos( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_active_videos_default_args', array(
                'section_title'         => '',
                'section_background'    => '',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '3',
                    'limit'                 => '3',
                    'class'                 => '',
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            $section_class = 'home-section vodi-live-videos';

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            ?><div class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="vodi-live-videos__inner">
                        <?php if ( ! empty ( $section_title ) ) {
                            echo '<header class="home-section__header">'; ?>
                                <h2 class="home-section__title">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px">
                                            <path fill-rule="evenodd"  fill="rgb(36, 186, 239)" d="M8.000,16.000 C3.582,16.000 -0.000,12.418 -0.000,8.000 C-0.000,3.581 3.582,-0.000 8.000,-0.000 C12.418,-0.000 16.000,3.581 16.000,8.000 C16.000,12.418 12.418,16.000 8.000,16.000 ZM8.000,1.281 C4.289,1.281 1.281,4.289 1.281,8.000 C1.281,11.710 4.289,14.718 8.000,14.718 C11.711,14.718 14.719,11.710 14.719,8.000 C14.719,4.289 11.711,1.281 8.000,1.281 ZM9.947,9.048 C9.386,9.425 8.782,9.814 8.221,10.192 C8.115,10.263 8.001,10.264 7.895,10.335 C7.432,10.647 7.070,11.065 6.331,10.978 C6.232,10.815 6.093,10.771 6.071,10.513 C5.930,10.288 6.005,9.679 6.005,9.334 C6.005,8.405 6.005,7.475 6.005,6.546 C6.005,6.176 5.951,5.627 6.103,5.402 C6.172,5.152 6.335,5.151 6.494,5.009 C6.993,5.001 7.265,5.300 7.569,5.510 C7.731,5.620 7.896,5.651 8.058,5.760 C8.715,6.203 9.422,6.634 10.078,7.082 C10.460,7.344 10.954,7.445 10.990,8.083 C10.921,8.182 10.925,8.336 10.860,8.441 C10.676,8.736 10.232,8.857 9.947,9.048 Z"/>
                                        </svg>
                                        <?php echo wp_kses_post( $section_title ); ?>
                                    </span>
                                </h2>
                                <?php
                            echo '</header>';
                        } ?>
                        <?php echo vodi_do_shortcode( 'mas_videos', $shortcode_atts ); ?>
                    </div>
                </div>
            </div><?php
        }
    }
}

if ( ! function_exists( 'vodi_handheld_header' ) ) {
    function vodi_handheld_header() {
        ?><header class="handheld-header site-header handheld-stick-this <?php echo esc_attr( apply_filters( 'vodi_header_theme', 'light' ) );?>">
            <div class="container-fluid">
                <div class="site-header__inner">
                    <?php do_action( 'vodi_handheld_header' ); ?>
                </div>
            </div>
        </header><?php
    }
}

if ( ! function_exists( 'vodi_header_search_dropdown' ) ) {
    function vodi_header_search_dropdown() {
        ?><div class="site-header__search">
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php vodi_get_template( 'templates/svg/search-icon.svg' ); ?></a>
                <ul class="dropdown-menu">
                    <li><?php vodi_header_search_form( apply_filters( 'vodi_header_search_type', 'video' ) ); ?></li>
                </ul>
            </div>
        </div><?php
    }
}

if ( ! function_exists( 'vodi_header_static_content' ) ) {
    function vodi_header_static_content() {
        $static_block_id = apply_filters( 'vodi_header_static_content_id', '' );

        if( vodi_is_mas_static_content_activated() && ! empty( $static_block_id ) ) {
            $static_block = get_post( $static_block_id );
            $content = isset( $static_block->post_content ) ? $static_block->post_content : '';
            echo '<div class="header-static-content">' . apply_filters( 'the_content', $content ) . '</div>';
        }
    }
}

if ( ! function_exists( 'vodi_default_user_account_gravatar' ) ) {
    function vodi_default_user_account_gravatar() {
        vodi_get_template( 'templates/svg/user-account-icon.svg' );
    }
}