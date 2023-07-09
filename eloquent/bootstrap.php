<?php
require __DIR__ . '/../vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
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