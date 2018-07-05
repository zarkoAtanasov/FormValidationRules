<?php

return [
    'email'=>'required|valid_email',
    'repeat_email'=>'required|matches[email]',
    'firstname'=>'required',
    'username'=>'required',
    'password'=>'required|min_length[6]',
    'repeat_password'=>'required|matches[password]',
    'phone'=>'required|regex_match[/^(\+?)[0-9]{6,12}$/]',
];