# Templater
Simplest Template Engine

## How it works:
You can either use the *Global Storage* or custom Variable Storages.
### Beispiele:
#### Custom VariableStore:
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

#### Global Storage:
```
TemplateParser::init(); //Initiate global storage

TemplateParser::$globalstore->set_variable("test1", "Success.");

try{
    $parser = new TemplateParser("tests/testfile.php", null); //Set $store parameter to null to use global storage
} catch (\anghenfil\Templater\InvalidVariableStoreException $e) {
    //Exception handling here
}
print($parser->parse());
```
### Notes:
To change the variable identifier (Default is {key})use for example```
$parser->setVarChar("{[", "]}");```

### Example HTML Template:
#### Default:
```{test1}```
#### With modified variable identifier: 
```{[test1]}```