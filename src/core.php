<?php

use Medoo\Medoo;

define("ROOT", $_SERVER['DOCUMENT_ROOT'].'/');
define("VENDOR", ROOT . "vendor/");

// AutoLoader by composer
require_once VENDOR.'autoload.php';

// .env File
$dotenv = Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->load();
$dotenv->required([
    'DATABASE_TYPE',
    'DATABASE_NAME',
    'DATABASE_HOST',
    'DATABASE_USER',
    'DATABASE_PASSWORD'
]);

$config = require_once ROOT . "config.php";

$database = new Medoo([
    'database_type' => $config['database']['type'],
    'database_name' => $config['database']['name'],
    'server' => $config['database']['host'],
    'username' => $config['database']['user'],
    'password' => $config['database']['password']
]);
