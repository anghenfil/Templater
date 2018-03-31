<?php

namespace anghenfil\Templater;

class TemplateParser{
	private $filename;
	private $html;
	private $varchar_open = "{";
	private $varchar_close = "}";
	private $store;
	public static $globalstore;

	public static function init(){
	    self::$globalstore = new VariableStore();
    }

	function __construct($filename, $store){
	    if(!is_null($store)){
            $this->store = $store;
            if( ! $store instanceof VariableStore){
                throw new InvalidVariableStoreException(InvalidVariableStoreException::WRONG_TYPE);
            }
        }else{
	        if(is_null(self::$globalstore)){
	            throw new InvalidVariableStoreException(InvalidVariableStoreException::GSTORE_NO_INIT);
            }
        }
		$this->filename = $filename;
	}

	private function loadFile(){
        $this->html = file_get_contents($this->filename, FILE_USE_INCLUDE_PATH);
    }

    public function parse(){
        $this->loadFile();

        if(!is_null($this->store)) {
            foreach ($this->store->getStore() as $key => $value) {
                $this->html = str_replace($this->varchar_open . $key . $this->varchar_close, $this->store->getStore()[$key], $this->html);
            }
        }else{
            foreach (self::$globalstore->getStore() as $key => $value) {
                $this->html = str_replace($this->varchar_open . $key . $this->varchar_close, self::$globalstore->getStore()[$key], $this->html);
            }
        }

        return($this->html);
    }

    public function setVariableStore($store){
        $this->store = $store;
    }

    public function setVarChar($open, $close){
	    if(!empty($open) && !empty($close)){
	        $this->varchar_open = $open;
	        $this->varchar_close = $close;
        }
    }
}