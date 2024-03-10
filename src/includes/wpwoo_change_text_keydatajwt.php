<?php
namespace WpWooChangeText\includes;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class keydatajwt{
      
    public static function decode_tok_dat($dat,$key) {

        try {  
            $decoded_k = JWT::decode($dat, new Key($key, 'HS256'));                    
        } catch (SignatureInvalidException $e  ){
            return ['error' => 'decode_error'];
        }

        return $decoded_k;
    }

}
