<?php 

namespace qrb;

use qt\core\FUNC;

defined('ABSPATH') or exit;


class Frontend{
    use FUNC;
    function __construct()
    {
        add_shortcode('qutiest-resume-builder', [$this, 'render']);
    }

    public function render($atts){
        $this->render_template('form');
    }
}