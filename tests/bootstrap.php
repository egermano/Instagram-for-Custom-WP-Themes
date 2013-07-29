<?php

// fake wp functions
function get_option($arg) {
    return '157954.f59def8.784b70cc49ee49729f19b763aac16020';
}

function add_action($arg, $arr = []) {
    return TRUE;
}

function add_options_page($arg1, $arg2, $arg3, $arg4, $arr = []) {
    return TRUE;
}

function register_setting($arg1, $arg2) {
    return TRUE;
}

function settings_fields($arg1) {
    return TRUE;
}

function do_settings_fields($arg1) {
    return TRUE;
}

function submit_button() {
    return TRUE;
}

function loader($class)
{
    $file = $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
}

spl_autoload_register('loader');


