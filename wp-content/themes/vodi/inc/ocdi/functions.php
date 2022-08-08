<?php

function vodi_ocdi_import_files() {
    $dd_path = trailingslashit( get_template_directory() ) . 'assets/dummy-data/';
    return apply_filters( 'vodi_ocdi_files_args', array(
        array(
            'import_file_name'             => 'Main',
            'categories'                   => array( 'Vodi' ),
            'local_import_file'            => $dd_path . 'main/dummy-data.xml',
            'local_import_widget_file'     => $dd_path . 'main/widgets.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => $dd_path . 'main/redux-options.json',
                    'option_name' => 'vodi_options',
                ),
            ),
            'import_preview_image_url'     => 'https://transvelo.github.io/vodi/assets/images/screenshots/main.jpg',
            'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'vodi' ),
            'preview_url'                  => 'https://demo.madrasthemes.com/vodi/',
        ),
        array(
            'import_file_name'             => 'Vodi Prime',
            'categories'                   => array( 'Vodi' ),
            'local_import_file'            => $dd_path . 'prime/dummy-data.xml',
            'local_import_widget_file'     => $dd_path . 'prime/widgets.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => $dd_path . 'prime/redux-options.json',
                    'option_name' => 'vodi_options',
                ),
            ),
            'import_preview_image_url'     => 'https://transvelo.github.io/vodi/assets/images/screenshots/prime.jpg',
            'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'vodi' ),
            'preview_url'                  => 'https://demo.madrasthemes.com/vodi-prime/',
        ),
        array(
            'import_file_name'             => 'Vodi Tube',
            'categories'                   => array( 'Vodi' ),
            'local_import_file'            => $dd_path . 'tube/dummy-data.xml',
            'local_import_widget_file'     => $dd_path . 'tube/widgets.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => $dd_path . 'tube/redux-options.json',
                    'option_name' => 'vodi_options',
                ),
            ),
            'import_preview_image_url'     => 'https://transvelo.github.io/vodi/assets/images/screenshots/tube.jpg',
            'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'vodi' ),
            'preview_url'                  => 'https://demo.madrasthemes.com/vodi-tube/',
        ),
        array(
            'import_file_name'             => 'Vodi Sports',
            'categories'                   => array( 'Vodi' ),
            'local_import_file'            => $dd_path . 'sports/dummy-data.xml',
            'local_import_widget_file'     => $dd_path . 'sports/widgets.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => $dd_path . 'sports/redux-options.json',
                    'option_name' => 'vodi_options',
                ),
            ),
            'import_preview_image_url'     => 'https://transvelo.github.io/vodi/assets/images/screenshots/sports.jpg',
            'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'vodi' ),
            'preview_url'                  => 'https://demo.madrasthemes.com/vodi-sports/',
        ),
        array(
            'import_file_name'             => 'Vodi Stream',
            'categories'                   => array( 'Vodi' ),
            'local_import_file'            => $dd_path . 'stream/dummy-data.xml',
            'local_import_widget_file'     => $dd_path . 'stream/widgets.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => $dd_path . 'stream/redux-options.json',
                    'option_name' => 'vodi_options',
                ),
            ),
            'import_preview_image_url'     => 'https://transvelo.github.io/vodi/assets/images/screenshots/stream.jpg',
            'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'vodi' ),
            'preview_url'                  => 'https://demo.madrasthemes.com/vodi-stream/',
        ),
    ) );
}

