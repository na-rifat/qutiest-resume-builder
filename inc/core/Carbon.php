<?php

namespace qt\core;

defined( 'ABSPATH' ) or exit;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use WP_Query;

abstract class Carbon {

    use FUNC;
    function __construct() {
        add_action( 'carbon_fields_register_fields', [$this, 'register'] );
    }

    /**
     * Creats a repeater button field
     *
     * @param  string  $name
     * @return mixed
     */
    public function buttons( $name = 'buttons' ) {
        return $this->repeater(
            $name,
            [
                $this->image( 'img_icon' ),
                $this->text( 'icon' ),
                $this->text( 'title' ),
                $this->text( 'link' ),
                $this->select( 'type',
                    [
                        'primary'     => __( 'Primary', $this->textdomain() ),
                        'secondary'   => __( 'Secondary', $this->textdomain() ),
                        'blue-border' => __( 'Blue border', $this->textdomain() ),
                        // 'secondary-white' => __( 'Secondary white', $this->textdomain() ),
                    ]
                ),
                $this->checkbox( 'new tab' ),
            ],
            'vertical'
        );
    }

    /**
     * Gallery repeater item
     *
     * @param  string  $name
     * @return mixed
     */
    public function gallery_repeater( $name ) {
        return $this->repeater(
            $name,
            [
                $this->repeater( 'child columns', [
                    $this->image( 'image' ),
                ], 'vertical' ),
            ],
        );
    }

    /**
     * Creates a column based section
     *
     * @param  string  $name
     * @param  array   $fields
     * @param  array   $columns
     * @param  string  $template_path
     * @return mixed
     */
    public function create_columns( $name, $columns, $fields = [], $template_path = 'common/' ) {
        $block = $this->create_block( $name, $fields, $template_path );

        foreach ( $columns as $title => $column_fields ) {
            $block->add_tab(
                __( ucfirst( $title ), $this->textdomain() ),
                $column_fields
            );
        }

        return $block;
    }

    /**
     * Creates a Gutenberg block
     *
     * @param  string  $name
     * @param  array   $fields
     * @return mixed
     */
    public function create_block( $name, $fields, $template_path = 'common/' ) {
        $name     = ucfirst( $name );
        $fields[] = Field::make( 'select', 'template', '' )
            ->add_options( [sprintf( '/%s%s', $template_path, $name ) => sprintf( '/%s%s', $template_path, $name )] )
            ->set_default_value( sprintf( '/%s%s', $template_path, $name ) )
        // ->set_value( '1' )
        // ->set_attribute( 'value', sprintf( '/%s%s', $template_path, $name ) )
        // ->set_attribute( 'readOnly', true )
        // ->set_attribute( 'type', 'hidden' )
            ->set_classes( 'hidden' );

        return Block::make(
            __( $name, $this->textdomain() )
        )
            ->set_description( __( $name . ' Section (MU Sea Foods block)', $this->textdomain() ) )
            ->set_keywords( explode( ' ', $name ) )
            ->set_icon( 'star-filled' )
            ->set_render_callback( function ( $fields, $atts, $inner_block ) {
                $template = $fields['template'];
                setData( $fields );

                get_template_part( 'inc/views/' . strtolower( str_replace( ' ', '-', $template ) ) );
            } )
            ->add_fields( $fields );
    }

    /**
     * Creates a repeater field
     *
     * @param  string  $name
     * @param  array   $fields
     * @param  string  $layout
     * @return mixed
     */
    public function repeater( $name, $fields, $layout = 'horizontal' ) {
        $layout = 'tabbed-' . $layout;
        $name   = ucfirst( str_replace( ['.', '-', '_'], ' ', $name ) );

        return Field::make( 'complex', strtolower( str_replace( ' ', '_', $name ) ), $name )->set_layout( $layout )->add_fields( $fields );
    }

    /**
     * Creates multiple selection option
     *
     * @param  string  $name
     * @param  array   $options
     * @return mixed
     */
    public function multiselect( $name, $options = [] ) {
        return Field::make( 'multiselect', self::name( $name ), self::title( $name ) )->set_options( $options );
    }

    /**
     * Creates a select option
     *
     * @param  string  $name
     * @param  array   $options
     * @return mixed
     */
    public function select( $name, $options = [] ) {
        return Field::make( 'select', self::name( $name ), self::title( $name ) )->set_options( $options );
    }

    /**
     * Creates a rich_text box
     *
     * @param  string  $name
     * @return mixed
     */
    public function rich_text( $name ) {
        return self::field( 'rich_text', $name );
    }

    /**
     * Creates a textarea field
     *
     * @param  string  $name
     * @return mixed
     */
    public function textarea( $name ) {
        return self::field( 'textarea', $name );
    }

    /**
     * Creats a color selector
     *
     * @param  string  $name
     * @return mixed
     */
    public function color( $name ) {
        return self::field( 'color', $name );
    }

    /**
     * Creates a checkbox
     *
     * @param  string  $name
     * @return mixed
     */
    public function checkbox( $name ) {
        return self::field( 'checkbox', $name );
    }

    /**
     * Creates an image filed
     *
     * @param  string  $name
     * @return mixed
     */
    public function image( $name ) {
        return self::field( 'image', $name );
    }

    /**
     * Creates a text field
     *
     * @param  string  $name
     * @return mixed
     */
    public function text( $name ) {
        return self::field( 'text', $name );
    }

    /**
     * Creates a carbon fields input
     *
     * @param  string  $type
     * @param  string  $name
     * @return mixed
     */
    public function field( $type = 'text', $name ) {
        return Field::make( $type, self::name( $name ), self::title( $name ) );
    }

    /**
     * Converts name to title
     *
     * @param  string   $name
     * @return string
     */
    public function title( $name ) {
        return ucfirst( strtolower( str_replace( ['-', '_', '.'], ' ', $name ) ) );
    }

    /**
     * Converts name to field formatted name
     *
     * @param  string   $name
     * @return string
     */
    public function name( $name ) {
        return strtolower( str_replace( [' ', '-', '.'], '_', $name ) );
    }

    public function template( $name ) {
        $template_name = strtolower( str_replace( ['.', '-', '_'], '-', $name ) ) . '.nht.php';

        return get_template_part( 'inc/views/' . $template_name );
    }

    public function category_list( $taxonomy ) {
        $options    = [];
        $categories = get_categories(
            [
                'taxonomy'   => $taxonomy,
                'orderby'    => 'name',
                'order'      => 'ASC',
                'hide_empty' => 0,
            ] );

        foreach ( $categories as $category ) {
            $options[$category->term_id] = $category->name;
        }

        return $options;
    }

    public function post_list( $type = 'post' ) {

    }

    public function cf7_list() {
        $forms = [];

        $query = new \WP_Query(
            [
                'post_type' => 'wpcf7_contact_form',
            ]
        );

        while ( $query->have_posts() ) {
            $query->the_post();
            $form = get_post( get_the_ID() );

            $forms[$form->ID] = $form->post_title;
        }

        return $forms;
    }

}