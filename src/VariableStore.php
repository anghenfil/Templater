<?php
/**
 * Created by PhpStorm.
 * User: anghenfil
 * Date: 15.02.18
 * Time: 18:00
 */

namespace anghenfil\Templater;


class VariableStore{
    private $array = array();

    public function set_variable($key1, $val1){
        $this->array[$key1] = $val1;
    }

    public function issaved($key1){
        if(isset($this->array[$key1])){
            return true;
        }
    }

    public function push($key1, $val1){
        $this->array[$key1] .= $val1;
    }

    public function getStore(){
        return $this->array;
    }
}