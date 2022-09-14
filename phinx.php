<?php

require_once __DIR__  .'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

return
[
    'paths' => [
        'migrations' => 'database/migrations',
        'seeds' => 'database/seeders'
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_environment' => 'development',
        'development' => [
            'adapter' => $_ENV['DB_DRIVER'],
            'host' => $_ENV['DB_HOST'],
            'name' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'pass' => $_ENV['DB_PASSWORD'],
            'port' => '3306',
            'charset' => 'utf8',
        ],
        'production' => [
            'adapter' => $_ENV['DB_DRIVER'],
            'host' => $_ENV['DB_HOST'],
            'name' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'pass' => $_ENV['DB_PASSWORD'],
            'port' => '3306',
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => $_ENV['DB_DRIVER'],
            'host' => $_ENV['DB_HOST'],
            'name' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'pass' => $_ENV['DB_PASSWORD'],
            'port' => '3306',
            'charset' => 'utf8',
        ]            
    ],
    'version_order' => 'creation'
];
