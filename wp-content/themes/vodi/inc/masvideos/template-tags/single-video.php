<?php
/**
 * Template functions for single
 */

if ( ! function_exists( 'vodi_toggle_single_video_breadcrumb' ) ) {
    function vodi_toggle_single_video_breadcrumb() {
        if ( is_video() ) {
            remove_action( 'vodi_content_top', 'vodi_breadcrumb', 10 );
            add_action( 'masvideos_before_single_video_summary', 'vodi_breadcrumb', 4 );
        }
    }
}

if ( ! function_exists( 'vodi_toggle_single_video_hooks' ) ) {
    function vodi_toggle_single_video_hooks() {

        $style  = vodi_get_single_video_style();

        if ( 'v6' === $style ) {
            remove_action( 'masvideos_before_single_video_summary', 'vodi_breadcrumb', 4 );
            remove_action( 'masvideos_before_single_video_summary', 'vodi_template_single_video_inner_wrap_open', 5 );
            remove_action( 'masvideos_before_single_video_summary', 'vodi_template_single_video_primary_open', 8 );
            remove_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_primary_close', 10 );
            remove_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_sidebar_open', 30 );
            remove_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_sidebar_banner', 31 );
            remove_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_related_playlist_videos', 35 );
            remove_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_sidebar_close', 40 );
            remove_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_inner_wrap_close', 45);
            remove_action( 'masvideos_single_video_summary', 'vodi_template_single_video_comments_link', 30 );
            remove_action( 'masvideos_after_single_video_summary', 'masvideos_related_videos', 50 );
            remove_action( 'masvideos_after_single_video_summary', 'masvideos_template_single_video_related_playlist_videos', 55 );
            remove_action( 'masvideos_after_single_video_summary', 'comments_template', 60 );
            add_action( 'masvideos_before_single_video_summary', 'vodi_template_single_video_player_container_wrap_open', 5 );
            add_action( 'masvideos_before_single_video_summary', 'vodi_template_single_video_player_container_wrap_close', 15 );
            add_action( 'masvideos_single_video_summary', 'vodi_template_single_video_inner_wrap_open', 1 );
            add_action( 'masvideos_single_video_summary', 'vodi_template_single_video_primary_open', 4 );
            add_action( 'masvideos_single_video_summary', 'comments_template', 30 );
            add_action( 'masvideos_single_video_summary', 'vodi_template_single_video_primary_close', 40 );
            add_action( 'masvideos_single_video_summary', 'vodi_template_single_video_sidebar_open', 50 );
            add_action( 'masvideos_single_video_summary', 'vodi_template_single_video_related_playlist_videos', 60 );
            add_action( 'masvideos_single_video_summary', 'vodi_template_single_video_sidebar_banner', 70 );
            add_action( 'masvideos_single_video_summary', 'masvideos_related_videos', 80 );
            add_action( 'masvideos_single_video_summary', 'vodi_template_single_video_sidebar_close', 90 );

        } elseif ( 'v5' === $style ) {
            remove_action( 'masvideos_before_single_video_summary', 'vodi_breadcrumb', 4 );
            remove_action( 'masvideos_before_single_video_summary', 'vodi_template_single_video_inner_wrap_open', 5 );
            remove_action( 'masvideos_before_single_video_summary', 'vodi_template_single_video_primary_open', 8 );
            remove_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_primary_close', 10 );
            remove_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_sidebar_open', 30 );
            remove_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_sidebar_banner', 31 );
            remove_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_related_playlist_videos', 35 );
            remove_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_sidebar_close', 40 );
            remove_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_inner_wrap_close', 45);
            add_action( 'masvideos_before_single_video_summary', 'vodi_template_single_video_player_container_wrap_open', 1 );
            add_action( 'masvideos_before_single_video_summary', 'vodi_template_single_video_player_container_wrap_close', 20 );
            add_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_comments_wrap_open', 59 );
            add_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_sidebar_banner', 70 );
            add_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_comments_wrap_close', 80 );
        } elseif ( 'v4' === $style ) {
            add_action( 'masvideos_before_single_video_summary', 'vodi_template_single_video_player_container_wrap_open', 1 );
            add_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_player_container_wrap_close', 45 );
        } elseif ( 'v3' === $style ) {
        } elseif ( 'v2' === $style ) {
            add_action( 'masvideos_before_single_video_summary', 'vodi_template_single_video_player_container_wrap_open', 1 );
            add_action( 'masvideos_after_single_video_summary', 'vodi_template_single_video_player_container_wrap_close', 45 );
        } else {
            
        }

        add_action( 'masvideos_single_video_summary', 'vodi_single_video_sharing', 20 );
    }
}


