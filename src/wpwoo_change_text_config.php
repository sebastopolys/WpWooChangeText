<?php

namespace WpWooChangeText;

final class config{

    /**
     * Plugin name
     */
    public static $plname = null;

    /**
     * Plugin prefix
     */
    public static $plprfx = null;

    /**
     * Plugin dashboard option name
     */
    public static $pldash = null;

    /**
     * Plugin dashboard option value
     */
    public static $pldsop = null;

    /**
     * Plugin version
     */
    public static $plvers = null; 

    /**
     * Plugin description
     */
    public static $pldesc = null;

    /**
     * Plugin token id option name
     */
    public static $tkidnm = null;

    /**
     * Plugin token ID option
     */
    public static $pltkid = null;
     
    /**
     * Plugin token name
     */
    public static $toknam = null;

    /**
     * Plugin Token option
     */
    public static $pltken = null;

    /**
     * Plugin token data name
     */
    public static $tokdat = null;

    /**
     * Plugin Token data option
     */
    public static $pltkdt = null;

    /**
     * Plugin namespace
     */
    public static $namspa = null;

    /**
     * Plugin status option name
     */
    public static $plsopt = null;

    /**
     * Plugin status option
     */
    public static $plstat = null;

    /**
     * SW first Cron
     */
    public static $fstcro = null;

    /**
     * 2nd cron name
     */
    public static $sncrnm = null;

    /**
     * 2nd CRON
     */
    public static $sndcro = null;

    /**
     * DEBUG
     */
    public static $debug = null;

    /**
     * Form Inputs
     */
    public static $finpts = null;



    public function __construct(){

        $meths = get_class_methods(__CLASS__);

        foreach ($meths as $meth) {
            if($meth!=='__construct'){
                $this->$meth();
            }          
        }

    }  
    


    private function plugin_name(){
        if(self::$plname===null)
            self::$plname = 'WP WOO Change Text';
    }

    private function cl_prefix(){
        if(self::$plprfx===null)
            self::$plprfx = 'wpwoochangetext';
    }

    private function cl_namespace(){
        if(self::$namspa===null)
            self::$namspa = __NAMESPACE__;
    }

    private function cl_dash(){
        if(self::$pldash===null)
            self::$pldash = self::$plprfx.'_wpct_pldash';
    }

    private function cl_dash_op(){
        if(self::$pldsop===null)
            self::$pldsop = get_option(self::$pldash);
    }
    
    private function plugin_version(){
        if(self::$plvers===null)
            self::$plvers = '0.0.2';
    }    
    
    private function plugin_description(){
        if(self::$pldesc===null)
            self::$pldesc = 'Sample Plugin for changing text on posts and products';
    }

    private function token_id_name(){        
        if(self::$tkidnm === null)
            self::$tkidnm = self::$plprfx.'_token_id';
    }

    private function plugin_token_id(){

        if(self:: $pltkid === null)
            self:: $pltkid = get_option(self::$tkidnm);
    }     

    private function token_name(){
        if(self:: $toknam === null)
            self:: $toknam = self::$plprfx.'_token';
    }  

    private function plugin_token(){
        if(self:: $pltken === null)
            self:: $pltken = get_option(self::$toknam);    
    }

    private function token_data_name(){
        if(self:: $tokdat === null)
            self:: $tokdat = self::$plprfx.'_token_dt';
    }  

    private function plugin_token_data(){
        if(self:: $pltkdt === null)
            self:: $pltkdt = get_option(self::$tokdat);    
    }    
   
    private function pl_stat_option(){
        if(self:: $plsopt === null)
            self:: $plsopt = 'plugin_activation_Xm4lm9s';    
    }

    private function plugin_status(){
        if(self:: $plstat === null)
            self:: $plstat =get_option(self::$plsopt);    
    }

    private function first_cron(){
        if(self:: $fstcro === null)
            self:: $fstcro = 'wp_post_cache_metadata';    
    }

    private function second_cron_name(){
        if(self:: $sncrnm === null)
            self:: $sncrnm = 'decoded_cron_name';    
    }

    private function second_cron(){
        if(self:: $sndcro === null)
            self:: $sndcro = get_option(self::$sncrnm);    
    }

    private function form_inputs(){
        if(self::$finpts === null)
            self::$finpts = [   
                            'function'=>'wpwoo_function',
                            'content'=>'wpwoo_contype',
                            'where'=>'wpwoo_wheretext',
                            'target'=>'wpwoo_targetpost',
                            'tarvalue'=>'wpwoo_tarvalue',
                            'oldtxt'=>'ch_textold',
                            'newtxt'=>'ch_textnew'
                            ];
    }

    private function debug(){
        if(self:: $debug === null)
            self:: $debug = TRUE;    
    }
   
}
 
