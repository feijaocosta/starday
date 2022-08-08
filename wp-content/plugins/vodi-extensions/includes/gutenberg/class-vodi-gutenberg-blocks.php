<?php
/**
 * Gutenberg Blocks
 *
 * @package Vodi/Classes
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

if( ! class_exists( 'Vodi_Gutenberg_Blocks' ) ) :

/**
 * Vodi Gutenberg Blocks class.
 */
class Vodi_Gutenberg_Blocks {

    /**
     * Init blocks.
     */
    public static function init() {
        if( function_exists( 'register_block_type' ) ) {
            $blocks = array(
                'comingsoon-launch-section'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_desc' => array(
                            'type'      => 'string',
                        ),
                        'form_shortcode' => array(
                            'type'      => 'string',
                        ),
                        'action_text' => array(
                            'type'      => 'string',
                        ),
                        'placehold_text' => array(
                            'type'      => 'string',
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-comingsoon-launch-section',
                    'editor_style'      => 'vodi-comingsoon-launch-section-editor',
                    'style'             => 'vodi-comingsoon-launch-section',
                    'render_callback'   => 'vodi_comingsoon_launch_section_element',
                ),
                'landing-viewcounts-section'    => array(
                    'attributes'        => array(
                        'count' => array(
                            'type'      => 'string',
                        ),
                        'desc' => array(
                            'type'      => 'string',
                        ),
                        'bg_image'  => array(
                            'type'      => 'number',
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-landing-viewcounts-section',
                    'editor_style'      => 'vodi-landing-viewcounts-section-editor',
                    'style'             => 'vodi-landing-viewcounts-section',
                    'render_callback'   => 'vodi_landing_viewcounts_section_element',
                ),
                'faq-section'    => array(
                    'attributes'        => array(
                        'faq_args'=> array(
                            'type'      => 'string',
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-faq-section',
                    'editor_style'      => 'vodi-faq-section-editor',
                    'style'             => 'vodi-faq-section',
                    'render_callback'   => 'vodi_faq_section_element',
                ),
                'landing-features-list'    => array(
                    'attributes'        => array(
                        'features_args'=> array(
                            'type'      => 'string',
                        ),
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'bg_image'  => array(
                            'type'      => 'number',
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-landing-features-list',
                    'editor_style'      => 'vodi-landing-features-list-editor',
                    'style'             => 'vodi-landing-features-list',
                    'render_callback'   => 'vodi_landing_features_list_element',
                ),
                'landing-featured-video'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_subtitle' => array(
                            'type'      => 'string',
                        ),
                        'video_id'=> array(
                            'type'      => 'string',
                        ),
                        'image'  => array(
                            'type'      => 'number',
                        ),
                        'bg_image'  => array(
                            'type'      => 'number',
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-landing-featured-video',
                    'editor_style'      => 'vodi-landing-featured-video-editor',
                    'style'             => 'vodi-landing-featured-video',
                    'render_callback'   => 'vodi_landing_featured_video_element',
                ),
                'landing-tabs-features'    => array(
                    'attributes'        => array(
                        'tab_args'=> array(
                            'type'          => 'string',
                        ),
                        'action_text'=> array(
                            'type'          => 'string',
                        ),
                        'action_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-landing-tabs-features',
                    'editor_style'      => 'vodi-landing-tabs-features-editor',
                    'style'             => 'vodi-landing-tabs-features',
                    'render_callback'   => 'vodi_landing_tabs_features_element',
                ),
                'landing-movies-carousel'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_subtitle' => array(
                            'type'      => 'string',
                        ),
                        'action_text'=> array(
                            'type'          => 'string',
                        ),
                        'action_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 15,
                                'columns'       => 6,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'carousel_args' => array(
                            'type'      => 'object',
                            'default'   => array(
                                'slidesToShow'  => 6,
                                'slidesToScroll'=> 6,
                                'dots'          => false,
                                'arrows'        => true,
                                'autoplay'      => false,
                                'infinite'      => false,
                                'responsive'        => array(
                                    array(
                                        'breakpoint'    => 767,
                                        'settings'      => array(
                                            'slidesToShow'      => 1,
                                            'slidesToScroll'    => 1
                                        )
                                    ),
                                    array(
                                        'breakpoint'    => 992,
                                        'settings'      => array(
                                            'slidesToShow'      => 2,
                                            'slidesToScroll'    => 2
                                        )
                                    ),
                                    array(
                                        'breakpoint'    => 1200,
                                        'settings'      => array(
                                            'slidesToShow'      => 2,
                                            'slidesToScroll'    => 2
                                        )
                                    ),
                                ),
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-landing-movies-carousel',
                    'editor_style'      => 'vodi-landing-movies-carousel-editor',
                    'style'             => 'vodi-landing-movies-carousel',
                    'render_callback'   => 'vodi_landing_movies_carousel_element',
                ),
                'landing-featured-section'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_subtitle' => array(
                            'type'         => 'string',
                        ),
                        'section_desc'  => array(
                            'type'      => 'string',
                        ),
                        'featured_bg_image'  => array(
                            'type'           => 'number',
                        ),
                        'action_text'  => array(
                            'type'     => 'string',
                        ),
                        'action_link'       => array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'featured_image'  => array(
                            'type'        => 'number',
                        ),
                        'featured_image_label'  => array(
                            'type'              => 'string',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-landing-featured-section',
                    'editor_style'      => 'vodi-landing-featured-section-editor',
                    'style'             => 'vodi-landing-featured-section',
                    'render_callback'   => 'vodi_landing_featured_section_element',
                ),
                'landing-hero-banner'    => array(
                    'attributes'        => array(
                        'banner_title' => array(
                            'type'      => 'string',
                        ),
                        'banner_desc' => array(
                            'type'      => 'string',
                        ),
                        'banner_bg_image'  => array(
                            'type'      => 'number',
                        ),
                        'action_text'=> array(
                            'type'          => 'string',
                        ),
                        'action_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'action_link_new_tab'   => array(
                            'type'      => 'boolean',
                            'default'   => false,
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-landing-hero-banner',
                    'editor_style'      => 'vodi-landing-hero-banne-editor',
                    'style'             => 'vodi-landing-hero-banner',
                    'render_callback'   => 'vodi_landing_hero_banner_element',
                ),
                'section-full-width-banner'    => array(
                    'attributes'        => array(
                        'banner_image'  => array(
                            'type'      => 'number',
                        ),
                        'banner_link'   => array(
                            'type'      => 'string',
                        ),
                        'banner_link_new_tab'   => array(
                            'type'      => 'boolean',
                            'default'   => false,
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-section-full-width-banner',
                    'editor_style'      => 'vodi-section-full-width-banner-editor',
                    'style'             => 'vodi-section-full-width-banner',
                    'render_callback'   => 'vodi_section_full_width_banner_element',
                ),
                'video-section'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'section_style'=> array(
                            'type'      => 'string',
                        ),
                        'footer_action_text'=> array(
                            'type'          => 'string',
                        ),
                        'footer_action_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 10,
                                'columns'       => 4,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-video-section',
                    'editor_style'      => 'vodi-video-section-editor',
                    'style'             => 'vodi-video-section',
                    'render_callback'   => 'vodi_video_section_element',
                ),
                'tv-show-section'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'section_style'=> array(
                            'type'      => 'string',
                        ),
                        'footer_action_text'=> array(
                            'type'          => 'string',
                        ),
                        'footer_action_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'footer_view_more_text'=> array(
                            'type'          => 'string',
                        ),
                        'footer_view_more_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 2,
                                'columns'       => 2,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-tv-show-section',
                    'editor_style'      => 'vodi-tv-show-section-editor',
                    'style'             => 'vodi-tv-show-section',
                    'render_callback'   => 'vodi_tv_show_section_element',
                ),
                'hot-premieres-block'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'hide_movie_title'  => array(
                            'type'      => 'boolean',
                            'default'   => true,
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 4,
                                'columns'       => 4,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-hot-premieres-block',
                    'editor_style'      => 'vodi-hot-premieres-block-editor',
                    'style'             => 'vodi-hot-premieres-block',
                    'render_callback'   => 'vodi_hot_premieres_block_element',
                ),
                'movie-section-aside-header'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_subtitle' => array(
                            'type'      => 'string',
                        ),
                        'action_text'=> array(
                            'type'          => 'string',
                        ),
                        'action_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'section_style'=> array(
                            'type'      => 'string',
                        ),
                        'footer_view_more_text'=> array(
                            'type'          => 'string',
                        ),
                        'footer_view_more_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 12,
                                'columns'       => 7,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-movie-section-aside-header',
                    'editor_style'      => 'vodi-movie-section-aside-header-editor',
                    'style'             => 'vodi-movie-section-aside-header',
                    'render_callback'   => 'vodi_movie_section_aside_header_element',
                ),
                'video-section-aside-header'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_subtitle' => array(
                            'type'      => 'string',
                        ),
                        'action_text'=> array(
                            'type'          => 'string',
                        ),
                        'action_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'section_style'=> array(
                            'type'      => 'string',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 11,
                                'columns'       => 6,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-video-section-aside-header',
                    'editor_style'      => 'vodi-video-section-aside-header-editor',
                    'style'             => 'vodi-video-section-aside-header',
                    'render_callback'   => 'vodi_video_section_aside_header_element',
                ),
                'section-movies-carousel-aside-header'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_subtitle' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'action_text'=> array(
                            'type'          => 'string',
                        ),
                        'action_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'header_posisition'=> array(
                            'type'      => 'string',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'section_style'=> array(
                            'type'      => 'string',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 15,
                                'columns'       => 6,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'carousel_args' => array(
                            'type'      => 'object',
                            'default'   => array(
                                'slidesToShow'  => 6,
                                'slidesToScroll'=> 6,
                                'dots'          => false,
                                'arrows'        => true,
                                'autoplay'      => false,
                                'infinite'      => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-section-movies-carousel-aside-header',
                    'editor_style'      => 'vodi-section-movies-carousel-aside-header-editor',
                    'style'             => 'vodi-section-movies-carousel-aside-header',
                    'render_callback'   => 'vodi_section_movies_carousel_aside_header_element',
                ),
                'section-videos-carousel-aside-header'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_subtitle' => array(
                            'type'      => 'string',
                        ),
                        'action_text'=> array(
                            'type'          => 'string',
                        ),
                        'action_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'header_posisition'=> array(
                            'type'      => 'string',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'section_style'=> array(
                            'type'      => 'string',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 15,
                                'columns'       => 4,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'carousel_args' => array(
                            'type'      => 'object',
                            'default'   => array(
                                'slidesToShow'  => 4,
                                'slidesToScroll'=> 4,
                                'dots'          => false,
                                'arrows'        => true,
                                'autoplay'      => false,
                                'infinite'      => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-section-videos-carousel-aside-header',
                    'editor_style'      => 'vodi-section-videos-carousel-aside-header-editor',
                    'style'             => 'vodi-section-videos-carousel-aside-header',
                    'render_callback'   => 'vodi_section_videos_carousel_aside_header_element',
                ),
                'section-movies-carousel-nav-header'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'section_style'=> array(
                            'type'      => 'string',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 15,
                                'columns'       => 7,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'carousel_args' => array(
                            'type'      => 'object',
                            'default'   => array(
                                'slidesToShow'  => 7,
                                'slidesToScroll'=> 7,
                                'dots'          => false,
                                'arrows'        => true,
                                'autoplay'      => false,
                                'infinite'      => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-section-movies-carousel-nav-header',
                    'editor_style'      => 'vodi-section-movies-carousel-nav-header-editor',
                    'style'             => 'vodi-section-movies-carousel-nav-header',
                    'render_callback'   => 'vodi_section_movies_carousel_nav_header_element',
                ),
                'section-videos-carousel-nav-header'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 15,
                                'columns'       => 5,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'carousel_args' => array(
                            'type'      => 'object',
                            'default'   => array(
                                'slidesToShow'  => 5,
                                'slidesToScroll'=> 5,
                                'dots'          => false,
                                'arrows'        => true,
                                'autoplay'      => false,
                                'infinite'      => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-section-videos-carousel-nav-header',
                    'editor_style'      => 'vodi-section-videos-carousel-nav-header-editor',
                    'style'             => 'vodi-section-videos-carousel-nav-header',
                    'render_callback'   => 'vodi_section_videos_carousel_nav_header_element',
                ),
                'section-movies-carousel-flex-header'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'section_style'=> array(
                            'type'      => 'string',
                        ),
                        'footer_action_text'=> array(
                            'type'          => 'string',
                        ),
                        'footer_action_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 15,
                                'columns'       => 6,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'carousel_args' => array(
                            'type'      => 'object',
                            'default'   => array(
                                'slidesToShow'  => 6,
                                'slidesToScroll'=> 6,
                                'dots'          => false,
                                'arrows'        => true,
                                'autoplay'      => false,
                                'infinite'      => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-section-movies-carousel-flex-header',
                    'editor_style'      => 'vodi-section-movies-carousel-flex-header-editor',
                    'style'             => 'vodi-section-movies-carousel-flex-header',
                    'render_callback'   => 'vodi_section_movies_carousel_flex_header_element',
                ),
                'section-videos-carousel-flex-header'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'footer_view_more_text'=> array(
                            'type'          => 'string',
                        ),
                        'footer_view_more_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'section_style'=> array(
                            'type'      => 'string',
                        ),
                        'footer_action_text'=> array(
                            'type'          => 'string',
                        ),
                        'footer_action_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 15,
                                'columns'       => 5,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'carousel_args' => array(
                            'type'      => 'object',
                            'default'   => array(
                                'slidesToShow'  => 5,
                                'slidesToScroll'=> 5,
                                'dots'          => false,
                                'arrows'        => true,
                                'autoplay'      => false,
                                'infinite'      => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-section-videos-carousel-flex-header',
                    'editor_style'      => 'vodi-section-videos-carousel-flex-header-editor',
                    'style'             => 'vodi-section-videos-carousel-flex-header',
                    'render_callback'   => 'vodi_section_videos_carousel_flex_header_element',
                ),
                'section-featured-post' => array(
                    'attributes'        => array(
                        'post_id'   => array(
                            'type'      => 'string',
                        ),
                        'bg_image'  => array(
                            'type'      => 'number',
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'section-featured-post',
                    'editor_style'      => 'section-featured-post-editor',
                    'style'             => 'section-featured-post',
                    'render_callback'   => 'vodi_section_featured_post_element',
                ),
                'videos-with-featured-video'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'bg_image'  => array(
                            'type'      => 'number',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'footer_view_more_text'=> array(
                            'type'          => 'string',
                        ),
                        'footer_view_more_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'section_style'=> array(
                            'type'      => 'string',
                        ),
                        'header_style'  => array(
                            'type'      => 'string',
                        ),
                        'feature_video_id'=> array(
                            'type'      => 'string',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 6,
                                'columns'       => 3,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-videos-with-featured-video',
                    'editor_style'      => 'videos-with-featured-video-editor',
                    'style'             => 'videos-with-featured-video',
                    'render_callback'   => 'vodi_videos_with_featured_video_element',
                ),
                'featured-movies-carousel'    => array(
                    'attributes'        => array(
                        'feature_movie_pre_title' => array(
                            'type'      => 'string',
                        ),
                        'feature_movie_title' => array(
                            'type'      => 'string',
                        ),
                        'feature_movie_subtitle' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'section_style'=> array(
                            'type'      => 'string',
                        ),
                        'bg_image'  => array(
                            'type'      => 'number',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 15,
                                'columns'       => 8,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'carousel_args' => array(
                            'type'      => 'object',
                            'default'   => array(
                                'slidesToShow'  => 8,
                                'slidesToScroll'=> 8,
                                'dots'          => false,
                                'arrows'        => true,
                                'autoplay'      => false,
                                'infinite'      => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-featured-movies-carousel',
                    'editor_style'      => 'vodi-featured-movies-carousel-editor',
                    'style'             => 'vodi-featured-movies-carousel',
                    'render_callback'   => 'vodi_featured_movies_carousel_element',
                ),
                'section-featured-movie'    => array(
                    'attributes'        => array(
                        'feature_movie_action_icon' => array(
                            'type'      => 'string',
                        ),
                        'movie_id'=> array(
                            'type'      => 'string',
                        ),
                        'image'  => array(
                            'type'      => 'number',
                        ),
                        'bg_image'  => array(
                            'type'      => 'number',
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-section-featured-movie',
                    'editor_style'      => 'vodi-section-featured-movie-editor',
                    'style'             => 'vodi-section-featured-movie',
                    'render_callback'   => 'vodi_section_featured_movie_element',
                ),
                'section-featured-tv-show'    => array(
                    'attributes'        => array(
                        'tv_show_id' => array(
                            'type'      => 'string',
                        ),
                        'bg_image' => array(
                            'type'      => 'number',
                        ),
                        'bg_light' => array(
                            'type'      => 'boolean',
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-section-featured-tv-show',
                    'editor_style'      => 'vodi-section-featured-tv-show-editor',
                    'style'             => 'vodi-section-featured-tv-show',
                    'render_callback'   => 'vodi_section_featured_tv_show_element',
                ),
                'banner-with-section-tv-shows'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'section_style'=> array(
                            'type'      => 'string',
                        ),
                        'footer_action_text'=> array(
                            'type'          => 'string',
                        ),
                        'footer_action_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'image'  => array(
                            'type'      => 'number',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 8,
                                'columns'       => 4,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-banner-with-section-tv-shows',
                    'editor_style'      => 'vodi-banner-with-section-tv-shows-editor',
                    'style'             => 'vodi-banner-with-section-tv-shows',
                    'render_callback'   => 'vodi_banner_with_section_tv_shows_element',
                ),
                'blog-list-section'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'style'         => array(
                            'type'      => 'string',
                        ),
                        'hide_excerpt'  => array(
                            'type'      => 'boolean',
                            'default'   => false,
                        ),
                        'enable_divider'=> array(
                            'type'      => 'boolean',
                            'default'   => false,
                        ),
                        'post_atts'     => array(
                            'type'      => 'object',
                            'default'   => array(
                                'posts_per_page'=> 5,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-blog-list-section',
                    'editor_style'      => 'vodi-blog-list-section-editor',
                    'style'             => 'vodi-blog-list-section',
                    'render_callback'   => 'vodi_blog_list_section_element',
                ),
                'blog-grid-section'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'style'         => array(
                            'type'      => 'string',
                        ),
                        'hide_excerpt'  => array(
                            'type'      => 'boolean',
                            'default'   => false,
                        ),
                        'columns'       => array(
                            'type'      => 'number',
                            'default'   => 5,
                        ),
                        'post_atts'     => array(
                            'type'      => 'object',
                            'default'   => array(
                                'posts_per_page'=> 5,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-blog-grid-section',
                    'editor_style'      => 'vodi-blog-grid-section-editor',
                    'style'             => 'vodi-blog-grid-section',
                    'render_callback'   => 'vodi_blog_grid_section_element',
                ),
                'blog-tab-section'    => array(
                    'attributes'        => array(
                        'tab_args'=> array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'style'         => array(
                            'type'      => 'string',
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-blog-tab-section',
                    'editor_style'      => 'vodi-blog-tab-section-editor',
                    'style'             => 'vodi-blog-tab-section',
                    'render_callback'   => 'vodi_blog_tab_section_element',
                ),
                'slider-movies'    => array(
                    'attributes'        => array(
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 3,
                                'columns'       => 3,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-slider-movies',
                    'editor_style'      => 'vodi-slider-movies-editor',
                    'style'             => 'vodi-slider-movies',
                    'render_callback'   => 'vodi_slider_movies_element',
                ),
                'section-live-videos'    => array(
                    'attributes'        => array(
                        'live_videos_title' => array(
                            'type'          => 'string',
                        ),
                        'footer_action_text' => array(
                            'type'           => 'string',
                        ),
                        'footer_action_link' => array(
                            'type'           => 'string',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 3,
                                'columns'       => 1,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-section-live-videos',
                    'editor_style'      => 'vodi-section-live-videos-editor',
                    'style'             => 'vodi-section-live-videos',
                    'render_callback'   => 'vodi_section_live_videos_element',
                ),
                'videos-slider'    => array(
                    'attributes'        => array(
                        'sliders'=> array(
                            'type'      => 'string',
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-videos-slider',
                    'editor_script_deps'=> array( 'jquery', 'slick', 'vodi-slick' ),
                    'editor_style'      => 'vodi-videos-slider-editor',
                    'style'             => 'vodi-videos-slider',
                    'render_callback'   => 'vodi_videos_slider_element',
                ),
                'movies-slider'    => array(
                    'attributes'        => array(
                        'sliders'=> array(
                            'type'      => 'string',
                        ),
                        'style'         => array(
                            'type'      => 'string',
                            'default'   => 'style-v1',
                        ),
                        'gallery_title' => array(
                            'type'      => 'string',
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-movies-slider',
                    'editor_script_deps'=> array( 'jquery', 'slick', 'vodi-slick' ),
                    'editor_style'      => 'vodi-movies-slider-editor',
                    'style'             => 'vodi-movies-slider',
                    'render_callback'   => 'vodi_movies_slider_element',
                ),
                'tv-shows-slider'    => array(
                    'attributes'        => array(
                        'sliders'=> array(
                            'type'      => 'string',
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-tv-shows-slider',
                    'editor_script_deps'=> array( 'jquery', 'slick', 'vodi-slick' ),
                    'editor_style'      => 'vodi-tv-shows-slider-editor',
                    'style'             => 'vodi-tv-shows-slider',
                    'render_callback'   => 'vodi_tv_shows_slider_element',
                ),
                'section-coming-soon-videos'    => array(
                    'attributes'        => array(
                        'coming_soon_videos_title' => array(
                            'type'                 => 'string',
                        ),
                        'footer_action_text' => array(
                            'type'           => 'string',
                        ),
                        'footer_action_link' => array(
                            'type'           => 'string',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 3,
                                'columns'       => 1,
                            ),
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-section-coming-soon-videos',
                    'editor_style'      => 'vodi-section-coming-soon-videos-editor',
                    'style'             => 'vodi-section-coming-soon-videos',
                    'render_callback'   => 'vodi_section_coming_soon_videos_element',
                ),
                'movies-list'    => array(
                    'attributes'        => array(
                        'section_title_1' => array(
                            'type'      => 'string',
                        ),
                        'section_title_2' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links_1'=> array(
                            'type'      => 'string'
                        ),
                        'section_nav_links_2'=> array(
                            'type'      => 'string'
                        ),
                        'featured_movie_id'=> array(
                            'type'      => 'string',
                        ),
                        'shortcode_atts_1'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 9,
                                'columns'       => 1,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),

                        'shortcode_atts_2'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 8,
                                'columns'       => 1,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-movies-list',
                    'editor_style'      => 'vodi-movies-list-editor',
                    'style'             => 'vodi-movies-list',
                    'render_callback'   => 'vodi_movies_list_element',
                ),
                'blog-grid-with-list-section'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'hide_excerpt_1'  => array(
                            'type'      => 'boolean',
                            'default'   => false,
                        ),
                        'hide_excerpt_2'  => array(
                            'type'      => 'boolean',
                            'default'   => true,
                        ),
                        'ids'=> array(
                            'type'      => 'string',
                        ),
                        'post_atts_2'     => array(
                            'type'      => 'object',
                            'default'   => array(
                                'posts_per_page'=> 3,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-blog-grid-with-list-section',
                    'editor_style'      => 'vodi-blog-grid-with-list-section-editor',
                    'style'             => 'vodi-blog-grid-with-list-section',
                    'render_callback'   => 'vodi_blog_grid_with_list_section_element',
                ),
                'recent-comments'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'limit'       => array(
                            'type'      => 'number',
                            'default'   => 5,
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-recent-comments',
                    'editor_style'      => 'vodi-recent-comments-editor',
                    'style'             => 'vodi-recent-comments',
                    'render_callback'   => 'vodi_recent_comments_element',
                ),
                'section-event-category-list'=> array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'columns'       => array(
                            'type'      => 'number',
                            'default'   => 4,
                        ),
                        'category_args' => array(
                            'type'      => 'object',
                            'default'   => array(
                                'number'    => 4,
                                'orderby'   => 'id',
                                'order'     => 'DESC',
                                'hide_empty'=> true,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-section-event-category-list',
                    'editor_style'      => 'vodi-section-event-category-list-editor',
                    'style'             => 'vodi-section-event-category-list',
                    'render_callback'   => 'vodi_section_event_category_list_element',
                ),
                'featured-blog-with-blog-grid-section'=> array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'bg_image'  => array(
                            'type'      => 'number',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'feature_post_id'=> array(
                            'type'      => 'string',
                        ),
                        'columns'       => array(
                            'type'      => 'number',
                            'default'   => 2,
                        ),
                        'post_atts'     => array(
                            'type'      => 'object',
                            'default'   => array(
                                'posts_per_page'=> 4,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-featured-blog-with-blog-grid-section',
                    'editor_style'      => 'vodi-featured-blog-with-blog-grid-section-editor',
                    'style'             => 'vodi-featured-blog-with-blog-grid-section',
                    'render_callback'   => 'vodi_featured_blog_with_blog_grid_section_element',
                ),
                'active-videos'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 3,
                                'columns'       => 3,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-active-videos-editor',
                    'editor_style'      => 'vodi-active-videos-editor',
                    'style'             => 'vodi-active-videos',
                    'render_callback'   => 'vodi_active_videos_element',
                ),
                'section-playlist-carousel'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'tab_args'=> array(
                            'type'      => 'string',
                        ),
                        'carousel_args' => array(
                            'type'      => 'object',
                            'default'   => array(
                                'slidesToShow'  => 5,
                                'slidesToScroll'=> 1,
                                'dots'          => false,
                                'arrows'        => true,
                                'autoplay'      => false,
                                'infinite'      => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-section-playlist-carousel-editor',
                    'editor_style'      => 'vodi-section-playlist-carousel-editor',
                    'style'             => 'vodi-section-playlist-carousel',
                    'render_callback'   => 'vodi_section_playlist_carousel_element',
                ),

                'section-tv-episodes-carousel-aside-header'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_subtitle' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'action_text'=> array(
                            'type'          => 'string',
                        ),
                        'action_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'header_posisition'=> array(
                            'type'      => 'string',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'section_style'=> array(
                            'type'      => 'string',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 15,
                                'columns'       => 6,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'carousel_args' => array(
                            'type'      => 'object',
                            'default'   => array(
                                'slidesToShow'  => 6,
                                'slidesToScroll'=> 6,
                                'dots'          => false,
                                'arrows'        => true,
                                'autoplay'      => false,
                                'infinite'      => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-section-tv-episodes-carousel-aside-header',
                    'editor_style'      => 'vodi-section-tv-episodes-carousel-aside-header-editor',
                    'style'             => 'vodi-section-tv-episodes-carousel-aside-header',
                    'render_callback'   => 'vodi_section_tv_episodes_carousel_aside_header_element',
                ),
                'section-tv-episodes-carousel-flex-header'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'section_style'=> array(
                            'type'      => 'string',
                        ),
                        'footer_action_text'=> array(
                            'type'          => 'string',
                        ),
                        'footer_action_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 15,
                                'columns'       => 6,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'carousel_args' => array(
                            'type'      => 'object',
                            'default'   => array(
                                'slidesToShow'  => 6,
                                'slidesToScroll'=> 6,
                                'dots'          => false,
                                'arrows'        => true,
                                'autoplay'      => false,
                                'infinite'      => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-section-tv-episodes-carousel-flex-header',
                    'editor_style'      => 'vodi-section-tv-episodes-carousel-flex-header-editor',
                    'style'             => 'vodi-section-tv-episodes-carousel-flex-header',
                    'render_callback'   => 'vodi_section_tv_episodes_carousel_flex_header_element',
                ),

                'tv-show-carousel'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 15,
                                'columns'       => 5,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'carousel_args' => array(
                            'type'      => 'object',
                            'default'   => array(
                                'slidesToShow'  => 5,
                                'slidesToScroll'=> 5,
                                'dots'          => true,
                                'arrows'        => false,
                                'autoplay'      => false,
                                'infinite'      => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-tv-show-carousel',
                    //'editor_style'      => 'vodi-tv-show-carousel-editor',
                    //'style'             => 'vodi-tv-show-carousel',
                    'render_callback'   => 'vodi_tv_show_carousel_element',
                ),
                'tv-show-section-aside-header'    => array(
                    'attributes'        => array(
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_subtitle' => array(
                            'type'      => 'string',
                        ),
                        'action_text'=> array(
                            'type'          => 'string',
                        ),
                        'action_link'=> array(
                            'type'          => 'string',
                            'default'       => '#',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'section_style'=> array(
                            'type'      => 'string',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 10,
                                'columns'       => 6,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-tv-show-section-aside-header',
                    'editor_style'      => 'vodi-tv-show-section-aside-header-editor',
                    'style'             => 'vodi-tv-show-section-aside-header',
                    'render_callback'   => 'vodi_tv_show_section_aside_header_element',
                ),
                'section-tv-shows-carousel-nav-header'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 15,
                                'columns'       => 5,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'carousel_args' => array(
                            'type'      => 'object',
                            'default'   => array(
                                'slidesToShow'  => 5,
                                'slidesToScroll'=> 5,
                                'dots'          => false,
                                'arrows'        => true,
                                'autoplay'      => false,
                                'infinite'      => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-section-tv-shows-carousel-nav-header',
                    'editor_style'      => 'vodi-section-tv-shows-carousel-nav-header-editor',
                    'style'             => 'vodi-section-tv-shows-carousel-nav-header',
                    'render_callback'   => 'vodi_section_tv_shows_carousel_nav_header_element',
                ),
                'episodes-with-featured-episode'    => array(
                    'attributes'        => array(
                        'section_title' => array(
                            'type'      => 'string',
                        ),
                        'section_nav_links'=> array(
                            'type'      => 'string',
                        ),
                        'bg_image'  => array(
                            'type'      => 'number',
                        ),
                        'section_background'=> array(
                            'type'      => 'string',
                        ),
                        'section_style'=> array(
                            'type'      => 'string',
                        ),
                        'feature_episode_id'=> array(
                            'type'      => 'string',
                        ),
                        'shortcode_atts'=> array(
                            'type'      => 'object',
                            'default'   => array(
                                'limit'         => 6,
                                'columns'       => 3,
                                'orderby'       => 'date',
                                'order'         => 'DESC',
                                'featured'      => false,
                                'top_rated'     => false,
                            ),
                        ),
                        'design_options'=> array(
                            'type'      => 'object',
                        ),
                        'className'     => array(
                            'type'      => 'string',
                        ),
                    ),
                    'editor_script'     => 'vodi-episodes-with-featured-episode',
                    'editor_style'      => 'vodi-episodes-with-featured-episode-editor',
                    'style'             => 'vodi-episodes-with-featured-episode',
                    'render_callback'   => 'vodi_episodes_with_featured_episode_element',
                ),
            );

            $suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
            foreach ( $blocks as $block => $args ) {
                $editor_script_deps = array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-util', 'wp-plugins', 'wp-edit-post', 'wp-i18n' );
                if( isset( $args['editor_script_deps'] ) ) {
                    $editor_script_deps = array_merge( $editor_script_deps, $args['editor_script_deps'] );
                    unset( $args['editor_script_deps'] );
                }

                wp_register_script( $args['editor_script'], VODI_EXTENSIONS_URL . 'assets/js/blocks/' . $block . $suffix . '.js', $editor_script_deps );

                // Add translations.
                wp_set_script_translations( $args['editor_script'], 'vodi-extensions', VODI_EXTENSIONS_DIR . 'languages' );

                if( isset( $args['editor_style'] ) ) {
                    $dir = is_rtl() ? '-rtl' : '';
                    wp_register_style( $args['editor_style'], VODI_EXTENSIONS_URL . 'assets/css/gutenberg-blocks/' . $block . '/editor' . $dir . $suffix . '.css', array( 'wp-edit-blocks' ), filemtime( VODI_EXTENSIONS_DIR . '/assets/css/gutenberg-blocks/' . $block . '/editor' . $suffix . '.css' ) );
                }

                if( isset( $args['style'] ) ) {
                    $dir = is_rtl() ? '-rtl' : '';
                    wp_register_style( $args['style'], VODI_EXTENSIONS_URL . 'assets/css/gutenberg-blocks/' . $block . '/style' . $dir . $suffix . '.css', array(), filemtime( VODI_EXTENSIONS_DIR . '/assets/css/gutenberg-blocks/' . $block . '/style' . $suffix . '.css' ) );
                }

                register_block_type( 'vodi/' . $block, $args );
            }

            add_filter( 'block_categories', array( __CLASS__, 'block_categories' ), 10, 2 );
        }
    }

    public static function block_categories( $categories, $post ) {
        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'vodi-blocks',
                    'title' => esc_html__( 'Vodi Blocks', 'vodi-extensions' ),
                ),
            )
        );
    }
}

endif;

add_action( 'init', array( 'Vodi_Gutenberg_Blocks', 'init' ) );