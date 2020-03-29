# Epic-dotenv

A dynamic environment variables & configuration managment library.

## Language

> PHP

## Features

- Get Enviroment Variables
- Editing & Updating
- Resolve ENV File
- Create New Variables
- Validate Variables

## Composer Installation

> composer require saff-elli-khan/dotenv

### Usage

It is very simple to use this library!

```
use Dotenv\Dotenv\Dotenv;
use Dotenv\DotenvExceptions\DotenvExceptions;

require_once 'vendor/autoload.php';

try {
    $dotenv = new Dotenv(".env", true);
    $dotenv->load();
} catch (DotenvExceptions $e) {
    print_r($e->getMessage());
}

```
