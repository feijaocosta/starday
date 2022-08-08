<?php
/**
 * Vodi Helper Class for MasVidos
 */

class Vodi_MasVideos_Helper {
    public static function init() {
        // Add Vodi Fields
        add_action( 'wp_ajax_vodi_json_search_posts',  array( 'Vodi_MasVideos_Helper', 'json_search_posts' ) );
        add_action( 'masvideos_movie_options_general_movie_data', array( 'Vodi_MasVideos_Helper', 'add_movie_options_general_movie_data' ) );
        add_action( 'masvideos_video_options_general_video_data', array( 'Vodi_MasVideos_Helper', 'add_video_options_general_video_data' ) );
        add_action( 'masvideos_episode_options_general_episode_data', array( 'Vodi_MasVideos_Helper', 'add_episode_options_general_episode_data' ) );
        add_action( 'masvideos_tv_show_options_general_tv_show_data', array( 'Vodi_MasVideos_Helper', 'add_tv_show_options_general_tv_show_data' ) );

        // Save Vodi Fields
        add_action( 'masvideos_process_movie_meta', array( 'Vodi_MasVideos_Helper', 'save_movie_general_panel_data' ) );
        add_action( 'masvideos_process_video_meta', array( 'Vodi_MasVideos_Helper', 'save_video_general_panel_data' ) );
        add_action( 'masvideos_process_episode_meta', array( 'Vodi_MasVideos_Helper', 'save_episode_general_panel_data' ) );
        add_action( 'masvideos_process_tv_show_meta', array( 'Vodi_MasVideos_Helper', 'save_tv_show_general_panel_data' ) );
    }

