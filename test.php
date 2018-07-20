<?php

require_once 'vendor/autoload.php';

use FormValidationRules\FormValidationRules as FVR;


$data = [
    'mail'=>'goshko@abv.bg',
    'pass'=>'1245',
    'username'=>'moito Ime',
];

print_r(FVR::getRulesByData($data));