<?php
/**
 * Filter functions for Videos Section of Theme Options
 */

if ( ! function_exists( 'redux_apply_videos_style' ) ) {
    function redux_apply_videos_style( $style ) {
        global $vodi_options;

        if( isset( $vodi_options['videos_style'] ) && !empty( $vodi_options['videos_style'] ) ) {
            $style = $vodi_options['videos_style'];
        }

        return $style;
    }
}

if ( ! function_exists( 'redux_apply_videos_layout' ) ) {
    function redux_apply_videos_layout( $layout ) {
        global $vodi_options;

        if( isset( $vodi_options['videos_layout'] ) && !empty( $vodi_options['videos_layout'] ) ) {
            $layout = $vodi_options['videos_layout'];
        }

        return $layout;
    }
}

if ( ! function_exists( 'redux_apply_videos_theme' ) ) {
    function redux_apply_videos_theme( $theme ) {
        global $vodi_options;

        if( isset( $vodi_options['videos_theme'] ) && !empty( $vodi_options['videos_theme'] ) ) {
            $theme = $vodi_options['videos_theme'];
        }

        return $theme;
    }
}

if ( ! function_exists( 'redux_apply_single_video_style' ) ) {
    function redux_apply_single_video_style( $style ) {
        global $vodi_options;

        if( isset( $vodi_options['video_style'] ) && !empty( $vodi_options['video_style'] ) ) {
            $style = $vodi_options['video_style'];
        }

        return $style;
    }
}

if( ! function_exists( 'redux_apply_video_rows' ) ) {
    function redux_apply_video_rows( $rows ) {
        global $vodi_options;

        if( isset( $vodi_options['video_rows'] ) && !empty( $vodi_options['video_rows'] ) ) {
            $rows = $vodi_options['video_rows'];
        }

        return $rows;
    }
}

if( ! function_exists( 'redux_apply_video_columns' ) ) {
    function redux_apply_video_columns( $columns ) {
        global $vodi_options;

        if( isset( $vodi_options['video_columns'] ) && !empty( $vodi_options['video_columns'] ) ) {
            $columns = $vodi_options['video_columns'];
        }

        return $columns;
    }
}

if ( ! function_exists( 'redux_apply_videos_control_bar_tag_filter_instance' ) ) {
    function redux_apply_videos_control_bar_tag_filter_instance( $args ) {
        global $vodi_options;

        if( isset( $vodi_options['videos_control_bar_tag_filter_slugs'] ) && !empty( $vodi_options['videos_control_bar_tag_filter_slugs'] ) ) {
            $args['slugs'] = implode( ',', $vodi_options['videos_control_bar_tag_filter_slugs'] );
        }

        return $args;
    }
}

if( ! function_exists( 'redux_apply_videos_jumbotron_top_id' ) ) {
    function redux_apply_videos_jumbotron_top_id( $static_block_id ) {
        global $vodi_options;

        if( isset( $vodi_options['videos_jumbotron_top_id'] ) ) {
            $static_block_id = $vodi_options['videos_jumbotron_top_id'];
        }

        return $static_block_id;
    }
}

if( ! function_exists( 'redux_apply_video_banner_content' ) ) {
    function redux_apply_video_banner_content( $banner_content ) {
        global $vodi_options;

        if( isset( $vodi_options['video_banner_content'] ) && $vodi_options['video_banner_content'] != '' ) {
            $banner_content = do_shortcode( $vodi_options['video_banner_content'] );
        }

        return $banner_content;
    }
}

if( ! function_exists( 'redux_apply_video_download_button' ) ) {
    function redux_apply_video_download_button( $enable ) {
        global $vodi_options;

        if ( isset( $vodi_options['enable_video_download'] ) && ! empty( $vodi_options['enable_video_download'] ) ) {
            $enable = true;
        } else {
            $enable = false;
        }

        return $enable;
    }
}

if( ! function_exists( 'redux_toggle_enable_upload_instructions' ) ) {
    function redux_toggle_enable_upload_instructions( $enable ) {
        global $vodi_options;

        if ( isset( $vodi_options['enable_upload_instruction'] ) && ! empty( $vodi_options['enable_upload_instruction'] ) ) {
            $enable = true;
        } else {
            $enable = false;
        }

        return $enable;
    }
}

if ( ! function_exists( 'redux_apply_upload_video_instructions_args' ) ) {
    function redux_apply_upload_video_instructions_args( $args ) {
        global $vodi_options;

        $instructions = array();
        
        for ( $i = 0; $i < 2; $i++ ) {
            $img_key        = 'img_' . $i . '_src';
            $ins_detail_key = 'ins_' . $i . '_detail';
            if( isset( $vodi_options[$img_key] ) && isset( $vodi_options[$ins_detail_key] ) ) {
                $instructions[] = array(
                    'img_src'       => $vodi_options[$img_key]['url'],
                    'ins_detail'    => $vodi_options[$ins_detail_key]
                );
            }
        }
        
        if( ! empty( $instructions ) ) {
            $args['instructions'] = $instructions;
        }

        return $args;
    }
}