<?php

namespace qt\core;

use Carbon_Fields\Container;

defined( 'ABSPATH' ) or exit;

abstract class Theme extends Carbon {
    use FUNC;

    public function add_navigation_menu_area( $location, $title ) {
        return register_nav_menu( $location, __( $title, $this->textdomain() ) );
    }

    public function add_theme_option( $page, $tabs ) {
        $container = Container::make( 'theme_options', __( $page, $this->textdomain() ) )
            ->set_icon( 'dashcions-admin-generic' )
            ->set_page_menu_position( 0 );

        foreach ( $tabs as $title => $fields ) {
            $container->add_tab(
                __( $title, $this->textdomain() ),
                $fields
            );
        }

    }
}