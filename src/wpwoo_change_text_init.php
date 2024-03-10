<?php
namespace WpWooChangeText; 
 

use WpWooChangeText\config;
use WpWooChangeText\includes\adminmenu;

use WpWooChangeText\database\installdatabase;
use WpWooChangeText\database\includes\saverequest;
 
use WpWooChangeText\backend\includes\requesthandler;
 

use WpWooChangeText\includes\registeractivation;
use WpWooChangeText\includes\getpars;
use WpWooChangeText\includes\keydatajwt;

use WpWooChangeText\api\apiinit;
 

class init{

    /**
     * Instance of database/installdatabase class
     */
    private static $insdat = NULL;

    /**
     * Instance of includes\getpars class
     */
    private static $getpar = NULL;

   
    /**
     * Instance of admin menu class
     */
    private static $bkmenu = NULL;

    /**
     * Instance of registeractivation menu class
     */
    private static $regact = NULL;

    /**
     * Instance of apiinit class
     */
    private static $apini = NULL;

    /**
     * Instance of database/includes/saverequest class
     */
    private static $savreq = NULL;

    /**
     * instance of database\includes\requesthandler
     */
    private static $reqhan = NULL;
 
           

    

    public function __construct( ){   
 
        if(self::$insdat===null) self::$insdat = new installdatabase( );
        if(self::$savreq===null) self::$savreq = new saverequest( );             
        if(self::$getpar===NULL) self::$getpar = new getpars( );     
       
        if(self::$bkmenu===null) self::$bkmenu = new adminmenu( );       
        if(self::$regact===null) self::$regact = new registeractivation( );
        if(self::$apini===null) self::$apini = new apiinit( );
        if(self::$reqhan===null) self::$reqhan = new  requesthandler( );
 
    }

    public function startinit(){
 
        add_action( 'admin_init',[$this,'initialize_admin'] );
        add_action( 'wp_ajax_form_post_ajax', [$this,'form_post_ajax'] );
 
        

        self::$regact->startregister( );
        self::$insdat->checkOption( );        

        return $this->pl_dashboard( );
 
    }
    


    public function initialize_admin( ){
      
        // initialize only on "page" URL parameter
        if( NULL === self::$getpar->getUrlPar('page') ) {
            return NULL;
        }
        // initialize only on "page=wpwoochangetext" URL parameter
        if( self::$getpar->getUrlPar('page') == config::$namspa ) {
        
                wp_register_script( 'wpwoo-ajax', plugin_dir_url( __FILE__ ) . 'scripts/js/wpwoo_main_admin.js', array(), '1', true );
                wp_enqueue_script( 'wpwoo-ajax' );

                wp_localize_script( 'wpwoo-ajax', 'wpwoo_var', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
  
                wp_register_script('wpwoo-select',plugin_dir_url(__FILE__).'scripts/js/wpwoo_select2.js', ['jquery'], '1', true);
                wp_enqueue_script('wpwoo-select');

                wp_register_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array('jquery'), '4.0.13', true);
                wp_enqueue_script('select2');
 
                wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css');      

       }

       

       
        // initialize only on "page=wpwoochangetext_premium" URL parameter
        if( self::$getpar->getUrlPar('page') !== config::$namspa.'_premium' ){
            return NULL;
        }
        return self::$apini->apimanagment();        

    }

    public function form_post_ajax() {
       
        $f_data = [];
        foreach (config::$finpts as $key => $value) {
            if( isset($_POST[$value]) && !empty($_POST[$value]) ){
                $f_data[$key] = $_POST[$value];
            }
        }
      
        
            // save request
          $id = self::$savreq->savereq( $f_data );

            // start executing the request
            $request = self::$reqhan->startrquest( $id, $f_data );

            $response = array(
                json_encode( $id )
            );
            
            wp_send_json_success( $response );
       
    }
  


    private function pl_dashboard( ){

        return self::$bkmenu->backendMenuStart( );

    }
     
}
