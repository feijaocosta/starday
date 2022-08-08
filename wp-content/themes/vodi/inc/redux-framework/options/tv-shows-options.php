<?php
/**
 * Options available for TV Shows sub menu of Theme Options
 * 
 */

$tv_shows_options = apply_filters( 'vodi_tv_shows_options_args', array(
    'title'     => esc_html__( 'TV Shows', 'vodi' ),
    'icon'      => 'fas fa-tv',
    'desc'      => esc_html__( 'Options to customize tv shows page.', 'vodi' ),
    'fields'    => array(

        array(
            'id' => 'section_tv_shows_start',
            'type' => 'section',
            'title' => esc_html__( 'General', 'vodi' ),
            'indent' => true,
        ),

        array(
            'title'     => esc_html__( 'Archive Style', 'vodi' ),
            'subtitle'  => esc_html__( 'Select the archive style for the TV Shows page', 'vodi' ),
            'id'        => 'tv_shows_style',
            'type'      => 'select',
            'options'   => array(
                ''        => esc_html__( 'Default', 'vodi' ),
                'tube'    => esc_html__( 'Tube', 'vodi' ),
            ),
            'default'   => '',
        ),

        array(
            'title'     => esc_html__( 'Archive Layout', 'vodi' ),
            'subtitle'  => esc_html__( 'Select the layout for the TV Shows page', 'vodi' ),
            'id'        => 'tv_shows_layout',
            'type'      => 'select',
            'options'   => array(
                'full-width'        => esc_html__( 'Full Width', 'vodi' ),
                'sidebar-left'      => esc_html__( 'Left Sidebar', 'vodi' ),
                'sidebar-right'     => esc_html__( 'Right Sidebar', 'vodi' ),
            ),
            'default'   => 'sidebar-left',
        ),

        array(
            'id' => 'tv_shows_theme',
            'title' => esc_html__( 'Theme', 'vodi' ),
            'subtitle' => esc_html__( 'Select a theme for the TV Shows page', 'vodi' ),
            'type' => 'select',
            'options' => array(
                'light' =>  esc_html__( 'Light', 'vodi' ),
                'dark' =>  esc_html__( 'Dark', 'vodi' ),
            ),
            'default' => 'dark'
        ),

        array(
            'title'     => esc_html__( 'Number of TV Shows Rows', 'vodi' ),
            'subtitle'  => esc_html__( 'Drag the slider to set the number of rows per page to be listed on the tv shows page.', 'vodi' ),
            'id'        => 'tv_show_rows',
            'min'       => '1',
            'step'      => '1',
            'max'       => '8',
            'type'      => 'slider',
            'default'   => '6',
        ),

        array(
            'title'     => esc_html__( 'Number of TV Shows Columns', 'vodi' ),
            'subtitle'  => esc_html__( 'Drag the slider to set the number of columns for displaying tv shows in tv shows page.', 'vodi' ),
            'id'        => 'tv_show_columns',
            'min'       => '2',
            'step'      => '1',
            'max'       => '6',
            'type'      => 'slider',
            'default'   => '5',
        ),

        array(
            'id'       => 'tv_shows_control_bar_tag_filter_slugs',
            'type'     => 'select',
            'multi'    => true,
            'sortable' => true,
            'title'    => esc_html__( 'Select Tags', 'vodi' ), 
            'subtitle' => esc_html__( 'Select tags for the TV Shows page', 'vodi' ),
            'data'     => 'callback',
            'args'     => 'vodi_redux_get_tv_show_tag_terms_options'
        ),

        array(
            'id'        => 'tv_shows_jumbotron_top_id',
            'title'     => esc_html__( 'TV Shows Page Jumbotron', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose a static block that will be the jumbotron element for tv shows page', 'vodi' ),
            'type'      => 'select',
            'data'      => 'posts',
            'args'      => array(
                'post_type'         => 'mas_static_content',
                'posts_per_page'    => -1,
            )
        ),

        array(
            'id'        => 'tv_show_archive_enabled_views',
            'type'      => 'sorter',
            'title'     => esc_html__( 'Archive views', 'vodi' ),
            'subtitle'  => esc_html__( 'Please drag and arrange the views. Top most view will be the default view', 'vodi' ),
            'options'   => array(
                'enabled' => array(
                    'grid'            => esc_html__( 'Grid', 'vodi' ),
                    'grid-extended'   => esc_html__( 'Grid Extended', 'vodi' ),
                    'list-large'      => esc_html__( 'List Large', 'vodi' ),
                    'list-small'      => esc_html__( 'List Small', 'vodi' ),
                    'list'            => esc_html__( 'List', 'vodi' )
                ),
                'disabled' => array()
            )
        ),

        array(
            'id' => 'section_tv_shows_end',
            'type' => 'section',
            'indent' => false
        ),

        array(
            'id' => 'section_episode_single_start',
            'type' => 'section',
            'title' => esc_html__( 'Single Episode', 'vodi' ),
            'indent' => true,
        ),

        array(
            'id' => 'episode_style',
            'title' => esc_html__( 'Style', 'vodi' ),
            'subtitle' => esc_html__( 'Select a style for Episode page', 'vodi' ),
            'type' => 'select',
            'options' => array(
                'v1' =>  esc_html__( 'Style v1', 'vodi' ),
                'v2' =>  esc_html__( 'Style v2', 'vodi' ),
                'v3' =>  esc_html__( 'Style v3', 'vodi' ),
                'v4' =>  esc_html__( 'Style v4', 'vodi' ),
            ),
            'default' => 'v1'
        ),

        array(
            'title'     => esc_html__( 'Allow Episode Download ?', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose if you want to allow users to download episode', 'vodi' ),
            'id'        => 'enable_episode_download',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'type'      => 'switch',
            'default'   => false,
        ),

        array(
            'id' => 'section_episode_single_end',
            'type' => 'section',
            'indent' => false
        ),
    )
) );