<?php
namespace WpWooChangeText\database;

use WpWooChangeText\config;
 

class installdatabase extends wpdbobject{
 

    public function checkOption(){    

        if(get_option(config::$plprfx.'_x_installer')=='on'){	
            add_action('admin_init',[$this,'ddbb_install']); 
            add_action( 'admin_notices',[$this,'print_note'],10);          
        }
        else{
            return;
        }

    }
   
    public function ddbb_install() {

        #~ wpdb object
        $wpdb = parent::wpdbobj();

        #~ DataBase version
        $db_version = '1.0';

        #~ Table names
 
        $req = parent::wpwoo_request_table();
        $item = parent::wpwoo_items_table();
        $rels = parent::wpwoo_rels_table();

        #~ Charset
        $charset_collate = $wpdb->get_charset_collate();

        #~ Requests Table
        $request = "CREATE TABLE IF NOT EXISTS $req (
            id INT AUTO_INCREMENT PRIMARY KEY,
            _name VARCHAR(10),
            _function VARCHAR(100),
            _status VARCHAR(10),
            _lastupdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,        
            _created TIMESTAMP DEFAULT CURRENT_TIMESTAMP     
            );";

        #~ ITEMS Table
        $items = "CREATE TABLE IF NOT EXISTS $item (
            id INT AUTO_INCREMENT PRIMARY KEY, 
            _name VARCHAR(50),                     
            _status VARCHAR(10),         
            _lastupdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,        
            _created TIMESTAMP DEFAULT CURRENT_TIMESTAMP     
            );";
            
        #~ Licence/Websites Relations Table
        $relations = "CREATE TABLE IF NOT EXISTS $rels (
            id INT AUTO_INCREMENT,
            req_id INT(15),
            it_id INT(15),
            CONSTRAINT fk_lic FOREIGN KEY (req_id) REFERENCES $rels (id) ON DELETE CASCADE,
            CONSTRAINT fk_web FOREIGN KEY (it_id) REFERENCES $rels (id) ON DELETE CASCADE,
            PRIMARY KEY (id)    
            );";
        
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        
        #~ Do the query
        $wpdb->query($request);
        $wpdb->query($items);
        $wpdb->query($relations);    
         
        #~ Update installer options
        update_option(config::$plprfx.'_x_installer','installed');
        #~ Save DataBase version
        add_option(config::$plprfx.'_db_version', $db_version ); 
      

    }

    public function print_note(){
        echo '<div class="notice notice-info">
        <p>3 new tables has been installed on the database</p>
        </div>';
    }
     
}
