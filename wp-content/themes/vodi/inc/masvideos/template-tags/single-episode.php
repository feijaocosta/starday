<?php
/**
 * Template functions for single
 */

if ( ! function_exists( 'vodi_toggle_single_episode_breadcrumb' ) ) {
    function vodi_toggle_single_episode_breadcrumb() {
        if ( is_episode() ) {
            remove_action( 'vodi_content_top', 'vodi_breadcrumb', 10 );
            add_action( 'masvideos_before_single_episode_summary', 'vodi_breadcrumb', 4 );
        }
    }
}

if ( ! function_exists( 'vodi_toggle_single_episode_hooks' ) ) {
    function vodi_toggle_single_episode_hooks() {

        $style  = vodi_get_single_episode_style();

        if ( 'v4' === $style ) {
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_title', 5 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_info_head_open', 11 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_meta', 20 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_rating_with_sharing_open', 30 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_avg_rating', 40 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_sharing', 50 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_rating_with_sharing_close', 60 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_info_head_close', 70 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_info_body_open', 80 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_description', 90 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_tags', 100 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_info_body_close', 110 );
            remove_action( 'masvideos_after_single_episode_summary', 'masvideos_template_single_episode_seasons_tabs', 10 );
            remove_action( 'masvideos_after_single_episode_summary', 'vodi_template_single_episode_related_tv_shows_carousel', 20 );
            remove_action( 'masvideos_after_single_episode_summary', 'comments_template', 30 );
            remove_action( 'masvideos_before_single_episode_summary', 'masvideos_template_single_episode_prev_navigation', 20 );
            remove_action( 'masvideos_before_single_episode_summary', 'masvideos_template_single_episode_next_navigation', 60 );
            remove_action( 'masvideos_after_single_episode_summary', 'vodi_single_episode_seasons_tabs_wrap_open',    9 );
            remove_action( 'masvideos_after_single_episode_summary',  'vodi_single_episode_seasons_tabs_wrap_close',   11 );

            add_action( 'masvideos_before_single_episode_summary', 'vodi_template_single_episode_primary_open', 5 );
            add_action( 'masvideos_before_single_episode_summary', 'masvideos_template_single_episode_before_head', 9 );

            add_action( 'masvideos_before_single_episode_summary', 'masvideos_template_single_episode_nav_wrap_open', 62 );
            add_action( 'masvideos_before_single_episode_summary', 'masvideos_template_single_episode_prev_navigation', 64 );
            add_action( 'masvideos_before_single_episode_summary', 'masvideos_template_single_episode_next_navigation', 66 );
            add_action( 'masvideos_before_single_episode_summary', 'masvideos_template_single_episode_nav_wrap_close', 68 );

            add_action( 'masvideos_after_single_episode_summary', 'masvideos_template_single_episode_tabs', 95 );
            add_action( 'masvideos_after_single_episode_summary', 'vodi_template_single_episode_primary_close', 500 );
            add_action( 'masvideos_after_single_episode_summary', 'vodi_template_single_episode_sidebar_open', 510 );
            add_action( 'masvideos_after_single_episode_summary', 'masvideos_template_single_episode_avg_rating', 520 );
            add_action( 'masvideos_after_single_episode_summary', 'vodi_template_single_episode_sidebar_seasons_tabs', 530 );
            add_action( 'masvideos_after_single_episode_summary', 'vodi_template_single_episode_sidebar_close', 600 );
        } elseif ( 'v3' === $style ) {
            remove_action( 'masvideos_after_single_episode_summary', 'masvideos_template_single_episode_seasons_tabs', 10 );
            remove_action( 'masvideos_after_single_episode_summary', 'vodi_template_single_episode_related_tv_shows_carousel', 20 );
            remove_action( 'masvideos_before_single_episode_summary', 'masvideos_template_single_episode_prev_navigation', 20 );
            remove_action( 'masvideos_before_single_episode_summary', 'masvideos_template_single_episode_next_navigation', 60 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_info_body_open', 80 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_description', 90 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_tags', 100 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_info_body_close', 110 );
            remove_action( 'masvideos_after_single_episode_summary', 'vodi_template_single_episode_related_tv_shows_carousel', 20 );
            remove_action( 'masvideos_after_single_episode_summary', 'comments_template', 30 );
            add_action( 'masvideos_before_single_episode_summary', 'vodi_template_single_episode_primary_open', 5 );
            add_action( 'masvideos_before_single_episode_summary', 'vodi_template_single_episode_bg_image_wrap', 25 );
            add_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_title_with_player_nav_wrap_open', 3 );
            add_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_nav_wrap_open', 6 );
            add_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_prev_navigation', 7 );
            add_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_next_navigation', 8 );
            add_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_nav_wrap_close', 9 );
            add_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_title_with_player_nav_wrap_close', 10 );
            add_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_short_desc', 80 );
            add_action( 'masvideos_single_episode_summary', 'masvideos_template_single_sharing', 90 );
            add_action( 'masvideos_after_single_episode_summary', 'masvideos_template_single_episode_tabs', 95 );
            add_action( 'masvideos_after_single_episode_summary', 'vodi_template_single_episode_primary_close', 500 );
            add_action( 'masvideos_after_single_episode_summary', 'vodi_template_single_episode_sidebar_open', 510 );
            add_action( 'masvideos_after_single_episode_summary', 'vodi_template_single_episode_sidebar_tv_show', 520 );
            add_action( 'masvideos_after_single_episode_summary', 'vodi_template_single_episode_sidebar_seasons_tabs', 530 );
            add_action( 'masvideos_after_single_episode_summary', 'vodi_template_single_episode_sidebar_close', 600 );
        } elseif ( 'v2' === $style ) {
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_info_body_open', 80 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_description', 90 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_tags', 100 );
            remove_action( 'masvideos_single_episode_summary', 'masvideos_template_single_episode_info_body_close', 110 );
            remove_action( 'masvideos_after_single_episode_summary', 'vodi_single_episode_seasons_tabs_wrap_open',    9 );
            remove_action( 'masvideos_after_single_episode_summary',  'vodi_single_episode_seasons_tabs_wrap_close',   11 );
            remove_action( 'masvideos_after_single_episode_summary', 'comments_template', 30 );
            add_action( 'masvideos_after_single_episode_summary', 'masvideos_template_single_episode_tabs', 5 );
            
        } else {
        }

        if ( $style !== 'v4' && $style !== 'v3' ) {
            add_action( 'masvideos_before_single_episode_summary', 'vodi_template_single_episode_player_container_wrap_open', 1 );
add_action( 'masvideos_before_single_episode_summary', 'vodi_template_single_episode_player_container_wrap_close', 75 );
        }
    }
}

