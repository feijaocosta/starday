<?php
/**
 * Options available for Typography sub menu of Theme Options
 * 
 */

$typography_options     = apply_filters( 'vodi_typography_options_args', array(
    'title'            => esc_html__( 'Typography', 'vodi' ),
    'desc'             => esc_html__( 'Typography Options available in theme', 'vodi' ),
    'id'               => 'typography',
    'customizer_width' => '400px',
    'icon'             => 'fas fa-font',
    'fields'    => array(
        array(
            'title'         => esc_html__( 'Use default font scheme ?', 'vodi' ),
            'on'            => esc_html__('Yes', 'vodi'),
            'off'           => esc_html__('No', 'vodi'),
            'type'          => 'switch',
            'default'       => true,
            'id'            => 'use_predefined_font',
        ),

        array(
            'title'         => esc_html__( 'Title Font Family', 'vodi' ),
            'type'          => 'typography',
            'id'            => 'custom_title_font',
            'google'        => true,
            'font-weight'   => false,
            'text-align'    => false,
            'font-style'    => false,
            'font-size'     => false,
            'line-height'   => false,
            'color'         => false,
            'default'       => array(
                'font-family'   => 'Montserrat',
                'subsets'       => 'latin',
            ),
            'required'      => array( 'use_predefined_font', 'equals', false ),
        ),

        array(
            'title'         => esc_html__( 'Content Font Family', 'vodi' ),
            'type'          => 'typography',
            'id'            => 'custom_body_font',
            'google'        => true,
            'font-weight'   => false,
            'text-align'    => false,
            'font-style'    => false,
            'font-size'     => false,
            'line-height'   => false,
            'color'         => false,
            'default'       => array(
                'font-family'   => 'Open Sans',
                'subsets'       => 'latin',
            ),
            'required'      => array( 'use_predefined_font', 'equals', false ),
        ),
    )
) );