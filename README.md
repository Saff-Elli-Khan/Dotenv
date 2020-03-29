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

###### Get

```

$dotenv->get($variableName);
//Returns Variable Data

```

###### Create/Update

```
//Parameter 1 Is An Array Containing Variable Names And Values.
//Parameter 2 Is An Optional Comment String.
//Will Update A Variable If Already Exists.
//Method Put() Is Required To Commit The Action.

$dotenv->addVariables(["Foo" => "Bar"], "A test comment")->put();
//Returns Variable Data

```
