<?php
namespace WpWooChangeText\templates;

use WpWooChangeText\config;

class regform{

    public function print_r_form(){

        $rop = '<div class="wrapper">';
        $rop .= '<h1 class ="wp-heading-inline">' . config::$plname . '</h1>';
        $rop .= '<h3 style="font-weight:300">' . config::$pldesc. '</h3>';  
        $rop .= '</pre>Version: ' . config::$plvers . '</pre>';

        $rop .= '<br/><br/><form method="post">';
        $rop .='<div>
                    <div class="forminp">
                        <label for="email_w">Email</label> 
                        <input type="text" name="email_w" id="email_w" class="check-ccli-inp"/>
                    </div>
                    <div class="forminp">
                        <label for="lick_w">Licence Key</label> 
                        <input type="text" name="lick_w" id="lick_w" class="check-ccli-inp"/>
                    </div>
                    <div class="forminp">
                        <input class="button" name="sub_mit_me" type="submit" value="submit"/>
                    </div>
                </div>';
        $rop .='</form></div>';

        return $rop;
        
    }

}
