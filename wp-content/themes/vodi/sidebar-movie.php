<?php
/**
 * The sidebar containing the blog sidebar widget area.
 *
 * @package vodi
 */
if ( ! is_active_sidebar( 'sidebar-movie' ) && ! is_active_sidebar( 'movie-filters' ) ) {
    return;
}
?>

<div id="secondary" class="widget-area sidebar-area movie-sidebar" role="complementary">
    <div class="widget-area-inner">
    	<?php if ( is_active_sidebar( 'movie-filters' )) { ?>
	        <div class="widget widget_vodi_movies_filter">
	            <?php dynamic_sidebar( 'movie-filters' ); ?>
	        </div>
	    <?php } ?>
        
        <?php dynamic_sidebar( 'sidebar-movie' ); ?>
    </div><!-- /.widget-area-inner -->
</div><!-- #secondary -->
