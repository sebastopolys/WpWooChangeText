<?php
namespace WpWooChangeText\database;

class wpdbobject {

    private static $wpdb = NULL;

    protected static $requests = NULL;
    protected static $items = NULL;
    protected static $rels = NULL;

    public function wpdbobj() :object{

        global $wpdb;

        if(self::$wpdb === NULL)            
            self::$wpdb=$wpdb;

        return self::$wpdb;

    }

    public function wpwoo_request_table() :string{

        if(self::$requests === NULL){
            self::$requests = self::wpdbobj()->prefix.'wpwoo_chtxt_requests';
        }
        return self::$requests;

    }

    public function wpwoo_items_table() :string{

        if(self::$items === NULL){
            self::$items = self::wpdbobj()->prefix.'wpwoo_chtxt_items';
        }
        return self::$items;

    }

    public function wpwoo_rels_table() :string{

        if(self::$rels === NULL){
            self::$rels = self::wpdbobj()->prefix.'wpwoo_chtxt_reqit_rels';
        }
        return self::$rels;

    }
    
}