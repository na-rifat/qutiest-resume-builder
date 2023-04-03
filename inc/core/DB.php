<?php

namespace qt\core;

defined( 'ABSPATH' ) or exit;

abstract class DB {

    /**
     * Wordpress database prefix
     *
     * @param  string   $table_name
     * @return string
     */
    public static function prefix( $table_name = '' ) {
        return self::instance()->prefix . $table_name;
    }

    /**
     * Return database charset
     *
     * @return string
     */
    public static function charset_collate() {
        return self::instance()->charset_collate;
    }

    /**
     * Returns wordpress default db object
     *
     * @return object
     */
    public function instance() {
        global $wpdb;

        return $wpdb;
    }

    /**
     * Create a row in datatable
     *
     * @param  string  $table_name
     * @param  array   $data
     * @return mixed
     */
    public static function create( $table_name, $data ) {
        $format     = self::generate_data_col_type( $table_name );
        $table_name = self::prefix( $table_name );

        $insert_id = self::instance()->insert(
            $table_name,
            $data,
            $format
        );

        if ( ! $insert_id ) {
            return new \WP_Error( 'crud-insert-failed', __( 'Failed to isnert a record to the database' ) );
        }

        return $insert_id;
    }

    /**
     * Retrieve rows
     *
     * Filterable by id | any single column
     *
     * @param  string     $table_name
     * @param  string|int $id
     * @param  string     $indentity_col
     * @return mixed
     */
    public static function retrieve( $table_name, $id = null, $indentity_col = 'id' ) {
        $table_name = self::prefix( $table_name );

        if ( $id != null ) {
            return self::instance()->get_results(
                self::instance()->prepare(
                    sprintf( "SELECT * FROM $table_name WHERE $indentity_col='%s'", $id )
                )
            );
        }

        return self::instance()->get_results(
            "SELECT * FROM $table_name"
        );
    }

    public static function update() {

    }

    /**
     * Delete record(s) in data table
     *
     * @param  string     $table_name
     * @param  string|int $id
     * @param  string     $id_col_name
     * @return mixed
     */
    public static function delete( $table_name, $id, $id_col_name = 'id' ) {
        $table_name = self::prefix( $table_name );

        return self::instance()->delete(
            $table_name,
            [$id_col_name => $id]
        );
    }

    /**
     * Create database table create query
     *
     * @param  string   $table_name
     * @param  array    $schema
     * @param  string   $primary_key
     * @return string
     */
    public static function generate_datatable_schema( $table_name, $schema, $primary_key = 'id' ) {
        $table_name      = self::prefix( $table_name );
        $charset_collate = self::charset_collate();

        $qry = "CREATE TABLE IF NOT EXISTS `{$table_name}` (
        `{$primary_key}` int(255) NOT NULL AUTO_INCREMENT, ";

        foreach ( $schema as $field => $val ) {
            $qry .= self::database_single_field_schema( $field, $val );
        }

        $qry .= "PRIMARY KEY (`{$primary_key}`) ) {$charset_collate}";

        return $qry;
    }

    /**
     * Creates single database field schema
     *
     * @param  string $field_name
     * @param  array  $schema
     * @return void
     */
    public static function database_single_field_schema( $field_name, $schema ) {
        $schema = self::merge_single_field_schema( $schema );

        $null = 'DEFAULT NULL';

        return "`{$field_name}` {$schema['type']} {$null}, ";
    }

    /**
     * Merge single field schema values
     *
     * @param  [type] $schema
     * @return void
     */
    public static function merge_single_field_schema( $schema ) {
        $defaults = [
            'title'    => __( 'Input field' ),
            'type'     => 'text',
            'required' => false,
            'options'  => [],
            'class'    => [],
            'value'    => '',
        ];

        return wp_parse_args( $schema, $defaults );
    }

    /**
     * Creates a table in database
     *
     * @param  string  $table_name
     * @param  array   $schema
     * @param  string  $primary_key
     * @return mixed
     */
    public static function create_datatable( $table_name, $schema, $primary_key = 'id' ) {
        $schema = self::generate_datatable_schema( $table_name, $schema, $primary_key );

        if ( ! function_exists( 'dbDelta' ) ) {
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        return dbDelta( $schema );
    }

    /**
     * Generate data column type for database operations
     *
     * Works from schema parameter
     *
     * @param  string  $schema_name
     * @return array
     */
    public static function generate_data_col_type( $schema ) {

        $result = [];

        foreach ( $schema as $key => $value ) {
            if ( $value['hidden'] == true ) {
                continue;
            }

            switch ( $value['type'] ) {
                case 'longtext':
                case 'text':
                case 'varchar':
                    $result[] = '%s';
                    break;
                case 'integer':
                case 'number':
                case 'int':
                case 'biggint':
                    $result[] = '%d';
                    break;
                case 'float':
                case 'double':
                    $result[] = '%f';
                    break;
                default:
                    $result[] = '%s';
                    break;
            }
        }

        return $result;
    }
}