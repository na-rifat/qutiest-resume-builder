<?php

namespace qrb;

use qt\core\FUNC;

defined( 'ABSPATH' ) or exit;

class Admin {
    use FUNC;
    public function __construct() {
        add_action( 'admin_menu', [$this, 'register_menus'] );
    }

    public function register_menus() {
        add_menu_page( __( 'Resume' ), __( 'Resume' ), 'manage_options', 'resume-settings', [$this, 'render_settings_page'], 'dashicons-media-document', 1 );
        add_submenu_page( 'resume-settings', __( 'Work experiences' ), __( 'Work experiences' ), 'manage_options', 'work-experiences', [$this, 'work_experiences'] );
    }

    public function render_settings_page() {
        $self = new self();

        $self->render_template( 'admin/resume-settings' );
    }

    public function work_experiences() {
        $self = new self();

        $self->render_template( 'admin/work-experiences' );
    }
}