<?php
namespace WpWooChangeText\includes;

class forminputs{

    public function opendiv(?string $id, ?string $class) :string{
        if($id==null){ $id = '';}
        if($class==null){$class = '';}
        $odiv = '<div id="'.$id.'" class="'.$class.'">';
        return $odiv;
    }

    public function closediv(){
        $cdiv = '</div>';
        return $cdiv;
    }

    public function textinput( string $id, string $class, string $label, string $placeholder ) :string{
        $ot = ' <label for="'.$id.'" class="label">'.$label.'</label>
                <input type="text" name="'.$id.'" id="'.$id.'" class="'.$class.'" placeholder="'.$placeholder.'">';
        return $ot;
    }

    public function radioinput( string $name, array $options )  {        
        $ut = $value = '';        
        for ($i=0; $i < count($options); $i++) {     
            if(isset($options[$i]['val'])){
                $value = $options[$i]['val'];
            }
            
            $ut .= ' <label for="'.$options[$i]['id'].'" class="label">'.$options[$i]['label'].'</label>
            <input type="radio" id="'.$options[$i]['id'].'" class="'.$options[$i]['class'].'" name="'.$name.'" value="'.$value.'">';
            
        }      
        return $ut;
    }

    public function checkboxinput( string $name, array $options) {
        $cb = $value = '';
        for ($i=0; $i < count($options); $i++) {
            if(isset($options[$i]['val'])){
                $value = $options[$i]['val'];
            }
            $cb .= ' <label for="'.$options[$i]['id'].'" class="label">'.$options[$i]['label'].'</label>
            <input type="checkbox" id="'.$options[$i]['id'].'" class="'.$options[$i]['class'].'" name="'.$name.'[]" value="'.$value.'">';
        }
        return $cb;
    }


}