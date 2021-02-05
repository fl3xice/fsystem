<?php

use Bramus\Router\Router;
use fi\RouterWriter;
use Jenssegers\Blade\Blade;

$router = new Router();
$blade = new Blade(ROOT . 'resources/' . VIEWS_FOLDER, ROOT . 'resources/' . CACHE_FOLDER);

$router->get("/", RouterWriter::RouteExecutor(function () use ($blade) {
    return $blade->render("index", ['title' => 'FSystem']);
}));

$router->run();