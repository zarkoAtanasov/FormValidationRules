<?php


$current_dir = basename(dirname(__FILE__)) . '/';
$remote_dir = './application';

$config_files = ['aliases','except_fields','rules'];
$libraries = ['FVR'];

foreach ($config_files as $key => $file) {
    copy($current_dir . 'config/'.$file.'.php', './application/config/'.$file.'.php');
}

foreach ($libraries as $key => $file) {
    copy($current_dir . 'libraries/'.$file.'.php', './application/config/'.ucfirst($file).'.php');
}


