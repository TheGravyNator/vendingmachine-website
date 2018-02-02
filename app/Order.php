<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'user_id';

    protected $fillable = [
      'user_id',
      'soda_type',
      'amount',
      'price'
    ];

    public function user()
    {
      return $this->hasOne('App\User', 'id');
    }
}
