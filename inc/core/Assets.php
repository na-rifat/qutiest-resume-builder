<?php

namespace qt\core;

defined( 'ABSPATH' ) or exit;

/**
 * This class will load all the css/js files from dist/ folder if they are named with this format - [name].auto.min.js
 * Webpack integrated
 */
abstract class Assets {
    use FUNC;

    public $localize_handle = false;
    // Define dependencies
    public $deps = [
        'js'  => [

        ],
        'css' => [

        ],
    ];

    public $locales = [];

    function __construct() {
        add_filter( 'qt_vars', [$this, 'qt_vars'] );
    }

    public function qt_vars( $vars ) {
        return $vars;
    }

    public function register() {
        add_action( 'wp_enqueue_scripts', [$this, 'render'], 10 );
        add_action( 'admin_enqueue_scripts', [$this, 'admin_render'], 10 );
        add_action( 'wp_enqueue_scripts', [$this, 'localize_scripts'], 15 );
        add_action( 'init', [$this, 'admin_bar'] );
        add_action( 'wp_head', [$this, 'admin_topbar_pos'], 999 );
    }

    public function admin_render() {
        $css_files = $this->get_files( 'css' );
        $js_files  = $this->get_files( 'js' );

        // CSS file rendering
        foreach ( $css_files as $file ) {
            if ( ! strpos( $file['name'], 'admin' ) ) {
                continue;
            }

            wp_enqueue_style(
                $file['handle'],
                $file['src'],
                isset( $this->deps['css'][$file['name']] ) ? $this->deps['css'][$file['name']] : [],
                $file['version']
            );
        }

        // JS file rendering
        foreach ( $js_files as $file ) {
            if ( ! strpos( $file['name'], 'admin' ) ) {
                continue;
            }

            wp_enqueue_script(
                $file['handle'],
                $file['src'], isset( $this->deps['css'][$file['name']] ) ? $this->deps['css'][$file['name']] : [],
                $file['version'],
                true
            );
        }
    }

    /**
     * Return a list of file for autoloadd
     *
     * @param  string $type
     * @return return array
     */
    public function get_files( $type = null ) {
        if ( $type == null ) {
            return;
        }

        $path = QRB_PATH . '/dist/' . $type;
        $url  = QRB_URL . '/dist/' . $type;

        $files  = array_diff( scandir( $path ), ['.', '..'] );
        $result = [];

        foreach ( $files as $file ) {
            $extracted = $this->extract_file( $file, $path, $url );

            if ( $extracted['ext'] != $type || ! in_array( 'auto', $extracted['props'] ) ) {
                continue;
            }

            $result[] = $extracted;
        }

        return $result;
    }

    /**
     * Extract a file with relavent information
     *
     * @param  string  $file
     * @param  string  $path
     * @return array
     */
    public function extract_file( $file, $path, $url ) {
        $file_meta = explode( '.', $file );

        if ( ! $this->localize_handle ) {
            $this->localize_handle = $this->textdomain() . "-dist-$file_meta[0]";
        }

        return [
            'name'    => $file_meta[0],
            'props'   => $file_meta,
            'ext'     => $file_meta[count( $file_meta ) - 1],
            'version' => filemtime( $path . "/$file" ),
            'handle'  => $this->textdomain() . "-dist-$file_meta[0]",
            'src'     => $url . "/$file",
        ];
    }

    /**
     * Enqueue/render assets files to frontend
     *
     * @return void
     */
    public function render() {
        $css_files = $this->get_files( 'css' );
        $js_files  = $this->get_files( 'js' );

        // CSS file rendering
        foreach ( $css_files as $file ) {
            wp_enqueue_style(
                $file['handle'],
                $file['src'],
                isset( $this->deps['css'][$file['name']] ) ? $this->deps['css'][$file['name']] : [],
                $file['version']
            );
        }

        // JS file rendering
        foreach ( $js_files as $file ) {
            wp_enqueue_script(
                $file['handle'],
                $file['src'], isset( $this->deps['css'][$file['name']] ) ? $this->deps['css'][$file['name']] : [],
                $file['version'],
                true
            );
        }

        wp_enqueue_style( 'load-fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' );
    }

    /**
     * Visible admin bar support
     *
     * @return void
     */
    public function admin_bar() {

        if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {
            add_filter( 'show_admin_bar', '__return_true', 1000 );
        }
    }

    /**
     * Drop the body contents 32px down if user have Admin topbar
     *
     * @return void
     */
    public function admin_topbar_pos() {
        if ( is_user_logged_in() && current_user_can( 'manage_options' ) && ! is_admin() ) {
            echo "<style>header{top: 32px!important;}</style>";
        }
    }

    /**
     * Localize scripts and variables for JS use
     *
     * @return void
     */
    public function localize_scripts() {
        wp_localize_script( $this->localize_handle, 'qt_vars', apply_filters( 'qt_vars', [
            'blogname' => get_option( 'blogname' ),
            'site_url' => site_url(),
            'ajax_url' => admin_url( 'admin-ajax.php' ),
        ] ) );

    }
}