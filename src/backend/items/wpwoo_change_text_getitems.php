<?php
namespace WpWooChangeText\backend\items;

class getitems{

    public function getpostitems( $target,$value ) {
        
        $args = [];
        
        if($target=='cats'){
            $args = ['category' => 4];

        
        }
        if($target=='tags'){
            $args = ['category' => 4];

        
        }
        if($target=='ids'){
            
        }

    }

    public function getpageitems( $target,$value ) {

    }

    public function getproductitems( $target,$value ){
        
    }
}