<?php

if (! function_exists('active_link')) {
    function active_link($link = null) {
        if(Request::is($link)){
            return 'active';
        }
    }
}

if (! function_exists('option_select')) {
    function option_select($current,$item_id) {
        if($current==$item_id){
            return 'selected';
        }
    }
}



?>