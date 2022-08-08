( function( $, window ) {
    'use strict';

    var is_rtl = $( 'body,html' ).hasClass( 'rtl' );

    $(document).ready( function() {
        $('[data-ride="vodi-slick-carousel"]').each( function() {
            var $slick_target = false;

            if ( $(this).data( 'slick' ) !== 'undefined' && $(this).find( $(this).data( 'wrap' ) ).length > 0 ) {
                $slick_target = $(this).find( $(this).data( 'wrap' ) );
                $slick_target.data( 'slick', $(this).data( 'slick' ) );
            } else if ( $(this).data( 'slick' ) !== 'undefined' && $(this).is( $(this).data( 'wrap' ) ) ) {
                $slick_target = $(this);
            }

            if( $slick_target ) {
                $slick_target.slick();
            }
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var $target = $(e.target).attr("href");
            $($target).find('[data-ride="vodi-slick-carousel"]').each( function() {
                var $current_element = $(this);
                var $slick_target = $(this).data('wrap');
                if( $($current_element).find($slick_target).length > 0 ) {
                    $($current_element).find($slick_target).slick('setPosition');
                }
            });
        });

        $('.site_header__primary-nav li.yamm-fw.menu-item-has-children').on('mouseenter', function (e) {
            var $target = $(this).children('.sub-menu');
            $($target).find('[data-ride="vodi-slick-carousel"]').each( function() {
                var $current_element = $(this);
                var $slick_target = $current_element.data('wrap');
                if( $($current_element).find($slick_target).length > 0 ) {
                    $($current_element).find($slick_target).slick('setPosition');
                }
            });
        });
    });

} )( jQuery, window );