    /**
     * Search for posts and echo json.
     *
     * @param string $term (default: '')
     * @param string $post_types (default: array('post'))
     */
    public static function json_search_posts( $term = '', $post_types = array( 'post' ) ) {
        global $wpdb;

        ob_start();

        check_ajax_referer( 'search-movies', 'security' );

        if ( empty( $term ) ) {
            $term = masvideos_clean( stripslashes( $_GET['term'] ) );
        } else {
            $term = masvideos_clean( $term );
        }

        if ( empty( $term ) ) {
            die();
        }

        $like_term = '%' . $wpdb->esc_like( $term ) . '%';

        if ( is_numeric( $term ) ) {
            $query = $wpdb->prepare( "
                SELECT ID FROM {$wpdb->posts} posts LEFT JOIN {$wpdb->postmeta} postmeta ON posts.ID = postmeta.post_id
                WHERE posts.post_status = 'publish'
                AND (
                    posts.post_parent = %s
                    OR posts.ID = %s
                    OR posts.post_title LIKE %s
                    OR (
                        postmeta.meta_key = '_sku' AND postmeta.meta_value LIKE %s
                    )
                )
            ", $term, $term, $term, $like_term );
        } else {
            $query = $wpdb->prepare( "
                SELECT ID FROM {$wpdb->posts} posts LEFT JOIN {$wpdb->postmeta} postmeta ON posts.ID = postmeta.post_id
                WHERE posts.post_status = 'publish'
                AND (
                    posts.post_title LIKE %s
                    or posts.post_content LIKE %s
                    OR (
                        postmeta.meta_key = '_sku' AND postmeta.meta_value LIKE %s
                    )
                )
            ", $like_term, $like_term, $like_term );
        }

        $query .= " AND posts.post_type IN ('" . implode( "','", array_map( 'esc_sql', $post_types ) ) . "')";

        if ( ! empty( $_GET['exclude'] ) ) {
            $query .= " AND posts.ID NOT IN (" . implode( ',', array_map( 'intval', explode( ',', $_GET['exclude'] ) ) ) . ")";
        }

        if ( ! empty( $_GET['include'] ) ) {
            $query .= " AND posts.ID IN (" . implode( ',', array_map( 'intval', explode( ',', $_GET['include'] ) ) ) . ")";
        }

        if ( ! empty( $_GET['limit'] ) ) {
            $query .= " LIMIT " . intval( $_GET['limit'] );
        }

        $posts          = array_unique( $wpdb->get_col( $query ) );
        $found_posts = array();

        if ( ! empty( $posts ) ) {
            foreach ( $posts as $post ) {
                $found_posts[ $post ] = rawurldecode( get_the_title( $post ) );
            }
        }

        $found_posts = apply_filters( 'vodi_json_search_found_posts', $found_posts );

        wp_send_json( $found_posts );
    }

    public static function add_movie_options_general_movie_data() {
        global $post;
        ?><div class="options_group"><?php
            masvideos_wp_select(
                array(
                    'id'            => '_vodi_movie_style',
                    'label'         => esc_html__( 'Choose Movie Style', 'vodi' ),
                    'options'       => array(
                        ''      => esc_html__( 'Dafault', 'vodi' ),
                        'v1'    => esc_html__( 'Style v1', 'vodi' ),
                        'v2'    => esc_html__( 'Style v2', 'vodi' ),
                        'v3'    => esc_html__( 'Style v3', 'vodi' ),
                        'v4'    => esc_html__( 'Style v4', 'vodi' ),
                        'v5'    => esc_html__( 'Style v5', 'vodi' ),
                        'v6'    => esc_html__( 'Style v6', 'vodi' ),
                        'v7'    => esc_html__( 'Style v7', 'vodi' ),
                    ),
                )
            );
            masvideos_wp_upload_image(
                array(
                    'id'            => '_vodi_movie_bg_image',
                    'label'         => esc_html__( 'Background Image', 'vodi' ),
                    'placeholder'   => true,
                )
            );
            masvideos_wp_upload_image(
                array(
                    'id'            => '_vodi_movie_banner_image',
                    'label'         => esc_html__( 'Banner Image', 'vodi' ),
                    'placeholder'   => true,
                )
            );
            masvideos_wp_text_input(
                array(
                    'id'            => '_vodi_movie_banner_link',
                    'label'         => esc_html__( 'Banner Link', 'vodi' ),
                    'description'   => esc_html__( 'Enter the url of the Banner.', 'vodi' ),
                )
            );

            ?>
            <p class="form-field">
                <label for="related_post_ids"><?php esc_html_e( 'Related Posts', 'vodi' ); ?></label>
                <select class="multiselect posts masvideos-enhanced-search" multiple="multiple" style="width: 50%;" id="related_post_ids" name="vodi_movie_related_posts[]" data-placeholder="<?php esc_attr_e( 'Search for a related post&hellip;', 'vodi' ); ?>" data-action="vodi_json_search_posts" data-sortable="true" data-nonce_key="search_movies_nonce">
                    <?php
                    $post_ids = array_filter( array_map( 'absint', (array) get_post_meta( $post->ID, '_vodi_movie_related_posts', true ) ) );

                    foreach ( $post_ids as $post_id ) {
                        echo '<option value="' . esc_attr( $post_id ) . '"' . selected( true, true, false ) . '>' . get_the_title( $post_id ) . '</option>';
                    }
                    ?>
                </select>
            </p>

            <?php
            if( ! empty ( $post ) ) {
                $comments = get_comments( array(
                    'post_id' => $post->ID,
                ) );

                $comment_options = array(
                    '' => __( 'Select Any Comment', 'vodi' ),
                );

                if( ! empty( $comments ) ) {
                    foreach( $comments as $comment ) {
                        $comment_options[$comment->comment_ID] = sprintf( esc_html( "%s - %s" ), $comment->comment_ID, $comment->comment_author );
                    }
                } else {
                    $comment_options = array(
                        '' => __( 'No Comments Found', 'vodi' ),
                    );
                }
            } else {
                $comment_options = array(
                    '' => __( 'No Comments Found', 'vodi' ),
                );
            }

            masvideos_wp_select(
                array(
                    'id'            => '_vodi_movie_highlighted_comment',
                    'label'         => esc_html__( 'Highlighted Comment', 'vodi' ),
                    'options'       => $comment_options,
                )
            );
            masvideos_wp_text_input(
                array(
                    'id'            => '_vodi_movie_buy_ticket_text',
                    'label'         => esc_html__( 'Buy Ticket Button Text', 'vodi' ),
                    'description'   => esc_html__( 'Enter the text for the buy ticket button.', 'vodi' ),
                )
            );
            masvideos_wp_text_input(
                array(
                    'id'            => '_vodi_movie_buy_ticket_link',
                    'label'         => esc_html__( 'Buy Ticket Button Link', 'vodi' ),
                    'description'   => esc_html__( 'Enter the url of the buy ticket button.', 'vodi' ),
                )
            );
            masvideos_wp_text_input(
                array(
                    'id'            => '_vodi_movie_play_trailer_text',
                    'label'         => esc_html__( 'Play Trailer Button Text', 'vodi' ),
                    'description'   => esc_html__( 'Enter the text for the play trailer button.', 'vodi' ),
                )
            );
            masvideos_wp_text_input(
                array(
                    'id'            => '_vodi_movie_play_trailer_link',
                    'label'         => esc_html__( 'Play Trailer Button Link', 'vodi' ),
                    'description'   => esc_html__( 'Enter the url of the play trailer button.', 'vodi' ),
                )
            );
            masvideos_wp_text_input(
                array(
                    'id'            => '_vodi_related_movies_by_person_title',
                    'label'         => esc_html__( 'Person Related Movie\'s Title', 'vodi' ),
                )
            );
        ?></div><?php
    }

    public static function save_movie_general_panel_data( $post_id ) {
        $vodi_movie_style           = isset( $_POST['_vodi_movie_highlighted_comment'] ) ? masvideos_clean( $_POST['_vodi_movie_style'] ) : '';
        $vodi_movie_banner_image    = isset( $_POST['_vodi_movie_banner_image'] ) ? masvideos_clean( $_POST['_vodi_movie_banner_image'] ) : '';
        $vodi_movie_banner_link     = isset( $_POST['_vodi_movie_banner_link'] ) ? masvideos_clean( $_POST['_vodi_movie_banner_link'] ) : '';
        $vodi_movie_bg_image        = isset( $_POST['_vodi_movie_bg_image'] ) ? masvideos_clean( $_POST['_vodi_movie_bg_image'] ) : '';
        $vodi_movie_related_posts   = isset( $_POST['vodi_movie_related_posts'] ) ? array_map( 'intval', (array) wp_unslash( $_POST['vodi_movie_related_posts'] ) ) : array();
        $vodi_movie_highlighted_comment = isset( $_POST['_vodi_movie_highlighted_comment'] ) ? masvideos_clean( $_POST['_vodi_movie_highlighted_comment'] ) : '';
        $vodi_movie_buy_ticket_text = isset( $_POST['_vodi_movie_buy_ticket_text'] ) ? masvideos_clean( $_POST['_vodi_movie_buy_ticket_text'] ) : '';
        $vodi_movie_buy_ticket_link = isset( $_POST['_vodi_movie_buy_ticket_link'] ) ? masvideos_clean( $_POST['_vodi_movie_buy_ticket_link'] ) : '';
        $vodi_movie_play_trailer_text = isset( $_POST['_vodi_movie_play_trailer_text'] ) ? masvideos_clean( $_POST['_vodi_movie_play_trailer_text'] ) : '';
        $vodi_movie_play_trailer_link = isset( $_POST['_vodi_movie_play_trailer_link'] ) ? masvideos_clean( $_POST['_vodi_movie_play_trailer_link'] ) : '';
        $vodi_related_movies_by_person_title = isset( $_POST['_vodi_related_movies_by_person_title'] ) ? masvideos_clean( $_POST['_vodi_related_movies_by_person_title'] ) : '';

        update_post_meta( $post_id, '_vodi_movie_style', $vodi_movie_style );
        update_post_meta( $post_id, '_vodi_movie_banner_image', $vodi_movie_banner_image );
        update_post_meta( $post_id, '_vodi_movie_banner_link', $vodi_movie_banner_link );
        update_post_meta( $post_id, '_vodi_movie_bg_image', $vodi_movie_bg_image );
        update_post_meta( $post_id, '_vodi_movie_related_posts', $vodi_movie_related_posts );
        update_post_meta( $post_id, '_vodi_movie_highlighted_comment', $vodi_movie_highlighted_comment );
        update_post_meta( $post_id, '_vodi_movie_buy_ticket_text', $vodi_movie_buy_ticket_text );
        update_post_meta( $post_id, '_vodi_movie_buy_ticket_link', $vodi_movie_buy_ticket_link );
        update_post_meta( $post_id, '_vodi_movie_play_trailer_text', $vodi_movie_play_trailer_text );
        update_post_meta( $post_id, '_vodi_movie_play_trailer_link', $vodi_movie_play_trailer_link );
        update_post_meta( $post_id, '_vodi_related_movies_by_person_title', $vodi_related_movies_by_person_title );
    }

    public static function add_video_options_general_video_data() {
        ?><div class="options_group"><?php
            masvideos_wp_select(
                array(
                    'id'            => '_vodi_video_style',
                    'label'         => esc_html__( 'Choose Video Style', 'vodi' ),
                    'options'       => array(
                        ''      => esc_html__( 'Dafault', 'vodi' ),
                        'v1'    => esc_html__( 'Style v1', 'vodi' ),
                        'v2'    => esc_html__( 'Style v2', 'vodi' ),
                        'v3'    => esc_html__( 'Style v3', 'vodi' ),
                        'v4'    => esc_html__( 'Style v4', 'vodi' ),
                        'v5'    => esc_html__( 'Style v5', 'vodi' ),
                        'v6'    => esc_html__( 'Style v6', 'vodi' ),
                    ),
                )
            );
            masvideos_wp_upload_image(
                array(
                    'id'            => '_vodi_video_banner_image',
                    'label'         => esc_html__( 'Banner Image', 'vodi' ),
                    'placeholder'   => true,
                )
            );
            masvideos_wp_text_input(
                array(
                    'id'            => '_vodi_video_banner_link',
                    'label'         => esc_html__( 'Banner Link', 'vodi' ),
                    'description'   => esc_html__( 'Enter the url of the Banner.', 'vodi' ),
                )
            );
        ?></div><?php
    }

    public static function save_video_general_panel_data( $post_id ) {
        $vodi_video_style           = isset( $_POST['_vodi_video_style'] ) ? masvideos_clean( $_POST['_vodi_video_style'] ) : '';
        $vodi_video_banner_image    = isset( $_POST['_vodi_video_banner_image'] ) ? masvideos_clean( $_POST['_vodi_video_banner_image'] ) : '';
        $vodi_video_banner_link     = isset( $_POST['_vodi_video_banner_link'] ) ? masvideos_clean( $_POST['_vodi_video_banner_link'] ) : '';
        update_post_meta( $post_id, '_vodi_video_style', $vodi_video_style );
        update_post_meta( $post_id, '_vodi_video_banner_image', $vodi_video_banner_image );
        update_post_meta( $post_id, '_vodi_video_banner_link', $vodi_video_banner_link );
    }

    public static function add_episode_options_general_episode_data() {
        ?><div class="options_group"><?php
            masvideos_wp_select(
                array(
                    'id'            => '_vodi_episode_style',
                    'label'         => esc_html__( 'Choose Episode Style', 'vodi' ),
                    'options'       => array(
                        ''      => esc_html__( 'Dafault', 'vodi' ),
                        'v1'    => esc_html__( 'Style v1', 'vodi' ),
                        'v2'    => esc_html__( 'Style v2', 'vodi' ),
                        'v3'    => esc_html__( 'Style v3', 'vodi' ),
                        'v4'    => esc_html__( 'Style v4', 'vodi' ),
                    ),
                )
            );
            masvideos_wp_upload_image(
                array(
                    'id'            => '_vodi_episode_bg_image',
                    'label'         => esc_html__( 'Background Image', 'vodi' ),
                    'placeholder'   => true,
                )
            );
        ?></div>
        <?php
    }



    public static function save_episode_general_panel_data( $post_id ) {
        $vodi_episode_style = isset( $_POST['_vodi_episode_style'] ) ? masvideos_clean( $_POST['_vodi_episode_style'] ) : '';
        update_post_meta( $post_id, '_vodi_episode_style', $vodi_episode_style );
        $vodi_episode_bg_image        = isset( $_POST['_vodi_episode_bg_image'] ) ? masvideos_clean( $_POST['_vodi_episode_bg_image'] ) : '';
        update_post_meta( $post_id, '_vodi_episode_bg_image', $vodi_episode_bg_image );
    }

    public static function add_tv_show_options_general_tv_show_data() {
        ?><div class="options_group"><?php
            masvideos_wp_select(
                array(
                    'id'            => '_vodi_tv_show_style',
                    'label'         => esc_html__( 'Choose Tv Show Style', 'vodi' ),
                    'options'       => array(
                        ''      => esc_html__( 'Dafault', 'vodi' ),
                        'v1'    => esc_html__( 'Style v1', 'vodi' ),
                    ),
                )
            );
        ?></div><?php
    }

    public static function save_tv_show_general_panel_data( $post_id ) {
        $vodi_tv_show_style = isset( $_POST['_vodi_tv_show_style'] ) ? masvideos_clean( $_POST['_vodi_tv_show_style'] ) : '';
        update_post_meta( $post_id, '_vodi_tv_show_style', $vodi_tv_show_style );
    }
}
Vodi_MasVideos_Helper::init();