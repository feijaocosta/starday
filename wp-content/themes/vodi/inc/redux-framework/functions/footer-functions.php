<?php
/**
 * Filter functions for Footer Section of Theme Options
 */

if ( ! function_exists( 'redux_apply_footer_version' ) ) {
    function redux_apply_footer_version( $footer_version ) {
        global $vodi_options;

        if( isset( $vodi_options['footer_version'] ) && !empty( $vodi_options['footer_version'] ) ) {
            $footer_version = $vodi_options['footer_version'];
        }

        return $footer_version;
    }
}

if ( ! function_exists( 'redux_apply_footer_theme' ) ) {
    function redux_apply_footer_theme( $footer_theme ) {
        global $vodi_options;

        if( isset( $vodi_options['footer_theme'] ) && !empty( $vodi_options['footer_theme'] ) ) {
            $footer_theme = $vodi_options['footer_theme'];
        }

        return $footer_theme;
    }
}

if ( ! function_exists( 'redux_toggle_footer_logo' ) ) {
    function redux_toggle_footer_logo( $enable_footer_logo ) {
        global $vodi_options;

        if ( isset( $vodi_options['enable_footer_logo'] ) && $vodi_options['enable_footer_logo'] ) {
            $enable_footer_logo = true;
        } else {
            $enable_footer_logo = false;
        }

        return $enable_footer_logo;
    }
}

if ( ! function_exists( 'redux_toggle_separate_footer_logo' ) ) {
    function redux_toggle_separate_footer_logo( $enable_separate_footer_logo ) {
        global $vodi_options;

        if ( isset( $vodi_options['enable_separate_footer_logo'] ) && $vodi_options['enable_separate_footer_logo'] ) {
            $enable_separate_footer_logo = true;
        } else {
            $enable_separate_footer_logo = false;
        }

        return $enable_separate_footer_logo;
    }
}

if ( ! function_exists( 'redux_apply_separate_footer_logo' ) ) {
    function redux_apply_separate_footer_logo( $separate_footer_logo ) {
        global $vodi_options;

        if ( isset( $vodi_options['separate_footer_logo'] ) && is_array( $vodi_options['separate_footer_logo'] ) && ! empty( $vodi_options['separate_footer_logo']['id'] ) ) {
            $separate_footer_logo = $vodi_options['separate_footer_logo'];
        }

        return $separate_footer_logo;
    }
}

if ( ! function_exists( 'redux_toggle_footer_widgets' ) ) {
    function redux_toggle_footer_widgets( $enable_footer_widgets ) {
        global $vodi_options;

        if( isset( $vodi_options['enable_footer_widgets'] ) && !empty( $vodi_options['enable_footer_widgets'] ) ) {
            $enable_footer_widgets = true;
        } else {
            $enable_footer_widgets = false;
        }

        return $enable_footer_widgets;
    }
}

if ( ! function_exists( 'redux_append_footer_widget_columns' ) ) {
    function redux_append_footer_widget_columns( $footer_widget_columns ) {
        global $vodi_options;

        if( isset( $vodi_options['footer_widget_columns'] ) && !empty( $vodi_options['footer_widget_columns'] ) ) {
            $footer_widget_columns = $vodi_options['footer_widget_columns'];
        }

        return $footer_widget_columns;
    }
}

if ( ! function_exists( 'redux_append_copyright_text' ) ) {
    function redux_append_copyright_text( $footer_copyright_text ) {
        global $vodi_options;

        if( isset( $vodi_options['footer_copyright_text'] ) && !empty( $vodi_options['footer_copyright_text'] ) ) {
            $footer_copyright_text = $vodi_options['footer_copyright_text'];
        }

        return $footer_copyright_text;
    }
}

if ( ! function_exists( 'redux_toggle_footer_action_area' ) ) {
    function redux_toggle_footer_action_area( $enable_footer_action ) {
        global $vodi_options;

        if ( isset( $vodi_options['enable_footer_action'] ) && $vodi_options['enable_footer_action'] ) {
            $enable_footer_action = true;
        } else {
            $enable_footer_action = false;
        }

        return $enable_footer_action;
    }
}

if ( ! function_exists( 'redux_apply_footer_action_title' ) ) {
    function redux_apply_footer_action_title( $footer_action_title ) {
        global $vodi_options;

        if( isset( $vodi_options['footer_action_title'] ) && ! empty( $vodi_options['footer_action_title'] ) ) {
            $footer_action_title = $vodi_options['footer_action_title'];
        }

        return $footer_action_title;        
    }
}

if ( ! function_exists( 'redux_apply_footer_action_subtitle' ) ) {
    function redux_apply_footer_action_subtitle( $footer_action_subtitle ) {
        global $vodi_options;

        if( isset( $vodi_options['footer_action_subtitle'] ) && ! empty( $vodi_options['footer_action_subtitle'] ) ) {
            $footer_action_subtitle = $vodi_options['footer_action_subtitle'];
        }

        return $footer_action_subtitle;
    }
}

if ( ! function_exists( 'redux_apply_footer_action_content' ) ) {
    function redux_apply_footer_action_content( $footer_action_content ) {
        global $vodi_options;

        if( isset( $vodi_options['footer_action_content'] ) && ! empty( $vodi_options['footer_action_content'] ) ) {
            $footer_action_content = $vodi_options['footer_action_content'];
        }

        return $footer_action_content;
    }
}
