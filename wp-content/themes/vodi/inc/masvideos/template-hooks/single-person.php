<?php
/**
 * Single Person Template Hooks
 */

add_action( 'masvideos_template_single_person_content_sidebar', 'masvideos_template_single_person_title', 12 );
add_action( 'masvideos_template_single_person_content_sidebar', 'masvideos_template_single_person_short_desc', 14 );
add_action( 'masvideos_template_single_person_content_sidebar', 'vodi_template_single_person_personal_info_wrap_open', 15 );
add_action( 'masvideos_template_single_person_content_sidebar', 'vodi_template_single_person_personal_info_wrap_close', 65 );