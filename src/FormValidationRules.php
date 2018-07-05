<?php

namespace FormValidationRules;

class FormValidationRules 
{


    protected $config_path = './src/config/';
    protected $rules = [];


    /**
     * Return All matched rules as array
     *
     * @param Array $data Incomig fields from form
     * @return Array
     **/
    public function getRulesByData($data)
    {
        // set Rules before get them
        $this->setRulesByData($data);

        return $this->rules;
    }

    /**
     * Set rules by given Array
     *
     * Loop through incoming array and search for key => value pair to get 
     * available rules.
     *
     * @param Array $data
     * @return Void
     * @throws conditon
     **/
    public function setRulesByData( Array $data = array() )
    {
        foreach ($data as $key => $value) {

            $field_name = $this->getFieldNameByAlias($key);
            if($field_name === '') {
                $field_name = $key;
            }

            $rules_by_field = $this->getRuleForField($field_name);
            if($rules_by_field)
            {
                $this->rules[] = ['field'=>$field_name,'rules'=>$rules_by_field];
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
    protected function getFieldNameByAlias(String $key)
    {
        $alias_array = include $this->config_path.'aliases.php';

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
    public function getRuleForField(String $field='username')
    {
        $rules_array = include $this->config_path.'rules.php';

        if( isset($rules_array[$field]) ) {
            $rules = $rules_array[$field];
        }

        return $rules;
    }

}
