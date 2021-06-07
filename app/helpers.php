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

if(!function_exists('admin_url')) {
    function admin_url($url = null)
    {
        return url('admin/' . $url);
    }
}

?>