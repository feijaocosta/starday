<?php
/**
 * Template functions for My Account
 */

if ( ! function_exists( 'vodi_myaccount_page_header' ) ) {
    function vodi_myaccount_page_header() {
        if ( is_user_logged_in() && ( function_exists( 'masvideos_is_account_page' ) && masvideos_is_account_page() ) ) {
            remove_action( 'vodi_content_top', 'vodi_page_header' , 10 );
            ?><header class="my-account-page__header stretch-full-width">
                <div class="container">
                    <?php vodi_myaccount_user_info() ?>
                    <?php masvideos_account_navigation(); ?>
                            
                </div>
            </header><?php
        }
    }
}

if ( ! function_exists( 'vodi_myaccount_user_info' ) ) {
    function vodi_myaccount_user_info() {
        if ( is_user_logged_in() ) {
            $current_user = wp_get_current_user();
            ?>
            <div class="media user-info">
                <a class="media-left avatar-link" href="<?php echo esc_url( get_author_posts_url( $current_user->ID ) ); ?>" rel="author"><?php echo get_avatar( $current_user->ID, 120, '', '', array( 'class' => 'img-fluid' ) ); ?></a>
                <div class="media-body">
                    <h1 class="media-heading author-name"><?php echo esc_html( $current_user->display_name ); ?></h1>
                    <span class="author-mail"><?php echo esc_html( $current_user->user_email ); ?></span>
                </div>
            </div><?php
        }
    }
}

if ( ! function_exists( 'vodi_register_login_form_start' ) ) {
    function vodi_register_login_form_start() {
        ?>
        <div class="vodi-register-login-form">
            <div class="vodi-register-login-form-inner">
                <ul class="nav" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="vo-register-tab" data-toggle="pill" href="#vo-register-tab-content" role="tab" aria-controls="vo-register-tab-content" aria-selected="true"><?php echo esc_html__( 'Register', 'vodi'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="vo-login-tab" data-toggle="pill" href="#vo-login-tab-content" role="tab" aria-controls="vo-login-tab-content" aria-selected="false"><?php echo esc_html__( 'Login', 'vodi'); ?></a>
                    </li>
                </ul>
                <div class="tab-content">
        <?php
    }
}

if ( ! function_exists( 'vodi_register_login_form_end' ) ) {
    function vodi_register_login_form_end() {
        ?>
                </div>
            </div>
        </div>
        <?php
    }
}

if ( ! function_exists( 'vodi_register_login_form_register_start' ) ) {
    function vodi_register_login_form_register_start() {
        ?>
        <div class="tab-pane fade show active" id="vo-register-tab-content" role="tabpanel" aria-labelledby="vo-register-tab">
        <?php
    }
}

if ( ! function_exists( 'vodi_register_login_form_login_start' ) ) {
    function vodi_register_login_form_login_start() {
        ?>
        <div class="tab-pane fade" id="vo-login-tab-content" role="tabpanel" aria-labelledby="vo-login-tab">
        <?php
    }
}

if ( ! function_exists( 'vodi_register_login_form_tab_wrap_end' ) ) {
    function vodi_register_login_form_tab_wrap_end() {
        ?>
        </div>
        <?php
    }
}

if ( ! function_exists( 'vodi_video_upload_instructions' ) ) {
    function vodi_video_upload_instructions() {

        if ( apply_filters( 'vodi_enable_video_upload_instructions', false ) ) {
            $args = apply_filters( 'vodi_video_upload_instructions_args', array(
                'instructions'      => array(
                    array(
                        'img_src'       => '//placehold.it/34x36',
                        'ins_detail'    => wp_kses_post('– <span>No</span> videos that is copyrighted, content with WATERMARKS (text domains or logos), unless you are the author or have permission from the owner to post it. If you own the copyright, please contact us to get a <a href="#">producer`s account</a>'),
                    ),
                    array(
                        'img_src'       => '//placehold.it/34x36',
                        'ins_detail'    => wp_kses_post('<span class="title">Are you looking for general advice on content?</span>- Our Community Guidelines will help you avoid the hassles and your content with visitors will grow.'),
                    ),
                )
            ) );

            extract( $args );

            ?><div class="upload-instructions">
                <div class="upload-instructions-inner">
                    <?php foreach ($instructions as $instruction) : ?>
                        <?php if ( ! empty( $instruction['ins_detail'] ) ) : ?>
                            <div class="upload-instruction">
                                <div class="instruction-icon">
                                    <img src="<?php echo esc_url( $instruction['img_src'] ); ?>" alt="" />
                                </div>
                                <div class="instruction-details"><?php echo wp_kses_post( $instruction['ins_detail'] ); ?></div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div><?php
        }
    }
}

if ( ! function_exists( 'vodi_display_recently_reviewed_movies' ) ) {
    function vodi_display_recently_reviewed_movies() {
        if ( apply_filters( 'vodi_display_recently_reviewed_movies', false ) && is_user_logged_in() ) {
            global $current_user;

            $comment_args = array(
                'user_id'   => $current_user->ID,
                'post_type' => array( 'movie' ),
                'number'    => 12,
                'status'    => 'approve'
            );

            $recently_reviewed_ids = vodi_get_recent_comment_post_ids( $comment_args );
            if( ! empty( $recently_reviewed_ids ) ) {
                $args = apply_filters( 'vodi_display_recently_reviewed_movies_args', array(
                    'limit'          => 12,
                    'columns'        => 6,
                    'orderby'        => 'post__in',
                    'order'          => 'asc',
                    'ids'            => implode( ',', $recently_reviewed_ids )
                ) );

                $title = apply_filters( 'vodi_display_recently_reviewed_movies_title', esc_html__( 'Recently Reviewed Movies', 'vodi' ), $current_user->ID );

                echo '<section class="movies__recently-reviewed">';
                    echo sprintf( '<h2 class="movies__recently-reviewed--title">%s</h2>', $title );
                    echo MasVideos_Shortcodes::movies( $args );
                echo '</section>';
            }
        }
    }
}

if ( ! function_exists( 'vodi_display_recently_reviewed_tv_shows' ) ) {
    function vodi_display_recently_reviewed_tv_shows() {
        if ( apply_filters( 'vodi_display_recently_reviewed_tv_shows', false ) && is_user_logged_in() ) {
            global $current_user;

            $comment_args = array(
                'user_id'   => $current_user->ID,
                'post_type' => array( 'tv_show' ),
                'number'    => 12,
                'status'    => 'approve'
            );

            $recently_reviewed_ids = vodi_get_recent_comment_post_ids( $comment_args );
            if( ! empty( $recently_reviewed_ids ) ) {
                $args = apply_filters( 'vodi_display_recently_reviewed_tv_shows_args', array(
                    'limit'          => 12,
                    'columns'        => 6,
                    'orderby'        => 'post__in',
                    'order'          => 'asc',
                    'ids'            => implode( ',', $recently_reviewed_ids )
                ) );

                $title = apply_filters( 'vodi_display_recently_reviewed_tv_shows_title', esc_html__( 'Recently Reviewed TV Shows', 'vodi' ), $current_user->ID );

                echo '<section class="tv-shows__recently-reviewed">';
                    echo sprintf( '<h2 class="tv-shows__recently-reviewed--title">%s</h2>', $title );
                    echo MasVideos_Shortcodes::tv_shows( $args );
                echo '</section>';
            }
        }
    }
}
