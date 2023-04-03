<?php

namespace qrb;

use qt\core\Ajax as CoreAjax;

defined( 'ABSPATH' ) or exit;

class Ajax extends CoreAjax {
    function __construct() {
        $this->register( 'get_autocomplete' );
        $this->register( 'get_job_list' );
        $this->register( 'get_experience_list' );
        $this->register( 'get_admin_job_list' );
        $this->register( 'get_admin_experience_list' );
        $this->register( 'new_job' );
        $this->register( 'new_experience' );
    }

    public function get_experience_list() {
        wp_send_json_success(
            [
                'list' => Resume::get_experience_list(),
            ]
        );exit;
    }

    public function get_admin_experience_list() {
        wp_send_json_success(
            [
                'list' => Resume::admin_experience_list(),
            ]
        );exit;
    }

    public function new_experience() {
        Resume::create_experience();

        wp_send_json_success(
            [
                'list' => Resume::admin_experience_list(),
            ]
        );exit;
    }

    public function new_job() {
        Resume::create_job();
        wp_send_json_success(
            [
                'list' => Resume::admin_job_list(),
            ]
        );exit;
    }

    public function admin_experience_list() {
        wp_send_json_success(
            [
                'list' => Resume::admin_experience_list(),
            ]
        );exit;
    }

    public function get_admin_job_list() {
        wp_send_json_success(
            [
                'list' => Resume::admin_job_list(),
            ]
        );exit;
    }

    public function get_job_list() {
        wp_send_json_success(
            [
                'list' => Resume::get_job_list(),
            ]
        );exit;
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
