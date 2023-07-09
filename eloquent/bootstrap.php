<?php
require __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;
$dotenv = Dotenv::createImmutable('./');
$dotenv->load();
$capsule = new Capsule;
$capsule->addConnection([
   "driver" => "mysql",
   "host" =>"localhost",
   "database" => "virtual_wallet",
   "username" => "carlos",
   "password" => "12345678"
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();