function vodi_ocdi_after_import_setup( $selected_import ) {
    
    // Assign menus to their locations.
    $primary                = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
    $secondary              = get_term_by( 'name', 'Secondary Menu', 'nav_menu' );
    $secondary_nav_v3       = get_term_by( 'name', 'Secondary nav v3 menu', 'nav_menu' );
    $offcanvas              = get_term_by( 'name', 'Offcanvas Menu', 'nav_menu' );
    $navbar_primary         = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
    $footer_quick_links     = get_term_by( 'name', 'Footer Quick Links', 'nav_menu' );
    $footer_primary_menu    = get_term_by( 'name', 'Footer primary menu', 'nav_menu' );
    $footer_secondary_menu  = get_term_by( 'name', 'Footer Secondary Menu', 'nav_menu' );
    $footer_tertiary_menu   = get_term_by( 'name', 'Footer tertiary menu', 'nav_menu' );
    $footer_v4_menu         = get_term_by( 'name', 'Footer v4 Menu', 'nav_menu' );
    $landing_nav            = get_term_by( 'name', 'Landing Primary Menu', 'nav_menu' );
    $comingsoon_offcanvas   = get_term_by( 'name', 'Coming Soon OffCanvas', 'nav_menu' );
    $landing_footer_menu    = get_term_by( 'name', 'Landing Page Footer Menu', 'nav_menu' );
    $social_media           = get_term_by( 'name', 'Footer Social Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary'               => $primary->term_id,
            'secondary'             => $secondary->term_id,
            'secondary-nav-v3'      => $secondary_nav_v3->term_id,
            'offcanvas'             => $offcanvas->term_id,
            'navbar-primary'        => $navbar_primary->term_id,
            'footer-quick-links'    => $footer_quick_links->term_id,
            'footer-primary-menu'   => $footer_primary_menu->term_id,
            'footer-secondary-menu' => $footer_secondary_menu->term_id,
            'footer-tertiary-menu'  => $footer_tertiary_menu->term_id,
            'footer-v4-menu'        => $footer_v4_menu->term_id,
            'landing-nav'           => $landing_nav->term_id,
            'comingsoon-offcanvas'  => $comingsoon_offcanvas->term_id,
            'landing-footer-menu'   => $landing_footer_menu->term_id,
            'social-media'          => $social_media->term_id,
        )
    );

    // Assign front page and posts page (blog page) and other WooCommerce pages
    $front_page_id              = get_page_by_title( 'Home v1' );
    $blog_page_id               = get_page_by_title( 'Blog' );
    $myaccount_page_id          = get_page_by_title( 'My Account' );
    $upload_video_page_id       = get_page_by_title( 'Upload Video' );
    $movies_page_id             = get_page_by_title( 'Movies' );
    $tv_shows_page_id           = get_page_by_title( 'TV Shows' );
    $videos_page_id             = get_page_by_title( 'Videos' );
    $persons_page_id            = get_page_by_title( 'Persons' );

    if ( 'Vodi Prime' === $selected_import['import_file_name'] ) {
        $front_page_id = $tv_shows_page_id;
    } elseif ( 'Vodi Tube' === $selected_import['import_file_name'] ) {
        $front_page_id = $videos_page_id;
    } elseif ( 'Vodi Sports' === $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Home' );
    } elseif ( 'Vodi Stream' === $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Home v8' );
        vodi_ocdi_import_wpforms( 'stream' );
    } else {
        vodi_ocdi_import_wpforms( 'main' );
    }

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
    update_option( 'masvideos_myaccount_page_id', $myaccount_page_id->ID );
    update_option( 'masvideos_upload_video_page_id', $upload_video_page_id->ID );
    update_option( 'masvideos_movies_page_id', $movies_page_id->ID );
    update_option( 'masvideos_tv_shows_page_id', $tv_shows_page_id->ID );
    update_option( 'masvideos_videos_page_id', $videos_page_id->ID );
    update_option( 'masvideos_persons_page_id', $persons_page_id->ID );

    // Enable Reviews
    update_option( 'masvideos_episode_review_rating_required', 'yes' );
    update_option( 'masvideos_tv_show_review_rating_required', 'yes' );
    update_option( 'masvideos_movie_review_rating_required', 'yes' );

    // Enable Registration
    update_option( 'masvideos_enable_myaccount_registration', 'yes' );

    // Disable WP ULike
    $wp_ulike_settings = get_option( 'wp_ulike_settings', array() );
    
    if( isset( $wp_ulike_settings['posts_group'] ) ) {
        $posts_group_settings = array( 'enable_auto_display' => 0 );
        $wp_ulike_settings['posts_group'] = wp_parse_args( $posts_group_settings, $wp_ulike_settings['posts_group'] );
    }

    if( isset( $wp_ulike_settings['comments_group'] ) ) {
        $comments_group_settings = array( 'enable_auto_display' => 0 );
        $wp_ulike_settings['comments_group'] = wp_parse_args( $comments_group_settings, $wp_ulike_settings['comments_group'] );
    }

    update_option( 'wp_ulike_settings', $wp_ulike_settings );

    // Backward compatibility to disable WP ULike
    $wpul_general_setting = get_option( 'wp_ulike_general', array() );
    $wpul_general_setting['notifications'] = 0;
    update_option( 'wp_ulike_general', $wpul_general_setting );

    $wpul_posts_setting = get_option( 'wp_ulike_posts', array() );
    $wpul_posts_setting['auto_display'] = 0;
    update_option( 'wp_ulike_posts', $wpul_posts_setting );

    $wpul_comments_setting = get_option( 'wp_ulike_comments', array() );
    $wpul_comments_setting['auto_display'] = 0;
    update_option( 'wp_ulike_comments', $wpul_comments_setting );

}

