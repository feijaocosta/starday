<?php
/**
 * Vodi Media related functions
 *
 * @package vodi
 */

if ( ! function_exists( 'vodi_get_register_image_sizes' ) ) {
    /**
     * Get all image sizes used in vodi
     */
    function vodi_get_register_image_sizes() {
        return apply_filters( 'vodi_get_register_image_size_args', array(
            '480x270'   => array(
                'width'     => 480,
                'height'    => 270,
                'crop'      => true,
            ),
            '696x677'   => array(
                'width'     => 696,
                'height'    => 677,
                'crop'      => true,
            ),
            '990x440'   => array(
                'width'     => 990,
                'height'    => 440,
                'crop'      => true,
            )
        ) );
    }
}

if ( ! function_exists( 'vodi_register_image_sizes' ) ) {
    /**
     * Registers all image sizes used in vodi
     */
    function vodi_register_image_sizes() {
        if( apply_filters( 'vodi_register_image_sizes', true ) ) {
            $image_size_args = apply_filters( 'vodi_register_image_size_args', vodi_get_register_image_sizes() );

            if( ! empty( $image_size_args ) ) {
                foreach ( $image_size_args as $key => $image_size ) {
                    $name = 'vodi-' . $key;
                    if( $image_size['crop'] ) {
                        $name .= '-crop';
                    }
                    add_image_size( $name, $image_size['width'], $image_size['height'], $image_size['crop'] );
                }
            }
        }
    }
}

if ( ! function_exists( 'vodi_recommended_movie_thumbnail_size' ) ) {
    function vodi_recommended_movie_thumbnail_size() {
        return 'masvideos_movie_large';
    }
}