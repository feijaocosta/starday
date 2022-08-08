<?php

if ( ! function_exists( 'vodi_landing_hero_banner' ) ) {
    function vodi_landing_hero_banner( $args = array() ) {
        $defaults = apply_filters( 'vodi_landing_hero_banner_default_args', array(
            'banner_title'      => esc_html__( '', 'vodi' ),
            'banner_desc'       => esc_html__( '', 'vodi' ),
            'banner_bg_image'   => array( '', '2230', '1370' ),
            'action_text'       => esc_html__( '', 'vodi' ),
            'action_link'       => '#',
            'action_link_new_tab' => false,
        ) );

        $args = wp_parse_args( $args, $defaults );

        extract( $args );

        $section_class = empty( $section_class ) ? 'home-section vodi-landing-hero-banner' : 'home-section vodi-landing-hero-banner ' . $section_class;

        if( ! empty( $banner_bg_image ) && ! is_array( $banner_bg_image ) ) {
            $banner_bg_image = wp_get_attachment_image_src( $banner_bg_image, 'full' );
        }

        if ( !empty ( $el_class ) ) {
            $section_class .= ' ' . $el_class;
        }
        
        $default_landing_hero_bg_color = apply_filters( 'vodi_default_landing_hero_bg_color_args', '#eee');
        $style_attr = '';

        if ( ! empty( $design_options ) && is_array( $design_options ) ) {
            foreach ( $design_options as $key => $design_option ) {
                if ( !empty ( $design_option ) ) {
                    $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                }
            }
        }

        if ( ! empty( $banner_bg_image ) && is_array( $banner_bg_image ) ) {
            $style_attr = 'background-image: url( ' . esc_url( $banner_bg_image[0] ) . ' );';
        } else {
            $style_attr = 'background-color:'. $default_landing_hero_bg_color . ';';
        }

        ?>
        <section class="<?php echo esc_attr( $section_class ); ?>"<?php if ( !empty( $style_attr ) ) : ?> style="<?php echo esc_attr( $style_attr );?>"<?php endif; ?>>
            <div class="container">
                <div class="vodi-landing-hero-banner__inner">
                    <?php if( ! empty( $banner_title ) || ! empty( $banner_desc ) || ( ! empty( $action_link ) && ! empty( $action_text ) ) ) { ?>
                        <div class="vodi-landing-hero-banner__caption"><?php
                        if( ! empty( $banner_title ) ) {?>
                            <h2 class="vodi-landing-hero-banner__caption--title"><?php echo esc_html( $banner_title ); ?></h2><?php
                        }
                        if( ! empty( $banner_desc ) ) {?>
                            <p class="vodi-landing-hero-banner__caption--desc"><?php echo wp_kses_post( $banner_desc );?></p><?php
                        }
                        if( ! empty( $action_link ) && ! empty( $action_text ) ) {?>
                            <div class="vodi-landing-hero-banner__caption--action"><a href="<?php echo esc_url( $action_link ); ?>" class="vodi-landing-hero-banner__btn-action" <?php if( $action_link_new_tab ) { echo 'target="_blank"'; } ?>><?php echo wp_kses_post( $action_text ); ?></a></div><?php
                        }?>
                        </div><?php
                    } ?>
                </div>
            </div>
        </section><?php
    }
}

