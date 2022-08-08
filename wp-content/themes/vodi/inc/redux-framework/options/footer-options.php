<?php
/**
 * Options available for Footer sub menu in Theme Options
 */

$footer_options = apply_filters( 'vodi_footer_options_args', array(
    'title'     => esc_html__( 'Footer', 'vodi' ),
    'desc'      => esc_html__( 'Options available to customize the footer of your website.', 'vodi' ),
    'icon'      => 'far fa-arrow-alt-circle-down',
    'fields'    => array(
        array(
            'id'        => 'footer_general_section_start',
            'type'      => 'section',
            'title'     => esc_html__( 'General', 'vodi' ),
            'indent'    => true,
        ),
        
        array(
            'title'     => esc_html__( 'Footer Style', 'vodi' ),
            'subtitle'  => esc_html__( 'Select the footer style.', 'vodi' ),
            'id'        => 'footer_version',
            'type'      => 'select',
            'options'   => array(
                'v1'          => esc_html__( 'Footer v1', 'vodi' ),
                'v2'          => esc_html__( 'Footer v2', 'vodi' ),
                'v3'          => esc_html__( 'Footer v3', 'vodi' ),
                'v4'          => esc_html__( 'Footer v4', 'vodi' ),
                'landing'     => esc_html__( 'Footer Landing', 'vodi' ),
                'comingsoon' => esc_html__( 'Footer Coming Soon', 'vodi' ),
            ),
            'default'   => 'v1',
        ),

        array(
            'id'        => 'footer_theme',
            'type'      => 'select',
            'title'     => esc_html__( 'Footer Theme', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose between light and dark theme for your website footer', 'vodi' ),
            'options'   => array(
                'dark'        => esc_html__( 'Dark', 'vodi' ),
                'light'       => esc_html__( 'Light', 'vodi' ),
            ),
            'default'   => 'dark',
            'required'  => array( 'footer_version', 'not', 'v2' ),
        ),

        array(
            'id'        => 'footer_general_section_end',
            'type'      => 'section',
            'indent'    => false,
        ),

        array(
            'id'        => 'footer_logo_section_start',
            'type'      => 'section',
            'title'     => esc_html__( 'Footer Logo', 'vodi' ),
            'indent'    => true,
        ),

        array(
            'id'        => 'enable_footer_logo',
            'type'      => 'switch',
            'title'     => esc_html__( 'Enable Footer Logo', 'vodi' ),
            'subtitle'  => esc_html__( 'Do you want to display your site logo in footer ?', 'vodi' ),
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'default'   => 1
        ),

        array(
            'id'        => 'enable_separate_footer_logo',
            'type'      => 'switch',
            'title'     => esc_html__( 'Use separate logo for Footer', 'vodi' ),
            'subtitle'  => esc_html__( 'Do you want to display a separate logo for footer ?', 'vodi' ),
            'desc'      => esc_html__( 'By default the logo uploaded to Appearance > Customize > Site Identity > Site Logo is displayed in footer', 'vodi' ),
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'default'   => 0,
            'required'  => array( 'enable_footer_logo', 'equals', true ),
        ),

        array(
            'id'        => 'separate_footer_logo',
            'type'      => 'media',
            'title'     => esc_html__( 'Footer Logo', 'vodi' ),
            'subtitle'  => esc_html__( 'Upload an image file. Recommended Size : 103x40 pixels', 'vodi' ),
            'desc'      => esc_html__( 'Upload a separate logo that you want to be displayed in footer', 'vodi' ),
            'required'  => array( 'enable_separate_footer_logo', 'equals', true ),
        ),

        array(
            'id'        => 'footer_logo_section_end',
            'type'      => 'section',
            'indent'    => false,
        ),

        array(
            'title'     => esc_html__( 'Footer Widgets', 'vodi' ),
            'id'        => 'footer_widgets_section_start',
            'type'      => 'section',
            'indent'    => true,
            'required'  => array( 'footer_version', 'equals', 'v1' ),
        ),

         array(
            'title'     => esc_html__( 'Enable Footer Widgets', 'vodi' ),
            'subtitle'  => esc_html__( 'Do you want to display Footer Widgets ?', 'vodi' ),
            'desc'      => esc_html__( 'Widgets are added to Apperance > Widgets > Footer Column #number', 'vodi' ),
            'id'        => 'enable_footer_widgets',
            'type'      => 'switch',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'default'   => 1
        ),

        array(
            'title'     => esc_html__( 'Use default Footer Widgets arrangement ?', 'vodi' ),
            'subtitle'  => esc_html__( 'Would you like to use a different widget arrangment instead of the default arrangement', 'vodi' ),
            'desc'      => esc_html__( 'The default footer widgets arrangement is 3 columns with widths 2/3 + 2/3 + 1/3', 'vodi' ),
            'id'        => 'use_default_widget_arrangement',
            'type'      => 'switch',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'default'   => 1,
            'required'  => array( 'enable_footer_widgets', 'equals', true ), 
        ),

        array(
            'title'     => esc_html__( 'Number of Widget Columns', 'vodi' ),
            'subtitle'  => esc_html__( 'Specify the number of Footer Widget columns for your website', 'vodi' ),
            'type'      => 'spinner',
            'id'        => 'footer_widget_columns',
            'min'       => '2',
            'max'       => '5',
            'default'   => '3',
            'required'  => array( 'use_default_widget_arrangement', 'equals', false ), 
        ),

        array(
            'id'        => 'footer_widgets_section_end',
            'type'      => 'section',
            'indent'    => false,
        ),

        array(
            'id'        => 'footer_credit_section',
            'title'     => esc_html__( 'Footer Credit', 'vodi' ),
            'type'      => 'section',
            'indent'    => true,
        ),

        array(
            'id'        => 'footer_copyright_text',
            'title'     => esc_html__( 'Footer Copyright Text', 'vodi' ),
            'subtitle'  => esc_html__( 'Enter the copyright text you want to display at your footer', 'vodi' ),
            'type'      => 'textarea',
            'default'   => sprintf( esc_html__( 'Copyright &copy; %s, %s. All Rights Reserved', 'vodi' ), date( 'Y' ), get_bloginfo( 'name' ) )
        ),

        array(
            'id'        => 'footer_credit_section_end',
            'type'      => 'section',
            'indent'    => false,
        ),

        array(
            'id'        => 'footer_action_area_section_start',
            'type'      => 'section',
            'title'     => esc_html__( 'Footer Action Area', 'vodi' ),
            'indent'    => true,
            'required'  => array( 'footer_version', 'equals', 'v2' ),
        ),

        array(
            'id'        => 'enable_footer_action',
            'type'      => 'switch',
            'title'     => esc_html__( 'Enable Footer Action area', 'vodi' ),
            'subtitle'  => esc_html__( 'Do you want to display action area in your footer ?', 'vodi' ),
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'default'   => 1
        ),

        array(
            'id'        => 'footer_action_title',
            'type'      => 'text',
            'title'     => esc_html__( 'Action Title', 'vodi' ),
            'subtitle'  => esc_html__( 'Enter the title for your action area', 'vodi' ),
            'default'   => wp_kses_post( __( 'Watch Vodi. Anytime <br>Anywhere', 'vodi' ) ),
            'required'  => array( 'enable_footer_action', 'equals', true ),
        ),

        array(
            'id'        => 'footer_action_subtitle',
            'type'      => 'text',
            'title'     => esc_html__( 'Action Subtitle', 'vodi' ),
            'subtitle'  => esc_html__( 'Enter the subtitle for your action area', 'vodi' ),
            'default'   => esc_html__( 'Subscribe to our newsletter and get unique alerts.', 'vodi' ),
            'required'  => array( 'enable_footer_action', 'equals', true ),
        ),

        array(
            'id'        => 'footer_action_content',
            'type'      => 'textarea',
            'title'     => esc_html__( 'Action Content', 'vodi' ),
            'subtitle'  => esc_html__( 'Enter the content for your action area. You can use some HTML.', 'vodi' ),
            'default'   => wp_kses_post( __( '<a href="#" class="btn btn-vodi-primary btn-long">Sign Up</a>', 'vodi' ) ),
            'required'  => array( 'enable_footer_action', 'equals', true ),
        ),

        array(
            'id'        => 'footer_action_area_section_end',
            'type'      => 'section',
            'indent'    => false,
        ),
    )
) );