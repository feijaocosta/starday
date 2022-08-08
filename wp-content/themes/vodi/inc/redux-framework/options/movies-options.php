<?php
/**
 * Options available for Movies sub menu of Theme Options
 * 
 */

$movies_options = apply_filters( 'vodi_movies_options_args', array(
    'title'     => esc_html__( 'Movies', 'vodi' ),
    'icon'      => 'fas fa-film',
    'desc'      => esc_html__( 'Options to customize movies page.', 'vodi' ),
    'fields'    => array(

        array(
            'id' => 'section_movies_start',
            'type' => 'section',
            'title' => esc_html__( 'General', 'vodi' ),
            'indent' => true,
        ),

        array(
            'title'     => esc_html__( 'Archive Layout', 'vodi' ),
            'subtitle'  => esc_html__( 'Select the layout for the Movies page', 'vodi' ),
            'id'        => 'movies_layout',
            'type'      => 'select',
            'options'   => array(
                'full-width'        => esc_html__( 'Full Width', 'vodi' ),
                'sidebar-left'      => esc_html__( 'Left Sidebar', 'vodi' ),
                'sidebar-right'     => esc_html__( 'Right Sidebar', 'vodi' ),
            ),
            'default'   => 'sidebar-left',
        ),

        array(
            'id' => 'movies_theme',
            'title' => esc_html__( 'Theme', 'vodi' ),
            'subtitle' => esc_html__( 'Select a theme for the Movies page', 'vodi' ),
            'type' => 'select',
            'options' => array(
                'light' =>  esc_html__( 'Light', 'vodi' ),
                'dark' =>  esc_html__( 'Dark', 'vodi' ),
            ),
            'default' => 'dark'
        ),

        array(
            'title'     => esc_html__( 'Number of Movies Rows', 'vodi' ),
            'subtitle'  => esc_html__( 'Drag the slider to set the number of rows per page to be listed on the movies page.', 'vodi' ),
            'id'        => 'movie_rows',
            'min'       => '1',
            'step'      => '1',
            'max'       => '8',
            'type'      => 'slider',
            'default'   => '4',
        ),

        array(
            'title'     => esc_html__( 'Number of Movies Columns', 'vodi' ),
            'subtitle'  => esc_html__( 'Drag the slider to set the number of columns for displaying movies in movies page.', 'vodi' ),
            'id'        => 'movie_columns',
            'min'       => '2',
            'step'      => '1',
            'max'       => '6',
            'type'      => 'slider',
            'default'   => '6',
        ),

        array(
            'id'       => 'movies_control_bar_tag_filter_slugs',
            'type'     => 'select',
            'multi'    => true,
            'sortable' => true,
            'title'    => esc_html__( 'Select Tags', 'vodi' ), 
            'subtitle' => esc_html__( 'Select tags for the Movies page', 'vodi' ),
            'data'     => 'callback',
            'args'     => 'vodi_redux_get_movie_tag_terms_options'
        ),

        array(
            'id'        => 'movies_jumbotron_top_id',
            'title'     => esc_html__( 'Movies Page Jumbotron', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose a static block that will be the jumbotron element for movies page', 'vodi' ),
            'type'      => 'select',
            'data'      => 'posts',
            'args'      => array(
                'post_type'         => 'mas_static_content',
                'posts_per_page'    => -1,
            )
        ),

        array(
            'id'        => 'movie_archive_enabled_views',
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
            'id' => 'section_movies_end',
            'type' => 'section',
            'indent' => false
        ),

        array(
            'id' => 'section_movie_single_start',
            'type' => 'section',
            'title' => esc_html__( 'Single Movie', 'vodi' ),
            'indent' => true,
        ),

        array(
            'id' => 'movie_style',
            'title' => esc_html__( 'Style', 'vodi' ),
            'subtitle' => esc_html__( 'Select a style for Movie page', 'vodi' ),
            'type' => 'select',
            'options' => array(
                'v1' =>  esc_html__( 'Style v1', 'vodi' ),
                'v2' =>  esc_html__( 'Style v2', 'vodi' ),
                'v3' =>  esc_html__( 'Style v3', 'vodi' ),
                'v4' =>  esc_html__( 'Style v4', 'vodi' ),
                'v5' =>  esc_html__( 'Style v5', 'vodi' ),
                'v6' =>  esc_html__( 'Style v6', 'vodi' ),
                'v7' =>  esc_html__( 'Style v7', 'vodi' ),
            ),
            'default' => 'v1'
        ),

        array(
            'title'     => esc_html__( 'Single Movie Banner Content', 'vodi' ),
            'id'        => 'movie_banner_content',
            'type'      => 'textarea',
            'subtitle'  => esc_html__( 'Paste your banner HTML or shortcode', 'vodi' ),
        ),

        array(
            'title'     => esc_html__( 'Allow Movie Download ?', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose if you want to allow users to download movie', 'vodi' ),
            'id'        => 'enable_movie_download',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'type'      => 'switch',
            'default'   => false,
        ),

        array(
            'id' => 'section_movie_single_end',
            'type' => 'section',
            'indent' => false
        ),
    )
) );