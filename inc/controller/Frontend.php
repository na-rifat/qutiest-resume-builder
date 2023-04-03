<?php

namespace qrb;

use qt\core\FUNC;

defined( 'ABSPATH' ) or exit;

class Frontend {
    use FUNC;
    function __construct() {
        add_shortcode( 'qutiest-resume-builder', [$this, 'render'] );
        add_shortcode( 'qtmp1', [$this, 'qtmp1'] );
    }


    public function qtmp1($atts){
        $this->render_template('templates/template_1');
        $this->render_template('templates/template_2');
        $this->render_template('templates/template_3');
    }

    public function render( $atts ) {
        $this->render_template( 'form' );
    }

}