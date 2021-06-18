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

if (! function_exists('option_radio')) {
    function option_radio($current,$item_id) {
        if($current===$item_id){
            return 'checked';
        }
    }
}

if(!function_exists('admin_url')) {
    function admin_url($url = null)
    {
        return url('admin/' . $url);
    }
}

if(!function_exists('get_boolean_string')) {
    function get_boolean_string($value)
    {
        if($value==1){
            return 'Yes';
        }else{
            return 'No';
        }
        
        
        
    }
}



?>