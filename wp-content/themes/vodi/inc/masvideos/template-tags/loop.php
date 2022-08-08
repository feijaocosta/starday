<?php
/**
 * Template functions for loop
 */

if ( ! function_exists( 'movies_slider_template_loop_open' ) ) {
    function movies_slider_template_loop_open() {
        global $movie;

        $image_data = wp_get_attachment_image_src( $movie->get_image_id(), 'full' );
        ?>
        <div class="slider-movie" style="background-image: url( '<?php echo esc_url( $image_data['0'] ); ?>' );">
            <div class="slider-movie__hover">
        <?php
    }
}

if ( ! function_exists( 'movies_slider_template_loop_close' ) ) {
    function movies_slider_template_loop_close() {
        ?>
            </div>
        </div>
        <?php
    }
}

if ( ! function_exists( 'masvideos_template_loop_movie_short_desc_wrap_open' ) ) {
    function masvideos_template_loop_movie_short_desc_wrap_open() {
        ?><div class="slider-movie-description-wrap"><?php
    }
}

if ( ! function_exists( 'masvideos_template_loop_movie_short_desc_wrap_close' ) ) {
    function masvideos_template_loop_movie_short_desc_wrap_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'movies_slider_action_button' ) ) {
    function movies_slider_action_button() {
        global $movie;

        $link = apply_filters( 'movies_slider_action_button_args', get_the_permalink(), $movie );

        $action_text = apply_filters( 'movies_slider_action_text', esc_html__( 'Watch Now', 'vodi' ) );

        ?>

        <div class="slider-movie__hover_watch-now">
            <a class="watch-now-btn" href="<?php echo esc_url( $link ) ?>">
                <div class="watch-now-btn-bg">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="49px" height="54px">
                        <path fill-rule="evenodd"  fill="rgb(255, 255, 255)" d="M2.000,51.000 C-0.150,46.056 0.424,8.178 2.000,5.000 C3.282,2.414 5.732,0.351 9.000,1.000 C19.348,3.054 45.393,19.419 48.000,25.000 C49.019,27.182 48.794,28.758 48.000,31.000 C46.967,33.919 13.512,54.257 9.000,54.000 C6.740,53.873 3.005,53.311 2.000,51.000 Z"/>
                    </svg>
                </div>
                <?php if( ! empty( $action_text) ) : ?>
                    <div class="watch-now-txt"><?php echo wp_kses_post( $action_text ); ?></div>
                <?php endif; ?>
            </a>
        </div>
        <?php
    }
}

if ( ! function_exists( 'movies_slider_loop_movie_meta' ) ) {
    function movies_slider_loop_movie_meta() {
        global $post, $movie;

        $categories = get_the_term_list( $post->ID, 'movie_genre', '', ', ' );
        if( taxonomy_exists( 'movie_release-year' ) ) {
            $relaese_year = get_the_term_list( $post->ID, 'movie_release-year', '', ', ' );
        } else {
            $relaese_year = '';
        }

        $duration = $movie->get_movie_run_time();

        if ( ! empty( $categories ) || ! empty( $relaese_year ) ) {
            echo '<div class="slider-movie__meta"><ul class="movie-details">';
                if( ! empty ( $relaese_year ) ) {
                   echo '<li class="movie-release-info">' . $relaese_year . '</li>';
                }
                if( ! empty ( $duration ) ) {
                   echo '<li class="movie-duration">' . $duration . '</li>';
                }
                if( ! empty ( $categories ) ) {
                    echo '<li class="movie-genre">' . $categories . '</li>';
                }
            echo '</ul></div>';
        }
    }
}

if ( ! function_exists( 'movie_list_template_loop_open' ) ) {
    function movie_list_template_loop_open() {
        ?><div class="movie-list"><?php
    }
}

if ( ! function_exists( 'movie_list_template_loop_close' ) ) {
    function movie_list_template_loop_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'movie_list_template_loop_movie_link_open' ) ) {
    /**
     * Insert the opening anchor tag for movies in the loop.
     */
    function movie_list_template_loop_movie_link_open() {
        global $movie;

        $link = apply_filters( 'masvideos_loop_movie_link', get_the_permalink(), $movie );

        echo '<a href="' . esc_url( $link ) . '" class="masvideos-LoopMovie-link masvideos-loop-movie__link movie__link">';
    }
}

if ( ! function_exists( 'movie_list_template_loop_movie_link_close' ) ) {
    /**
     * Insert the opening anchor tag for movies in the loop.
     */
    function movie_list_template_loop_movie_link_close() {
        echo '</a>';
    }
}

