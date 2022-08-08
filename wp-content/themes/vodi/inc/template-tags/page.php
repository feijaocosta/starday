<?php
/**
 * Template tags used in Page
 */

if ( ! function_exists( 'vodi_get_page_site_header_version' ) ) {
    /**
     * Gets the Header version set in page options
     */
    function vodi_get_page_site_header_version( $header_version ) {
        global $post;

        if ( is_page() && isset( $post->ID ) ) {
            $clean_page_meta_values = get_post_meta( $post->ID, '_vodi_page_metabox', true );
            $page_meta_values = maybe_unserialize( $clean_page_meta_values );

            if ( isset( $page_meta_values['site_header_style'] ) && ! empty( $page_meta_values['site_header_style'] ) ) {
                $header_version = $page_meta_values['site_header_style'];
            }
        }
        
        return $header_version;
    }
}

if ( ! function_exists( 'vodi_get_page_site_header_theme' ) ) {
    /**
     * Gets the Header Theme set in page options
     */
    function vodi_get_page_site_header_theme( $header_theme ) {
        global $post;

        if ( is_page() && isset( $post->ID ) ) {
            $clean_page_meta_values = get_post_meta( $post->ID, '_vodi_page_metabox', true );
            $page_meta_values = maybe_unserialize( $clean_page_meta_values );

            if ( isset( $page_meta_values['header_theme'] ) && ! empty( $page_meta_values['header_theme'] ) ) {
                $header_theme = $page_meta_values['header_theme'];
            }
        }
        
        return $header_theme;
    }
}

if ( ! function_exists( 'vodi_get_page_site_footer_version' ) ) {
    /**
     * Gets the Footer version set in page options
     */
    function vodi_get_page_site_footer_version( $footer_version ) {
        global $post;

        if ( is_page() && isset( $post->ID ) ) {
            $clean_page_meta_values = get_post_meta( $post->ID, '_vodi_page_metabox', true );
            $page_meta_values = maybe_unserialize( $clean_page_meta_values );

            if ( isset( $page_meta_values['site_footer_style'] ) && ! empty( $page_meta_values['site_footer_style'] ) ) {
                $footer_version = $page_meta_values['site_footer_style'];
            }
        }
        
        return $footer_version;
    }
}

if ( ! function_exists( 'vodi_get_page_site_footer_theme' ) ) {
    /**
     * Gets the Header Theme set in page options
     */
    function vodi_get_page_site_footer_theme( $footer_theme ) {
        global $post;

        if ( is_page() && isset( $post->ID ) ) {
            $clean_page_meta_values = get_post_meta( $post->ID, '_vodi_page_metabox', true );
            $page_meta_values = maybe_unserialize( $clean_page_meta_values );

            if ( isset( $page_meta_values['footer_theme'] ) && ! empty( $page_meta_values['footer_theme'] ) ) {
                $footer_theme = $page_meta_values['footer_theme'];
            }
        }
        
        return $footer_theme;
    }
}

if ( ! function_exists( 'vodi_toggle_page_site_content_page_header' ) ) {
    /**
     * Show/Hide Page Header set in page options
     */
    function vodi_toggle_page_site_content_page_header( $show ) {
        global $post;

        if ( is_page() && isset( $post->ID ) ) {
            $clean_page_meta_values = get_post_meta( $post->ID, '_vodi_page_metabox', true );
            $page_meta_values = maybe_unserialize( $clean_page_meta_values );

            if ( ( isset( $page_meta_values['hide_page_header'] ) && $page_meta_values['hide_page_header'] == '1' ) || ( ( isset( $page_meta_values['hide_page_title'] ) && $page_meta_values['hide_page_title'] == '1' ) && ( isset( $page_meta_values['hide_breadcrumb'] ) && $page_meta_values['hide_breadcrumb'] == '1' ) ) ) {
                $show = false;
            }

            if( function_exists( 'masvideos_is_video_upload_page' ) && masvideos_is_video_upload_page() ) {
                $show = false;
            }
        }

        return $show;
    }
}

