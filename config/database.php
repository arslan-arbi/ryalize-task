<?php


$database_config = [
    'driver' => $_ENV['DB_DRIVER'],
    'host' => $_ENV['DB_HOST'],
    'database' => $_ENV['DB_NAME'],
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
    'charset'=>'utf8',
    'collation'=>'utf8_unicode_ci',
    'prefix'=>''
];

$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($database_config);

$capsule->setAsGlobal();
$capsule->bootEloquent();

return $capsule;