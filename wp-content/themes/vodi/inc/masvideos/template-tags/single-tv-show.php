<?php
/**
 * Template functions for single
 */

if ( ! function_exists( 'vodi_single_tv_show_seasons_tabs_wrap_open' ) ) {
    function vodi_single_tv_show_seasons_tabs_wrap_open() {
        global $tv_show;
        $seasons = $tv_show->get_seasons();
        if( ! empty( $seasons ) ) {
            ?><div class="tv_show__season-tabs-wrap stretch-full-width"><?php
        }
    }
}

if ( ! function_exists( 'vodi_single_tv_show_seasons_tabs_wrap_close' ) ) {
    function vodi_single_tv_show_seasons_tabs_wrap_close() {
        global $tv_show;
        $seasons = $tv_show->get_seasons();
        if( ! empty( $seasons ) ) {
            ?></div><?php
        }
    }
}


if ( ! function_exists( 'vodi_template_single_related_tv_shows_carousel' ) ) {

    /**
     * Output the related tv shows carousel.
     *
     * @param array $args Provided arguments.
     */
    function vodi_template_single_related_tv_shows_carousel( $tv_show_id = false, $args = array() ) {
        global $tv_show;

        $tv_show_id = $tv_show_id ? $tv_show_id : $tv_show->get_id();

        if ( ! $tv_show_id ) {
            return;
        }

        $defaults = array(
            'limit'          => 10,
            'columns'        => 5,
            'orderby'        => 'rand',
            'order'          => 'desc',
        );

        $args = wp_parse_args( $args, $defaults );

        $title = apply_filters( 'vodi_template_single_related_tv_shows_carousel_title', esc_html__( 'You may also like after: ', 'vodi' ) . get_the_title( $tv_show_id ), $tv_show_id );

        $carousel_args = apply_filters( 'vodi_template_single_related_tv_shows_carousel_carousel_args', array(
            'slidesToShow'          => $args['columns'],
            'slidesToScroll'        => $args['columns'],
            'dots'                  => false,
            'arrows'                => true,
            'autoplay'              => false,
            'responsive'        => array(
                array(
                    'breakpoint'    => 767,
                    'settings'      => array(
                        'slidesToShow'      => 2,
                        'slidesToScroll'    => 2
                    )
                ),
                array(
                    'breakpoint'    => 992,
                    'settings'      => array(
                        'slidesToShow'      => 3,
                        'slidesToScroll'    => 3
                    )
                ),
                array(
                    'breakpoint'    => 1200,
                    'settings'      => array(
                        'slidesToShow'      => 4,
                        'slidesToScroll'    => 4
                    )
                ),
            ),
        ) );

        if( is_rtl() ) {
            $carousel_args['rtl'] = true;
        }

        $related_tv_show_ids = masvideos_get_related_tv_shows( $tv_show_id, $args['limit'] );
        $args['ids'] = implode( ',', $related_tv_show_ids );

        $args = apply_filters( 'vodi_template_single_related_tv_shows_carousel_args', $args );

        if( ! empty( $related_tv_show_ids ) ) { ?>
            <section class="tv-show-related">
                <?php echo wp_kses_post( sprintf( '<h2 class="tv-show-related__title">%s</h2>', $title ) ); ?>
                <div class="tv-show-related__carousel">
                    <div class="tv-show-related__carousel--inner" data-ride="vodi-slick-carousel" data-wrap=".tv-shows__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                        <?php echo vodi_do_shortcode( 'mas_tv_shows', $args ); ?>
                    </div>
                </div>
            </section>
        <?php }
    }
}

if ( ! function_exists( 'vodi_single_tv_show_sharing' ) ) {
    function vodi_single_tv_show_sharing() {
        if ( is_tv_show() ) {
            ?><div class="tv-show__sharing vodi-sharing"><?php 
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

if ( ! function_exists( 'vodi_single_tv_show_views_likes' ) ) {
    function vodi_single_tv_show_views_likes() {
        if ( is_tv_show() ) {
            vodi_views_likes();
        }
    }
}