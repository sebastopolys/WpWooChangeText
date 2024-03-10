<?php
namespace WpWooChangeText\api;

use WpWooChangeText\config;

use WpWooChangeText\api\includes\clientpostform;
use WpWooChangeText\api\includes\resetoptions;
use WpWooChangeText\includes\decodedhash;
use WpWooChangeText\includes\keydatajwt;
use WpWooChangeText\includes\registerapicron;
# use WpWooChangeText\crons\registerdeactivation;


class clientinstall{
  

    private static $apiform = null;

    private static $resops = null;

    private static $getdch = null;

    private static $apcron = null;

   # private static $rdeact = null;


    public function __construct(){       

        if(self::$apiform===null) self::$apiform = new clientpostform( );
        
        if(self::$resops===null) self::$resops = new resetoptions( );

        if(self::$getdch===null) self::$getdch = new decodedhash( );

        if(self::$apcron===null) self::$apcron = new registerapicron( );
            
     #   if(self::$rdeact===null) self::$rdeact = new registerdeactivation($config);

    }    

    public function installweb(){

          if(null != self::$apiform->runPosts()){

           $posts = self::$apiform->runPosts();
           return $this->makeApiCall($posts);

          }
          return null;
    }

    public function makeApiCall($posts){
       
        $url = 'http://localhost/pointOne/wp-json/wpwoolicsysAPI/v1/ping';

        $headers = ['Content-Type'  => 'application/json'];
        $body = [
                    'email'=>$posts['email'],
                    'lic_k'=>$posts['lic_k'],
                    'token_id'=>$posts['token_id'], 
                    'token'=>$posts['token']
                ];
        $args = [ 
                    'method'      => 'POST',
                    'timeout'     => 45,
                    'sslverify'   => false,
                    'headers'     => $headers,
                    'body' => json_encode($body)
                ];

        $response = wp_remote_post( $url, $args );
            
        if (! $response ) {

            return "ERROR";

        } else {

            $body = wp_remote_retrieve_body( $response );
            $pars = json_decode($response['body'],true);
 
            // reset options if response is error
            if( array_key_exists('error',$pars) ) {
                
                self::$resops->reset_options($pars['error']);
                return $pars['error'];
            }

             
            if( is_array($pars) 
                && array_key_exists( 'token',$pars )
                && array_key_exists('token_dt',$pars) ) {            
          
                // get response pars
                $dom_id = $pars['dom_id'];
                $token = $pars['token'];
                $token_id = $pars['token_id'];   
                $token_dt = $pars['token_dt'];
                
               

                // update tokens             
                update_option( 'domain_id',$dom_id,'','yes' );   
                update_option( config::$toknam,$token,'','yes' );
                update_option( config::$tkidnm,$token_id,'','yes' );
                update_option( config::$tokdat,$token_dt,'','yes' );
                       
                // Update status options
                update_option( config::$plsopt,3 );
                update_option( config::$pldash,1 );

                 // get the names
                //add_option('decode_key',self::$getdch->getdecodedhash($posts['lic_k'])->token_id);
                         
                // decode token data                  
                 $keyd = keydatajwt::decode_tok_dat( 
                                strval($token_dt),
                                strval(self::$getdch->getdecodedhash($posts['lic_k'])->token_id) 
                                );

                                // build cron name
                                $cron2 = $keyd->cron2.'_'.rand(100000000,999999999);
                
                add_option(config::$sncrnm,$cron2);

                // register validation CRON
                self::$apcron ->registercron( $cron2,3 );  

                flush_rewrite_rules();
               
                return " - Licence activated for this website";

            }

            return ["error"=>"FAIL"];
           
        }

    }
 

}
