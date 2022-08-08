<?php

if ( ! function_exists( 'vodi_comingsoon_launch_section' ) ) {
    function vodi_comingsoon_launch_section( $args = array() ) {
        $defaults = apply_filters( 'vodi_comingsoon_launch_section_default_args', array(
            'section_title'           => wp_kses_post( __( 'Get Ready For Our<br> Vodi Launch', 'vodi' ) ),
            'section_desc'            => wp_kses_post( __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br> Amet quisquam fugiat ipsa.', 'vodi' ) ),
            'form_shortcode'          => '',
            'action_text'             => esc_html__( 'SUBSCRIBE', 'vodi' ),
            'placehold_text'          => esc_html__( 'Enter E-mail Address', 'vodi' ),
        ) );

        $args = wp_parse_args( $args, $defaults );

        extract( $args );

        $section_class = 'comingsoon-launch-section';


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

        ?>
        <section class="<?php echo esc_attr( $section_class ); ?>"<?php if ( !empty( $style_attr ) ) : ?>style="<?php echo esc_attr( $style_attr );?>"<?php endif; ?>>
            <div class="comingsoon-launch-section__inner">
                <?php 
                if( ! empty( $section_title ) || ! empty( $section_desc ) ) { ?>
                    <div class="comingsoon-launch-section__subscribe">
                        <div class="comingsoon-launch-section__caption">
                            <h2 class="comingsoon-launch-section__title"><?php echo wp_kses_post( $section_title ); ?></h2> 
                            <p class="comingsoon-launch-section__desc"><?php echo wp_kses_post( $section_desc ); ?></p>
                        </div>  
                        <div class="comingsoon-launch-section__subscribe-form">
                            <?php if( ! empty( $form_shortcode ) ) : ?>
                                <?php echo do_shortcode( $form_shortcode ); ?>
                            <?php else : ?>
                                <form method="get">
                                    <input type="text" class="email" placeholder="<?php echo esc_attr( $placehold_text ); ?>"/>
                                    <button class="btn-subscribe"><?php echo wp_kses_post( $action_text ); ?></button>
                                </form>
                            <?php endif; ?>
                        </div>   
                    </div><?php
                }?>
            </div>
        </section><?php
    }
}

if ( ! function_exists( 'vodi_comingsoon_bg_image' ) ) {
    function vodi_comingsoon_bg_image() {
        $bg_img = '';
        if( is_page_template( 'template-comingsoon.php' ) && has_post_thumbnail() ) {
            $bg_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
            if ( ! empty ( $bg_url ) ) {
                $bg_img = 'background-image: url(' . esc_url( $bg_url ) . ');';
                $bg_img = 'style="' . esc_attr( $bg_img ) . '"';
            }
        }
        return $bg_img;
    }
}