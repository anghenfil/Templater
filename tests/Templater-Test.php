<?php

use anghenfil\Templater\TemplateParser;

class NachoTest extends PHPUnit_Framework_TestCase {

  public function testAdding()
  {
    TemplateParser::set_variable("test1", "test");
    TemplateParser::push("test1", "append");

    $parser = new TemplateParser("tests/testfile.php");
    $parser->parse();
  }

}