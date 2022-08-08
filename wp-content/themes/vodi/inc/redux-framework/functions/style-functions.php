<?php
/**
 * Filter functions for Styling Section of Theme Options
 */

if ( ! function_exists( 'sass_hex_to_rgba' ) ) {
    function sass_hex_to_rgba( $hex, $alpa = '' ) {
        preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hex, $primary_colors);
        for($i = 1; $i <= 3; $i++) {
            $primary_colors[$i] = hexdec($primary_colors[$i]);
        }
        if( !empty( $alpa ) ) {
            $rgb = 'rgba(' . $primary_colors[1] . ', ' . $primary_colors[2] . ', ' . $primary_colors[3] . ', ' . $alpa .')';
        } else {
            $rgb = 'rgba(' . $primary_colors[1] . ', ' . $primary_colors[2] . ', ' . $primary_colors[3] . ')';
        }
        return $rgb;
    }
}

if ( ! function_exists( 'sass_darken' ) ) {
    function sass_darken( $hex, $percent ) {
        preg_match( '/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hex, $vodi_primary_color );
        str_replace( '%', '', $percent );
        $percent = (int) $percent;
        $color = "#";
        for( $i = 1; $i <= 3; $i++ ) {
            $vodi_primary_color[$i] = hexdec( $vodi_primary_color[$i] );
            if ( $percent > 50 ) $percent = 50;
            $dv = 100 - ( $percent * 2 );
            $vodi_primary_color[$i] = round( $vodi_primary_color[$i] * ( $dv ) / 100 );
            $color .= str_pad( dechex( $vodi_primary_color[$i] ), 2, '0', STR_PAD_LEFT );
        }
        return substr($color, 0, 7);
    }
}

if ( ! function_exists( 'sass_lighten' ) ) {
    function sass_lighten( $hex, $percent ) {
        preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hex, $vodi_primary_color);
        str_replace('%', '', $percent);
        $percent = (int) $percent;
        $color = "#";
        for($i = 1; $i <= 3; $i++) {
            $vodi_primary_color[$i] = hexdec($vodi_primary_color[$i]);
            $vodi_primary_color[$i] = round($vodi_primary_color[$i] * (100+($percent*2))/100);
            $color .= str_pad(dechex($vodi_primary_color[$i]), 2, '0', STR_PAD_LEFT);
        }
        return substr($color, 0, 7);
    }
}

if ( ! function_exists( 'sass_yiq' ) ) {
    function sass_yiq( $hex ) {
        $length = strlen( $hex );
        if( $length < 5 ) {
            $hex = ltrim($hex,"#");
            $hex = '#' . $hex . $hex;
        }

        preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hex, $color);

        for($i = 1; $i <= 3; $i++) {
            $color[$i] = hexdec($color[$i]);
        }
        $yiq = (($color[1]*299)+($color[2]*587)+($color[3]*114))/1000;
        return ($yiq >= 128) ? '#000' : '#fff';
    }
}

if ( ! function_exists( 'redux_toggle_use_predefined_colors' ) ) {
    function redux_toggle_use_predefined_colors( $enable ) {
        global $vodi_options;

        if ( isset( $vodi_options['use_predefined_color'] ) && $vodi_options['use_predefined_color'] ) {
            $enable = true;
        } else {
            $enable = false;
        }

        return $enable;
    }
}

if( ! function_exists( 'redux_apply_primary_color' ) ) {
    function redux_apply_primary_color( $color ) {
        global $vodi_options;

        if ( isset( $vodi_options['main_color'] ) ) {
            $color = $vodi_options['main_color'];
        }

        return $color;
    }
}

if( ! function_exists( 'redux_apply_custom_primary_color' ) ) {
    function redux_apply_custom_primary_color( $color ) {
        global $vodi_options;

        if ( !( isset( $vodi_options['use_predefined_color'] ) && $vodi_options['use_predefined_color'] ) && isset( $vodi_options['custom_primary_color'] ) ) {
            $color = $vodi_options['custom_primary_color'];
        }

        return $color;
    }
}

