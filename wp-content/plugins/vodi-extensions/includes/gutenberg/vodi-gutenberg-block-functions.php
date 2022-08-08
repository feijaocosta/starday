<?php

if ( ! function_exists( 'vodi_section_full_width_banner_element' ) ) {
    function vodi_section_full_width_banner_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_full_width_banner' ) ) {
            ob_start();
            vodi_section_full_width_banner( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_video_section_element' ) ) {
    function vodi_video_section_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_video_section' ) ) {
            ob_start();
            vodi_video_section( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_tv_show_section_element' ) ) {
    function vodi_tv_show_section_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_tv_show_section' ) ) {
            ob_start();
            vodi_tv_show_section( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_movie_section_aside_header_element' ) ) {
    function vodi_movie_section_aside_header_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_movie_section_aside_header' ) ) {
            ob_start();
            vodi_movie_section_aside_header( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_video_section_aside_header_element' ) ) {
    function vodi_video_section_aside_header_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_video_section_aside_header' ) ) {
            ob_start();
            vodi_video_section_aside_header( $atts );
            return ob_get_clean();
        }

        return '';
    }
}


if ( ! function_exists( 'vodi_section_movies_carousel_aside_header_element' ) ) {
    function vodi_section_movies_carousel_aside_header_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_movies_carousel_aside_header' ) ) {
            ob_start();
            vodi_section_movies_carousel_aside_header( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_section_videos_carousel_aside_header_element' ) ) {
    function vodi_section_videos_carousel_aside_header_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_videos_carousel_aside_header' ) ) {
            ob_start();
            vodi_section_videos_carousel_aside_header( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_section_movies_carousel_nav_header_element' ) ) {
    function vodi_section_movies_carousel_nav_header_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_movies_carousel_nav_header' ) ) {
            ob_start();
            vodi_section_movies_carousel_nav_header( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_section_videos_carousel_nav_header_element' ) ) {
    function vodi_section_videos_carousel_nav_header_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_videos_carousel_nav_header' ) ) {
            ob_start();
            vodi_section_videos_carousel_nav_header( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_section_movies_carousel_flex_header_element' ) ) {
    function vodi_section_movies_carousel_flex_header_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_movies_carousel_flex_header' ) ) {
            ob_start();
            vodi_section_movies_carousel_flex_header( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_section_videos_carousel_flex_header_element' ) ) {
    function vodi_section_videos_carousel_flex_header_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_videos_carousel_flex_header' ) ) {
            ob_start();
            vodi_section_videos_carousel_flex_header( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_videos_with_featured_video_element' ) ) {
    function vodi_videos_with_featured_video_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_videos_with_featured_video' ) ) {
            ob_start();
            vodi_videos_with_featured_video( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_featured_movies_carousel_element' ) ) {
    function vodi_featured_movies_carousel_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_featured_movies_carousel' ) ) {
            ob_start();
            vodi_featured_movies_carousel( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_section_featured_movie_element' ) ) {
    function vodi_section_featured_movie_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_featured_movie' ) ) {
            ob_start();
            vodi_section_featured_movie( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_section_featured_tv_show_element' ) ) {
    function vodi_section_featured_tv_show_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_featured_tv_show' ) ) {
            ob_start();
            vodi_section_featured_tv_show( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_banner_with_section_tv_shows_element' ) ) {
    function vodi_banner_with_section_tv_shows_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_banner_with_section_tv_shows' ) ) {
            ob_start();
            vodi_banner_with_section_tv_shows( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_blog_list_section_element' ) ) {
    function vodi_blog_list_section_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_blog_list_section' ) ) {
            ob_start();
            vodi_blog_list_section( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_blog_grid_section_element' ) ) {
    function vodi_blog_grid_section_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_blog_grid_section' ) ) {
            ob_start();
            vodi_blog_grid_section( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_blog_tab_section_element' ) ) {
    function vodi_blog_tab_section_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( !empty( $atts['tab_args'] ) ) {
            $atts['tab_args'] = json_decode ( $atts['tab_args'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_blog_tab_section' ) ) {
            ob_start();
            vodi_blog_tab_section( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_section_featured_post_element' ) ) {
    function vodi_section_featured_post_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_featured_post' ) ) {
            ob_start();
            vodi_section_featured_post( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_slider_movies_element' ) ) {
    function vodi_slider_movies_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }
        
        if( function_exists( 'vodi_slider_movies' ) ) {
            ob_start();
            vodi_slider_movies( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_hot_premieres_block_element' ) ) {
    function vodi_hot_premieres_block_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_hot_premieres_block' ) ) {
            ob_start();
            add_filter( 'masvideos_movie_archive_thumbnail_size', 'vodi_recommended_movie_thumbnail_size' );
            vodi_hot_premieres_block( $atts );
            remove_filter( 'masvideos_movie_archive_thumbnail_size', 'vodi_recommended_movie_thumbnail_size' );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_section_live_videos_element' ) ) {
    function vodi_section_live_videos_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_live_videos' ) ) {
            ob_start();
            vodi_section_live_videos( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_section_coming_soon_videos_element' ) ) {
    function vodi_section_coming_soon_videos_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_coming_soon_videos' ) ) {
            ob_start();
            add_filter( 'masvideos_video_is_visible', 'vodi_section_coming_soon_videos_visibility', 10, 2 );
            vodi_section_coming_soon_videos( $atts );
            remove_filter( 'masvideos_video_is_visible', 'vodi_section_coming_soon_videos_visibility', 10, 2 );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_movies_list_element' ) ) {
    function vodi_movies_list_element( $atts ) {
        if( !empty( $atts['section_nav_links_1'] ) ) {
            $atts['section_nav_links_1'] = json_decode ( $atts['section_nav_links_1'], true );
        }

        if( !empty( $atts['section_nav_links_2'] ) ) {
            $atts['section_nav_links_2'] = json_decode ( $atts['section_nav_links_2'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_movies_list' ) ) {
            ob_start();
            vodi_movies_list( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_videos_slider_element' ) ) {
    function vodi_videos_slider_element( $atts ) {
        if( !empty( $atts['sliders'] ) ) {
            $atts['sliders'] = json_decode ( $atts['sliders'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_videos_slider' ) ) {
            ob_start();
            vodi_videos_slider( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_movies_slider_element' ) ) {
    function vodi_movies_slider_element( $atts ) {
        if( !empty( $atts['sliders'] ) ) {
            $atts['sliders'] = json_decode ( $atts['sliders'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_movies_slider' ) ) {
            ob_start();
            vodi_movies_slider( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_tv_shows_slider_element' ) ) {
    function vodi_tv_shows_slider_element( $atts ) {
        if( !empty( $atts['sliders'] ) ) {
            $atts['sliders'] = json_decode ( $atts['sliders'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_tv_shows_slider' ) ) {
            ob_start();
            vodi_tv_shows_slider( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_blog_grid_with_list_section_element' ) ) {
    function vodi_blog_grid_with_list_section_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_blog_grid_with_list_section' ) ) {
            ob_start();
            vodi_blog_grid_with_list_section( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_recent_comments_element' ) ) {
    function vodi_recent_comments_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_recent_comments' ) ) {
            ob_start();
            vodi_recent_comments( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_section_event_category_list_element' ) ) {
    function vodi_section_event_category_list_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_event_category_list' ) ) {
            ob_start();
            vodi_section_event_category_list( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_featured_blog_with_blog_grid_section_element' ) ) {
    function vodi_featured_blog_with_blog_grid_section_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_featured_blog_with_blog_grid_section' ) ) {
            ob_start();
            vodi_featured_blog_with_blog_grid_section( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_landing_hero_banner_element' ) ) {
    function vodi_landing_hero_banner_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_landing_hero_banner' ) ) {
            ob_start();
            vodi_landing_hero_banner( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_active_videos_element' ) ) {
    function vodi_active_videos_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_active_videos' ) ) {
            ob_start();
            vodi_active_videos( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_landing_featured_section_element' ) ) {
    function vodi_landing_featured_section_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_landing_featured_section' ) ) {
            ob_start();
            vodi_landing_featured_section( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_landing_movies_carousel_element' ) ) {
    function vodi_landing_movies_carousel_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_landing_movies_carousel' ) ) {
            ob_start();
            vodi_landing_movies_carousel( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_landing_tabs_features_element' ) ) {
    function vodi_landing_tabs_features_element( $atts ) {
        if( !empty( $atts['tab_args'] ) ) {
            $atts['tab_args'] = json_decode ( $atts['tab_args'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_landing_tabs_features' ) ) {
            ob_start();
            vodi_landing_tabs_features( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_landing_featured_video_element' ) ) {
    function vodi_landing_featured_video_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_landing_featured_video' ) ) {
            ob_start();
            vodi_landing_featured_video( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_landing_features_list_element' ) ) {
    function vodi_landing_features_list_element( $atts ) {
        if( !empty( $atts['features_args'] ) ) {
            $atts['features_args'] = json_decode ( $atts['features_args'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_landing_features_list' ) ) {
            ob_start();
            vodi_landing_features_list( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_faq_section_element' ) ) {
    function vodi_faq_section_element( $atts ) {
        if( !empty( $atts['faq_args'] ) ) {
            $atts['faq_args'] = json_decode ( $atts['faq_args'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_faq_section' ) ) {
            ob_start();
            vodi_faq_section( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_landing_viewcounts_section_element' ) ) {
    function vodi_landing_viewcounts_section_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_landing_viewcounts_section' ) ) {
            ob_start();
            vodi_landing_viewcounts_section( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_comingsoon_launch_section_element' ) ) {
    function vodi_comingsoon_launch_section_element( $atts ) {
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_comingsoon_launch_section' ) ) {
            ob_start();
            vodi_comingsoon_launch_section( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_section_playlist_carousel_element' ) ) {
    function vodi_section_playlist_carousel_element( $atts ) {
        if( !empty( $atts['tab_args'] ) ) {
            $atts['tab_args'] = json_decode ( $atts['tab_args'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_playlist_carousel' ) ) {
            ob_start();
            vodi_section_playlist_carousel( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_section_tv_episodes_carousel_aside_header_element' ) ) {
    function vodi_section_tv_episodes_carousel_aside_header_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }
        
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_tv_episodes_carousel_aside_header' ) ) {
            ob_start();
            vodi_section_tv_episodes_carousel_aside_header( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_section_tv_episodes_carousel_flex_header_element' ) ) {
    function vodi_section_tv_episodes_carousel_flex_header_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_tv_episodes_carousel_flex_header' ) ) {
            ob_start();
            vodi_section_tv_episodes_carousel_flex_header( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_tv_show_carousel_element' ) ) {
    function vodi_tv_show_carousel_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_tv_show_carousel' ) ) {
            ob_start();
            vodi_tv_show_carousel( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_tv_show_section_aside_header_element' ) ) {
    function vodi_tv_show_section_aside_header_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }
        
        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_tv_show_section_aside_header' ) ) {
            ob_start();
            vodi_tv_show_section_aside_header( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_section_tv_shows_carousel_nav_header_element' ) ) {
    function vodi_section_tv_shows_carousel_nav_header_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_section_tv_shows_carousel_nav_header' ) ) {
            ob_start();
            vodi_section_tv_shows_carousel_nav_header( $atts );
            return ob_get_clean();
        }

        return '';
    }
}

if ( ! function_exists( 'vodi_episodes_with_featured_episode_element' ) ) {
    function vodi_episodes_with_featured_episode_element( $atts ) {
        if( !empty( $atts['section_nav_links'] ) ) {
            $atts['section_nav_links'] = json_decode ( $atts['section_nav_links'], true );
        }

        if( isset( $atts['className'] ) ) {
            $atts['el_class'] = $atts['className'];
            unset( $atts['className'] );
        }

        if( function_exists( 'vodi_episodes_with_featured_episode' ) ) {
            ob_start();
            vodi_episodes_with_featured_episode( $atts );
            return ob_get_clean();
        }

        return '';
    }
}