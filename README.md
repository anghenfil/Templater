# Templater
Simplest Template Engine

## How it works:

### PHP-Code:
```
$storage = new VariableStore();
$storage->set_variable("test1", "Success.");

try {
   $parser = new TemplateParser("tests/testfile.php", $storage);
} catch (\anghenfil\Templater\InvalidVariableStoreException $e) {
   //Exception handling here
}

print($parser->parse());
```

To change the variable identifier (Default is {key})use for example```
$parser->setVarChar("{[", "]}");```

### Example HTML Template:
#### Default:
```{test1}```
#### With modified variable identifier: 
```{[test1]}```