if ( ! function_exists( 'vodi_landing_featured_section' ) ) {
    function vodi_landing_featured_section( $args = array() ) {
        $defaults = apply_filters( 'vodi_landing_featured_section_default_args', array(
            'section_title'           => esc_html__( '', 'vodi' ),
            'section_subtitle'        => esc_html__( '', 'vodi' ),
            'section_desc'            => esc_html__( '', 'vodi' ),
            'featured_bg_image'       => array( '', '2230', '1370' ),
            'action_text'             => esc_html__( '', 'vodi' ),
            'action_link'             => '#',
            'featured_image_label'    => esc_html__( '', 'vodi' ),
        ) );

        $args = wp_parse_args( $args, $defaults );

        extract( $args );

        $section_class = empty( $section_class ) ? 'home-section vodi-landing-featured-section' : 'home-section vodi-landing-featured-section' . $section_class;

        if( ! empty( $featured_bg_image ) && ! is_array( $featured_bg_image ) ) {
            $featured_bg_image = wp_get_attachment_image_src( $featured_bg_image, 'full' );
        }

        if ( !empty ( $el_class ) ) {
            $section_class .= ' ' . $el_class;
        }

        $default_landing_featured_bg_color = apply_filters( 'vodi_default_landing_featured_bg_color_args', '#f5f5f5');
        $style_attr = '';

        if ( ! empty( $design_options ) && is_array( $design_options ) ) {
            foreach ( $design_options as $key => $design_option ) {
                if ( !empty ( $design_option ) ) {
                    $style_attr .= str_replace ( '_', '-', $key ) . ': ' . $design_option . 'px; ';
                }
            }
        }

        if ( ! empty( $featured_bg_image ) && is_array( $featured_bg_image ) ) {
            $style_attr = 'background-image: url( ' . esc_url( $featured_bg_image[0] ) . ' );';
        } else {
            $style_attr = 'background-color:'. $default_landing_featured_bg_color . ';';
        }

        ?>
        <section class="<?php echo esc_attr( $section_class ); ?>"<?php if ( !empty( $style_attr ) ) : ?> style="<?php echo esc_attr( $style_attr );?>"<?php endif; ?>>
            <div class="container">
                <div class="vodi-landing-featured-section__inner">
                    <?php 
                    if( ! empty( $section_title ) || ! empty( $section_desc ) || ( ! empty( $action_link ) && ! empty( $action_text ) ) ) { ?>
                        <div class="vodi-landing-featured-section__caption"><?php
                        if( ! empty( $section_title ) ) {?>
                            <h2 class="vodi-landing-featured-section__caption--title"><?php echo esc_html( $section_title ); ?></h2><?php
                        }
                        if( ! empty( $section_subtitle ) ) {?>
                            <p class="vodi-landing-featured-section__caption--subtitle"><?php echo esc_html( $section_subtitle ); ?></p><?php
                        }
                        if( ! empty( $section_desc ) ) {?>
                            <p class="vodi-landing-featured-section__caption--desc"><?php echo wp_kses_post( $section_desc ); ?></p><?php
                        }
                        if( ! empty( $action_link ) && ! empty( $action_text ) ) {?>
                            <div class="vodi-landing-featured-section__caption--action"><a href="<?php echo esc_url( $action_link ); ?>" class="vodi-landing-featured-section__btn-action landing-btn-secondary"><?php echo wp_kses_post( $action_text );?></a></div><?php
                        }?>
                        </div><?php 
                    }
                    if( ! empty( $featured_image ) && ! empty( $featured_image_label ) ) { ?>
                        <div class="vodi-landing-featured-section__featured-image"><div class="vodi-landing-featured-section__featured-image--inner"><?php
                        if( ! empty( $featured_image ) ) {
                            echo wp_get_attachment_image( $featured_image, array('440', '440') );
                        }
                        if( ! empty( $featured_image_label ) ) {?>
                            <p class="vodi-landing-featured-section__featured-thumbnail--label"><span>
                                <?php echo wp_kses_post( $featured_image_label ); ?>
                            </span></p></div><?php
                        }?>
                        </div><?php
                    }
                    ?>
                </div>
            </div>
        </section><?php
    }
}

if ( ! function_exists( 'vodi_landing_movies_carousel' ) ) {
    function vodi_landing_movies_carousel( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_landing_movies_carousel_default_args', array(
                'section_title'         => esc_html__( '', 'vodi' ),
                'section_subtitle'      => esc_html__( '', 'vodi' ),
                'action_text'           => esc_html__( '', 'vodi' ),
                'action_link'           => '#',
                'el_class'              => '',
                'design_options'        => array(),
                'shortcode_atts'        => array(
                    'columns'               => '6',
                    'limit'                 => '15',
                ),
                'carousel_args'         => array(
                    'slidesToShow'          => 6,
                    'slidesToScroll'        => 6,
                    'dots'                  => true,
                    'arrows'                => true,
                    'autoplay'              => false,
                ),
            ) );

            $args = wp_parse_args( $args, $defaults );
            if( is_rtl() ) {
                $args ['carousel_args']['rtl'] = true;
            }
            extract( $args );

            $section_class = 'home-section landing-movies-carousel';

            $shortcode_atts['columns'] = $carousel_args['slidesToShow'];

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

            $section_id = 'landing-movies-carousel-' . uniqid();
            $carousel_args['appendArrows'] = '#' . $section_id . ' .landing-movies-carousel__custom-arrows';

            ?><section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="landing-movies-carousel__inner">
                    <?php if ( ! empty ( $section_title ) || ! empty ( $section_subtitle ) ) {
                        if ( ! empty ( $section_title ) ) {?>
                            <h2 class="landing-movies-carousel__title"><?php echo wp_kses_post( $section_title ); ?></h2><?php
                        }
                        if ( ! empty ( $section_subtitle ) ) {?>
                            <p class="landing-movies-carousel__subtitle"><?php echo wp_kses_post( $section_subtitle ); ?></p><?php
                        }
                        ?>
                        <div class="landing-movies-carousel__carousel">
                            <div class="landing-movies-carousel__carousel--inner" data-ride="vodi-slick-carousel" data-wrap=".movies__inner" data-slick="<?php echo htmlspecialchars( json_encode( $carousel_args ), ENT_QUOTES, 'UTF-8' ); ?>">
                                    <?php echo vodi_do_shortcode( 'mas_movies', $shortcode_atts ); ?>
                            </div>
                        </div>
                        <?php
                        if( ! empty( $action_link ) && ! empty( $action_text ) ) {?>
                            <div class="landing-movies-carousel__action"><a href="<?php echo esc_url( $action_link ); ?>" class="landing-movies-carousel__btn-action landing-btn-secondary"><?php echo wp_kses_post( $action_text ); ?></a></div><?php
                        }
                    } ?>
                </div>
            </section><?php
        }
    }
}

