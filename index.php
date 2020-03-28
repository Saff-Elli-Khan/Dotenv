<?php

use Dotenv\Dotenv\Dotenv;
use Dotenv\DotenvExceptions\DotenvExceptions;

require_once 'vendor/autoload.php';

try {
    $dotenv = new Dotenv(".env", true);
    $dotenv->load();
} catch (DotenvExceptions $e) {
    print_r($e->getMessage());
}
