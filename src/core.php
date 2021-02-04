<?php

define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("VENDOR", ROOT . "/vendor/");

// AutoLoader by composer
require_once VENDOR.'autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->load();