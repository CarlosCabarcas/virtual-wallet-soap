<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Payment extends Eloquent
{
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = [
       'amount', 'session_id', 'token', 'status', 'client_id', 'wallet_id'
   ];

    public function client()
    {
         return $this->belongsTo('Client');
    }

    public function wallet()
    {
         return $this->belongsTo('Wallet');
    }
 }