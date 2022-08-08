<?php
/**
 * The template for displaying the Landing Page footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package vodi
 */

?>

            </div><!-- /.site-content-inner -->

        </div><!--/.container-->
        
    </div><!-- /.site-content-->

    <?php do_action( 'vodi_before_footer' ); ?>

    <footer id="colophon" class="site-footer-landing <?php echo esc_attr( apply_filters( 'vodi_footer_theme', 'dark' ) ); ?>" role="contentinfo">
        <div class="site-footer">
            <div class="container">
            
                <?php
                /**
                 * Functions hooked in to vodi_footer_landing action
                 */
                do_action( 'vodi_footer_landing' );
                ?>
            
            </div><!-- .container -->
        </div><!-- .site-footer -->
    </footer>

    <?php do_action( 'vodi_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>