if ( ! function_exists( 'redux_get_custom_color_css' ) ) {
    function redux_get_custom_color_css() {
        global $vodi_options;

        $primary_color                 = isset( $vodi_options['custom_primary_color'] ) ? $vodi_options['custom_primary_color'] : '#24baef';
        $primary_darken_7_5p           = sass_darken( $primary_color, '7.5%' );
        $primary_darken_10p            = sass_darken( $primary_color, '10%' );
        $primary_darken_35p            = sass_darken( $primary_color, '35%' );
        $primary_lighten_6p            = sass_lighten( $primary_color, '6%' );

        $styles             = 
'a,
.wp-block-quote cite,
.wp-block-quote footer,
.wp-block-quote .wp-block-quote__citation,
.wp-block-quote p strong,
.wp-block-quote p a,
.wp-block[data-type="core/pullquote"] .wp-block-pullquote__citation,
.wp-block[data-type="core/pullquote"][data-align="left"] .wp-block-pullquote__citation,
.wp-block[data-type="core/pullquote"][data-align="right"] .wp-block-pullquote__citation,
form.comment-form .logged-in-as a,
.comment-respond .comment-reply-title a:hover,
.vodi-related-articles .header-aside a:hover,
.home-section__flex-header ul.nav li a.active,
.home-section__flex-header ul.nav li a:hover,
.section-featured-tv-show .featured-tv-show__content .nav-link:hover,
.section-featured-tv-show .featured-tv-show__content .nav-link.active,
.home-section .home-section__nav-header .nav-link:hover,
.home-section .home-section__nav-header .nav-link.active,
.home-section.dark .home-section__action--link:hover,
.live-videos .home-section__footer-action--link:hover,
.coming-soon-videos .home-section__footer-action--link:hover,
.section-videos-live-coming-soon .live-video__title a:hover,
.section-videos-live-coming-soon .coming-soon-video__title a:hover,
.event-category-list__inner:hover .event-category-title,
.section-featured-movies-carousel ul.nav .nav-item .nav-link.active,
.section-featured-movies-carousel ul.nav .nav-item .nav-link:hover,
.home-sidebar-area .widget ul.menu li a:hover,
.home-sidebar-area .widget:last-child ul.menu li a:hover:before,
.section-live-game-players-list .live-game-player__social-network-page-link:hover,
.section-live-game-players-list .live-game-player__name a:hover,
.section-live-game-players-list .live-game-player .game-now-playing,
.dark .article .entry-title a:hover,
.dark .article .article__excerp:hover,
.dark .article .article__meta > *:not(.article__categories):hover,
.dark .article .article__meta > *:not(.article__categories) a:hover,
.home-blog-sidebar-section.dark header .header-aside > a:hover,
.home-blog-sidebar-section.dark .widget .entry-title a:hover,
.home-blog-sidebar-section.dark .widget .recentcomments a:hover,
.home-blog-sidebar-section.dark .widget .widget-header .header-aside > a:hover,
.home-blog-sidebar-section.dark .widget .entry-meta > *:not(.entry-categories) a:hover,
.dark .movie__actions .movie-actions--link_add-to-playlist:hover,
.section-movies-list ul.nav li a.active,
.masvideos-widget_movies_year_filter ul li a,
.section-featured-post .featured-post__action a:hover,
.widget-area .masvideos-movies-filter-widget .masvideos-widget-movies-layered-nav-list__item a:hover,
.widget-area .masvideos-movies-filter-widget .masvideos-widget-movies-layered-nav-list__item.chosen,
.widget-area .masvideos-movies-filter-widget .masvideos-widget-movies-layered-nav-list__item.chosen a,
.widget-area .masvideos-videos-filter-widget .masvideos-widget-videos-layered-nav-list__item a:hover,
.widget-area .masvideos-videos-filter-widget .masvideos-widget-videos-layered-nav-list__item.chosen,
.widget-area .masvideos-videos-filter-widget .masvideos-widget-videos-layered-nav-list__item.chosen a,
.widget-area .masvideos-tv-shows-filter-widget .masvideos-widget-tv-shows-layered-nav-list__item a:hover,
.widget-area .masvideos-tv-shows-filter-widget .masvideos-widget-tv-shows-layered-nav-list__item.chosen,
.widget-area .masvideos-tv-shows-filter-widget .masvideos-widget-tv-shows-layered-nav-list__item.chosen a,
.movies_widget_rating_filter ul li.masvideos-layered-nav-rating a,
.movies_widget_rating_filter ul li.masvideos-layered-nav-rating .star-rating .star,
.videos_widget_rating_filter ul li.masvideos-layered-nav-rating .star-rating .star,
.tv_shows_widget_rating_filter ul li.masvideos-layered-nav-rating .star-rating .star,
.episode .nav .nav-item a.active,
.episode__player--next-episode a:hover, .episode__player--prev-episode a:hover,
.dark.single-episode-v3 .episode__player--prev-episode a, .dark.single-episode-v4 .episode__player--next-episode a:hover,
.dark.single-episode-v3 .episode__player--next-episode a, .dark.single-episode-v4 .episode__player--prev-episode a:hover,
.maxlist-more,
.maxlist-less,
.maxlist-more:hover,
.maxlist-less:hover,
.vodi-widget_movies_letter_filter a span:first-child,
.vodi-widget_tv_shows_letter_filter a span:first-child,
.vodi-control-bar .masvideos-widget-movies-layered-nav-list__item.chosen a,
.vodi-control-bar .masvideos-widget-movies-layered-nav-list a:hover,
.vodi-control-bar .masvideos-widget-tv-shows-layered-nav-list__item.chosen a,
.vodi-control-bar .masvideos-widget-tv-shows-layered-nav-list a:hover,
.vodi-control-bar .masvideos-widget-videos-layered-nav-list__item.chosen a,
.vodi-control-bar .masvideos-widget-videos-layered-nav-list a:hover,
.masvideos_tv_shows_widget .tv-show__title:hover,
.masvideos_movies_widget .tv-show__title:hover,
.section-featured-movie .featured-movie__action-icon i,
.home-page-sidebar .sidebar-area .widget_archive li:hover a,
.home-page-sidebar .sidebar-area .widget_meta li:hover a,
.home-page-sidebar .sidebar-area .widget_pages li:hover a,
.home-page-sidebar .sidebar-area .widget_nav_menu li a:hover,
.home-page-sidebar .sidebar-area .widget_categories li:hover a,
.home-page-sidebar .sidebar-area .masvideos-widget-videos-categories li:hover a,
.home-page-sidebar .sidebar-area .widget_archive li:focus a,
.home-page-sidebar .sidebar-area .widget_meta li:focus a,
.home-page-sidebar .sidebar-area .widget_pages li:focus a,
.home-page-sidebar .sidebar-area .widget_nav_menu li a:hover,
.home-page-sidebar .sidebar-area .widget_categories li:focus a,
.home-page-sidebar .sidebar-area .masvideos-widget-videos-categories li:focus a,
.home-page-sidebar.dark .sidebar-area .widget_nav_menu li:hover > a i,
.home-page-sidebar.dark .sidebar-area .widget_categories li:hover a i,
.home-page-sidebar.dark .sidebar-area .masvideos-widget-videos-categories li:hover a i,
.home-page-sidebar.dark .sidebar-area .widget_nav_menu li:focus > a i,
.home-page-sidebar.dark .sidebar-area .widget_categories li:focus a i,
.home-page-sidebar.dark .sidebar-area .masvideos-widget-videos-categories li:focus a i,
.tv_show__season-tabs-wrap .nav .nav-item a,
.single-tv_show .tv-show__rating .avg-rating__number,
.single-movie .summary .movie__meta--genre a,
.single-movie .movie-tabs .nav .nav-item a.active,
.tv-show-tabs .nav .nav-item a.active,
.single-movie .movie__description-tab .movie__meta--genre a,
.single-movie .movie__rating-with-playlist .rating-number-with-text .avg-rating-number,
.single-tv_show .tv-show__rating-with-playlist .rating-number-with-text .avg-rating-number,
.single-movie .movie__description-tab .movie__attributes td a:hover,
.tv-show__attributes td a:hover,
.person__attributes td a:hover,
.masvideos-edit-manage-playlists .masvideos-manage-playlists table tbody td:first-child a:hover,
.yamm .yamm-content li a:hover,
.yamm .yamm-content .movie__actions a.movie-actions--link_watch,
.contact-page .vodi-faq-section .faq-section__faq-header--link:hover,
.sidebar-area.widget-area .masvideos-videos-tags-filter-widget .masvideos-widget-videos-layered-nav-list__item a:hover,
.sidebar-area.widget-area .masvideos-videos-tags-filter-widget .masvideos-widget-videos-layered-nav-list__item.chosen a,
.sidebar-area.widget-area .masvideos-tv-shows-tags-filter-widget .masvideos-widget-tv-shows-layered-nav-list__item a,
.sidebar-area.widget-area .masvideos-tv-shows-tags-filter-widget .masvideos-widget-tv-shows-layered-nav-list__item.chosen a,
.wpulike .wp_ulike_btn:hover::before,
.single-article .entry-content .wp-block-archives li a:hover,
.single-article .entry-content .wp-block-categories li a:hover,
.single-article .entry-content .wp-block-latest-posts li a:hover,
.wpulike .wp_ulike_btn:hover::before,
.episode__link:hover .episode__title, 
.episode__link:focus .episode__title,
.home-section.dark .home-section__flex-header .nav-link:hover,
.section-movies-carousel-aside-header ul.nav .nav-item .nav-link.active,
.section-movies-carousel-aside-header ul.nav .nav-item .nav-link:hover,
.section-movies-carousel-aside-header ul.nav .nav-item .nav-link:focus,
.home-tv-show-section-aside-header ul.nav .nav-item .nav-link.active,
.home-tv-show-section-aside-header ul.nav .nav-item .nav-link:hover,
.home-tv-show-section-aside-header ul.nav .nav-item .nav-link:focus,
.section-tv-episodes-carousel ul.nav .nav-item .nav-link.active,
.section-tv-episodes-carousel ul.nav .nav-item .nav-link:hover,
.section-tv-episodes-carousel ul.nav .nav-item .nav-link:focus,
.section-movies-list ul.nav li a:hover,
.section-movies-list ul.nav li a:focus,
.home-section .home-section__footer-view-more-action--link:hover,
.section-movies-list .nav-tabs li a.nav-link.active, 
.section-movies-list .top-movies-list__header .nav-tabs li a.nav-link.active,
.woocommerce-account .masvideos-MyAccount-content table tbody td:first-child a:hover,
.single-movie-v6 .movie-cast-crew-tabs ul.nav li a,
.single-movie-v7 .movie-cast-crew-tabs ul.nav li a,
.single-movie-v6 .single-movie-casts .movie-cast > a:hover,
.single-movie-v7 .single-movie-casts .movie-cast > a:hover,
.single-movie-v5 .movie-cast-crew-tabs ul.nav li a,
.single-movie #reviews .masvideos-review__author,
.video-download-btn:hover > i,
.episode-download-btn:hover > i,
.single-movie-v6 .single-movie-details--attributes table.movie__attributes td span a:hover,
.single-movie-v7 .single-movie-details--attributes table.movie__attributes td span a:hover,
.person-tabs ul.nav li a.active,
.person-credits-tabs ul.nav li a.active,
.single-movie-v6 .single-movie-highlighted-comment .comment_container--inner .masvideos-review__author, 
.single-movie-v7 .single-movie-highlighted-comment .comment_container--inner .masvideos-review__author,
.single-movie-v6.single-movie .masvideos-reviews__title:after, 
.single-movie-v7.single-movie .masvideos-reviews__title:after,
.single-movie-v6 .movie-cast-crew-tabs .tab-content .movie-cast .person-name-link,
.single-movie-v6 .movie-cast-crew-tabs .tab-content .movie-crew .person-name-link,
.dark.single-movie-v6 .movie-cast-crew-tabs .tab-content .movie-cast h3.person-name, 
.dark.single-movie-v6 .movie-cast-crew-tabs .tab-content .movie-crew h3.person-name,
.single-movie-v7 .movie-cast-crew-tabs .tab-content .movie-cast .person-name-link,
.single-movie-v7 .movie-cast-crew-tabs .tab-content .movie-crew .person-name-link,
.dark.single-movie-v7 .movie-cast-crew-tabs .tab-content .movie-cast h3.person-name, 
.dark.single-movie-v7 .movie-cast-crew-tabs .tab-content .movie-crew h3.person-name,
.single-movie-v6 h2.single-movie-details--description__title:after, 
.single-movie-v7 h2.single-movie-details--description__title:after,
.masvideos-breadcrumb a:hover,
.masvideos-breadcrumb a:focus,
.vodi-categories-widget .category a,
.episode__link a:hover .episode__title,
.episode__link a:focus .episode__title,
.movie__link a:hover .movie__title,
.movie__link a:focus .movie__title,
.person__link a:hover .person__title,
.person__link a:focus .person__title,
.tv-show__title a:hover,
.tv-show__title a:focus,
.tv-show__seasons a,
.tv-show__episode a,
.video__link:hover .video__title,
.video__link:focus .video__title,
.dark .blog-sidebar .widget_meta ul > li > a:hover,
.dark .blog-sidebar .widget_meta ul > li > a:focus,
.dark .blog-sidebar .widget_meta .item__link:hover,
.dark .blog-sidebar .widget_meta .item__link:focus,
.dark .blog-sidebar .widget_nav_menu ul > li > a:hover,
.dark .blog-sidebar .widget_nav_menu ul > li > a:focus,
.dark .blog-sidebar .widget_nav_menu .item__link:hover,
.dark .blog-sidebar .widget_nav_menu .item__link:focus,
.dark .blog-sidebar .widget_pages ul > li > a:hover,
.dark .blog-sidebar .widget_pages ul > li > a:focus,
.dark .blog-sidebar .widget_pages .item__link:hover,
.dark .blog-sidebar .widget_pages .item__link:focus,
.dark .blog-sidebar .widget_archive ul > li > a:hover,
.dark .blog-sidebar .widget_archive ul > li > a:focus,
.dark .blog-sidebar .widget_archive .item__link:hover,
.dark .blog-sidebar .widget_archive .item__link:focus,
.dark .blog-sidebar .widget_categories ul > li > a:hover,
.dark .blog-sidebar .widget_categories ul > li > a:focus,
.dark .blog-sidebar .widget_categories .item__link:hover,
.dark .blog-sidebar .widget_categories .item__link:focus,
.dark .widget_rss li a:hover,
.dark .widget_rss li a:focus,
.dark .widget_recent_entries li a:hover,
.dark .widget_recent_entries li a:focus,
.dark .blog-sidebar .recentcomments > a:hover,
.dark .blog-sidebar .recentcomments > a:focus,
.dark .article__title a:hover,
.dark .article__title a:focus,
.dark .comment-author-name a:hover,
.dark .comment-author-name a:focus,
.site-header.dark .site-header__landing-back-option a:hover,
.site-header.light .site-header__landing-back-option a:hover,
.site-header.transparent .site-header__landing-back-option a:hover,
.article__title a:hover,
.article__title a:focus,
.article__categories a,
.article__quote cite a,
.article__quote cite a:hover,
.article__quote p + p a,
.article__quote p + p a:hover,
.article__link p a:hover,
.article__link p a:focus,
.article__link p a.link-url,
.post-navigation .nav-links .nav-next > a:hover .post-nav__article--title,
.post-navigation .nav-links .nav-next > a:focus .post-nav__article--title,
.post-nav__article--categories,
.blog-sidebar .widget_meta ul > li > a:hover,
.blog-sidebar .widget_meta ul > li > a:focus,
.blog-sidebar .widget_nav_menu ul > li > a:hover,
.blog-sidebar .widget_nav_menu ul > li > a:focus,
.blog-sidebar .widget_pages ul > li > a:hover,
.blog-sidebar .widget_pages ul > li > a:focus,
.blog-sidebar .widget_archive ul > li > a:hover,
.blog-sidebar .widget_archive ul > li > a:focus,
.blog-sidebar .widget_categories ul > li > a:hover,
.blog-sidebar .widget_categories ul > li > a:focus,
.blog-sidebar .widget_meta .item__link:hover,
.blog-sidebar .widget_meta .item__link:focus,
.blog-sidebar .widget_nav_menu .item__link:hover,
.blog-sidebar .widget_nav_menu .item__link:focus,
.blog-sidebar .widget_pages .item__link:hover,
.blog-sidebar .widget_pages .item__link:focus,
.blog-sidebar .widget_archive .item__link:hover,
.blog-sidebar .widget_archive .item__link:focus,
.blog-sidebar .widget_categories .item__link:hover,
.blog-sidebar .widget_categories .item__link:focus,
.blog-sidebar .widget_meta .item__child-indicator--icon.has-child:before,
.blog-sidebar .widget_nav_menu .item__child-indicator--icon.has-child:before,
.blog-sidebar .widget_pages .item__child-indicator--icon.has-child:before,
.blog-sidebar .widget_archive .item__child-indicator--icon.has-child:before,
.blog-sidebar .widget_categories .item__child-indicator--icon.has-child:before,
.blog-sidebar .widget_meta .current-item > .item__inner .item__link,
.blog-sidebar .widget_nav_menu .current-item > .item__inner .item__link,
.blog-sidebar .widget_pages .current-item > .item__inner .item__link,
.blog-sidebar .widget_archive .current-item > .item__inner .item__link,
.blog-sidebar .widget_categories .current-item > .item__inner .item__link,
.single-article .format-link p a:hover,
.single-article .format-link p a:focus,
.single-article .entry-content blockquote p strong,
.single-article .entry-content blockquote p a,
.article .entry-content blockquote p strong,
.article .entry-content blockquote p a,
.page__content blockquote p strong,
.page__content blockquote p a,
.single-article .entry-content blockquote cite,
.article .entry-content blockquote cite,
.page__content blockquote cite,
.policy-info a:hover,
.widget_rss ul .rsswidget:hover,
.widget_rss ul .rsswidget:focus,
.widget_rss ul li a:hover,
.widget_rss ul li a:focus,
.widget_recent_entries ul .rsswidget:hover,
.widget_recent_entries ul .rsswidget:focus,
.widget_recent_entries ul li a:hover,
.widget_recent_entries ul li a:focus,
.widget_rss cite,
.widget_recent_entries cite,
.vodi-tabbed-widget .vtw-tabbed-nav li.tab-active a,
.vodi_posts_widget .style-1 .entry-title a:hover,
.vodi_posts_widget .style-1 .entry-title a:focus,
.vodi_posts_widget .style-2 ul li .entry-title a:hover,
.vodi_posts_widget .style-2 ul li .entry-title a:focus,
.vodi_posts_widget .style-2 ul li .entry-meta a,
.vodi_posts_widget .style-2 ul li .entry-meta a,
.vodi_posts_widget .style-2 ul .has-post-thumbnail .post-content .entry-title a:hover,
.vodi_posts_widget .style-2 ul .has-post-thumbnail .post-content .entry-title a:focus,
.vodi_posts_widget .style-2 ul .has-post-thumbnail .post-content .entry-categories a,
.vodi_posts_widget .style-3 ul li .entry-title a:hover,
.vodi_posts_widget .style-3 ul li .entry-title a:focus,
.yamm > .menu-item:hover > a,
.yamm > .menu-item:focus > a,
.section-movies-list .featured-with-list-view-movies-list__header a.active,
.section-movies-list__header a.active,
.home-blog-grid-section.style-3 .articles .article .article__title a:hover,
.home-blog-grid-section.style-3 .articles .article .article__title a:focus,
.home-featured-blog-with-blog-grid-section .articles .article .article__title a:hover,
.home-featured-blog-with-blog-grid-section .articles .article .article__title a:focus,
.section-hot-premier-show .movie__title:hover,
.section-hot-premier-show .movie__title:focus,
.landing-featured-video__title,
.landing-features-list .feature i,
.landing-view-counts .landing-view-counts__count,
.section-movies-list .movie-list__genre {
    color: ' . $primary_color . ';
}

a:focus,
a:hover {
    color: ' . $primary_darken_10p . ';
}

#scrollUp,
.video__badge,
.movie__badge,
.tv-show__badge,
.badge-sticky-post,
.masvideos-widget_movies_year_filter ul li a:hover,
.masvideos-widget_movies_year_filter ul li.chosen a,
.dark .section-movies-carousel-nav-header__carousel .slick-arrow:hover,
.dark .section-videos-carousel-nav-header__carousel .slick-arrow:hover,
.vodi-control-bar .videos-view-switcher .nav-item a:hover,
.vodi-control-bar .archive-view-switcher .nav-item a:hover,
.vodi-control-bar .videos-view-switcher .nav-item a.active,
.vodi-control-bar .archive-view-switcher .nav-item a.active,
.dark .section-movies-carousel__carousel .slick-arrow:hover,
.dark .section-videos-carousel__carousel .slick-arrow:hover,
.movies-sliders.style-v2 .slick-current.slick-active figure:before,
.vodi-widget_movies_letter_filter .vodi-layered-nav-movies-letter.chosen a,
.vodi-widget_tv_shows_letter_filter .vodi-layered-nav-tv-shows-letter.chosen a,
.vodi-widget_movies_letter_filter .vodi-layered-nav-movies-letter a:hover ,
.vodi-widget_tv_shows_letter_filter .vodi-layered-nav-tv-shows-letter a:hover,
.sidebar-area.widget-area .masvideos-movies-tags-filter-widget .masvideos-widget-movies-layered-nav-list__item:hover,
.sidebar-area.widget-area .masvideos-movies-tags-filter-widget .masvideos-widget-movies-layered-nav-list__item.chosen,
.sidebar-area.widget-area .widget_vodi_tv_shows_filter .masvideos-tv-shows-tags-filter-widget .masvideos-widget-tv-shows-layered-nav-list__item:hover,
.sidebar-area.widget-area .widget_vodi_tv_shows_filter .masvideos-tv-shows-tags-filter-widget .masvideos-widget-tv-shows-layered-nav-list__item.chosen,
.sidebar-area.widget-area .widget_vodi_videos_filter .masvideos-videos-tags-filter-widget .masvideos-widget-videos-layered-nav-list__item:hover,
.sidebar-area.widget-area .widget_vodi_videos_filter .masvideos-videos-tags-filter-widget .masvideos-widget-videos-layered-nav-list__item.chosen,
.dark .page-links-inner > span.current,
ul.page-numbers > li > a.current,
ul.page-numbers > li > span.current,
.nav-links > .page-numbers.current,
.page-links-inner > a.current,
.page-links-inner > span.current,
.page-links-inner > span,
.btn-primary,
.vodi-landing-hero-banner__btn-action,
.landing-tabs-features__btn-action,
.slick-dots .slick-active button,
.list-view .product:hover .product-actions--link_watch,
.vodi-archive-wrapper[data-view="list-large"] .movie .movie-actions--link_watch:hover,
.vodi-archive-wrapper[data-view="list-large"] .movie .movie-actions--link_watch:focus,
.vodi-archive-wrapper[data-view="grid"] .movie .movie-actions--link_watch:hover,
.vodi-archive-wrapper[data-view="grid"] .movie .movie-actions--link_watch:focus,
.vodi-archive-wrapper[data-view="list-small"] .movie .movie-actions--link_watch:hover,
.vodi-archive-wrapper[data-view="list-small"] .movie .movie-actions--link_watch:focus,
.vodi-archive-wrapper[data-view="list"] .movie .movie-actions--link_watch:hover,
.vodi-archive-wrapper[data-view="list"] .movie .movie-actions--link_watch:focus,
.vodi-archive-wrapper[data-view="grid-extended"] .movie .movie-actions--link_watch:hover,
.vodi-archive-wrapper[data-view="grid-extended"] .movie .movie-actions--link_watch:focus,
.vodi-archive-wrapper[data-view="list-large"] .video .video-actions--link_watch:hover,
.vodi-archive-wrapper[data-view="list-large"] .video .video-actions--link_watch:focus,
.vodi-archive-wrapper[data-view="grid"] .video .video-actions--link_watch:hover,
.vodi-archive-wrapper[data-view="grid"] .video .video-actions--link_watch:focus,
.vodi-archive-wrapper[data-view="list-small"] .video .video-actions--link_watch:hover,
.vodi-archive-wrapper[data-view="list-small"] .video .video-actions--link_watch:focus,
.vodi-archive-wrapper[data-view="list"] .video .video-actions--link_watch:hover,
.vodi-archive-wrapper[data-view="list"] .video .video-actions--link_watch:focus,
.vodi-archive-wrapper[data-view="grid-extended"] .video .video-actions--link_watch:hover,
.vodi-archive-wrapper[data-view="grid-extended"] .video .video-actions--link_watch:focus,
.vodi-categories-widget .category:hover,
.vodi-categories-widget .category:focus,
.audio-options li:hover,
.audio-options li:focus,
.comingsoon-launch-section .btn-subscribe,
.tv_show__season-tabs-wrap .nav .nav-item a.active,
.woocommerce-account .masvideos-MyAccount-content .masvideos-pagination--without-numbers a:hover,
.single-movie-v6 .movie-cast-crew-tabs ul.nav li a.active,
.single-movie-v7 .movie-cast-crew-tabs ul.nav li a.active,
.landing-tabs-features .landing-tabs-features__btn-action,
.home-section-featured-tv-shows .featured-tv-shows .video__body .video-info .movie-tab__content-action--link_watch,
.vodi-live-videos .masvideos-videos .video__body {
    background-color: ' . $primary_color . ';
}

.movie__poster .movie__link:after,
.tv-show__poster .tv-show__link:after,
.video__poster .video__link:after,
.episode__poster .episode__link:after {
    background-color: ' . sass_hex_to_rgba($primary_color, 0.3) . ';
}

.comingsoon-launch-section .btn-subscribe {
    border: 2px solid ' . $primary_color . ';
}

.site-header.dark .search-form .search-field:focus,
.dark .section-movies-carousel-nav-header__carousel .slick-arrow:hover,
.dark .section-videos-carousel-nav-header__carousel .slick-arrow:hover,
.dark .section-movies-carousel__carousel .slick-arrow:hover,
.dark .section-videos-carousel__carousel .slick-arrow:hover,
.movies-sliders.style-v2 .slick-current.slick-active figure,
form.edit-video-form .video_images_container ul li.image:hover,
.woocommerce-account .masvideos-MyAccount-content .masvideos-pagination--without-numbers a:hover {
    border-color: ' . $primary_color . ';
}

.landing-tabs-features .nav .active {
    border-bottom: 3px solid ' . $primary_color . ';
}

.episode-tabs .nav .nav-item a.active:after,
.single-movie .movie-tabs .nav .nav-item a.active:after,
.tv-show-tabs .nav .nav-item a.active:after,
.my-account-page__header .masvideos-MyAccount-navigation ul li.is-active a:after,
.person-tabs ul li a.active:after,
.person-credits-tabs ul li a.active:after,
.video-search-results.search .page__header .search-result-tab-link.active,
.movie-search-results.search .page__header .search-result-tab-link.active,
.tv_show-search-results.search .page__header .search-result-tab-link.active,
.episode-search-results.search .page__header .search-result-tab-link.active,
.person-search-results.search .page__header .search-result-tab-link.active {
    border-bottom-color: ' . $primary_color . ';
}

input[type="submit"],
.btn-vodi-primary,
.wp-block-button:not(.is-style-outline) .wp-block-button__link,
.tv-show .tv-show-actions--link_watch {
    color: ' . sass_yiq( $primary_color ) . ';
    background-color: ' . $primary_color . ';
    border-color: ' . $primary_color . ';
}

input[type="submit"]:hover,
.btn-vodi-primary:hover,
.wp-block-button:not(.is-style-outline) .wp-block-button__link:hover,
.tv-show .tv-show-actions--link_watch:hover {
    color: ' . sass_yiq( $primary_color ) . ';
    background-color: ' . $primary_darken_10p . ';
    border-color: ' . $primary_darken_10p . ';
}

.slider-movie .movie-actions--link_watch,
.movies-sliders .movie-actions--link_watch,
.tv-shows-sliders .tv-show-actions--link_watch,
.section-featured-video .featured-video__content-action--link_watch,
.about-movie .movie-detail .movie-tab__content-action--link_watch,
.featured-tv-shows__inner .movie-info .movie-tab__content-action--link_watch,
.section-movies-list .featured-with-list-view-movies-list__info .featured-movie .movie .movie-actions--link_watch,
.masvideos-register .masvideos-Button,
.masvideos-login .masvideos-Button,
.section-featured-movie .movie-actions--link_watch,
.masvideos-edit-playlist__form .masvideos-Button,
.error-404.not-found .home-button .btn:not(:disabled):not(.disabled),
form.edit-video-form .button,
.single-movie__actions .movie-actions--get-tickets,
.single-movie__actions .movie-actions--watch-now,
.masvideos-EditAccountForm .masvideos-Button,
div.wpforms-container-full.contact-form .wpforms-form input[type=submit],
div.wpforms-container-full.contact-form .wpforms-form button[type=submit],
div.wpforms-container-full.contact-form .wpforms-form .wpforms-page-button,
.wpforms-container.contact-form input[type=submit],
.wpforms-container.contact-form button[type=submit],
.wpforms-container.contact-form .wpforms-page-button,
div.wpforms-container-full.subscribe-form .wpforms-form input[type=submit],
div.wpforms-container-full.subscribe-form .wpforms-form button[type=submit],
div.wpforms-container-full.subscribe-form .wpforms-form .wpforms-page-button,
.wpforms-container.subscribe-form input[type=submit],
.wpforms-container.subscribe-form button[type=submit],
.wpforms-container.subscribe-form .wpforms-page-button {
    color: #fff;
    background-color: ' . $primary_color . ';
    border-color: ' . $primary_color . ';
}

.slider-movie .movie-actions--link_watch:hover,
.movies-sliders .movie-actions--link_watch:hover,
.tv-shows-sliders .tv-show-actions--link_watch:hover,
.section-featured-video .featured-video__content-action--link_watch:hover,
.about-movie .movie-detail .movie-tab__content-action--link_watch:hover,
.featured-tv-shows__inner .movie-info .movie-tab__content-action--link_watch:hover,
.section-movies-list .featured-with-list-view-movies-list__info .featured-movie .movie .movie-actions--link_watch:hover,
.masvideos-register .masvideos-Button:hover,
.masvideos-login .masvideos-Button:hover,
.section-featured-movie .movie-actions--link_watch:hover,
.masvideos-edit-playlist__form .masvideos-Button:hover,
.error-404.not-found .home-button .btn:not(:disabled):not(.disabled):hover,
form.edit-video-form .button:hover,
.single-movie__actions .movie-actions--get-tickets:hover,
.single-movie__actions .movie-actions--watch-now:hover,
.masvideos-EditAccountForm .masvideos-Button:hover,
div.wpforms-container-full.contact-form .wpforms-form input[type=submit]:hover,
div.wpforms-container-full.contact-form .wpforms-form button[type=submit]:hover,
div.wpforms-container-full.contact-form .wpforms-form .wpforms-page-button:hover,
.wpforms-container.contact-form input[type=submit]:hover,
.wpforms-container.contact-form button[type=submit]:hover,
.wpforms-container.contact-form .wpforms-page-button:hover,
div.wpforms-container-full.subscribe-form .wpforms-form input[type=submit]:hover,
div.wpforms-container-full.subscribe-form .wpforms-form button[type=submit]:hover,
div.wpforms-container-full.subscribe-form .wpforms-form .wpforms-page-button:hover,
.wpforms-container.subscribe-form input[type=submit]:hover,
.wpforms-container.subscribe-form button[type=submit]:hover,
.wpforms-container.subscribe-form .wpforms-page-button:hover {
    color: ' . sass_yiq( $primary_color ) . ';
    background-color: ' . $primary_darken_7_5p . ';
    border-color: ' . $primary_darken_10p . ';
}

.btn-outline-vodi-primary,
.wp-block-button.is-style-outline .wp-block-button__link,
.home-section .home-section__footer-view-more-action--link:hover,
.pmpro_btn,
.pmpro-login.logged-in .pmpro_logged_in_welcome_wrap .pmpro_member_log_out > a,
.pmpro_billing_wrap > p:first-child > small > a {
    color: ' . sass_yiq( $primary_color ) . ';
    border-color: ' . $primary_color . ';
}

.btn-outline-vodi-primary:hover,
.wp-block-button.is-style-outline .wp-block-button__link:hover,
.home-section .home-section__footer-view-more-action--link:hover:hover,
.pmpro_btn,
.pmpro-login.logged-in .pmpro_logged_in_welcome_wrap .pmpro_member_log_out > a,
.pmpro_billing_wrap > p:first-child > small > a {
    color: ' . sass_yiq( $primary_color ) . ';
    background-color: ' . $primary_color . ';
    border-color: ' . $primary_color . ';
}

.movie-slider .masvideos-movies .movies .slider-movie .watch-now-btn .watch-now-btn-bg {
    background-image: linear-gradient(30deg, ' . $primary_darken_35p . ' 0%, '. $primary_lighten_6p .' 100%);
}

form.edit-video-form .form-row-reviews_allowed .input-checkbox:checked:before,
.vodi-control-bar .masvideos-widget-movies-layered-nav-list__item.chosen a:after,
.vodi-control-bar .masvideos-widget-movies-layered-nav-list a:hover:after,
.vodi-control-bar .masvideos-widget-tv-shows-layered-nav-list__item.chosen a:after,
.vodi-control-bar .masvideos-widget-tv-shows-layered-nav-list a:hover:after,
.vodi-control-bar .masvideos-widget-videos-layered-nav-list__item.chosen a:after,
.vodi-control-bar .masvideos-widget-videos-layered-nav-list a:hover:after,
.video-actions--link_add-to-playlist .dropdown-menu > a.toggle-playlist.added:before,
.movie-actions--link_add-to-playlist .dropdown-menu > a.toggle-playlist.added:before,
.tv-show-actions--link_add-to-playlist .dropdown-menu > a.toggle-playlist.added:before,
.home-sidebar-area .widget:last-child ul.menu li a:hover:before,
.sidebar-area .masvideos-movies-filter-widget .masvideos-widget-movies-layered-nav-list__item a:hover:before,
.sidebar-area .masvideos-movies-filter-widget .masvideos-widget-movies-layered-nav-list__item.chosen a:before,
.sidebar-area .masvideos-videos-filter-widget .masvideos-widget-videos-layered-nav-list__item a:hover:before,
.sidebar-area .masvideos-videos-filter-widget .masvideos-widget-videos-layered-nav-list__item.chosen a:before,
.sidebar-area .masvideos-tv-shows-filter-widget .masvideos-widget-tv-shows-layered-nav-list__item a:hover:before,
.sidebar-area .masvideos-tv-shows-filter-widget .masvideos-widget-tv-shows-layered-nav-list__item.chosen a:before,
.sidebar-area.widget-area .masvideos-videos-tags-filter-widget .masvideos-widget-videos-layered-nav-list__item a:hover:before,
.sidebar-area.widget-area .masvideos-videos-tags-filter-widget .masvideos-widget-videos-layered-nav-list__item.chosen a:before,
.sidebar-area.widget-area .masvideos-tv-shows-tags-filter-widget .masvideos-widget-tv-shows-layered-nav-list__item a:hover:before,
.sidebar-area.widget-area .masvideos-tv-shows-tags-filter-widget .masvideos-widget-tv-shows-layered-nav-list__item.chosen a:before {
    background-image: ' . str_replace( "#", "%23", 'url("data:image/svg+xml;utf8,%3csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'18px\' height=\'18px\'%3e%3cpath fill=\'' . $primary_color . '\' d=\'M-0.000,18.000 L-0.000,-0.000 L18.000,-0.000 L18.000,18.000 L-0.000,18.000 ZM13.387,5.216 C13.312,5.136 13.272,5.039 13.158,4.999 C11.202,7.087 9.246,9.176 7.291,11.263 C6.661,10.603 6.032,9.943 5.403,9.284 C5.249,9.121 5.098,8.958 4.944,8.796 C4.913,8.764 4.862,8.637 4.791,8.660 C4.722,8.742 4.654,8.823 4.586,8.904 C4.391,9.103 4.195,9.302 4.000,9.501 C4.073,9.726 4.708,10.281 4.893,10.477 C5.411,11.028 5.930,11.580 6.449,12.131 C6.709,12.408 6.949,12.758 7.265,12.972 C7.265,12.981 7.265,12.990 7.265,12.999 C7.273,12.999 7.282,12.999 7.291,12.999 C9.527,10.631 11.764,8.262 14.000,5.894 C13.932,5.679 13.542,5.380 13.387,5.216 Z\'/%3e%3c/svg%3e")' ) . ';
}

.vodi-control-bar .videos-type li a.active,
.vodi-control-bar .videos-type li a:hover:after,
.masvideos-persons-control-bar .videos-type li a.active,
.masvideos-persons-control-bar .videos-type li a:hover:after {
    background-image: ' . str_replace( "#", "%23", 'url("data:image/svg+xml;utf8,%3csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'18px\' height=\'18px\'%3e%3cpath fill=\'' . $primary_color . '\' d=\'M-0.000,18.000 L-0.000,-0.000 L18.000,-0.000 L18.000,18.000 L-0.000,18.000 ZM13.388,5.216 C13.312,5.136 13.272,5.039 13.158,4.999 C11.202,7.087 9.246,9.176 7.291,11.263 C6.661,10.603 6.032,9.944 5.403,9.284 C5.250,9.121 5.098,8.958 4.944,8.796 C4.913,8.764 4.862,8.637 4.791,8.660 C4.723,8.742 4.655,8.823 4.587,8.904 C4.391,9.103 4.195,9.302 4.000,9.501 C4.073,9.726 4.708,10.281 4.893,10.477 C5.411,11.029 5.930,11.580 6.449,12.131 C6.709,12.408 6.950,12.759 7.265,12.972 C7.265,12.981 7.265,12.990 7.265,12.999 C7.274,12.999 7.282,12.999 7.291,12.999 C9.527,10.631 11.764,8.262 14.000,5.894 C13.932,5.680 13.542,5.380 13.388,5.216 Z\'/%3e%3c/svg%3e")' ) . ';
}

.vodi-archive-wrapper[data-view="list-large"] .movie:hover .avg-rating .vodi-svg,
.vodi-archive-wrapper[data-view="grid"] .movie:hover .avg-rating .vodi-svg,
.vodi-archive-wrapper[data-view="list-small"] .movie:hover .avg-rating .vodi-svg,
.vodi-archive-wrapper[data-view="list"] .movie:hover .avg-rating .vodi-svg,
.vodi-archive-wrapper[data-view="grid-extended"] .movie:hover .avg-rating .vodi-svg,
.vodi-archive-wrapper[data-view="list-large"] .tv-show:hover .avg-rating .vodi-svg,
.vodi-archive-wrapper[data-view="grid"] .tv-show:hover .avg-rating .vodi-svg,
.vodi-archive-wrapper[data-view="list-small"] .tv-show:hover .avg-rating .vodi-svg,
.vodi-archive-wrapper[data-view="list"] .tv-show:hover .avg-rating .vodi-svg,
.vodi-archive-wrapper[data-view="grid-extended"] .tv-show:hover .avg-rating .vodi-svg,
.header-landing-v1.dark .vodi-svg1,
.site-header.header-landing-v2.dark .st1,
.coming-soon-header.dark .vodi-svg1,
.dark .vodi-svg1,
.site-footer-landing.dark .site-footer .vodi-svg1,
.header-landing-v2.light .st1,
.header-landing-v1.transparent .vodi-svg1,
.header-landing-v2.transparent .st1,
.coming-soon-header.transparent .vodi-svg1,
.site-footer-landing.transparent .site-footer .vodi-svg1,
.site__footer--v2 .vodi-svg1,
.single-movie .avg-rating .vodi-svg,
.single-tv_show .avg-rating .vodi-svg {
    fill: ' . $primary_color . ';
}

.site-header__upload--link:hover svg,
.site-header__upload--link:focus svg,
.site-header.light .site-header__upload--link:hover svg,
.site-header.light .site-header__upload--link:focus svg {
    fill: ' . $primary_darken_10p . ';
}';

        return $styles;
    }
}

