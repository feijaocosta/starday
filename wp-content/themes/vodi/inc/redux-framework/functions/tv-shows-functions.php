<?php
/**
 * Filter functions for TV Shows Section of Theme Options
 */

if ( ! function_exists( 'redux_apply_tv_shows_style' ) ) {
    function redux_apply_tv_shows_style( $style ) {
        global $vodi_options;

        if( isset( $vodi_options['tv_shows_style'] ) && !empty( $vodi_options['tv_shows_style'] ) ) {
            $style = $vodi_options['tv_shows_style'];
        }

        return $style;
    }
}

if ( ! function_exists( 'redux_apply_tv_shows_layout' ) ) {
    function redux_apply_tv_shows_layout( $layout ) {
        global $vodi_options;

        if( isset( $vodi_options['tv_shows_layout'] ) && !empty( $vodi_options['tv_shows_layout'] ) ) {
            $layout = $vodi_options['tv_shows_layout'];
        }

        return $layout;
    }
}

if ( ! function_exists( 'redux_apply_tv_shows_theme' ) ) {
    function redux_apply_tv_shows_theme( $theme ) {
        global $vodi_options;

        if( isset( $vodi_options['tv_shows_theme'] ) && !empty( $vodi_options['tv_shows_theme'] ) ) {
            $theme = $vodi_options['tv_shows_theme'];
        }

        return $theme;
    }
}

if( ! function_exists( 'redux_apply_tv_show_rows' ) ) {
    function redux_apply_tv_show_rows( $rows ) {
        global $vodi_options;

        if( isset( $vodi_options['tv_show_rows'] ) && !empty( $vodi_options['tv_show_rows'] ) ) {
            $rows = $vodi_options['tv_show_rows'];
        }

        return $rows;
    }
}

if( ! function_exists( 'redux_apply_tv_show_columns' ) ) {
    function redux_apply_tv_show_columns( $columns ) {
        global $vodi_options;

        if( isset( $vodi_options['tv_show_columns'] ) && !empty( $vodi_options['tv_show_columns'] ) ) {
            $columns = $vodi_options['tv_show_columns'];
        }

        return $columns;
    }
}

if ( ! function_exists( 'redux_apply_tv_shows_control_bar_tag_filter_instance' ) ) {
    function redux_apply_tv_shows_control_bar_tag_filter_instance( $args ) {
        global $vodi_options;

        if( isset( $vodi_options['tv_shows_control_bar_tag_filter_slugs'] ) && !empty( $vodi_options['tv_shows_control_bar_tag_filter_slugs'] ) ) {
            $args['slugs'] = implode( ',', $vodi_options['tv_shows_control_bar_tag_filter_slugs'] );
        }

        return $args;
    }
}

if( ! function_exists( 'redux_apply_tv_shows_jumbotron_top_id' ) ) {
    function redux_apply_tv_shows_jumbotron_top_id( $static_block_id ) {
        global $vodi_options;

        if( isset( $vodi_options['tv_shows_jumbotron_top_id'] ) ) {
            $static_block_id = $vodi_options['tv_shows_jumbotron_top_id'];
        }

        return $static_block_id;
    }
}

if ( ! function_exists( 'redux_apply_single_episode_style' ) ) {
    function redux_apply_single_episode_style( $style ) {
        global $vodi_options;

        if( isset( $vodi_options['episode_style'] ) && !empty( $vodi_options['episode_style'] ) ) {
            $style = $vodi_options['episode_style'];
        }

        return $style;
    }
}

if( ! function_exists( 'redux_apply_episode_download_button' ) ) {
    function redux_apply_episode_download_button( $enable ) {
        global $vodi_options;

        if ( isset( $vodi_options['enable_episode_download'] ) && ! empty( $vodi_options['enable_episode_download'] ) ) {
            $enable = true;
        } else {
            $enable = false;
        }

        return $enable;
    }
}