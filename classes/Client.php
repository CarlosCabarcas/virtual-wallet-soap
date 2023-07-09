<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Client extends Eloquent
{
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = [
       'document', 'names', 'email','phone'
   ];

    public function wallet()
    {
        return $this->hasOne('Wallet');
    }

    public function payments()
    {
        return $this->hasMany('Payment');
    }
 }