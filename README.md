# Epic-dotenv

A dynamic environment variables & configuration managment library.

## Language

> PHP

## Features

- Get Enviroment Variables
- Resolve ENV File
- Create/Update/Remove Variables
- Validate Variables

## Composer Installation

> composer require saff-elli-khan/dotenv

### Usage

Its a very easy to use library!

```
use Dotenv\Dotenv\Dotenv;
use Dotenv\DotenvExceptions\DotenvExceptions;

require_once 'vendor/autoload.php';

try {

    //File Path In First Parameter.
    //Setting Parameter 2 To True Automatically Generates The ENV File If Not Exists (Default False).
    //Setting Parameter 3 To False Disables Exceptions And The Library Returns False On Error (Default True).

    $dotenv = new Dotenv(".env", true);
    $dotenv->load();

} catch (DotenvExceptions $e) {
    print_r($e->getMessage());
}

```

#### Methods

##### Get

```

$dotenv->get($variableName); //Return Data

getenv($variableName); //Alternative

$_ENV[$variableName]; //Alternative

```

##### Create/Update

```
//Parameter 1 Is An Array Containing Variable Names And Values.
//Parameter 2 Is An Optional Comment String.
//Will Update A Variable If Already Exists.
//Method ->put() Is Required To Be Called To Commit The Action.

$dotenv->addVariables(["Foo" => "Bar"], "A test comment")->put();

```

##### Remove

```
//Parameter 1 Is An Array Containing Variable Names To Be Removed.
//Method ->put() Is Required To Be Called To Commit The Action.

$dotenv->removeVariables(["Foo", "Moo"])->put();

```

##### Validations

```
//Call ->options() Method First To Initialize Validations.
//Parameter 1 To ->required() Method Is An Array Containing Variable Names That Are Required.

$dotenv->options()->required(["Foo", "Moo"]);

```

###### Advance Validation

```
//Call A Third Method On ->required() Method Like is_email() To Validate All Required Variables

$dotenv->options()->required(["Foo", "Moo"])->is_email();

```

##### Validation Methods

* is_ip();
* not_empty();
* is_empty();
* is_match($regex);
* is_url();
* is_userName();
* is_contact(fales); //Set True If Want Just Integer Validation
* is_email();
* is_string();
* is_numuric();
* is_integer();
* is_float();

Sorry for any type of mistakes, Let us know what do you think about this library? Thanks!
