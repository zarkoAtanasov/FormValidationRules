<?php


$current_dir = realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR;


// $remote_dir = basename(realpath('/'.DIRECTORY_SEPARATOR.'application' . DIRECTORY_SEPARATOR));
$remote_dir = realpath('../../../../'.DIRECTORY_SEPARATOR.'application');


$config_files = ['aliases','except_fields','rules'];
$libraries = ['FVR'];

foreach ($config_files as $key => $file) {
    copy($current_dir . 'config'.DIRECTORY_SEPARATOR.$file.'.php', $remote_dir . DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.$file.'.php');
}

foreach ($libraries as $key => $file) {
    copy($current_dir . 'libraries/'.$file.'.php', $remote_dir.DIRECTORY_SEPARATOR.'libraries'.DIRECTORY_SEPARATOR.ucfirst($file).'.php');
}


