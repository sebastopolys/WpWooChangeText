<?php
namespace WpWooChangeText\api\includes;

use WpWooChangeText\config;


class clientpostform{
     

    public function runPosts() :?array{

        if(isset($_POST['sub_mit_me'])){
            if(!empty($_POST['email_w'])&&!empty($_POST['lick_w'])){

                $email = $_POST['email_w'];
                $lic_k = $_POST['lick_w'];                

                    if(null != $this->validateForm( $email,$lic_k )){
                        return $this->validateForm( $email,$lic_k ); 
                    }             

            }

        }

        return NULL;

    }


    private function validateForm( string $email, string $lic_k ) :?array {

        $tk_id = config::$pltkid;
        $tk_en = config::$pltken;

        // token id && token exists on options table
        if( $tk_id && $tk_en ){
            return [
                    'email'=>$email,
                    'lic_k'=>$lic_k,
                    'token_id'=>$tk_id,
                    'token'=> $tk_en
                    ];
        }

            return NULL;        

    }

}