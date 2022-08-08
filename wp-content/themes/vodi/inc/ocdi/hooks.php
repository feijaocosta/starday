<?php

add_filter( 'pt-ocdi/import_files', 'vodi_ocdi_import_files' );

add_action( 'pt-ocdi/after_import', 'vodi_ocdi_after_import_setup' );

add_action( 'pt-ocdi/before_widgets_import', 'vodi_ocdi_before_widgets_import' );

add_filter( 'wp_import_post_data_processed', 'vodi_ocdi_wp_import_post_data_processed', 99, 2 );