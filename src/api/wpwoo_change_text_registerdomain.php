<?php
namespace WpWooChangeText\api;


use WpWooChangeText\config;
use WpWooChangeText\api\includes\resetoptions;


class registerdomain{ 

    /**
     * Instance of \api\includes\resetoptions class
     */
    private static $restop = null;


    public function __construct( ){
       
        if(self::$restop===null){
            self::$restop = new resetoptions();
        }

    }


    public function registerweb(){        

        #~ POINT 1
        $url = 'http://localhost/pointOne/wp-json/wpwoolicsysAPI/v1/auth/token';      

        $headers = ['Content-Type'  => 'application/json'];        
        $body = [ 'web_d'=>$this->getdomain(),
                  'namespace'=>config::$namspa];
        $args = [ 
                'method'      => 'POST',
                'timeout'     => 45,
                'sslverify'   => false,
                'headers'     => $headers,
                'body' => json_encode($body)
                ];

        $response = wp_remote_post( $url, $args );        

        if ( is_wp_error( $response ) ) {

            return "ERROR";

        } else {

            $body = wp_remote_retrieve_body( $response );
            $pars = json_decode($response['body'],true);           
          
            // reset options if response is error            
            if( array_key_exists('error',$pars)){
                    self::$restop->reset_options($pars['error']);
                    return $pars['error'];                
            }               

            if( is_array($pars) 
                && array_key_exists('token_id',$pars) 
                && array_key_exists('token',$pars)) {
                
                    $id = $pars['token_id'];
                    $token = $pars['token']; 
                    
                    $option_nam = config::$plprfx.'_token_id';
                    $option_tok = config::$plprfx.'_token';
                    
                    // Save token ID & Token
                    update_option( $option_nam,$id,'','yes' );
                    update_option( $option_tok,$token,'','yes' );

                    // Update status from 1 to 2
                    update_option( config::$plsopt,2 );
                
                 // API STATUS ERROR. website is not registered anymore
                
                    flush_rewrite_rules();

                    return  $id . $token;

            }  

        }
        
        return  ' Plugin status: '.config::$plsopt;

    }


    private function getdomain(){
 
        $parse = parse_url(get_site_url());
        return $parse['host'];

    }
    
 
}

/*

WEBSITE STATUS

1_ Run 1 act API ( No api call / previous api call fail )
2_ Ready to activate ( 1st act completed, website is registered )
3_ Licence is active

*/