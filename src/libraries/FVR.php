<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use ZarkoAtanasov\FormValidationRules;

class Fvr extends FormValidationRules
{
    public $CI;

    public function __construct()
    {
        $new_path = '/config/';
        self::setConfigPath($new_path);
    }
}

?>
