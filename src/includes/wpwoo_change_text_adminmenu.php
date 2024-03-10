<?php
namespace WpWooChangeText\includes;

use WpWooChangeText\config;

use WpWooChangeText\includes\keydatajwt;

use WpWooChangeText\templates\nolicence;
use WpWooChangeText\templates\regform;
use WpWooChangeText\templates\actform;

use WpWooChangeText\backend\backendinit;
 

class adminmenu{

    /**
     * Instance of config class
     */
    private static $config = null;
 
    /**
     * Instance of includes/keydatajwt
     */
    private static $keydat = NULL;

    /**
     * Instance of backend\backendinit class
     */
    private static $bakini = NULL;


    
    public function backendMenuStart( ){

        if(self::$config===null) self::$config = new config( );

        if(self::$keydat===null) self::$keydat = new keydatajwt( );

        if(self::$bakini===null) self::$bakini = new backendinit( );
         
        add_action('admin_menu',[$this,'testplugin_admin_menu']); // admin dashboard menu

    }

    public function testplugin_admin_menu(){

        add_menu_page(
            __('Change Text',self::$config::$namspa),
            __('Change Text', self::$config::$namspa),
            'manage_options',
            self::$config::$namspa,
            [$this, 'wpwoochangetextcallback']
        );
        
        add_submenu_page(
            self::$config::$namspa,
            'Client Side settings',
            'Premium',
            'manage_options',
            self::$config::$namspa."_premium",
            [$this, 'wpwoochangepremiumcallback']
        );
       
    }

    public function wpwoochangetextcallback(){

        echo "<h2>WP-WOO Change Text</h2>";
        echo "<pre>Please fill all required fields</pre>";
        
        print_r(self::$bakini->displayform());
    }

    public function wpwoochangepremiumcallback(){

        $stat_op = get_option( config::$plsopt );
        $dash_st = get_option( config::$pldash );

        if(FALSE===$stat_op){
            return;
        }

        if( $stat_op == 1 ){
            $nl = new nolicence( );
            print_r( $nl->no_licence_f( ) );
        }
        if( $stat_op == 2 ){
            $rf = new regform();
            print_r( $rf->print_r_form( ) );
        } 
        if( $dash_st == 1 && $stat_op == 3 ){

                $af = new actform( );
                print_r( $af->active_f( ) );      
           
        }

        
 /*
        $check = new keydatajwt( );
        print_r($check->decode_tok_dat(
            config::$pltken,
            '9319121587')
        );
*/

/*
        echo '<pre>';
        print_r( _get_cron_array() );
        echo '</pre>';
        echo "<pre>Plugin Status: ".$stat_op."</pre>";
*/       
    }

}