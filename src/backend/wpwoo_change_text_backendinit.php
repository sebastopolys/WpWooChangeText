<?php
namespace WpWooChangeText\backend;

use WpWooChangeText\includes\forminputs;
use WpWooChangeText\includes\backoptions;


use WpWooChangeText\templates\dashform;

class backendinit{


    private $forinp = null;

    private $bakops = null;

    private $reqhan = null;

    private $dashfm = null;

    private $psform = null;


    public function __construct( ){

       $this->forinp = new forminputs( );

       $this->bakops = new backoptions( );



       $this->dashfm = new dashform( );

       $this->psform = new postform( );

    }


    public function displayform(){

       
        print_r( $this->dashfm->printtheform( ) );
        return $this->psform->postinputs( );

    }

}
