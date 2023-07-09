<?php
require "../bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;
Capsule::schema()->create('clients', function ($table) {
    $table->increments('id');
    $table->string('document')->unique();
    $table->string('names');
    $table->string('email')->unique();
    $table->string('phone')->unique();
    $table->timestamps();
});