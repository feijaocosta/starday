<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package vodi
 */

get_header(); ?>

    <div id="primary" class="content-area">

        <main id="main" class="site-main" role="main">

            <div class="error-404 not-found">
                <div class="page-content">

                    <h2 class="page-title"><?php echo esc_html__( '404!', 'vodi' ); ?></h2>
                    <p class="page-subtitle"><?php echo esc_html__( 'Nothing was found at this location. Try searching, or check out the links below.', 'vodi' ); ?></p>
                    <div class="sub-form-row">
                        <?php get_search_form(); ?>
                    </div>
                    <div class="home-button">
                        <a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Back to Homepage', 'vodi' ); ?></a>
                    </div>
                </div><!-- .page-content -->
            </div><!-- .error-404 -->
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer();
