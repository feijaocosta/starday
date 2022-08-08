<?php
/**
 * Class Vodi Page Meta Box
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( 'Vodi_Meta_Box_Page' ) ) {
    /** 
     * Vodi_Meta_Box_Page
     */
    class Vodi_Meta_Box_Page {

        private static $meta_box_id = '_vodi_page_metabox';

        private static function get_meta_box_fields() {
            $page_meta_box_fields = apply_filters( 'vodi_page_meta_box_fields', array(
                array(
                    'name'      => esc_html__( 'Site Header Style', 'vodi' ),
                    'id'        => 'site_header_style',
                    'type'      => 'select',
                    'options'   => array(
                        ''              => esc_html__( 'Default Header', 'vodi' ),
                        'v1'            => esc_html__( 'Header v1', 'vodi' ),
                        'v2'            => esc_html__( 'Header v2', 'vodi' ),
                        'v3'            => esc_html__( 'Header v3', 'vodi' ),
                        'v4'            => esc_html__( 'Header v4', 'vodi' ),
                        'landing-v1'    => esc_html__( 'Header Landing v1', 'vodi' ),
                        'landing-v2'    => esc_html__( 'Header Landing v2', 'vodi' ),
                        'comingsoon'    => esc_html__( 'Header Coming Soon', 'vodi' ),
                    ),
                ),
                array(
                    'name'      => esc_html__( 'Header Theme', 'vodi' ),
                    'id'        => 'header_theme',
                    'type'      => 'select',
                    'options'   => array(
                        ''              => esc_html__( 'Default', 'vodi' ),
                        'dark'          => esc_html__( 'Dark', 'vodi' ),
                        'light'         => esc_html__( 'Lite', 'vodi' ),
                        'transparent'   => esc_html__( 'Transparent', 'vodi' ),
                    ),
                ),
                array(
                    'name'      => esc_html__( 'Site Footer Style', 'vodi' ),
                    'id'        => 'site_footer_style',
                    'type'      => 'select',
                    'options'   => array(
                        ''              => esc_html__( 'Default Footer', 'vodi' ),
                        'v1'            => esc_html__( 'Footer v1', 'vodi' ),
                        'v2'            => esc_html__( 'Footer v2', 'vodi' ),
                        'v3'            => esc_html__( 'Footer v3', 'vodi' ),
                        'landing'       => esc_html__( 'Footer Landing', 'vodi' ),
                        'comingsoon'    => esc_html__( 'Footer Coming Soon', 'vodi' ),
                    ),
                ),
                array(
                    'name'      => esc_html__( 'Footer Theme', 'vodi' ),
                    'id'        => 'footer_theme',
                    'type'      => 'select',
                    'options'   => array(
                        ''              => esc_html__( 'Default', 'vodi' ),
                        'dark'          => esc_html__( 'Dark', 'vodi' ),
                        'light'         => esc_html__( 'Light', 'vodi' ),
                    ),
                ),
                array(
                    'name'      => esc_html__( 'Hide Page Header', 'vodi' ),
                    'id'        => 'hide_page_header',
                    'type'      => 'checkbox',
                ),
                array(
                    'name'      => esc_html__( 'Hide Breadcrumb', 'vodi' ),
                    'id'        => 'hide_breadcrumb',
                    'type'      => 'checkbox',
                ),
                array(
                    'name'      => esc_html__( 'Hide Page Title', 'vodi' ),
                    'id'        => 'hide_page_title',
                    'type'      => 'checkbox',
                ),
                array(
                    'name'      => esc_html__( 'Custom Page Title', 'vodi' ),
                    'id'        => 'page_title',
                    'type'      => 'text',
                ),
                array(
                    'name'      => esc_html__( 'Additional Body Classes', 'vodi' ),
                    'id'        => 'body_classes',
                    'type'      => 'text',
                )
            ) );

            return $page_meta_box_fields;
        }

        /**
         * Save the meta when the post is saved.
         *
         * @param int $post_id The ID of the post being saved.
         */
        public static function save( $post_id, $post ) {
     
            $meta_box_id        = self::$meta_box_id;
            $meta_box_fields    = self::get_meta_box_fields();
            $clean_meta_data    = get_post_meta( $post_id, $meta_box_id, true );
            $meta_data          = maybe_unserialize( $clean_meta_data );

            if( ! is_array( $meta_data ) ) {
                $meta_data  = array();
            }

            foreach ( $meta_box_fields as $field ) {
                $old = isset( $meta_data[$field['id']] ) ? $meta_data[$field['id']] : '';
                $new = isset( $_POST[$field['id']] ) ? $_POST[$field['id']] : '';
         
                if ( ! empty( $new ) ) {
                    $meta_data[$field['id']] = $new;
                } elseif( isset( $meta_data[$field['id']] ) && '' == $new ) {
                    unset( $meta_data[$field['id']] );
                }
            }

            if( ! empty( $meta_data ) ) {
                update_post_meta( $post_id, $meta_box_id, serialize( $meta_data ) );
            } else {
                delete_post_meta( $post_id, $meta_box_id );
            }
        }


        /**
         * Render Meta Box content.
         *
         * @param WP_Post $post The post object.
         */
        public static function output( $post ) {

            $meta_box_id        = self::$meta_box_id;
            $meta_box_fields    = self::get_meta_box_fields();
            $clean_meta_array   = get_post_meta( $post->ID, $meta_box_id, true );
            $meta_array         = maybe_unserialize( $clean_meta_array );

            if( ! is_array( $meta_array ) ) {
                $meta_array     = array();
            }

            $increment = 0;

            wp_nonce_field( 'vodi_save_data', 'vodi_meta_nonce' );

            foreach ( $meta_box_fields as $field ) {
                // get current post meta data
                $meta = '';
                if( isset( $meta_array[$field['id']] ) ) {
                    $meta = $meta_array[$field['id']];
                }

                switch ( $field['type'] ) {

                    //If select array
                    case 'select':
                        echo '<div class="components-base-control editor-page-' . esc_attr( $field['id'] ) . '"><div class="components-base-control__field">';
                        echo '<label class="components-base-control__label" for="' . esc_attr( $field['id'] ) . '">' . wp_kses_post( $field['name'] ) . '</label>';
                        echo '<select id="' . esc_attr( $field['id'] ) . '" name="' . esc_attr( $field['id'] ) . '" class="components-select-control__input">';

                            foreach ($field['options'] as $key => $label) {
                                $selected = $meta == $key ? 'selected' : '';
                                echo '<option value="' . esc_attr( $key ) . '" ' . $selected . '>' . $label . '</option>';
                            }

                        echo '</select>';
                        echo isset( $field['desc'] ) ? '<p>' . wp_kses_post( $field['desc'] ) . '</p>' : '';
                        echo '</div></div>';

                    break;

                    //If checkbox array
                    case 'checkbox':

                        echo '<div class="components-base-control editor-page-' . esc_attr( $field['id'] ) . '"><div class="components-base-control__field">';
                        $checked = $meta ? 'checked="checked"' : '';
                        echo '<input id="' . esc_attr( $field['id'] ) . '" class="components-checkbox-control__input" type="checkbox" name="'.esc_attr( $field['id'] ).'" value="1" ' . $checked . '>';
                        echo '<label class="components-checkbox-control__label" for="' . esc_attr( $field['id'] ) . '">' . wp_kses_post( $field['name'] ) . '</label>';
                        echo isset( $field['desc'] ) ? '<p>' . wp_kses_post( $field['desc'] ) . '</p>' : '';
                        echo '</div></div>';
                    
                    break;

                    //If text array
                    case 'text':

                        echo '<div class="components-base-control editor-page-' . esc_attr( $field['id'] ) . '"><div class="components-base-control__field">';
                        echo '<label class="components-base-control__label" for="' . esc_attr( $field['id'] ) . '">' . wp_kses_post( $field['name'] ) . '</label>';
                        echo '<input id="' . esc_attr( $field['id'] ) . '" class="components-text-control__input" type="text" name="' . esc_attr( $field['id'] ) . '" value="' . esc_attr( $meta ) . '">';
                        echo isset( $field['desc'] ) ? '<p>' . wp_kses_post( $field['desc'] ) . '</p>' : '';
                        echo '</div></div>';
                    
                    break;
                    
                }

                $increment++;
            }
        }
    }
}