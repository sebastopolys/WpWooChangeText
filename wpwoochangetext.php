<?php
namespace WpWooChangeText;

use WpWooChangeText\updater\updater;
 

 
/**
 * @link              https://sebastopolys.com/
 * @since             0.0.2
 * @package           WpWooChangeText
 * Plugin Name:       WP WOO Change Text
 * Plugin URI:        https://sebastopolys.com/
 * Description:       Plugin made for testing licencing system
 * Version:           1.2
 * Author:            Sebas Rossi
 * Text Domain:       WpWooChangeText
 */
 
 /*
 if(file_exists(__DIR__.'/vendor/autoload.php') && file_exists(__FILE__)&&__FILE__){
    require __DIR__.'/vendor/autoload.php';
 }
*/

error_reporting(E_ALL); // Error/Exception engine, always use E_ALL

ini_set('ignore_repeated_errors', TRUE); // always use TRUE
ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment
ini_set('log_errors', TRUE); // Error/Exception file logging engine.
ini_set('error_log', '/ERROR.log'); 


 if( file_exists(__DIR__.'/wpwoo_change_text_autoloader.php')  
     && file_exists(__FILE__)&&__FILE__){

      require plugin_dir_path(__FILE__).'wpwoo_change_text_autoloader.php';
       
}

if(file_exists(__DIR__.'/vendor/autoload.php')){
      require __DIR__.'/vendor/autoload.php';
}

// Autoloader
if(class_exists('autoloader') ) {
    die('Class not found Error.<br/>Please deactivate WPWOO Licence system plugin');
}


 
  if (is_admin()) {
 


    include_once(plugin_dir_url( __FILE__ ) .'wpwoo_change_text_updater.php');
 
   
}
 

  autoloader::start();
 
 $st = new init( );
 $st->startinit();
 
