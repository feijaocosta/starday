<?php
/**
 * Filter functions for Movies Section of Theme Options
 */

if ( ! function_exists( 'redux_apply_movies_layout' ) ) {
    function redux_apply_movies_layout( $layout ) {
        global $vodi_options;

        if( isset( $vodi_options['movies_layout'] ) && !empty( $vodi_options['movies_layout'] ) ) {
            $layout = $vodi_options['movies_layout'];
        }

        return $layout;
    }
}

if ( ! function_exists( 'redux_apply_movies_theme' ) ) {
    function redux_apply_movies_theme( $theme ) {
        global $vodi_options;

        if( isset( $vodi_options['movies_theme'] ) && !empty( $vodi_options['movies_theme'] ) ) {
            $theme = $vodi_options['movies_theme'];
        }

        return $theme;
    }
}

if( ! function_exists( 'redux_apply_movie_rows' ) ) {
    function redux_apply_movie_rows( $rows ) {
        global $vodi_options;

        if( isset( $vodi_options['movie_rows'] ) && !empty( $vodi_options['movie_rows'] ) ) {
            $rows = $vodi_options['movie_rows'];
        }

        return $rows;
    }
}

if( ! function_exists( 'redux_apply_movie_columns' ) ) {
    function redux_apply_movie_columns( $columns ) {
        global $vodi_options;

        if( isset( $vodi_options['movie_columns'] ) && !empty( $vodi_options['movie_columns'] ) ) {
            $columns = $vodi_options['movie_columns'];
        }

        return $columns;
    }
}

if ( ! function_exists( 'redux_apply_movies_control_bar_tag_filter_instance' ) ) {
    function redux_apply_movies_control_bar_tag_filter_instance( $args ) {
        global $vodi_options;

        if( isset( $vodi_options['movies_control_bar_tag_filter_slugs'] ) && !empty( $vodi_options['movies_control_bar_tag_filter_slugs'] ) ) {
            $args['slugs'] = implode( ',', $vodi_options['movies_control_bar_tag_filter_slugs'] );
        }

        return $args;
    }
}

if( ! function_exists( 'redux_apply_movies_jumbotron_top_id' ) ) {
    function redux_apply_movies_jumbotron_top_id( $static_block_id ) {
        global $vodi_options;

        if( isset( $vodi_options['movies_jumbotron_top_id'] ) ) {
            $static_block_id = $vodi_options['movies_jumbotron_top_id'];
        }

        return $static_block_id;
    }
}

if ( ! function_exists( 'redux_set_archive_view_args' ) ) {
    function redux_set_archive_view_args( $archive_view_args, $type ) {
        global $vodi_options;

        switch ( $type ) {
            case 'movie':
                $option_name = 'movie_archive_enabled_views';
                break;

            case 'tv_show':
                $option_name = 'tv_show_archive_enabled_views';
                break;
            
            default:
                $option_name = '';
                break;
        }

        if ( ! empty( $option_name ) && isset( $vodi_options[$option_name] ) ) {
            $archive_views = $vodi_options[$option_name]['enabled'];

            if ( $archive_views ) {
                $new_archive_view_args = array();
                $count = 0;
                
                foreach( $archive_views as $key => $shop_view ) {
                    
                    if ( isset( $archive_view_args[ $key ] ) ) {
                        $new_archive_view_args[ $key ] = $archive_view_args[ $key ];

                        if ( 0 == $count ) {
                            $new_archive_view_args[ $key ]['active'] = true;
                        } else {
                            $new_archive_view_args[ $key ]['active'] = false;
                        }

                        $count++;
                    }
                }

                return $new_archive_view_args;
            }
        }

        return $archive_view_args;
    }
}

if ( ! function_exists( 'redux_apply_single_movie_style' ) ) {
    function redux_apply_single_movie_style( $style ) {
        global $vodi_options;

        if( isset( $vodi_options['movie_style'] ) && !empty( $vodi_options['movie_style'] ) ) {
            $style = $vodi_options['movie_style'];
        }

        return $style;
    }
}

if( ! function_exists( 'redux_apply_movie_banner_content' ) ) {
    function redux_apply_movie_banner_content( $banner_content ) {
        global $vodi_options;

        if( isset( $vodi_options['movie_banner_content'] ) && $vodi_options['movie_banner_content'] != '' ) {
            $banner_content = do_shortcode( $vodi_options['movie_banner_content'] );
        }

        return $banner_content;
    }
}

if( ! function_exists( 'redux_apply_movie_download_button' ) ) {
    function redux_apply_movie_download_button( $enable ) {
        global $vodi_options;

        if ( isset( $vodi_options['enable_movie_download'] ) && ! empty( $vodi_options['enable_movie_download'] ) ) {
            $enable = true;
        } else {
            $enable = false;
        }

        return $enable;
    }
}