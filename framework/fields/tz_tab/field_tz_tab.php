<?php

// Exit if accessed directly
defined( 'TEMPLAZA_FRAMEWORK' ) or exit;

use TemPlazaFramework\Enqueue;
use TemPlazaFramework\Functions;

// Don't duplicate me!
if ( ! class_exists( 'ReduxFramework_TZ_Tab' ) ) {

    /**
     * Main ReduxFramework_heading class
     *
     * @since       1.0.0
     */
    class ReduxFramework_TZ_Tab {
        protected $instances = array();
        /**
         * Field Constructor.
         * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
         *
         * @since         1.0.0
         * @access        public
         * @return        void
         */
        public function __construct( $field = array(), $value = '', $parent = null ) {
            $this->parent = $parent;
            $this->field  = $field;
            $this->value  = $value;

            $this -> init_tab_field($field);
        }

        public function init_tab_field($field){

            if(isset($field['tabs'])){
                $has_media                          = true;
                $args   = $this -> parent -> args;
                $opt_name                           = uniqid($field['id']).'__opt_name';
                $redux_args['opt_name']             = $opt_name;
                $redux_args['menu_type']            = 'hidden';
                $redux_args['dev_mode']             = false;
                $redux_args['ajax_save']            = false;
                $redux_args['open_expanded']        = false;

                $redux_args['dev_mode']             = false;
                $redux_args['database']             = '';
                $redux_args['ajax_save']            = false;
                $redux_args['hide_save']            = true;
                $redux_args['menu_type']            = 'hidden';
                $redux_args['hide_reset']           = true;
                $redux_args['show_import_export']   = false;

                \Redux::set_args($opt_name, $redux_args);
                \Redux::set_sections($opt_name, $field['tabs']);
                \Redux::init($opt_name);
                \Templaza_API::load_my_fields($opt_name);


                add_filter("redux/{$opt_name}/repeater", function($repeater_data) use($redux_args){
                    $repeater_data['opt_names'][]   = $redux_args['opt_name'];
                    return $repeater_data;
                });
                $redux  = \Redux::instance($opt_name );

//                $redux-> _register_settings();

                $enqueue    = new Enqueue($redux);
                $enqueue -> init();
//                ob_start();
//
//                $redux->generate_panel();
//
//                ob_end_clean();

//                $this -> redux          = $redux;

                if($has_media){
                    if ( function_exists( 'wp_enqueue_media' ) ) {
                        wp_enqueue_media();
                    } else {
                        if ( ! wp_script_is( 'media-upload' ) ) {
                            wp_enqueue_script( 'media-upload' );
                        }
                    }
                }
            }
        }


        /**
         * Field Render Function.
         * Takes the vars and outputs the HTML for the field in the settings
         *
         * @since         1.0.0
         * @access        public
         * @return        void
         */
        public function render() {

            $file   = TEMPLAZA_FRAMEWORK_THEME_PATH_FIELDS.'/tz_tab/tmpl/tz_tab.php';

            if(!file_exists($file)){
                $file   = TEMPLAZA_FRAMEWORK_FIELD_PATH.'/tz_tab/tmpl/tz_tab.php';
            }

            if(file_exists($file)){
                require $file;
            }
        }

        public function enqueue() {
            if (!wp_script_is('templaza-field-tz_tab-js')) {
                wp_enqueue_script(
                    'templaza-field-tz_tab-js',
                    Functions::get_my_frame_url() . '/fields/tz_tab/field_tz_tab.js',
                    array( 'jquery', 'jquery-ui-tabs','redux-js'),
                    time(),
                    true
                );
            }
        }
    }
}