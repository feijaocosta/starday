<?php
/**
 * Options available for Videos sub menu of Theme Options
 * 
 */

$videos_options = apply_filters( 'vodi_videos_options_args', array(
    'title'     => esc_html__( 'Videos', 'vodi' ),
    'icon'      => 'fas fa-video',
    'desc'      => esc_html__( 'Options to customize videos page.', 'vodi' ),
    'fields'    => array(

        array(
            'id' => 'section_videos_start',
            'type' => 'section',
            'title' => esc_html__( 'General', 'vodi' ),
            'indent' => true,
        ),

        array(
            'title'     => esc_html__( 'Archive Style', 'vodi' ),
            'subtitle'  => esc_html__( 'Select the archive style for the Videos page', 'vodi' ),
            'id'        => 'videos_style',
            'type'      => 'select',
            'options'   => array(
                ''        => esc_html__( 'Default', 'vodi' ),
                'tube'    => esc_html__( 'Tube', 'vodi' ),
            ),
            'default'   => '',
        ),

        array(
            'title'     => esc_html__( 'Archive Layout', 'vodi' ),
            'subtitle'  => esc_html__( 'Select the layout for the Videos page', 'vodi' ),
            'id'        => 'videos_layout',
            'type'      => 'select',
            'options'   => array(
                'full-width'        => esc_html__( 'Full Width', 'vodi' ),
                'sidebar-left'      => esc_html__( 'Left Sidebar', 'vodi' ),
                'sidebar-right'     => esc_html__( 'Right Sidebar', 'vodi' ),
            ),
            'default'   => 'sidebar-left',
        ),

        array(
            'id' => 'videos_theme',
            'title' => esc_html__( 'Theme', 'vodi' ),
            'subtitle' => esc_html__( 'Select a theme for the Videos page', 'vodi' ),
            'type' => 'select',
            'options' => array(
                'light' =>  esc_html__( 'Light', 'vodi' ),
                'dark' =>  esc_html__( 'Dark', 'vodi' ),
            ),
            'default' => 'light'
        ),

        array(
            'title'     => esc_html__( 'Number of Videos Rows', 'vodi' ),
            'subtitle'  => esc_html__( 'Drag the slider to set the number of rows per page to be listed on the videos page.', 'vodi' ),
            'id'        => 'video_rows',
            'min'       => '1',
            'step'      => '1',
            'max'       => '8',
            'type'      => 'slider',
            'default'   => '6',
        ),

        array(
            'title'     => esc_html__( 'Number of Videos Columns', 'vodi' ),
            'subtitle'  => esc_html__( 'Drag the slider to set the number of columns for displaying tv shows in videos page.', 'vodi' ),
            'id'        => 'video_columns',
            'min'       => '2',
            'step'      => '1',
            'max'       => '6',
            'type'      => 'slider',
            'default'   => '5',
        ),

        array(
            'id'       => 'videos_control_bar_tag_filter_slugs',
            'type'     => 'select',
            'multi'    => true,
            'sortable' => true,
            'title'    => esc_html__( 'Select Tags', 'vodi' ), 
            'subtitle' => esc_html__( 'Select tags for the Videos page', 'vodi' ),
            'data'     => 'callback',
            'args'     => 'vodi_redux_get_video_tag_terms_options'
        ),

        array(
            'id'        => 'videos_jumbotron_top_id',
            'title'     => esc_html__( 'Videos Page Jumbotron', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose a static block that will be the jumbotron element for videos page', 'vodi' ),
            'type'      => 'select',
            'data'      => 'posts',
            'args'      => array(
                'post_type'         => 'mas_static_content',
                'posts_per_page'    => -1,
            )
        ),

        array(
            'id' => 'section_videos_end',
            'type' => 'section',
            'indent' => false
        ),

        array(
            'id' => 'section_video_single_start',
            'type' => 'section',
            'title' => esc_html__( 'Single Video', 'vodi' ),
            'indent' => true,
        ),

        array(
            'id' => 'video_style',
            'title' => esc_html__( 'Style', 'vodi' ),
            'subtitle' => esc_html__( 'Select a style for Video page', 'vodi' ),
            'type' => 'select',
            'options' => array(
                'v1' =>  esc_html__( 'Style v1', 'vodi' ),
                'v2' =>  esc_html__( 'Style v2', 'vodi' ),
                'v3' =>  esc_html__( 'Style v3', 'vodi' ),
                'v4' =>  esc_html__( 'Style v4', 'vodi' ),
                'v5' =>  esc_html__( 'Style v5', 'vodi' ),
                'v6' =>  esc_html__( 'Style v6', 'vodi' ),
            ),
            'default' => 'v1'
        ),

        array(
            'title'     => esc_html__( 'Single Video Banner Content', 'vodi' ),
            'id'        => 'video_banner_content',
            'type'      => 'textarea',
            'subtitle'  => esc_html__( 'Paste your banner HTML or shortcode', 'vodi' ),
        ),

        array(
            'title'     => esc_html__( 'Allow Video Download ?', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose if you want to allow users to download video', 'vodi' ),
            'id'        => 'enable_video_download',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'type'      => 'switch',
            'default'   => false,
        ),

        array(
            'id' => 'section_video_single_end',
            'type' => 'section',
            'indent' => false
        ),

        array(
            'id' => 'section_video_upload_single_start',
            'type' => 'section',
            'title' => esc_html__( 'Video Upload', 'vodi' ),
            'indent' => true,
        ),

        array(
            'title'     => esc_html__( 'Enable Video Uplod Instructions ?', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose if you want display the video upload instructions', 'vodi' ),
            'id'        => 'enable_upload_instruction',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'type'      => 'switch',
            'default'   => false,
        ),

        array(
            'id'        => 'img_0_src',
            'title'     => esc_html__( 'Icon Image', 'vodi' ),
            'subtitle'  => esc_html__( 'Upload instruction icon image.', 'vodi' ),
            'type'      => 'media',
            'required'  => array( 'enable_upload_instruction', 'equals', 1 )
        ),

        array(
            'id'        => 'ins_0_detail',
            'title'     => esc_html__( 'Instruction 1', 'vodi' ),
            'type'      => 'textarea',
            'default'   => wp_kses_post('– <span>No</span> videos that is copyrighted, content with WATERMARKS (text domains or logos), unless you are the author or have permission from the owner to post it. If you own the copyright, please contact us to get a <a href="#">producer`s account</a>'),
            'required'  => array( 'enable_upload_instruction', 'equals', 1 )
        ),

        array(
            'id'        => 'img_1_src',
            'title'     => esc_html__( 'Icon Image', 'vodi' ),
            'subtitle'  => esc_html__( 'Upload instruction icon image.', 'vodi' ),
            'type'      => 'media',
            'required'  => array( 'enable_upload_instruction', 'equals', 1 )
        ),

        array(
            'id'        => 'ins_1_detail',
            'title'     => esc_html__( 'Instruction 2', 'vodi' ),
            'type'      => 'textarea',
            'default'   => wp_kses_post('<span class="title">Are you looking for general advice on content?</span>- Our Community Guidelines will help you avoid the hassles and your content with visitors will grow.'),
            'required'  => array( 'enable_upload_instruction', 'equals', 1 )
        ),

        array(
            'id' => 'section_video_upload_single_end',
            'type' => 'section',
            'indent' => false
        ),
    )
) );