<?php
if ( ! function_exists( 'vodi_video_section' ) ) {
    function vodi_video_section( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_video_section_default_args', array(
                'section_title'         => '',
                'section_nav_links'     => array(),
                'footer_action_text'    => '',
                'footer_action_link'    => '#',
                'section_background'    => '',
                'section_style'         => '',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '2',
                    'limit'                 => '2',
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            $section_class = 'home-section home-videos-section';

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="home-section__inner home-section__videos">
                        <?php if ( ! empty ( $section_title ) ) {
                            echo '<header class="home-section__flex-header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="section-title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_nav_links ) ) {
                                    echo '<ul class="nav nav-tabs">';
                                        $i = 0;
                                        $nav_count = count( $section_nav_links );
                                        foreach ( $section_nav_links as $section_nav_link ) {
                                            if( $i < 1 && $nav_count > 1 ) {
                                                $active = ' active';
                                                $i++;
                                            } else {
                                                $active = '';
                                            }
                                            if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                                echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                            }
                                        }
                                    echo '</ul>';
                                }
                            echo '</header>';
                        }

                        echo vodi_do_shortcode( 'mas_videos', $shortcode_atts );
                        if ( ! empty ( $footer_action_text ) ) : ?>
                            <div class="home-section__footer-action">
                                <a href="<?php echo esc_url( $footer_action_link ); ?>" class="home-section__footer-action--link"><?php echo esc_html( $footer_action_text ); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_tv_show_section' ) ) {
    function vodi_tv_show_section( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_tv_show_section_default_args', array(
                'section_title'         => '',
                'section_nav_links'     => array(),
                'footer_action_text'    => '',
                'footer_action_link'    => '#',
                'footer_view_more_text' => '',
                'footer_view_more_link' => '#',
                'section_background'    => '',
                'section_style'         => '',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '2',
                    'limit'                 => '2',
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            $section_class = 'home-section home-tv-show-section';

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="home-section__inner home-section__tv_shows">
                        <?php if ( ! empty ( $section_title ) ) {
                            echo '<header class="home-section__flex-header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="section-title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_nav_links ) ) {
                                    echo '<ul class="nav nav-tabs">';
                                        $i = 0;
                                        $nav_count = count( $section_nav_links );
                                        foreach ( $section_nav_links as $section_nav_link ) {
                                            if( $i < 1 && $nav_count > 1 ) {
                                                $active = ' active';
                                                $i++;
                                            } else {
                                                $active = '';
                                            }
                                            if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                                echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                            }
                                        }
                                    echo '</ul>';
                                }
                            echo '</header>';
                        }

                        echo vodi_do_shortcode( 'mas_tv_shows', $shortcode_atts );
                        if ( ! empty ( $footer_action_text ) ) : ?>
                            <div class="home-section__footer-action">
                                <a href="<?php echo esc_url( $footer_action_link ); ?>" class="home-section__footer-action--link"><?php echo esc_html( $footer_action_text ); ?></a>
                            </div>
                        <?php endif; ?>

                        <?php if ( ! empty ( $footer_view_more_text ) ) : ?>
                        <div class="home-section__footer-view-more-action">
                            <span class="home-section__footer-view-more-action__inner">
                                <a href="<?php echo esc_url( $footer_view_more_link ); ?>" class="home-section__footer-view-more-action--link"><?php echo esc_html( $footer_view_more_text ); ?></a>
                            </span>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_movie_section_aside_header' ) ) {
    function vodi_movie_section_aside_header( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_movie_section_aside_header_default_args', array(
                'section_title'         => '',
                'section_subtitle'      => '',
                'action_text'           => '',
                'action_link'           => '#',
                'section_background'    => '',
                'section_style'         => '',
                'footer_view_more_text' => '',
                'footer_view_more_link' => '#',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '7',
                    'limit'                 => '12',
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            $section_class = 'home-section home-movie-section-aside-header';

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            $shortcode_type = 'movies';

            // Allow list movie based on specific cases.
            if ( isset( $shortcode_atts['top_rated'] ) && masvideos_string_to_bool( $shortcode_atts['top_rated'] ) ) {
                $shortcode_type = 'top_rated_movies';
            }

            if ( isset( $shortcode_atts['featured'] ) && masvideos_string_to_bool( $shortcode_atts['featured'] ) ) {
                $shortcode_type = 'featured_movies';
                $shortcode_atts['visibility'] = 'featured';
            }

            $shortcode_movies   = new Vodi_Shortcode_Movies( $shortcode_atts, $shortcode_type );
            $movies             = $shortcode_movies->get_movies();
            $movies_count       = 0;

            if ( $movies && $movies->ids ) {
                ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                    <div class="container">
                        <div class="home-movie-section-aside-header__inner">
                            <?php
                                $shortcode_movies->movie_loop_start();

                                if ( masvideos_get_movies_loop_prop( 'total' ) ) {
                                    foreach ( $movies->ids as $movie_id ) {
                                        $GLOBALS['post'] = get_post( $movie_id ); // WPCS: override ok.
                                        setup_postdata( $GLOBALS['post'] );

                                        // Set custom movie visibility when quering hidden movies.
                                        add_action( 'masvideos_movie_is_visible', array( $shortcode_movies, 'set_movie_as_visible' ) );

                                        if ( $movies_count == 0 && ( ! empty ( $section_title ) || ! empty ( $section_subtitle ) ) ) {
                                            echo '<header class="home-section__header">';
                                                if ( ! empty ( $section_title ) ) {
                                                    echo '<h2 class="home-section__title">' . wp_kses_post( $section_title ) . '</h2>';
                                                }
                                                if ( ! empty ( $section_subtitle ) ) {
                                                    echo '<p class="home-section__subtitle">' . wp_kses_post( $section_subtitle ) . '</p>';
                                                }
                                                if ( ! empty ( $action_text ) ) {
                                                    echo '<div class="home-section__action"><a href="' . esc_url( $action_link ) . '" class="home-section__action-link">' . esc_html( $action_text ) . '</a></div>';
                                                }
                                            echo '</header>';
                                        }

                                        // Render movie template.
                                        masvideos_get_template_part( 'content', 'movie' );

                                        // Restore movie visibility.
                                        remove_action( 'masvideos_movie_is_visible', array( $shortcode_movies, 'set_movie_as_visible' ) );

                                        $movies_count++;
                                    }
                                }

                                $shortcode_movies->movie_loop_end();
                            ?>
                        </div>
                    </div>

                    <?php if ( ! empty ( $footer_view_more_text ) ) : ?>
                        <div class="home-section__footer-view-more-action">
                            <span class="home-section__footer-view-more-action__inner">
                                <a href="<?php echo esc_url( $footer_view_more_link ); ?>" class="home-section__footer-view-more-action--link"><?php echo esc_html( $footer_view_more_text ); ?></a>
                            </span>
                        </div>
                    <?php endif; ?>
                </section><?php
            }
        }
    }
}

if ( ! function_exists( 'vodi_video_section_aside_header' ) ) {
    function vodi_video_section_aside_header( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_video_section_aside_header_default_args', array(
                'section_title'         => '',
                'section_subtitle'      => '',
                'action_link'           => '#',
                'action_text'           => '',
                'section_background'    => '',
                'section_style'         => '',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '6',
                    'limit'                 => '11',
                    'class'                 => '',
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            $section_class = 'home-section home-video-section-aside-header';

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            $shortcode_videos   = new Vodi_Shortcode_Videos( $shortcode_atts );
            $videos             = $shortcode_videos->get_videos();
            $videos_count       = 0;

            if ( $videos && $videos->ids ) {
                ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                    <div class="container">
                        <div class="home-video-section-aside-header__inner">
                            <?php
                                $shortcode_videos->video_loop_start();

                                if ( masvideos_get_videos_loop_prop( 'total' ) ) {
                                    foreach ( $videos->ids as $video_id ) {
                                        $GLOBALS['post'] = get_post( $video_id ); // WPCS: override ok.
                                        setup_postdata( $GLOBALS['post'] );

                                        // Set custom video visibility when quering hidden videos.
                                        add_action( 'masvideos_video_is_visible', array( $shortcode_videos, 'set_video_as_visible' ) );

                                        if ( $videos_count == 0 && ( ! empty ( $section_title ) || ! empty ( $section_subtitle ) ) ) {
                                            echo '<header class="home-section__header">';
                                                if ( ! empty ( $section_title ) ) {
                                                    echo '<h2 class="home-section__title">' . wp_kses_post( $section_title ) . '</h2>';
                                                }
                                                if ( ! empty ( $section_subtitle ) ) {
                                                    echo '<p class="home-section__subtitle">' . wp_kses_post( $section_subtitle ) . '</p>';
                                                }
                                                if ( ! empty ( $action_text ) ) {
                                                    echo '<div class="home-section__action"><a href="' . esc_url( $action_link ) . '" class="home-section__action-link">' . esc_html( $action_text ) . '</a></div>';
                                                }
                                            echo '</header>';
                                        }
                            
                                        // Render video template.
                                        masvideos_get_template_part( 'content', 'video' );

                                        // Restore video visibility.
                                        remove_action( 'masvideos_video_is_visible', array( $shortcode_videos, 'set_video_as_visible' ) );

                                        $videos_count++;
                                    }
                                }

                                $shortcode_videos->video_loop_end();
                            ?>
                        </div>
                    </div>
                </section><?php
            }
        }
    }
}

