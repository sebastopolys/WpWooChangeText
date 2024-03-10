<?php
namespace WpWooChangeText\includes;

use WpWooChangeText\config;

class ajaxposts{

    public function includeajax(){
        add_action('wp_ajax_form_post_ajax', [$this,'form_post_ajax']);


        wp_register_script( 'wpwoo_change_text', plugin_dir_url( __FILE__ ) . 'scripts/js/wpwoo_main_admin.js', array() );
       

    }
}