<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use ZarkoAtanasov\FormValidationRules;
class Fvr extends FormValidationRules
{
    public $CI;

    public function __construct()
    {
        // Set CI default config path
        $new_path = APPPATH.'config'.DIRECTORY_SEPARATOR;

        self::getConfigFile($new_path);
    }
}

?>
