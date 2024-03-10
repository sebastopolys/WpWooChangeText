<?php
namespace WpWooChangeText\includes;

use WpWooChangeText\config;


class registeractivation{
    

    public function startregister(){     
      
        register_activation_hook(dirname(dirname(__DIR__)).'/wpwoochangetext.php', [$this, 'activatehook'] );
      
    }

    public function activatehook(){

        add_option( config::$plsopt,1 );

        // Database Installer
        if(get_option(config::$plprfx.'_x_installer')==null){
            add_option( config::$plprfx.'_x_installer', 'on' );
        }
        else{
            update_option(config::$plprfx.'_x_installer','installed');
        }    

    }

}
