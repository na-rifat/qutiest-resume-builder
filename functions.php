<?php 

if(!function_exists('qt_img')){
    function qt_img($name){
        return sprintf('<img src="%s" />',QRB_PATH . '/dist/img' . $name);
    }
}