<?php

namespace TemPlazaFramework;

defined( 'TEMPLAZA_FRAMEWORK' ) || exit;

if(!class_exists('TemPlazaFramework\Template_Admin')){

    class Template_Admin extends Templates{
        protected static $subfolder = '/framework';

//        public static function load_my_layout($partial, $load = true, $require_once = true, $args = array())
//        {
//            var_dump(get_parent_class()); die();
//            return parent::load_my_layout($partial, $load, $require_once, $args); // TODO: Change the autogenerated stub
//        }

//        public static function locate_my_template($template_names, $load = false, $require_once = true, $args = array()){
//            $located    = '';
//            $base       = TEMPLAZA_FRAMEWORK.static::$framework.'/templates';
//
//            foreach ( (array) $template_names as &$template_name ) {
//                if ( ! $template_name ) {
//                    continue;
//                }
//                $template_name  = $base.'/'.$template_name;
//                if(!preg_match('/\.php$/i', $template_name)){
//                    $template_name  .= '.php';
//                }
//
//                if ( file_exists( get_stylesheet_directory() .'/' . $template_name ) ) {
//                    $located = get_stylesheet_directory() .'/' . $template_name;
//                    break;
//                } elseif ( file_exists( get_template_directory() . '/' . $template_name ) ) {
//                    $located = get_template_directory() . '/' . $template_name;
//                    break;
//                }elseif ( file_exists( TEMPLAZA_FRAMEWORK_PLUGIN_DIR_PATH.'/'.$template_name ) ) {
//                    $located   = TEMPLAZA_FRAMEWORK_PLUGIN_DIR_PATH.'/'.$template_name;
//                    break;
//                }
//            }
////            var_dump($template_name);
//            var_dump($located);
//            var_dump($args);
//            die();
//
//            if($load && $located != '') {
//                load_template($located, $require_once, $args);
//            }
//
//            return $located;
//        }
//
//        public static function load_my_layout($partial, $load = true, $require_once = true, $args = array()){
//            $partial    = str_replace('.', '/', $partial);
//            $located    = self::locate_my_template((array) $partial, $load, $require_once, $args);
//
//            return $located;
//        }
    }
}