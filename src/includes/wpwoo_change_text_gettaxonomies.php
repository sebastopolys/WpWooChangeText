<?php
namespace WpWooChangeText\includes;

class gettaxonomies{

    private $returnpost = [];
    private $returnproduct = [];
    private static $args = [ 'hide_empty' => false];


    public function getposts( string $tax) :array{
        
        $this->returnpost = [];             
    
        if($tax=='cats'){    
            $taxs = get_categories(self::$args);
        }
        if($tax=='tags'){
            $taxs = get_tags(self::$args);
        }

        for ($i=0; $i < count($taxs); $i++) {
            $dump = ['name'=>$taxs[$i]->name,'id'=>$taxs[$i]->term_id];
            $this->returnpost[] = $dump;
        }
 
        return $this->returnpost;

    }

    public function getproducts( string $tax) {

        $this->returnproduct = [];
    

        if($tax=='cats'){    
            $wooarg = ['taxonomy' => 'product_cat'];
        }
        if($tax=='tags'){
            $wooarg = ['taxonomy'  => 'product_tag'];
        }

        $product_cats = get_terms( $wooarg );

        for ($i=0; $i < count($product_cats); $i++) {
            $damp = ['name'=>$product_cats[$i]->name,'id'=>$product_cats[$i]->term_id];
            $this->returnproduct[] = $damp;
        }

        

        return $this->returnproduct;


    }
    
    
}
