<?php 
namespace WpWooChangeText\includes;

class getpars{

    public function getUrlPar(string $par) :?string{

		if(isset($_GET[$par])){
            $active_tab=$_GET[$par];
			return $active_tab;
        }

		return null;
		
	}
    
}
