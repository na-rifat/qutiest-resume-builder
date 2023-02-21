<?php

namespace qrb;

use qt\core\Ajax as CoreAjax;

defined( 'ABSPATH' ) or exit;

class Ajax extends CoreAjax {
    function __construct() {
        $this->register( 'get_autocomplete' );
    }

    public function get_autocomplete() {
        self::verify_nonce();
        extract( $_POST );

        $result_list = [];
        $result      = carbon_get_theme_option( $list );

        foreach ( $result as $item ) {
            $result_list[] = $item[$key];
        }

        wp_send_json_success(
            [
                'list' => $result_list,
            ]
        );exit;
    }
}