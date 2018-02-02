<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
  protected $fillable = ['slot_id', 'name_soda', 'prize'];
}
