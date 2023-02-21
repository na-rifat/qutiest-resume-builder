<?php

namespace qrb;

use qt\core\Assets as CoreAssets;

defined( 'ABSPATH' ) or exit;

class Assets extends CoreAssets {
    function __construct() {
        $this->register();

        add_filter( 'qt_vars', [$this, 'qt_vars'] );
    }

    public function qt_vars( $vars ) {
        $vars['nonces']['get_autocomplete'] = wp_create_nonce( 'get_autocomplete' );
        $vars['nonces']['get_autocomplete'] = wp_create_nonce( 'get_autocomplete' );

        return $vars;
    }
}

?>