if ( ! function_exists( 'vodi_landing_tabs_features' ) ) {
    function vodi_landing_tabs_features( $args = array() ) {
        $defaults = apply_filters( 'vodi_landing_tabs_features_default_args', array(
            'tab_args'          => array(),
            'design_options'    => array(),
            'el_class'          => '',
            'action_text'       => esc_html__( '', 'vodi' ),
            'action_link'       => '#',
        ) );

        $args = wp_parse_args( $args, $defaults );
        extract( $args );

        $section_class = 'home-section landing-tabs-features';

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

        $default_active_tab = empty( $default_active_tab ) ? 0 : $default_active_tab;
        $tab_uniqid = 'tab-' . uniqid();
        $active_class = ' active show';
        if ( !empty( $tab_args ) ) { ?>
            <section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
                <div class="container">
                    <div class="landing-tabs-features__inner">
                        <div class="landing-tabs-features__tab-links"><ul class="nav"><?php
                            foreach ( $tab_args as $key => $tab_arg ) {
                                $tab_id = $tab_uniqid . $key;?>
                                <li class="nav-item"><a href="#<?php echo esc_attr( $tab_id  ); ?>" data-toggle="tab" class="nav-link<?php echo ( ( $key == $default_active_tab ) ? esc_attr( $active_class ) : "" ); ?>"><?php
                                    if ( isset( $tab_arg['icon_arg_class'] ) && !empty( $tab_arg['icon_arg_class'] ) ) {?>
                                        <i class="<?php echo esc_attr( $tab_arg["icon_arg_class"] ); ?>"></i><?php
                                    }?>
                                    <span><?php echo esc_html( $tab_arg['tab_title'] ); ?></span></a></li><?php
                            }
                        ?></ul></div>

                        <div class="tab-content"><?php
                            foreach ( $tab_args as $key => $tab_arg ) {
                                $tab_id = $tab_uniqid . $key;?>
                                <div id="<?php echo esc_attr( $tab_id ); ?>" class="tab-pane<?php echo ( ( $key == $default_active_tab ) ? esc_attr( $active_class ) : "" ); ?>"><?php
                                    echo wp_kses_post( $tab_arg['tab_content'] );?>
                                </div><?php
                            }?>
                        </div><?php
                        if( ! empty( $action_link ) && ! empty( $action_text ) ) {?>
                            <div class="landing-tabs-features__action"><a href="<?php echo esc_url( $action_link ); ?>" class="landing-tabs-features__btn-action"><?php echo wp_kses_post( $action_text ); ?></a></div><?php
                        }?>
                    </div>
                </div>
            </section>
        <?php }
    }
}

