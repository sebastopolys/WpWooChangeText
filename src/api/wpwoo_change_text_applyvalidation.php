<?php
namespace WpWooChangeText\api;

use WpWooChangeText\config;

use WpWooChangeText\api\includes\getwebsite;
use WpWooChangeText\api\includes\resetoptions;
use WpWooChangeText\includes\registerapicron;

class applyvalidation{

   

    /**
     * Instance of api/includes/getwebsite class
     */
    private $getweb = null;

    /**
     * Instance of api/includes/reset options class
     */
    private $resops = null;

    /**
     * Instance of includes/registerapicron
     */
    private $apcron = null;  


    public function __construct( ){
        

        if($this->getweb===null) $this->getweb = new getwebsite( );   

        if($this->resops===null) $this->resops = new resetoptions( );        

        if($this->apcron===null) $this->apcron = new registerapicron( );

         
    }    

    public function validateweb(  ){

        #~ POINT 1
        $token = get_option( config::$toknam );
        $dom_id = get_option('domain_id');
        $url = 'http://localhost/pointOne/wp-json/wpwoolicsysAPI/v1/validationpath';      

        $head = [
                    'Content-Type'  => 'application/json'
                ];
        $body = [     
                    'dom_d' =>$this->getdomain(),
                    'web_d' =>$dom_id,              
                    'token'=>$token
                ];
        $args = [ 
                    'method'      => 'POST',
                    'timeout'     => 45,
                    'sslverify'   => false,
                    'headers'     => $head,
                    'body' => json_encode( $body )
                ];

        $response = wp_remote_post( $url, $args );
        
     
        if ( is_wp_error( $response ) ) {

            return "ERROR";

        } else {

            $body = wp_remote_retrieve_body( $response );
            $pars = json_decode($response['body'],true);
            
            // reset options if response is error            
            if( array_key_exists('error',$pars)){
                $this->resops->reset_options( $pars['error'] );
                return $pars['error'];                
            } 
            
           // update_option('success_apply_val',$body);            
             
        }        
      
       return;   

    }

    private function getdomain(){
 
        $parse = parse_url(get_site_url());
        return $parse['host'];

    } 

} 
