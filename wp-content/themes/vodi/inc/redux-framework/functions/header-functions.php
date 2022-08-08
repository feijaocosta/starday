<?php
/**
 * Filter functions for Header Section of Theme Options
 */

if( ! function_exists( 'redux_toggle_logo_svg' ) ) {
    function redux_toggle_logo_svg() {
        global $vodi_options;

        if( isset( $vodi_options['logo_svg'] ) && $vodi_options['logo_svg'] == '1' ) {
            $logo_svg = true;
        } else {
            $logo_svg = false;
        }

        return $logo_svg;
    }
}

if ( ! function_exists( 'redux_apply_header_version' ) ) {
    function redux_apply_header_version( $header_version ) {
        global $vodi_options;

        if( isset( $vodi_options['header_version'] ) && !empty( $vodi_options['header_version'] ) ) {
            $header_version = $vodi_options['header_version'];
        }

        return $header_version;
    }
}

if ( ! function_exists( 'redux_apply_header_theme' ) ) {
    function redux_apply_header_theme( $header_theme ) {
        global $vodi_options;

        if( isset( $vodi_options['header_theme'] ) && !empty( $vodi_options['header_theme'] ) ) {
            $header_theme = $vodi_options['header_theme'];
        }

        return $header_theme;
    }
}

if ( ! function_exists( 'redux_apply_header_search_type' ) ) {
    function redux_apply_header_search_type( $header_search_type ) {
        global $vodi_options;

        if( isset( $vodi_options['header_search_type'] ) && !empty( $vodi_options['header_search_type'] ) ) {
            $header_search_type = $vodi_options['header_search_type'];
        }

        return $header_search_type;
    }
}

if( ! function_exists( 'redux_apply_header_static_content_id' ) ) {
    function redux_apply_header_static_content_id( $static_block_id ) {
        global $vodi_options;

        if( isset( $vodi_options['header_static_content_id'] ) ) {
            $static_block_id = $vodi_options['header_static_content_id'];
        }

        return $static_block_id;
    }
}

if ( ! function_exists( 'redux_toggle_sticky_header' ) ) {
    function redux_toggle_sticky_header( $enable_sticky_header ) {
        global $vodi_options;

        if ( isset( $vodi_options['enable_sticky_header'] ) && $vodi_options['enable_sticky_header'] ) {
            $enable_sticky_header = true;
        } else {
            $enable_sticky_header = false;
        }

        return $enable_sticky_header;
    }
}

if ( ! function_exists( 'redux_toggle_handheld_sticky_header' ) ) {
    function redux_toggle_handheld_sticky_header( $enable_handheld_sticky_header ) {
        global $vodi_options;

        if ( isset( $vodi_options['enable_handheld_sticky_header'] ) && $vodi_options['enable_handheld_sticky_header'] ) {
            $enable_handheld_sticky_header = true;
        } else {
            $enable_handheld_sticky_header = false;
        }

        return $enable_handheld_sticky_header;
    }
}

if ( ! function_exists( 'redux_append_offcanvas_classes' ) ) {
    function redux_append_offcanvas_classes( $offcanvas_classes ) {
        global $vodi_options;

        if ( isset( $vodi_options['disable_offcanvas_menu_desktop' ] ) && $vodi_options['disable_offcanvas_menu_desktop'] ) {
            $offcanvas_classes[] = 'off-canvas-hide-in-desktop';
        }

        return $offcanvas_classes;
    }
}

if ( ! function_exists( 'redux_toggle_header_search' ) ) {
    function redux_toggle_header_search( $enable_header_search ) {
        global $vodi_options;

        if ( isset( $vodi_options['enable_header_search'] ) && $vodi_options['enable_header_search'] ) {
            $enable_header_search = true;
        } else {
            $enable_header_search = false;
        }

        return $enable_header_search;
    }
}

if ( ! function_exists( 'redux_toggle_header_upload_link' ) ) {
    function redux_toggle_header_upload_link( $enable_header_upload_link ) {
        global $vodi_options;

        if ( isset( $vodi_options['enable_header_upload_link'] ) && $vodi_options['enable_header_upload_link'] ) {
            $enable_header_upload_link = true;
        } else {
            $enable_header_upload_link = false;
        }

        return $enable_header_upload_link;
    }
}

if ( ! function_exists( 'redux_toggle_header_notification' ) ) {
    function redux_toggle_header_notification( $enable_header_notification ) {
        global $vodi_options;

        if ( isset( $vodi_options['enable_header_notification'] ) && $vodi_options['enable_header_notification'] ) {
            $enable_header_notification = true;
        } else {
            $enable_header_notification = false;
        }

        return $enable_header_notification;
    }
}

if ( ! function_exists( 'redux_toggle_header_user_account' ) ) {
    function redux_toggle_header_user_account( $enable_header_user_account ) {
        global $vodi_options;

        if ( isset( $vodi_options['enable_header_user_account'] ) && $vodi_options['enable_header_user_account'] ) {
            $enable_header_user_account = true;
        } else {
            $enable_header_user_account = false;
        }

        return $enable_header_user_account;
    }
}

if ( ! function_exists( 'redux_toggle_back_option_button' ) ) {
    function redux_toggle_back_option_button( $enable_back_option_button ) {
        global $vodi_options;

        if ( isset( $vodi_options['enable_back_option_button'] ) && $vodi_options['enable_back_option_button'] ) {
            $enable_back_option_button = true;
        } else {
            $enable_back_option_button = false;
        }

        return $enable_back_option_button;
    }
}

if ( ! function_exists( 'redux_append_back_option_label' ) ) {
    function redux_append_back_option_label( $back_option_label ) {
        global $vodi_options;

        if( isset( $vodi_options['back_option_label'] ) && !empty( $vodi_options['back_option_label'] ) ) {
            $back_option_label = $vodi_options['back_option_label'];
        }

        return $back_option_label;
    }
}

if ( ! function_exists( 'redux_append_back_option_text' ) ) {
    function redux_append_back_option_text( $back_option_text ) {
        global $vodi_options;

        if( isset( $vodi_options['back_option_text'] ) && !empty( $vodi_options['back_option_text'] ) ) {
            $back_option_text = $vodi_options['back_option_text'];
        }

        return $back_option_text;
    }
}

if ( ! function_exists( 'redux_append_back_option_url' ) ) {
    function redux_append_back_option_url( $back_option_url ) {
        global $vodi_options;

        if( isset( $vodi_options['back_option_url'] ) && !empty( $vodi_options['back_option_url'] ) ) {
            $back_option_url = $vodi_options['back_option_url'];
        }

        return $back_option_url;
    }
}