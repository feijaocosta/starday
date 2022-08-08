( function( $, window ) {
    'use strict';

    var is_rtl = $( 'body,html' ).hasClass( 'rtl' );

    /**
     * Gallery Post Slide Show
     */

    $( '.article__attachment--gallery > .gallery' ).each( function() {
        var $this = $( this ), showDots = true, columns = 1, classNames = '', index = 0;

        classNames = $this.attr( 'class' );
        index      = classNames.indexOf( 'gallery-columns-') + 16;
        columns    = Number( classNames.substr( index, 1 ) );

        showDots =  ! ( ( $this.find( '.gallery-item' ).length / columns ) > 10 );

        $this.slick( {
            slidesToShow: columns,
            slidesToScroll: columns,
            dots: showDots,
            arrows: ! showDots
        } );
    } );

    /**
     * Movies Carousel
     */
    $( '.movies-carousel__inner:not([data-ride="vodi-slick-carousel"])' ).each( function() {
        $( this ).slick();
    } );


    /**
     * Videos Carousel
     */
    $( '.videos-carousel__inner:not([data-ride="vodi-slick-carousel"])' ).each( function() {
        $( this ).slick();
    } );


    /**
     * TV Episode Carousel
     */
    $( '.episodes-carousel__inner:not([data-ride="vodi-slick-carousel"])' ).each( function() {
        $( this ).slick();
    } );

    /**
     * Playlist Carousel
     */
    $( '.movies-collection-carousel__inner:not([data-ride="vodi-slick-carousel"])' ).each( function() {
        $( this ).slick();
    } );

    function vodiReadmore() {
        if( vodi_options.enable_vodi_readmore == '1' && vodi_options.vodi_readmore_data.length > 0 ) {
            $.each( vodi_options.vodi_readmore_data, function ( i, data ) {
                new Readmore( data.selectors, data.options );
            });
        }
    }

    $('.single-video__comments-link__inner > a').on('click', function(e) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });


    /*===================================================================================*/
    /*  Off Canvas Menu
    /*===================================================================================*/

    $( '.site-header__offcanvas .navbar-toggler' ).on( 'click', function() {
        if ( $( this ).parents( '.stuck' ).length > 0 ) {
            $('html, body').animate({
                scrollTop: $('body')
            }, 0);
        }
            
        $( this ).closest('.site-header__offcanvas').toggleClass( "toggled" );
        $('body').toggleClass( "off-canvas-active" );

    } );


    // Hamburger Sidebar Close Trigger when click outside menu slide
    $( document ).on( 'click', function( event ) {
        if ( $( '.site-header__offcanvas' ).hasClass( 'toggled' ) ) {
            if ( ! $( '.navbar-toggler' ).is( event.target ) && 0 === $( '.navbar-toggler' ).has( event.target ).length && ! $( '.offcanvas-collapse' ).is( event.target ) && 0 === $( '.offcanvas-collapse' ).has( event.target ).length ) {
                $( '.site-header__offcanvas' ).removeClass( 'toggled' );
                $('body').removeClass( "off-canvas-active" );
            }
        }
    });

    /*===================================================================================*/
    /*  Add Animated Dropdown Class
    /*===================================================================================*/
    $( '.site_header__primary-nav, .site_header__secondary-nav, .site_header__secondary-nav-v3, .site_header__navbar-primary' ).on( 'mouseleave', function() {
        var $this = $(this);
        $this.removeClass( 'animated-dropdown' );
    });

    $( '.site_header__primary-nav .menu-item, .site_header__secondary-nav .menu-item, .site_header__secondary-nav-v3 .menu-item, .site_header__navbar-primary .menu-item' ).on( 'mouseenter', function() {
        var $this = $(this),
            $departments_menu = $this.parents( '.site_header__primary-nav, .site_header__secondary-nav, .site_header__secondary-nav-v3, .site_header__navbar-primary' ),
            $container = $this.parents( '.vodi-animate-dropdown' );

        if ( $departments_menu.length > 0 ) {
            $container = $departments_menu;
        }

        if ( $this.hasClass( 'menu-item-has-children' ) ) {
            if ( ! $container.hasClass( 'animated-dropdown' ) ) {
                setTimeout(function(){
                    $container.addClass( 'animated-dropdown' );
                }, 200);
            }
        } else if ( $container.hasClass( 'animated-dropdown' ) ) {
            var $parent = $this.parents( '.menu-item-has-children' );
            if ( $parent.length <= 0 ) {
                $container.removeClass( 'animated-dropdown' );
            }
        }
    });

    /*===================================================================================*/
    /*  Tab Widgets
    /*===================================================================================*/

    $( '.vtw-tabbed-tabs').each( function(){
        var tabs =  $( this );

        tabs.on( 'click', '.vtw-tabbed-nav li', function( e ){
            e.preventDefault();
            var tab = $( this );
            var t = tab.attr( 'data-tab' );
            if ( typeof t !== "undefined" ) {
               $( '.vtw-tabbed-nav li', tabs ).removeClass('tab-active' );
                tab.addClass( 'tab-active' );
                $( '.vtw-tabbed-cont',  tabs).removeClass('tab-active');
                $( '.vtw-tabbed-cont.'+t,  tabs).addClass('tab-active');

            }
        } );

        $( '.vtw-tabbed-nav li', tabs).eq( 0).trigger( 'click' );
    } );

    /*===================================================================================*/
    /*  Header v3 search
    /*===================================================================================*/

    // Search Toggler
    $( '.site-header__inner .site-header__search .search-btn' ).on( 'click', function(e) {
        $( this ).closest('.site-header__search').toggleClass( "show" );
    } );

    //Search Close Trigger when click outside
    $( document ).on( 'click', function(event) {
        if ( $( '.site-header__search' ).hasClass( 'show' ) ) {
            if ( ! $( '.site-header__search' ).is( event.target ) && 0 === $( '.site-header__search' ).has( event.target ).length ) {
                $( '.site-header__search' ).removeClass( "show" );
                $('.search-form').removeClass( 'animated fadeInRight' );
            }

        }
    });

    /*===================================================================================*/
    /*  Handheld Sidebar
    /*===================================================================================*/
    // Handheld Sidebar Toggler

    $( '.handheld-sidebar-toggle .sidebar-toggler' ).on( 'click', function() {
        $( this ).closest('.site-content').toggleClass( "active-hh-sidebar" );
    } );


    // Handheld Sidebar Close Trigger when click outside menu slide

    $( document ).on("click", function(event) {
        if ( $( '.site-content' ).hasClass( 'active-hh-sidebar' ) ) {
            if ( ! $( '.handheld-sidebar-toggle' ).is( event.target ) && 0 === $( '.handheld-sidebar-toggle' ).has( event.target ).length && ! $( '#secondary' ).is( event.target ) && 0 === $( '#secondary' ).has( event.target ).length ) {
                $( '.site-content' ).toggleClass( "active-hh-sidebar" );
            }
        }
    });

    /*===================================================================================*/
    /*  Countdown timer
    /*===================================================================================*/

    $( '.count-down-timer' ).each( function() {
        var current_block = $(this);
        var end_time = $(current_block).children('.count-down-timer-end').text();
        var wp_local_time_offset = vodi_options.wp_local_time_offset;
        var end_time = end_time - ( wp_local_time_offset * 3600 );
        var end_time_ms = end_time * 1000;

        var days, hours, minutes, seconds, currenttime, currenttime_ms, difference_sec;

        setInterval( function () {
            currenttime = new Date();
            currenttime = currenttime.toUTCString();
            currenttime_ms = Date.parse(currenttime);
            difference_sec = ( end_time_ms - currenttime_ms ) /1000;

            days = parseInt(difference_sec / 86400);
            difference_sec = difference_sec % 86400;

            hours = parseInt(difference_sec / 3600);
            difference_sec = difference_sec % 3600;

            minutes = parseInt(difference_sec / 60);
            seconds = parseInt(difference_sec % 60);

            $(current_block).find('.days > .value').html(days);
            $(current_block).find('.hours > .value').html(hours);
            $(current_block).find('.minutes > .value').html(minutes);
            $(current_block).find('.seconds > .value').html(seconds);
        }, 1000 );
    });


    $( document ).ready( function() {

        /*===================================================================================*/
        /*  Read more switcher
        /*===================================================================================*/
        vodiReadmore();

        /*===================================================================================*/
        /*  Shop Grid/List Switcher
        /*===================================================================================*/
        $( '.archive-view-switcher' ).on( 'click', '.nav-link', function() {
            var $this = $(this), archiveClass = $this.data( 'archiveClass' ), 
                columns = $this.data( 'archiveColumns' ), originalClassName = 'columns-' + columns,
                extendedClassName = 'columns-' + ( parseInt( columns ) - 1 ), 
                $archives = $( '.vodi-archive-wrapper > div' );
            $( '.vodi-archive-wrapper' ).attr( 'data-view', archiveClass );
            if ( 'grid-extended' == archiveClass ) {
                $archives.removeClass( originalClassName );
                $archives.addClass( extendedClassName );
            } else {
                $archives.removeClass( extendedClassName );
                $archives.addClass( originalClassName );
            }
        });

        /*===================================================================================*/
        /*  Live Search
        /*===================================================================================*/
        if( vodi_options.enable_live_search ) {
            $( '.masvideos-search-movie .search-field' ).autocomplete({
                source: function(req, response){
                    $.getJSON( vodi_options.ajax_url + '?callback=?&action=vodi_live_search_movies_suggest', req, response);
                },
                select: function(event, ui) {
                    location.href = ui.item.link;
                },
                open: function(event, ui) {
                    $(this).autocomplete("widget").width($(this).innerWidth());
                },
                minLength: 3
            });

            $( '.masvideos-search-tv_show .search-field' ).autocomplete({
                source: function(req, response){
                    $.getJSON( vodi_options.ajax_url + '?callback=?&action=vodi_live_search_tv_shows_suggest', req, response);
                },
                select: function(event, ui) {
                    location.href = ui.item.link;
                },
                open: function(event, ui) {
                    $(this).autocomplete("widget").width($(this).innerWidth());
                },
                minLength: 3
            });

            $( '.masvideos-search-video .search-field' ).autocomplete({
                source: function(req, response){
                    $.getJSON( vodi_options.ajax_url + '?callback=?&action=vodi_live_search_videos_suggest', req, response);
                },
                select: function(event, ui) {
                    location.href = ui.item.link;
                },
                open: function(event, ui) {
                    $(this).autocomplete("widget").width($(this).innerWidth());
                },
                minLength: 3
            });
        }

        /*===================================================================================*/
        /*  Modal Iframe Width
        /*===================================================================================*/
        $('.single-movie-popup').each( function() {

            var $this = $(this), playerWrapper = $this.find( '.movie__player' ), $width, contentWidth;

            if( playerWrapper.find( 'iframe', 'video' ).attr( "width" || "data-origwidth" ) ) {
                contentWidth = playerWrapper.find( 'iframe', 'video' ).attr( "width" || "data-origwidth" );
            } else if( playerWrapper.find( '.wp-video' ).length > 0 ) {
                var contentWidthpx = playerWrapper.find( '.wp-video' ).get(0).style.width;
                contentWidth = parseInt( contentWidthpx, 10 );
            }

            $width = contentWidth;

            if( $width && ( $( window ).width() < $width ) ) {
                $width = $( window ).width();
            }

            $this.css("width", $width + "px");

            $(window).resize( function() {
                var $resizeWidth = contentWidth;

                if( $resizeWidth && ( $( window ).width() < $resizeWidth ) ) {
                    $resizeWidth = $( window ).width();
                }

                $this.css("width", $resizeWidth + "px");
            } );

        } );

        /*===================================================================================*/
        /*  STICKY NAVIGATION
        /*===================================================================================*/
        // If we're in desktop orientation...
        if ( $( window ).width() >= 1200 ) {
            if( vodi_options.enable_sticky_header == '1' && $( "#page" ).find( '.stick-this' ).length > 0 ) {
                var sticky_header = new Waypoint.Sticky({
                    element: $('.stick-this')[0],
                    stuckClass: 'stuck animated fadeInDown faster',
                    offset: function() {
                        return -this.element.clientHeight
                    }
                });
            }

        }


        $(".transparent").parent(".sticky-wrapper").addClass('sticky-wrapper-transparent');


        // If we're in hand-held navigation...
        if ( $( window ).width() < 1200 ) {
            if( vodi_options.enable_sticky_header == '1' && $( "#page" ).find( '.handheld-navbar-toggle-buttons' ).length > 0 ) {
                var sticky_hh_nav = new Waypoint.Sticky({
                    element: $('.handheld-navbar-toggle-buttons')[0],
                    stuckClass: 'stuck animated fadeInDown faster'
                });
            }

            if( vodi_options.enable_hh_sticky_header == '1' && $( '#page' ).find( '.handheld-stick-this' ).length > 0 ) {
                var sticky_header = new Waypoint.Sticky({
                    element: $('.handheld-stick-this')[0],
                    stuckClass: 'stuck animated fadeInDown faster',
                    offset: function() {
                        return -this.element.clientHeight
                    }
                });
            }
        }
    });

    $('[data-fancybox]').fancybox( vodi_options.vodi_fancybox_options );

} )( jQuery, window );
