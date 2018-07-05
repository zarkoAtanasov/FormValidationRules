<?php

require_once 'vendor/autoload.php';

use FormValidationRules\FormValidationRules as Rules;


$rules = new Rules();

$data = [
    'mail'=>'goshko@abv.bg',
    'pass'=>'1245',
    'username'=>'moito Ime',
];


print_r($rules->getRulesByData($data));