if ( ! function_exists( 'vodi_section_movies_carousel_aside_header' ) ) {
    function vodi_section_movies_carousel_aside_header( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_section_movies_carousel_aside_header_default_args', array(
                'section_title'         => '',
                'section_subtitle'      => '',
                'section_nav_links'     => array(),
                'action_link'           => '#',
                'action_text'           => '',
                'section_background'    => '',
                'section_style'         => '',
                'header_posisition'     => '',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '6',
                    'limit'                 => '15',
                ),
                'carousel_args'         => array(
                    'slidesToShow'          => 6,
                    'slidesToScroll'        => 6,
                    'dots'                  => false,
                    'arrows'                => true,
                    'autoplay'              => false,
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            if( is_rtl() ) {
                $args ['carousel_args']['rtl'] = true;
            }
            extract( $args );

            $section_class = 'home-section section-movies-carousel-aside-header';

            if ( ! empty ( $section_title ) || ! empty ( $section_subtitle ) ) {
                $section_class .= ' has-section-header';
            } 

            $shortcode_atts['columns'] = $carousel_args['slidesToShow'];

            $carousel_args['responsive'] = apply_filters( 'vodi_section_movies_carousel_aside_header_responsive_carousel_args', array(
                array(
                    'breakpoint'    => 768,
                    'settings'      => array(
                        'slidesToShow'      => 2,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 992,
                    'settings'      => array(
                        'slidesToShow'      => 3,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 1200,
                    'settings'      => array(
                        'slidesToShow'      => 4,
                        'slidesToScroll'    => 1
                    )
                ),
            ) );

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }


            if ( !empty ( $header_posisition ) ) {
                $section_class .= ' ' . $header_posisition;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            $section_id = 'section-movies-carousel-aside-header-' . uniqid();
            $carousel_args['appendArrows'] = '#' . $section_id . ' .section-movies-carousel-aside-header__custom-arrows';

            ?><section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <?php if ( ! empty ( $section_nav_links ) ) {
                            echo '<ul class="nav nav-tabs">';
                                $i = 0;
                                $nav_count = count( $section_nav_links );
                                foreach ( $section_nav_links as $section_nav_link ) {
                                    if( $i < 1 && $nav_count > 1 ) {
                                        $active = ' active';
                                        $i++;
                                    } else {
                                        $active = '';
                                    }
                                    if( ! empty ( $section_nav_link['link'] ) ) {
                                        echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                    }
                                }
                            echo '</ul>';
                    } ?>
                    <div class="section-movies-carousel-aside-header__inner">
                        <?php if ( ! empty ( $section_title ) || ! empty ( $section_subtitle ) ) {
                            echo '<header class="home-section__header section-movies-carousel-aside-header__header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="home-section__title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_subtitle ) ) {
                                    echo '<p class="home-section__subtitle">' . wp_kses_post( $section_subtitle ) . '</p>';
                                }
                                echo '<div class="section-movies-carousel-aside-header__custom-arrows"></div>';
                                if ( ! empty ( $action_text ) ) {
                                    echo '<div class="home-section__action"><a href="' . esc_url( $action_link ) . '" class="home-section__action-link">' . esc_html( $action_text ) . '</a></div>';
                                }
                            echo '</header>';
                        } ?>

                        <div class="section-movies-carousel__carousel">
                            <div class="movies-carousel__inner" data-ride="vodi-slick-carousel" data-wrap=".movies__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                                    <?php echo vodi_do_shortcode( 'mas_movies', $shortcode_atts ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_section_videos_carousel_aside_header' ) ) {
    function vodi_section_videos_carousel_aside_header( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_section_videos_carousel_aside_header_default_args', array(
                'section_title'         => esc_html__( 'Action &amp; Drama Movies', 'vodi' ),
                'section_subtitle'      => '',
                'action_link'           => '#',
                'action_text'           => '',
                'section_background'    => '',
                'section_style'         => '',
                'header_posisition'     => '',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'           => '4',
                    'limit'             => '15',
                ),
                'carousel_args'         => array(
                    'slidesToShow'      => 4,
                    'slidesToScroll'    => 4,
                    'dots'              => false,
                    'arrows'            => true,
                    'autoplay'          => false,
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            if( is_rtl() ) {
                $args ['carousel_args']['rtl'] = true;
            }
            extract( $args );

            $section_class = 'home-section section-videos-carousel-aside-header';

            $carousel_args['responsive'] = apply_filters( 'vodi_section_videos_carousel_aside_header_responsive_carousel_args', array(
                array(
                    'breakpoint'    => 768,
                    'settings'      => array(
                        'slidesToShow'      => 1,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 992,
                    'settings'      => array(
                        'slidesToShow'      => 3,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 1200,
                    'settings'      => array(
                        'slidesToShow'      => 4,
                        'slidesToScroll'    => 1
                    )
                ),
            ) );

            $shortcode_atts['columns'] = $carousel_args['slidesToShow'];

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }

            if ( !empty ( $header_posisition ) ) {
                $section_class .= ' ' . $header_posisition;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            $section_id = 'section-videos-carousel-aside-header-' . uniqid();
            $carousel_args['appendArrows'] = '#' . $section_id . ' .section-videos-carousel-aside-header__custom-arrows';

            ?><section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="section-videos-carousel-aside-header__inner">
                        <?php if ( ! empty ( $section_title ) || ! empty ( $section_subtitle ) ) {
                            echo '<header class="home-section__header section-videos-carousel-aside-header__header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="home-section__title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_subtitle ) ) {
                                    echo '<p class="home-section__subtitle">' . wp_kses_post( $section_subtitle ) . '</p>';
                                }
                                echo '<div class="section-videos-carousel-aside-header__custom-arrows"></div>';
                                if ( ! empty ( $action_text ) ) {
                                    echo '<div class="home-section__action"><a href="' . esc_url( $action_link ) . '" class="home-section__action-link">' . esc_html( $action_text ) . '</a></div>';
                                }
                            echo '</header>';
                        } ?>

                        <div class="section-videos-carousel__carousel">
                            <div class="videos-carousel__inner" data-ride="vodi-slick-carousel" data-wrap=".videos__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                                    <?php echo vodi_do_shortcode( 'mas_videos', $shortcode_atts ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_section_movies_carousel_nav_header' ) ) {
    function vodi_section_movies_carousel_nav_header( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_section_movies_carousel_nav_header_default_args', array(
                'section_title'         => '',
                'section_nav_links'     => array(),
                'section_background'    => '',
                'section_style'         => '',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '7',
                    'limit'                 => '15',
                ),
                'carousel_args'         => array(
                    'slidesToShow'      => 7,
                    'slidesToScroll'    => 7,
                    'dots'              => false,
                    'arrows'            => true,
                    'autoplay'          => false,
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            if( is_rtl() ) {
                $args ['carousel_args']['rtl'] = true;
            }
            extract( $args );

            $section_id = 'section-movies-carousel-nav-header-' . uniqid();
            $section_class = 'home-section section-movies-carousel-nav-header';

            $shortcode_atts['columns'] = $carousel_args['slidesToShow'];

            $carousel_args['responsive'] = apply_filters( 'vodi_section_movies_carousel_nav_header_responsive_carousel_args', array(
                array(
                    'breakpoint'    => 768,
                    'settings'      => array(
                        'slidesToShow'      => 2,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 992,
                    'settings'      => array(
                        'slidesToShow'      => 3,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 1200,
                    'settings'      => array(
                        'slidesToShow'      => 5,
                        'slidesToScroll'    => 1
                    )
                ),
            ) );

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            ?><section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="section-movies-carousel-nav-header__inner">
                        <?php if ( ! empty ( $section_title ) ) {
                            echo '<header class="home-section__header home-section__nav-header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="home-section__title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_nav_links ) ) {
                                    echo '<ul class="nav">';
                                        $i = 0;
                                        $nav_count = count( $section_nav_links );
                                        foreach ( $section_nav_links as $section_nav_link ) {
                                            if( $i < 1 && $nav_count > 1 ) {
                                                $active = ' active';
                                                $i++;
                                            } else {
                                                $active = '';
                                            }
                                            if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                                echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                            }
                                        }
                                    echo '</ul>';
                                }
                            echo '</header>';
                        } ?>

                        <div class="section-movies-carousel-nav-header__carousel">
                            <div class="movies-carousel__inner" data-ride="vodi-slick-carousel" data-wrap=".movies__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                                    <?php echo vodi_do_shortcode( 'mas_movies', $shortcode_atts ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_section_videos_carousel_nav_header' ) ) {
    function vodi_section_videos_carousel_nav_header( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_section_videos_carousel_nav_header_default_args', array(
                'section_title'         => '',
                'section_nav_links'     => array(),
                'section_background'    => '',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '5',
                    'limit'                 => '15',
                ),
                'carousel_args'         => array(
                    'slidesToShow'      => 5,
                    'slidesToScroll'    => 5,
                    'dots'              => false,
                    'arrows'            => true,
                    'autoplay'          => false,
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            if( is_rtl() ) {
                $args ['carousel_args']['rtl'] = true;
            }
            extract( $args );

            $section_class = 'home-section section-videos-carousel-nav-header';

            $shortcode_atts['columns'] = $carousel_args['slidesToShow'];

            $carousel_args['responsive'] = apply_filters( 'vodi_section_videos_carousel_nav_header_responsive_carousel_args', array(
                array(
                    'breakpoint'    => 768,
                    'settings'      => array(
                        'slidesToShow'      => 1,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 992,
                    'settings'      => array(
                        'slidesToShow'      => 3,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 1200,
                    'settings'      => array(
                        'slidesToShow'      => 4,
                        'slidesToScroll'    => 1
                    )
                ),
            ) );

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            $section_id = 'section-videos-carousel-nav-header-' . uniqid();

            ?><section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="section-videos-carousel-nav-header__inner">
                        <?php if ( ! empty ( $section_title ) ) {
                            echo '<header class="home-section__header home-section__nav-header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="home-section__title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_nav_links ) ) {
                                    echo '<ul class="nav">';
                                        $i = 0;
                                        $nav_count = count( $section_nav_links );
                                        foreach ( $section_nav_links as $section_nav_link ) {
                                            if( $i < 1 && $nav_count > 1 ) {
                                                $active = ' active';
                                                $i++;
                                            } else {
                                                $active = '';
                                            }
                                            if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                                echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                            }
                                        }
                                    echo '</ul>';
                                }
                            echo '</header>';
                        } ?>

                        <div class="section-videos-carousel-nav-header__carousel">
                            <div class="videos-carousel__inner" data-ride="vodi-slick-carousel" data-wrap=".videos__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                                    <?php echo vodi_do_shortcode( 'mas_videos', $shortcode_atts ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_section_movies_carousel_flex_header' ) ) {
    function vodi_section_movies_carousel_flex_header( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_section_movies_carousel_flex_header_default_args', array(
                'section_title'         => '',
                'section_nav_links'     => array(),
                'section_background'    => '',
                'section_style'         => '',
                'footer_action_text'    => '',
                'footer_action_link'    => '#',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '6',
                    'limit'                 => '15',
                ),
                'carousel_args'         => array(
                    'slidesToShow'      => 6,
                    'slidesToScroll'    => 6,
                    'dots'              => false,
                    'arrows'            => true,
                    'autoplay'          => false,
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            if( is_rtl() ) {
                $args ['carousel_args']['rtl'] = true;
            }
            extract( $args );

            $section_class = 'home-section section-movies-carousel-flex-header';

            $shortcode_atts['columns'] = $carousel_args['slidesToShow'];

            $carousel_args['responsive'] = apply_filters( 'vodi_section_movies_carousel_flex_header_responsive_carousel_args', array(
                array(
                    'breakpoint'    => 768,
                    'settings'      => array(
                        'slidesToShow'      => 2,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 992,
                    'settings'      => array(
                        'slidesToShow'      => 3,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 1200,
                    'settings'      => array(
                        'slidesToShow'      => 4,
                        'slidesToScroll'    => 1
                    )
                ),
            ) );

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }


            if ( !empty ( $header_posisition ) ) {
                $section_class .= ' ' . $header_posisition;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            $section_id = 'section-movies-carousel-flex-header-' . uniqid();

            ?><section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="home-section__inner">
                        <?php if ( ! empty ( $section_title ) ) {
                            echo '<header class="home-section__flex-header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="section-title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_nav_links ) ) {
                                    echo '<ul class="nav">';
                                        $i = 0;
                                        $nav_count = count( $section_nav_links );
                                        foreach ( $section_nav_links as $section_nav_link ) {
                                            if( $i < 1 && $nav_count > 1 ) {
                                                $active = ' active';
                                                $i++;
                                            } else {
                                                $active = '';
                                            }
                                            if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                                echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                            }
                                        }
                                    echo '</ul>';
                                }
                            echo '</header>';
                        } ?>
                        <div class="section-movies-carousel__carousel">
                            <div class="movies-carousel__inner" data-ride="vodi-slick-carousel" data-wrap=".movies__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                                    <?php echo vodi_do_shortcode( 'mas_movies', $shortcode_atts ); ?>
                            </div>
                        </div>
                        <?php if ( ! empty ( $footer_action_text ) ) : ?>
                            <div class="home-section__footer-action">
                                <a href="<?php echo esc_url( $footer_action_link ); ?>" class="home-section__footer-action--link"><?php echo esc_html( $footer_action_text ); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_section_videos_carousel_flex_header' ) ) {
    function vodi_section_videos_carousel_flex_header( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_section_videos_carousel_flex_header_default_args', array(
                'section_title'         => '',
                'section_nav_links'     => array(),
                'section_background'    => '',
                'section_style'         => '',
                'footer_view_more_text' => '',
                'footer_view_more_link' => '#',
                'footer_action_text'    => '',
                'footer_action_link'    => '#',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '5',
                    'limit'                 => '15',
                ),
                'carousel_args'         => array(
                    'slidesToShow'      => 5,
                    'slidesToScroll'    => 5,
                    'dots'              => false,
                    'arrows'            => true,
                    'autoplay'          => false,
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            if( is_rtl() ) {
                $args ['carousel_args']['rtl'] = true;
            }
            extract( $args );

            $section_class = 'home-section section-videos-carousel-flex-header';

            $shortcode_atts['columns'] = $carousel_args['slidesToShow'];

            $carousel_args['responsive'] = apply_filters( 'vodi_section_videos_carousel_flex_header_responsive_carousel_args', array(
                array(
                    'breakpoint'    => 768,
                    'settings'      => array(
                        'slidesToShow'      => 1,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 992,
                    'settings'      => array(
                        'slidesToShow'      => 3,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 1200,
                    'settings'      => array(
                        'slidesToShow'      => 4,
                        'slidesToScroll'    => 1
                    )
                ),
            ) );

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }

            if ( !empty ( $header_posisition ) ) {
                $section_class .= ' ' . $header_posisition;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            $section_id = 'section-videos-carousel-flex-header-' . uniqid();

            ?><section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="home-section__inner">
                        <?php if ( ! empty ( $section_title ) ) {
                            echo '<header class="home-section__flex-header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="section-title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_nav_links ) ) {
                                    echo '<ul class="nav">';
                                        $i = 0;
                                        $nav_count = count( $section_nav_links );
                                        foreach ( $section_nav_links as $section_nav_link ) {
                                            if( $i < 1 && $nav_count > 1 ) {
                                                $active = ' active';
                                                $i++;
                                            } else {
                                                $active = '';
                                            }
                                            if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                                echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                            }
                                        }
                                    echo '</ul>';
                                }
                            echo '</header>';
                        } ?>
                        <div class="section-videos-carousel__carousel">
                            <div class="videos-carousel__inner" data-ride="vodi-slick-carousel" data-wrap=".videos__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                                    <?php echo vodi_do_shortcode( 'mas_videos', $shortcode_atts ); ?>
                            </div>
                        </div>
                        <?php if ( ! empty ( $footer_action_text ) ) : ?>
                            <div class="home-section__footer-action">
                                <a href="<?php echo esc_url( $footer_action_link ); ?>" class="home-section__footer-action--link"><?php echo esc_html( $footer_action_text ); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if ( ! empty ( $footer_view_more_text ) ) : ?>
                    <div class="home-section__footer-view-more-action">
                        <span class="home-section__footer-view-more-action__inner">
                            <a href="<?php echo esc_url( $footer_view_more_link ); ?>" class="home-section__footer-view-more-action--link"><?php echo esc_html( $footer_view_more_text ); ?></a>
                        </span>
                    </div>
                <?php endif; ?>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_featured_movies_carousel' ) ) {
    function vodi_featured_movies_carousel( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_featured_movies_carousel_default_args', array(
                'feature_movie_pre_title'       => '',
                'feature_movie_title'           => '',
                'feature_movie_subtitle'        => '',
                'section_nav_links'             => array(),
                'section_background'            => '',
                'section_style'                 => '',
                'bg_image'                      => '',
                'el_class'                      => '',
                'design_options'                => array(),
                'movies_shortcode'              => 'mas_movies',
                'shortcode_atts'                => array(
                    'columns'               => '8',
                    'limit'                 => '15',
                ),
                'carousel_args'                 => array(
                    'slidesToShow'          => 8,
                    'slidesToScroll'        => 8,
                    'dots'                  => false,
                    'arrows'                => true,
                    'autoplay'              => false,
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            if( is_rtl() ) {
                $args ['carousel_args']['rtl'] = true;
            }
            extract( $args );

            $section_id = 'section-featured-movies-carousel-' . uniqid();
            $section_class = 'home-section section-featured-movies-carousel';
            
            $shortcode_atts['columns'] = $carousel_args['slidesToShow'];

            $carousel_args['responsive'] = apply_filters( 'vodi_featured_movies_carousel_responsive_carousel_args', array(
                array(
                    'breakpoint'    => 768,
                    'settings'      => array(
                        'slidesToShow'      => 2,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 992,
                    'settings'      => array(
                        'slidesToShow'      => 3,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 1200,
                    'settings'      => array(
                        'slidesToShow'      => 4,
                        'slidesToScroll'    => 1
                    )
                ),
            ) );

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            if( ! empty( $bg_image ) && ! is_array( $bg_image ) ) {
                $bg_image = wp_get_attachment_image_src( $bg_image, 'full' );
            }

            if ( ! empty( $bg_image ) && is_array( $bg_image ) ) {
                $style_attr .= 'background-image: linear-gradient(rgba(0,0,1,0) 51%, rgb(255, 255, 255) 73%),url( ' . esc_url( $bg_image[0] ) . ' ); ';
            }

            ?><section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="section-featured-movies-carousel__inner">
                        <?php if ( ! empty ( $feature_movie_pre_title ) || ! empty ( $feature_movie_title ) || ! empty ( $feature_movie_subtitle ) ) {
                            echo '<header class="featured-movies-carousel__header">';
                                if ( ! empty ( $feature_movie_pre_title ) ) {
                                    echo '<h5 class="featured-movies-carousel__header-pretitle">' . esc_html( $feature_movie_pre_title ) . '</h5>';
                                }
                                if ( ! empty ( $feature_movie_title ) ) {
                                    echo '<h2 class="featured-movies-carousel__header-title">' . wp_kses_post( $feature_movie_title ) . '</h2>';
                                }
                                if ( ! empty ( $feature_movie_subtitle ) ) {
                                    echo '<span class="featured-movies-carousel__header-subtitle">' . wp_kses_post( $feature_movie_subtitle ) . '</span>';
                                }
                            echo '</header>';
                        }

                        if ( ! empty ( $section_nav_links ) ) {
                            echo '<ul class="nav">';
                                $i = 0;
                                $nav_count = count( $section_nav_links );
                                        foreach ( $section_nav_links as $section_nav_link ) {
                                            if( $i < 1 && $nav_count > 1 ) {
                                        $active = ' active';
                                        $i++;
                                    } else {
                                        $active = '';
                                    }
                                    if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                        echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                    }
                                }
                            echo '</ul>';
                        }
                        ?>
                        <div class="featured-movies-carousel">
                            <div class="movies-carousel">
                                <div class="movies-carousel__inner" data-ride="vodi-slick-carousel" data-wrap=".movies__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                                        <?php echo vodi_do_shortcode( $movies_shortcode, $shortcode_atts ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_section_featured_movie' ) ) {
    function vodi_section_featured_movie( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_section_featured_movie_default_args', array(
                'feature_movie_action_icon'     => '',
                'movie_id'                      => '',
                'movies_shortcode'              => 'mas_movies',
                'image'                         => '',
                'bg_image'                      => '',
                'el_class'                      => '',
                'shortcode_atts'        => array(
                    'columns'               => '1',
                    'limit'                 => '1',
                ),
                'design_options'                => array(),
            ) );
            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            if( ! empty( $movie_id ) ) {
                $shortcode_atts['ids'] = $movie_id;
                $section_class = 'home-section section-featured-movie dark';

                if ( !empty ( $section_style ) ) {
                    $section_class .= ' ' . $section_style;
                }

                if ( !empty ( $el_class ) ) {
                    $section_class .= ' ' . $el_class;
                }

                $style_attr = '';

                if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                    foreach ( $design_options as $key => $design_option ) {
                        if ( !empty ( $design_option ) ) {
                            $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                        }
                    }
                }

                if( ! empty( $bg_image ) && ! is_array( $bg_image ) ) {
                    $bg_image = wp_get_attachment_image_src( $bg_image, 'full' );
                }

                if ( ! empty( $bg_image ) && is_array( $bg_image ) ) {
                    $style_attr .= 'background-image: url( ' . esc_url( $bg_image[0] ) . ' );';
                }

                ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                    <div class="container">
                        <div class="section-featured-movie__inner">
                           <div class="featured-movie__content">
                                <?php if ( ! empty( $image ) ) {
                                    echo wp_get_attachment_image( $image, 'full', '', array( "class" => "featured-movie__content-image" ) );
                                } ?>
                                <?php echo vodi_do_shortcode( 'mas_movies', $shortcode_atts ); ?>
                                
                            </div>
                            <?php if( !empty( $feature_movie_action_icon ) ) {
                                ?>

                                <div class="featured-movie__action">
                                    <a data-fancybox data-src="#hidden-movie-content-<?php echo esc_attr( $movie_id ); ?>" class="single-movie-popup-btn featured-movie__action-icon" href="javascript:;">
                                        <i class="<?php echo wp_kses_post( $feature_movie_action_icon ); ?>"></i>
                                    </a>
                                    <div class="single-movie-popup" id="hidden-movie-content-<?php echo esc_attr( $movie_id ); ?>">
                                        <?php
                                            $movie = masvideos_get_movie( $movie_id );
                                            if( $movie ) {
                                                echo '<div class="movie__player">';
                                                masvideos_the_movie( $movie );
                                                echo '</div>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </section><?php
            }
        }
    }
}

if ( ! function_exists( 'vodi_videos_with_featured_video' ) ) {
    function vodi_videos_with_featured_video( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_videos_with_featured_video_default_args', array(
                'section_title'         => '',
                'section_nav_links'     => array(),
                'section_background'    => '',
                'footer_view_more_text' => '',
                'footer_view_more_link' => '#',
                'bg_image'              => '',
                'section_style'         => '',
                'header_style'          => '',
                'el_class'              => '',
                'design_options'        => array(),
                'feature_video_id'      => '',
                'shortcode_atts'        => array(
                    'columns'               => '3',
                    'limit'                 => '6',
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            $section_class = 'home-section home-section-videos-with-featured-video';

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $featured_shortcode_atts = array(
                'columns'   => 1,
                'limit'     => 1,
                'ids'       => $feature_video_id,
            );

            if( intval( $shortcode_atts['columns'] ) > 1) {
                $shortcode_atts['limit'] = intval( $shortcode_atts['columns'] ) * 2;
            } else {
                $shortcode_atts['limit'] = 1;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            if( ! empty( $bg_image ) && ! is_array( $bg_image ) ) {
                $bg_image = wp_get_attachment_image_src( $bg_image, 'full' );
            }

            if ( ! empty( $bg_image ) && is_array( $bg_image ) ) {
                $style_attr .= 'background-image: url( ' . esc_url( $bg_image[0] ) . ' );';
            }

            ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="home-section__inner  home-section__videos">
                        <?php if ( ! empty ( $section_title ) ) {
                            echo '<header class="' . esc_attr( ( $header_style == "nav-header" ) ? "home-section__header home-section__nav-header" : "home-section__flex-header" ) . '">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="' . esc_attr( ( $header_style == "nav-header" ) ? "home-section__title" : "section-title" ) . '">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_nav_links ) ) {
                                    echo '<ul class="nav nav-tabs">';
                                        $i = 0;
                                        $nav_count = count($section_nav_links);
                                        foreach ( $section_nav_links as $section_nav_link ) {
                                            if( $i < 1 && $nav_count > 1 ) {
                                                $active = ' active';
                                                $i++;
                                            } else {
                                                $active = '';
                                            }
                                            if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                                echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                            }
                                        }
                                    echo '</ul>';
                                }
                            echo '</header>';
                        } ?>
                        <div class="videos-with-featured-video__1-<?php echo esc_attr( $shortcode_atts['limit'] ); ?>-block">
                            <?php echo vodi_do_shortcode( 'mas_videos', $featured_shortcode_atts ); ?>
                            <?php echo vodi_do_shortcode( 'mas_videos', $shortcode_atts ); ?>
                        </div>
                    </div>
                </div>

                <?php if ( ! empty ( $footer_view_more_text ) ) : ?>
                    <div class="home-section__footer-view-more-action">
                        <span class="home-section__footer-view-more-action__inner">
                            <a href="<?php echo esc_url( $footer_view_more_link ); ?>" class="home-section__footer-view-more-action--link"><?php echo esc_html( $footer_view_more_text ); ?></a>
                        </span>
                    </div>
                <?php endif; ?>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_section_featured_tv_show' ) ) {
    function vodi_section_featured_tv_show( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_section_featured_tv_show_default_args', array(
                'tv_show_id'        => '',
                'bg_image'          => '',
                'bg_light'          => '',
                'default_active_tab'=> '',
                'el_class'          => '',
                'design_options'    => array(),
            ) );

            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            $section_class = 'home-section section-featured-tv-show';

            if ( !empty ( $bg_light ) ) {
                $section_class .= ' light';
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            if( ! empty( $bg_image ) && ! is_array( $bg_image ) ) {
                $bg_image = wp_get_attachment_image_src( $bg_image, 'full' );
            }

            if ( ! empty( $bg_image ) && is_array( $bg_image ) ) {
                $style_attr .= 'background-image: url( ' . esc_url( $bg_image[0] ) . ' );';
            }

            if ( empty( $tv_show_id ) || empty( $bg_image ) ) {
                return;
            }

            $tv_show = masvideos_get_tv_show( $tv_show_id );
            
            if ( ! is_object( $tv_show ) ) {
                return;
            }

            $default_active_tab = empty( $default_active_tab ) ? 0 : $default_active_tab;
            $tab_uniqid = 'tab-' . uniqid();
            $active_class = ' active show';

            $excerpt = vodi_get_the_excerpt( $tv_show_id );
            $seasons = $tv_show->get_seasons();

            ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="section-featured-tv-show__inner">
                        <?php
                        echo '<header class="featured-tv-show__header">';
                            if ( $tv_show->get_featured() ) {
                                echo '<h5 class="featured-tv-show__header-pretitle">' . esc_html( apply_filters( 'vodi_section_featured_tv_show_feature_badge_text', 'Featured' ) ) . '</h5>';
                            }
                            echo '<h2 class="featured-tv-show__header-title"><a href="' . get_permalink( $tv_show_id ) . '">' . esc_html( $tv_show->get_title() ) . '</a></h2>';
                            if ( ! empty ( $excerpt ) ) {
                                echo '<span class="featured-tv-show__header-subtitle">' . wp_kses_post( $excerpt ) . '</span>';
                            }
                        echo '</header>';

                        if ( ! empty ( $seasons ) ) {
                            $seasons = array_reverse( $seasons );
                            echo '<div class="featured-tv-show__content">';
                                echo '<div class="seasons"><ul class="nav">';
                                    foreach ( $seasons as $key => $season ) {
                                        $tab_id = $tab_uniqid . $key;
                                        echo '<li class="nav-item"><a href="#' . esc_attr( $tab_id  ) . '" data-toggle="tab" class="nav-link' . ( ( $key == $default_active_tab ) ? esc_attr( $active_class ) : "" ) . '">' . esc_html( $season['name'] ) . '</a></li>';
                                    }
                                echo '</ul></div>';

                                echo '<div class="tab-content">';
                                    foreach ( $seasons as $key => $season ) {
                                        $tab_id = $tab_uniqid . $key;
                                        $episodes = implode( ",", $season['episodes'] );
                                        $shortcode_atts = apply_filters( "vodi_section_featured_tv_show_' . $key . '", array(
                                            'orderby'   => 'post__in',
                                            'order'     => 'DESC',
                                            'limit'     => '5',
                                            'columns'   => '5',
                                            'ids'       => $episodes,
                                        ) );
                                        echo '<div id="' . esc_attr( $tab_id ) . '" class="tab-pane' . ( ( $key == $default_active_tab ) ? esc_attr( $active_class ) : "" ) . '">';
                                            echo vodi_do_shortcode( 'mas_episodes', $shortcode_atts );
                                        echo '</div>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        } ?>
                    </div>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_banner_with_section_tv_shows' ) ) {
    function vodi_banner_with_section_tv_shows( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_banner_with_section_tv_shows_default_args', array(
                'section_title'         => '',
                'section_nav_links'     => array(),
                'section_background'    => '',
                'section_style'         => '',
                'image'                 => '',
                'footer_action_text'    => '',
                'footer_action_link'    => '',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '4',
                    'limit'                 => '8',
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            $section_class = 'home-section banner-with-section-tv-shows';

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="home-section__inner banner-with-section-tv-shows__inner">
                        <?php if ( ! empty ( $section_title ) ) {
                            echo '<header class="home-section__flex-header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="section-title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_nav_links ) ) {
                                    echo '<ul class="nav nav-tabs">';
                                        $i = 0;
                                        $nav_count = count($section_nav_links);
                                        foreach ( $section_nav_links as $section_nav_link ) {
                                            if( $i < 1 && $nav_count > 1 ) {
                                                $active = ' active';
                                                $i++;
                                            } else {
                                                $active = '';
                                            }
                                            if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                                echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                            }
                                        }
                                    echo '</ul>';
                                }
                            echo '</header>';
                        } ?>
                        <div class="banner-with-section-tv-shows__content">
                            <?php if ( ! empty( $image ) ) {
                                echo '<div class="banner">';
                                    echo wp_get_attachment_image( $image, 'full', '', array( "class" => "banner__image" ) );
                                echo '</div>';
                            } ?>
                            <?php echo vodi_do_shortcode( 'mas_tv_shows', $shortcode_atts ); ?>
                        </div>
                        <?php if ( ! empty ( $footer_action_text ) ) : ?>
                            <div class="home-section__footer-action">
                                <a href="<?php echo esc_url( $footer_action_link ); ?>" class="home-section__footer-action--link"><?php echo esc_html( $footer_action_text ); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_section_full_width_banner' ) ) {
    function vodi_section_full_width_banner( $args = array() ) {
        $defaults = apply_filters( 'vodi_section_full_width_banner_default_args', array(
            'banner_image'          => '',
            'banner_link'           => '#',
            'banner_link_new_tab'   => false,
            'el_class'              => '',
            'design_options'        => array(),
        ) );

        $args = wp_parse_args( $args, $defaults );
        extract( $args );

        if( ! empty( $banner_image ) ) {
            $section_class = 'home-section home-section__full-width-banner';

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="banner section">
                    <a href="<?php echo esc_url( $banner_link ); ?>" class="vodi-banner-link" <?php if( $banner_link_new_tab ) { echo 'target="_blank"'; } ?>>
                        <?php echo wp_get_attachment_image( $banner_image, 'full', '', array( 'class' => 'img-responsive' ) );  ?>
                    </a>
                </div>
            </section>
            <?php
        }
    }
}

if ( ! function_exists( 'vodi_blog_list_section' ) ) {
    /**
     * Display Posts
     */
    function vodi_blog_list_section( $args = array() ) {
        $defaults = apply_filters( 'vodi_blog_list_section_args', array(
            'section_title'     => '',
            'section_nav_links' => array(),
            'post_atts'         => array(),
            'style'             => 'style-1',
            'enable_divider'    => false,
            'hide_excerpt'      => false,
            'design_options'    => array(),
            'el_class'          => '',
        ) );

        $args = wp_parse_args( $args, $defaults );
        extract( $args );

        $query_args = array(
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => '5',
            'orderby'               => 'date',
            'order'                 => 'desc',
            'category__in'          => '',
            'post__in'              => '',
            'post__not_in'          => '',
        );

        if( isset( $post_atts['category'] ) && ! empty( $post_atts['category'] ) ) {
            $query_args['category__in'] = explode( ",", $post_atts['category'] );
        }

        if( isset( $post_atts['ids'] ) && ! empty( $post_atts['ids'] ) ) {
            $query_args['post__in'] = explode( ",", $post_atts['ids'] );
        }

        // Sticky posts
        if ( isset( $post_atts['sticky'] ) && $post_atts['sticky'] == 'only' ) {
            $query_args['post__in'] = get_option( 'sticky_posts' );
        } elseif ( isset( $post_atts['sticky'] ) && $post_atts['sticky'] == 'hide' ) {
            $query_args['post__not_in'] = get_option( 'sticky_posts' );
        }

        $post_atts = wp_parse_args( $post_atts, $query_args );

        $section_class = 'home-section home-blog-list-section';

        if ( !empty ( $style ) ) {
            $section_class .= ' ' . $style;
        }

        if( !empty ( $enable_divider ) && !empty ( $style ) && $style != 'style-2' ) {
            $section_class .= ' enable-divider';
        }
        
        if ( !empty ( $el_class ) ) {
            $section_class .= ' ' . $el_class;
        }

        $style_attr = '';

        if ( ! empty( $design_options ) && is_array( $design_options ) ) {
            foreach ( $design_options as $key => $design_option ) {
                if ( !empty ( $design_option ) ) {
                    $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                }
            }
        }

        $posts_query = new WP_Query( $post_atts );
        if ( $posts_query->have_posts() ) : ?>
            <section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="home-blog-list-section__inner">
                        <?php if ( ! empty ( $section_title ) ) {
                            echo '<header class="home-section__flex-header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="section-title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_nav_links ) ) {
                                    echo '<div class="blog-list-navs"><div class="navs-section-inner"><ul class="nav nav-tabs">';
                                        $i = 0;
                                        $nav_count = count($section_nav_links);
                                        foreach ( $section_nav_links as $section_nav_link ) {
                                            if( $i < 1 && $nav_count > 1 ) {
                                                $active = ' active';
                                                $i++;
                                            } else {
                                                $active = '';
                                            }
                                            if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                                echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                            }
                                        }
                                    echo '</ul></div></div>';
                                }
                            echo '</header>';
                        } ?>
                        <div class="articles">
                            <?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?>>
                                <?php if ( $style != 'style-2' ) {
                                    vodi_post_attachment();
                                    echo '<div class="article__summary">';
                                        vodi_post_header();
                                        if( empty( $hide_excerpt ) ) {
                                            vodi_post_excerpt();
                                        }
                                    echo '</div>';
                                } else {
                                    vodi_post_title();
                                } ?>
                            </article>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif;
        wp_reset_postdata();
    }
}

if ( ! function_exists( 'vodi_blog_grid_section' ) ) {
    /**
     * Display Posts
     */
    function vodi_blog_grid_section( $args = array() ) {
        $defaults = apply_filters( 'vodi_blog_grid_section_args', array(
            'section_title'     => '',
            'section_nav_links' => array(),
            'columns'           => 4,
            'post_atts'         => array(),
            'style'             => 'style-1',
            'hide_excerpt'      => false,
            'design_options'    => array(),
            'el_class'          => '',
        ) );

        $args = wp_parse_args( $args, $defaults );
        extract( $args );

        $query_args = array(
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => 5,
            'orderby'               => 'date',
            'order'                 => 'desc',
            'category__in'          => '',
            'post__in'              => '',
            'post__not_in'          => '',
        );

        if( isset( $post_atts['category'] ) && ! empty( $post_atts['category'] ) ) {
            $query_args['category__in'] = explode( ",", $post_atts['category'] );
        }

        if( isset( $post_atts['ids'] ) && ! empty( $post_atts['ids'] ) ) {
            $query_args['post__in'] = explode( ",", $post_atts['ids'] );
        }

        // Sticky posts
        if ( isset( $post_atts['sticky'] ) && $post_atts['sticky'] == 'only' ) {
            $query_args['post__in'] = get_option( 'sticky_posts' );
        } elseif ( isset( $post_atts['sticky'] ) && $post_atts['sticky'] == 'hide' ) {
            $query_args['post__not_in'] = get_option( 'sticky_posts' );
        }

        $post_atts = wp_parse_args( $post_atts, $query_args );

        $section_class = 'home-section home-blog-grid-section';

        if( !empty ( $style ) && $style == 'style-3' ) {
            $hide_excerpt = true;
        }

        if ( !empty ( $style ) ) {
            $section_class .= ' ' . $style;
        }

        if ( !empty ( $el_class ) ) {
            $section_class .= ' ' . $el_class;
        }

        $style_attr = '';

        if ( ! empty( $design_options ) && is_array( $design_options ) ) {
            foreach ( $design_options as $key => $design_option ) {
                if ( !empty ( $design_option ) ) {
                    $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                }
            }
        }

        $posts_query = new WP_Query( $post_atts );
        if ( $posts_query->have_posts() ) : ?>
            <section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="home-blog-grid-section__inner">
                        <?php if ( ! empty ( $section_title ) ) {
                            echo '<header class="home-section__flex-header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="section-title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_nav_links ) ) {
                                    echo '<div class="blog-list-navs"><div class="navs-section-inner"><ul class="nav nav-tabs">';
                                        $i = 0;
                                        $nav_count = count($section_nav_links);
                                        foreach ( $section_nav_links as $section_nav_link ) {
                                            if( $i < 1 && $nav_count > 1 ) {
                                                $active = ' active';
                                                $i++;
                                            } else {
                                                $active = '';
                                            }
                                            if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                                echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                            }
                                        }
                                    echo '</ul></div></div>';
                                }
                            echo '</header>';
                        } ?>
                        <div class="articles columns-<?php echo esc_attr( $columns ); ?>">
                            <?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?>>
                                <?php
                                    if ( ! is_sticky() || in_array( get_post_format(), array( 'audio', 'video','gallery' ) ) ) {
                                        vodi_post_attachment();
                                    } else {
                                        if ( has_post_thumbnail() ) {
                                            echo '<div class="article__attachment"><div class="article__attachment--thumbnail"><a href="' . esc_url( get_the_permalink() ) . '">';
                                                the_post_thumbnail( 'vodi-480x270-crop' );
                                            echo '</a></div></div>';
                                        }
                                    }
                                    echo '<div class="article__summary">';
                                        if ( !empty ( $style ) && $style == 'style-2' ) {
                                            add_action( 'vodi_post_header','vodi_post_categories', 10 );
                                            remove_action( 'vodi_post_meta','vodi_post_categories', 10 );
                                        }
                                        vodi_post_header();
                                        if ( !empty ( $style ) && $style == 'style-2' ) {
                                            remove_action( 'vodi_post_header','vodi_post_categories', 10 );
                                            add_action( 'vodi_post_meta','vodi_post_categories', 10 );
                                        }
                                        if( empty( $hide_excerpt ) ) {
                                            vodi_post_excerpt();
                                        }
                                    echo '</div>';
                                ?>
                            </article>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif;
        wp_reset_postdata();
    }
}

if ( ! function_exists( 'vodi_blog_tab_section' ) ) {
    /**
     * Display Blog Tab Section.
     */
    function vodi_blog_tab_section( $args = array() ) {
        $defaults = apply_filters( 'vodi_blog_tab_section_args', array(
            'tab_args'          => array(),
            'section_nav_links' => array(),
            'style'             => 'style-1',
            'design_options'    => array(),
            'el_class'          => '',
        ) );

        $args = wp_parse_args( $args, $defaults );
        extract( $args );

        $section_class = 'home-section home-blog-tab-section';

        if ( !empty ( $style ) ) {
            $section_class .= ' ' . $style;
        }

        if ( !empty ( $el_class ) ) {
            $section_class .= ' ' . $el_class;
        }

        $style_attr = '';

        if ( ! empty( $design_options ) && is_array( $design_options ) ) {
            foreach ( $design_options as $key => $design_option ) {
                if ( !empty ( $design_option ) ) {
                    $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                }
            }
        } ?>
        <section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
            <div class="container">
                <div class="home-blog-tab-section__inner">
                    <?php if ( ! empty ( $section_nav_links ) || ! empty ( $tab_args ) ) { ?>
                        <header class="home-section__flex-header">
                            <?php if ( ! empty ( $tab_args ) ) {
                                echo '<div class="home-section__title-tabs section-title"><div class="section-title__inner"><ul class="nav nav-tabs">';
                                    $i = 0;
                                    foreach ( $tab_args as $key => $tab_arg ) {
                                        if( isset( $tab_arg['tab_title'] ) && !empty( $tab_arg['tab_title'] ) ) {
                                            $tab_args[$key]['tab_id'] = $tab_arg['tab_id'] = uniqid();
                                            if( $i == 0 ) {
                                                $active_class = ' active show';
                                                $i++;
                                            } else {
                                                $active_class = '';
                                            }
                                            echo '<li class="nav-item"><a href="#' . esc_attr( $tab_arg['tab_id'] ) . '" data-toggle="tab" class="nav-link' . esc_attr( $active_class ) . '">' . esc_html( $tab_arg['tab_title'] ) . '</a></li>';
                                        }
                                    }
                                echo '</ul></div></div>';
                            }
                            if ( ! empty ( $section_nav_links ) ) {
                                echo '<div class="blog-list-navs"><div class="navs-section-inner"><ul class="nav">';
                                    $i = 0;
                                    $nav_count = count( $section_nav_links );
                                    foreach ( $section_nav_links as $section_nav_link ) {
                                        if( $i < 1 && $nav_count > 1 ) {
                                            $active = ' active';
                                            $i++;
                                        } else {
                                            $active = '';
                                        }
                                        if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                            echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                        }
                                    }
                                echo '</ul></div></div>';
                            } ?>
                        </header>
                    <?php } ?>
                    <div class="tab-content">
                        <?php $i = 0;
                        if(!empty($tab_args)&& is_array($tab_args) ) {
                            foreach ( $tab_args as $tab_arg ) {
                                $query_args = array(
                                    'post_type'             => 'post',
                                    'post_status'           => 'publish',
                                    'posts_per_page'        => '5',
                                    'orderby'               => 'date',
                                    'order'                 => 'desc',
                                    'ignore_sticky_posts'   => 1,
                                    'category__in'          => '',
                                    'post__in'              => '',
                                    'post__not_in'          => '',
                                );

                                if( isset( $tab_arg['post_atts']['category'] ) && ! empty( $tab_arg['post_atts']['category'] ) ) {
                                    $query_args['category__in'] = explode( ",", $tab_arg['post_atts']['category'] );
                                }

                                if( isset( $tab_arg['post_atts']['ids'] ) && ! empty( $tab_arg['post_atts']['ids'] ) ) {
                                    $query_args['post__in'] = explode( ",", $tab_arg['post_atts']['ids'] );
                                }

                                // Sticky posts
                                if ( isset( $tab_arg['post_atts']['sticky'] ) && $tab_arg['post_atts']['sticky'] == 'only' ) {
                                    $query_args['post__in'] = get_option( 'sticky_posts' );
                                } elseif ( isset( $tab_arg['post_atts']['sticky'] ) && $tab_arg['post_atts']['sticky'] == 'hide' ) {
                                    $query_args['post__not_in'] = get_option( 'sticky_posts' );
                                }

                                $tab_arg['post_atts'] = wp_parse_args( $tab_arg['post_atts'], $query_args );

                                $posts_query = new WP_Query( $tab_arg['post_atts'] );
                                if ( $posts_query->have_posts() && isset( $tab_arg['tab_title'] ) && !empty( $tab_arg['tab_title'] ) ) {
                                    if( $i == 0 ) {
                                        $active_class = ' active show';
                                        $i++;
                                    } else {
                                        $active_class = '';
                                    }?>
                                    <div id="<?php echo esc_attr( $tab_arg['tab_id'] ) ?>" class="articles tab-pane<?php echo esc_attr( $active_class ); ?>">
                                        <?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
                                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?>>
                                            <?php
                                                if ( ! is_sticky() || in_array( get_post_format(), array( 'audio', 'video','gallery' ) ) ) {
                                                    vodi_post_attachment();
                                                } else {
                                                    if ( has_post_thumbnail() ) {
                                                        echo '<div class="article__attachment"><div class="article__attachment--thumbnail"><a href="' . esc_url( get_the_permalink() ) . '">';
                                                            the_post_thumbnail( 'vodi-480x270-crop' );
                                                        echo '</a></div></div>';
                                                    }
                                                }
                                                echo '<div class="article__summary">';
                                                    vodi_post_header();
                                                    if( empty( $hide_excerpt ) ) {
                                                        vodi_post_excerpt();
                                                    }
                                                echo '</div>';
                                            ?>
                                        </article>
                                        <?php endwhile; ?>
                                    </div>
                                <?php }
                                wp_reset_postdata();
                            } 
                        } ?>
                    </div>
                </div>
            </div>
        </section><?php
    }
}

if ( ! function_exists( 'vodi_section_featured_post' ) ) {
    function vodi_section_featured_post( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_section_featured_post', array(
                'action_icon_class' => 'far fa-play-circle',
                'action_text'       => esc_html__( 'Play Video', 'vodi' ),
                'post_id'           => '',
                'bg_image'          => '',
                'el_class'          => '',
                'design_options'    => array(),
            ) );

            
            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            if( !empty( $post_id ) ) {
                $post_atts = array(
                    'post_type'             => 'post',
                    'post_status'           => 'publish',
                    'ignore_sticky_posts'   => 1,
                    'posts_per_page'        => 1,
                    'orderby'               => 'date',
                    'order'                 => 'desc',
                    'post__in'              => '',
                );

                $post_atts['post__in'] = explode( ",", $post_id );

                $section_class = 'home-section section-featured-post';

                if ( !empty ( $el_class ) ) {
                    $section_class .= ' ' . $el_class;
                }

                $style_attr = '';

                if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                    foreach ( $design_options as $key => $design_option ) {
                        if ( !empty ( $design_option ) ) {
                            $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                        }
                    }
                }

                if( ! empty( $bg_image ) && ! is_array( $bg_image ) ) {
                    $bg_image = wp_get_attachment_image_src( $bg_image, 'full' );
                }

                if ( ! empty( $bg_image ) && is_array( $bg_image ) ) {
                    $style_attr .=  'background-image: url( ' . esc_url( $bg_image[0] ) . ' );';
                }

                if( empty( $bg_image ) ) {
                    return;
                }

                $post_query = new WP_Query( $post_atts );
                ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                    <div class="container">
                        <div class="section-featured-post__inner">
                            <div class="featured-post">
                                <?php while ( $post_query->have_posts() ) : $post_query->the_post();
                                    vodi_post_meta();
                                    vodi_post_title();
                                    if( get_post_format() == 'video' ) {
                                        ?><div class="featured-post__action">
                                            <a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" class="featured-post__action-icon">
                                                <?php if( ! empty( $action_text) ) : ?>
                                                    <i class="icon <?php echo esc_attr( $action_icon_class ); ?>"></i>
                                                    <div class="play-trailer-txt"><?php echo esc_html( $action_text ); ?></div>
                                                <?php endif; ?>
                                            </a>
                                        </div><?php
                                    }
                                endwhile; ?>
                            </div>
                        </div>
                    </div> 
                </section><?php
                wp_reset_postdata();
            }
        }
    }
}

if ( ! function_exists( 'vodi_hot_premieres_block' ) ) {
    function vodi_hot_premieres_block( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_hot_premieres_block_default_args', array(
                'section_title'         => '',
                'section_nav_links'     => array(),
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '4',
                    'limit'                 => '4',
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            $section_class = 'home-section section-hot-premier-show';

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            if ( !empty ( $hide_movie_title ) ) {
                $section_class .= ' hide-movie-title' ;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="home-section__inner">
                        <?php if ( ! empty ( $section_title ) ) {
                            echo '<header class="home-section__flex-header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="section-title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_nav_links ) ) {
                                    echo '<ul class="nav nav-tabs">';
                                        $i = 0;
                                        $nav_count = count( $section_nav_links );
                                        foreach ( $section_nav_links as $section_nav_link ) {
                                            if( $i < 1 && $nav_count > 1 ) {
                                                $active = ' active';
                                                $i++;
                                            } else {
                                                $active = '';
                                            }
                                            if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                                echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                            }
                                        }
                                    echo '</ul>';
                                }
                            echo '</header>';
                        }?>

                        <div class="hot-premier-show"><?php
                            echo vodi_do_shortcode( 'mas_movies', $shortcode_atts );
                        ?></div>
                    </div>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_slider_movies' ) ) {
    function vodi_slider_movies( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {

            $defaults = apply_filters( 'vodi_slider_movies_default_args', array(
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '3',
                    'limit'                 => '3',
                ),
            ) );
            $args = wp_parse_args( $args, $defaults );
            extract( $args );
            $section_class = 'movie-slider';
            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }
            $style_attr = '';
            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            $shortcode_atts['template'] = 'content-movie-slider';

            ?><div class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <?php echo vodi_do_shortcode( 'mas_movies', $shortcode_atts ); ?>
            </div> <?php
        }
    }
}

