<?php

use anghenfil\Templater\TemplateParser;

class NachoTest extends PHPUnit_Framework_TestCase {

  public function testAdding()
  {
    TemplateParser::set_variable("test1", "test");
    
  }

}