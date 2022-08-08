<?php
/**
 * The sidebar containing the blog sidebar widget area.
 *
 * @package vodi
 */
if ( ! is_active_sidebar( 'sidebar-tv-show' ) && ! is_active_sidebar( 'tv-show-filters' ) ) {
    return;
}
?>

<div id="secondary" class="widget-area sidebar-area tv-show-sidebar" role="complementary">
    <div class="widget-area-inner">
    	<?php if (is_active_sidebar( 'tv-show-filters' )) { ?>
	        <div class="widget widget_vodi_tv_shows_filter">
	            <?php dynamic_sidebar( 'tv-show-filters' ); ?>
	        </div>
	    <?php } ?>
        
        <?php dynamic_sidebar( 'sidebar-tv-show' ); ?>
    </div><!-- /.widget-area-inner -->
</div><!-- #secondary -->