if ( ! function_exists( 'vodi_toggle_page_breadcrumb' ) ) {
    /**
     * Show/Hide Page Breadcrumb set in page options
     */
    function vodi_toggle_page_breadcrumb( $show ) {
        global $post;

        if ( is_page() && isset( $post->ID ) ) {
            $clean_page_meta_values = get_post_meta( $post->ID, '_vodi_page_metabox', true );
            $page_meta_values = maybe_unserialize( $clean_page_meta_values );

            if ( isset( $page_meta_values['hide_breadcrumb'] ) && $page_meta_values['hide_breadcrumb'] == '1' ) {
                $show = false;
            }
        } elseif( vodi_is_masvideos_activated() && is_videos() ) {
            if( is_search() ) {
                $show = false;
            }
        } elseif ( vodi_is_masvideos_activated() && is_tv_shows() ) {
            if( is_search() ) {
                $show = false;
            }
        } elseif ( vodi_is_masvideos_activated() && is_movies() ) {
            if( is_search() ) {
                $show = false;
            }
        }

        return $show;
    }
}

if ( ! function_exists( 'vodi_toggle_page_site_content_page_title' ) ) {
    /**
     * Show/Hide Page Title set in page options
     */
    function vodi_toggle_page_site_content_page_title( $show ) {
        global $post;

        if ( is_page() && isset( $post->ID ) ) {
            $clean_page_meta_values = get_post_meta( $post->ID, '_vodi_page_metabox', true );
            $page_meta_values = maybe_unserialize( $clean_page_meta_values );

            if ( isset( $page_meta_values['hide_page_title'] ) && $page_meta_values['hide_page_title'] == '1' ) {
                $show = false;
            }
        }

        return $show;
    }
}

if ( ! function_exists( 'vodi_page_site_content_page_title' ) ) {
    /**
     * Gets the Footer version set in page options
     */
    function vodi_page_site_content_page_title( $page_title ) {
        global $post;

        if ( is_page() && isset( $post->ID ) ) {
            $clean_page_meta_values = get_post_meta( $post->ID, '_vodi_page_metabox', true );
            $page_meta_values = maybe_unserialize( $clean_page_meta_values );
            if ( isset( $page_meta_values['page_title'] ) && ! empty( $page_meta_values['page_title'] ) ) {
                $page_title = $page_meta_values['page_title'];
            }
        }

        return $page_title;
    }
}

if ( ! function_exists( 'vodi_get_page_extra_class' ) ) {
    function vodi_get_page_extra_class() {
        global $post;

        $classes = '';
        if ( is_page() && isset( $post->ID ) ) {
            $clean_page_meta_values = get_post_meta( $post->ID, '_vodi_page_metabox', true );
            $page_meta_values = maybe_unserialize( $clean_page_meta_values );
            if( isset( $page_meta_values['body_classes'] ) && ! empty( $page_meta_values['body_classes'] ) ) {
                $classes = $page_meta_values['body_classes'];
            }
        }

        return $classes;
    }
}

if ( ! function_exists( 'vodi_breadcrumb' ) ) {
    function vodi_breadcrumb() {
        if( vodi_is_masvideos_activated() && apply_filters( 'vodi_show_breadcrumb', true ) ) {
            masvideos_breadcrumb( array(
                'delimiter' => '<span class="delimiter"><svg width="4px" height="7px"><path fill-rule="evenodd" d="M3.978,3.702 C3.986,3.785 3.966,3.868 3.903,3.934 L1.038,6.901 C0.920,7.022 0.724,7.029 0.598,6.916 L0.143,6.506 C0.017,6.393 0.010,6.203 0.127,6.082 L2.190,3.945 C2.276,3.829 2.355,3.690 2.355,3.548 C2.355,3.214 1.947,2.884 1.947,2.884 L1.963,2.877 L0.080,0.905 C-0.037,0.783 -0.029,0.593 0.095,0.479 L0.547,0.068 C0.671,-0.045 0.866,-0.039 0.983,0.083 L3.823,3.056 C3.866,3.102 3.875,3.161 3.885,3.218 C3.945,3.267 3.988,3.333 3.988,3.415 L3.988,3.681 C3.988,3.689 3.979,3.694 3.978,3.702 Z"/></svg></span>'
            ) );
        }
    }
}

if ( ! function_exists( 'vodi_container_start' ) ) {
    function vodi_container_start() {
        ?><div class="container"><?php
    }
}

