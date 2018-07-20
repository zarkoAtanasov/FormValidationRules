<?php
/*
|--------------------------------------------------------------------------
| COMMON RULES FOR FIELDS
|--------------------------------------------------------------------------
|
| Returns array with field's validations with pipe structure.
| There rules are common. You can change or expand them by adding "|" and next rule.
| All available rules are described in CodeIgniter's documentation
|
| 
| https://www.codeigniter.com/userguide3/libraries/form_validation.html#setting-validation-rules
|
|
*/

return [
    'email'=>'required|valid_email',
    'repeat_email'=>'required|matches[email]',
    'firstname'=>'required',
    'username'=>'required',
    'password'=>'required|min_length[6]',
    'repeat_password'=>'required|matches[password]',
    'phone'=>'required|regex_match[/^(\+?)[0-9]{6,12}$/]',
];