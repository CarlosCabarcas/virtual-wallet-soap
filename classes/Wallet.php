<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Wallet extends Eloquent
{
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = [
       'balance', 'client_id'
   ];

    public function client()
    {
         return $this->belongsTo('Client');
    }
 }