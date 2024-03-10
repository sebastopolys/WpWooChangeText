<?php
namespace WpWooChangeText;
 

 
/**
 * @link              https://sebastopolys.com/
 * @since             0.0.2
 * @package           WpWooChangeText
 * Plugin Name:       WP WOO Change Text
 * Plugin URI:        https://sebastopolys.com/
 * Description:       Plugin made for testing licencing system
 * Version:           1.0.0
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
 

 
include_once(__DIR__.'/updater/updater.php');
if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
    $data = array(
        'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
        'proper_folder_name' => 'WpWooChangeText', // this is the name of the folder your plugin lives in
        'api_url' => 'https://github.com/sebastopolys/WpWooChangeText', // the GitHub API url of your GitHub repo
        'raw_url' => 'https://github.com/sebastopolys/WpWooChangeText/master', // the GitHub raw url of your GitHub repo
        'github_url' => 'https://github.com/sebastopolys/WpWooChangeText', // the GitHub url of your GitHub repo
        'zip_url' => 'https://github.com/sebastopolys/WpWooChangeText/zipball/master', // the zip url of the GitHub repo
        'sslverify' => true, // whether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
        'requires' => '3.0', // which version of WordPress does your plugin require?
        'tested' => '3.3', // which version of WordPress is your plugin tested up to?
        'readme' => 'README.md', // which file to use as the readme for the version number
        'access_token' => '', // Access private repositories by authorizing under Plugins > GitHub Updates when this example plugin is installed
    );
    
  // new WP_GitHub_Updater($data);
}

  autoloader::start();
 
 $st = new init( );
 $st->startinit();
 