if ( ! function_exists( 'vodi_template_single_episode_primary_open' ) ) {
    function vodi_template_single_episode_primary_open() {
        ?><div class="single-episode__content column"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_episode_primary_close' ) ) {
    function vodi_template_single_episode_primary_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_episode_sidebar_open' ) ) {
    function vodi_template_single_episode_sidebar_open() {
        ?><div class="single-episode__sidebar column"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_episode_sidebar_close' ) ) {
    function vodi_template_single_episode_sidebar_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_episode_bg_image_wrap' ) ) {
    function vodi_template_single_episode_bg_image_wrap() {
        $bg_image = vodi_single_episode_player_background();
        if( ! empty( $bg_image ) ) {
            ?><div class="single-episode-bg-image" <?php echo ! empty( $bg_image ) ? 'style="background-image: url(' . $bg_image . ');"' : ''; ?>></div><?php
        }
    }
}

if ( ! function_exists( 'vodi_template_single_episode_related_tv_shows_carousel' ) ) {

    /**
     * Episode related tv shows carousel in the episode single.
     */
    function vodi_template_single_episode_related_tv_shows_carousel() {
        global $episode;
        
        $tv_show_id = $episode->get_tv_show_id();

        $args = apply_filters( 'vodi_template_single_related_tv_shows_carousel_args', array(
            'limit'          => 10,
            'columns'        => 5,
            'orderby'        => 'rand',
            'order'          => 'desc',
        ) );

        if( $tv_show_id ) {
            vodi_template_single_related_tv_shows_carousel( $tv_show_id, $args );
        }
    }
}

if ( ! function_exists( 'vodi_single_episode_sharing' ) ) {
    function vodi_single_episode_sharing() {
        if ( is_episode() ) {
            ?><div class="episode__sharing vodi-sharing"><?php 
            if ( function_exists( 'A2A_SHARE_SAVE_add_to_content' ) ) {
                echo A2A_SHARE_SAVE_add_to_content( '' );
            } elseif ( function_exists( 'mashshare_filter_content' ) ) {
                echo mashshare_filter_content( '' );
            } elseif( function_exists( 'vodi_show_jetpack_share' ) ) {
                vodi_show_jetpack_share();
            }
            ?></div><?php
        }
    }
}

if ( ! function_exists( 'vodi_single_episode_seasons_tabs_wrap_open' ) ) {
    function vodi_single_episode_seasons_tabs_wrap_open() {
        
            ?><div class="episode__season-tabs-wrap stretch-full-width"><?php
        
    }
}

if ( ! function_exists( 'vodi_single_episode_seasons_tabs_wrap_close' ) ) {
    function vodi_single_episode_seasons_tabs_wrap_close() {
        
            ?></div><?php
        
    }
}

if ( ! function_exists( 'masvideos_template_single_episode_title_with_player_nav_wrap_open' ) ) {
    function masvideos_template_single_episode_title_with_player_nav_wrap_open() {
        ?><div class="episode__title-with-nav"><?php
    }
}

if ( ! function_exists( 'masvideos_template_single_episode_title_with_player_nav_wrap_close' ) ) {
    function masvideos_template_single_episode_title_with_player_nav_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'masvideos_template_single_episode_nav_wrap_open' ) ) {
    function masvideos_template_single_episode_nav_wrap_open() {
        ?><div class="episode__player--arrows"><?php
    }
}

if ( ! function_exists( 'masvideos_template_single_episode_nav_wrap_close' ) ) {
    function masvideos_template_single_episode_nav_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_episode_sidebar_tv_show' ) ) {
    function vodi_template_single_episode_sidebar_tv_show() {
        global $episode;

        $episode_id = $episode->get_id();
        $tv_show_id = $episode->get_tv_show_id();

        $original_post = $GLOBALS['post'];
        $GLOBALS['post'] = get_post( $tv_show_id );
        $GLOBALS['tv_show'] = masvideos_get_tv_show( $GLOBALS['post'] );

        if( ! $GLOBALS['tv_show'] ) {
            return;
        }

        ?><div class="vodi-single-episode__sidebar--tv-show"><?php
            masvideos_template_loop_tv_show_poster_open();
            masvideos_template_loop_tv_show_link_open();
            masvideos_template_loop_tv_show_poster();
            masvideos_template_loop_tv_show_link_close();
            masvideos_template_loop_tv_show_poster_close();
            masvideos_template_loop_tv_show_body_open();
            masvideos_template_loop_tv_show_info_open();
            masvideos_template_loop_tv_show_info_head_open();
            masvideos_template_single_tv_show_meta();
            masvideos_template_loop_tv_show_link_open();
            masvideos_template_loop_tv_show_title();
            masvideos_template_loop_tv_show_link_close();
            masvideos_template_loop_tv_show_info_head_close();
            masvideos_template_loop_tv_show_short_desc();
            masvideos_template_loop_tv_show_info_close();
            masvideos_template_loop_tv_show_body_close();
        ?></div><?php

        unset( $GLOBALS['tv_show'] );
        $GLOBALS['post'] = $original_post;
    }
}

if ( ! function_exists( 'vodi_template_single_episode_sidebar_seasons_tabs' ) ) {
    function vodi_template_single_episode_sidebar_seasons_tabs() {
        global $episode;

        $episode_id = $episode->get_id();
        $tv_show_id = $episode->get_tv_show_id();
        $tv_show = masvideos_get_tv_show( $tv_show_id );

        if( ! $tv_show ) {
            return;
        }

        $seasons = $tv_show->get_seasons();
        if( ! empty( $seasons ) ) {
            $tabs = array();
            foreach ( $seasons as $key => $season ) {
                if( ! empty( $season['name'] ) && ! empty( $season['episodes'] ) ) {
                    $episode_ids = $season['episodes'];
                    if ( array_search( $episode_id, $episode_ids ) !== false ) {
                        $default_active_tab = $key;
                    }
                    $episode_ids = implode( ",", $episode_ids );
                    $shortcode_atts = apply_filters( 'vodi_template_single_episode_sidebar_seasons_tab_shortcode_atts', array(
                        'orderby'   => 'post__in',
                        'order'     => 'DESC',
                        'limit'     => '-1',
                        'columns'   => '6',
                        'ids'       => $episode_ids,
                        'template'  => 'content-episode-title-list',
                    ), $season, $key );

                    $tab_title = sprintf( '<h3 class="season-title">%s</h3><span class="episodes-count">%s</span>', $season['name'], count( $season['episodes'] ) );

                    $content_title = apply_filters( 'vodi_template_single_episode_sidebar_episodes_title', esc_html__( 'Episodes of', 'vodi' ) . ' ' . $season['name'] );

                    $content = sprintf( '<h3 class="vodi-single-episode__sidebar--seasons-episode__season-title">%s</h3>%s', $content_title, MasVideos_Shortcodes::episodes( $shortcode_atts ) );

                    $tab = array(
                        'title'     => $tab_title,
                        'content'   => $content,
                        'priority'  => $key
                    );

                    $tabs[] = $tab;
                }
            }


            ?><div class="vodi-single-episode__sidebar--seasons-episode">
                <h3 class="vodi-single-episode__sidebar--seasons-episode__season-title">
                    <?php echo apply_filters( 'vodi_template_single_episode_sidebar_seasons_title', esc_html__( 'Seasons', 'vodi' ) );?>
                </h3>
                <?php masvideos_get_template( 'global/tabs.php', array( 'tabs' => $tabs , 'default_active_tab' => $default_active_tab ) ); ?>
            </div><?php
        }
    }
}

if ( ! function_exists( 'vodi_template_single_episode_player_container_wrap_open' ) ) {
    function vodi_template_single_episode_player_container_wrap_open() {
        $bg_image = vodi_single_episode_player_background();
        ?><div class="single-episode__player-container stretch-full-width" <?php echo ! empty( $bg_image ) ? 'style="background-image: url(' . $bg_image . ');"' : ''; ?>><div class="single-episode__player-container--inner container"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_episode_player_container_wrap_close' ) ) {
    function vodi_template_single_episode_player_container_wrap_close() {
        ?></div></div><?php
    }
}

if ( ! function_exists( 'vodi_single_episode_player_background' ) ) {
    function vodi_single_episode_player_background() {
        $bg_image_id = get_post_meta( get_the_ID(), '_vodi_episode_bg_image', true );

        if ( vodi_get_single_episode_style() !== 'v4' && $bg_image_id > 0 ) {
            return wp_get_attachment_image_url( $bg_image_id, 'full' );
        }

        return '';
    }
}

if ( ! function_exists( 'masvideos_template_single_episode_before_head' ) ) {
    function masvideos_template_single_episode_before_head() {
        do_action( 'vodi_single_episode_before_head' ); 
    }
}

if ( ! function_exists( 'vodi_single_episode_head_info_wrap_open' ) ) {
    function vodi_single_episode_head_info_wrap_open() {
        ?>
        <div class="episode__head--info">
        <?php
    }
}

if ( ! function_exists( 'vodi_single_episode_head_info_wrap_close' ) ) {
    function vodi_single_episode_head_info_wrap_close() {
        ?>
        </div>
        <?php
    }
}

if ( ! function_exists( 'vodi_single_episode_views_likes' ) ) {
    function vodi_single_episode_views_likes() {
        if ( is_episode() ) {
            vodi_template_single_episode_download_button();
            vodi_views_likes();
        }
    }
}

if ( ! function_exists( 'vodi_template_single_episode_views_likes_download_open' ) ) {
    function vodi_template_single_episode_views_likes_download_open() {
        ?><div class="episode__head--views-likes-download"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_episode_download_button' ) ) {
    function vodi_template_single_episode_download_button() {
        if ( is_episode() && apply_filters( 'vodi_is_template_single_episode_download_button', false ) ) {
            global $episode;

            if ( $episode->get_episode_choice() == 'episode_file' ) {
                $download_url =  wp_get_attachment_url( $episode->get_episode_attachment_id() );
                $button_text = apply_filters( 'vodi_template_single_episode_download_button_text', sprintf( '%s %s', '<i class="far fa-arrow-alt-circle-down"></i>', esc_html__( 'Download', 'vodi' ) ) );
                ?><span class="episode-download"><a href="<?php echo esc_url( $download_url ); ?>" class="episode-download-btn" download><?php echo wp_kses_post( $button_text ); ?></a></span><?php
            }
        }
    }
}

if ( ! function_exists( 'vodi_template_single_episode_views_likes_download_close' ) ) {
    function vodi_template_single_episode_views_likes_download_close() {
        ?></div><?php
    }
}
