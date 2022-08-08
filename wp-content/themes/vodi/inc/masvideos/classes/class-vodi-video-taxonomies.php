<?php
/**
 * Class to setup Taxonomies metabox customizations
 *
 * @package Vodi/MasVideos
 */

class Vodi_Video_Taxonomies {

    public function __construct() {
        // Add options for Video Category
        add_action( "video_cat_add_form_fields",         array( $this, 'add_video_cat_fields' ), 10 );
        add_action( "video_cat_edit_form_fields",        array( $this, 'edit_video_cat_fields' ), 10, 2 );
        add_action( 'create_video_cat',                  array( $this, 'save_video_cat_fields' ), 10, 3 );
        add_action( 'edited_video_cat',                  array( $this, 'save_video_cat_fields' ), 10, 3 );
    }

    /**
     * Loads WP Media Files
     *
     * @return void
     */
    public function load_wp_media_files() {
        wp_enqueue_media();
    }

    /**
     * Video Category metabox fields.
     *
     * @return void
     */
    public function add_video_cat_fields() {
        ?>
        <div class="form-field">
            <?php 
                if( post_type_exists( 'mas_static_content' ) ) :

                    $args = array(
                        'posts_per_page'    => -1,
                        'orderby'           => 'title',
                        'post_type'         => 'mas_static_content',
                    );
                    $static_contents = get_posts( $args );
                endif;
            ?>
            <div class="form-group">
                <label><?php esc_html_e( 'Jumbotron', 'vodi' ); ?></label>
                <select id="video_cat_jumbotron_top_id" class="form-control" name="video_cat_jumbotron_top_id">
                    <option><?php echo esc_html__( 'Select a Static Block', 'vodi' ); ?></option>
                    <?php if( ! empty( $static_contents ) ) : ?>
                        <?php foreach( $static_contents as $static_content ) : ?>
                            <option value="<?php echo esc_attr( $static_content->ID ); ?>"><?php echo get_the_title( $static_content->ID ); ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <?php
    }

    /**
     * Edit Video Category metabox fields.
     *
     * @param mixed $term Term (video_cat) being edited
     */
    public function edit_video_cat_fields( $term ) {
        $jumbotron_top_id = get_term_meta( $term->term_id, 'jumbotron_top_id', true );
        ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="video_cat_jumbotron_top_id"><?php esc_html_e( 'Jumbotron', 'vodi' ); ?></label></th>
            <td>
                <?php 
                    if( post_type_exists( 'mas_static_content' ) ) :

                        $args = array(
                            'posts_per_page'    => -1,
                            'orderby'           => 'title',
                            'post_type'         => 'mas_static_content',
                        );
                        $static_contents = get_posts( $args );
                    endif;
                ?>
                <div class="form-group">
                    <select id="video_cat_jumbotron_top_id" class="form-control" name="video_cat_jumbotron_top_id">
                        <option><?php echo esc_html__( 'Select a Static Block', 'vodi' ); ?></option>
                        <?php if( ! empty( $static_contents ) ) : ?>
                            <?php foreach( $static_contents as $static_content ) : ?>
                                <option value="<?php echo esc_attr( $static_content->ID ); ?>" <?php echo ( $jumbotron_top_id == $static_content->ID  ? 'selected' : '' ); ?>><?php echo get_the_title( $static_content->ID ); ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
            </td>
        </tr>
        <?php
    }

    /**
     * Save Video Category metabox fields.
     *
     * @param mixed $term_id Term ID being saved
     * @return void
     */
    public function save_video_cat_fields( $term_id ) {
        if ( isset( $_POST['video_cat_jumbotron_top_id'] ) ) {
            update_term_meta( $term_id, 'jumbotron_top_id', absint( $_POST['video_cat_jumbotron_top_id'] ) );
        }
    }
}

new Vodi_Video_Taxonomies;