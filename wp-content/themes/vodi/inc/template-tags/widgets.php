<?php 
/**
 * Template functions used in Widgets
 */

if ( ! function_exists( 'vodi_modify_widget_categories_args' ) ) {
    function vodi_modify_widget_categories_args( $args, $instance ) {
        require_once get_template_directory() . '/inc/classes/class-vodi-walker-category.php';
        $args['walker'] = new Vodi_Walker_Category;
        return $args;
    }
}