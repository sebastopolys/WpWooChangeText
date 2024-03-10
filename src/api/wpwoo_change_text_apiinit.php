<?php
namespace WpWooChangeText\api;

use WpWooChangeText\config;
 
use WpWooChangeText\includes\getpars;
use WpWooChangeText\includes\registerapicron;

class apiinit{

  
  private static $config = NULL;

    /**
     * Instance of includes\getpars class
     */
    private static $getpar = NULL; 

    /**
     * Instance of applyvalidation class
     */
    private static $appval = NULL;

    /**
     * Instance of registerapicron class
     */
    private $apcron = null;
 


    public function __construct( ){

        if(self::$config===NULL) self::$config = new config( );
        if(self::$getpar===NULL) self::$getpar = new getpars( );
        if(self::$appval===NULL) self::$appval = new applyvalidation( );
        if($this->apcron===null) $this->apcron = new registerapicron( );

 
        // Run CRON 2
        $cron = get_option(self::$config::$sncrnm);
        add_action($cron,[$this,'secondcron']);


    }

    public function apimanagment(){

        // Validate website once licence is installed
      

        // Installation only on plugin dashboard
        if( NULL === self::$getpar->getUrlPar('page') 
            && ( self::$getpar->getUrlPar('page') !== config::$namspa
                || self::$getpar->getUrlPar('page') !== config::$namspa.'_premium') ){
                  return NULL;
                      
        }            

        if(config::$plstat == 1){

            // STEP 1 - Auto call to API
            $regdom = new registerdomain( );
            $regdom->registerweb( );

        }

        if(config::$plstat == 2){

            // STEP 2 - Api call on client submit form
            $regdom = new clientinstall( );
            $regdom->installweb( );

        }

        if(config::$plstat == 3){

            // schedule CRON in minutes ( $mins )
            $mins = 1;
            $this->apcron->registercron( config::$sndcro, $mins );
            
        }

    }

    public function secondcron(){     
        
        // Run the 2 CRON 
        self::$appval->validateweb( );
       
    }

}

