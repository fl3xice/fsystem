<?php

use Josantonius\Session\Session;
use League\Flysystem\Filesystem;
use Medoo\Medoo;

define("ROOT", $_SERVER['DOCUMENT_ROOT'].'/');
define("VENDOR", ROOT . "vendor/");
define("VIEWS_FOLDER", 'views');
define("CACHE_FOLDER", 'cache');

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
    'DATABASE_PASSWORD',
    'SESSION_PREFIX'
]);

$config = require_once ROOT . "config.php";

Session::init(31536000);
Session::setPrefix($config['session']['prefix']);

$database = new Medoo([
    'database_type' => $config['database']['type'],
    'database_name' => $config['database']['name'],
    'server' => $config['database']['host'],
    'username' => $config['database']['user'],
    'password' => $config['database']['password']
]);

$fileSystem = new Filesystem($config['adapters']['resources']);

if (!$fileSystem->has(CACHE_FOLDER)) {
    $fileSystem->createDir(CACHE_FOLDER);
}

if (!$fileSystem->has(VIEWS_FOLDER)) {
    $fileSystem->createDir(VIEWS_FOLDER);
}

require_once ROOT . "src/routes.php";
