<?php

namespace qt\core;

defined( 'ABSPATH' ) or exit;

trait FUNC {

    public function var ( $name, $type = 'string' ) {
        return ! empty( $_REQUEST[$name] ) ? $_REQUEST[$name] : '';
    }

    public function textdomain() {
        return wp_get_theme()->get( 'TextDomain' );
    }

    public function render_template( $filename ) {
        include QRB_PATH . '/inc/views/' . $filename . '.php';
    }

    public static function _render_template( $filename ) {
        include QRB_PATH . '/inc/views/' . $filename . '.php';
    }

    public static function html_select_options( $options ) {
        ob_start();

        foreach ( $options as $option ) {
            printf( '<option value="%s">%s</option>', $option, $option );
        }

        return ob_get_clean();
    }

}