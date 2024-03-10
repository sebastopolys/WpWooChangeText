<?php
namespace WpWooChangeText\api\includes;

class getwebsite{

    public static $website = null;

    public function __construct( ){       
 
            $parse = parse_url(get_site_url());
            self::$website = $parse['host'];    
             
    }

}