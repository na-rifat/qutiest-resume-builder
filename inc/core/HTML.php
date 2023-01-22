<?php

namespace qt\core;

defined( 'ABSPATH' ) or exit;

abstract class HTML {
    function __construct() {

    }

    public static function column_wrapper( $content ) {
        return sprintf( '<div class="wrapper column">%s</div>', self::generate_content( $content ) );
    }

    public static function wrapper( $content ) {
        return sprintf( '<div class="wrapper">%s</div>', self::generate_content( $content ) );
    }

    public static function gallery( $items ) {
        $el = '<div class="image-gallery">';
        foreach ( $items as $column ) {
            $el .= '<div class="gallery-col">';
            foreach ( $column['child_columns'] as $image ) {
                $el .= self::image( $image );
            }
            $el .= '</div>';
        }
        $el .= '</div>';

        return $el;
    }

    public static function columns( $columns = [], $atts = [] ) {
        $el = '';

        foreach ( $columns as $name => $content ) {
            $el .= sprintf(
                '<div class="col %s" %s>%s</div>',
                self::class_name( $name ),
                self::render_atts( $atts ),
                self::generate_content( $content ) );
        }

        return $el;
    }

    public static function button_group( $data, $key = 'buttons', $atts = [] ) {
        $buttons = '<div class="btn-grp">';

        foreach ( $data['buttons'] as $button ) {
            $buttons .= self::button( $button, $atts );
        }

        $buttons .= '</div>';

        return $buttons;
    }

    public static function button( $data, $atts = [] ) {
        return sprintf(
            '<a href="%s" target="%s" class="btn %s" %s>%s%s%s</a>',
            $data['link'],
            $data['new_tab'] ? '_blank' : '_self',
            $data['type'],
            self::render_atts( $atts ),
            ! empty( $data['img_icon'] ) ? wp_get_attachment_image( $data['img_icon'], 'original' ) : '',
            $data['icon'],
            $data['title']
        );
    }

    public static function image( $data, $key = 'image', $attr = [] ) {
        if ( empty( $data[$key] ) ) {
            return;
        }

        return wp_get_attachment_image( $data[$key], 'original', false, $attr );
    }

    public static function content( $data, $atts = [] ) {
        if ( empty( $data['content'] ) ) {
            return;
        }

        return sprintf( '<div class="content" %s>%s</div>', self::render_atts( $atts ), $data['content'] );
    }

    public static function title( $data, $atts = [] ) {
        if ( empty( $data['title'] ) ) {
            return;
        }

        return sprintf( '<p class="title" %s>%s</p>', self::render_atts( $atts ), $data['title'] );
    }

    public static function custom_wrapper( $name, $content, $atts = [] ) {
        return sprintf(
            '<div class="%s" %s>%s</div>',
            self::class_name( $name ),
            self::render_atts( $atts ),
            self::generate_content( $content )
        );
    }

    public static function overlay() {
        return sprintf( '<div class="overlay"></div>' );
    }

    public static function description( $data, $atts = [] ) {
        if ( empty( $data['description'] ) ) {
            return;
        }

        return sprintf( '<p class="description" %s>%s</p>', self::render_atts( $atts ), $data['description'] );
    }

    public static function section_subtitle( $data, $atts = [] ) {
        if ( empty( $data['subtitle'] ) ) {
            return;
        }

        return sprintf( '<p class="subtitle" %s>%s</p>', self::render_atts( $atts ), $data['subtitle'] );
    }

    public static function section_title( $data, $atts = [] ) {
        if ( empty( $data['title'] ) ) {
            return;
        }

        return sprintf( '<h2 class="title" %s>%s</h2>', self::render_atts( $atts ), $data['title'] );
    }

    public static function section_titleh1( $data, $atts = [] ) {
        if ( empty( $data['title'] ) ) {
            return;
        }

        return sprintf( '<h1 class="title" %s>%s</h1>', self::render_atts( $atts ), $data['title'] );
    }

    public static function container( $content ) {
        return sprintf( '<div class="container">%s</div>', self::generate_content( $content ) );
    }

    public static function section( $name, $content, $background = '' ) {
        printf(
            '<section class="%s" %s >%s</section>',
            self::class_name( $name ),
            self::render_background( $background ),
            self::generate_content( $content )
        );
    }

    public static function render_background( $background ) {
        if ( empty( $background ) ) {
            return;
        }

        if ( preg_match( '/^#[a-f0-9]{6}$/i', $background ) ) {
            return sprintf( 'style="background-color: %s;" ', $background );
        }

        return sprintf( 'style="background-image: url(%s); background-size: cover; background-repeat: no-repeat; background-position: center;" ', wp_get_attachment_image_src( $background, 'original', false )[0] );
    }

    public static function class_name( $name ) {
        return strtolower( str_replace( ['.', '_', ' '], '-', $name ) );
    }

    public static function _( $content ) {
        return self::generate_content( $content );
    }

    public static function func( $func, $args = [] ) {
        if ( is_callable( $func ) ) {
            return call_user_func_array( $func, $args );
        }
    }

    public static function generate_content( $content = '' ) {
        if ( is_string( $content ) ) {
            return $content;
        }

        if ( is_array( $content ) ) {
            return implode( '', $content );
        }

        return $content;
    }

    public static function render_atts( $atts ) {
        return implode( ' ', $atts );
    }

    public static function condition( $condition, $content ) {
        if ( $condition ) {
            return self::generate_content( $content );
        }

        return '';
    }

    public static function months_dropdown($name){
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];

        ob_start();
        printf('<select name="%s" id="%s">', $name, $name);

        foreach($months as $month){
            printf('<option value="%s">%s</option>',$month, $month);
        }

        echo '</select>';

        return ob_get_clean();
    }


    public static function year_dropdown($name, $start = 0 ,$end = 0){
        ob_start();
        printf('<select name="%s" id="%s">', $name, $name);
        
        for($i = $start; $i < $end; $i++){
            printf('<option value="%s">%s</option>', $i, $i);
        }
        
        echo '</select>';

        return ob_get_clean();
    }
    
}