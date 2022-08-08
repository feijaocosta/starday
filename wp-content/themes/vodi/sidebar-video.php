<?php
/**
 * The sidebar containing the blog sidebar widget area.
 *
 * @package vodi
 */
if ( ! is_active_sidebar( 'sidebar-video' ) && ! is_active_sidebar( 'video-filters' ) ) {
    return;
}
?>

<div id="secondary" class="widget-area sidebar-area video-sidebar" role="complementary">
    <div class="widget-area-inner">
    	<?php if (is_active_sidebar( 'video-filters' )) { ?>
	        <div class="widget widget_vodi_videos_filter">
	            <?php dynamic_sidebar( 'video-filters' ); ?>
	        </div>
        <?php } ?>
        
        <?php dynamic_sidebar( 'sidebar-video' ); ?>
    </div><!-- /.widget-area-inner -->
</div><!-- #secondary -->