if ( ! function_exists( 'vodi_container_end' ) ) {
    function vodi_container_end() {
        ?></div><!-- /.container --><?php
    }
}

if ( ! function_exists( 'vodi_page_header' ) ) {
    /**
     * Display the page header
     *
     * @since 1.0.0
     */
    function vodi_page_header() {
        global $post;

        if ( is_page() && apply_filters( 'vodi_show_site_content_page_header', true ) ) :
            $style_attr = '';
            if( isset( $post->ID ) && has_post_thumbnail( $post->ID ) ) {
                $bg_img_url = get_the_post_thumbnail_url( $post->ID, 'full' );
                $style_attr = 'background-image: url(' . esc_url( $bg_img_url ) . ');';
            }
            ?>
            <header class="page__header stretch-full-width" <?php if ( ! empty( $style_attr ) ) : ?>style="<?php echo esc_attr( $style_attr );?>"<?php endif; ?>>
                <div class="container">
                    <?php if ( apply_filters( 'vodi_show_site_content_page_title', true ) ) : ?>
                        <h1 class="page__title"><?php echo esc_html( apply_filters( 'vodi_site_content_page_title', get_the_title() ) ); ?></h1>
                    <?php endif; ?>
                    <div class="page__header--aside"><?php do_action( 'vodi_page_header_aside' ); ?></div>
                </div>
            </header><!-- .entry-header -->
            <?php
        endif;
    }
}

if ( ! function_exists( 'vodi_page_header_home_archive_templates' ) ) {
    /**
     * Display the page header for home archive templates
     *
     * @since 1.0.0
     */
    function vodi_page_header_home_archive_templates() {
        if ( is_page() && apply_filters( 'vodi_show_site_content_page_header', true ) ) : ?>
            <header class="page-header">
                <?php if ( apply_filters( 'vodi_show_site_content_page_title', true ) ) : ?>
                    <h1 class="page-title"><?php echo esc_html( apply_filters( 'vodi_site_content_page_title', get_the_title() ) ); ?></h1>
                <?php endif; ?>
            </header><!-- .entry-header -->
        <?php endif;
    }
}

if ( ! function_exists( 'vodi_page_content' ) ) {
    /**
     * Display the post content
     *
     * @since 1.0.0
     */
    function vodi_page_content() {
        ?>
        <div class="page__content">
            <?php the_content(); ?>
            <?php
                wp_link_pages( array(
                    'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'vodi' ) . '<div class="page-links-inner">',
                    'after'       => '</div></div>',
                    'link_before' => '<span class="page-link">',
                    'link_after'  => '</span>'
                ) );
            ?>
        </div><!-- .entry-content -->
        <?php
    }
}

if ( ! function_exists( 'vodi_handheld_before_content_sidebar' ) ) {
    /**
     *  Handheld Sidebar Toggle
     */
    function vodi_handheld_before_content_sidebar() {
        if ( vodi_is_masvideos_activated() && ! ( is_movies() || is_movie_taxonomy() || is_tv_shows()|| is_tv_show_taxonomy() || is_videos() || is_video_taxonomy() || is_page_template( array( 'template-videos-archive.php', 'template-tv-shows-archive.php' ) ) ) ) {
            vodi_handheld_sidebar();
        }
    }
}


if ( ! function_exists( 'vodi_handheld_sidebar' ) ) {
    /**
     * Handheld Sidebar Toggle
     */
    function vodi_handheld_sidebar() {
        $layout = vodi_get_layout();
        if( apply_filters( 'vodi_has_handheld_sidebar', true ) && in_array( $layout, array( 'sidebar-left', 'sidebar-right' ) ) ) {
            $handheld_sidebar_title = apply_filters( 'vodi_handheld_sidebar_title', esc_html__( 'Filters', 'vodi' ) );
            $handheld_sidebar_icon  = apply_filters( 'vodi_handheld_sidebar_icon', 'fas fa-sliders-h' );
            ?><div class="handheld-sidebar-toggle"><button class="btn sidebar-toggler" type="button"><i class="<?php echo esc_attr( $handheld_sidebar_icon ); ?>"></i><span><?php echo esc_html( $handheld_sidebar_title ); ?></span></button></div><?php
        }
    }
}