if ( ! function_exists( 'vodi_section_live_videos' ) ) {
    function vodi_section_live_videos( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_section_live_videos_default_args', array(
                'live_videos_title'     => '',
                'footer_action_text'    => '',
                'footer_action_link'    => '#',
                'el_class'              => '',
                'shortcode_atts'        => array(
                    'columns'               => '1',
                    'limit'                 => '3',
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            $section_class = 'live-videos';

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="live-videos__inner">
                    <?php if ( ! empty ( $live_videos_title ) ) : ?>
                        <h5 class="live-videos__title"><?php echo esc_html( $live_videos_title ); ?></h5>
                    <?php endif; ?>
                    <?php add_action( 'masvideos_before_videos_loop_item_title', 'vodi_template_loop_video_live_info_content_open', 30 ); ?>
                    <?php add_action( 'masvideos_before_videos_loop_item_title', 'vodi_template_loop_video_live_meta', 40 ); ?>
                    <?php add_action( 'masvideos_after_videos_loop_item_title', 'vodi_template_loop_video_live_info_content_close', 15 ); ?>

                    <?php echo vodi_do_shortcode( 'mas_videos', $shortcode_atts );?>

                    <?php remove_action( 'masvideos_before_videos_loop_item_title', 'vodi_template_loop_video_live_info_content_open', 30 ); ?>
                    <?php remove_action( 'masvideos_before_videos_loop_item_title', 'vodi_template_loop_video_live_meta', 40 ); ?>
                    <?php remove_action( 'masvideos_after_videos_loop_item_title', 'vodi_template_loop_video_live_info_content_close', 15 ); ?>

                    <?php if ( ! empty ( $footer_action_text ) ) : ?>
                        <div class="home-section__footer-action">
                            <a href="<?php echo esc_url( $footer_action_link ); ?>" class="home-section__footer-action--link"><?php echo esc_html( $footer_action_text ); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_section_coming_soon_videos' ) ) {
    function vodi_section_coming_soon_videos( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_section_coming_soon_videos_default_args', array(
                'coming_soon_videos_title'  => '',
                'footer_action_text'        => '',
                'footer_action_link'        => '#',
                'el_class'                  => '',
                'shortcode_atts'            => array(
                    'columns'           => '1',
                    'limit'             => '3',
                    'orderby'           => 'date',
                    'order'             => 'ASC',
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            $shortcode_atts['template'] = 'content-video-coming-soon';
            $shortcode_atts['status'] = 'future';

            $section_class = 'coming-soon-videos';

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="coming-soon-videos__inner">
                    <?php if ( ! empty ( $coming_soon_videos_title ) ) : ?>
                        <h5 class="coming-soon-videos__title"><?php echo esc_html( $coming_soon_videos_title ); ?></h5>
                    <?php endif; ?>

                    <?php echo vodi_do_shortcode( 'mas_videos', $shortcode_atts );?>

                    <?php if ( ! empty ( $footer_action_text ) ) : ?>
                        <div class="home-section__footer-action">
                            <a href="<?php echo esc_url( $footer_action_link ); ?>" class="home-section__footer-action--link"><?php echo esc_html( $footer_action_text ); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_movies_list' ) ) {
    function vodi_movies_list( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_movies_list_default_args', array(
                'section_title_1'         => '',
                'section_title_2'         => '',
                'section_nav_links_1'     => array(),
                'section_nav_links_2'     => array(),
                'featured_movie_id'     => '',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts_1'      => array(
                    'columns'               => '1',
                    'limit'                 => '8',
                ),
                'shortcode_atts_2'      => array(
                    'columns'               => '1',
                    'limit'                 => '8',
                ),
            ) );
            $args = wp_parse_args( $args, $defaults );
            extract( $args );
            $section_id = 'section-movies-list-' . uniqid();
            $section_class = 'home-section section-movies-list';
            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }
            $style_attr = '';
            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            $shortcode_atts_1['template'] = 'content-movie-list';
            $shortcode_atts_2['template'] = 'content-movie-list';
            
            $excerpt_length = apply_filters( 'vodi_featured_movie_excerpt_length', '20' );
            $excerpt_more = apply_filters( 'vodi_featured_movie_excerpt_more', '' );
            ?><section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="section-movies-list__inner">
                        <div class="top-movies-list">
                            <?php if ( ! empty ( $section_title_1 ) ) {
                                echo '<header class="top-movies-list__header">';
                                    if ( ! empty ( $section_title_1 ) ) {
                                        echo '<h2 class="section-movies-list__title">' . esc_html( $section_title_1 ) . '</h2>';
                                    }
                                    if ( ! empty ( $section_nav_links_1 ) ) {
                                        echo '<ul class="nav nav-tabs">';
                                            $i = 0;
                                            $nav_count = count( $section_nav_links_1 );
                                            foreach ( $section_nav_links_1 as $section_nav_link_1 ) {
                                                if( $i < 1 && $nav_count > 1 ) {
                                                    $active = ' active';
                                                    $i++;
                                                } else {
                                                    $active = '';
                                                }
                                                if( ! empty ( $section_nav_link_1['title'] ) && ! empty ( $section_nav_link_1['link'] ) ) {
                                                    echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link_1['link'] ) . '">' . esc_html( $section_nav_link_1['title'] ) . '</a></li>';
                                                }
                                            }
                                        echo '</ul>';
                                    }
                                echo '</header>';
                            } ?>

                            <div class="top-movies-list__info">
                                <?php echo vodi_do_shortcode( 'mas_movies', $shortcode_atts_1 ); ?>
                            </div>
                        </div>

                        <div class="featured-with-list-view-movies-list">
                            <?php if ( ! empty ( $section_title_2 ) ) {
                                echo '<header class="featured-with-list-view-movies-list__header">';
                                    if ( ! empty ( $section_title_2 ) ) {
                                        echo '<h2 class="section-movies-list__title">' . esc_html( $section_title_2 ) . '</h2>';
                                    }
                                    if ( ! empty ( $section_nav_links_2 ) ) {
                                        echo '<ul class="nav nav-tabs">';
                                            $i = 0;
                                            $nav_count = count( $section_nav_links_2 );
                                            foreach ( $section_nav_links_2 as $section_nav_link_2 ) {
                                                if( $i < 1 && $nav_count > 1 ) {
                                                    $active = ' active';
                                                    $i++;
                                                } else {
                                                    $active = '';
                                                }
                                                if( ! empty ( $section_nav_link_2['title'] ) && ! empty ( $section_nav_link_2['link'] ) ) {
                                                    echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link_2['link'] ) . '">' . esc_html( $section_nav_link_2['title'] ) . '</a></li>';
                                                }
                                            }
                                        echo '</ul>';
                                    }
                                echo '</header>';
                            } ?>

                            <div class="featured-with-list-view-movies-list__info">
                                <?php if( !empty( $featured_movie_id ) ) { ?>
                                    <div class="featured-movie">
                                        <?php echo vodi_do_shortcode( 'mas_movies',array('columns' => '1', 'limit' => '1', 'ids' => $featured_movie_id ) ); ?>
                                    </div>
                                <?php } ?>

                                <div class="list-view-movies-list">
                                    <?php echo vodi_do_shortcode( 'mas_movies', $shortcode_atts_2 ); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_videos_slider' ) ) {
    function vodi_videos_slider( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {

            $defaults = apply_filters( 'vodi_videos_slider_default_args', array(
                'el_class'              => '',
                'design_options'        => array(),
                'sliders'               => array(),
                'carousel_args'         => array(
                    'infinite'          => false,
                    'slidesToShow'      => 1,
                    'slidesToScroll'    => 1,
                    'arrows'            => false,
                    'dots'              => true,
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            if( is_rtl() ) {
                $args ['carousel_args']['rtl'] = true;
            }
            extract( $args );

            if ( ! empty ( $sliders ) ) {

                $section_class = 'videos-sliders';
                if ( ! empty ( $el_class ) ) {
                    $section_class .= ' ' . $el_class;
                }

                $style_attr = '';
                if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                    foreach ( $design_options as $key => $design_option ) {
                        if ( !empty ( $design_option ) ) {
                            $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                        }
                    }
                }

                ?><div class="<?php echo esc_attr( $section_class ); ?>" <?php echo ! empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?> data-ride="vodi-slick-carousel" data-wrap=".videos-sliders__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                    <div class="videos-sliders__inner">
                        <?php
                            foreach ( $sliders as $slider ) {
                                extract( $slider );
                                if( ! empty( $video_id ) ) {
                                    $original_post = $GLOBALS['post'];
                                    $GLOBALS['post'] = get_post( $video_id );
                                    $GLOBALS['video'] = masvideos_get_video( $GLOBALS['post'] );

                                    if( $GLOBALS['video'] ) {
                                        $style_attr = '';

                                        if( ! empty( $bg_image ) && ! is_array( $bg_image ) ) {
                                            $bg_image = wp_get_attachment_image_src( $bg_image, 'full' );
                                        }

                                        if ( ! empty( $bg_image ) && is_array( $bg_image ) ) {
                                            $style_attr .=  ' background-size: cover; background-image: url( ' . esc_url( $bg_image[0] ) . ' ); height: ' . esc_attr( $bg_image[2] ) . 'px;';
                                        }

                                        ?><div class="video-slide" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                                            <div class="container">
                                                <div class="single-featured-video">
                                                    <div class="single-featured-video__inner">
                                                        <?php
                                                            if ( ! empty ( $pre_title ) ) {
                                                                echo '<p class="single-featured-video__pre-title">' . esc_html( $pre_title ) . '</p>';
                                                            }
                                                            masvideos_template_loop_video_link_open();
                                                            masvideos_template_loop_video_title();
                                                            masvideos_template_loop_video_link_close();
                                                            if ( ! empty ( $sub_title ) ) {
                                                                echo '<p class="single-featured-video__sub-title">' . wp_kses_post( $sub_title ) . '</p>';
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><?php
                                    }
                                    unset( $GLOBALS['video'] );
                                    $GLOBALS['post'] = $original_post;
                                }
                            }
                        ?>
                    </div>
                </div><?php
            }
        }
    }
}

if ( ! function_exists( 'vodi_movies_slider' ) ) {
    function vodi_movies_slider( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {

            $defaults = apply_filters( 'vodi_movies_slider_default_args', array(
                'gallery_title'         => '',
                'el_class'              => '',
                'style'                 => 'style-v1',
                'design_options'        => array(),
                'sliders'               => array(),
                'carousel_single_args'  => array(
                    'infinite'          => false,
                    'slidesToShow'      => 1,
                    'slidesToScroll'    => 1,
                    'arrows'            => false,
                ),
                'carousel_gallery_args' => array(
                    'infinite'          => false,
                    'slidesToShow'      => 3,
                    'slidesToScroll'    => 1,
                    'arrows'            => true,
                    'dots'              => false,
                    'focusOnSelect'     => true,
                    'touchMove'         => true,
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            if( is_rtl() ) {
                $args ['carousel_single_args']['rtl'] = true;
                $args ['carousel_gallery_args']['rtl'] = true;
            }
            extract( $args );

            if ( ! empty ( $sliders ) ) {

                $section_id = 'movies-sliders-' . uniqid();
                $carousel_single_args['asNavFor'] = '#' . $section_id . ' .movies-sliders-gallery-images__inner';
                $carousel_gallery_args['asNavFor'] = '#' . $section_id . ' .movies-sliders-single-content__inner';

                $section_class = 'movies-sliders';
                if ( ! empty ( $el_class ) ) {
                    $section_class .= ' ' . $el_class;
                }

                if ( ! empty ( $style ) ) {
                    $section_class .= ' ' . $style;
                    if( $style == 'style-v1' ) {
                        $carousel_gallery_args['rows'] = 3;
                        $carousel_gallery_args['slidesPerRow'] = 3;
                        $carousel_gallery_args['slidesToShow'] = 1;
                        $carousel_gallery_args['slidesToScroll'] = 1;
                        $carousel_gallery_args ['responsive'] = array( 
                            array(
                                'breakpoint'    => 767,
                                'settings'      => array(
                                    'rows'              => 1,
                                    'slidesPerRow'      => 1,
                                    'slidesToShow'      => 2,
                                ),
                            ),
                            array(
                                'breakpoint'    => 992,
                                'settings'      => array(
                                    'rows'              => 1,
                                    'slidesPerRow'      => 1,
                                    'slidesToShow'      => 3,
                                    'slidesToScroll'    => 3,
                                )
                            ),
                            array(
                                'breakpoint'    => 1200,
                                'settings'      => array(
                                    'rows'              => 1,
                                    'slidesPerRow'      => 1,
                                    'slidesToShow'      => 4,
                                    'slidesToScroll'    => 4,
                                )
                            )
                        );
                        $custom_script = "
                            jQuery(document).ready( function($){
                                var single = $( '#" . esc_attr( $section_id ) . " .movies-sliders-single-content__inner' );
                                var gallery = $( '#" . esc_attr( $section_id ) . " .movies-sliders-gallery-images__inner' );
                                var killit = false;

                                $('.movie-slide-gallery-image > img').on('click', function(e){
                                    if( !killit ) {
                                        e.stopPropagation();
                                        var idx = $(this).closest('.movie-slide-gallery-image').data('thumb');
                                        single.slick( 'slickGoTo', idx );
                                    }
                                });

                                // need to register a flag that doesn't let us click the slider
                                // as we are trying to swipe it.

                                gallery
                                    .on('beforeChange', function() {
                                        killit = true;
                                    }).on('afterChange', function() {
                                        killit = false;
                                    });
                            } );
                        ";
                        wp_add_inline_script( 'vodi-slick', $custom_script );
                    }

                    if( $style == 'style-v2' ) {
                        $carousel_gallery_args['slidesToShow'] = 6;
                        $carousel_gallery_args ['responsive'] = array( 
                            array(
                                'breakpoint'    => 767,
                                'settings'      => array(
                                    'slidesToShow'      => 3,
                                ),
                            )
                        );
                    }
                }

                $style_attr = '';
                if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                    foreach ( $design_options as $key => $design_option ) {
                        if ( !empty ( $design_option ) ) {
                            $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                        }
                    }
                }

                ?><div id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php echo ! empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                    <div class="movies-sliders-single-content" data-ride="vodi-slick-carousel" data-wrap=".movies-sliders-single-content__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_single_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                        <div class="movies-sliders-single-content__inner">
                            <?php
                                foreach ( $sliders as $slider ) {
                                    extract( $slider );
                                    if( ! empty( $movie_id ) ) {
                                        $original_post = $GLOBALS['post'];
                                        $GLOBALS['post'] = get_post( $movie_id );
                                        $GLOBALS['movie'] = masvideos_get_movie( $GLOBALS['post'] );

                                        if( $GLOBALS['movie'] ) {
                                            $style_attr = '';

                                            if( ! empty( $bg_image ) && ! is_array( $bg_image ) ) {
                                                $bg_image = wp_get_attachment_image_src( $bg_image, 'full' );
                                            }

                                            if ( ! empty( $bg_image ) && is_array( $bg_image ) ) {
                                                $style_attr .=  ' background-size: cover; background-image: url( ' . esc_url( $bg_image[0] ) . ' ); height: ' . esc_attr( $bg_image[2] ) . 'px;';
                                            }

                                            ?><div class="movie-slide" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                                                <div class="container">
                                                    <div class="single-featured-movie">
                                                        <div class="single-featured-movie__inner">
                                                            <?php
                                                                masvideos_template_loop_movie_link_open();
                                                                masvideos_template_loop_movie_title();
                                                                masvideos_template_loop_movie_link_close();
                                                                add_action( 'masvideos_single_movie_meta', 'masvideos_template_single_movie_duration', 30 );
                                                                masvideos_template_single_movie_meta();
                                                                remove_action( 'masvideos_single_movie_meta', 'masvideos_template_single_movie_duration', 30 );
                                                                masvideos_template_loop_movie_actions();
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><?php
                                        }
                                        unset( $GLOBALS['movie'] );
                                        $GLOBALS['post'] = $original_post;
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <div class="movies-sliders-gallery-images-wrap">
                        <?php
                            if ( ! empty ( $gallery_title ) ) {
                                echo '<h4 class="gallery-title">' . esc_html( $gallery_title ) . '</h4>';
                            }
                        ?>
                        <div class="movies-sliders-gallery-images" data-ride="vodi-slick-carousel" data-wrap=".movies-sliders-gallery-images__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_gallery_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                            <div class="movies-sliders-gallery-images__inner">
                                <?php
                                    if( is_rtl() ) {
                                        $sliders = array_reverse( $sliders );
                                    }
                                    foreach ( $sliders as $key => $slider ) {
                                        extract( $slider );
                                        if( ! empty( $movie_id ) ) {
                                            ?><figure class="movie-slide-gallery-image" data-thumb="<?php echo esc_attr( $key ); ?>">
                                                <?php if ( ! empty( $image ) ) {
                                                    echo wp_get_attachment_image( $image, 'full', '', array( 'class' => 'movsie-slide-gallery-image' ) );
                                                } ?>
                                            </figure><?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div><?php
            }
        }
    }
}

if ( ! function_exists( 'vodi_tv_shows_slider' ) ) {
    function vodi_tv_shows_slider( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {

            $defaults = apply_filters( 'vodi_tv_shows_slider_default_args', array(
                'el_class'              => '',
                'design_options'        => array(),
                'sliders'               => array(),
                'carousel_args'         => array(
                    'infinite'          => false,
                    'slidesToShow'      => 1,
                    'slidesToScroll'    => 1,
                    'arrows'            => false,
                    'dots'              => true,
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            if( is_rtl() ) {
                $args ['carousel_args']['rtl'] = true;
            }
            extract( $args );

            if ( ! empty ( $sliders ) ) {

                $section_class = 'tv-shows-sliders';
                if ( ! empty ( $el_class ) ) {
                    $section_class .= ' ' . $el_class;
                }

                $style_attr = '';
                if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                    foreach ( $design_options as $key => $design_option ) {
                        if ( !empty ( $design_option ) ) {
                            $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                        }
                    }
                }

                ?><div class="<?php echo esc_attr( $section_class ); ?>" <?php echo ! empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?> data-ride="vodi-slick-carousel" data-wrap=".tv-shows-sliders__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                    <div class="tv-shows-sliders__inner">
                        <?php
                            foreach ( $sliders as $slider ) {
                                extract( $slider );
                                if( ! empty( $tv_show_id ) ) {
                                    $original_post = $GLOBALS['post'];
                                    $GLOBALS['post'] = get_post( $tv_show_id );
                                    $GLOBALS['tv_show'] = masvideos_get_tv_show( $GLOBALS['post'] );

                                    if( $GLOBALS['tv_show'] ) {
                                        $style_attr = '';

                                        if( ! empty( $bg_image ) && ! is_array( $bg_image ) ) {
                                            $bg_image = wp_get_attachment_image_src( $bg_image, 'full' );
                                        }

                                        if ( ! empty( $bg_image ) && is_array( $bg_image ) ) {
                                            $style_attr .=  ' background-size: cover; background-image: url( ' . esc_url( $bg_image[0] ) . ' ); height: ' . esc_attr( $bg_image[2] ) . 'px;';
                                        }

                                        ?><div class="tv-show-slide" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                                            <div class="container">
                                                <div class="single-featured-tv_show">
                                                    <div class="single-featured-tv_show__inner">
                                                        <?php
                                                            masvideos_template_loop_tv_show_link_open();
                                                            masvideos_template_loop_tv_show_title();
                                                            masvideos_template_loop_tv_show_link_close();
                                                            add_action( 'masvideos_single_tv_show_meta', 'masvideos_template_loop_tv_show_new_episodes_count', 30 );
                                                            masvideos_template_single_tv_show_meta();
                                                            remove_action( 'masvideos_single_tv_show_meta', 'masvideos_template_loop_tv_show_new_episodes_count', 30 );
                                                            masvideos_template_loop_tv_show_actions();
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><?php
                                    }
                                    unset( $GLOBALS['tv_show'] );
                                    $GLOBALS['post'] = $original_post;
                                }
                            }
                        ?>
                    </div>
                </div><?php
            }
        }
    }
}

if ( ! function_exists( 'vodi_section_event_category_list' ) ) {
    function vodi_section_event_category_list( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_section_event_category_list_default_args', array(
                'section_title'         => '',
                'section_nav_links'     => array(),
                'design_options'        => array(),
                'columns'               => 5,
                'category_args'         => array(
                    'orderby'           => 'name',
                    'order'             => 'ASC',
                    'number'            => 4,
                    'hide_empty'        => true,
                ),
                'el_class'              => '',
            ) );

            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            $section_class = 'home-section vodi-event-category';

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            $categories = get_terms( 'video_cat', $category_args );

            ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <?php if ( ! empty ( $section_title ) ) {
                        echo '<header class="home-section__flex-header">';
                            if ( ! empty ( $section_title ) ) {
                                echo '<h2 class="section-title">' . wp_kses_post( $section_title ) . '</h2>';
                            }
                            if ( ! empty ( $section_nav_links ) ) {
                                echo '<ul class="nav nav-tabs">';
                                    $i = 0;
                                    $nav_count = count( $section_nav_links );
                                    foreach ( $section_nav_links as $section_nav_link ) {
                                        if( $i < 1 && $nav_count > 1 ) {
                                            $active = ' active';
                                            $i++;
                                        } else {
                                            $active = '';
                                        }
                                        if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                            echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                        }
                                    }
                                echo '</ul>';
                            }
                        echo '</header>';
                    } ?>

                    <ul class="event-category-lists row columns-<?php echo esc_attr( $columns ); ?>">
                        <?php foreach( $categories as $category ) :
                        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true ); ?>
                        <li class="event-category-list column">
                            <a href="<?php echo esc_url( get_term_link( $category ) ); ?>" class="event-category-list__inner">
                                <div class="event-category-list__inner-poster">
                                <?php if ( !empty( $thumbnail_id ) ) {
                                    echo wp_get_attachment_image( $thumbnail_id, 'full', '', array( 'class' => 'event-category-list__inner-poster-image' ) );
                                } else {
                                    echo '<div class="event-category-list__inner-poster-image empty"></div>';
                                }?>
                                </div>
                                <div class="event-category-list__inner-content">
                                    <h2 class="event-category-title"><?php echo esc_html( $category->name );?></h2>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_blog_grid_with_list_section' ) ) {
    function vodi_blog_grid_with_list_section( $args = array() ) {
        $defaults = apply_filters( 'vodi_blog_grid_with_list_section_default_args', array(
            'section_title'     => '',
            'section_nav_links' => array(),
            'post_atts_1'       => array(),
            'post_atts_2'       => array(),
            'hide_excerpt_1'    => true,
            'hide_excerpt_2'    => false,
            'design_options'    => array(),
            'el_class'          => '',
        ) );

        $args = wp_parse_args( $args, $defaults );
        extract( $args );

        $query_args_1 = array(
            'post_type'         => 'post',
            'post_status'       => 'publish',
            'ignore_sticky_posts'=> 1,
            'posts_per_page'    => 1,
            'orderby'           => 'date',
            'order'             => 'desc',
            'category__in'      => '',
            'post__in'          => '',
            'post__not_in'      => '',
        );


        $query_args_2 = array(
            'post_type'         => 'post',
            'post_status'       => 'publish',
            'ignore_sticky_posts'=> 1,
            'posts_per_page'    => 3,
            'orderby'           => 'date',
            'order'             => 'desc',
            'category__in'      => '',
            'post__in'          => '',
            'post__not_in'      => '',
        );

        if( isset( $ids ) && ! empty( $ids ) ) {
            $query_args_1['post__in'] = explode( ",", $ids );
        }

        // Sticky posts
        if ( isset( $post_atts_1['sticky'] ) && $post_atts_1['sticky'] == 'only' ) {
            $query_args_1['post__in'] = get_option( 'sticky_posts' );
        } elseif ( isset( $post_atts_1['sticky'] ) && $post_atts_1['sticky'] == 'hide' ) {
            $query_args_1['post__not_in'] = get_option( 'sticky_posts' );
        }

        if( isset( $post_atts_2['category'] ) && ! empty( $post_atts_2['category'] ) ) {
            $query_args_2['category__in'] = explode( ",", $post_atts_2['category'] );
        }

        if( isset( $post_atts_2['ids'] ) && ! empty( $post_atts_2['ids'] ) ) {
            $query_args_2['post__in'] = explode( ",", $post_atts_2['ids'] );
        }


        // Sticky posts
        if ( isset( $post_atts_2['sticky'] ) && $post_atts_2['sticky'] == 'only' ) {
            $query_args_2['post__in'] = get_option( 'sticky_posts' );
        } elseif ( isset( $post_atts_2['sticky'] ) && $post_atts_2['sticky'] == 'hide' ) {
            $query_args_2['post__not_in'] = get_option( 'sticky_posts' );
        }

        $post_atts_1 = wp_parse_args( $post_atts_1, $query_args_1 );

        $post_atts_2 = wp_parse_args( $post_atts_2, $query_args_2 );

        $section_class = 'home-section home-blog-grid-with-list-section';

        if ( !empty ( $style ) ) {
            $section_class .= ' ' . $style;
        }

        if ( !empty ( $el_class ) ) {
            $section_class .= ' ' . $el_class;
        }

        $style_attr = '';

        if ( ! empty( $design_options ) && is_array( $design_options ) ) {
            foreach ( $design_options as $key => $design_option ) {
                if ( !empty ( $design_option ) ) {
                    $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                }
            }
        } 
        $posts_query_1 = new WP_Query( $post_atts_1 );
        $posts_query_2 = new WP_Query( $post_atts_2 );

        if ( $posts_query_1->have_posts() || $posts_query_2->have_posts()  ) : ?>


        <section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
            <div class="container">
                <div class="home-blog-grid-with-list-section__inner">
                    <?php if ( ! empty ( $section_title ) ) {
                        echo '<header class="home-section__flex-header">';
                            if ( ! empty ( $section_title ) ) {
                                echo '<h2 class="section-title">' . wp_kses_post( $section_title ) . '</h2>';
                            }
                            if ( ! empty ( $section_nav_links ) ) {
                                echo '<div class="blog-list-tabs"><div class="tabs-section-inner"><ul class="nav">';
                                    $i = 0;
                                    $nav_count = count( $section_nav_links );
                                    foreach ( $section_nav_links as $section_nav_link ) {
                                        if( $i < 1 && $nav_count > 1 ) {
                                            $active = ' active';
                                            $i++;
                                        } else {
                                            $active = '';
                                        }
                                        if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                            echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                        }
                                    }
                                echo '</ul></div></div>';
                            }
                        echo '</header>';
                    } ?>
                    <div class="blog-grid-with-list-section">
                        <div class="blog-grid-with-list-section__article--grid column">
                            
                            <?php while ( $posts_query_1->have_posts() ) : $posts_query_1->the_post(); ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?>>
                                    <?php
                                        if ( ! is_sticky() || in_array( get_post_format(), array( 'audio', 'video','gallery' ) ) ) {
                                            vodi_post_attachment();
                                        } else {
                                            if ( has_post_thumbnail() ) {
                                                echo '<div class="article__attachment"><div class="article__attachment--thumbnail"><a href="' . esc_url( get_the_permalink() ) . '">';
                                                    the_post_thumbnail( 'vodi-990x440-crop' );
                                                echo '</a></div></div>';
                                            }
                                        }
                                        echo '<div class="article__summary">';
                                            vodi_post_header();
                                            if( empty( $hide_excerpt_1 ) ) {
                                                vodi_post_excerpt();
                                            }
                                        echo '</div>';
                                    ?>
                                </article>
                            <?php endwhile; ?>
                            

                        </div>

                        <div class="blog-grid-with-list-section__article--list column">
                            <?php while ( $posts_query_2->have_posts() ) : $posts_query_2->the_post(); ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?>>
                                    <?php
                                        if ( ! is_sticky() || in_array( get_post_format(), array( 'audio', 'video','gallery' ) ) ) {
                                            vodi_post_attachment();
                                        } else {
                                            if ( has_post_thumbnail() ) {
                                                echo '<div class="article__attachment"><div class="article__attachment--thumbnail"><a href="' . esc_url( get_the_permalink() ) . '">';
                                                    the_post_thumbnail( 'vodi-480x270-crop' );
                                                echo '</a></div></div>';
                                            }
                                        }
                                        echo '<div class="article__summary">';
                                            vodi_post_header();
                                            if( empty( $hide_excerpt_2 ) ) {
                                                vodi_post_excerpt();
                                            }
                                        echo '</div>';
                                    ?>
                                </article>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif;
        wp_reset_postdata();
    }   
}

if ( ! function_exists( 'vodi_recent_comments' ) ) {
    function vodi_recent_comments( $args = array() ) {
        $defaults = apply_filters( 'vodi_recent_comments_default_args', array(
            'section_title'     => '',
            'section_nav_links' => array(),
            'design_options'    => array(),
            'limit'            =>'',
            'el_class'          => '',
        ) );

        $args = wp_parse_args( $args, $defaults );
        extract( $args );

        $section_class = 'home-section home-recent-comments';

        if ( !empty ( $el_class ) ) {
            $section_class .= ' ' . $el_class;
        }

        $style_attr = '';

        if ( ! empty( $design_options ) && is_array( $design_options ) ) {
            foreach ( $design_options as $key => $design_option ) {
                if ( !empty ( $design_option ) ) {
                    $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                }
            }
        }

        ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <?php if ( ! empty ( $section_title ) ) {
                        echo '<header class="home-section__flex-header">';
                            if ( ! empty ( $section_title ) ) {
                                echo '<h2 class="section-title">' . wp_kses_post( $section_title ) . '</h2>';
                            }
                            if ( ! empty ( $section_nav_links ) ) {
                                echo '<ul class="nav nav-tabs">';
                                    $i = 0;
                                    $nav_count = count( $section_nav_links );
                                    foreach ( $section_nav_links as $section_nav_link ) {
                                        if( $i < 1 && $nav_count > 1 ) {
                                            $active = ' active';
                                            $i++;
                                        } else {
                                            $active = '';
                                        }
                                        if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                            echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                        }
                                    }
                                echo '</ul>';
                            }
                        echo '</header>';
                    } ?>
                    <div class="recent-comments">
                        <?php the_widget( 'WP_Widget_Recent_Comments', array( 'title' =>' ', 'number' => $limit ) ); ?>
                    </div>
                </div>
            </section>
        <?php
        
    }
}

if ( ! function_exists( 'vodi_featured_blog_with_blog_grid_section' ) ) {
    function vodi_featured_blog_with_blog_grid_section( $args = array() ) {
        $defaults = apply_filters( 'vodi_featured_blog_with_blog_grid_section_default_args', array(
            'section_title'     => '',
            'section_nav_links' => array(),
            'bg_image'          => '',
            'section_background'=> '',
            'feature_post_id'   => '',
            'columns'           => 2,
            'post_atts'         => array(),
            'design_options'    => array(),
            'el_class'          => '',
        ) );


        $args = wp_parse_args( $args, $defaults );
        extract( $args );

        $feature_post_query_args = array(
            'post_type'         => 'post',
            'post_status'       => 'publish',
            'ignore_sticky_posts'=> 1,
            'posts_per_page'    => 1,
            'orderby'           => 'date',
            'order'             => 'desc',
            'post__in'          => '',
        );

        $query_args = array(
            'post_type'         => 'post',
            'post_status'       => 'publish',
            'ignore_sticky_posts'=> 1,
            'posts_per_page'    => 4,
            'orderby'           => 'date',
            'order'             => 'desc',
            'category__in'      => '',
            'post__in'          => '',
            'post__not_in'      => '',
        );

        if( isset( $feature_post_id ) && ! empty( $feature_post_id ) ) {
            $feature_post_query_args['post__in'] = explode( ",", $feature_post_id );
        }

        if( isset( $post_atts['category'] ) && ! empty( $post_atts['category'] ) ) {
            $query_args['category__in'] = explode( ",", $post_atts['category'] );
        }

        if( isset( $post_atts['ids'] ) && ! empty( $post_atts['ids'] ) ) {
            $query_args['post__in'] = explode( ",", $post_atts['ids'] );
        }

        // Sticky posts
        if ( isset( $post_atts['sticky'] ) && $post_atts['sticky'] == 'only' ) {
            $query_args['post__in'] = get_option( 'sticky_posts' );
        } elseif ( isset( $post_atts['sticky'] ) && $post_atts['sticky'] == 'hide' ) {
            $query_args['post__not_in'] = get_option( 'sticky_posts' );
        }

        // Exclude Feature Post From Grid
        if( ! empty( $feature_post_id ) && ! empty( $query_args['post__not_in'] ) ) {
            $query_args['post__not_in'][] = $feature_post_id;
        } elseif( ! empty( $feature_post_query_args['post__in']  ) ) {
            $query_args['post__not_in'] = $feature_post_query_args['post__in'] ;
        }

        $feature_post_atts = $feature_post_query_args;

        $post_atts = wp_parse_args( $post_atts, $query_args );

        $section_class = 'home-section home-featured-blog-with-blog-grid-section';

        if ( !empty ( $section_background ) ) {
            $section_class .= ' has-bg-color ' . $section_background;
        }

        if ( !empty ( $style ) ) {
            $section_class .= ' ' . $style;
        }

        if ( !empty ( $el_class ) ) {
            $section_class .= ' ' . $el_class;
        }

        $style_attr = '';

        if ( ! empty( $design_options ) && is_array( $design_options ) ) {
            foreach ( $design_options as $key => $design_option ) {
                if ( !empty ( $design_option ) ) {
                    $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                }
            }
        }

        if( ! empty( $bg_image ) && ! is_array( $bg_image ) ) {
            $bg_image = wp_get_attachment_image_src( $bg_image, 'full' );
        }

        if ( ! empty( $bg_image ) && is_array( $bg_image ) ) {
            $style_attr .= 'background-image: url( ' . esc_url( $bg_image[0] ) . ' ); ';
        }

        $feature_post_query = new WP_Query( $feature_post_atts );
        $posts_query = new WP_Query( $post_atts );

        ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
            <div class="container">
                <div class="home-featured-blog-with-blog-grid-section__inner">
                    <?php if ( ! empty ( $section_title ) ) {
                        echo '<header class="home-section__flex-header">';
                            if ( ! empty ( $section_title ) ) {
                                echo '<h2 class="section-title">' . wp_kses_post( $section_title ) . '</h2>';
                            }
                            if ( ! empty ( $section_nav_links ) ) {
                                echo '<div class="blog-list-tabs"><div class="tabs-section-inner"><ul class="nav">';
                                    $i = 0;
                                    $nav_count = count( $section_nav_links );
                                    foreach ( $section_nav_links as $section_nav_link ) {
                                        if( $i < 1 && $nav_count > 1 ) {
                                            $active = ' active';
                                            $i++;
                                        } else {
                                            $active = '';
                                        }
                                        if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                            echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                        }
                                    }
                                echo '</ul></div></div>';
                            }
                        echo '</header>';
                    } ?>
                    <div class="featured-blog-with-blog-grid-section">
                        <div class="featured-blog-with-blog-grid-section__feature-article">
                            <div class="articles">
                                <?php while ( $feature_post_query->have_posts() ) : $feature_post_query->the_post(); ?>
                                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?>>
                                        <?php
                                            if ( has_post_thumbnail() ) {
                                                echo '<div class="article__attachment"><div class="article__attachment--thumbnail"><a href="' . esc_url( get_the_permalink() ) . '">';
                                                    the_post_thumbnail( 'vodi-696x677-crop' );
                                                echo '</a></div></div>';
                                            } else {
                                                echo '<div class="article__attachment article__attachment--empty"></div>';
                                            }
                                            echo '<div class="article__summary">';
                                                vodi_post_title();
                                                if( empty( $hide_excerpt ) ) {
                                                    vodi_post_excerpt();
                                                }
                                                vodi_post_meta();
                                            echo '</div>';
                                        ?>
                                    </article>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <div class="featured-blog-with-blog-grid-section__grid-section">
                            <div class="articles columns-<?php echo esc_attr( $columns ); ?>">
                                <?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
                                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?>>
                                        <?php
                                            if ( ! is_sticky() || in_array( get_post_format(), array( 'audio', 'video','gallery' ) ) ) {
                                                vodi_post_attachment();
                                            } else {
                                                if ( has_post_thumbnail() ) {
                                                    echo '<div class="article__attachment"><div class="article__attachment--thumbnail"><a href="' . esc_url( get_the_permalink() ) . '">';
                                                        the_post_thumbnail( 'vodi-480x270-crop' );
                                                    echo '</a></div></div>';
                                                }
                                            }
                                            echo '<div class="article__summary">';
                                                vodi_post_title();
                                                if( empty( $hide_excerpt ) ) {
                                                    vodi_post_excerpt();
                                                }
                                                vodi_post_meta();
                                            echo '</div>';
                                        ?>
                                    </article>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><?php
        wp_reset_postdata();
    }   
}

if ( ! function_exists( 'vodi_section_playlist_carousel' ) ) {
    function vodi_section_playlist_carousel( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_section_playlist_carousel_default_args', array(
                'section_title'     => 'Appreciated User&apos;s Collection',
                'tab_args'          => array(),
                'carousel_args'         => array(
                    'slidesToShow'          => 5,
                    'slidesToScroll'        => 1,
                    'dots'                  => false,
                    'arrows'                => true,
                    'autoplay'              => false,
                ),
                'design_options'    => array(),
            ) );

            $args = wp_parse_args( $args, $defaults );
            if( is_rtl() ) {
                $args ['carousel_args']['rtl'] = true;
            }
            extract( $args );

            $carousel_args['responsive'] = apply_filters( 'vodi_section_playlist_carousel_responsive_carousel_args', array(
                array(
                    'breakpoint'    => 768,
                    'settings'      => array(
                        'slidesToShow'      => 1,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 992,
                    'settings'      => array(
                        'slidesToShow'      => 2,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 1200,
                    'settings'      => array(
                        'slidesToShow'      => 3,
                        'slidesToScroll'    => 1
                    )
                ),
            ) );

            if ( empty( $tab_args ) ) {
                return;
            }

            $section_class = 'home-section section-playlist-carousel';

            $shortcode_atts['columns'] = $carousel_args['slidesToShow'];

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            $default_active_tab = empty( $default_active_tab ) ? 0 : $default_active_tab;
            $uniqid_id = uniqid();
            $section_id = 'section-playlist-carousel' . $uniqid_id;
            $tab_uniqid = 'tab-' . $uniqid_id;
            $active_class = ' active show';

            ?>
            <section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php echo ! empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="section-playlist-carousel__inner">
                        <header class="home-section__header home-section__nav-header">
                            <?php if ( ! empty ( $section_title ) ) : ?>
                                <h2 class="home-section__title"><?php echo wp_kses_post( $section_title ); ?></h2>
                            <?php endif; ?>
                            <div><ul class="nav">
                                <?php foreach ( $tab_args as $key => $tab_arg ) :
                                    $tab_id = $tab_uniqid . $key; ?>
                                    <li class="nav-item">
                                        <a href="#<?php echo esc_attr( $tab_id  ) ?>" data-toggle="tab" class="nav-link<?php if( $key == $default_active_tab ) echo esc_attr( $active_class ); ?>">
                                            <?php echo esc_html( $tab_arg['tab_title'] ); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul></div>
                        </header>
                        <div class="section-playlist-carousel__content">
                            <div class="section-playlist-carousel__content--inner">
                                <div class="tab-content">
                                    <?php foreach ( $tab_args as $key => $tab_arg ) :
                                        $tab_id = $tab_uniqid . $key;
                                        if( ! empty( $tab_arg['post_type'] ) ) :
                                            $shortcode = 'mas_' . $tab_arg['post_type'];
                                            $post_type = str_replace ( '_', '-', $tab_arg['post_type'] );
                                            $tab_arg['shortcode_atts']['columns'] = $carousel_args['slidesToShow']; ?>

                                            <div id="<?php echo esc_attr( $tab_id  ); ?>" class="tab-pane<?php if( $key == $default_active_tab ) echo esc_attr( $active_class ); ?>">
                                                <div data-ride="vodi-slick-carousel" data-wrap=".<?php echo esc_attr( $post_type ) ?>__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                                                    <?php echo vodi_do_shortcode( $shortcode , $tab_arg['shortcode_atts'] ); ?>
                                                </div>
                                            </div>
                                        <?php endif;
                                    endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        }
    }
}

if ( ! function_exists( 'vodi_section_tv_episodes_carousel_aside_header' ) ) {
    function vodi_section_tv_episodes_carousel_aside_header( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_section_tv_episodes_carousel_aside_header_default_args', array(
                'section_title'         => '',
                'section_subtitle'      => '',
                'section_nav_links'     => array(),
                'action_link'           => '#',
                'action_text'           => '',
                'section_background'    => '',
                'section_style'         => '',
                'header_posisition'     => '',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '6',
                    'limit'                 => '15',
                ),
                'carousel_args'         => array(
                    'slidesToShow'          => 6,
                    'slidesToScroll'        => 6,
                    'dots'                  => false,
                    'arrows'                => true,
                    'autoplay'              => false,
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            if( is_rtl() ) {
                $args ['carousel_args']['rtl'] = true;
            }
            extract( $args );

            $section_class = 'home-section section-tv-episodes-carousel';

            if ( ! empty ( $section_title ) || ! empty ( $section_subtitle ) ) {
                $section_class .= ' has-section-header';
            } 

            $shortcode_atts['columns'] = $carousel_args['slidesToShow'];

            $carousel_args['responsive'] = apply_filters( 'vodi_section_tv_episodes_carousel_aside_header_responsive_carousel_args', array(
                array(
                    'breakpoint'    => 768,
                    'settings'      => array(
                        'slidesToShow'      => 1,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 992,
                    'settings'      => array(
                        'slidesToShow'      => 3,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 1200,
                    'settings'      => array(
                        'slidesToShow'      => 4,
                        'slidesToScroll'    => 1
                    )
                ),
            ) );

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }


            if ( !empty ( $header_posisition ) ) {
                $section_class .= ' ' . $header_posisition;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            $section_id = 'section-tv-episodes-carousel-' . uniqid();
            $carousel_args['appendArrows'] = '#' . $section_id . ' .section-tv-episodes-carousel__custom-arrows';

            ?><section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <?php if ( ! empty ( $section_nav_links ) ) {
                        echo '<ul class="nav nav-tabs">';
                            $i = 0;
                            $nav_count = count( $section_nav_links );
                            foreach ( $section_nav_links as $section_nav_link ) {
                                if( $i < 1 && $nav_count > 1 ) {
                                    $active = ' active';
                                    $i++;
                                } else {
                                    $active = '';
                                }
                                if( ! empty ( $section_nav_link['link'] ) ) {
                                    echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                }
                            }
                        echo '</ul>';
                    } ?>
                    <div class="section-tv-episodes-carousel__inner">
                        <?php if ( ! empty ( $section_title ) || ! empty ( $section_subtitle ) ) {
                            echo '<header class="home-section__header section-tv-episodes-carousel__header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="home-section__title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_subtitle ) ) {
                                    echo '<p class="home-section__subtitle">' . wp_kses_post( $section_subtitle ) . '</p>';
                                }
                                echo '<div class="section-tv-episodes-carousel__custom-arrows"></div>';
                                if ( ! empty ( $action_text ) ) {
                                    echo '<div class="home-section__action"><a href="' . esc_url( $action_link ) . '" class="home-section__action-link">' . esc_html( $action_text ) . '</a></div>';
                                }
                            echo '</header>';
                        } ?>

                        <div class="section-tv-episodes-carousel__carousel">
                            <div class="tv-episodes-carousel__inner" data-ride="vodi-slick-carousel" data-wrap=".episodes__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                                    <?php echo vodi_do_shortcode( 'mas_episodes', $shortcode_atts ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_section_tv_episodes_carousel_flex_header' ) ) {
    function vodi_section_tv_episodes_carousel_flex_header( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_section_tv_episodes_carousel_flex_header_default_args', array(
                'section_title'         => '',
                'section_nav_links'     => array(),
                'section_background'    => '',
                'section_style'         => '',
                'footer_action_text'    => '',
                'footer_action_link'    => '#',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '6',
                    'limit'                 => '15',
                ),
                'carousel_args'         => array(
                    'slidesToShow'      => 6,
                    'slidesToScroll'    => 6,
                    'dots'              => false,
                    'arrows'            => true,
                    'autoplay'          => false,
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            if( is_rtl() ) {
                $args ['carousel_args']['rtl'] = true;
            }
            extract( $args );

            $section_class = 'home-section section-tv-episodes-carousel-flex-header';

            $shortcode_atts['columns'] = $carousel_args['slidesToShow'];

            $carousel_args['responsive'] = apply_filters( 'vodi_section_tv_episodes_carousel_flex_header_responsive_carousel_args', array(
                array(
                    'breakpoint'    => 768,
                    'settings'      => array(
                        'slidesToShow'      => 1,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 992,
                    'settings'      => array(
                        'slidesToShow'      => 3,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 1200,
                    'settings'      => array(
                        'slidesToShow'      => 4,
                        'slidesToScroll'    => 1
                    )
                ),
            ) );

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }


            if ( !empty ( $header_posisition ) ) {
                $section_class .= ' ' . $header_posisition;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            $section_id = 'section-tv-episodes-carousel-' . uniqid();

            ?><section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="home-section__inner">
                        <?php if ( ! empty ( $section_title ) ) {
                            echo '<header class="home-section__flex-header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="section-title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_nav_links ) ) {
                                    echo '<ul class="nav">';
                                        $i = 0;
                                        $nav_count = count( $section_nav_links );
                                        foreach ( $section_nav_links as $section_nav_link ) {
                                            if( $i < 1 && $nav_count > 1 ) {
                                                $active = ' active';
                                                $i++;
                                            } else {
                                                $active = '';
                                            }
                                            if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                                echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                            }
                                        }
                                    echo '</ul>';
                                }
                            echo '</header>';
                        } ?>
                        <div class="section-tv-episodes-carousel__carousel">
                            <div class="tv-episodes-carousel__inner" data-ride="vodi-slick-carousel" data-wrap=".episodes__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                                    <?php echo vodi_do_shortcode( 'mas_episodes', $shortcode_atts ); ?>

                            </div>
                        </div>
                        <?php if ( ! empty ( $footer_action_text ) ) : ?>
                            <div class="home-section__footer-action">
                                <a href="<?php echo esc_url( $footer_action_link ); ?>" class="home-section__footer-action--link"><?php echo esc_html( $footer_action_text ); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_tv_show_carousel' ) ) {
    function vodi_tv_show_carousel( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_tv_show_carousel_default_args', array(
                'section_title'                 => '',
                'section_nav_links'             => array(),
                'el_class'                      => '',
                'design_options'                => array(),
                'tv_show_shortcode'             => 'mas_tv_shows',
                'shortcode_atts'                => array(
                    'columns'               => '5',
                    'limit'                 => '15',
                ),
                'carousel_args'             => array(
                    'slidesToShow'          => 5,
                    'slidesToScroll'        => 5,
                    'dots'                  => true,
                    'arrows'                => false,
                    'autoplay'              => false,
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            if( is_rtl() ) {
                $args ['carousel_args']['rtl'] = true;
            }
            extract( $args );

            $section_id = 'section-tv-show-carousel-' . uniqid();
            $section_class = 'home-section section-tv-show-carousel';
            
            $shortcode_atts['columns'] = $carousel_args['slidesToShow'];

            $carousel_args['responsive'] = apply_filters( 'vodi_tv_show_carousel_responsive_carousel_args', array(
                array(
                    'breakpoint'    => 768,
                    'settings'      => array(
                        'slidesToShow'      => 2,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 992,
                    'settings'      => array(
                        'slidesToShow'      => 3,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 1200,
                    'settings'      => array(
                        'slidesToShow'      => 4,
                        'slidesToScroll'    => 1
                    )
                ),
            ) );

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            ?><section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>">
                <div class="container">
                    <div class="section-tv-show-carousel__inner">
                        <?php if ( ! empty ( $section_title ) ) {
                            echo '<header class="home-section__flex-header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="section-title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_nav_links ) ) {
                                    echo '<ul class="nav nav-tabs">';
                                        $i = 0;
                                        $nav_count = count( $section_nav_links );
                                        foreach ( $section_nav_links as $section_nav_link ) {
                                            if( $i < 1 && $nav_count > 1 ) {
                                                $active = ' active';
                                                $i++;
                                            } else {
                                                $active = '';
                                            }
                                            if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                                echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                            }
                                        }
                                    echo '</ul>';
                                }
                            echo '</header>';
                        }
                        ?>
                        <div class="tv-show-carousel">
                            <div class="tv-show-carousel__inner" data-ride="vodi-slick-carousel" data-wrap=".tv-shows__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                                    <?php echo vodi_do_shortcode( $tv_show_shortcode, $shortcode_atts ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_faq_section' ) ) {
    function vodi_faq_section( $args = array() ) {
        $defaults = apply_filters( 'vodi_faq_section_default_args', array(
            'faq_args'          => array(),
            'design_options'    => array(),
            'el_class'          => '',
        ) );

        $args = wp_parse_args( $args, $defaults );
        extract( $args );

        $section_class = 'home-section vodi-faq-section';

        if ( !empty ( $el_class ) ) {
            $section_class .= ' ' . $el_class;
        }

        $style_attr = '';

        if ( ! empty( $design_options ) && is_array( $design_options ) ) {
            foreach ( $design_options as $key => $design_option ) {
                if ( !empty ( $design_option ) ) {
                    $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                }
            }
        } 

        $default_active_faq = empty( $default_active_faq ) ? 0 : $default_active_faq;
        $faq_uniqid = 'faq-' . uniqid();
        $active_class = 'show';
        ?>

        <section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
            <div class="container">
                <div class="faq-section__inner">
                    <div class="faq-section__faqs">
                      <?php foreach ( $faq_args as $key => $faq_arg ) {
                        $faq_id = $faq_uniqid . $key;
                        ?><div class="faq-section__faq">
                            <div class="faq-section__faq-header" id="head-<?php echo esc_attr( $faq_id ); ?>">
                                <h5>
                                    <a href="#" class="faq-section__faq-header--link collapsed <?php echo ( ( $key == $default_active_faq ) ? "": esc_attr( 'collapsed' )  ) ?>" data-toggle="collapse" data-target="#collapese-<?php echo esc_attr( $faq_id ); ?>" aria-expanded="true" aria-controls="collapese-<?php echo esc_attr( $faq_id ); ?>">
                                        <?php echo wp_kses_post( $faq_arg['title'] ); ?> 
                                    </a>
                                </h5>
                            </div>

                            <div id="collapese-<?php echo esc_attr( $faq_id ); ?>" class="collapse hide<?php echo ( ( $key == $default_active_faq ) ? esc_attr( $active_class ) : "" ) ?>" aria-labelledby="head-<?php echo esc_attr( $faq_id ); ?>" data-parent="#accordionExample">
                                <div class="faq-section__faq-body">
                                    <?php echo wp_kses_post( $faq_arg['desc'] ); ?> 
                                </div>
                            </div>
                        </div><?php
                        }
                    ?></div>
                </div>
            </div>
        </section><?php
    }
}

if ( ! function_exists( 'vodi_tv_show_section_aside_header' ) ) {
    function vodi_tv_show_section_aside_header( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_tv_show_section_aside_header_default_args', array(
                'section_title'         => '',
                'section_subtitle'      => '',
                'section_nav_links'     => array(),
                'action_text'           => '',
                'action_link'           => '#',
                'section_background'    => '',
                'section_style'         => '',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '6',
                    'limit'                 => '10',
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            $args = apply_filters( 'vodi_tv_show_section_aside_header_args', $args );
            extract( $args );

            $section_class = 'home-section home-tv-show-section-aside-header';

            if ( ! empty ( $section_title ) || ! empty ( $section_subtitle ) ) {
                $section_class .= ' has-section-header';
            } 

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            $shortcode_tv_shows   = new Vodi_Shortcode_TV_Shows( $shortcode_atts );
            $tv_shows             = $shortcode_tv_shows->get_tv_shows();
            $tv_shows_count       = 0;

            if ( $tv_shows && $tv_shows->ids ) {
                ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                    <div class="container">
                        <?php if ( ! empty ( $section_nav_links ) ) {
                            echo '<ul class="nav nav-tabs">';
                                $i = 0;
                                $nav_count = count( $section_nav_links );
                                foreach ( $section_nav_links as $section_nav_link ) {
                                    if( $i < 1 && $nav_count > 1 ) {
                                        $active = ' active';
                                        $i++;
                                    } else {
                                        $active = '';
                                    }
                                    if( ! empty ( $section_nav_link['link'] ) ) {
                                        echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                    }
                                }
                            echo '</ul>';
                        } ?>
                        <div class="home-tv-show-section-aside-header__inner">
                            <?php
                                $shortcode_tv_shows->tv_show_loop_start();

                                if ( masvideos_get_tv_shows_loop_prop( 'total' ) ) {
                                    foreach ( $tv_shows->ids as $tv_show_id ) {
                                        $GLOBALS['post'] = get_post( $tv_show_id ); // WPCS: override ok.
                                        setup_postdata( $GLOBALS['post'] );

                                        // Set custom tv_show visibility when quering hidden tv_shows.
                                        add_action( 'masvideos_tv_show_is_visible', array( $shortcode_tv_shows, 'set_tv_show_as_visible' ) );

                                        if ( $tv_shows_count == 0 && ( ! empty ( $section_title ) || ! empty ( $section_subtitle ) ) ) {
                                            echo '<header class="home-section__header">';
                                                if ( ! empty ( $section_title ) ) {
                                                    echo '<h2 class="home-section__title">' . wp_kses_post( $section_title ) . '</h2>';
                                                }
                                                if ( ! empty ( $section_subtitle ) ) {
                                                    echo '<p class="home-section__subtitle">' . wp_kses_post( $section_subtitle ) . '</p>';
                                                }
                                                if ( ! empty ( $action_text ) ) {
                                                    echo '<div class="home-section__action"><a href="' . esc_url( $action_link ) . '" class="home-section__action-link">' . esc_html( $action_text ) . '</a></div>';
                                                }
                                            echo '</header>';
                                        }

                                        // Render tv_show template.
                                        masvideos_get_template_part( 'content', 'tv-show' );

                                        // Restore tv_show visibility.
                                        remove_action( 'masvideos_tv_show_is_visible', array( $shortcode_tv_shows, 'set_tv_show_as_visible' ) );

                                        $tv_shows_count++;
                                    }
                                }

                                $shortcode_tv_shows->tv_show_loop_end();
                            ?>
                        </div>
                    </div>
                </section><?php
            }
        }
    }
}

if ( ! function_exists( 'vodi_section_tv_shows_carousel_nav_header' ) ) {
    function vodi_section_tv_shows_carousel_nav_header( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_section_tv_shows_carousel_nav_header_default_args', array(
                'section_title'         => '',
                'section_nav_links'     => array(),
                'section_background'    => '',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '5',
                    'limit'                 => '15',
                ),
                'carousel_args'         => array(
                    'slidesToShow'      => 5,
                    'slidesToScroll'    => 5,
                    'dots'              => false,
                    'arrows'            => true,
                    'autoplay'          => false,
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            if( is_rtl() ) {
                $args ['carousel_args']['rtl'] = true;
            }
            extract( $args );

            $section_class = 'home-section section-tv-shows-carousel-nav-header';

            $shortcode_atts['columns'] = $carousel_args['slidesToShow'];

            $carousel_args['responsive'] = apply_filters( 'vodi_section_tv_shows_carousel_nav_header_responsive_carousel_args', array(
                array(
                    'breakpoint'    => 768,
                    'settings'      => array(
                        'slidesToShow'      => 1,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 992,
                    'settings'      => array(
                        'slidesToShow'      => 3,
                        'slidesToScroll'    => 1
                    )
                ),
                array(
                    'breakpoint'    => 1200,
                    'settings'      => array(
                        'slidesToShow'      => 4,
                        'slidesToScroll'    => 1
                    )
                ),
            ) );

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            $section_id = 'section-tv-shows-carousel-nav-header-' . uniqid();

            ?><section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="section-tv-shows-carousel-nav-header__inner">
                        <?php if ( ! empty ( $section_title ) ) {
                            echo '<header class="home-section__header home-section__nav-header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="home-section__title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_nav_links ) ) {
                                    echo '<ul class="nav">';
                                        $i = 0;
                                        $nav_count = count( $section_nav_links );
                                        foreach ( $section_nav_links as $section_nav_link ) {
                                            if( $i < 1 && $nav_count > 1 ) {
                                                $active = ' active';
                                                $i++;
                                            } else {
                                                $active = '';
                                            }
                                            if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                                echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                            }
                                        }
                                    echo '</ul>';
                                }
                            echo '</header>';
                        } ?>

                        <div class="section-tv-shows-carousel-nav-header__carousel">
                            <div class="tv-shows-carousel__inner" data-ride="vodi-slick-carousel" data-wrap=".tv-shows__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                                    <?php echo vodi_do_shortcode( 'mas_tv_shows', $shortcode_atts ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_episodes_with_featured_episode' ) ) {
    function vodi_episodes_with_featured_episode( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_episodes_with_featured_episode_default_args', array(
                'section_title'         => '',
                'section_nav_links'     => array(),
                'section_background'    => '',
                'bg_image'              => '',
                'section_style'         => '',
                'el_class'              => '',
                'design_options'        => array(),
                'feature_episode_id'      => '',
                'shortcode_atts'        => array(
                    'columns'               => '3',
                    'limit'                 => '6',
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            $section_class = 'home-section home-section-episodes-with-featured-episode';

            if ( !empty ( $section_background ) ) {
                $section_class .= ' has-bg-color ' . $section_background;
            }

            if ( !empty ( $section_style ) ) {
                $section_class .= ' ' . $section_style;
            }

            if ( !empty ( $el_class ) ) {
                $section_class .= ' ' . $el_class;
            }

            $featured_shortcode_atts = array(
                'columns'   => 1,
                'limit'     => 1,
                'ids'       => $feature_episode_id,
            );

            if( intval( $shortcode_atts['columns'] ) > 1) {
                $shortcode_atts['limit'] = intval( $shortcode_atts['columns'] ) * 2;
            } else {
                $shortcode_atts['limit'] = 1;
            }

            $style_attr = '';

            if ( ! empty( $design_options ) && is_array( $design_options ) ) {
                foreach ( $design_options as $key => $design_option ) {
                    if ( !empty ( $design_option ) ) {
                        $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                    }
                }
            }

            if( ! empty( $bg_image ) && ! is_array( $bg_image ) ) {
                $bg_image = wp_get_attachment_image_src( $bg_image, 'full' );
            }

            if ( ! empty( $bg_image ) && is_array( $bg_image ) ) {
                $style_attr .= 'background-image: url( ' . esc_url( $bg_image[0] ) . ' );';
            }

            ?><section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="home-section__inner  home-section-episodes-with-featured-episode__inner">
                        <?php if ( ! empty ( $section_title ) ) {
                            echo '<header class="home-section__flex-header">';
                                if ( ! empty ( $section_title ) ) {
                                    echo '<h2 class="section-title">' . wp_kses_post( $section_title ) . '</h2>';
                                }
                                if ( ! empty ( $section_nav_links ) ) {
                                    echo '<ul class="nav nav-tabs">';
                                        $i = 0;
                                        $nav_count = count( $section_nav_links );
                                        foreach ( $section_nav_links as $section_nav_link ) {
                                            if( $i < 1 && $nav_count > 1 ) {
                                                $active = ' active';
                                                $i++;
                                            } else {
                                                $active = '';
                                            }
                                            if( ! empty ( $section_nav_link['title'] ) && ! empty ( $section_nav_link['link'] ) ) {
                                                echo '<li class="nav-item"><a class="nav-link' . esc_attr( $active ) . '" href="' . esc_url( $section_nav_link['link'] ) . '">' . esc_html( $section_nav_link['title'] ) . '</a></li>';
                                            }
                                        }
                                    echo '</ul>';
                                }
                            echo '</header>';
                        } ?>
                        <div class="episodes-with-featured-episode__1-<?php echo esc_attr( $shortcode_atts['limit'] ); ?>-block">
                            <?php echo vodi_do_shortcode( 'mas_episodes', $featured_shortcode_atts ); ?>
                            <?php echo vodi_do_shortcode( 'mas_episodes', $shortcode_atts ); ?>
                        </div>
                    </div>
                </div>
            </section><?php
        }
    }
}