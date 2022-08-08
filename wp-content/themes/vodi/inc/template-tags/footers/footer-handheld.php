<?php
/**
 * Template Tags for Footer Handheld
 */
if ( ! function_exists( 'vodi_handheld_footer' ) ) {
    function vodi_handheld_footer() { ?>
        <footer class="site-footer handheld-footer dark">
            <?php 
            do_action( 'vodi_handheld_footer' ); 
            ?>
        </footer><?php
    }
}

if ( ! function_exists( 'vodi_handheld_widgets' ) ) {
    function vodi_handheld_widgets() {
        
    }
}