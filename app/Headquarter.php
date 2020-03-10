<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
{
  protected $fillable = [
    'number_of', 'region', 'city', 'adress',
  ];

  protected $hidden = [

  ];
}