if ( ! function_exists( 'movie_list_template_loop_movie_link_close' ) ) {
    /**
     * Insert the opening anchor tag for movies in the loop.
     */
    function movie_list_template_loop_movie_link_close() {
        echo '</a>';
    }
}

if ( ! function_exists( 'movie_list_template_loop_movie_poster' ) ) {
    /**
     * movies poster in the loop.
     */
    function movie_list_template_loop_movie_poster() {
        echo masvideos_get_movie_thumbnail( 'masvideos_movie_thumbnail' );
    }
}

if ( ! function_exists( 'movie_list_template_loop_movie_poster_open' ) ) {
    function movie_list_template_loop_movie_poster_open() {
        ?>
        <div class="movie-list__poster">
        <?php
    }
}

if ( ! function_exists( 'movie_list_template_loop_movie_poster_close' ) ) {
    function movie_list_template_loop_movie_poster_close() {
        ?>
        </div>
        <?php
    }
}


if ( ! function_exists( 'movie_list_template_loop_movie_body_open' ) ) {
    function movie_list_template_loop_movie_body_open() {
        ?>
        <div class="movie-list__body">
        <?php
    }
}

if ( ! function_exists( 'movie_list_template_loop_movie_body_close' ) ) {
    function movie_list_template_loop_movie_body_close() {
        ?>
        </div>
        <?php
    }
}

if ( ! function_exists( 'movie_list_template_loop_movie_release' ) ) {
    function movie_list_template_loop_movie_release() {
        global $movie;
        
        $relaese_year = '';
        $release_date = $movie->get_movie_release_date();
        if( ! empty( $release_date ) ) {
            $relaese_year = date( 'Y', strtotime( $release_date ) );
        }

        if( ! empty( $relaese_year) ) : ?>
            <span class="movie-list__year"><?php echo wp_kses_post( $relaese_year ); ?></span>
        <?php endif; 
    }
}

if ( ! function_exists( 'movie_list_template_loop_movie_title' ) ) {
    function movie_list_template_loop_movie_title() {
        the_title( '<h3 class="movie-list__name">', '</h3>' );
    }
}

if ( ! function_exists( 'movie_list_template_loop_movie_category' ) ) {
    function movie_list_template_loop_movie_category() {
        $categories = get_the_term_list( get_the_ID(), 'movie_genre', '', ', ' );
        if( ! empty( $categories) ) : ?>
           <span class="movie-list__genre"><?php echo wp_kses_post( $categories ); ?></span>
        <?php endif; 
    }
}

if ( ! function_exists( 'vodi_catalog_ordering' ) ) :
    /**
     * Displays movies sorting options
     */
    function vodi_catalog_ordering() {
        vodi_get_template( 'templates/svg/sort-icon.svg' );
    }
endif;

if ( ! function_exists( 'vodi_template_loop_video_coming_soon_release_datetime_open' ) ) {
    function vodi_template_loop_video_coming_soon_release_datetime_open() {
        ?><div class="coming-soon-video__release--datetime"><?php
    }
}

if ( ! function_exists( 'vodi_template_loop_video_coming_soon_release_datetime' ) ) {
    function vodi_template_loop_video_coming_soon_release_datetime() {
        global $video;
        ?>
        <div class="coming-soon-video__release--datetime-time">
            <?php echo get_the_time( 'H.i', get_the_ID() ); ?>
        </div>
        <div class="coming-soon-video__release--datetime-date">
            <?php echo get_the_date( 'j M', get_the_ID() ); ?>
        </div>
        <?php
    }
}

if ( ! function_exists( 'vodi_template_loop_video_coming_soon_release_datetime_close' ) ) {
    function vodi_template_loop_video_coming_soon_release_datetime_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_loop_video_coming_soon_info_open' ) ) {
    function vodi_template_loop_video_coming_soon_info_open() {
        ?><div class="coming-soon-video__info"><?php
    }
}

