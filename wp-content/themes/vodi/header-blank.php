<?php
/**
 * The header blank for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package vodi
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'vodi_before_site' ); ?>

<div id="page" class="hfeed site">

    <?php
    /**
     * Functions hooked in to vodi_before_content
     *
     * @hooked vodi_header_widget_region - 10
     * @hooked woocommerce_breadcrumb - 10
     */
    do_action( 'vodi_before_content' );
    ?>

    <div id="content" class="site-content" tabindex="-1">
        
        <?php do_action( 'vodi_content_top' ); ?>
        
            <div class="site-content__inner">