<?php
/**
 * Filter functions for Blog Section of Theme Options
 */
if ( ! function_exists( 'redux_apply_blog_layout' ) ) {
    function redux_apply_blog_layout( $layout ) {
        global $vodi_options;

        if( isset( $vodi_options['blog_layout'] ) && !empty( $vodi_options['blog_layout'] ) ) {
            $layout = $vodi_options['blog_layout'];
        }

        return $layout;
    }
}

if ( ! function_exists( 'redux_apply_blog_theme' ) ) {
    function redux_apply_blog_theme( $theme ) {
        global $vodi_options;

        if( isset( $vodi_options['blog_theme'] ) && !empty( $vodi_options['blog_theme'] ) ) {
            $theme = $vodi_options['blog_theme'];
        }

        return $theme;
    }
}

if ( ! function_exists( 'redux_apply_single_post_layout' ) ) {
    function redux_apply_single_post_layout( $layout ) {
        global $vodi_options;

        if( isset( $vodi_options['single_post_layout'] ) && ! empty( $vodi_options['single_post_layout'] ) ) {
            $layout = $vodi_options['single_post_layout'];
        }

        return $layout;
    }
}

if ( ! function_exists( 'redux_apply_single_post_sidebar' ) ) {
    function redux_apply_single_post_sidebar( $single_post_sidebar ) {
        global $vodi_options;
        
        if ( ! isset( $vodi_options['enable_single_post_sidebar'] ) ) {
            $single_post_sidebar = 'sidebar-blog';
        }

        if ( isset( $vodi_options[ 'enable_single_post_sidebar' ] ) && $vodi_options[ 'enable_single_post_sidebar' ] ) {
            $single_post_sidebar = 'sidebar-single';
        } 

        return $single_post_sidebar;
    }
}

if ( ! function_exists( 'redux_add_single_post_sidebar' ) ) {
    function redux_add_single_post_sidebar( $sidebar_args ) {
        global $vodi_options;

        if ( isset( $vodi_options[ 'enable_single_post_sidebar' ] ) && $vodi_options[ 'enable_single_post_sidebar' ] ) {
            $sidebar_args['sidebar_single'] = array(
                'name'        => esc_html__( 'Blog Post Sidebar', 'vodi' ),
                'id'          => 'sidebar-single',
                'description' => esc_html__( 'Widgets added to this region will appear on single blog post page', 'vodi' )
            );
        } 

        return $sidebar_args;
    }
}

if ( ! function_exists( 'redux_toggle_related_posts' ) ) {
    function redux_toggle_related_posts( $enable ) {
        global $vodi_options;

        if ( ! isset( $vodi_options['enable_related_posts'] ) ) {
            $vodi_options['enable_related_posts'] = true;
        }

        if ( $vodi_options['enable_related_posts'] ) {
            $enable = true;
        } else {
            $enable = false;
        }
        
        return $enable;
    }
}

if ( ! function_exists( 'redux_apply_related_posts_title' ) ) {
    function redux_apply_related_posts_title( $vodi_related_posts_args ) {
        global $vodi_options;

        if ( isset( $vodi_options['related_posts_title'] ) && ! empty( $vodi_options[ 'related_posts_title'] ) ) {
            $vodi_related_posts_args['section_title'] = $vodi_options['related_posts_title'];
        }

        return $vodi_related_posts_args;
    }
}

if ( ! function_exists( 'redux_apply_related_posts_number' ) ) {
    function redux_apply_related_posts_number( $vodi_related_posts_args ) {
        global $vodi_options;
        
        if ( isset( $vodi_options['related_posts_number'] ) && ! empty( $vodi_options[ 'related_posts_number'] ) ) {
            $vodi_related_posts_args['limit'] = $vodi_options['related_posts_number'];
        }

        return $vodi_related_posts_args;
    }
}


if ( ! function_exists( 'redux_toggle_author_info' ) ) {
    function redux_toggle_author_info( $enable ) {
        global $vodi_options;

        if ( ! isset( $vodi_options['enable_author_info'] ) ) {
            $vodi_options['enable_author_info'] = true;
        }

        if ( $vodi_options['enable_author_info'] ) {
            $enable = true;
        } else {
            $enable = false;
        }
        
        return $enable;
    }
}