if ( ! function_exists( 'vodi_template_loop_video_coming_soon_meta' ) ) {
    function vodi_template_loop_video_coming_soon_meta() {
        ?><div class="coming-soon-video__meta"><?php
            masvideos_template_loop_video_feature_badge();
            masvideos_template_single_video_categories();
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_loop_video_coming_soon_title' ) ) {
    function vodi_template_loop_video_coming_soon_title() {
        the_title( '<h3 class="masvideos-loop-video__title  video__title coming-soon-video__title">', '</h3>' );
    }
}

if ( ! function_exists( 'vodi_template_loop_video_coming_soon_release_countdown' ) ) {
    function vodi_template_loop_video_coming_soon_release_countdown() {
        $coming_soon_release_countdown_texts = apply_filters( 'vodi_template_loop_video_coming_soon_release_countdown_texts', array(
            'label'     => esc_html__( 'time left', 'vodi' ),
            'days'      => esc_html__( 'days', 'vodi' ),
            'hours'     => esc_html__( 'hours', 'vodi' ),
            'mins'      => esc_html__( 'min', 'vodi' ),
            'secs'      => esc_html__( 'sec', 'vodi' ),
        ) );
        ?>
        <div class="coming-soon-video__count-down count-down-timer">
            <span class="hidden count-down-timer-end" style="display:none;"><?php echo get_the_time( 'U', get_the_ID() ); ?></span>
            <span class="label"><?php echo esc_html( $coming_soon_release_countdown_texts['label'] ); ?></span>
            <span class="days"><span class="value"></span> <?php echo esc_html( $coming_soon_release_countdown_texts['days'] ); ?></span>
            <span class="hours"><span class="value"></span> <?php echo esc_html( $coming_soon_release_countdown_texts['hours'] ); ?></span>
            <span class="minutes"><span class="value"></span> <?php echo esc_html( $coming_soon_release_countdown_texts['mins'] ); ?></span>
            <span class="seconds"><span class="value"></span> <?php echo esc_html( $coming_soon_release_countdown_texts['secs'] ); ?></span>
        </div>
        <?php
    }
}

if ( ! function_exists( 'vodi_template_loop_video_coming_soon_info_close' ) ) {
    function vodi_template_loop_video_coming_soon_info_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_loop_video_live_info_content_open' ) ) {
    function vodi_template_loop_video_live_info_content_open() {
        ?><div class="live-video__content"><?php
    }
}

if ( ! function_exists( 'vodi_template_loop_video_live_meta' ) ) {
    function vodi_template_loop_video_live_meta() {
        ?><div class="live-video__meta"><?php
            masvideos_template_loop_video_feature_badge();
            masvideos_template_single_video_categories();
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_template_loop_video_live_info_content_close' ) ) {
    function vodi_template_loop_video_live_info_content_close() {
        ?></div><?php
    }
}

if ( ! function_exists( 'vodi_set_masvideos_catalog_orderby_options' ) ) {
    function vodi_set_masvideos_catalog_orderby_options( $options ) {
        $options['title-asc'] = esc_html__( 'From A to Z', 'vodi' );
        $options['title-desc'] = esc_html__( 'From Z to A', 'vodi' );
        if ( function_exists( 'stats_get_csv' ) ) {
            $options['views'] = esc_html__( 'Views', 'vodi' );
        }
        if( function_exists( 'RUN_WPULIKE' ) && shortcode_exists( 'wp_ulike' ) ) {
            $options['likes'] = esc_html__( 'Likes', 'vodi' );
        }
        return $options;
    }
}

if ( ! function_exists( 'vodi_search_result_page_header' ) ) {

    function vodi_search_result_page_header() {
        if ( is_search() ) {
            $current_post_type = get_query_var( 'post_type' );
            $post_types = apply_filters( 'vodi_display_search_result_page_tab_post_types', array( 'video', 'movie', 'tv_show' ) );
            if ( in_array( $current_post_type, $post_types ) ) {
                ?>
                <header class="page__header stretch-full-width">
                    <div class="container">
                        <h1 class="page__title"><?php call_user_func( "masvideos_{$current_post_type}_page_title" ); ?></h1>
                        <?php if( apply_filters( 'vodi_video_search_result_page_header_tab', true ) ) {
                            vodi_display_search_result_page_tab();
                        } ?>
                    </div>
                </header>
                <?php
            }
        }
    }
}

if ( ! function_exists( 'vodi_display_search_result_page_tab' ) ) {
    function vodi_display_search_result_page_tab() {
        $search_query = get_search_query();
        if( apply_filters( 'vodi_display_search_result_page_tab', true ) && ! empty( $search_query ) ) {
            $post_types = apply_filters( 'vodi_display_search_result_page_tab_post_types', array( 'video', 'movie', 'tv_show' ) );
            $search_link = get_search_link();
            $links = array();
            if( $post_types > 1 ) {
                echo '<ul class="search-result-tabs">';
                foreach ( $post_types as $key => $post_type ) {
                    $current_post_type = get_query_var( 'post_type' );
                    $post_type_obj = get_post_type_object( $post_type );
                    $url = add_query_arg( 'post_type', $post_type, $search_link );
                    $class = 'search-result-tab-link';
                    if( $current_post_type == $post_type ) {
                        $class .= ' active';
                    }
                    echo '<li class="search-result-tab"><a href="' . esc_url( $url ) . '" class="' . esc_attr( $class ) . '">' . esc_html( $post_type_obj->labels->name ) . '</a></li>';
                }
                echo '</ul>';
            }
        }
    }
}