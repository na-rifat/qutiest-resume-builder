<?php 

namespace qt\core;

defined('ABSPATH') or exit;

trait FUNC{
    
    public function var( $name, $type = 'string' ) {
        return ! empty( $_REQUEST[$name] ) ? $_REQUEST[$name] : '';
    }

    public function textdomain(){
        return wp_get_theme()->get('TextDomain');
    }

    public function render_template($filename){
        include QRB_PATH . '/components/' . $filename . '.php';
    }

    
}