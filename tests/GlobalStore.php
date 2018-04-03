<?php

use anghenfil\Templater\TemplateParser;
use anghenfil\Templater\VariableStore;

class GlobalStoreTest extends PHPUnit_Framework_TestCase {

  public function testAdding(){
      TemplateParser::init();

      TemplateParser::$globalstore->set_variable("test1", "Success.");

      $parser = new TemplateParser("tests/testfile.php", null);
      $parser->setVarChar("{[", "]}");

      print($parser->parse());
  }

}