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
    const GSTORE_NO_INIT = 30;

    public function __construct($code){
        $message = "";
        if($code == InvalidVariableStoreException::WRONG_TYPE){
            $message = "Variable Storage has wrong type. Must be class VariableStore";
        }else if($code == InvalidVariableStoreException::GSTORE_NO_INIT){
            $message = "The global storage wasn't initiated with TemplaterParser::init().";
        }
        parent::__construct($message, $code, null);
    }

}
