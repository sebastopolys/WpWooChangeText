<?php
namespace WpWooChangeText;

error_reporting(E_ALL); // Error/Exception engine, always use E_ALL
ini_set('ignore_repeated_errors', TRUE); // always use TRUE
ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment
ini_set('log_errors', TRUE); // Error/Exception file logging engine.
ini_set('error_log', '/ERROR.log');

/**
 * @link              https://sebastopolys.com/
 * @since             0.0.1
 * @package           WpWooChangeText
 * Plugin Name:       WP WOO Change Text
 * Plugin URI:        https://sebastopolys.com/
 * Description:       Plugin made for testing licencing system
 * Version:           0.0.1
 * Author:            Sebas Rossi
 * Text Domain:       wpwoochangetext
 */


// UPDATER
if( file_exists(__DIR__.'/wpwoo_change_text_updater.php')&&file_exists(__FILE__)&&__FILE__){
    require_once __DIR__ .'/wpwoo_change_text_updater.php';
}

new \updater(); 

// PHP Autoloader
if( file_exists(__DIR__.'/wpwoo_change_text_autoloader.php')&&file_exists(__FILE__)&&__FILE__){
    require plugin_dir_path(__FILE__).'wpwoo_change_text_autoloader.php';       
}
 

// Composer autoloader
if(file_exists(__DIR__.'/vendor/autoload.php') && file_exists(__FILE__)&&__FILE__){
    require __DIR__.'/vendor/autoload.php';
}



autoloader::start();
 
$st = new init( );
$st->startinit();
