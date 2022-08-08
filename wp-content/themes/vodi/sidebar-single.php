<?php
/**
 * The sidebar containing the single post sidebar widget area.
 *
 * @package vodi
 */
if ( ! is_active_sidebar( 'sidebar-single' ) ) {
    return;
}
?>

<div id="secondary" class="widget-area sidebar-area blog-sidebar" role="complementary">
    <div class="widget-area-inner">
        <?php dynamic_sidebar( 'sidebar-single' ); ?>
    </div><!-- /.widget-area-inner -->
</div><!-- #secondary -->