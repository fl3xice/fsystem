<?php

use League\Flysystem\Adapter\Local;


return [
    /*
     * FILESYSTEM
     */
    'adapters' => [
        "resources" => new Local(ROOT.'resources')
    ],

    /*
     * DATABASE
     */
    'database' => [
        'type' => $_ENV['DATABASE_TYPE'],
        'name' => $_ENV['DATABASE_NAME'],
        'host' => $_ENV['DATABASE_HOST'],
        'user' => $_ENV['DATABASE_USER'],
        'password' => $_ENV['DATABASE_PASSWORD']
    ]
];

