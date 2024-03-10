<?php
namespace WpWooChangeText\database\includes;

use WpWooChangeText\config;
use WpWooChangeText\database\wodbobject;

class saverequest extends wpdbobject{

 
    private $reqtab = null;
 
    public function __construct( ){

       
        if($this->reqtab===null){
            $this->reqtab = $wpdb->prefix.'wpwoo_chtxt_requests';
        }

    }

    public function getsinglerequest( string $search, int $id ) :array{

        $request = $this->wpdbobj()->get_results( "SELECT * FROM ".parent::wpwoo_request_table()." WHERE ".$search."='".$id."'" );
        return $request;

    }
}