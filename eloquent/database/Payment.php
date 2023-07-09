<?php
require "../bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;
Capsule::schema()->create('payments', function ($table) {
    $table->increments('id');
    $table->float('amount');
    $table->string('session_id');
    $table->bigInteger('token');
    $table->enum('status', ['pending', 'confirmed'])->default('pending');
    $table->integer('client_id')->unsigned();
    $table->integer('wallet_id')->unsigned()->nullable();
    $table->foreign('client_id')->references('id')->on('clients');
    $table->foreign('wallet_id')->references('id')->on('wallets');
    $table->timestamps();
});