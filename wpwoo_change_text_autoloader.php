<?php
declare(strict_types=1);
namespace WpWooChangeText;

/**
 * Enable autoloading of plugin classes in namespace 
 * @package WpWooLicSys\init
 * @param $class_name: autogenerated - class names
**/

 class autoloader{
    
    public static function start(){
        spl_autoload_register([__CLASS__,'autoload']);
    }

    private static function autoload( string $class_name ){
            /* Only autoload classes from this namespace */
            if (false === strpos($class_name,__NAMESPACE__)){
                return;
            }
            /* Remove namespace from class name */
            $class_file = str_replace( __NAMESPACE__ . '\\', '', $class_name );
            /* Convert class name format to file name format */
            //$class_file = strtolower( $class_file );
            $class_file = str_replace( '_', '-', $class_file );
            /* Convert sub-namespaces into directories */
            $class_path = explode( '\\', $class_file );
            $class_file = array_pop( $class_path );
            $class_path = implode( '/', $class_path );
            /* Load the class */
            require __DIR__ . '/src/' . $class_path .'/wpwoo_change_text_' . $class_file . '.php';
        }
    
    private function __destruct(){
        spl_autoload_unregister([__CLASS__, 'autoload']);
    }
}