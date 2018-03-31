<?php

use anghenfil\Templater\TemplateParser;
use anghenfil\Templater\VariableStore;

class TemplaterTest extends PHPUnit_Framework_TestCase {

  public function testAdding()
  {
    $storage = new VariableStore();
    $storage->set_variable("test1", "Success.");

      try {
          $parser = new TemplateParser("tests/testfile.php", $storage);
      } catch (\anghenfil\Templater\InvalidVariableStoreException $e) {
          //Exception handling here
      }
      $parser->setVarChar("{[", "]}");
    print($parser->parse());
  }

}