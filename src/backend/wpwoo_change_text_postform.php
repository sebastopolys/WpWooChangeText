<?php
namespace WpWooChangeText\backend;

class postform{

    public function __construct( ){

    }

    public function postinputs(){

        if(isset($_POST['chtxt_submit'])){
            echo "<pre>Submitted</pre>";

            // function input (required)
            if(empty($_POST['wpwoo_function'])){
                return "please complete all required options #1";
            }
            $mode = $_POST['wpwoo_function'];

            // content type input (required)
            if(empty($_POST['wpwoo_contype'])){
                return "please complete all required options #2";
            }
            $content = $_POST['wpwoo_contype'];

            // What text (required)
            if(empty($_POST['wpwoo_wheretext'])){
                return "please complete all required options #3";
            }
            $whetxt = $_POST['wpwoo_wheretext'];

            // Target (required)
            if(empty($_POST['wpwoo_targetpost'])){
                return "please complete all required options #4";
            }
            $target = $_POST['wpwoo_targetpost'];
            
            // Text input (required)
            if(empty($_POST['ch_textnew'])){
                return "please complete all required options #5";
            }
            $text = $_POST['ch_textnew'];            
            
            // build array
            $out = [                
                'mod'=>$mode,
                'cont'=>$content,
                'wrxt'=>$whetxt,
                'targ'=>$target,
                'text'=>$text,
            ];

            //target text input (optional)
            $target_val = null;
            if(!empty($_POSTS['wpwoo_tarvalue'])){
                $taget_val = $_POSTS['wpwoo_tarvalue'];
                $out['txinp'] = $target_val;
            }

            // old text input (optional)
            $oldtxt = null;
            if(!empty($_POST['ch_textold'])){
                $oldtxt = $_POST['ch_textold'];
                $out['oldtxt'] = $oldtxt;
            }   

            // return the array with options            
            return  ( $out);
       


        }
    }

}