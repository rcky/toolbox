#Toolbox
===
A collection of useful php code I used to write pretty often. 
Actually in a really early state (i also commit untested and unfinished code).
## Collections
### ChainableCollections
Allow chaining of array access on a collection, useful f.e. for configuration. 
Chaining on a default \ArrayAccess implementation would lead to an error (if 
error level is sufficient) and strange behavior:
```
$obj = new \ArrayObject();
$obj['undefined_index']['undefined'] = true;
```
`$obj['undefined_index']` will evaluate to `null` and `null['undefined']`to an 
array
```
$obj = new ChainableArrayObject();
$obj['undefined_index']['undefined'] = true;
```
Will result in a properly nested array/collection structure, without throwing 
notices/errors. Furthermore it introduces a fluent interface:
```
$obj->set('index', $value)->set('another_index', $another_value);
```

## Tree
In rally early state, hadnt got the time to fix and implement it properly:
### Todos:
  - think about the possibilities of the interface combinations to get an inheritance
structure that makes sense (interface inheritance limits the advantages of the 
different interfaces)