<?php
/**
 * General Theme Options
 *
 */

$general_options = apply_filters( 'vodi_general_options_args', array(
    'title'     => esc_html__( 'General', 'vodi' ),
    'icon'      => 'far fa-dot-circle',
    'fields'    => array(
        array(
            'title'     => esc_html__( 'Scroll To Top', 'vodi' ),
            'id'        => 'scrollup',
            'type'      => 'switch',
            'on'        => esc_html__('Enabled', 'vodi'),
            'off'       => esc_html__('Disabled', 'vodi'),
            'default'   => 1,
        ),

        array(
            'title'     => esc_html__( 'Register Image Size', 'vodi' ),
            'subtitle'  => esc_html__( 'Enable and regenerate thumbnails to enable theme registered image sizes.', 'vodi' ),
            'id'        => 'register_image_size',
            'type'      => 'switch',
            'on'        => esc_html__('Enabled', 'vodi'),
            'off'       => esc_html__('Disabled', 'vodi'),
            'default'   => 0,
        ),

        array(
            'id'        => 'enabled_register_image_size',
            'type'      => 'sorter',
            'title'     => esc_html__( 'Enabled Register Image Size', 'vodi' ),
            'subtitle'  => esc_html__( 'Please drag and arrange the image sizes to enable theme registered image sizes.', 'vodi' ),
            'options'   => array(
                'enabled' => vodi_redux_get_all_register_image_size_options(),
                'disabled' => array()
            ),
            'required'  => array( 'register_image_size', 'equals', 1 )
        ),

        array(
            'title'     => esc_html__( 'Enable Live Search', 'vodi' ),
            'subtitle'  => esc_html__( 'Enable/Disable Live Search.', 'vodi' ),
            'id'        => 'enable_live_search',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'type'      => 'switch',
            'default'   => false,
        ),
    )
) );
