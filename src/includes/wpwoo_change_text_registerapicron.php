<?php
namespace WpWooChangeText\includes;

class registerapicron{


    private $intsch = null;

    private $strsch = null;


    public function registercron(string $hook, $sch){

        
            $this->intsch=$sch;

       
            $this->strsch=strval($sch).'min';

        // cron hook 
        add_filter('cron_schedules',[$this,'cronschedule']);       

        if ( ! wp_next_scheduled( $hook ) ) {
            wp_schedule_event( time(), $this->strsch, $hook );
        }
        
    }


    public function cronschedule($schedules){

        if(!isset($schedules[$this->strsch])){

            $schedules[$this->strsch] = array(
                'interval' => $this->intsch*60,
                'display' => __('Once every '.strval($this->intsch).' minutes'));
                
        }
         
        return $schedules;

    }

}