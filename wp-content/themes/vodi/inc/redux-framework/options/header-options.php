<?php
/**
 * Options available for Header sub menu of Theme Options
 * 
 */
$header_options     = apply_filters( 'vodi_header_options_args', array(
    'title'     => esc_html__( 'Header', 'vodi' ),
    'icon'      => 'far fa-arrow-alt-circle-up',
    'desc'      => esc_html__( 'Options available to customize the header of your website', 'vodi' ),
    'fields'    => array(
        array(
            'title'     => esc_html__( 'Logo', 'vodi' ),
            'id'        => 'logo_start',
            'type'      => 'section',
            'indent'    => true,
            'subtitle'  => esc_html__( 'To upload your own logo, please use Appearance > Customize > Site Identity > Site Logo. This option is only for SVG Logo usage. By default Wordpress does not allow you to upload SVG files. To use an SVG logo, you should paste your SVG code into vodi-child/templates/global/logo-svg.php file and enable SVG Logo option below.', 'vodi' ),
        ),

        array(
            'title'     => esc_html__( 'SVG Logo', 'vodi' ),
            'subtitle'  => esc_html__( 'Enable to use SVG logo instead of site title', 'vodi' ),
            'desc'      => esc_html__( 'This will not work when you use site logo in customizer.', 'vodi' ),
            'id'        => 'logo_svg',
            'type'      => 'switch',
            'on'        => esc_html__( 'Enabled', 'vodi' ),
            'off'       => esc_html__( 'Disabled', 'vodi' ),
            'default'   => 1,
        ),

        array(
            'id'        => 'logo_end',
            'type'      => 'section',
            'indent'    => false
        ),

        array(
            'title'     => esc_html__( 'Masthead', 'vodi' ),
            'id'        => 'masthead_start',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Header Style', 'vodi' ),
            'subtitle'  => esc_html__( 'Select the header style.', 'vodi' ),
            'desc'      => esc_html__( 'This choice can be overridden at page level via Vodi Page Options', 'vodi' ),
            'id'        => 'header_version',
            'type'      => 'select',
            'options'   => array(
                'v1'          => esc_html__( 'Header v1', 'vodi' ),
                'v2'          => esc_html__( 'Header v2', 'vodi' ),
                'v3'          => esc_html__( 'Header v3', 'vodi' ),
                'v4'          => esc_html__( 'Header v4', 'vodi' ),
                'landing-v1'  => esc_html__( 'Header Landing v1', 'vodi' ),
                'landing-v2'  => esc_html__( 'Header Landing v2', 'vodi' ),
                'comingsoon'  => esc_html__( 'Header Coming Soon', 'vodi' ),
            ),
            'default'   => 'v1',
        ),

        array(
            'title'     => esc_html__( 'Header Theme', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose between Dark and Light themes for your header', 'vodi' ),
            'desc'      => esc_html__( 'This choice can be overridden at page level via Vodi Page Options', 'vodi' ),
            'id'        => 'header_theme',
            'type'      => 'select',
            'options'   => array(
                'light'       => esc_html__( 'Light', 'vodi' ),
                'dark'        => esc_html__( 'Dark', 'vodi' ),
            ),
            'default'   => 'light',
            'required'  => array( 'header_version', 'not', 'v3' )
        ),

        array(
            'title'     => esc_html__( 'Header Search Form', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose between Movie, Video and TV Show search form for your header', 'vodi' ),
            'id'        => 'header_search_type',
            'type'      => 'select',
            'options'   => array(
                'movie'       => esc_html__( 'Movie', 'vodi' ),
                'video'       => esc_html__( 'Video', 'vodi' ),
                'tv_show'     => esc_html__( 'TV Show', 'vodi' ),
            ),
            'default'   => 'video',
        ),

        array(
            'id'        => 'header_static_content_id',
            'title'     => esc_html__( 'Header v4 Static Content', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose a static content that will be displayed top of header v4', 'vodi' ),
            'type'      => 'select',
            'data'      => 'posts',
            'args'      => array(
                'post_type'         => 'mas_static_content',
                'posts_per_page'    => -1,
            ),
        ),

        array(
            'title'     => esc_html__( 'Enable Sticky Header', 'vodi' ),
            'subtitle'  => esc_html__( 'Would you like the header to be stuck to the top of your screen when the user scrolls ?', 'vodi' ),
            'id'        => 'enable_sticky_header',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'type'      => 'switch',
            'default'   => false,
        ),

        array(
            'title'     => esc_html__( 'Enable Handheld Sticky Header', 'vodi' ),
            'subtitle'  => esc_html__( 'Would you like the handheld header to be stuck to the top of your screen when the user scrolls ?', 'vodi' ),
            'id'        => 'enable_handheld_sticky_header',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'type'      => 'switch',
            'default'   => false,
        ),

        array(
            'title'     => esc_html__( 'Disable Off-Canvas Menu in Desktop', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose to show or hide the navbar toggler for off-canvas menu in desktop', 'vodi' ),
            'id'        => 'disable_offcanvas_menu_desktop',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'type'      => 'switch',
            'default'   => false,
        ),

        array(
            'title'     => esc_html__( 'Enable Search bar', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose to show or hide the search bar in header', 'vodi' ),
            'id'        => 'enable_header_search',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'type'      => 'switch',
            'default'   => true,
        ),

        array(
            'title'     => esc_html__( 'Enable Upload Button', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose to show or hide the upload button in header', 'vodi' ),
            'id'        => 'enable_header_upload_link',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'type'      => 'switch',
            'default'   => true,
        ),

        array(
            'title'     => esc_html__( 'Enable Notification Button', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose to show or hide the notification in header', 'vodi' ),
            'id'        => 'enable_header_notification',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'type'      => 'switch',
            'default'   => true,
        ),

        array(
            'id'        => 'masthead_end',
            'type'      => 'section',
            'indent'    => false
        ),

        array(
            'title'     => esc_html__( 'Header User', 'vodi' ),
            'id'        => 'header_user_start',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Enable User Account', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose to show or hide the user account in header', 'vodi' ),
            'id'        => 'enable_header_user_account',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'type'      => 'switch',
            'default'   => true,
        ),

        array(
            'id'        => 'header_user_end',
            'type'      => 'section',
            'indent'    => false
        ),

        array(
            'title'     => esc_html__( 'Landing v2 Header', 'vodi' ),
            'id'        => 'landing_v2_start',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Enable Back Button', 'vodi' ),
            'subtitle'  => esc_html__( 'Choose to show or hide the back button in header', 'vodi' ),
            'id'        => 'enable_back_option_button',
            'on'        => esc_html__( 'Yes', 'vodi' ),
            'off'       => esc_html__( 'No', 'vodi' ),
            'type'      => 'switch',
            'default'   => true,
        ),

        array(
            'id'        => 'back_option_label',
            'type'      => 'text',
            'title'     => esc_html__( 'Back Button Label', 'vodi' ),
            'subtitle'  => esc_html__( 'Enter the text for back button label', 'vodi' ),
            'default'   => esc_html__( 'Go back to', 'vodi' ),
            'required'  => array( 'enable_back_option_button', 'equals', true ),
        ),

        array(
            'id'        => 'back_option_text',
            'type'      => 'text',
            'title'     => esc_html__( 'Back Button Text', 'vodi' ),
            'subtitle'  => esc_html__( 'Enter the title for your action area', 'vodi' ),
            'default'   => esc_html__( 'Vodi.tv', 'vodi' ),
            'required'  => array( 'enable_back_option_button', 'equals', true ),
        ),

        array(
            'id'        => 'back_option_url',
            'type'      => 'text',
            'title'     => esc_html__( 'Back Button URL', 'vodi' ),
            'subtitle'  => esc_html__( 'Enter the title for your action area', 'vodi' ),
            'default'   => get_home_url(),
            'required'  => array( 'enable_back_option_button', 'equals', true ),
        ),

        array(
            'id'        => 'landing_v2_end',
            'type'      => 'section',
            'indent'    => false
        ),
    )
) );