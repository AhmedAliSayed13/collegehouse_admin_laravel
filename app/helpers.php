<?php

if (! function_exists('active_link')) {
    function active_link($link = null) {
        if(Request::is($link)){
            return 'active';
        }
    }
}


?>