if ( ! function_exists( 'redux_get_custom_color_admin_css' ) ) {
    function redux_get_custom_color_admin_css() {
        global $vodi_options;

        $primary_color                 = isset( $vodi_options['custom_primary_color'] ) ? $vodi_options['custom_primary_color'] : '#24baef';

        $styles             = 
'';

        return $styles;
    }
}

if ( ! function_exists( 'redux_apply_custom_color_css' ) ) {
    function redux_apply_custom_color_css() {
        global $vodi_options;

        if ( isset( $vodi_options['use_predefined_color'] ) && $vodi_options['use_predefined_color'] ) {
            return;
        }

        $how_to_include = isset( $vodi_options['include_custom_color'] ) ? $vodi_options['include_custom_color'] : '1';

        $custom_color_css_external_file = redux_apply_custom_color_css_external_file();
        if ( $custom_color_css_external_file && $how_to_include != '1' ) {
            wp_enqueue_style( 'vodi-custom-color', $custom_color_css_external_file['url'] );
        } else {
            $css = redux_get_custom_color_css();
            $handle = 'vodi-style';
            if ( vodi_is_masvideos_activated() ) {
                $handle = 'vodi-masvideos';
            }
            wp_add_inline_style( $handle, $css );
        }
    }
}

if ( ! function_exists( 'redux_apply_custom_editor_color_palette_options' ) ) {
    function redux_apply_custom_editor_color_palette_options( $colors ) {
        global $vodi_options;

        if ( isset( $vodi_options['use_predefined_color'] ) && $vodi_options['use_predefined_color'] ) {
            return $colors;
        }

        $primary_color      = isset( $vodi_options['custom_primary_color'] ) ? $vodi_options['custom_primary_color'] : '#24baef';

        foreach ( $colors as $key => $color ) {
            if( $color['slug'] == 'primary' ) {
                $colors[$key]['color'] = $primary_color;
            }
        }

        return $colors;
    }
}

