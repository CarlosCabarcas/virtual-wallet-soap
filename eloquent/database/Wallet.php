<?php
require "../bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;
Capsule::schema()->create('wallets', function ($table) {
    $table->increments('id');
    $table->float('balance')->default(0);
    $table->integer('client_id')->unsigned();
    $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
    $table->timestamps();
});