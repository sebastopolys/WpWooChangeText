<?php
namespace WpWooChangeText\includes;

class backoptions{


   

    public function whatfunction(){
        return[
                ['label'=>'Add','id'=>'wf_add','class'=>'changetextinput','val'=>'wpwoo_add'],
                ['label'=>'Replace','id'=>'wf_rep','class'=>'changetextinput','val'=>'wpwoo_rep']
        ];        
    }

    public function contentype( ){
        return [
                ['label'=>'Posts','id'=>'ct_posts','class'=>'changetextinput','val'=>'wpwoo_post'],
                ['label'=>'Pages','id'=>'ct_pages','class'=>'changetextinput','val'=>'wpwoo_page'],
                ['label'=>'Products','id'=>'ct_products','class'=>'changetextinput','val'=>'wpwoo_product']
        ];
    }

    public function wheretext(){
        return [
                ['label'=>'Title Prefix','id'=>'wt_prefix','class'=>'changetextinput','val'=>'prfx'],
                ['label'=>'Title Sufix','id'=>'wt_sufix','class'=>'changetextinput','val'=>'sufx'],
                ['label'=>'First paragraph','id'=>'fstpar','class'=>'changetextinput','val'=>'fstpar'],
                ['label'=>'Last paragraph','id'=>'lstpar','class'=>'changetextinput','val'=>'lstpar']
        ];         
    }

    public function targetpost(){
        return [
                ['label'=>'By tags','id'=>'tp_tags','class'=>'changetextinput','val'=>'tags'],
                ['label'=>'By categories','id'=>'tp_cats','class'=>'changetextinput','val'=>'cats'],
                ['label'=>'By ID\'s','id'=>'tp_ids','class'=>'changetextinput','val'=>'ids'],
                ['label'=>'All','id'=>'tp_all','class'=>'changetextinput','val'=>'all']
        ];
    }

}
