<?php

namespace FormValidationRules;

class FormValidationRules 
{

    /** @var String $config_path default config path */
    static protected $config_path = './src/config/';
    /** @var Array $rules All available rules by given data */
    static protected $rules = [];


    /**
     * Return All matched rules as array
     *
     * @param Array $data Incomig fields from form
     * @param Array $except Except some fields
     * @return Array
     **/
    static public function getRulesByData($data,$except = [])
    {
        // set Rules before get them
        self::setRulesByData($data,$except);

        return self::$rules;
    }

    /**
     * Set rules by given Array
     *
     * Loop through incoming array and search for key => value pair to get 
     * available rules.
     *
     * @param Array $data
     * @param Array $except fields that will be excepted
     * @return Void
     **/
    static public function setRulesByData( Array $data = [], Array $except = [] )
    {

        // merge all excepted fields in one array
        $except = array_merge($except,self::getDefaultExpectedFields());

        foreach ($data as $key => $value) {

            // skip every field that is in except array
            if(in_array($key,$except)) {
                continue;
            }

            $field_name = self::getFieldNameByAlias($key);
            if($field_name === '') {
                $field_name = $key;
            }

            $rules_by_field = self::getRuleForField($field_name);
            if($rules_by_field)
            {
                self::$rules[] = ['field'=>$field_name,'rules'=>$rules_by_field];
            }
        }
    }


    /**
     * Get field name by given alias
     *
     * In different projects fields name are different but they point to same field
     * ex: email=>mail; username=>user_name; firstname=>first_name; lastname=>last_name,family_name etc
     *
     * @param String $key 
     * @return String alias field name
     **/
    static protected function getFieldNameByAlias(String $key)
    {
        $alias_array = include self::$config_path.'aliases.php';

        foreach ($alias_array as $field_name => $alias_list) {

            if( in_array( $key, explode('|',$alias_list) ) ) {

                return $field_name;
            }
        }

        return '';
    }

    /**
     * Get Rules for given field name
     *
     * Check config rules for fields rules
     *
     * @param String $field 
     * @return Mixed
     **/
    static public function getRuleForField(String $field)
    {
        $rules_array = self::getRulesFromFile();

        if( isset($rules_array[$field]) ) {
            $rules = $rules_array[$field];
        }

        return $rules;
    }

    /**
     * Get Rules delcared in file and return them as array
     *
     * @return Array
     **/
    static public function getRulesFromFile()
    {
        $rules_array = include self::$config_path.'rules.php';

        return $rules_array;
    }

    /**
     * get Expect fields set by default in config file
     * 
     * @return Array
     **/
    static public function getDefaultExpectedFields()
    {
        
        $except_array = include self::$config_path.'except_fields.php';

        return $except_array;
    }  
}
