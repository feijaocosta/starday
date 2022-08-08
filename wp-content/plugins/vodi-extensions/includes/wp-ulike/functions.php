<?php

if( ! function_exists( 'wp_ulike_update_meta_counter_value' ) ) {
    /**
     * Update meta counter value
     *
     * @param integer $ID
     * @param string $value
     * @param string $type
     * @param string $status
     * @param boolean $is_distinct
     * @return int|bool
     */
    function wp_ulike_update_meta_counter_value( $ID, $value, $type, $status, $is_distinct = true ) {
        update_post_meta( $ID, '_liked', absint( $value ) );
        $distinct_name = !$is_distinct ? 'total' : 'distinct';
        return wp_ulike_update_meta_data( $ID, $type, sprintf( 'count_%s_%s', $distinct_name, $status ), $value );
    }
}