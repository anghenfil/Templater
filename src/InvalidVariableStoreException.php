<?php
/**
 * Created by PhpStorm.
 * User: anghenfil
 * Date: 15.02.18
 * Time: 18:24
 */

namespace anghenfil\Templater;


use Exception;

class InvalidVariableStoreException extends Exception{
    const WRONG_TYPE = 10;
    const NO_STORE = 20;

    public function __construct($code){
        $message = "";
        if($code == InvalidVariableStoreException::WRONG_TYPE){
            $message = "Variable Storage has wrong type. Must be class VariableStore";
        }else if($code == InvalidVariableStoreException::NO_STORE){
            $message = "No Variable Storage supplied.";
        }
        parent::__construct($message, $code, null);
    }

}
