<?php
/**
 * Options available for Styling sub menu of Theme Options
 *
 */

if( is_child_theme() && redux_apply_custom_color_css_external_file() ) {
    $include_custom_color = array(
        'id'          => 'include_custom_color',
        'title'       => esc_html__( 'How to include custom color ?', 'vodi' ),
        'type'        => 'radio',
        'compiler'    => true,
        'options'     => array(
            '1'  => esc_html__( 'Inline', 'vodi' ),
            '2'  => esc_html__( 'External File', 'vodi' )
        ),
        'default'     => '1',
        'required'    => array( 'use_predefined_color', 'equals', 0 ),
    );
} else {
    $include_custom_color = array(
        'id'        => 'external_file_css_info',
        'type'      => 'raw',
        'title'     => esc_html__( 'Custom Primary Color CSS', 'vodi' ),
        'content'   => esc_html__( 'Please activate child theme to load custom color CSS using "External File". Also you need to make custom-color.css file writable.', 'vodi' ),
        'required'  => array( 'use_predefined_color', 'equals', 0 ),
    );
}

$style_options  = apply_filters( 'vodi_style_options_args', array(
    'title'     => esc_html__( 'Styling', 'vodi' ),
    'icon'      => 'fas fa-edit',
    'fields'    => array(
        array(
            'id'        => 'styling_general_info_start',
            'type'      => 'section',
            'title'     => esc_html__( 'General', 'vodi' ),
            'subtitle'  => esc_html__( 'General Theme Style Settings', 'vodi' ),
            'indent'    => true,
        ),

        array(
            'title'     => esc_html__( 'Use a predefined color scheme', 'vodi' ),
            'on'        => esc_html__('Yes', 'vodi'),
            'off'       => esc_html__('No', 'vodi'),
            'type'      => 'switch',
            'default'   => 1,
            'id'        => 'use_predefined_color'
        ),

        array(
            'id'          => 'custom_primary_color',
            'title'       => esc_html__( 'Custom Primary Color', 'vodi' ),
            'type'        => 'color',
            'compiler'    => true,
            'transparent' => false,
            'default'     => '#24baef',
            'required'    => array( 'use_predefined_color', 'equals', 0 ),
        ),

        $include_custom_color,

        array(
            'id'        => 'styling_general_info_end',
            'type'      => 'section',
            'indent'    => false,
        ),
    )
) );
