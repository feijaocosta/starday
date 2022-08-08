<?php
/**
 * Class to setup Taxonomies metabox customizations
 *
 * @package Vodi/MasVideos
 */

class Vodi_Movie_Taxonomies {

    public function __construct() {
        // Add options for Movie Genre
        add_action( "movie_genre_add_form_fields",         array( $this, 'add_movie_genre_fields' ), 10 );
        add_action( "movie_genre_edit_form_fields",        array( $this, 'edit_movie_genre_fields' ), 10, 2 );
        add_action( 'create_movie_genre',                  array( $this, 'save_movie_genre_fields' ), 10, 3 );
        add_action( 'edited_movie_genre',                  array( $this, 'save_movie_genre_fields' ), 10, 3 );

        // Add options for Movie Tag
        add_action( "movie_tag_add_form_fields",         array( $this, 'add_movie_tag_fields' ), 10 );
        add_action( "movie_tag_edit_form_fields",        array( $this, 'edit_movie_tag_fields' ), 10, 2 );
        add_action( 'create_movie_tag',                  array( $this, 'save_movie_tag_fields' ), 10, 3 );
        add_action( 'edited_movie_tag',                  array( $this, 'save_movie_tag_fields' ), 10, 3 );
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
     * Movie Genre metabox fields.
     *
     * @return void
     */
    public function add_movie_genre_fields() {
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
                <select id="movie_genre_jumbotron_top_id" class="form-control" name="movie_genre_jumbotron_top_id">
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
     * Edit Movie Genre metabox fields.
     *
     * @param mixed $term Term (movie_genre) being edited
     */
    public function edit_movie_genre_fields( $term ) {
        $jumbotron_top_id = get_term_meta( $term->term_id, 'jumbotron_top_id', true );
        ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="movie_genre_jumbotron_top_id"><?php esc_html_e( 'Jumbotron', 'vodi' ); ?></label></th>
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
                    <select id="movie_genre_jumbotron_top_id" class="form-control" name="movie_genre_jumbotron_top_id">
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
     * Save Movie Genre metabox fields.
     *
     * @param mixed $term_id Term ID being saved
     * @return void
     */
    public function save_movie_genre_fields( $term_id ) {
        if ( isset( $_POST['movie_genre_jumbotron_top_id'] ) ) {
            update_term_meta( $term_id, 'jumbotron_top_id', absint( $_POST['movie_genre_jumbotron_top_id'] ) );
        }
    }

    /**
     * Movie Tag metabox fields.
     *
     * @return void
     */
    public function add_movie_tag_fields() {
        ?>
        <div class="form-field">
            <label for="movie_tag_icon"><?php esc_html_e( 'Icon Class', 'vodi' ); ?></label>
            <input type="text" name="movie_tag_icon" id="movie_tag_icon" value autocomplete="off">
            <p class="description"><?php esc_html_e( 'This is alternative for font based icons','vodi' ); ?></p>
        </div>
        <?php
    }

    /**
     * Edit Movie Tag metabox fields.
     *
     * @param mixed $term Term (movie_tag) being edited
     */
    public function edit_movie_tag_fields( $term ) {
        $icon = get_term_meta( $term->term_id, 'icon', true );
        ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="movie_tag_icon"><?php esc_html_e( 'Icon Class', 'vodi' ); ?></label></th>
            <td>
                <input type="text" name="movie_tag_icon" id="movie_tag_icon" value="<?php echo esc_attr( $icon ); ?>">
                <p class="description"><?php esc_html_e( 'This is alternative for font based icons','vodi' ); ?></p>
            </td>
        </tr>
        <?php
    }

    /**
     * Save Movie Tag metabox fields.
     *
     * @param mixed $term_id Term ID being saved
     * @return void
     */
    public function save_movie_tag_fields( $term_id ) {
        if ( isset( $_POST['movie_tag_icon'] ) ) {
            update_term_meta( $term_id, 'icon', $_POST['movie_tag_icon'] );
        }
    }
}

new Vodi_Movie_Taxonomies;