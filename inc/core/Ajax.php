<?php

namespace qt\core;

defined( 'ABSPATH' ) or exit;


abstract class Ajax {
    use FUNC;
    
    public function __construct() {

    }

    /**
     * Register an action
     *
     * @param [type] $action
     * @return void
     */
    public function register( $action ) {
        add_action( "wp_ajax_nopriv_{$action}", [$this, $action] );
        add_action( "wp_ajax_{$action}", [$this, $action] );
    }

    /**
     * Nonce verification
     *
     * @return void
     */
    public static function verify_nonce() {
        if ( !wp_verify_nonce( self::var( 'nonce' ),self::var( 'action' ) ) ) {
            wp_send_json_error(
                [
                    'msg' => __( 'Invalid token!', self::textdomain() ),
                ]
            );
            exit;
        }
    }

}