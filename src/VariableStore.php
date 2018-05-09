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
    private $keys = array();
    private $onlykeys = false;
    private $setempty = true;

    public function __construct($keys = null, $onlykeys = false, $setempty = true){
        if($keys != null){
            if(is_array($keys)) {
                $this->keys = $keys;
                if(is_bool($onlykeys)) {
                    if ($onlykeys) {
                        $this->onlykeys = true;
                    }
                    if(is_bool($setempty)){
                        if($setempty == false){
                            $this->setempty = false;
                        }else{
                            foreach($this->keys as $key){
                                $this->set_variable($key, "");
                            }
                        }
                    }else{
                        throw new \InvalidArgumentException("Parameter $setempty must be boolean");
                    }
                }else{
                    throw new \InvalidArgumentException("Parameter $onlykeys must be boolean");
                }
            }else{
                throw new \InvalidArgumentException("Parameter $keys must be an array");
            }
        }
    }

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

    public function validate_key($key){
        if(in_array($key, $this->keys)){
            return true;
        }else{
            return false;
        }
    }

    public function getKeys(){
        return $this->keys;
    }
}