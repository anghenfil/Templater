# Templater
Simplest Template Engine

## How it works:
You can either use the *Global Storage* or custom Variable Storages. You can specify fields to a VariableStore and specify, if only these fields are "allowed" and replaced or if these fields should set to empty string if they exist.

###Constructors:
VariableStore($keys, $onlykeys, $setempty);
VariableStore();
### Beispiele:
#### Custom VariableStore:
```
$storage = new VariableStore(array("test1", "test2"), false, true);
$storage->set_variable("test1", "Success.");

try {
   $parser = new TemplateParser("tests/testfile.php", $storage);
} catch (\anghenfil\Templater\InvalidVariableStoreException $e) {
   //Exception handling here
}

print($parser->parse());
```
-> Output: Success.

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
-> Output: Success. {test2}
### Notes:
To change the variable identifier (Default is {key})use for example```
$parser->setVarChar("{[", "]}");```

### Example HTML Template used:
#### Default:
```
{test1}
{test2}
```
#### With modified variable identifier: 
```
{[test1]}
{[test2]}
```