<?php

if ( ! function_exists( 'qt_img' ) ) {
    function qt_img( $name ) {
        return sprintf( '<img src="%s" />', QRB_URL . '/dist/img/' . $name );
    }
}
if ( ! function_exists( 'qt_bg_img' ) ) {
    function qt_bg_img( $name ) {
        return sprintf( 'style="background-image: url(%s)"', QRB_URL . '/dist/img/' . $name );
    }
}
if ( ! function_exists( 'qt_bg_overlay' ) ) {
    function qt_bg_overlay( $img_name, $class_name = 'overlay' ) {
        return printf( '<div class="%s" style="background-image: url(%s)"></div>', $class_name, QRB_URL . '/dist/img/' . $img_name );
    }
}

if ( ! function_exists( 'setData' ) ) {
    function setData( $data ) {
        return set_query_var( 'component_data', $data );
    }
}

if ( ! function_exists( 'getData' ) ) {
    function getData() {
        return get_query_var( 'component_data', [] );
    }
}