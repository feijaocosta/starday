<?php
/**
 * Template Tags used in Footer v1
 */

if ( ! function_exists( 'vodi_footer_top_bar_open' ) ) :
    /**
     * Opens .footer-top-bar Div
     */
    function vodi_footer_top_bar_open() {
        if ( apply_filters( 'vodi_enable_footer_logo', true ) || has_nav_menu( 'social-media' ) ) :
        ?><div class="footer-top-bar"><?php
        endif;
    }

endif;

if ( ! function_exists( 'vodi_footer_logo' ) ) :
    /**
     * Displays Vodi Footer Logo
     */
    function vodi_footer_logo() {
        if ( apply_filters( 'vodi_enable_footer_logo', true ) ) {
            $seperate_logo = apply_filters( 'vodi_separate_footer_logo', '' );
            ?><div class="site-footer__logo footer-logo"><?php
                if( apply_filters( 'vodi_enable_seperate_footer_logo', true ) && !empty( $seperate_logo ) ) {
                    ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php
                        echo wp_get_attachment_image( $seperate_logo['id'], array( get_theme_support( 'custom-logo', 'width' ), get_theme_support( 'custom-logo', 'height' ) ) );
                    ?></a><?php
                } elseif( has_custom_logo() ) {
                    the_custom_logo();
                } elseif ( apply_filters( 'vodi_use_svg_logo', false ) ) {
                    ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php vodi_get_template( 'global/logo-svg.php' ); ?></a><?php
                } else {
                    ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h1 class="site-title"><?php bloginfo( 'name' ); ?></h1></a><?php
                }
            ?></div><?php
        }
    }

endif;

if ( ! function_exists( 'vodi_footer_top_bar_social' ) ) :
    /**
     * Displays Social Icons in Top Bar
     */
    function vodi_footer_top_bar_social() {
        if ( has_nav_menu( 'social-media' ) ) :
            wp_nav_menu( array(
                'theme_location'  => 'social-media',
                'container_class' => 'footer-social-icons social-label',
                'menu_class'      => 'social-icons',
                'anchor_class'    => 'footer-social-icon',
                'depth'           => 1,
                'fallback_cb'     => false,
                'walker'          => new Vodi_Social_Media_Navwalker(),
                'icon_before'     => '<span class="fa-stack"><i class="fas fa-circle fa-stack-2x"></i>',
                'icon_class'      => array( 'fa-stack-1x fa-inverse' ),
                'icon_after'      => '</span>',
            ) );
        endif;
    }

endif;

if ( ! function_exists( 'vodi_footer_top_bar_close' ) ) :
    /**
     * Closes .footer-top-bar div
     */
    function vodi_footer_top_bar_close() {
        if ( apply_filters( 'vodi_enable_footer_logo', true ) || has_nav_menu( 'social-media' ) ) :
        ?></div><!-- /.footer-top-bar --><?php
        endif;
    }

endif;

if ( ! function_exists( 'vodi_footer_widgets' ) ) :
    /**
     * Display the footer widget regions.
     *
     * @since  1.0.0
     * @return void
     */
    function vodi_footer_widgets() {
        
        if( apply_filters( 'vodi_footer_widgets', true  ) ) {

            $rows    = intval( apply_filters( 'vodi_footer_widget_rows', 1 ) );
            $regions = intval( apply_filters( 'vodi_footer_widget_columns', 3 ) );
            for ( $row = 1; $row <= $rows; $row++ ) :
                // Defines the number of active columns in this footer row.
                for ( $region = $regions; 0 < $region; $region-- ) {
                    if ( is_active_sidebar( 'footer-' . strval( $region + $regions * ( $row - 1 ) ) ) ) {
                        $columns = $region;
                        break;
                    }
                }

                if ( isset( $columns ) ) : ?>
                    <div class="footer-widgets">
                        <div class=<?php echo '"footer-widgets-inner row-' . strval( $row ) . ' col-' . strval( $columns ) . ' fix"'; ?>><?php
                            for ( $column = 1; $column <= $columns; $column++ ) :
                                $footer_n = $column + $regions * ( $row - 1 );
                                if ( is_active_sidebar( 'footer- ' . strval( $footer_n ) ) ) : ?>
                                    <div class="block footer-widget-<?php echo strval( $column ); ?>">
                                        <?php dynamic_sidebar( 'footer-' . strval( $footer_n ) ); ?>
                                    </div><?php
                                endif;
                            endfor; ?>
                        </div>
                    </div><!-- .footer-widgets.row-<?php echo strval( $row ); ?> --><?php
                    unset( $columns );
                endif;
            endfor;
        }
    }
endif;

if ( ! function_exists( 'vodi_footer_bottom_bar_open' ) ) :
    /**
     * Opens .footer-bottom-bar div
     */
    function vodi_footer_bottom_bar_open() { ?>
        <div class="footer-bottom-bar">
            <div class="container">
                <div class="footer-bottom-bar-inner"><?php 
    }
endif;

if ( ! function_exists( 'vodi_footer_credit' ) ) : 
    /**
     * Displays Footer Credit
     */
    function vodi_footer_credit() { 
        $copyright_text = trim( apply_filters( 'vodi_copyright_text', sprintf( esc_html__( 'Copyright &copy; %s, %s. All Rights Reserved', 'vodi' ), date( 'Y' ), get_bloginfo( 'name' ) ) ) );
        if ( ! empty( $copyright_text ) ) : ?>
            <div class="site-footer__info site-info">
                <?php echo wp_kses_post( $copyright_text ); ?>
            </div><!-- .site-info --><?php
        endif;
    }
endif;

if ( ! function_exists( 'vodi_footer_quick_links' ) ) : 
    /**
     * Displays Footer Quick Links
     */
    function vodi_footer_quick_links() {
        if ( has_nav_menu( 'footer-quick-links' ) ) :
            wp_nav_menu( array(
                'theme_location'  => 'footer-quick-links',
                'container'       => false,
                'menu_class'      => 'footer-quick-links nav',
                'fallback_cb'     => false,
                'depth'           => 1
            ) );
        endif;
    }
endif;

if ( ! function_exists( 'vodi_footer_bottom_bar_close' ) ) :
    /**
     * Closes .footer-bottom-bar div
     */
    function vodi_footer_bottom_bar_close() {
                ?></div>
            </div>
        </div><!-- /.footer-bottom-bar --><?php
    }
endif;