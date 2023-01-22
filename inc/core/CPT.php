<?php

namespace qt\core;

defined( 'ABSPATH' ) or exit;

use Carbon_Fields\Container As Container;

abstract class CPT extends Carbon {
    static $count = 4;
    function __construct() {
        $this->register();
        add_action( 'carbon_fields_register_fields', [$this, 'register_meta'] );
    }

    abstract public function register_meta();
    abstract public function register();

    public function create_post_type( $singular, $plural, $taxanomy = '', $icon = 'dashicons-list-view' ) {
        $title_singular = ucfirst( $singular );
        $title_plural   = ucfirst( $plural );
        $name_singular  = strtolower( $singular );
        $name_plural    = strtolower( $plural );
        // var_dump($name_singular);exit;
        register_post_type(
            $name_singular,
            [
                'labels'            => array(
                    'name'               => __( $title_plural ),
                    'singular_name'      => __( $title_singular ),
                    'add_new'            => __( sprintf( 'New %s', $name_singular ) ),
                    'add_new_item'       => __( sprintf( 'Add new %s', $name_singular ) ),
                    'edit_item'          => __( sprintf( 'Edit %s', $name_singular ) ),
                    'new_item '          => __( sprintf( 'New %s', $name_singular ) ),
                    'view_item'          => __( sprintf( 'View %s', $name_singular ) ),
                    'view_items'         => __( sprintf( 'View %s', $name_plural ) ),
                    'search_items'       => __( sprintf( 'Search %s', $name_plural ) ),
                    'not_found'          => __( sprintf( 'No %s found.', $name_singular ) ),
                    'not_found_in_trash' => __( sprintf( 'No %s found in trash.', $name_singular ) ),
                    'parent_item_colon'  => __( sprintf( 'Parent %s: ', $name_singular ) ),
                    'all_items'          => __( sprintf( 'All %s', $name_plural ) ),
                    'featured_image'     => __( sprintf( '%s thumbnail', $title_singular ) ),
                    'set_featured_image' => __( sprintf( 'Set %s thumbnail', $name_singular ) ),
                ),
                'public'            => true,
                'has_archive'       => true,
                'rewrite'           => ['slug' => $name_singular],
                'taxonomies'        => [$taxanomy],
                'supports'          => ['title', 'editor', 'excerpt', 'thumbnail'],
                'menu_icon'         => 'dashicons-cart',
                'menu_position'     => 4,
                'show_in_nav_menus' => true,
                'show_in_rest'      => true,
            ]
        );
    }

    public function create_category( $taxanomy, $object, $title ) {
        $title_singular = ucfirst( $title );
        $title_plural   = ucfirst( $taxanomy );
        $name_singular  = strtolower( $taxanomy );
        $name_plural    = strtolower( $title );

        register_taxonomy( $name_singular, $object, array(
            'hierarchical'      => true,
            'labels'            => [
                'name'              => _x( sprintf( '%s categories', $title_singular ), 'taxonomy general name' ),
                'singular_name'     => _x( sprintf( '%s category', $title_singular ), 'taxonomy singular name' ),
                'search_items'      => __( 'Search Categories' ),
                'all_items'         => __( 'All Categories' ),
                'parent_item'       => __( 'Parent Category' ),
                'parent_item_colon' => __( 'Parent Category:' ),
                'edit_item'         => __( 'Edit Category' ),
                'update_item'       => __( 'Update Category' ),
                'add_new_item'      => __( 'Add New Category' ),
                'new_item_name'     => __( sprintf( 'New %s Category', $title_singular ) ),
                'menu_name'         => __( 'Category' ),
            ],
            'show_ui'           => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => $name_singular],
        ) );
    }

    public function add_meta( $table_title, $post_type = 'post', $metas = [] ) {
        return Container::make( 'post_meta', __( $table_title, 'musea' ) )
            ->where( 'post_type', '=', $post_type )
            ->add_fields( $metas );
    }
}