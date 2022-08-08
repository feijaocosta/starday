<?php
/**
 * Options available for Blog sub menu of Theme Options
 * 
 */

$blog_options   = apply_filters( 'vodi_blog_options_args', array(
    'title'     => esc_html__( 'Blog', 'vodi' ),
    'icon'      => 'far fa-list-alt',
    'desc'      => esc_html__( 'Options to customize blog archives and single blog post page.', 'vodi' ),
    'fields'    => array(
        array(
            'id'        => 'blog_general_section_start',
            'type'      => 'section',
            'title'     => esc_html__( 'General', 'vodi' ),
            'indent'    => true,
        ),

        array(
            'title'     => esc_html__( 'Blog Layout', 'vodi' ),
            'subtitle'  => esc_html__( 'Select the layout for your Blog listing.', 'vodi' ),
            'id'        => 'blog_layout',
            'type'      => 'select',
            'options'   => array(
                'full-width'        => esc_html__( 'Full Width', 'vodi' ),
                'sidebar-left'      => esc_html__( 'Left Sidebar', 'vodi' ),
                'sidebar-right'     => esc_html__( 'Right Sidebar', 'vodi' ),
            ),
            'default'   => 'sidebar-right',
        ),

        array(
            'title'     => esc_html__( 'Blog Theme', 'vodi' ),
            'subtitle'  => esc_html__( 'Select the theme for your Blog Listing.', 'vodi' ),
            'id'        => 'blog_theme',
            'type'      => 'select',
            'options'   => array(
                'light'     => esc_html__( 'Light', 'vodi' ),
                'dark'      => esc_html__( 'Dark', 'vodi' ),
            ),
            'default'   => 'light',
        ),

        array(
            'id'        => 'blog_general_section_end',
            'type'      => 'section',
            'indent'    => false,
        ),

        array(
            'id'        => 'single_post_general_section_start',
            'type'      => 'section',
            'title'     => esc_html__( 'Single Post', 'vodi' ),
            'indent'    => true,
        ),

        array(
            'title'    => esc_html__( 'Single Blog Post Layout', 'vodi' ),
            'subtitle' => esc_html__( 'Select the layout for the Single Post', 'vodi' ),
            'type'     => 'select',
            'id'       => 'single_post_layout',
            'options'  => array(
                'full-width'        => esc_html__( 'Full Width', 'vodi' ),
                'sidebar-left'      => esc_html__( 'Left Sidebar', 'vodi' ),
                'sidebar-right'     => esc_html__( 'Right Sidebar', 'vodi' ),
            ),
            'default'   => 'sidebar-right'
        ),

        array(
            'title'     => esc_html__( 'Separate Sidebar for Single Post ?', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose if you want a separate sidebar for single post', 'vodi' ),
            'desc'      => esc_html__( 'Choosing "Yes", will create a new "Blog Post Sidebar" widget area in Appearance > Widgets. Choose "No" to show "Blog Sidebar" in Single Blog post', 'vodi' ),
            'id'        => 'enable_single_post_sidebar',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'type'      => 'switch',
            'default'   => false,
        ),

        array(
            'title'     => esc_html__( 'Enable Related Posts', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose if you want to enable related posts section in single blog post', 'vodi' ),
            'id'        => 'enable_related_posts',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'type'      => 'switch',
            'default'   => false,
        ),

        array(
            'title'     => esc_html__( 'Related Posts Title', 'vodi' ),
            'subtitle'  => esc_html__( 'Specify the title for "Related Posts" section', 'vodi' ),
            'id'        => 'related_posts_title',
            'type'      => 'text',
            'default'   => esc_html__( 'You May Also Like', 'vodi' ),
            'required'  => array( 'enable_related_posts', 'equals', true ), 
        ),

        array(
            'title'     => esc_html__( 'Number of Related Posts', 'vodi' ),
            'subtitle'  => esc_html__( 'How many related posts you want to show ?', 'vodi' ),
            'desc'      => esc_html__( 'Minimum related posts you can show is 3 and maximum is 12. If there are less than 3 posts the block will not appear', 'vodi' ),
            'id'        => 'related_posts_number',
            'type'      => 'spinner',
            'min'       => '3',
            'max'       => '12',
            'default'   => '3',
            'required'  => array( 'enable_related_posts', 'equals', true ), 
        ),

        array(
            'id'        => 'single_post_general_section_end',
            'type'      => 'section',
            'indent'    => false,
        ),
    )
) );