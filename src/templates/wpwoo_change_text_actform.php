<?php
namespace WpWooChangeText\templates;

use WpWooChangeText\config;


class actform{     

    public function active_f( ){

            $pap = '<div class="wrapper">';
            $pap .= '<h1 class ="wp-heading-inline">' . config::$plname . '</h1>';
            $pap .= '<h3 style="font-weight:300">' . config::$pldesc. '</h3>';         
            $pap .=' <p>License is active and installed on this website</p>';
            $pap .= '<pre>Version: ' . config::$plvers . '</pre> 
                </div>';       

        return $pap;
        
    }

}
