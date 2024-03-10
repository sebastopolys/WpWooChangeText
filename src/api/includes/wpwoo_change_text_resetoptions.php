<?php
namespace WpWooChangeText\api\includes;

use WpWooChangeText\config;


class resetoptions{
   


    public function reset_options( $msg ){

        // update status
        update_option( config::$plsopt,1 );
        // delete data
        delete_option( config::$pldash );
        delete_option( config::$tkidnm );
        delete_option( config::$toknam );
        delete_option( config::$tokdat );
        delete_option( config::$sncrnm );

    }

}