if ( ! function_exists( 'vodi_template_single_related_videos_default_args' ) ) {
    function vodi_template_single_related_videos_default_args( $args ) {
        $args['limit'] = 10;
        return $args;
    }
}

if ( ! function_exists( 'vodi_template_single_video_player_container_wrap_open' ) ) {
    function vodi_template_single_video_player_container_wrap_open() {
        ?><div class="single-video__player-container"><div class="single-video__player-container--inner"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_video_video_wrap_open' ) ) {
    function vodi_template_single_video_video_wrap_open() {
        ?><div class="single-video__head"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_video_video_wrap_close' ) ) {
    function vodi_template_single_video_video_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_video_player_container_wrap_close' ) ) {
    function vodi_template_single_video_player_container_wrap_close() {
        ?></div></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_video_inner_wrap_open' ) ) {
    function vodi_template_single_video_inner_wrap_open() {
        ?><div class="single-video__inner row"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_video_inner_wrap_close' ) ) {
    function vodi_template_single_video_inner_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_video_primary_open' ) ) {
    function vodi_template_single_video_primary_open() {
        ?><div class="single-video__content column"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_video_primary_close' ) ) {
    function vodi_template_single_video_primary_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_video_sidebar_open' ) ) {
    function vodi_template_single_video_sidebar_open() {
        ?><div class="single-video__sidebar column"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_video_sidebar_close' ) ) {
    function vodi_template_single_video_sidebar_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_video_sidebar_banner' ) ) {
    function vodi_template_single_video_sidebar_banner() {
        $banner_image_id = get_post_meta( get_the_ID(), '_vodi_video_banner_image', true );
        $banner_link = get_post_meta( get_the_ID(), '_vodi_video_banner_link', true );
        $banner_content = apply_filters( 'vodi_video_banner_content', '' );

        if( ! empty( $banner_image_id ) || ! empty( $banner_content ) ) {
            ?><div class="single-video__sidebar--banner-image"><?php
                if( ! empty( $banner_image_id ) ) {
                    if( ! empty( $banner_link ) ) {
                        ?><a href="<?php echo esc_url( $banner_link ); ?>"><?php
                        echo wp_get_attachment_image( $banner_image_id, 'full' );
                        ?></a><?php
                    } else {
                        echo wp_get_attachment_image( $banner_image_id, 'full' );
                    }
                } else {
                    echo vodi_sanitize_textarea_iframe( $banner_content );
                }
            ?></div><?php
        }
    }
}

if ( ! function_exists( 'vodi_template_single_video_comments_link' ) ) {
    function vodi_template_single_video_comments_link() {
        if ( comments_open() || '0' != get_comments_number() ) : ?>
            <div class="single-video__comments-link">
                <span class="single-video__comments-link__inner"><?php comments_popup_link( esc_html__( 'Leave a comment', 'vodi' ), esc_html__( 'Comment (1)', 'vodi' ), esc_html__( 'Comments (%)', 'vodi' ) ); ?></span>
            </div>
        <?php endif;
    }
}

if ( ! function_exists( 'vodi_template_single_video_related_playlist_wrap_open' ) ) {
    function vodi_template_single_video_related_playlist_wrap_open() {
        ?><div class="single-video__sidebar--related-playlist" data-simplebar><?php
    }
}

if ( ! function_exists( 'vodi_template_single_video_related_playlist_wrap_close' ) ) {
    function vodi_template_single_video_related_playlist_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_video_comments_wrap_open' ) ) {
    function vodi_template_single_video_comments_wrap_open() {
        ?><div class="single-video__comments-wrap"><?php
    }
}

if ( ! function_exists( 'vodi_template_single_video_comments_wrap_close' ) ) {
    function vodi_template_single_video_comments_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_video_related_playlist_videos' ) ) {
    /**
     * Single video page related playlist videos.
     *
     * @since  1.0.0
     */
    function vodi_template_single_video_related_playlist_videos() {
        global $video;
        $video_id = $video->get_id();

        $video_playlist_id = isset( $_GET['video_playlist_id'] ) ? absint( $_GET['video_playlist_id'] ) : 0;

        if( $video_playlist_id > 0 ) {
            $videos_ids = masvideos_single_video_playlist_videos( $video_playlist_id );

            if( ! empty( $videos_ids ) ) {
                $title = apply_filters( 'vodi_template_single_video_videos_playlist_title', get_the_title( $video_playlist_id ), $video_playlist_id );
                $count_info = apply_filters( 'vodi_template_single_video_videos_playlist_count', count( $videos_ids ) . esc_html__( ' videos', 'vodi' ), $video_playlist_id );
                $filtered_videos_ids = $videos_ids;

                if ( ( $current_video_key = array_search( $video_id, $filtered_videos_ids ) ) !== false ) {
                    unset( $filtered_videos_ids[$current_video_key] );
                }

                $args = apply_filters( 'vodi_template_single_video_videos_playlist_args', array(
                    'limit'          => 5,
                    'columns'        => 5,
                    'orderby'        => 'rand',
                    'order'          => 'desc',
                    'ids'            => implode( ",", $filtered_videos_ids )
                ) );
                ?>
                <div class="single-video__related-playlist-videos">
                    <div class="single-video__related-playlist-videos--flex-header">
                        <?php
                            echo wp_kses_post( sprintf( '<h2 class="single-video__related-playlist-videos--title">%s</h2>', $title ) );
                            echo wp_kses_post( sprintf( '<a href="%s" class="single-video__related-playlist-videos--count">%s</a>', get_permalink( $video_playlist_id ), $count_info ) );
                        ?>
                    </div>
                    <div class="single-video__related-playlist-videos--content" data-simplebar>
                        <?php masvideos_template_single_video_playlist_videos( $video_playlist_id, $args ); ?>
                    </div>
                </div>
                <?php
            }
        } else {
            $prev_video_ids = vodi_get_previous_post_ids();
            $next_video_ids = vodi_get_next_post_ids();
            $video_ids = array_merge( $prev_video_ids, $next_video_ids );

            if( ! empty( $video_ids ) ) {
                $title = apply_filters( 'vodi_template_single_video_prev_next_videos_title', esc_html__( "Up Next", 'vodi' ) );
                $args = apply_filters( 'vodi_template_single_video_prev_next_videos_args', array(
                    'limit'          => -1,
                    'columns'        => 6,
                    'orderby'        => 'rand',
                    'order'          => 'desc',
                    'ids'            => implode( ",", $video_ids )
                ) );

                ?>
                <div class="single-video__prev-next-videos">
                    <div class="single-video__prev-next-videos--flex-header">
                        <?php echo wp_kses_post( sprintf( '<h2 class="single-video__prev-next-videos--title">%s</h2>', $title ) ); ?>
                    </div>
                    <div class="single-video__prev-next-videos--content" data-simplebar>
                        <?php echo MasVideos_Shortcodes::videos( $args ); ?>
                    </div>
                </div>
                <?php
            }
        }
    }
}

if ( ! function_exists( 'vodi_single_video_sharing' ) ) {
    function vodi_single_video_sharing() {
        if ( is_video() ) {
            ?><div class="video__sharing vodi-sharing"><?php 
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

if ( ! function_exists( 'vodi_template_single_video_meta' ) ) {
    /**
     * Output the video meta.
     */
    function vodi_template_single_video_meta() {
        ?><div class="single-video__meta"><?php
            masvideos_template_single_video_author();
            masvideos_template_single_video_posted_on();
            if( function_exists( 'vodi_show_page_views' ) ) {
                vodi_show_page_views();
            }
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_video_actions_bar' ) ) {
    /**
     * Single video actions
     */
    function vodi_template_single_video_actions_bar() {
        ?><div class="single-video__actions-bar"><?php
            masvideos_template_button_video_playlist();
            if( function_exists( 'vodi_show_likes' ) ) {
                vodi_show_likes();
            }
            vodi_template_single_video_download_button();
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_single_video_download_button' ) ) {
    function vodi_template_single_video_download_button() {
        if ( is_video() && apply_filters( 'vodi_is_template_single_video_download_button', false ) ) {
            global $video;

            if ( $video->get_video_choice() == 'video_file' ) {
                $download_url =  wp_get_attachment_url( $video->get_video_attachment_id() );
                $button_text = apply_filters( 'vodi_template_single_video_download_button_text', sprintf( '%s %s', '<i class="far fa-arrow-alt-circle-down"></i>', esc_html__( 'Download', 'vodi' ) ) );
                ?><a href="<?php echo esc_url( $download_url ); ?>" class="video-download-btn" download><?php echo wp_kses_post( $button_text ); ?></a><?php
            }
        }
    }
}