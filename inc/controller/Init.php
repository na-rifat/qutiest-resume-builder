<?php
namespace qrb;

use Carbon_Fields\Carbon_Fields;

defined( 'ABSPATH' ) or exit;

class Init {
    function __construct() {
        add_action( 'init', [$this, 'create_instances'] );
        add_action( 'after_setup_theme', [$this, 'boot_gutenberg'] );

        
    }
    
    public function boot_gutenberg() {
        Carbon_Fields::boot();
        $theme = new Theme();
        $gutenberg = new Gutenberg();
    }

    public function create_instances() {
        $html   = new HTML();
        $assets = new Assets();
        $ajax   = new Ajax();
        $cpt    = new CPT();
        $frontend = new Frontend();
    }

    public static function start() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }
    }
}
