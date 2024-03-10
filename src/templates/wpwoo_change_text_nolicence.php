<?php
namespace WpWooChangeText\templates;

use WpWooChangeText\config;


class nolicence{    

    public function no_licence_f( ){ 

        $nop = '<div class="wrapper">';
            $nop .= '<h1 class ="wp-heading-inline">' .  config::$plname . '</h1>';
            $nop .= '<h3 style="font-weight:300">' . config::$pldesc. '</h3>';         
            $nop .=' <p>Sorry, this website is not registered on any licence</p>';
        $nop .= '<pre>Version: ' . config::$plvers . '</pre> 
                </div>';       

        return $nop;
        
    }

}