function vodi_ocdi_before_widgets_import() {

    $sidebars_widgets = get_option('sidebars_widgets');
    $all_widgets = array();

    array_walk_recursive( $sidebars_widgets, function ($item, $key) use ( &$all_widgets ) {
        if( ! isset( $all_widgets[$key] ) ) {
            $all_widgets[$key] = $item;
        } else {
            $all_widgets[] = $item;
        }
    } );

    if( isset( $all_widgets['array_version'] ) ) {
        $array_version = $all_widgets['array_version'];
        unset( $all_widgets['array_version'] );
    }

    $new_sidebars_widgets = array_fill_keys( array_keys( $sidebars_widgets ), array() );

    $new_sidebars_widgets['wp_inactive_widgets'] = $all_widgets;
    if( isset( $array_version ) ) {
        $new_sidebars_widgets['array_version'] = $array_version;
    }

    update_option( 'sidebars_widgets', $new_sidebars_widgets );
}

function vodi_ocdi_import_wpforms($demo_path = 'main') {
    if ( ! function_exists( 'wpforms' ) ) {
        return;
    }

    $forms = [
        [
            'file' => 'wpforms-contact.json'
        ],
        [
            'file' => 'wpforms-subscribe.json'
        ]
    ];

    foreach ( $forms as $form ) {
        ob_start();
        vodi_get_template( $form['file'], array(), 'assets/dummy-data/' . $demo_path . '/' );
        $form_json = ob_get_clean();
        $form_data = json_decode( $form_json, true );

        if ( empty( $form_data[0] ) ) {
            continue;
        }
        $form_data = $form_data[0];
        $form_title = $form_data['settings']['form_title'];

        if( !empty( $form_data['id'] ) ) {
            $form_content = array(
                'field_id' => '0',
                'settings' => array(
                    'form_title' => sanitize_text_field( $form_title ),
                    'form_desc'  => '',
                ),
            );

            // Merge args and create the form.
            $form = array(
                'import_id'     => (int) $form_data['id'],
                'post_title'    => esc_html( $form_title ),
                'post_status'   => 'publish',
                'post_type'     => 'wpforms',
                'post_content'  => wpforms_encode( $form_content ),
            );

            $form_id = wp_insert_post( $form );
        } else {
            // Create initial form to get the form ID.
            $form_id   = wpforms()->form->add( $form_title );
        }

        if ( empty( $form_id ) ) {
            continue;
        }

        $form_data['id'] = $form_id;
        // Save the form data to the new form.
        wpforms()->form->update( $form_id, $form_data );
    }
}

function vodi_ocdi_wp_import_post_data_processed( $postdata, $data ) {
    if( defined( 'PT_OCDI_VERSION' ) && version_compare( PT_OCDI_VERSION, '2.6.0' , '<' ) ) {
        return wp_slash( $postdata );
    }

    return $postdata;
}