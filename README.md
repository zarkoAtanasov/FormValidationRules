# FormValidationRules
CodeIgniter Form Validation rules builder

# Install
**Using composer**

Because it's still in development and there is no stable version, add this to composer.json file

<pre>
<code>
{
    "require": {
        "ZarkoAtanasov\FormValidationRules":"dev-master"
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/zarkoAtanasov/FormValidationRules.git"
        }
    ]
}
</code>
</pre>
Then run `composer update`.<br>
After installation composer automatically will run script that will copy files into `application/config` and `application/library` directories.

# Usage
You can use library simply by loading it via CodeIgniter's load: 

`$this->load->library('Fvr')`

After that call static method: getRulesByData:<br> `Fvr::getRulesByData(<$fields_for_validate>,[$except_fields]);`
This method accepts two parameters: <br>
- $fields_for_validate - fields which will be validated
- $except_fields - fields which will be skipped for current validation proccess

This will return Array with validation rules which you can use later with codeIgniter's Form_validation.<br>
Example:
<pre>
<code>
public function mailMe() {
    // load library
    $this->load->library('fvr');

    // get Rrles by passing entier form
    $rules = Fvr::getRulesByData( $this->input->post(null,true) );
    $this->form_validation->set_rules($rules);
    if ($this->form_validation->run() == false) {
        ...
    }
}
</code>
</pre>

## Config files

After installation, in `application/config` there will three new files: <br>
- aliases.php
- except_fields.php
- rules.php

### aliases.php
You can add aliases for field separating them with pipe (`|`) such as username, password, etc.<br>
Example:<br>
`'email'=>'mail|email_address|emailaddress'`<br>

### except_fields.php
Here you can add fields that should not be validated in entire usage of library, not for current call only.<br>

### rules.php
Common rules by each fields.<br>
Every rule is applied by field's name based on `aliases.php` file. <br>
For example:<br>
If you pass `"email"` or `"mail"` to `getRulesByData`, method will return `['required|valid_email']`, but if you pass something like "user_emailAddress" and this alias is not added in `aliases.php` then method will return empty string.

## Additional info
coming soon...
