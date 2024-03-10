<?php
namespace WpWooChangeText\backend\includes;

class requesthandler{

    private static $current = null;


    public function __construct(  ) {

        if(self::$current===null){

           // if(FALSE ==  get_option(config::$plprfx.'_current_request') ) return;
          //  self::$current = get_option(config::$plprfx.'_current_request');

        }

    }

    public function startrquest( int $id, array $request ) {

        if($request['content']=='wpwoo_post'){

        }
        if($request['content']=='wpwoo_page'){

        }
        if($request['content']=='wpwoo_product'){

        }

        
        return($request);
        
        // filter content type

        // filter taxonomy

        // save items

        
    }
}