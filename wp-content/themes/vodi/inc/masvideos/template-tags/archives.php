<?php
/**
 * Template Tags common to Movies, TV Shows and Videos archives
 */

if ( ! function_exists( 'vodi_masvideos_get_archive_views' ) ) {
    /**
     * Archive views
     */
    function vodi_masvideos_get_archive_views( $type ) {
        return $archive_views = apply_filters( 'vodi_masvideos_get_archive_views_args', array(
            'grid'          => array(
                'label'   => esc_html__( 'Grid View', 'vodi' ),
                'svg'     => 'templates/svg/grid-small-icon.svg',
                'enabled' => true,
                'active'  => true,
            ),
            'grid-extended' => array(
                'label'   => esc_html__( 'Grid View Spacious', 'vodi' ),
                'svg'     => 'templates/svg/grid-icon.svg',
                'enabled' => true,
                'active'  => false,
            ),
            'list-large'    => array(
                'label'   => esc_html__( 'List Large View', 'vodi' ),
                'svg'     => 'templates/svg/listing-large-icon.svg',
                'enabled' => true,
                'active'  => false,

            ),
            'list-small'    => array(
                'label'   => esc_html__( 'List View', 'vodi' ),
                'svg'     => 'templates/svg/listing-icon.svg',
                'enabled' => true,
                'active'  => false,

            ),
            'list'          => array(
                'label'   => esc_html__( 'List Small View', 'vodi' ),
                'svg'     => 'templates/svg/listing-small.svg',
                'enabled' => true,
                'active'  => false,
            ),
        ), $type );
    }
}

if ( ! function_exists( 'vodi_masvideos_archives_view_switcher' ) ) {
    function vodi_masvideos_archives_view_switcher( $type, $columns ) {
        $archive_views = vodi_masvideos_get_archive_views( $type ); ?>
        <ul class="archive-view-switcher nav nav-tabs">
            <?php foreach( $archive_views as $archive_view_id => $archive_view ) : ?>
                <li class="nav-item"><a id="vodi-archive-view-switcher-<?php echo esc_attr( $archive_view_id );?>" class="nav-link <?php $active_class = $archive_view[ 'active' ] ? 'active': ''; echo esc_attr( $active_class ); ?>" data-archive-columns="<?php echo esc_attr( $columns ); ?>" data-toggle="tab" data-archive-class="<?php echo esc_attr( $archive_view_id );?>" title="<?php echo esc_attr( $archive_view[ 'label' ] ); ?>" href="#vodi-archive-view-content"><?php vodi_get_template( $archive_view[ 'svg' ] ); ?></a></li>
            <?php endforeach; ?>
        </ul><?php
    }   
}

if ( ! function_exists( 'vodi_masvideos_catalog_ordering' ) ) :
    /**
     * Displays catalog ordering options for archives
     */
    function vodi_masvideos_catalog_ordering() {
        ?><div class="archives-ordering"></div><?php
    }
endif;