function redux_apply_compiler_action( $options, $css, $changed_values ) {
    $custom_color_css_external_file = redux_apply_custom_color_css_external_file();
    if( $custom_color_css_external_file ) {
        Redux_Functions::initWpFilesystem();

        $css = redux_get_custom_color_css();

        $filename = $custom_color_css_external_file['filename'];

        global $wp_filesystem;

        if( $wp_filesystem ) {
            $wp_filesystem->put_contents( $filename, $css );
        }
    }
}

function redux_apply_custom_color_css_external_file() {
    $parent_theme_filename = get_template_directory() . '/assets/css/colors/custom-color.css';
    $parent_theme_fileurl = get_template_directory_uri() . '/assets/css/colors/custom-color.css';
    if( is_child_theme() ) {
        $child_theme_filename = get_stylesheet_directory() . '/custom-color.css';
        $child_theme_fileurl = get_stylesheet_directory_uri() . '/custom-color.css';
    }
    if( isset( $child_theme_filename ) && is_writable( $child_theme_filename ) ) {
        return array( 'filename' => $child_theme_filename, 'url' => $child_theme_fileurl );
    } elseif( isset( $parent_theme_filename ) && is_writable( $parent_theme_filename ) ) {
        return array( 'filename' => $parent_theme_filename, 'url' => $parent_theme_fileurl );
    }

    return false;
}
