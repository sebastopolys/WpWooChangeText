<?php
namespace WpWooChangeText\templates;

use WpWooChangeText\includes\forminputs;
use WpWooChangeText\includes\backoptions;

use WpWooChangeText\includes\gettaxonomies;


class dashform{

    private $forinp = null;

    private $bakops = null;

    private $gettax = null;

    public function __construct( ){ 

        $this->forinp = new forminputs( );
        $this->bakops = new backoptions( );
        $this->gettax = new gettaxonomies( );
    }

    public function printtheform( ){

        // form
        $output = '<form method="POST"  id="change_text_adminform" name="change_text_adminform">';
        
        // hidden AJAX data
        $output .= '<input type="hidden" id="mi_nonce_input" name="mi_nonce_input" value="'.wp_create_nonce( 'mi_nonce_input' ).'">';
        
        
        // Open div
        $output .= $this->forinp->opendiv( 'wpwoo_chtxt_form','wpwoo_ch_txt' );
       
         // What Function
         $output .= $this->forinp->opendiv( 'wpwoowhtfunc','wpwoo_ch_txt' );
            $output .= '<h4>Edit mode (*)</h4>';
            $output .= $this->forinp->radioinput( 'wpwoo_function',$this->bakops->whatfunction( ) );
        $output .= $this->forinp->closediv( ); 
        
        // Content type
        $output .= $this->forinp->opendiv( 'wpwoocontype','wpwoo_ch_txt' );
            $output .= '<h4>Content type (*)</h4>';
            $output .= $this->forinp->radioinput('wpwoo_contype',$this->bakops->contentype( ) );
        $output .= $this->forinp->closediv( );               

        // Text position
        $output .= $this->forinp->opendiv( 'wpwooswheretxt','wpwoo_ch_txt' );
            $output .= '<h4>Text position (*)</h4>';
            $output .=$this->forinp->radioinput( 'wpwoo_wheretext',$this->bakops->wheretext( ) );
        $output .= $this->forinp->closediv( ); 
    
        // Target posts
        $output .= $this->forinp->opendiv( 'wpwootarpost','wpwoo_ch_txt' );
            $output .= '<h4>Target (*)</h4>';
            // select posts categories
            $output .= $this->forinp->radioinput( 'wpwoo_targetpost',$this->bakops->targetpost( ) );

            $output .= $this->selecttaxonomies();

            $output .= '<div id="all_ids" class="hidden_div">';
            $output .= $this->forinp->textinput( 'target_ids','ch_text','','ID\'s separated by comma' );
            $output .= '</div>';
 
        $output .= $this->forinp->closediv( );

        // Text input
        $output .= $this->forinp->opendiv( 'wpwootextipn','wpwoo_ch_txt' );
            $output .= '<h4>Text input (*)</h4>';
            $output .= $this->forinp->textinput( 'ch_textold','ch_text','Text to be replaced: ','text' );
            $output .= $this->forinp->textinput( 'ch_textnew','ch_text','New text here: ','text' );
        $output .= $this->forinp->closediv( );

        $output .= '<button id="chtxt_submit" class="button button-primary" name="chtxt_submit" value="APPLY">APPLY</button>';

        $output .= $this->forinp->closediv( );
        
        $output .= '</form>';

        return $output;

    }
 
     public function selecttaxonomies(){

        $out .= '<div id="post_cat" class="hidden_div"><select class="post-cat-select" id="post-cat-val" multiple name="post-cat-val[]">';
        foreach ($this->gettax->getposts('cats') as $arrval) {
            $out .= '<option value="'.$arrval['id'].'">'.$arrval['name'].'</option>';
           }                            
        $out .=  '</select> </div>';

        $out .= '<div id="post_tag" class="hidden_div"> <select class="post-tag-select" id="post-tag-val" multiple name="post-tag-val[]">';
        foreach ($this->gettax->getposts('tags') as $arrvul) {
            $out .= '<option value="'.$arrvul['id'].'">'.$arrvul['name'].'</option>';
           }                            
        $out .=  '</select></div>';
        
        $out .= '<div id="prod_cat" class="hidden_div"><select class="prod-cat-select" id="prod-cat-val" multiple name="prod-cat-val[]">';
        foreach ($this->gettax->getproducts('cats') as $arrvel) {
            $out .= '<option value="'.$arrvel['id'].'">'.$arrvel['name'].'</option>';
           }                            
        $out .=  '</select> </div>';

        $out .= '<div id="prod_tag" class="hidden_div"><select class="prod-tag-select" id="prod-tag-val" multiple name="prod-tag-val[]">';
        foreach ($this->gettax->getproducts('tags') as $arrvol) {
            $out .= '<option value="'.$arrvol['id'].'">'.$arrvol['name'].'</option>';
           }                            
        $out .=  '</select></div>';

        return $out;
     }

}

 