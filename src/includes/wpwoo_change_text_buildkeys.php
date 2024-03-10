<?php
namespace WpWooChangeText\includes;

class buildkeys{

public static $key = null;

    public function hkey(string $str) :string {

        if(self::$key === null){
            self::$key = substr(str_replace('-','',$str),2,-2);  
        }

    return  self::$key;

    }
}