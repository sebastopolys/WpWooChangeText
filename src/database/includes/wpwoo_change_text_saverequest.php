<?php
namespace WpWooChangeText\database\includes;

use WpWooChangeText\config;
use WpWooChangeText\database\wodbobject;

class saverequest {

    private $wpdbobj = null;
    private $reqtab = null;
 
    public function __construct( ){

      global $wpdb;

        if($this->wpdbobj===null){            
            $this->wpdbobj = $wpdb;
        }

        if($this->reqtab===null){
            $this->reqtab = $wpdb->prefix.'wpwoo_chtxt_requests';
        }

    }
 
 
    public function savereq( $functions ) {

        $funcs = json_encode($functions); 
        
        $table = $this->reqtab;      
       
        $sql = "INSERT INTO ".$table."  set _name= '', 
                                        _function= '".$funcs."',
                                        _status= 'inactive',
                                        _lastupdate= CURRENT_TIMESTAMP,
                                        _created= CURRENT_TIMESTAMP ";
    
        $this->wpdbobj->query($sql);

        // update name
        $id = $this->wpdbobj->insert_id;
        $name = "REQUEST-".$id;
        $this->wpdbobj->query($this->wpdbobj->prepare("UPDATE ".$table." SET _name='$name' WHERE id= %d", $id));
 
        return 'SUCCESS: request '.$id.' created';

    }

}
  