if ( ! function_exists( 'vodi_landing_featured_video' ) ) {
    function vodi_landing_featured_video( $args = array() ) {
        if( vodi_is_masvideos_activated() ) {
            $defaults = apply_filters( 'vodi_landing_featured_video_default_args', array(
                'section_title'                 => esc_html__( '', 'vodi' ),
                'section_subtitle'              => esc_html__( '', 'vodi' ),
                'video_id'                      => '',
                'videos_shortcode'              => 'mas_videos',
                'image'                         => '',
                'bg_image'                      => array( '', '2230', '1370' ),
                'el_class'                      => '',
                'design_options'                => array(),
            ) );

            $args = wp_parse_args( $args, $defaults );
            extract( $args );

            if( !empty( $video_id ) ) {
                $video = masvideos_get_video( $video_id );
                $section_class = 'home-section landing-featured-video';

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
                        <div class="landing-featured-video__inner">
                            <?php if ( ! empty ( $section_title ) || ! empty ( $section_subtitle ) ) {?>
                                <header class="landing-featured-video__header"><?php
                                    if ( ! empty ( $section_title ) ) {?>
                                        <h2 class="landing-featured-video__title"><?php echo wp_kses_post( $section_title ); ?></h2><?php
                                    }
                                    if ( ! empty ( $section_subtitle ) ) {?>
                                        <p class="landing-featured-video__subtitle"><?php echo wp_kses_post( $section_subtitle ); ?></p><?php
                                    }?>
                                </header><?php
                            }?>
                            <div class="landing-featured-video__image">
                                <?php if ( ! empty( $image ) ) {
                                    echo wp_get_attachment_image( $image, 'full', '', array( "class" => "landing-featured-video__thumbnail" ) );
                                }?>
                                <a href="<?php echo esc_url( get_permalink( $video_id ) ); ?>" ></a>
                            </div>
                        </div>
                    </div>
                </section><?php
            }
        }
    }
}

if ( ! function_exists( 'vodi_landing_features_list' ) ) {
    function vodi_landing_features_list( $args = array() ) {
        $defaults = apply_filters( 'vodi_landing_features_list_default_args', array(
            'section_title'      => esc_html__( 'Westworld', 'vodi' ),
            'features_args'      => array(),
            'bg_image'           => array( '//placehold.it/2230x1370', '2230', '1370' ),
        ) );

        $args = wp_parse_args( $args, $defaults );

        extract( $args );

        $section_class = 'home-section landing-features-list';

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

        ?><section class="<?php echo esc_attr( $section_class ); ?>"<?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
            <div class="container">
                <div class="landing-features-list__inner">
                    <?php if ( ! empty ( $section_title ) ) {
                    ?><div class="landing-features-list__caption">
                        <h2 class="landing-features-list__title"><?php echo wp_kses_post( $section_title ); ?></h2>
                    </div><?php
                    }   
                    ?><div class="landing-features-list__content">
                        <ul class="features">
                            <?php foreach ( $features_args as $features_arg ) {
                                ?><li class="feature"> 
                                   <?php if( ! empty ( $features_arg['title'] ) && ! empty ( $features_arg['icon_class'] ) ) {
                                        ?><div class="feature__title">
                                            <?php echo vodi_sanitize_textarea_svg( $features_arg['icon_class'] ); ?>
                                            <span><?php echo wp_kses_post( $features_arg['title'] ); ?></span>
                                        </div><?php
                                    } ?>
                                    <?php if( ! empty ( $features_arg['desc'] ) ) {
                                        ?><div class="feature__desc">
                                            <p><?php echo wp_kses_post( $features_arg['desc'] ); ?></p>
                                        </div><?php
                                    } ?>
                                </li><?php
                            }?>
                        </ul>
                    </div>
                </div>
            </div>
        </section><?php
    }
}

if ( ! function_exists( 'vodi_landing_viewcounts_section' ) ) {
    function vodi_landing_viewcounts_section( $args = array() ) {
        $defaults = apply_filters( 'vodi_landing_viewcounts_section_default_args', array(
            'count'          => '',
            'desc'           => esc_html__( '', 'vodi' ),
            'bg_image'       => array( '//placehold.it/2230x1370', '2230', '1370' ),
            'el_class'       => '',
        ) );

        $args = wp_parse_args( $args, $defaults );
        extract( $args );

        $section_class = 'home-section landing-view-counts';

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

        ?>

        <section class="<?php echo esc_attr( $section_class ); ?>" <?php echo !empty ( $style_attr ) ? ' style="' . esc_attr( $style_attr ) . '"' : ''; ?>>
            <div class="container">
                <div class="landing-view-counts__content">
                    <h3 class="landing-view-counts__count"><?php echo wp_kses_post( $count ); ?></h3>
                    <p class="landing-view-counts__desc"><?php echo wp_kses_post( $desc ); ?></p>
                </div>
            </div>
        </section><?php
    }
}