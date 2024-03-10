<?php
namespace WpWooChangeText\includes;

use WpWooChangeText\config;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
 

class decodedhash{


    private static $bldkey = null;


    public function __construct( ){
       
        if(self::$bldkey===null){
            self::$bldkey = new buildkeys();
        }

    }

    public function getdecodedhash($lk){

        // token id
        $ti = get_option( config::$tkidnm );    

        // token data
        $td = get_option( config::$tokdat );
       
        // build key
        $kk = self::$bldkey->hkey( $lk );
         
        // try to decode
        
        try {  
            $decoded_k = JWT::decode($ti, new Key(strval($kk), 'HS256'));                    
        } catch (SignatureInvalidException $e  ){
            return ['error' => 'decode_error'];
        }
      
        return $decoded_k;
    }
}

 